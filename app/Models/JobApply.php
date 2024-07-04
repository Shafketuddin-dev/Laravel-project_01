<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function applyFor()
    {
        return $this->hasOne(Circular::class,'id','job_id');
    }
}
