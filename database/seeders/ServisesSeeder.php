<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Android',
            'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text..",
            'icon' => 'fa-android',
        ]);

        DB::table('services')->insert([
            'name' => 'Apple IOS',
            'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text..",
            'icon' => 'fa-apple',
        ]);

        DB::table('services')->insert([
            'name' => 'Design',
            'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text..",
            'icon' => 'fa-dropbox',
        ]);

        DB::table('services')->insert([
            'name' => 'Concept',
            'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text..",
            'icon' => 'fa-html5',
        ]);

        DB::table('services')->insert([
            'name' => 'User Research',
            'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text..",
            'icon' => 'fa-slack',
        ]);

        DB::table('services')->insert([
            'name' => 'User Experience',
            'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text..",
            'icon' => 'fa-users',
        ]);
    }
}
