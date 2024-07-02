<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getByCategory(int $limit_count = 5)
    {
        return $this->books()->with('category')->orderBy('borrow_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
            'name'
    ];
   
    public function books()   
    {
        return $this->hasMany(Book::class);  
    }
}
