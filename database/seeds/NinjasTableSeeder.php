<?php

use App\Ninja;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NinjasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ninjas')->insert([
            "name" => "Tung",
            "address" => "1xx Tran duy hung",
            "specialSkill" => "Rasengan",
            "city_id" => "1",
        ]);
        DB::table('ninjas')->insert([
            "name" => "Hai",
            "address" => "1xx Tran duy hung",
            "specialSkill" => "Chidori",
            "city_id" => "2",
        ]);
        DB::table('ninjas')->insert([
            "name" => "Duong",
            "address" => "1xx Tran duy hung",
            "specialSkill" => "SexyNojutsu",
            "city_id" => "3",
        ]);
        DB::table('ninjas')->insert([
            "name" => "Hiep",
            "address" => "1xx Tran duy hung",
            "specialSkill" => "Hoa Cho",
            "city_id" => "4",
        ]);

    }
}
