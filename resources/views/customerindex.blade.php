@extends('layouts.app')

@section('content')
    <div class="row">
        <form action="{{ route('customer.import') }}" method="POST" enctype="multipart/form-data" class="ml-3 mb-2">
            @csrf
            <div class="input-group border-1">
                <div class="custom-file col-md-4">
                    <input type="file" name="customerimport" class="form-control custom-file" />
                </div>
                <div class="input-group-append">
                    <input type="submit" class="btn btn-success btn-sm rounded" value="{{ __('lang.importCustomer') }}">
                    <span class="pl-2"> <a href="{{ route('customerexport') }}"
                            class="btn btn-sm btn-primary p-2 pt-0 ml-2"><i class="bi bi-file-arrow-down-fill text-white"
                                style="font-size:15px"></i>{{ __('lang.downloadExcelFile') }}</a></span>
                </div>
            </div>
        </form>
        @if (session('message'))
            <div class="alert alert-success col-md-12 ml-4 p-1" style="height:30px;">{{ session('message') }}</div>
        @endif
        @foreach ($errors->all() as $message)
            <div class="alert alert-danger col-md-8 ml-4 p-2 text-center">{{ $message }}</div>
        @endforeach

        <form action="{{ route('customer.search') }}" method="POST" class="form-inline ml-3 my-lg-2">
            @csrf
            <input name="search" class="form-control form-control-sm ml-2" type="search" placeholder="{{ __('lang.Search') }}"
                aria-label="Search">
            <button class="btn btn-sm btn-outline-success my-2 my-sm-0 ml-1"
                type="submit">{{ __('lang.search') }}</button>
        </form>
        <div class="col-md-12 col-sm-12 text-sm">


            {{-- <livewire:customer-record /> --}}
            <div class="card">
                <div class="card-header text-white text-bold text-lg-left h3" style="background-color:#3C4B64;">
                    {{ __('lang.customerDetails') }}
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm ml-3" style="text-align: center; font-size: 13px;">
                        <thead>
                            <tr class="table-success ml-3" style="font-size:15px;">
                                <th scope="col">{{ __('lang.Sn') }}</th>
                                <th scope="col">{{ __('lang.Name') }}</th>
                                <th scope="col">{{ __('lang.Email') }}</th>
                                <th scope="col">{{ __('lang.Province') }}</th>
                                <th scope="col">{{ __('lang.District') }}</th>
                                <th scope="col">{{ __('lang.localLevel') }}</th>
                                <th scope="col">{{ __('lang.loanStatus') }}</th>
                                <th scope="col" colspan="1" class="text-center">{{ __('lang.Operation') }}</th>

                            </tr>
                        </thead>
                        <tbody class="text-sm text-bold">
                            <?php $counter = 1; ?>
                            @forelse ($customer as $customers)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td>{{ $customers->cname }}</td>
                                    <td>{{ $customers->cemail }}</td>
                                    <td>{{ $customers->state }}</td>
                                    <td>{{ $customers->district }}</td>
                                    <td>{{ $customers->localLevel }}</td>
                                    <td>{{ $customers->status }}</td>
                                    {{-- <td><a disabled style=""
                                        href="{{ route('costumer.edit', $customers->id) }}"><i
                                            class="bi bi-pencil-square text-success"></i></a></td> --}}
                                    <td>
                                        <form action="{{ route('costumer.destroy', $customers->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" onclick="return confirm('Are You Sure')"
                                                class="btn btn-sm pt-0" style="text-align:center"><i
                                                    class="bi bi-trash-fill text-danger"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-danger">{{ __('lang.notFound') }}</td>
                                </tr>
                            @endforelse



                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $customer->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
