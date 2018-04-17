<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'contenido', 'document_id', 'user_id'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->user()->id;

        $post = static::query()->create($attributes);

        $post->generateSlug();

        return $post;
    }

    public function generateSlug()
    {
        $this->slug = str_slug($this->name) . '-' . $this->id;

        $this->save();
    }
}
