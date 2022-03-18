@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header text-bold text-success" style="background-color:#3C4B64">
              <h4>{{ __('lang.createNewUser') }}</h4>
            <span class="text-success">
                @if (session('success'))
                    <i class="bi bi-check2-all">{{ session('success') }}</i>
                @endif
            </span>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('lang.userName') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="{{ __('lang.enterName') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('lang.email') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                     placeholder="{{ __('lang.enterEmail') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type"
                                class="col-md-4 col-form-label text-md-end">{{ __('lang.selectUserType') }}</label>

                            <div class="col-md-8">
                                <select name="role_id" class="form-select form-select-sm"
                                    aria-label="form-select-sm example">
                                    @isset($roles)
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" required>{{ $role->role }}</option>
                                        @endforeach
                                    @endisset
                                </select>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="domain" class="col-md-4 col-form-label text-md-end">{{ __('lang.domain') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control @error('domain') is-invalid @enderror"
                                    name="domain" value="{{ old('domain') }}" required autocomplete="domain"
                                    placeholder="{{ __('lang.enterDomain') }}">

                                @error('domain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('lang.create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">

                </div>

            </div>
        </div>
    </div>
@endsection
