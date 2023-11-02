<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="{{ asset('images/logo.png') }}"
                    alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show_card') }}">Cart</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_Order')}}">Order</a>
                    </li>


                </ul>

                <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>

                <!-- Login and Registration Buttons -->
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                    <li class="nav-item">
                        @auth
                        <a href="{{ route('logout') }}" class="nav-link btn btn-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        @else
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="nav-link btn btn-success">Login</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link btn btn-primary ml-2">Registration</a>
                            @endif
                        </div>
                        @endauth
                    </li>
                    @endif
                </ul>




            </div>
        </nav>
    </div>
</header>