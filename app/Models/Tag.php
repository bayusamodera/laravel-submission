<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tags";
    protected $guarded = [];

    public function artikel(): belongsTo
    {
    	return $this->belongsTo(Artikel::class, 'artikel_id');
    }
}
