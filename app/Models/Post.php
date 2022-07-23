<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'Firstname',
        'Lastname',
        'category_id',
        'description',
        'image',
        'status'
    ];


    public function category()
    {

        return $this->belongsTo(Category::class, 'category_id', 'id');

    }

}
