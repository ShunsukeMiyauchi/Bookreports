<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
            'title',
            'borrow_at',
            'return_at',
            'category_id',
            'user_id'
    ];

    public $timestamps = false; // https://qiita.com/ikadatic/items/2237a3c1b837894dfc30
    
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
        return $this->hasOne(Report::class, 'book_id', 'id');  
    }
}


