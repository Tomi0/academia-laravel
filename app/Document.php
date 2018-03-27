<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    protected $fillable = ['url'];

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

}
