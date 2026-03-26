<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $hidden = [
        "id",
        "created_at",
        "updated_at",
    ];
    public function scopeMale($query){
    $query->where("Age","<",30)->orWhere("Age",">",35)->get();
    }
}
