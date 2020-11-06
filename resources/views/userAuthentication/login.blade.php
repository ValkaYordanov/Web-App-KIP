@extends('layouts.master')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-10">
                <br>
                <hr>
                <h1>Login</h1>
                <hr>
                <br>
                <br>


                <form method="POST" action="{{ route('login') }}">
                    @csrf



                <div class="form__group">
                        <label>
                            <div class="form__label">
                                Email:
                            </div>

                            <input class="inputClass" type="email" name="email" id="email" value="{{ old('email') }}">
                            @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif


                        </label>
                    </div>

                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                Password:
                            </div>

                            <input class="inputClass" type="password" name="password" id="password">
                            @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif
                            @if (session('error'))<p style="color:red;">{{ session('error') }}</p>  @endif

                        </label>
                    </div>


                    <div class="form__row form__row--buttons">
                        <div class="form__group">
                            <button class="button button4">Login</button>
                        </div>

                        <!-- /form__group -->
                    </div>

                    <br>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>


</main>
@endsection
