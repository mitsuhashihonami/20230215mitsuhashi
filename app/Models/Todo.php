<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tag_id', 'user_id'];

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }
}
