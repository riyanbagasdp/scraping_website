<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScopusPublication;
use App\Models\ScholarPublication;
use Goutte\Client; // Perlu install Goutte untuk scraping Google Scholar

class ScrapingController extends Controller
{
    // Scraping Scopus
    public function scrapeScopus()
    {
        $scopus_id = '57201071505'; // ID Scopus penulis
        $api_key = 'bcaa69423cbdf8a832d614d9969c46aa'; // API Key Scopus
        $base_url = 'https://api.elsevier.com/content/';
        $articles = $this->get_scopus_articles($scopus_id, $api_key, $base_url);

        if ($articles) {
            foreach ($articles['search-results']['entry'] as $article) {
                ScopusPublication::create([
                    'author_name' => $article['dc:creator'] ?? 'Unknown', // Tambahkan default value jika null
                    'title' => $article['dc:title'],
                    'journal_name' => $article['prism:publicationName'] ?? 'Unknown',
                    'publication_date' => $article['prism:coverDate'] ?? null,
                    'doi' => $article['prism:doi'] ?? null,
                    'citations' => $article['citedby-count'] ?? 0,
                ]);
            }
        }

        return response()->json(['message' => 'Scraping Scopus completed successfully!']);
    }

    // Scraping Google Scholar
    public function scrapeScholar()
    {
        $scholar_id = 'qQWe76gAAAAJ'; // ID Google Scholar penulis
        $base_url = 'https://scholar.google.com/citations?user=' . $scholar_id;

        $articles = $this->get_scholar_articles($base_url);

        if ($articles) {
            foreach ($articles as $article) {
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

        return response()->json(['message' => 'Scraping Scholar completed successfully!']);
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
            return null;  // Jika terjadi error saat melakukan request
        }
        curl_close($ch);

        // Simpan hasil respon untuk debugging
        file_put_contents('scholar_response.html', $response);

        // Memproses respon HTML
        $dom = new \DOMDocument();
        @$dom->loadHTML($response);  // Gunakan '@' untuk menonaktifkan peringatan saat HTML tidak valid

        $xpath = new \DOMXPath($dom);
        $articles = [];

        // Mengambil elemen yang sesuai dengan struktur HTML Google Scholar
        foreach ($xpath->query('//tr[@class="gsc_a_tr"]') as $article) {
            $titleNode = $xpath->query('.//a[@class="gsc_a_at"]', $article)->item(0);
            $title = $titleNode ? $titleNode->textContent : 'Unknown';

            $authorNode = $xpath->query('.//div[@class="gs_gray"]', $article)->item(0);
            $author = $authorNode ? $authorNode->textContent : 'Unknown';

            $journalNode = $xpath->query('.//div[@class="gs_gray"]', $article)->item(1);
            $journal = $journalNode ? $journalNode->textContent : 'Unknown';

            $yearNode = $xpath->query('.//span[@class="gsc_a_h gsc_a_hc gs_ibl"]', $article)->item(0);
            $year = $yearNode ? $yearNode->textContent : null;

            $citationNode = $xpath->query('.//a[contains(@href,"cites")]', $article)->item(0);
            $citations = $citationNode ? preg_replace('/\D/', '', $citationNode->textContent) : 0;

            $articles[] = [
                'title' => $title,
                'author_name' => $author,
                'journal_name' => $journal,
                'publication_date' => $year,
                'citations' => $citations,
                'doi' => null, // Google Scholar tidak menyediakan DOI
            ];
        }

        // Simpan artikel yang di-scrape untuk pengecekan
        file_put_contents('parsed_articles.txt', print_r($articles, true));

        return $articles;
    }
}
