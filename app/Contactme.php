<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactme extends Model
{
    protected $fillable = ['name', 'email', 'message'];

    public static function create(array $attributes = [])
    {
        $category = static::query()->create($attributes);

        return $category;
    }
}
