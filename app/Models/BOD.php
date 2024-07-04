<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOD extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }
    public function designation()
    {
        return $this->hasOne(Designation::class,'id','designation_id');
    }
}
