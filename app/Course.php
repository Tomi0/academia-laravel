<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public static function create(array $attributes = [])
    {
        $course = static::query()->create($attributes);

        $course->generateSlug();

        return $course;
    }

    // genera un slug, si existe ya en la base de datos le concatena el id del curso
    public function generateSlug()
    {
        $this->slug = str_slug($this->name) . '-' . $this->id;

        $this->save();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
