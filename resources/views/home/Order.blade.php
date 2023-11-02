<!DOCTYPE html>
<html>

<style>
        /* Your custom styles here */

        .order-details {
            display: flex;
            align-items: center;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }

        .order-details img {
            max-width: 100px;
            margin-right: 20px;
        }

        .order-info {
            flex-grow: 1;
        }

        .order-info h4 {
            margin: 0;
            margin-bottom: 10px;
        }

        .order-info p {
            margin: 0;
            margin-bottom: 5px;
        }

    </style>
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
      @foreach($order as $order)
       <div class="order-details">
        <img src="product/{{$order->image}}" alt="Product Image">
        <div class="order-info">
            <h4>{{$order->product_title}}</h4>
            <p>Quantity: {{$order->quantity}}</p>
            <p>Price: {{$order->price}}</p>
            <p>Payment Status: {{$order->payment_status}}</p>
            <p>Delivery Status: 
                @if($order->delivery_status == 'You Canceled the order')
                    <span style="color: red;">{{$order->delivery_status}}</span>
                @elseif($order->delivery_status == 'delivered')
                <span style="color: green;">Order Delivered</span>
                @else
                    {{$order->delivery_status}}
                @endif
            </p>
            @if($order->delivery_status != 'You Canceled the order' && $order->delivery_status != 'delivered')
            <a class="btn btn-danger" onclick="confirmCancel({{ $order->id }})" href="{{url('cancel_order',$order->id)}}">Cancel Order</button></a>
            @endif
        </div>
    </div>
    @endforeach

    <!-- jQery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script>
        function confirmCancel(orderId) {
            if (confirm('Are you sure you want to cancel this order?')) {
                window.location.href = '/cancel_order/' + orderId;
            }
        }
    </script>
</body>

</html>