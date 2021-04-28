<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Item extends Model
{
    //

	 protected $fillable = [
        'itemName','brandName', 'stocks', 'price', 'lastPrice', 'category'
    ];

    public function searchItem($filters){

    	$items = Item::where('category', $filters['category'])
    				   ->where('brandName', $filters['brandName'])
    				   ->get();

    				  
   		return $items;
    }
    	
}
