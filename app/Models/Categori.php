<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Categori extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $guarded = [];

    public function artikel(): hasMany
    {
        return $this->hasMany(Artikel::class); 
    }
}
