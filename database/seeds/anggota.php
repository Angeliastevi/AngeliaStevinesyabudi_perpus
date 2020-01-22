<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AnggotaModel::insert([
        [
            'nama_anggota'=>'Mikel',
            'alamat'=>'jl. bersamanya',
            'no_telp'=>'082234387590',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'nama_anggota'=>'Angel',
            'alamat'=>'jl. dianggap adik',
            'no_telp'=>'083146553206',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'nama_anggota'=>'Talitha',
            'alamat'=>'jl. mentang-mentang pacaran',
            'no_telp'=>'089776644223',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'nama_anggota'=>'Kandiya',
            'alamat'=>'jl. Jomblo',
            'no_telp'=>'087666555444',
            'created_at'=>Date('Y-m-d H:i:s')
        ],
        [
            'nama_anggota'=>'Fara',
            'alamat'=>'jl. bacot sangat',
            'no_telp'=>'000888555888',
            'created_at'=>Date('Y-m-d H:i:s')
        ]]);
    }
}
