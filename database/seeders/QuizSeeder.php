<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $now = Carbon::now();
        $quizzes = [
            ['topic_id' => 1, 'title' => 'Quiz: Introduction to C# OOP', 'total_points' => 10],
            ['topic_id' => 2, 'title' => 'Quiz: Classes and Objects', 'total_points' => 10],
            ['topic_id' => 3, 'title' => 'Quiz: Fields and Properties', 'total_points' => 10],
            ['topic_id' => 4, 'title' => 'Quiz: Methods', 'total_points' => 10],
            ['topic_id' => 5, 'title' => 'Quiz: Constructors', 'total_points' => 10],
            ['topic_id' => 6, 'title' => 'Quiz: Destructors', 'total_points' => 10],
            ['topic_id' => 7, 'title' => 'Quiz: Access Modifiers', 'total_points' => 10],
            ['topic_id' => 8, 'title' => 'Quiz: Encapsulation', 'total_points' => 10],
            ['topic_id' => 9, 'title' => 'Quiz: Inheritance', 'total_points' => 10],
            ['topic_id' => 10, 'title' => 'Quiz: Polymorphism', 'total_points' => 10],
            ['topic_id' => 11, 'title' => 'Quiz: Abstract Classes', 'total_points' => 10],
            ['topic_id' => 12, 'title' => 'Quiz: Interfaces', 'total_points' => 10],
            ['topic_id' => 13, 'title' => 'Quiz: Static Members', 'total_points' => 10],
            ['topic_id' => 14, 'title' => 'Quiz: Sealed Classes', 'total_points' => 10],
            ['topic_id' => 15, 'title' => 'Quiz: Partial Classes', 'total_points' => 10],
            ['topic_id' => 16, 'title' => 'Quiz: Nested Classes', 'total_points' => 10],
            ['topic_id' => 17, 'title' => 'Quiz: Generics', 'total_points' => 10],
            ['topic_id' => 18, 'title' => 'Quiz: Delegates', 'total_points' => 10],
            ['topic_id' => 19, 'title' => 'Quiz: Events', 'total_points' => 10],
            ['topic_id' => 20, 'title' => 'Quiz: LINQ Basics', 'total_points' => 10],
        ];

        foreach ($quizzes as &$q) {
            $q['created_at'] = $now;
            $q['updated_at'] = $now;
        }

        DB::table('quizzes')->insert($quizzes);
    }
}
