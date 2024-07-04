<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function packageCategory()
    {
        return $this->hasOne(PackageCategory::class,'id','package_category_id');
    }
}
