<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Artikel extends Model
{
    use HasFactory;
    protected $table = "artikel";
    protected $guarded = [];

    public function tags(): hasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function categories(): belongsTo
    {
        return $this->belongsTo(Categori::class, 'id_categories');
    }
}

