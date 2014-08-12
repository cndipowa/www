
Debug data 

 <pre>
 {{var_dump($data1)}}
</pre>  

 <pre>
 {{var_dump($_POST)}}
</pre>  

 <pre>
 {{var_dump($data2)}}
</pre>  




<div id="products-wrapper">
    <h1>Products</h1>
    <div class="products">
          @if (isset($data2)) 
			
			@foreach ($data2 as $obj)
			<div class="product"> 
            <form method="post" action="cart_update">
			<div class="product-thumb"><img src="images/{{$obj->product_img_name}}"></div>
            <div class="product-content"><h3>{{$obj->product_name}}</h3>
            <div class="product-desc">{{$obj->product_desc}}</div>
            <div class="product-info">
			Price {{$obj->price}}| 
            Qty <input type="text" name="product_qty" value="1" size="3" />
			<button class="add_to_cart">Add To Cart</button>
			</div></div>
            <input type="hidden" name="product_code" value="{{$obj->product_code}}" />
            <input type="hidden" name="type" value="add" />
            </form>
            </div>
			@endforeach

		@else
			<div>There are no products available.</div>
		@endif
    </div>
</div>

<div class="shopping-cart">
<h2>Your Shopping Cart</h2>

@if(isset($_SESSION["products"]))
{
    
    <ol>
    @foreach ($_SESSION["products"] as $cart_itm)
    
        <li class="cart-itm">
        <span class="remove-itm"><a href="cart_update?removep={{$cart_itm["code"]}}&return_url=xxx">&times;</a></span>
        <h3>{{$cart_itm["name"]}}</h3>
        <div class="p-code">P code : {{$cart_itm["code"]}}</div>;
        <div class="p-qty">Qty : {{$cart_itm["qty"]}}</div>
        <div class="p-price">Price :${{$cart_itm["price"]}}</div>
        </li>
        {{$subtotal = ($cart_itm["price"]*$cart_itm["qty"])}}
        {{$total = ($total + $subtotal)}}

     @endforeach
   </ol>
   <span class="check-out-txt"><strong>Total : {{$total}}</strong> <a href="view_cart">Check-out!</a></span>
   <span class="empty-cart"><a href="cart_update?emptycart=1&return_url=xxx">Empty Cart</a></span>
@else
    Your Cart is empty
@endif
</div>