<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Involvement extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function bod()
    {
        return $this->hasOne(BOD::class,'id','bod_id');
    }
}
