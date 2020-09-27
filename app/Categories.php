<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table ='categories';
    protected $fillable = ['nama_categories'];

    public function Article()
    {
        return $this->belongsToMany('App\Article');
    }
}