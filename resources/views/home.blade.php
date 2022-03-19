@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3 ol-sm-12">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="bi bi-people-fill"></i> {{ __('lang.Customer') }}</div>
                    <div class="card-body">
                        <p class="card-title" style="font-size:15px;">{{ __('lang.totalCustomer') }}:
                            {{ $customer }}</p>

                    </div>
                </div>
            </div>

            <div class="col-md-3 ol-sm-12">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="bi bi-cash"></i> {{ __('lang.totalLoanAmount') }}</div>
                    <div class="card-body">
                        <p class="card-title" style="font-size:15px;">{{ __('lang.Loan') }}: {{ $loanAmount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ol-sm-12">
                <div class="card text-dark bg-warning mb-3 card-sm" style="max-width: 18rem;">
                    <div class="card-header"><i class="bi bi-cash-stack"> {{ __('lang.Installment') }}</i></div>
                    <div class="card-body">
                        <p class="card-title" style="font-size:15px;">{{ __('lang.totalInstallment') }}:
                            {{ $installment }}</p>

                    </div>
                </div>
            </div>

            <div class="col-md-3 ol-sm-12">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header"><i class="bi bi-cash-stack"></i> {{ __('lang.totalTransaction') }} </div>
                    <div class="card-body">
                        <p class="card-title text-justify text-white text-bold"
                            style="font-size:11px;margin-top:-20px;margin-bottom:-10px"> {{ __('lang.Due') }} :
                            Rs.{{ ' ' . $dueAmount }}<br>{{ __('lang.paidIntrest') }}:
                            Rs.{{ ' ' . $paidIntrestAmount }}<br>{{ __('lang.paidIntrest') }}:
                            Rs.{{ ' ' . $paidLoanAmount }}<br>{{ __('lang.totalTransaction') }}:
                            Rs.{{ ' ' . $totalPaid }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
