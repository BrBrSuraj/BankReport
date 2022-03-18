@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header" style="background-color:#3C4B64">
            <div class="col-md-12 text-bold text-capitalize text-success btn text-left" style="background-color:#3C4B64">
                <h4>{{ __('lang.updateUser') }}</h4>
            </div>
            <span class="text-success">
                @if (session('success'))
                    <i class="bi bi-check2-all">{{ session('success') }}</i>
                @endif
            </span>
        </div>
        <div class="card-body">
            <div class="row">
                <h4 class="text-success pt-0 ml-2">{{ __('lang.updateUserDetails') }}</h4>
                <hr class="col-md-11">
                <div class="col-md">
                    <form method="POST" action="{{ route('user.update', $user) }}">
                        @csrf
                        @method('patch')

                        <div class="mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('lang.Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class=" mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-left">{{ __('lang.Email') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class=" mb-3">
                            <label for="usertype" class="col-md-4 col-form-label text-md-left">{{ __('lang.Role') }}</label>

                            <div class="col-md-8">
                                <select name="role_id" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option selected value="{{ $user->role_id }}">{{ $role_name->role }}</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach

                                </select>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                        </div>
                        <div class="mb-3">
                            <label for="domain"
                                class="col-md-4 col-form-label text-md-left">{{ __('lang.domain') }}</label>

                            <div class="col-md-8">
                                <input id="domain" type="text" class="form-control @error('domain') is-invalid @enderror"
                                    name="domain" value="{{ $user->domain }}" required autocomplete="name" autofocus
                                    >
                                @error('domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="float-left" style="margin-left:-37px">
                            <div class="col-md-7 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Update') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h4 col-md-3 class="text-success pt-4 ml-2 ">{{ __('lang.changePassword') }}</h4>
            <hr class="col-md-11">
            <div class="col-md-11">
                <div class="card card-body mt-2 p-2">

                    <form action="{{ route('userpassword', $user) }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-row">
                            <div class="col-6">
                                <input name="password" value="{{ old('password') }}" type="password"
                                    class="form-control  @error('password') is-invalid @enderror"
                                    placeholder="{{ __('lang.newPassword') }}">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input value="{{ old('password_confirmation') }}" name="password_confirmation"
                                    type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="confirm Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-2 mt-4">
                                <button type="submit"
                                    class="form-control btn brn-sm btn-success">{{ __('lang.Change') }}</button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
