<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    public function course(){
        // belongsTo() est une relation inverse de hasMany() dans la classe Course
        return $this->belongsTo(Course::class);
    }
}
