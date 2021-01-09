@extends('layouts.master')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-6">
                <br>
                <br>

                <h1>Change password by email</h1>

                <form method="POST" action="{{ route('reset') }}" class="login-form">
                    @csrf

                            <div class="form__group">
                                <label>
                                    <div class="form__label">
                                        *E-mail:
                                    </div>
                                    <input class="inputClass" type="email" name="email" id="email" value="{{ old('email') }}">
                                </label>
                            </div>
                            <!-- /form__group -->



                            <div class="form__group">
                                <button class="button button4">Send link</button>
                            @if (session('error')) <p style="color:red;">{{ session('error') }}</p> @endif
                            @if (session('success')) <p style="color:red;">{{ session('success') }}</p> @endif
                            </div>

                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</main>
@endsection
