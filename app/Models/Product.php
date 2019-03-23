<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'url_pict',
        'description',
    ];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
