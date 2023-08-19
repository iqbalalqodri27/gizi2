<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(30)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('children')->insert([
            'nama' => 'Yuyun Agustin',
            'nik' => 1234567890123456,
            'tempat_lahir' => 'Jl. Sukabumi No.31 RT.00 RW.00 Jakarta',
            'tanggal_lahir' => '2020-05-16',
            'usia' => '39',
            'jenis_kelamin' => 'L',
            'nama_ot' => 'Ibu Yuyun',
            'nik_ot' => '1234567890123456',
            'alamat_ot' => 'Jl. Sukabumi No.31 RT.00 RW.00 Jakarta',
            'no_tlp_ot' => '085367261129',
        ]);

        // DB::table('children')->insert([
        //     'nama' => 'Wati Pratami',
        //     'nik' => 1234567890123456,
        //     'tempat_lahir' => 'Jl. Sukabumi No.33 RT.00 RW.00 Jakarta',
        //     'tanggal_lahir' => '2022-09-17',
        //     'usia' => '1',
        //     'jenis_kelamin' => 'P',
        //     'nama_ot' => 'Ibu Wati',
        //     'nik_ot' => '1234567890123456',
        //     'alamat_ot' => 'Jl. Sukabumi No.31 RT.00 RW.00 Jakarta',
        //     'no_tlp_ot' => '085367261129',
        // ]);

        // DB::table('children')->insert([
        //     'nama' => 'Krisna Pratama',
        //     'nik' => 1234567890123456,
        //     'tempat_lahir' => 'Jl. Sukabumi No.33 RT.00 RW.00 Jakarta',
        //     'tanggal_lahir' => '2022-09-17',
        //     'usia' => '1',
        //     'jenis_kelamin' => 'L',
        //     'nama_ot' => 'Ibu Krisna',
        //     'nik_ot' => '1234567890123456',
        //     'alamat_ot' => 'Jl. Sukabumi No.31 RT.00 RW.00 Jakarta',
        //     'no_tlp_ot' => '085367261129',
        // ]);

        // DB::table('children')->insert([
        //     'nama' => 'Jundri Pradua',
        //     'nik' => 1234567890123456,
        //     'tempat_lahir' => 'Jl. Sukabumi No.33 RT.00 RW.00 Jakarta',
        //     'tanggal_lahir' => '2022-12-17',
        //     'usia' => '1',
        //     'jenis_kelamin' => 'L',
        //     'nama_ot' => 'Ibu Jundri',
        //     'nik_ot' => '1234567890123456',
        //     'alamat_ot' => 'Jl. Sukabumi No.31 RT.00 RW.00 Jakarta',
        //     'no_tlp_ot' => '085367261129',
        // ]);

       


        DB::table('posyandus')->insert([
            'child_id' => 1,
            'berat_badan' => 15.2,
            'tinggi_badan' => 98,
            'lingkaran_kepala' => 50,
            'status' => 'N',
            'kalkulasi_bmi' => 12,
            'bmi' => 'Stunting',
        ]);

        // DB::table('posyandus')->insert([
        //     'child_id' => 2,
        //     'berat_badan' => 15.2,
        //     'tinggi_badan' => 98,
        //     'lingkaran_kepala' => 50,
        //     'status' => 'N',
        //     'kalkulasi_bmi' => 16,
        //     'bmi' => 'Normal',
        // ]);

        // DB::table('posyandus')->insert([
        //     'child_id' => 3,
        //     'berat_badan' => 15.2,
        //     'tinggi_badan' => 98,
        //     'lingkaran_kepala' => 50,
        //     'status' => 'N',
        //     'kalkulasi_bmi' => 28,
        //     'bmi' => 'Obisitas',
        // ]);
        

        // DB::table('posyandus')->insert([
        //     'child_id' => 2,
        //     'berat_badan' => 10.8,
        //     'tinggi_badan' => 76,
        //     'lingkaran_kepala' => 47,
        //     'status' => 'TP',
        //     'status_gizi' => 'K',
        // ]);

        // DB::table('posyandus')->insert([
        //     'child_id' => 3,
        //     'berat_badan' => 55.2,
        //     'tinggi_badan' => 98,
        //     'lingkaran_kepala' => 50,
        //     'status' => 'N',
        //     'status_gizi' => 'H',
        // ]);

        // DB::table('posyandus')->insert([
        //     'child_id' => 4,
        //     'berat_badan' => 60.2,
        //     'tinggi_badan' => 98,
        //     'lingkaran_kepala' => 50,
        //     'status' => 'N',
        //     'status_gizi' => 'H',
        // ]);


    }
}
