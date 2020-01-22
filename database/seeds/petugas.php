<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PetugasModel::insert([
        [
            'nama_petugas'=>'Mikel',
            'alamat'=>'jl. bersamanya',
            'no_telp'=>'082234387590',
            'username'=>'mikelanggoro',
            'password'=>'mikel123',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'nama_petugas'=>'Angel',
            'alamat'=>'jl. dianggap adik',
            'no_telp'=>'088883333666',
            'username'=>'angeliasl',
            'password'=>'angelia26',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'nama_petugas'=>'Byan',
            'alamat'=>'jl. balikan',
            'no_telp'=>'089999777666',
            'username'=>'byantara',
            'password'=>'byantara123',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'nama_petugas'=>'Michael',
            'alamat'=>'jl. Pacar palsu',
            'no_telp'=>'088779966554',
            'username'=>'michaelsongong',
            'password'=>'michael123',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'nama_petugas'=>'Zara',
            'alamat'=>'jl. pacar byan',
            'no_telp'=>'088665544332',
            'username'=>'zaraaa',
            'password'=>'zara123',
            'created_at'=>Date('Y-m-d H:i:s')
        ]]);
    }
}
