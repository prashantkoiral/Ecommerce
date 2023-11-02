<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.nevbar')
        <!-- partial -->

        <div class="main-panel">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <div class="div-container">
                            <h2 class="text-center" style="color: white;">Show Products</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-white">ID</th>
                                        <th class="text-white">Title</th>
                                        <th class="text-white">Description</th>
                                        <th class="text-white">Image</th>
                                        <th class="text-white">Price</th>
                                        <th class="text-white">Quantity</th>
                                        <th class="text-white">Category</th>
                                        <th class="text-white">Discount Price</th>
                                        <th class="text-white">Actions</th> <!-- New column for actions -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="text-white">{{ $product->id }}</td>
                                        <td class="text-white">{{ $product->title }}</td>
                                        <td class="text-white">{{ $product->description }}</td>
                                        <td>
                                            <img src="{{ asset('product/' . $product->image) }}" alt="Product Image"
                                                style="width: 100px; height: 100px;">
                                        </td>
                                        <td class="text-white">{{ $product->price }}</td>
                                        <td class="text-white">{{ $product->quantity }}</td>
                                        <td class="text-white">{{ $product->catagory }}</td>
                                        <td class="text-white">{{ $product->discount_price }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('update_product',$product->id)}}" class="btn btn-info btn-sm mr-1">Edit</a>
                                                <a href="{{url('delete_product',$product->id)}}" class="btn btn-sm btn-danger ">Delete</button>

                                            </div>
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>