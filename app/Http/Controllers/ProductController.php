<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Storage;

/**
 * Its a product controller that handles api from products, geting data from 
 * model and returns to the view. 
 *
 */ 
class ProductController extends Controller {


    /**
     * Read xls file from the resources and insert records in Database
     *
     * @return Json for success. 
     */ 
    public function store() {
        $contents = $this->getProductsFromFile();
        $xml = simplexml_load_string($contents);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);

        Product::query()->truncate();

        foreach ($array['PRODUCT'] as $p) {
            $product = new Product;
            $product->id = $p['PRODUCT_ID'];
            $product->name = $p['NAME'];
            $product->sku = $p['SKU'];
            $product->price = $p['PRICE'];
            $product->price_ek = $p['PRICE_EK'];
            $product->description = $p['DESCRIPTION'];
            $product->brand = $p['BRAND'];
            $product->color = $p['COLOR'];
            $product->rating = $p['RATING'];
            $product->rating_count = $p['RATING_COUNT'];
            $product->stock = $p['STOCK'];
            $product->search_keyword = ($p['SEARCH_KEYWORDS'] ? $p['SEARCH_KEYWORDS'] : "");
            $product->save();

        }

        return response()->json([
            'message' => "Data added to database",
            'status' => true,
        ]);    
    }


    /**
     * Method to check whether file exist or not.
     *
     * @return return file if exist otherwise null, 
     */ 
    public function getProductsFromFile() {
        if (Storage::exists('products.xml')){
            return Storage::get('products.xml');    
        }
        return null;        
    }


    /**
     * Get brands from database and returns its json 
     *
     * @return Json returns array of brand object 
     */ 
    public function brands(){
        $product = new Product;
        $brands = $product->getBrands();
        return response()->json([
            'data' => $brands,
            'status' => true,
        ]);         
    }


    /**
     * Get all products from database and returns its json
     *
     * @return Json returns array of product object. 
     */ 
    public function allProducts(){
        $product = new Product;
        $products = $product->getProducts();
        return response()->json([
            'data' => $products,
            'status' => true,
        ]);         
    } 

    /**
     * Get all products by brands in json
     *
     * @param int   Brand Id for getting products by brand 
     *
     * @return Json returns array of product object. 
     */ 
    public function productsByBrand($brand){
        $product = new Product;
        $products = $product->getProductsByBrand($brand);
        return response()->json([
            'data' => $products,
            'status' => true,
        ]);         
    }        
}