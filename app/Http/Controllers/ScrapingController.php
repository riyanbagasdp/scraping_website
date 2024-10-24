<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ScopusPublication;
use App\Models\ScholarPublication;
use Goutte\Client; // Perlu install Goutte untuk scraping Google Scholar


class ScrapingController extends Controller
{
    
    // Scraping Scopus
    public function scrapeScopus($scopus_id, $api_key, $base_url)
    {
        //$scopus_id = '57201071505'; // ID Scopus penulis
        $api_key = '2f3be97cfe6cc239b0a9f325a660d9c1'; // API Key Scopus
        $base_url = 'https://api.elsevier.com/content/';
        $articles = $this->get_scopus_articles($scopus_id, $api_key, $base_url);

        if ($articles) {
            foreach ($articles['search-results']['entry'] as $article) {
                ScopusPublication::create([
                    'author_id' => $scopus_id ?? 'Unknown', 
                    'title' => $article['dc:title'] ?? 'Unknown',
                    'journal_name' => $article['prism:publicationName'] ?? 'Unknown',
                    'publication_date' => $article['prism:coverDate'] ?? null,
                    'doi' => $article['prism:doi'] ?? null,
                    'citations' => $article['citedby-count'] ?? 0,
                ]);
            }
        }

        //return response()->json(['message' => 'Scraping Scopus completed successfully!']);
    }

    // Scraping Google Scholar
    public function scrapeScholar($scholar_id)
    {        
        $base_url = 'https://scholar.google.com/citations?user=' . $scholar_id;

        $articles = $this->get_scholar_articles($base_url);
    
        if ($articles) {
            foreach ($articles as $article) {
                // Validasi sebelum memasukkan ke database
                if (!empty($article['title']) && !empty($article['author_name'])) {
                    ScholarPublication::create([
                        'author_name' => $article['author_name'],
                        'title' => $article['title'],
                        'journal_name' => $article['journal_name'],
                        'publication_date' => $article['publication_date'],
                        'doi' => $article['doi'],
                        'citations' => $article['citations'],
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Scraping Scholar completed successfully!']);
    }

    public function scrapePublications()
    {   // Array ID Scopus dan Google Scholar
        $authors = DB::table('authors')->select('id_scopus', 'id_scholar')->get();
        
        $api_key = '2f3be97cfe6cc239b0a9f325a660d9c1'; // API Key Scopus
        $base_url = 'https://api.elsevier.com/content/'; // Base URL Scopus

         // Looping pada array ID Google Scholar
         foreach ($authors as $author) {
            $this->scrapeScholar($author->id_scholar);
            // Tambahkan delay 5 detik sebelum melakukan scraping berikutnya
            sleep(5);
        }

        // Looping pada array ID Scopus
        foreach ($authors as $author) {
            $this->scrapeScopus($author->id_scopus, $api_key, $base_url);        
            // Tambahkan delay 5 detik sebelum melakukan scraping berikutnya
            sleep(5);
        }

       

        return response()->json(['message' => 'Scraping publikasi selesai!']);
    }

    // Fungsi untuk mengambil artikel dari Scopus
    private function get_scopus_articles($scopus_id, $api_key, $base_url)
    {
        $endpoint = "search/scopus";
        $query = "AU-ID($scopus_id)";
        $url = $base_url . $endpoint . "?query=" . urlencode($query);
        $headers = [
            "X-ELS-APIKey: $api_key"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            return null;
        }
        curl_close($ch);

        return json_decode($response, true);
    }

    // Fungsi untuk mengambil artikel dari Google Scholar menggunakan Goutte
    private function get_scholar_articles($base_url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/87.0.4280.66 Safari/537.36',
            'Accept-Language: en-US,en;q=0.9',
            'Accept-Encoding: gzip, deflate, br',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
            'Connection: keep-alive',
        ]);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            file_put_contents('curl_error_log.txt', curl_error($ch), FILE_APPEND);
            return null;  // Jika terjadi error saat melakukan request
        }
        curl_close($ch);

        // Simpan hasil respon untuk debugging
        file_put_contents('scholar_response.html', $response);

        // Cek jika response kosong
        if (empty($response)) {
            file_put_contents('scholar_error_log.txt', "Empty response from Google Scholar.\n", FILE_APPEND);
            return null;
        }

        // Memproses respon HTML
        $dom = new \DOMDocument();
        @$dom->loadHTML($response);  // Gunakan '@' untuk menonaktifkan peringatan saat HTML tidak valid

        $xpath = new \DOMXPath($dom);
        $articles = [];

        // Mengambil elemen yang sesuai dengan struktur HTML Google Scholar
        foreach ($xpath->query('//tr[@class="gsc_a_tr"]') as $article) {
            // Pastikan title node ditemukan
            $titleNode = $xpath->query('.//a[@class="gsc_a_at"]', $article)->item(0);
            $title = $titleNode ? $titleNode->textContent : 'Unknown';

            // Pastikan author node ditemukan
            $authorNode = $xpath->query('.//div[@class="gs_gray"]', $article)->item(0);
            $author = $authorNode ? $authorNode->textContent : 'Unknown';

            // Pastikan journal node ditemukan
            $journalNode = $xpath->query('.//div[@class="gs_gray"]', $article)->item(1);
            $journal = $journalNode ? $journalNode->textContent : 'Unknown';

            // Pastikan year node ditemukan
            $yearNode = $xpath->query('.//span[@class="gsc_a_h gsc_a_hc gs_ibl"]', $article)->item(0);
            $year = $yearNode ? $yearNode->textContent : null;

            // Ambil citation count
            $citationNode = $xpath->query('.//a[contains(@href,"cites")]', $article)->item(0);
            $citations = $citationNode ? preg_replace('/\D/', '', $citationNode->textContent) : 0;

            // Tambahkan artikel hanya jika judul ditemukan
            if ($title !== 'Unknown') {
                $articles[] = [
                    'title' => $title,
                    'author_name' => $author,
                    'journal_name' => $journal,
                    'publication_date' => $year,
                    'citations' => $citations,
                    'doi' => null, // Google Scholar tidak menyediakan DOI
                ];
            }
        }

        // Simpan artikel yang di-scrape untuk pengecekan
        file_put_contents('parsed_articles.txt', print_r($articles, true));

        return $articles;
    }
}