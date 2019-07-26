<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Authorsテーブルに10件登録を行う
        $now = \Carbon\Carbon::now();
        for($i = 1; $i <= 10; $i++ ){
            $author = [
                'name' => 'authors'. $i,
                'kana' => 'kana'. $i,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            DB::table('authors')->insert($author);
        }
    }
}
