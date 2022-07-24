<?php

namespace Database\Seeders;

use App\Models\FaqQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            ['faq_tab_id' => 1, 'question' => 'What is the purpose of this website?', 'answer' => 'This website is a tool to help you find the best place to stay in the city.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 1, 'question' => 'How do I find a place to stay?', 'answer' => 'You can search for a place by its name, address, or category.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 1, 'question' => 'How do I book a place?', 'answer' => 'You can book a place by clicking on the book button on the place page.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 1, 'question' => 'How do I contact a host?', 'answer' => 'You can contact a host by clicking on the contact button on the place page.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 2, 'question' => 'How do I report a problem?', 'answer' => 'You can report a problem by clicking on the report button on the place page.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 2, 'question' => 'How do I edit my profile?', 'answer' => 'You can edit your profile by clicking on the edit button on the profile page.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 2, 'question' => 'How do I change my password?', 'answer' => 'You can change your password by clicking on the change password button on the profile page.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 3, 'question' => 'How do I delete my account?', 'answer' => 'You can delete your account by clicking on the delete button on the profile page.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 3, 'question' => 'How do I change my email?', 'answer' => 'You can change your email by clicking on the change email button on the profile page.', 'created_at' => now(), 'updated_at' => now()],
            ['faq_tab_id' => 3, 'question' => 'How do I change my phone number?', 'answer' => 'You can change your phone number by clicking on the change phone number button on the profile page.', 'created_at' => now(), 'updated_at' => now()],
        ];
        FaqQuestion::insert($questions);
    }
}
