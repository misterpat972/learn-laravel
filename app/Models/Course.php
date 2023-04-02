<?php

namespace App\Models;

use App\Models\User;
use App\Models\Section;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    public function category()
    {
       // belongsTo() est une relation inverse de hasMany() dans la classe Category 
        return $this->belongsTo(Category::class);
    }

// function user est une relation inverse de hasMany() dans la classe User
    public function user(){
        // belongsTo() est une reletion qui permet de faire une relation inverse de hasMany() dans la classe User
        return $this->belongsTo(User::class);
    }

    public function sections(){
        // hasMany() est une relation qui permet de faire une relation inverse de belongsTo() dans la classe Section
        return $this->hasMany(Section::class);
    }
}
