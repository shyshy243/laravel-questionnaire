<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
        ['text' => 'What is your favorite programming language?'],
        ['text' => 'How many hours a day do you code?'],
        ['text' => 'What do you like most about Laravel?'],


    ];


        Question::insert($questions);
    }
}
