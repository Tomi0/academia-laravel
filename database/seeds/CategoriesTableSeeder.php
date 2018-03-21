<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $category = new Category();
        $category->name = 'Primaria';
        $category->slug = str_slug($category->name);
        $category->save();

        $category = new Category();
        $category->name = 'ESO';
        $category->slug = str_slug($category->name);
        $category->save();

        $category = new Category();
        $category->name = 'Bachiller';
        $category->slug = str_slug($category->name);
        $category->save();

        $category = new Category();
        $category->name = 'PAU';
        $category->slug = str_slug($category->name);
        $category->save();

        $category = new Category();
        $category->name = 'Universidad';
        $category->slug = str_slug($category->name);
        $category->save();

        // PRIMARIA
        $category = new Category();
        $category->name = 'Primero';
        $category->slug = str_slug($category->name);
        $category->category_id = 1;
        $category->save();

        $category = new Category();
        $category->name = 'Segundo';
        $category->slug = str_slug($category->name);
        $category->category_id = 1;
        $category->save();

        $category = new Category();
        $category->name = 'Tercero';
        $category->slug = str_slug($category->name);
        $category->category_id = 1;
        $category->save();

        $category = new Category();
        $category->name = 'Cuarto';
        $category->slug = str_slug($category->name);
        $category->category_id = 1;
        $category->save();

        $category = new Category();
        $category->name = 'Quinto';
        $category->slug = str_slug($category->name);
        $category->category_id = 1;
        $category->save();

        $category = new Category();
        $category->name = 'Sexto';
        $category->slug = str_slug($category->name);
        $category->category_id = 1;
        $category->save();

        // ESO
        $category = new Category();
        $category->name = 'Primero';
        $category->slug = str_slug($category->name);
        $category->category_id = 2;
        $category->save();

        $category = new Category();
        $category->name = 'Segundo';
        $category->slug = str_slug($category->name);
        $category->category_id = 2;
        $category->save();

        $category = new Category();
        $category->name = 'Tercero';
        $category->slug = str_slug($category->name);
        $category->category_id = 2;
        $category->save();

        $category = new Category();
        $category->name = 'Cuarto';
        $category->slug = str_slug($category->name);
        $category->category_id = 2;
        $category->save();

        // BACHILLER
        $category = new Category();
        $category->name = 'Primero';
        $category->slug = str_slug($category->name);
        $category->category_id = 3;
        $category->save();

        $category = new Category();
        $category->name = 'Segundo';
        $category->slug = str_slug($category->name);
        $category->category_id = 3;
        $category->save();

        // UNIVERSIDAD
        $category = new Category();
        $category->name = 'Primero';
        $category->slug = str_slug($category->name);
        $category->category_id = 5;
        $category->save();

        $category = new Category();
        $category->name = 'Segundo';
        $category->slug = str_slug($category->name);
        $category->category_id = 5;
        $category->save();

        $category = new Category();
        $category->name = 'Tercero';
        $category->slug = str_slug($category->name);
        $category->category_id = 5;
        $category->save();

        $category = new Category();
        $category->name = 'Cuarto';
        $category->slug = str_slug($category->name);
        $category->category_id = 5;
        $category->save();



    }
}
