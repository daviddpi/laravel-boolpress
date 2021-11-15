<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "author", "post_date", "post_content", "image_url"];
}
