<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample_Testcombo extends Model
{
    use HasFactory;

    protected $table = 'sample_testcombo' ;

    protected $fillable = ['combo_id', 'sample_id'];

    public function setCatAttribute($value)
    {
        $this->attributes['sample_id'] = json_encode($value);
    }

    public function getCatAttribute($value)
    {
        return $this->attributes['sample_id'] = json_decode($value);
    }
}
