<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class superadmin extends Seeder
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
        DB::table('ref_bidang')->insert([
            'rinku' => 'asdqweasdqweasdqweq',
            'refUnor_id' => 1,
            'name' => 'Bidangnya LegendaryPowerfullAdmin',

        ]);
        DB::table('ref