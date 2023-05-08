<?php

namespace App\Models;

use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratory extends Model
{
    use HasFactory;
    protected $fillable = ['lab_name','lab_address','latitude','longitude','lab_Ghanapost_gps','lab_email','lab_phone','lab_description','lab_status','lab_images_path','lab_logo_path','lab_rating','created_by'];
    protected $casts = [ 
        'all_tests' => 'array' // save songs as a json column
     ];
     protected $dates = ['name_field'];

  
     public function tests (){
        return $this->belongsToMany(Test::class)->withPivot('test_price','turn_around_time');
     }

     public function testCombos()
     {
      return $this->hasMany(TestCombo::class);
     }

     public function labStuff()
     {
       return $this->hasMany(LabStuff::class,'works_at');
     }
   //   relationship to user
     public function user(){
      return $this->belongsTo(User::class,'created_by');
     }
}
