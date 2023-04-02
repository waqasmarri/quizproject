<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            [
                'question_id' => 1,
                'answer' => 'Hypertext Preprocessor',
                'is_correct' => true
            ],
            [
                'question_id' => 1,
                'answer' => 'Hypertext Markup Language',
                'is_correct' => false
            ],
            [
                'question_id' => 1,
                'answer' => 'Java',
                'is_correct' => false
            ],
            [
                'question_id' => 1,
                'answer' => 'Python',
                'is_correct' => false
            ],
            [
                'question_id' => 2,
                'answer' => 'GET method appends the data to the URL while POST method sends the data in the request body',
                'is_correct' => true
            ],
            [
                'question_id' => 2,
                'answer' => 'POST method appends the data to the URL while GET method sends the data in the request body',
                'is_correct' => false
            ],
            [
                'question_id' => 2,
                'answer' => 'GET method is used for submitting forms while POST method is used for retrieving data',
                'is_correct' => false
            ],
            [
                'question_id' => 2,
                'answer' => 'POST method is used for submitting forms while GET method is used for retrieving data',
                'is_correct' => false
            ],
            [
                'question_id' => 3,
                'answer' => 'A fast, small, and feature-rich JavaScript library',
                'is_correct' => true
            ],
            [
                'question_id' => 3,
                'answer' => 'A server-side programming language',
                'is_correct' => false
            ],
            [
                'question_id' => 3,
                'answer' => 'A markup language used for creating web pages',
                'is_correct' => false
            ],
            [
                'question_id' => 3,
                'answer' => 'A programming language used for creating mobile apps',
                'is_correct' => false
            ],
            [
                'question_id' => 4,
                'answer' => 'attr() method is used to get or set the value of an attribute while prop() method is used to get or set the value of a property',
                'is_correct' => true
            ],
            [
                'question_id' => 4,
                'answer' => 'attr() method is used to get or set the value of a property while prop() method is used to get or set the value of an attribute',
                'is_correct' => false
            ],
            [
                'question_id' => 4,
                'answer' => 'attr() method is used to add or remove an attribute while prop() method is used to add or remove a property',
                'is_correct' => false
            ],
            [
                'question_id' => 4,
                'answer' => 'attr() method is used to add or remove a property while prop() method is used to add or remove an attribute',
                'is_correct' => false
            ],
            ['question_id' => 5,            'answer' => 'Ajax stands for Asynchronous JavaScript and XML',            'is_correct' => true],
            ['question_id' => 5,            'answer' => 'Ajax stands for Asynchronous Java and XML',            'is_correct' => false],
            ['question_id' => 5,            'answer' => 'Ajax stands for Asynchronous JSON and XML',            'is_correct' => false],
            ['question_id' => 5,            'answer' => 'Ajax stands for Asynchronous JavaScript and XHTML',            'is_correct' => false],
            ['question_id' => 6,            'answer' => '$.ajax()',            'is_correct' => false],
            ['question_id' => 6,            'answer' => '$.get()',            'is_correct' => false],
            ['question_id' => 6,            'answer' => '$.post()',            'is_correct' => false],
            ['question_id' => 6,            'answer' => '$.load()',            'is_correct' => true],
            ['question_id' => 7,            'answer' => 'Hypertext Markup Language',            'is_correct' => true],
            ['question_id' => 7,            'answer' => 'Hyperlink Text Markup Language',            'is_correct' => false],
            ['question_id' => 7,            'answer' => 'Hypertext Media Language',            'is_correct' => false],
            ['question_id' => 7,            'answer' => 'Hypermedia and Text Markup Language',            'is_correct' => false],
            ['question_id' => 8,            'answer' => 'XHTML is stricter than HTML',            'is_correct' => true],
            ['question_id' => 8,            'answer' => 'XHTML is not supported by all browsers',            'is_correct' => false],
            ['question_id' => 8,            'answer' => 'XHTML allows for more dynamic web pages than HTML',            'is_correct' => false],
            ['question_id' => 8,            'answer' => 'There is no difference between HTML and XHTML',            'is_correct' => false],
            ['question_id' => 9,            'answer' => 'The alt attribute describes an image for people who cannot see it',            'is_correct' => true],
            ['question_id' => 9,            'answer' => 'The alt attribute specifies the location of an image',            'is_correct' => false],
            ['question_id' => 9,            'answer' => 'The alt attribute defines the size of an image',            'is_correct' => false],
            ['question_id' => 9,            'answer' => 'The alt attribute changes the color of an image',            'is_correct' => false],
            [
                'question_id' => 10,
                'answer' => 'The div element is used for grouping and applying styles to block-level content, while the span element is used for grouping and applying styles to inline-level content',
                'is_correct' => false
            ],
            [
                'question_id' => 10,
                'answer' => 'The div element is used for grouping and applying styles to inline-level content, while the span element is used for grouping and applying styles to block-level content',
                'is_correct' => false
            ],
            [
                'question_id' => 10,
                'answer' => 'The div element is a block-level element, while the span element is an inline element',
                'is_correct' => true
            ],
            [
                'question_id' => 10,
                'answer' => 'The div element is an inline element, while the span element is a block-level element',
                'is_correct' => false
            ],
        ]);
    }
}
