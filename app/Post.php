<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','content','category_id','featured','slug','uesr_id' ];
    protected $dates=['deleted_at'];

    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    public function category()
    {

        return $this->belongsTo('App\Category') ;
    }
    public function tags()
    {
       return $this->belongsToMany('App\Tag');
    }

    public function uesr()
    {
        return $this->belongsTo('App\User') ;
    }
}
