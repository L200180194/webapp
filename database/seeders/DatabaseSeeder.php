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
        \App\Models\User::factory(10)->create();
        Admin::factory(10)->create();
        Kota::factory(10)->create();
        Pendaftaran::factory(10)->create();
        Perusahaan::factory(10)->create();
        Posisi_magang::factory(10)->create();
        Posisim::factory(10)->create();
        Skill::factory(10)->create();

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
