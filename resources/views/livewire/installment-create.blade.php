<div>
    <div class="row">
        <div class="col-md-8">
            <form wire:submit.prevent="submit">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-info m-0 p-1" style="font-size:12px;">
                            {{ session('message') }}
                        </div>
                    @endif

                </div>
                @csrf
                <div class="form-group form-row align-items-center">
                    <label for="loanamount">{{ __('Fiscal Year') }}</label>
                    <select name="fiscal" wire:model="fiscalyear" class="form-control">
                        <option>{{ __('choose') }}</option>
                        @foreach ($fiscalYear as $year)
                            <option class="p-2 text-left" value="{{ $year->fiscalYear }}">{{ $year->fiscalYear }}
                            </option>
                        @endforeach
                    </select>
                    @error('fiscalyear')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-row align-items-center">
                    <label for="loanamount">{{ __('Installment Amount') }}/label></label>
                    <input type="number" wire:model="amount" name="amount" class="form-control form-control-sm"
                        placeholder="{{ __('Enter Amount') }}">
                    @error('amount')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-row align-items-center">
                    <label for="applieddate">{{ __('Installment Date') }}</label>
                    <input type="text" wire:model="date" name="installmentDate" class="form-control"
                        placeholder="{{ __('Enter Date') }}">
                    @error('date')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <input type="hidden" name="fiid" value="{{ $id }}"> --}}
                <div class="form-group">
                    <button class="btn btn-success ml-2" type="submit">Pay</button>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <div>
                <h2 class="text-info mt-4 text-decoration-underline">Details</h2>
                <p class="text-success text-bold">{{ __('Due Loan') }}: {{ $financialdata->dueAmount }}</p>
                <p class="text-success text-bold">{{ __('Loan Sector') }}: {{ $financialdata->sector }}</p>
                <p class="text-warning text-bold">{{ __('Last Installment Date') }}:
                    {{ $financialdata->startDate }}</p>
            </div>
           
        </div>

    </div>
</div>
