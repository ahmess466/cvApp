<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function education(){
        return $this->hasOne(Level::class,'id','level_id');

    }
}
