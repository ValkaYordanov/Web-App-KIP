<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="header__left">
                    <a href="{{ route('home') }}"><img src="../../images/logo.png"  width="140" height="130" alt=""></a>
                </div>
                <div class="header__right">
                    <div class="header__right-buttons">




                        @if(Auth::guest() || Auth::user()->type =="normal")
                        <a href="{{ route('home') }}" class="button button3">Home</a>
                        <div class="btn-group">
                            <a href="" class="button button3" data-toggle="dropdown">Menu</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('meat') }}">Meat</a></li>
                                <li><a href="{{ route('salads') }}">Salads</a></li>
                                <li><a href="{{ route('potatoes') }}">Potatoes</a></li>
                                <li><a href="{{ route('drinks') }}">Drinks</a></li>
                            </ul>
                        </div>

                        <a href="" class="button button3">Delivery</a>
                        <a href="" class="button button3">About</a>
                        <a href="" class="button button3">Contact us</a>
                        @endif


                        @if(Auth::check())
                        @if(Auth::user()->type =="admin")
                        <a href="{{ route('orders') }}" class="button button3">Orders</a>
                        <a href="{{ route('allProducts') }}" class="button button3">Products</a>
                        <a href="" class="button button3">Users</a>
                        @endif
                        @endif

                    </div>

                </div>
                 <div class="vl   mr-3"></div>
                <div id="right">

                  <div class="row">
                        @if(Auth::check())

                        <p>{{Auth::user()->name}} {{Auth::user()->last_name}}</p>

                        @endif
                    </div>

                    <div class="row">
                        <a href="{{route('shoppingCart') }}">
                        <p><img src="../../images/cart.png" width="30" height="30" alt="">
                            Shpping cart: <span><strong>{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</strong></span></p>
                        </a>
                    </div>


                    <div class="row">
                        @if(Auth::check())
                        <a href="{{ route('profile') }}" class="button button3">
                        <span class="icon"></span>Profile</a>
                        @endif
                        @if(!Auth::check())
                       <a method="GET" href="{{ route('login') }}" class="button button3">
                        <span class="icon"></span>Login</a>
                        @endif

                        @if(!Auth::check())
                        <a href="{{ route('addUser') }}" class="button button3">
                        <span class="icon"></span>Registration</a>
                        @endif
                        @if(Auth::check())
                        <a href="{{ route('logout') }}" class="button button3">
                        <span class="icon"></span>Logout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
