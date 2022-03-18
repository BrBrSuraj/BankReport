@extends('layouts.app')
@section('content')
    <div class="row">
        <div class=" text-lg-left col-md-12 ml-3 text-bold text-capitalize text-dark btn btn-sm"
            style="background-color:#3C4B64;width:100px;">
            <h4 class="ml-3">{{ __('lang.createNewCustomer') }}</h4>
            <span class="text-white">
                @if (session('success'))
                    <i class="bi bi-check2-all">{{ session('success') }}</i>
                @endif
            </span>
        </div>
        <div class="col-md-12 p-4">
            @livewire('costumer-create-form')
        </div>
    </div>
@endsection
