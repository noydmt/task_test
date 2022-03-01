<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Shop extends Model
{
    public function area() {
        return $this->belongsTo(Area::class);
    }
}
