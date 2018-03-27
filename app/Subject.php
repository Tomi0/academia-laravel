<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

}
