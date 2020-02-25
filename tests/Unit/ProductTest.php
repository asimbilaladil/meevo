<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;



class ProductTest extends TestCase
{
	
	use RefreshDatabase;

	protected $table = 'products';

    /**
     * A basic unit test example.
     *
     * @return void
     */
  	
  	public function createProduct()
    {
        $product = factory(Product::class)->create();
        return $product;
    }

  	public function testGetBrands()
    {
        $response = $this->get('/brands');
        // $response->dumpHeaders();
        // $response->dump();
        $response->assertOk();
        $response->assertStatus(200);
    }

  	public function testGetProducts()
    {
        $response = $this->get('/get');
        $response->assertStatus(200);
    }

  	public function testGetProductsByBrand()
    {
    	$product = $this->createProduct();
    	$brand = $product->brand;
        $response = $this->get('/byBrand/'.$brand);
        $response->assertStatus(200);
    }

	public function testDatabase()
	{
		$product = factory(Product::class)->create();

		$data = array(
			'name' => $product->name, 
	    	'sku' => $product->sku, 
	    	'price' => $product->price, 
	    	'price_ek' => $product->price_ek, 
	    	'description' => $product->description, 
	    	'brand' => $product->brand, 
	    	'color' => $product->color, 
	    	'rating' => $product->rating, 
	    	'rating_count' => $product->rating_count, 
	    	'stock' => $product->stock, 
	    	'search_keyword' => $product->search_keyword,
		);
		$this->assertDatabaseHas($this->table , $data);	
 		$this->assertTrue(true);
	}    
}
