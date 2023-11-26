<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $guarded = [];
    protected $fillable = ['user_id','image','alamat','kelas','phone'];


    public function savings()
    {
        return $this->hasMany(Saving::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
