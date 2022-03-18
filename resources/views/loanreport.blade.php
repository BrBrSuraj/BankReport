@extends('layouts.app')
<style>
    *{
        text-decoration:bold;
    }
</style>
@section('content')
    <div class="row">
        <form action="{{ route('loanreport',app()->getLocale()) }}" method="POST" class="form-inline">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <select name="fiscal" class="form-control">
                    <option>{{ __('lang.choseFiscalYear') }}</option>
                    @isset($fiscalyear)
                        @foreach ($fiscalyear as $year)
                            <option class="p-2 text-left" value="{{ $year->fiscalYear }}">{{ $year->fiscalYear }}</option>
                        @endforeach
                    @endisset
                </select>
                @error('fiscal') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-sm mb-2"><i class="bi bi-search"></i></button>
        </form>

    </div>
    {{-- main report part --}}
    <div class="container-fluid">
        <div class="style=" text-align:center;margin:5px;"">
            <p class="text-decoration-bold text-bg-danger text-bold text-center" style="margin-bottom:-2px;">
            <i class="bi bi-check2-all text-success"></i> {{ __('lang.Report') }}{{ ' ' . $fiscalYear }}
            <span>
                    <a href="{{ route('exportpdf',$fiscalYear) }}" class="m-1 btn-danger btn-sm rounded">
                    <svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                        </svg></i></a>
                </span></p>
        </div>
    </div>
    <table class="table mt-2 text-sm text-center table-sm" style="border: 2px solid black;">
        <thead class="table-warning">
            <tr>
                <th colspan="2" style="border: 2px solid black;"></th>
                <th class="bg-info" colspan="3" style="border: 2px solid black;">{{ __('lang.previousQuater') }}</th>
                <th colspan="3" style="border: 2px solid black; background-color:aqua;">{{ __('lang.currentQuater') }}</th>
                <th class="bg-success" colspan="3" style="border: 2px solid black;">{{ __('lang.tillCurrentQuater') }}</th>
                <th class="bg-danger" colspan="2" style="border: 2px solid black;">{{ __('lang.dueDebt') }}</th>
                <th style="border: 2px solid black;">{{ __('lang.Remark') }}</th>
            </tr>
        </thead>
        <tbody style="border: 2px solid black;">
            <tr class="table-success" style="border: 1px solid black;">
                <th rowspan="2">{{ __('lang.Sn') }}</th>
                <th rowspan="2" style="border: 1px solid black;text-align:center;">{{  __('lang.targetGroup')}}
                </th>
                <th colspan="2" style="border: 1px solid black;">{{  __('lang.Debt')}}</th>
                <th style="border: 1px solid black;">{{ __('lang.Intrest') }}</th>
                <th style="border: 1px solid black;" colspan="2">{{ __('lang.Debt') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.Intrest') }}</th>
                <th style="border: 1px solid black;" colspan="2">{{  __('lang.Debt')}}</th>
                <th style="border: 1px solid black;">{{ __('lang.totalIntrest') }}</th>
                <th rowspan="2" style="border: 1px solid black;">{{ __('lang.No') }}</th>
                <th style="border: 1px solid black;" rowspan="2">{{ __('lang.Rupies') }}</th>
                <th style="border: 1px solid black;" rowspan="2"></th>

            </tr>

            <tr style="border: 1px solid black;" class="table-success">
                <th style="border: 1px solid black;">{{ __('lang.No') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.Rs') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.Rs') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.No') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.Rs') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.Rs') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.No') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.Rs') }}</th>
                <th style="border: 1px solid black;">{{ __('lang.Rs') }}</th>

            </tr>
            {{-- main dynamic content of table --}}
            {{-- forserialnumber --}}
            <tr>
                @php
                    $counter = 1;
                @endphp
                <th class="border border-dark">
                    @for ($i = 1; $i <= 7; $i++)
                        {{ $i }}
                        <br>
                        <hr>
                    @endfor
                    {{-- for listing the each sector --}}
                </th>
                <th style="column-width:500px;" class="text-center text-sm border border-dark">
                    @isset($sector)
                        @foreach ($sector as $sec)
                       {{ $sec->{'sector_'.app()->getLocale()} }}
                            <hr>
                        @endforeach
                    @endisset

                </th>

                {{-- main report contain --}}
                {{-- previous --}}
                <th class="border border-dark bg-info">
                    @foreach ($previousNumberOfLoan as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-info">
                    @foreach ($previousLoanAmount as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-info">
                    @foreach ($previousIntrestAmount as $data)
                        {{ round($data, 2) }}<br>
                        <hr>
                    @endforeach
                </th>

                {{-- in this quater --}}
                <th class="border border-dark" style="background-color:aqua;">
                    @foreach ($currentNumberOfLoan as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark" style="column-width:150px; background-color:aqua;">
                    @foreach ($currentLoanAmount as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark" style="column-width:150px; background-color:aqua;">
                    @foreach ($currentIntrestAmount as $data)
                        {{ round($data, 2) }}<br>
                        <hr>
                    @endforeach
                </th>

                {{-- until this quater --}}
                <th class="border border-dark bg-success">
                    @foreach ($anualNumberOfLoan as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-success" style="column-width:150px;">
                    @foreach ($anualLoanAmount as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-success">
                    @foreach ($anualIntrestAmount as $data)
                        {{ round($data, 2) }}<br>
                        <hr>
                    @endforeach
                </th>
                {{-- Due loan total --}}
                <th class="border border-dark bg-danger">
                    @foreach ($numberOfDueLoan as $data)
                        {{ round($data) }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-danger">

                    @foreach ($dueLoanAmount as $data)
                        {{ round($data, 2) }}<br>
                        <hr>
                    @endforeach
                </th>


                <th class="border border-dark bg-white">

                </th>
            </tr>

        </tbody>
    </table>
    </div><!-- /.container-fluid -->




@endsection
