<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::truncate();

        $subject = new Subject();
        $subject->name = 'Lengua';
        $subject->course_id = 4;
        $subject->user_id = 8;
        $subject->matricula = str_random(10);
        $subject->save();


        $subject = new Subject();
        $subject->name = 'Matematicas';
        $subject->course_id = 4;
        $subject->user_id = 9;
        $subject->matricula = str_random(10);
        $subject->save();

        for ($i = 6; $i <= 21; $i++) {
            $subject = new Subject();
            $subject->name = 'Lengua';
            $subject->course_id = $i;
            $subject->user_id = 10;
            $subject->matricula = str_random(10);
            $subject->save();

            $subject = new Subject();
            $subject->name = 'Matematicas';
            $subject->course_id = $i;
            $subject->user_id = 10;
            $subject->matricula = str_random(10);
            $subject->save();
        }

    }
}
