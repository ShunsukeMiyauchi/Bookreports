<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'title',
            'borrow_at',
            'return_at',
    ];
// 本がどのカテゴリーに属するかをいつ決めるか、またcategory_idをどう指定するか

    
    public function user()   
    {
        return $this->belongsTo(User::class);  
    }
    
    public function category()   
    {
        return $this->belongsTo(Category::class);  
    }
    
    public function report()   
    {
        return $this->hasOne(Report::class);  
    }
}


