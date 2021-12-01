<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
    protected $fillable = ["title", "author", "post_date", "post_content", "image_url", "category_id"];

    public function category(){
        return $this->belongsTo("App\Category");
    }

    public function tags(){
        return $this->belongsToMany("App\Tag");
    }

    public function getImagePrefix(){
        if (str_starts_with($this->image_url, "public")){
            return asset("storage") . "/";
        }
        return "";
    }
}
