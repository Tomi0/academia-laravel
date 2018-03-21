<?php

use App\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::truncate();

        $category = new Course();
        $category->name = 'Primaria';
        $category->slug = str_slug($category->name);
        $category->save();

        $category = new Course();
        $category->name = 'ESO';
        $category->slug = str_slug($category->name);
        $category->save();

        $category = new Course();
        $category->name = 'Bachiller';
        $category->slug = str_slug($category->name);
        $category->save();

        $category = new Course();
        $category->name = 'PAU';
        $category->slug = str_slug($category->name);
        $category->save();

        $category = new Course();
        $category->name = 'Universidad';
        $category->slug = str_slug($category->name);
        $category->save();

        // PRIMARIA
        $category = new Course();
        $category->name = 'Primero';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Segundo';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Tercero';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Cuarto';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Quinto';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Sexto';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        // ESO
        $category = new Course();
        $category->name = 'Primero';
        $category->slug = str_slug($category->name);
        $category->course_id = 2;
        $category->save();

        $category = new Course();
        $category->name = 'Segundo';
        $category->slug = str_slug($category->name);
        $category->course_id = 2;
        $category->save();

        $category = new Course();
        $category->name = 'Tercero';
        $category->slug = str_slug($category->name);
        $category->course_id = 2;
        $category->save();

        $category = new Course();
        $category->name = 'Cuarto';
        $category->slug = str_slug($category->name);
        $category->course_id = 2;
        $category->save();

        // BACHILLER
        $category = new Course();
        $category->name = 'Primero';
        $category->slug = str_slug($category->name);
        $category->course_id = 3;
        $category->save();

        $category = new Course();
        $category->name = 'Segundo';
        $category->slug = str_slug($category->name);
        $category->course_id = 3;
        $category->save();

        // UNIVERSIDAD
        $category = new Course();
        $category->name = 'Primero';
        $category->slug = str_slug($category->name);
        $category->course_id = 5;
        $category->save();

        $category = new Course();
        $category->name = 'Segundo';
        $category->slug = str_slug($category->name);
        $category->course_id = 5;
        $category->save();

        $category = new Course();
        $category->name = 'Tercero';
        $category->slug = str_slug($category->name);
        $category->course_id = 5;
        $category->save();

        $category = new Course();
        $category->name = 'Cuarto';
        $category->slug = str_slug($category->name);
        $category->course_id = 5;
        $category->save();
    }
}
