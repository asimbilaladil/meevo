<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    
    protected $table = 'products';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sku', 'price', 'price_ek', 'description', 'brand', 'color', 'rating', 'rating_count', 'stock', 'search_keyword',
    ];


    public function getBrands(){
    	$brands = Product::select("brand")
    				->distinct()
    				->get();
    	return $brands;
    }

    public function getProducts(){
    	$products = Product::orderBy('price', 'asc')
    				->get();
    	return $products;
    }    
    
    public function getProductsByBrand($filter = ""){
        $products = Product::where("brand", $filter)
                    ->orderBy('price', 'asc')
                    ->get();
        return $products;
    }      
}
