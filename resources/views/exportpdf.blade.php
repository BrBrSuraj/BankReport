@extends('layouts.pdf')
@section('content')
    <div class="row">
    </div>
    {{-- main report part --}}
    <div class="container-fluid">
        <div class="style=" text-align:center;margin:5px;"">
            <p class="text-decoration-bold text-bg-danger text-bold text-center" style="margin-bottom:-2px;">
                <?php
                $eng_number = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                $nep_number = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
                $fiscalYears = str_replace($nep_number, $eng_number, $fiscalYear);
                ?>
                <br><br><br>
                <i class="bi bi-check2-all text-success"></i>Fiscal Year:{{ ' -' . $fiscalYears }}
            </p>
        </div>
    </div>
    <table class="table mt-2 text-sm text-center table-sm" style="border: 2px solid black;margin-right:60px;">
        <thead class="table">
            <tr>
                <th colspan="2" style="border: 2px solid black;"></th>
                <th class="bg-white" colspan="3" style="border: 2px solid black;">{{ __('Previous Quater') }}</th>
                <th colspan="3" style="border: 2px solid black; background-color:white;">{{ __('Current Quater') }}</th>
                <th class="bg-white" colspan="3" style="border: 2px solid black;">{{ __('Till Current Quater') }}
                </th>
                <th class="bg-white" colspan="2" style="border: 2px solid black;">{{ __('Due Debt') }}</th>
                <th style="border: 2px solid black;">Remark</th>
            </tr>
        </thead>
        <tbody style="border: 2px solid black;">
            <tr class="table" style="border: 1px solid black;">
                <th rowspan="2" style="border: 1px solid black;">S.N</th>
                <th rowspan="2" style="border: 1px solid black;text-align:center;">{{ __('Target Group') }}
                </th>
                <th colspan="2" style="border: 1px sterolid black;">{{ __('Debt') }}</th>
                <th style="border: 1px solid black;">Intrest</th>
                <th style="border: 1px solid black;" colspan="2">Debt</th>
                <th>Intrest</th>
                <th style="border: 1px solid black;" colspan="2">Debt</th>
                <th style="border: 1px solid black;">Total Intrest</th>
                <th rowspan="2" style="border: 1px solid black;">No.</th>
                <th style="border: 1px solid black;" rowspan="2">Rs</th>
                <th style="border: 1px solid black;" rowspan="2"></th>

            </tr>

            <tr style="border: 1px solid black;" class="table">
                <th style="border: 1px solid black;">no</th>
                <th style="border: 1px solid black;">Rs</th>
                <th style="border: 1px solid black;">Rs</th>
                <th style="border: 1px solid black;">no</th>
                <th style="border: 1px solid black;">Rs</th>
                <th style="border: 1px solid black;">Rs</th>
                <th style="border: 1px solid black;">no</th>
                <th style="border: 1px solid black;">Rs</th>
                <th style="border: 1px solid black;">Rs</th>

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

                    <p>Agri Business</p>
                    <hr>
                    <p>Industrial Business</p>
                    <hr>
                    <p>Business</p>
                    <hr>
                    <p>Forest & Invironment</p>
                    <hr>
                    <p style="margin-top:-20px;">Development of Women & Dalit Society</p>
                    <hr>
                    <p style="margin-top:-5px;">Tourism Industries</p>
                    <hr>
                    <p>Garbage Business</p>
                    <hr>

                </th>

                {{-- main report contain --}}
                {{-- previous --}}
                <th class="border border-dark bg-white">
                    @foreach ($previousNumberOfLoan as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-white">
                    @foreach ($previousLoanAmount as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-white">
                    @foreach ($previousIntrestAmount as $data)
                        {{ round($data, 2) }}<br>
                        <hr>
                    @endforeach
                </th>

                {{-- in this quater --}}
                <th class="border border-dark">
                    @foreach ($currentNumberOfLoan as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark" style="column-width:150px;">
                    @foreach ($currentLoanAmount as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark" style="column-width:150px;">
                    @foreach ($currentIntrestAmount as $data)
                        {{ round($data, 2) }}<br>
                        <hr>
                    @endforeach
                </th>

                {{-- until this quater --}}
                <th class="border border-dark">
                    @foreach ($anualNumberOfLoan as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-white" style="column-width:150px;">
                    @foreach ($anualLoanAmount as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-dark bg-white">
                    @foreach ($anualIntrestAmount as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                {{-- Due loan total --}}
                <th class="border border-darkbg-white">
                    @foreach ($numberOfDueLoan as $data)
                        {{ $data }}<br>
                        <hr>
                    @endforeach
                </th>
                <th class="border border-darkbg-white">

                    @foreach ($dueLoanAmount as $data)
                        {{ $data }}<br>
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
