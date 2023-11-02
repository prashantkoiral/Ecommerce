<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">

    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Your content here -->
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
        <h2>Your Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product title</th>
                    <th>Product quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $Total=0;?>

                @foreach($card as $card)
                <tr>
                    <td>{{$card->product_title}}</td>
                    <td>{{$card->quantity}}</td>
                    <td>{{$card->price}}</td>
                    <td>
                        <img src="{{ asset('product/' . $card->image) }}" alt="Product Image" style="max-width: 100px;">
                    </td>
                    <td>
                        <a href="{{ route('remove_card', ['id' => $card->id]) }}" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
                <!-- Add more rows for other products as needed -->

                <?php $Total=$Total + $card->price ?>
                @endforeach
            </tbody>


        </table>
        <div class="cart-total">
    <h3>Total: {{$Total}}</h3>
    <a href="{{url('cash_order')}}">
        <button class="btn btn-success">Cash On Delivery</button>
    </a>
    <a href="{{url('stripe', $Total)}}">
        <button class="btn btn-success">Pay Using Card</button>
    </a>
</div>

    </div>





    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>

    <!-- jQery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
</body>

</html>