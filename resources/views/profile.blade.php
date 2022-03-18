@extends('layouts.app')
@section('content')
    <div class="row">

        <div class=" text-lg-left col-md-10 ml-3 text-bold text-capitalize text-success btn btn-sm"
            style="background-color:#3C4B64;width:100px;">
            <h4 class="ml-3">{{ __('lang.userProfile') }}</h4>
            <span class="text-white">
                @if (session('success'))
                    <i class="bi bi-check2-all">{{ session('success') }}</i>
                @endif
            </span>
        </div>
        <div class="col-md-10 ml-4 p-4">
            <div class="card card-body">
                <p>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#userDetails" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">{{ __('lang.userInfo') }}</a>
  {{-- <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#changePassword" aria-expanded="false" aria-controls="multiCollapseExample2">{{ __('lang.changePassword') }}</button> --}}

</p>
<div class="row">
  <div class="col-md-12">
    <div class="collapse multi-collapse" id="userDetails">
      <div class="card card-body">
         <ul class="list-group">
                    <li class="list-group-item">{{ __('lang.Name') }}: {{ $user->name }}</li>
                    <li class="list-group-item">{{ __('lang.Email')}}: {{ $user->email }}</li>
                    <li class="list-group-item">{{ __('lang.Role') }}: {{ $user->role->role }}</li>
                </ul>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="changePassword">
      <div class="card card-body">

      </div>
    </div>
  </div>
</div>


            </div>

        </div>
    </div>
    <div class="row mt-0">
        <div class="col-md-12 ml-4">


        </div>
    </div>
@endsection
