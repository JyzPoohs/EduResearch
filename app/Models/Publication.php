<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'publisher_id',
        'title',
        'author',
        'type',
        'date',
        'keywords',
        'doi',
        'url',
        'abstract',
        'file',
    ];

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher_id', 'id');
    }
}
