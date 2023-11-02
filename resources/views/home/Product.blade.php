<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <!-- Use the correct variable name $products -->
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                <div class="option_container">
    <div class="options">
        <a href="{{ url('product_details', $product->id) }}" class="option1">
            Product Detail
        </a>
        <form action="{{ url('add_cart', $product->id) }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="quantity-input">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
            </div>
            <button type="submit" class="option1">Add to Cart</button>
        </form>
    </div>
</div>


                    <div class="img-box">
                        <img src="product/{{$product->image}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5 style="font-size: 18px; font-weight: bold; margin-top: 10px; color: #333;">
                            {{$product->title}}
                        </h5>
                        @if($product->discount_price != null)
                        <h6 style="font-size: 16px; color: #ff6600;">
                            Discounted Price: {{$product->discount_price}}
                        </h6>
                        @endif
                        <h6 style="font-size: 14px; color: #777; text-decoration: line-through;">
                            Regular Price: {{$product->price}}
                        </h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div style="display: flex; justify-content: center; margin-top: 20px;">
                    {{ $products->links('pagination::bootstrap-4') }}
                    <!-- Apply Bootstrap 4 styles to pagination links -->
                </div>
            </div>
        </div>

    </div>
</section>