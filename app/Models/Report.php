<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);;
    }
    
    protected $fillable = [
            'body',
            'book_id',
            'user_id'
    ];

    
    public function user()   
    {
        return $this->belongsTo(User::class);  
    }
    
    public function book()   
    {
        return $this->hasOne(Book::class, 'id', 'book_id');  
    }
}
