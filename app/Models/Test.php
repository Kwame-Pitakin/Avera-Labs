<?php

namespace App\Models;

use App\Models\TestCombo;
use App\Models\Laboratory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['test_name','test_category_id','test_status','test_sample_id','target_gender'];

 
    protected $casts = [
        'test_sample_id' => 'array',
    ];

     public function test_category()
    {
        return $this->belongsTo(Test_category::class);
    }


     public function laboratories()
    {
        return $this->belongsToMany(Laboratory::class);
    }

    public function test_sample(){
        return $this->belongsToMany(Sample::class);
    }
    

    public function test_combos()
    {
        return $this->belongsToMany(TestCombo::class,'test_testcombo','combo_id','test_id');
    }
}
