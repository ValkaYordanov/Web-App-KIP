<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModal">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf



                   <div class="form__group">
                        <label>
                            <div class="form__label">
                                Email:
                            </div>

                            <input class="inputClass" type="email" name="email" id="email">


                        </label>
                    </div>

                    <div class="form__group">
                        <label>
                            <div class="form__label">
                                Password:
                            </div>

                            <input class="inputClass" type="password" name="password" id="password">
                            @if ($errors->has('wrongCredentials')) <p style="color:red;">{{ $errors->first('wrongCredentials') }}</p> @endif

                        </label>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="button button4">
                              Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('scripts')
@parent

@if($errors->has('wrongCredentials'))
    <script>
    $(function() {
        $('#loginModal').modal({
            show: true
        });
    });
    </script>
@endif
@endsection
