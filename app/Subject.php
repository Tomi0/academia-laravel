<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = ['name', 'course_id', 'user_id', 'matricula'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public static function create(array $attributes = [])
    {
        $attributes['matricula'] = str_random(10);

        $subject = static::query()->create($attributes);

        return $subject;
    }

}
