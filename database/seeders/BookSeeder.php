<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('books')->insert([
                'user_id' => 1,
                'category_id' => 1,
                'title' => '技術哲学講義',
                'borrow_at' => new DateTime(),
                'return_at' => date("Y/m/d H:i:s", strtotime('+14 day')) . "\n",
         ]);
    }
}
