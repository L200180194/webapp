<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\kota;
use App\Models\pendaftaran;
use App\Models\perusahaan;
use App\Models\posisi_magang;
use App\Models\skill;
use App\Models\pendidikan;
use App\Models\Posisim;
use App\Models\prodi;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        Admin::factory(20)->create();
        Kota::factory(20)->create();
        Pendaftaran::factory(20)->create();
        Perusahaan::factory(20)->create();
        Posisi_magang::factory(20)->create();
        Posisim::factory(20)->create();
        Skill::factory(20)->create();

        Pendidikan::create([
            'tingkat_pendidikan' => 'Sarjana'
        ]);
        Pendidikan::create([
            'tingkat_pendidikan' => 'Diploma'
        ]);
        Pendidikan::create([
            'tingkat_pendidikan' => 'SMA Sederajat'
        ]);
        Prodi::create([
            'nama_prodi' => 'IPA'
        ]);
        Prodi::create([
            'nama_prodi' => 'Informatika'
        ]);
        Prodi::create([
            'nama_prodi' => 'ilmu Komunikasi'
        ]);
    }
}
