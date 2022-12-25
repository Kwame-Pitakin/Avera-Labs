<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Laboratory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestCombo extends Model
{
    use HasFactory;
    protected $fillable = ['combo_name','combo_tags','combo_price','turn_around_time','combo_target_gender','combo_description'.'accurate_from','combo_status'];


    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class);
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class,'test_testcombo','combo_id','test_id');
    }

    public function combo_sample()
    {
        return $this->belongsToMany(Sample::class,'sample_testcombo','testcombo_id','sample_id');
    }

}
