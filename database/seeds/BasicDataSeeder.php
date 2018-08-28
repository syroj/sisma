<?php

use Illuminate\Database\Seeder;
use App\sekolah;
use App\role;
use App\kurikulum;
use App\mapel;
use App\kategori_mapel;
use App\tahun_ajaran;
use App\jurusan;
use App\status;


class BasicDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$status=status::create([
    		'kode_status'=>'INA',
    		'status'=>'Inaktif',
    		'deskripsi'=>'status inaktif'
    	]);
    	$status=status::create([
    		'kode_status'=>'AKF',
    		'status'=>'Aktif',
    		'deskripsi'=>'status Aktif'
    	]);
    	$status=status::create([
    		'kode_status'=>'SPN',
    		'status'=>'Suspend',
    		'deskripsi'=>'status Suspend'
    	]);

		$sekolah = sekolah::create([
			'nama'=>'MA Ali Maksum',
			'alamat'=>'jl. KH Ali Maksum Panggungharjo Sewon Bantul Yogyakarta',
			'telp'=>'0274-111-111',
			'level'=>'SMA/Sederajat',
			'email'=>'aliyah@krapyak.org',
			'website'=>'aliyah.krapyak.org',
		]);
		$role = role::create(
			[
			'role' => 'admin',
			'kode_role'=>'AD1',
			]
		);
		$role = role::create(
			[
			'role' => 'Kepala Sekolah',
			'kode_role'=>'KPS',
			]
		);
		$role = role::create(
			[
			'role' => 'Waka Kesiswaan',
			'kode_role'=>'WK01',
			]
		);
		$kurikulum = kurikulum::create(
			[
				'nama'=>'Kurikulum KBK',
				'status_id'=>1,
			]
		);
		$kurikulum = kurikulum::create(
			[
				'nama'=>'Kurikulum KTSP',
				'status_id'=>2,
			]
		);
		$kurikulum = kurikulum::create(
			[
				'nama'=>'Kurikulum 2016',
				'status_id'=>1,
			]);
		
		$jurusan= jurusan::create(
			[
				'nama'=>'i`dad',
				'status_id'=>1,
			]
		);
		$jurusan= jurusan::create(
			[
				'nama'=>'IPA',
				'status_id'=>1,
			]
		);
		$jurusan= jurusan::create(
			[
				'nama'=>'IPS',
				'status_id'=>1,
			]
		);
		$jurusan= jurusan::create(
			[
				'nama'=>'Agama',
				'status_id'=>1,
			]
		);
		$jurusan= jurusan::create(
			[
				'nama'=>'Bahasa',
				'status_id'=>1,
			]
		);
    }
}
