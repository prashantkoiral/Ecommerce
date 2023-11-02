<!DOCTYPE html>
<html>

<head>
     
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

    <style>
        .search-form {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form class="form-inline">
            <button class="btn my-2 my-sm-0 nav_search-btn" type="button" id="searchBtn">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>

        <form class="search-form mt-2" id="searchForm" style="display: none;">
            <input type="text" name="search" class="form-control" placeholder="Search...">
            <button class="btn btn-primary ml-2" type="submit">Search</button>
        </form>
    </div>

    <script>
        document.getElementById('searchBtn').addEventListener('click', function() {
            var searchForm = document.getElementById('searchForm');
            if (searchForm.style.display === 'none') {
                searchForm.style.display = 'block';
            } else {
                searchForm.style.display = 'none';
            }
        });
    </script>
</body>
</html>
