<?php

class ShoppingCartController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
public $restful = true;
public $layout = 'layouts.default';

	public function Shop()
	{


         //DB::table('products')->where('product_code','=','$product_code')->get(); 

        $results = DB::table('products')->where('id','>','2')->get();
		$view =	View::make('ShoppingCart')
				->with('data1', 'Shopping cart')
				->with('data2', $results);

			$this->layout->content = $view;
			$this->layout->title = 'Shopping';
			 
	}

    public function cart_update()
	{

           if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
			  {
				// $return_url = 'Shop'; //return url
				// session_destroy();
				// header('Location:'.$return_url);

					$results = DB::table('products')->where('id','>','2')->get();
					$view =	View::make('ShoppingCart')
						->with('data1', 'Shopping cart')
						->with('total', 0)
						->with('subtotal', 0)
						->with('data2', $results);

					$this->layout->content = $view;
					$this->layout->title = 'ShoppingGet';


					

			} 

			//add item in shopping cart
			if(isset($_POST["type"]) && $_POST["type"]=='add')
			{

				$Added_ProdToCart_code 	= filter_var($_POST["product_code"], FILTER_SANITIZE_STRING); //product code
				$Added_ProdToCart_qty 	= filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT); //product code

				if($Added_ProdToCart_qty > 10){
					die('<div align="center">This demo does not allowed more than 10 quantity!<br /><a href="http://localhost:9000/laravel/public/Shop">Back To Products</a>.</div>');
				}

		           $Added_ProdToCart = DB::table('products')->where('product_code','=', $Added_ProdToCart_code)->get();
					// $view =	View::make('ShoppingCart')
					// 	->with('data1', 'Shopping cart')
					// 	->with('data2', $Added_ProdToCart);

					// $this->layout->content = $view;
					// $this->layout->title = $Added_ProdToCart_qty;

				
				 if ($Added_ProdToCart) { //we have the product info 
					
				// 	//prepare array for the session variable
				 	$new_product = [['name'=>$Added_ProdToCart[0]->product_name, 'code'=>$Added_ProdToCart_code, 'qty'=>$Added_ProdToCart_qty, 'price'=>$Added_ProdToCart[0]->price]];
					
				 	  	if(isset($_SESSION["products"])) //if we have the session
						{
					  		$found = false; //set found item to false
						
				 		foreach ($_SESSION["products"] as $cart_itm) //loop through session array
						{
				 			if($cart_itm["code"] == $Added_ProdToCart_code){ //the item exist in array
				 				//next step useful in updating qty.
								$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$Added_ProdToCart_qty, 'price'=>$cart_itm["price"]);
				 				$found = true;
				 			 }//else
				 			// {
				 			// 	//item doesn't exist in the list, just retrive old info and prepare array for session var
				 			// 	$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
				 			// }
				 		}
						
						if($found == false) //we didn't find item in array
				 		{
				 			//add new user item in array
				 			//$_SESSION["products"] = array_merge($product, $new_product);
				 			$_SESSION["products"] = array_push($_SESSION["products"] , $new_product);

				 		}else{
				 			//found user item in array list, and increased the quantity 
				 			$_SESSION["products"] = $product;
				 		}
						
				 	}else{
				 		//create a new session var if does not exist
				 		$_SESSION["products"] = $new_product;
				 	}
					
				  }
				
				// //redirect back to original page
				// header('Location:'.$return_url);

				 		$view =	View::make('Test')
						->with('data1', 'Shopping chart')
						->with('data2', $new_product);

					$this->layout->content = $view;
					$this->layout->title = $Added_ProdToCart_qty;


			
			 }
	
			 
	}

}
