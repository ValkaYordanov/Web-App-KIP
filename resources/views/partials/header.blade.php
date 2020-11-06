<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="header__left">
                    <a href=""><img src="/images/logo.png"  width="140" height="130" alt=""></a>
                </div>
                <div class="header__right">
                    <div class="header__right-buttons">


                        <a href="" class="button button3">Menu</a>
                        <a href="" class="button button3">Delivery</a>
                        <a href="" class="button button3">About</a>
                        <a href="" class="button button3">Contact us</a>

                    </div>

                </div>
                <div id="right">
                    <div class="row">
                        <p>{{Auth()::$user->name}}</p>
                    </div>
                    <div class="row">
                        @if(Auth::check())
                        <a href="" class="button button3">
                        <span class="icon"><img src="" ></span>Profile</a>
                        @endif
                        @if(!Auth::check())
                        <a class="button button3"
                            style="cursor: pointer"
                            data-toggle="modal"
                            data-target="#loginModal">Login</a>
                        @endif
                    </div>
                    <div class="row">
                        @if(!Auth::check())
                        <a href="{{ route('addUser') }}" class="button button3">
                        <span class="icon"><img src="" ></span>Registration</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@include('userAuthentication.login')
