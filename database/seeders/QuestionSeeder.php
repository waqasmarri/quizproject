<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            [
                'question' => 'What is PHP?',
            ],
            [
                'question' => 'What is the difference between GET and POST methods in PHP?',
            ],
            [
                'question' => 'What is jQuery?',
            ],
            [
                'question' => 'What is the difference between attr() and prop() methods in jQuery?',
            ],
            [
                'question' => 'What is Ajax?',
            ],
            [
                'question' => 'How to make an Ajax request in jQuery?',
            ],
            [
                'question' => 'What is HTML?',
            ],
            [
                'question' => 'What is the difference between HTML and XHTML?',
            ],
            [
                'question' => 'What is the purpose of the alt attribute in HTML?',
            ],
            [
                'question' => 'What is the difference between span and div in HTML?',
            ],
        ]);
    }
}
