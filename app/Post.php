<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Tag;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model

{
    protected $fillable=['title','content','category_id','featured','slug','user_id'];

    use SoftDeletes;
    protected $dates=['deleted_at'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function getFeaturedAttribute($featured){
        return asset($featured);
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','post_tag');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
