<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .table-sm th,
    .table-sm td {
        font-size: 12px;
        /* Adjust the font size as needed */
        padding: 4px 8px;
        /* Adjust the padding as needed */
    }

    .main-panel {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: black;
    }

    .div-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        max-width: 400px;
        width: 100%;
    }

    .form-group {
        margin-bottom: 10px;
    }

    label {
        font-weight: bold;
        color: black;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: black;
        background-color: white;
        outline: none;
    }

    input[type="text"]:focus {
        background-color: white;
        /* Set background color to white when focused */
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }
    </style>

    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- Sidebar and navbar includes -->
        @include('admin.sidebar')
        @include('admin.nevbar')

        <div class="main-panel">

            <div class="container-fluid">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <script>
                $(document).ready(function() {
                    $(".alert").alert();
                });
                </script>
                @endif
                <div class="row">
                    <div class="col-md-4 offset-md-1">
                        <div class="div-container">
                            <h2 class="text-center" style="color: black;">Add Categories</h2>
                            <!-- Add Product Form Here -->

                            <form action="{{ route('catagories.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category_name" style="color: black;">Category Name</label>
                                    <input type="text" id="category_name" name="catagory_name" class="form-control"
                                        required placeholder="Enter category name">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4 offset-md-2 mt-md-0 mt-1">
                        <div class="div-container">
                            <h2 class="text-center" style="color: black;">Categories</h2>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->catagory_name }}</td>
                                        <td>
                                            <form action="{{ route('catagories.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
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

        <!-- Footer includes -->
        @include('admin.script')

    </div>
</body>

</html>