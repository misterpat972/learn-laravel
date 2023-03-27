<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function courses()
    {
        
        
        // hasMany() est une relation inverse de belongsTo() dans la classe Course
        return $this->hasMany(Course::class);
    }
}
