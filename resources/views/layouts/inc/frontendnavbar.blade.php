<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">{{config('app.name')}}</a>
        <div class="search-bar">
            <form action="{{url('searchproduct')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" id="search_product" name="product_name" placeholder="Search" required aria-describedby="basic-addon1">
                    <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('/') ? 'active':''}}" aria-current="page" href="/"> <i class="fa fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('category') ? 'active':''}}" href="{{url('category')}}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('cart') ? 'active':''}}" href="{{url('cart')}}">
                        <i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-pill bg-primary cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('wishlist') ? 'active':''}}" href="{{url('wishlist')}}">
                        <i class="fa fa-heart"></i> Wishlist <span class="badge badge-pill bg-success wishlist-count">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::is('my-orders') ? 'active':''}}" href="{{url('my-orders')}}"> <i class="fa fa-bag-shopping"></i> My orders</a>
                </li>
                @guest
                @if(Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">{{__('Login')}}</a>
                </li>
                @endif
                @if(Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{url('my-orders')}}">
                            My orders
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            @endguest
        </div>
    </div>
</nav>