<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperadminUnorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ref_unor')->insert([
            'rinku' => 'asdqweasdqweasdqwe',
            'name' => 'Unornya LegendaryPowerfullAdmin',
        ]);
    }
}
