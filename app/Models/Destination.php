<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected  $table ="destinations";
    protected $fillable =
    ['category_id',
     'name',
     'slug',
     'description',
     'average_price',
     'status',
     'image',
     'meta_title',
     'meta_keyword',
     'meta_description',
     'created_by'
    
    
    ];

    public function Category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
