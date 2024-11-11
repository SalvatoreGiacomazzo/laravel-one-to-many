<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wanted extends Model
{
    use HasFactory;
    protected $table = 'wanted';

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}