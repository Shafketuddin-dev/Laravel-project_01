<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function thanas()
    {
        return $this->hasMany(Thana::class);
    }
}
