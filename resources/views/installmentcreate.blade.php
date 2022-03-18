@extends('layouts.app')
@section('content')
    @livewire('installment-create',['financial_id'=>$id])
@endsection
