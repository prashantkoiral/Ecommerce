<!DOCTYPE html>
<html lang="en">

<head>
<<style>
    input[type="text"]:focus,
    input[type="number"]:focus,
    textarea:focus,
    select:focus {
        background-color: white !important;
    }
</style>


    @include('admin.css')
 <body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.nevbar')

        <div class="main-panel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-2 mt-5 mb-5">
                <div class="div-container" style="max-width: 400px; margin: auto;">
                    <h2 class="text-center" style="color: white;">Add Product</h2>
                    <form action="{{ route('add_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-1">
                            <label for="title">Product Title</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>
                        <div class="form-group mb-1">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-1">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" class="form-control-file" required>
                        </div>
                        <div class="form-group mb-1">
                            <label for="price">Price</label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                        </div>
                        <div class="form-group mb-1">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" required>
                        </div>
                        <div class="form-group mb-1">
                            <label for="ProductCategory ">Category</label>
                            <select id="ProductCategory" name="catagory" class="form-control" required>
                            @foreach($data as $catagory)   
                            <!-- <option value="{{$catagory->catagory_name}}" selected disabled>Select a category</option> -->
                                <!-- Loop through categories to populate the options -->
                           
                                <option>{{$catagory->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-1">
                            <label for="discount_price">Discount Price</label>
                            <input type="number" id="discount_price" name="discount_price" class="form-control"
                                >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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