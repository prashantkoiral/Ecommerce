<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
    /* Your custom styles here */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        color: white;
        /* Set text color to white */
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- Sidebar -->
        @include('admin.sidebar')

        <div class="container-fluid page-body-wrapper ">
            <div class="main-panel">
                <!-- Navbar -->
                @include('admin.nevbar')
                <!-- Content -->
                <div class="content-wrapper ">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{url('search')}}" method="GET" class="mb-3">
                                @csrf
                                <div class="input-group">
                                    <input type="text" style="color:white;" class="form-control" name="search"
                                        placeholder="Search by name or email">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                            <h2>Order Information</h2>

                            <div class="table-responsive">
                                @if(isset($message))
                                <p class="text-danger">{{ $message }}</p>
                                @endif
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>

                                            <th style="color: white;">Name</th>
                                            <th style="color: white;">Email</th>
                                            <th style="color: white;">Phone</th>
                                            <th style="color: white;">Address</th>
                                            <th style="color: white;">Product Title</th>
                                            <th style="color: white;">Quantity</th>
                                            <th style="color: white;">Price</th>
                                            <th style="color: white;">Image</th>
                                            <th style="color: white;">Payment Status</th>
                                            <th style="color: white;">Delivery Status</th>
                                            <th style="color: white;">Delivered</th>
                                            <th style="color: white;">Print PDF</th>

                                        </tr>
                                    </thead>
                                    @foreach($Order as $Order)
                                    <tbody>
                                        <tr>

                                            <td>{{$Order->name}}</td>
                                            <td>{{$Order->email}}</td>
                                            <td>{{$Order->phone}}</td>
                                            <td>{{$Order->address}}</td>

                                            <td>{{$Order->product_title}}</td>
                                            <td>{{$Order->quantity}}</td>
                                            <td>{{$Order->price}}</td>
                                            <td><img src="product/{{$Order->image}}" alt="Product A" width="100"></td>

                                            <td>{{$Order->payment_status}}</td>
                                            <td>{{$Order->delivery_status}}</td>
                                            <td>
                                                @if($Order->delivery_status=='processing')
                                                <a href="{{ url('delivered', $Order->id) }}" class="btn btn-primary"
                                                    onclick="return confirm('Are you sure this product is delivered?')">Delivered</a>

                                                @else
                                                <P style="color:red">Delivered</P>
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{url('print_pdf',$Order->id)}}"
                                                    class="btn btn-secondary ">Download pdf</a>
                                            </td>
                                        </tr>

                                        <!-- Sample data rows -->
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Plugins -->
    @include('admin.script')
</body>

</html>