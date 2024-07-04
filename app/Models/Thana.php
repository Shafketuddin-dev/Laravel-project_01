<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function coverage()
    {
        return $this->hasMany(Coverage::class);
    }
}
