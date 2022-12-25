<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Laboratory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratory_Test extends Model
{
    use HasFactory;

    protected $table = 'laboratory_test';

    protected $fillable = ['laboratory_id','test_id','turn_around_time','test_price'];

    public function lab()
    {
        return $this->belongsTo(Laboratory::class);
    }
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
