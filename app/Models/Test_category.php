<?php

namespace App\Models;

use App\Models\Test;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test_category extends Model
{
    use HasFactory;

    public function tests(){

        return $this->hasMany(Test::class);
    }
}
