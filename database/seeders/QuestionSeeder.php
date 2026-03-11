<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\QuestionOption;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            'کیا گارڈ وقت کی پابندی کرتا ہے؟',
            'کیا گارڈ کی ظاہری شخصیت درست ہے؟',
            'کیا گارڈ کا یونیفارم اسٹینڈرڈ درست ہے؟',
            'کیا گارڈ ڈیوٹی کے وقت پوسٹ پر موجود ہوتا ہے؟',
            'کیا گارڈ کی وہین کی حالت درست ہے؟',
            'کیا گارڈ کے پاس لائسنسی بندوق موجود ہے؟',
            'کیا الارم پر کوئی غیر معمولی آواز آتی ہے؟',
            'کیا کوئی مشکوک شخص یا چیز نظر آتی ہے؟',
            'کیا اے ٹی ایم صحیح حالت میں موجود ہے؟',
            'کیا تمام دروازے اور کھڑکیاں بند ہیں؟',
            'کیا پارکنگ میں کوئی مشکوک حرکت نظر آئی ہے؟',
        ];

        $options = ['Yes', 'No', 'N/A'];

        foreach ($questions as $questionText) {

            $question = Question::create([
                'question' => $questionText,
                'allow_custom_answer' => false
            ]);

            foreach ($options as $optionText) {
                QuestionOption::create([
                    'question_id' => $question->id,
                    'option_text' => $optionText
                ]);
            }
        }
    }
}