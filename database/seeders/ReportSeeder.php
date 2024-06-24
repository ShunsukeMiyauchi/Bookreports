<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('reports')->insert([
                'user_id' => 1,
                'book_id' => 1,
                'body' => 'この本はクーケルバーグが書いた本です。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'deleted_at' => date("Y/m/d H:i:s", strtotime('+1 day')) . "\n",
                ]);
    }
}
