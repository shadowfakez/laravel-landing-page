<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Portfolio;

class PortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('portfolios')->insert([
            'name' => 'SMS Mobile App',
            'images' => 'portfolio_pic1.jpg',
            'filter' => 'appleIOS',
        ]);

        DB::table('portfolios')->insert([
            'name' => 'Finance App',
            'images' => 'portfolio_pic2.jpg',
            'filter' => 'design',
        ]);

        DB::table('portfolios')->insert([
            'name' => 'Concept',
            'images' => 'portfolio_pic3.jpg',
            'filter' => 'design',
        ]);

        DB::table('portfolios')->insert([
            'name' => 'Shopping',
            'images' => 'portfolio_pic4.jpg',
            'filter' => 'android',
        ]);

        DB::table('portfolios')->insert([
            'name' => 'Management',
            'images' => 'portfolio_pic5.jpg',
            'filter' => 'design',
        ]);

        DB::table('portfolios')->insert([
            'name' => 'iPhone',
            'images' => 'portfolio_pic6.jpg',
            'filter' => 'web',
        ]);

        DB::table('portfolios')->insert([
            'name' => 'Nexus Phone',
            'images' => 'portfolio_pic7.jpg',
            'filter' => 'web',
        ]);

        DB::table('portfolios')->insert([
            'name' => 'Android',
            'images' => 'portfolio_pic8.jpg',
            'filter' => 'android',
        ]);
    }
}
