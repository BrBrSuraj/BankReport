@extends('layouts.app')

@section('content')
<form action="{{ route('loan.excel.import') }}" method="POST" enctype="multipart/form-data" class="ml-3 mb-2">
    @csrf
    <div class="input-group border-1">
        <div class="custom-file col-md-4">
            <input type="file" name="loanimport" class="form-control custom-file" required />
        </div>
        <div class="input-group-append">
            <input type="submit" class="btn btn-success btn-sm rounded" value="{{ __('lang.importLoan') }}"> <span class="pl-2">
                <a href="{{ route('customerloanexport') }}" class="btn btn-sm btn-primary p-2 pt-0"><i class="bi bi-file-arrow-down-fill text-white" style="font-size:15px"></i>
  {{ __('lang.downloadExcelFile') }}</a></span>
        </div>
    </div>
</form>
@if (Session::has('import_errors'))
@foreach(Session::get('import_errors') as $failure)
<div class="alert alert-danger col-md-4 ml-4 p-1" style="height:30px;">{{ $failure->errors() }}</div>
@endforeach
@endif
@if (session('message'))
<div class="alert alert-success col-md-4 ml-4 p-1" style="height:30px;">{{ session('message') }}</div>
@endif
@foreach($errors->all() as $message)
<div class="alert alert-danger col-md-8 ml-4 p-2">{{ $message }}</div>
@endforeach
<div class="col-md-12 col-sm-12" style=" font-size: 13px;">

    <form action="{{ route('loan.search') }}" method="POST" class="form-inline ml-1 my-lg-2">
        @csrf

        <input name="search" class="form-control form-control-sm ml-2" type="search" placeholder="{{ __('lang.Search') }}" aria-label="Search" required>
        <button class="btn btn-sm btn-outline-success my-2 my-sm-0 ml-1" type="submit">{{ __('lang.search') }}</button>
    </form>
    <div class="card">
        <div class="card-header text-white text-bold text-lg-left h3" style="background-color:#3C4B64;">
           {{ __('lang.loanDetails')}}
        </div>
        <div class="card-body">
            <table class="table table-bordered table-sm ml-3" style="text-align: center; font-size: 13px;">
                <thead class="thead" style=" font-size: 13px;">
                    <tr class="table-success" style="font-size:15px;">
                        <th scope="col">{{ __('lang.Sn') }}</th>
                        <th scope="col">{{ __('lang.Name') }}</th>
                        <th scope="col">{{ __('lang.loanAmount') }}</th>
                        <th scope="col">{{ __('lang.loanSector') }}</th>
                        <th scope="col">{{ __('lang.loanProvider') }}</th>
                        <th scope="col">{{ __('lang.Firm') }}</th>
                        <th scope="col">{{ __('lang.loanDate') }}</th>
                        <th scope="col">{{ __('lang.clearanceDate') }}</th>

                        {{-- <th scope="col" colspan="2" class="text-center">{{ __('lang.Operation') }}</th> --}}

                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    @forelse ($loan as $loans)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $loans->customer->cname }}</td>
                        <td>{{ $loans->amount }}</td>
                        <td>{{ $loans->sector }}</td>
                        <td>{{ $loans->institute }}</td>
                        <td>{{ $loans->firm }}</td>
                        <td>{{ $loans->loanDate }}</td>
                        <td>{{ $loans->clearDate }}</td>
                        {{--
                                <td><a href="{{ route('loan.edit', $loans->id) }}"><i class="bi bi-pencil-square text-success"></i></a></td>
                        <td> --}}



                            {{-- <form action="{{ route('loan.destroy', $loans->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button style="pointer-events: none;" type="submit" onclick="return confirm('Are You Sure')" class="btn btn-sm"><i class="bi bi-trash-fill text-danger"></i></button>
                            </form> --}}
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
    </div>

    <div class="d-flex justify-content-center">
        {{ $loan->links() }}
    </div>
</div>
@endsection
