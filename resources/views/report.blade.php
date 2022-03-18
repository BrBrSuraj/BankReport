@extends('layouts.app')

@section('content')
    <form action="{{ route('loanreport',app()->getLocale()) }}" method="POST" class="form-inline">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <select name="fiscal" class="form-control">
                <option>{{ __('lang.choseFiscalYear') }}</option>
                @foreach ($fiscalyear as $year)
                    <option class="p-2 text-left" value="{{ $year->fiscalYear }}">{{ $year->fiscalYear }}</option>
                @endforeach
            </select>
            @error('fiscal') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="bi bi-search"></i></button>
    </form>
@endsection
