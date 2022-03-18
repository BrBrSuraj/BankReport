@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @isset($message)
                    <div class="alert alert-success col-md-6">
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @endisset

                <form action="{{ route('transaction.search') }}" method="POST" class="form-inline ml-3 my-lg-2">
                    @csrf
                    <input name="search" class="form-control form-control-sm ml-2" type="search" placeholder="{{ __('lang.Search') }}"
                        aria-label="Search">
                    <button class="btn btn-sm btn-outline-success my-2 my-sm-0 ml-1" type="submit">{{ __('lang.search') }}</button>
                </form>

                <div class="card">
                    <div class="card-header text-white text-bold text-lg-left h3" style="background-color:#3C4B64;">
                        {{ __('lang.transactionDetails') }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm ml-3">
                            <thead class="thead" style="text-align: center; font-size: 13px;">
                                <tr class="table-success">
                                    <th scope="col">{{ __('lang.Sn') }}</th>
                                    <th scope="col">{{ __('lang.Name') }}</th>
                                    <th scope="col">{{ __('lang.dueLoan') }}</th>
                                    <th scope="col">{{ __('lang.Sector') }}</th>
                                    <th scope="col">{{ __('lang.lastInstallmentDate') }}</th>
                                    <th scope="col">{{ __('lang.Intrest') }} </th>
                                    <th scope="col">{{ __('lang.Loan') }}</th>
                                    <th scope="col">{{ __('lang.Total') }} </th>
                                    <th scope="col" class="text-center">{{ __('lang.payInstallment') }}</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center; font-size: 13px;">
                                <?php $counter = 1; ?>

                                @forelse ($customer as $customers)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $customers->cname }}</td>
                                        <td>{{ $customers->financial->dueAmount ?? '0' }}</td>
                                        <td>{{ $customers->financial->sector ?? '0' }}</td>
                                        <td>{{ $customers->financial->startDate ?? '0' }}</td>
                                        <td>{{ $customers->financial->paidIntrestAmount ?? '0' }}</td>
                                        <td>{{ $customers->financial->paidLoanAmount ?? '0' }}</td>
                                        <td>{{ $customers->financial->totalPaid ?? '0' }}</td>
                                        <td class="text-center"><a
                                                href="{{ route('installmentcreate', $customers->financial->id ?? '0') }}"><i
                                                    class="bi bi-cash"></i> {{ __('lang.Pay') }}</a></td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-danger">{{ __('lang.notFound') }}</td>
                                    </tr>
                                @endforelse



                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    @isset($customer)
                        {{ $customer->links() }}
                    @endisset

                </div>
            </div>
        </div>
    @endsection
