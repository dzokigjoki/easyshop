<div class="product-item product-float-unset hover-trigger">
    <div class="product-img">
        <a href="/p/{{$product->id}}/{{$product->url}}">
            <img src="/uploads/products/{{$product->id}}/lg_{{$product->image}}" alt="" />
            
        </a>

        @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
        <div class="product-label">
            <span class="sale">Sale</span>
        </div>
        @endif
        
    </div>
    <div class="product_description_mobilna">
        <h6 class="product-title ime">
            <a href="/p/{{$product->id}}/{{$product->url}}">{{$product->title}}</a>
        </h6>
       <ul class="list-unstyled postHoverLinskList d-flex justify-content-center m-0">
			{{-- <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-heart d-block"></a></li> --}}
			<li class="mr-2 overflow-hidden addToCart"><a href="javascript:void(0);" class="icon-cart d-block" style="font-size: 20px; font-weight:bold;" data-add-to-cart="" productId="{{$product->id}}" value="{{$product->id}}" productTitle="{{$product->title}}" productImage="{{$product->image}}" productPrice="{{$product->price_retail_1}}"><span class="buyText">Buy</span></a></li>
			{{-- <li class="mr-2 overflow-hidden"><a href="javascript:void(0);" class="icon-eye d-block"></a></li>
			<li class="overflow-hidden"><a href="javascript:void(0);" class="icon-arrow d-block"></a></li> --}}
		</ul>
        <span class="price">
            @if( \EasyShop\Models\Product::hasDiscount( $product->discount ) )
            <?php
            $discount = EasyShop\Models\Product::getPriceRetail1($product, false, 0);
            $discountPercentage = (($product->price - $discount) / $product->price) * 100;
            ?>
            <del>
                <span>{{number_format($product->price, 0, ',', '.')}} USD</span>
            </del>
            <ins>
                <span class="amount">{{$discount}}USD</span>
            </ins>
            @else
            <ins>
                <span class="amount">{{number_format($product->price, 0, ',', '.')}} USD</span>
            </ins>
            @endif
        </span>
        {{-- <div class="btn-quickview">
            <a href="/p/{{$product->id}}/{{$product->url}}" class="btn btn-md btn-black ">
                <span>Купи</span>
            </a>
        </div> --}}
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".kupi").on("click",function(){
// productIds = []
            let productIds = sessionStorage.getItem("productIds").split(",");
            console.log(productIds);
            productIds.push($(this).attr("productId"));
            sessionStorage.removeItem(("productIds"));
            sessionStorage.setItem("productIds", JSON.stringify(productIds));
            sessionStorage.setItem("producttitle", $(this).attr("productTitle"));
            sessionStorage.setItem("productimage", $(this).attr("productImage"));
            sessionStorage.setItem("productprice", $(this).attr("productPrice"));
           
        });
    });
</script>
