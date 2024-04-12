<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'content',
        'user_id',
        'categorie_id',
    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function categories(){

        return $this->belongsToMany(Categorie::class);

    }
}
