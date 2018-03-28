<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    protected $fillable = ['name', 'description', 'subject_id', 'url'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // se sobreescribe el metodo del padre
    public static function boot()
    {
        parent::boot();

        // se ejecuta cuando se hace un delete
        static::deleting(function ($document) {
            // Borra el fichero
            Storage::disk('public')->delete($document->url);
        });
    }

    public static function create(array $attributes = [])
    {
        $attributes['url'] = request()->file('document-file')->store('documents','public');
        $attributes['subject_id'] = request()->subject->id;
        unset($attributes['document-file']);

        $doc = static::query()->create($attributes);

        return $doc;
    }

}
