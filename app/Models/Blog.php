<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function blogCategory()
    {
        return $this->hasOne(BlogCategory::class,'id','blog_category_id');
    }
    public function blogTag()
    {
        return $this->hasOne(BlogTag::class,'id','blog_tag_id');
    }
    public function admin()
    {
        return $this->hasOne(User::class,'id','admin_id');
    }
}
