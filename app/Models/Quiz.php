<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id','image','user_id'];

    public function categories() {
        return $this -> belongsTo(Category::class);
    }
}
