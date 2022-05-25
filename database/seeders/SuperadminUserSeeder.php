<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperadminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ref_unor')->insert([
            'rinku' => 'asdqweasdqweasdqwe',
            'name' => 'Unornya LegendaryPowerfullAdmin',
        ]);
        DB::table('ref_bidang')->insert([
            'rinku' => 'asdqweasdqweasdqweq',
            'refUnor_id' => 1,
            'name' => 'Bidangnya LegendaryPowerfullAdmin',

        ]);
        DB::table('ref_subbid')->insert([
            'rinku' => 'asdqweasdqweasdqweqaa',
            'refBidang_id' => 1,
            'name' => 'Sub Bidang LegendaryPowerfullAdmin',

        ]);
        DB::table('users')->insert([
            'rinku' => 'wwasdqweasdqweasdqweqaa',
            'juugyouinBangou' => '11111',
            'nip9' => '11111 lama',
            'gelarDepan' => 'Dr. Prof.',
            'name' => 'LegendaryPowerfullAdmin',
            'gelarBelakang' => 'S.Ag, M.Med.Ed',
            'tempatLahir' => 'Kuvukiland',
            'email' => 'legendarypowerfulladmin@admin.com',
            'yuuzaaMei' => '11111',
            'reberu' => '0',
            'subBidang_id' => 1,
            'password' => Hash::make('pokoknya admin'),
        ]);
    }
}
