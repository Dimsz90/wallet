<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    protected $table = 'savings';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function month()
    {
        return $this->belongsTo(Month::class);
    }
    public function savings()
    {
       return $this->hasMany(Saving::class);
    }
}
