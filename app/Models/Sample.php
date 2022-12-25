<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sample extends Model
{
    use HasFactory;
    protected $fillable = ['sample_name'];


    public function tests()
    {
        return $this->belongsToMany(Test::class);
    }

    public function testCombos()
    {
        return $this->belongsToMany(TestCombo::class,'sample_testcombo','combo_id','sample_id');
    }
}
