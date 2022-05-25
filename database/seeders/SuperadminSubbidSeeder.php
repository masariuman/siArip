<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperadminSubbidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ref_subbid')->insert([
            'rinku' => 'asdqweasdqweasdqweqaa',
            'refBidang_id' => 1,
            'name' => 'Sub Bidang LegendaryPowerfullAdmin',

        ]);

    }
}
