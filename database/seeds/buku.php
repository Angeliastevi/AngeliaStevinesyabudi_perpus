<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\BukuModel::insert([
        [
            'judul'=>'Ingin Bersamanya',
            'penerbit'=>'Gajah Mada',
            'pengarang'=>'Kadiya',
            'foto'=>'-',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'judul'=>'Sister Brother Zone',
            'penerbit'=>'Gramedia',
            'pengarang'=>'Talitha',
            'foto'=>'-',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'judul'=>'Unlucky Girl',
            'penerbit'=>'Gramedia',
            'pengarang'=>'yehyeony',
            'foto'=>'-',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'judul'=>'Seventh Pace',
            'penerbit'=>'Gramedia',
            'pengarang'=>'urgooseberry',
            'foto'=>'-',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'judul'=>'Missing You',
            'penerbit'=>'Gramedia',
            'pengarang'=>'starscrowd',
            'foto'=>'-',
            'created_at'=>Date('Y-m-d H:i:s')
        ]]);
    }
}
