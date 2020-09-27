<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['image','title','description','tags','release_date'];

    public function categories()
    {
        return $this->belongsToMany('App\Categories');
    }
}
