<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "whatsApp",
        "address",
        "membership_date",
        "status"
    ];
    protected $casts = [
        "membership_date"=>"date"
    ];
    public function borrowing(){
        return $this->belongsTo(borrowing::class);
    }
    public function activeBorrowing(){
        return $this->borrowing()->where('status');
    }

}
