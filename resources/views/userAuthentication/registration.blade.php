@extends('layouts.master')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-5">
                <br>
                <hr>
                <h1>Registration</h1>
                <hr>
                <br>



                <form method="POST"  action="{{ route('registration') }}">
                    @csrf

                    <div class="form__row">

                        <div class="form__group">
                            <label>
                                <div class="form__label">
                                    *First name
                                </div>

                                <input class="inputClass" type="text" id="name" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif

                            </label>
                        </div>
                        <!-- /form__group -->
                    </div>
                    <!-- /form__row -->

                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                *Last name
                            </div>

                            <input class="inputClass" type="text" id="lastname" name="lastname" value="{{ old('lastname') }}">
                            @if ($errors->has('lastname')) <p style="color:red;">{{ $errors->first('lastname') }}</p> @endif

                        </label>
                    </div>
                    <!-- /form__group -->

                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                *E-mail
                            </div>

                            <input class="inputClass" type="text" name="email" id="email" value="{{ old('email') }}">
                            @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
                            @if ($errors->has('emailErr')) <p style="color:red;">{{ $errors->first('emailErr') }}</p> @endif



                        </label>
                    </div>
                    <!-- /form__group -->

                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                *Street
                            </div>

                            <input class="inputClass" type="text" name="street" id="street" value="{{ old('street') }}">
                            @if ($errors->has('street')) <p style="color:red;">{{ $errors->first('street') }}</p> @endif

                        </label>
                    </div>
                    <!-- /form__group -->

                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                *№
                            </div>

                            <input class="inputClass" type="text" name="strNumber" id="strNumber" value="{{ old('strNumber') }}">
                            @if ($errors->has('strNumber')) <p style="color:red;">{{ $errors->first('strNumber') }}</p> @endif


                        </label>
                    </div>
                    <!-- /form__group -->

                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                *Password
                            </div>

                            <input class="inputClass" type="password" name="password" id="password">
                            @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

                        </label>
                    </div>
                    <!-- /form__group -->

                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                *Confirm password
                            </div>

                            <input class="inputClass" type="password" name="password_confirmation" id="password_confirmation">
                            @if ($errors->has('password_confirmation')) <p style="color:red;">{{ $errors->first('password_confirmation') }}</p> @endif

                        </label>
                    </div>
                    <!-- /form__group -->

                    <div class="form__row form__row--buttons">
                        <div class="form__group">
                            <button class="button button4">Save</button>
                        </div>

                        <!-- /form__group -->
                    </div>

                </form>

            </div>
        </div>
    </div>


</main>
@endsection
