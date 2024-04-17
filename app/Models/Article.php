<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

//    public mixed $title;
//    public mixed $description;
//    public mixed $content;
    protected $fillable = [
        'title',
        'description',
        'content',
        'updated_by'
    ];
}
