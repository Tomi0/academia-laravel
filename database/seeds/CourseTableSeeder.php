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
        $category->name = 'Primero de primaria';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Segundo de primaria';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Tercero de primaria';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Cuarto de primaria';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Quinto de primaria';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        $category = new Course();
        $category->name = 'Sexto de primaria';
        $category->slug = str_slug($category->name);
        $category->course_id = 1;
        $category->save();

        // ESO
        $category = new Course();
        $category->name = 'Primero de ESO';
        $category->slug = str_slug($category->name);
        $category->course_id = 2;
        $category->save();

        $category = new Course();
        $category->name = 'Segundo de ESO';
        $category->slug = str_slug($category->name);
        $category->course_id = 2;
        $category->save();

        $category = new Course();
        $category->name = 'Tercero de ESO';
        $category->slug = str_slug($category->name);
        $category->course_id = 2;
        $category->save();

        $category = new Course();
        $category->name = 'Cuarto de ESO';
        $category->slug = str_slug($category->name);
        $category->course_id = 2;
        $category->save();

        // BACHILLER
        $category = new Course();
        $category->name = 'Primero de bachiller';
        $category->slug = str_slug($category->name);
        $category->course_id = 3;
        $category->save();

        $category = new Course();
        $category->name = 'Segundo de bachiller';
        $category->slug = str_slug($category->name);
        $category->course_id = 3;
        $category->save();

        // UNIVERSIDAD
        $category = new Course();
        $category->name = 'Primero de carrera';
        $category->slug = str_slug($category->name);
        $category->course_id = 5;
        $category->save();

        $category = new Course();
        $category->name = 'Segundo de carrera';
        $category->slug = str_slug($category->name);
        $category->course_id = 5;
        $category->save();

        $category = new Course();
        $category->name = 'Tercero de carrera';
        $category->slug = str_slug($category->name);
        $category->course_id = 5;
        $category->save();

        $category = new Course();
        $category->name = 'Cuarto de carrera';
        $category->slug = str_slug($category->name);
        $category->course_id = 5;
        $category->save();
    }
}
