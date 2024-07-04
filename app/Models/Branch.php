<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function branchCategory()
    {
        return $this->hasOne(BranchCategory::class,'id','branch_category_id');
    }
}
