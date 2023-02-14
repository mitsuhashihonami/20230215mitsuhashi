<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'name'
    ];
    public function getTitle()
    {
        return 'ID' . $this->id . ':' . $this->name;
    }
    public function todos()
    {
        return $this->hasMany('App\Models\Todo');
    }
}
