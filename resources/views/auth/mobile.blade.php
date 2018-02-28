@extends('layouts.app')
@section('styles')
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-large card-body white shadow-1">
                    <h3 class="blue-text"><i data-feather="smartphone"></i> Register Your Mobile Number</h3>
                    <br>
                    @include('partials.session')
                    <form method="POST" action="{{ url('/register/mobile') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="user" type="hidden"
                                       name="user"
                                       value="{{ Auth::user()->id }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="mobile" type="text" placeholder="Mobile"
                                       class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                       name="mobile" required>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-link">
                                    Add Mobile
                                </button>

                            </div>
                        </div>


                    </form>

                </div>

            </div>
        </div>

    </div>
    <script>
        feather.replace()
    </script>
@endsection

