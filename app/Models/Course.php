<?php

namespace App\Models;

use App\Models\User;
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


    public function user(){
        return $this->belongsTo(User::class);
    }
}
