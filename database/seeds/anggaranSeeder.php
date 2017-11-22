<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class anggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 101; $i++) { 
	    	DB::table('anggaran_post')->insert([
	            'kategori' => 'Laporan Anggaran Dinas Dalam Kota',
	            'laporan' => $i,
	            'biaya_konsumsi' => $i.'000',
	            'biaya_transport' => $i.'000',
	            'biaya_penginapan' => $i.'000',
	            'nama_penanggungjawab' => str_random(10),
	            'nip_penanggungjawab' => $i.$i.$i.$i,
	            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
	        ]);
    	}
    }
}
