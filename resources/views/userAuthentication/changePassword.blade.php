 @extends('layouts.master')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-6">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <hr>
                <h1>Chagne password</h1>
                <form method="POST" action="{{ route('changePassword', $user) }}">
                    @csrf

                    <input type="hidden" name="token" >



                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                New password
                            </div>
                                <input id="password" type="password" class="inputClass @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                    @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

                        </label>
                    </div>

                    <div class="form__group">
                     <label>
                            <div class="form__label">
                                Confirm new password
                            </div>

                            <input id="password-confirm" type="password" class="inputClass" name="password_confirmation"  autocomplete="new-password">
                            @if ($errors->has('password_confirmation')) <p style="color:red;">{{ $errors->first('password_confirmation') }}</p> @endif

                        </label>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
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

            </div>
        </div>
    </div>
</main>
@endsection
