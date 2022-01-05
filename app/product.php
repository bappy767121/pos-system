<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=['category_id','title', 'description', 'price', 'cost_price'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function arrayForSelect(){
        $arr=[];
        $products= product::all();
        foreach ($products as $product){
            $arr[$product->id] = $product->title;
        }
        return $arr;

    }

}
