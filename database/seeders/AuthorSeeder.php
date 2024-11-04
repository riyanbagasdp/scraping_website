<?php

namespace Database\Seeders;

use App\Models\Author;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::truncate();
        $author = [[
            'id_scholar' => '_ahaA8oAAAAJ',
            'id_scopus' => '16641219300',
            'user_id' => '1',
            'id_prodi' => '1',
            'author_name' => 'Muhammad Rohmadi',
        ], [
            'id_scholar' => 'WNQeNrMAAAAJ',
            'id_scopus' => '6701338308',
            'user_id' => '1',
            'id_prodi' => '1',
            'author_name' => 'Sri Mulyani',
        ], [
            'id_scholar' => 'hHn9BsYAAAAJ',
            'id_scopus' => '15836029400',
            'user_id' => '1',
            'id_prodi' => '2',
            'author_name' => 'Bhisma Murti',
        ], [
            'id_scholar' => 'ousdEh4AAAAJ',
            'id_scopus' => '57201775415',
            'user_id' => '1',
            'id_prodi' => '2',
            'author_name' => 'Doddy Setiawan',
        ], [
            'id_scholar' => 'B3_rrxEAAAAJ',
            'id_scopus' => '56338223000',
            'user_id' => '1',
            'id_prodi' => '3',
            'author_name' => 'Wiranta',
        ], [
            'id_scholar' => 'cIGHN8cAAAAJ',
            'id_scopus' => '56178586300',
            'user_id' => '1',
            'id_prodi' => '3',
            'author_name' => 'Agus Purwanto',
        ], [
            'id_scholar' => 'QN7qX9UAAAAJ',
            'id_scopus' => '42062336300',
            'user_id' => '1',
            'id_prodi' => '4',
            'author_name' => 'Mohammad Masykuri',
        ], [
            'id_scholar' => '2qFReLoAAAAJ',
            'id_scopus' => '55754220200',
            'user_id' => '1',
            'id_prodi' => '4',
            'author_name' => 'Edy Purwanto',
        ], [
            'id_scholar' => 'gNeMIS0AAAAJ',
            'id_scopus' => '52463607900',
            'user_id' => '1',
            'id_prodi' => '5',
            'author_name' => 'Andayani',
        ], [
            'id_scholar' => '0UpmBB4AAAAJ',
            'id_scopus' => '57197832621',
            'user_id' => '1',
            'id_prodi' => '5',
            'author_name' => 'BRM Bambang Irawan',
        ], [
            'id_scholar' => 'IVvbtxoAAAAJ',
            'id_scopus' => '35741558600',
            'user_id' => '1',
            'id_prodi' => '6',
            'author_name' => 'Widha Sunarno',
        ], [
            'id_scholar' => 'VFmnslYAAAAJ',
            'id_scopus' => '24464557700',
            'user_id' => '1',
            'id_prodi' => '6',
            'author_name' => 'Sajidan',
        ], [
            'id_scholar' => '2IBZW1AAAAAJ',
            'id_scopus' => '57213148406',
            'user_id' => '1',
            'id_prodi' => '7',
            'author_name' => 'Sulistyo Saputro',
        ], [
            'id_scholar' => 'ZGd-RO8AAAAJ',
            'id_scopus' => '36053216800',
            'user_id' => '1',
            'id_prodi' => '7',
            'author_name' => 'Suciati Suciati',
        ], [
            'id_scholar' => '3JLX0XcAAAAJ',
            'id_scopus' => '56177538900',
            'user_id' => '1',
            'id_prodi' => '8',
            'author_name' => 'Riyadi Santosa',
        ], [
            'id_scholar' => 'EGwfzmoAAAAJ',
            'id_scopus' => '6505505624',
            'user_id' => '1',
            'id_prodi' => '8',
            'author_name' => 'Irwan Trinugroho',
        ], [
            'id_scholar' => 'kszM5JoAAAAJ',
            'id_scopus' => '57208682883',
            'user_id' => '1',
            'id_prodi' => '9',
            'author_name' => 'Bandi',
        ], [
            'id_scholar' => 'DM7Q5vYAAAAJ',
            'id_scopus' => '59128529300',
            'user_id' => '1',
            'id_prodi' => '9',
            'author_name' => 'Dr. Argyo Demartoto, M.Si',
        ], [
            'id_scholar' => 'tRzpS5AAAAAJ',
            'id_scopus' => '35118145700',
            'user_id' => '1',
            'id_prodi' => '10',
            'author_name' => 'Budi Usodo',
        ], [
            'id_scholar' => '93LrpJwAAAAJ',
            'id_scopus' => '7409510765',
            'user_id' => '1',
            'id_prodi' => '10',
            'author_name' => 'Imam Sujadi',
        ], [
            'id_scholar' => 'xu-WlO4AAAAJ',
            'id_scopus' => '6602940233',
            'user_id' => '1',
            'id_prodi' => '11',
            'author_name' => 'Puan Rafida Mahira',
        ], [
            'id_scholar' => 'ao7MiNAAAAAJ',
            'id_scopus' => '56451212200',
            'user_id' => '1',
            'id_prodi' => '11',
            'author_name' => 'Hasan Fauzi.',
        ], [
            'id_scholar' => 'YBLndFIAAAAJ',
            'id_scopus' => '56069588900',
            'user_id' => '1',
            'id_prodi' => '12',
            'author_name' => 'Sukarmin Sukarmin',
        ], [
            'id_scholar' => 'c0x5LOwAAAAJ',
            'id_scopus' => '57211444511',
            'user_id' => '1',
            'id_prodi' => '12',
            'author_name' => 'Nugraheni Eko Wardani',
        ],[
            'id_scholar' => '05h33ZUAAAAJ',
            'id_scopus' => '54407593200',
            'user_id' => '1',
            'id_prodi' => '13',
            'author_name' => 'Kundharu Saddhono',
        ], [
            'id_scholar' => 'G-tJCTQAAAAJ',
            'id_scopus' => '57189896735',
            'user_id' => '1',
            'id_prodi' => '13',
            'author_name' => 'Slamet Riyadi',
        ], [
            'id_scholar' => 'uTQxsToAAAAJ',
            'id_scopus' => '40761547000',
            'user_id' => '1',
            'id_prodi' => '14',
            'author_name' => 'Ernoiz Antriyandarti',
        ], [
            'id_scholar' => 'HM8cBzAAAAAJ',
            'id_scopus' => '56352104600',
            'user_id' => '1',
            'id_prodi' => '14',
            'author_name' => 'Sarwiji Suwandi',
        ], [
            'id_scholar' => '4_lBDjUAAAAJ',
            'id_scopus' => '6603804256',
            'user_id' => '1',
            'id_prodi' => '15',
            'author_name' => 'Maria Ulfa',
        ], [
            'id_scholar' => 'SVzbvn4AAAAJ',
            'id_scopus' => '55846541300',
            'user_id' => '1',
            'id_prodi' => '15',
            'author_name' => 'Agung Nugroho Catur Saputro',
        ], [
            'id_scholar' => 'dQsTxE0AAAAJ',
            'id_scopus' => '56180418700',
            'user_id' => '1',
            'id_prodi' => '16',
            'author_name' => 'Dr. Ubaidillah',
        ], [
            'id_scholar' => 'xchq1-8AAAAJ',
            'id_scopus' => '55195744200',
            'user_id' => '1',
            'id_prodi' => '16',
            'author_name' => 'Mangatur Nababan',
        ], [
            'id_scholar' => 'n_ofxzcAAAAJ',
            'id_scopus' => '55387142700',
            'user_id' => '1',
            'id_prodi' => '17',
            'author_name' => 'Nugroho Agung Pambudi',
        ], [
            'id_scholar' => 'o3ntphQAAAAJ',
            'id_scopus' => '57190934033',
            'user_id' => '1',
            'id_prodi' => '17',
            'author_name' => 'St Y Slamet',
        ], [
            'id_scholar' => 'QMMg4t8AAAAJ',
            'id_scopus' => '55571941200',
            'user_id' => '1',
            'id_prodi' => '18',
            'author_name' => 'Leo Agung Sutimin',
        ], [
            'id_scholar' => '5ZM3_LMAAAAJ',
            'id_scopus' => '56460408200',
            'user_id' => '1',
            'id_prodi' => '18',
            'author_name' => 'Joko Nurkamto',
        ], [
            'id_scholar' => 'TGGuHMQAAAAJ',
            'id_scopus' => '57215215171',
            'user_id' => '1',
            'id_prodi' => '19',
            'author_name' => 'Sapja Anantanyu',
        ], [
            'id_scholar' => 'XMecgUoAAAAJ',
            'id_scopus' => '56012196700',
            'user_id' => '1',
            'id_prodi' => '19',
            'author_name' => 'Riyadi',
        ], [
            'id_scholar' => 'T8aNrqQAAAAJ',
            'id_scopus' => '57202300237',
            'user_id' => '1',
            'id_prodi' => '20',
            'author_name' => 'RB. Soemanto',
        ], [
            'id_scholar' => '2jeJznAAAAAJ',
            'id_scopus' => '33267518100',
            'user_id' => '1',
            'id_prodi' => '20',
            'author_name' => 'Prof. Dr. Suyitno, M.Pd.',
        ], [
            'id_scholar' => 'TM890zkAAAAJ',
            'id_scopus' => '56012247000',
            'user_id' => '1',
            'id_prodi' => '21',
            'author_name' => 'Cut Adira Titania Putri',
        ], [
            'id_scholar' => 'DFdrc_gAAAAJ',
            'id_scopus' => '58068387700',
            'user_id' => '1',
            'id_prodi' => '21',
            'author_name' => 'Dr. Sri Yamtinah, S.Pd., M.Pd',
        ], [
            'id_scholar' => '2Ix4WxsAAAAJ',
            'id_scopus' => '56028197800',
            'user_id' => '1',
            'id_prodi' => '22',
            'author_name' => 'Dwi Wahyuni',
        ], [
            'id_scholar' => 'P5CZccoAAAAJ',
            'id_scopus' => '59165567800',
            'user_id' => '1',
            'id_prodi' => '22',
            'author_name' => 'Retno Winarni',
        ], [
            'id_scholar' => 'NXYKxnIAAAAJ',
            'id_scopus' => '36931094200',
            'user_id' => '1',
            'id_prodi' => '23',
            'author_name' => 'Mugi Rahardjo',
        ], [
            'id_scholar' => 'GPBtAsUAAAAJ',
            'id_scopus' => '55851190200',
            'user_id' => '1',
            'id_prodi' => '23',
            'author_name' => 'Tri Atmojo Kusmayadi',
        ], [
            'id_scholar' => 'tAQT8W8AAAAJ',
            'id_scopus' => '55791436800',
            'user_id' => '1',
            'id_prodi' => '24',
            'author_name' => 'Agus Kristiyanto',
        ], [
            'id_scholar' => 'nPdAO3oAAAAJ',
            'id_scopus' => '57207550189',
            'user_id' => '1',
            'id_prodi' => '24',
            'author_name' => 'Hendri Widiyandari',
        ]];

        Author::insert($author);
    }
}
