<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function imageCategory()
    {
        return $this->hasOne(ImageCategory::class,'id','image_category_id');
    }
}
