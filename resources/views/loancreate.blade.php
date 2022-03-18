@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-md-12 ml-3 text-bold text-capitalize text-dark text-left">
            <div class="card">
                <div class="card-header text-success" style="background-color:#3C4B64; height:50px;">
                    <h4>{{ __('lang.applyLoanToCustomer') }}</h4>
                    @if (session('success'))
                        <i class="bi bi-check2-all">{{ session('success') }}</i>
                    @endif
                </div>
                <div class="card-body">
                    <div class="col-md-12 p-1">
                        @livewire('create-loan-form')
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
