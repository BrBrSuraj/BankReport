<form wire:submit.prevent="submit" class="text-sm" style="text-capitalize">
    <div>
        @if (session()->has('message'))
            <p class="text-success"><i class="bi bi-check-all text-success text-lg-left"></i> {{ session('message') }}
            </p>
    </div>
    @endif
    </div>

    <div class="form-group form-row align-items-center col-md-12">
        <label for="state">{{ __('lang.fiscalYear') }}</label>
        <select name="fiscalyear" wire:model="fiscalyear" class="form-control form-control-sm">
            <option selected>{{ __('lang.chose') }}</option>
            @foreach ($fyear as $fyears)
                <option value="{{ $fyears->fiscalYear }}" style="color:black;">{{ $fyears->fiscalYear }}</option>
            @endforeach
        </select>
        @error('fiscalyear')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group form-row align-items-center col-md-6 float-left">
        <label for="institution">{{ __('lang.Customer') }}</label>
        <select name="customer" wire:model="selectedCustomer" class="form-control form-control-sm">
            <option>{{ __('lang.chose') }}</option>
            @foreach ($customer as $customers)
                <option value="{{ $customers->id }}">{{ $customers->cname }}</option>
            @endforeach
        </select>
        @error('customer')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group form-row align-items-center  col-md-6">
        <label for="loanamount">{{ __('lang.loanAmount') }}</label></label>
        <input type="number" wire:model="amount" name="amount" class="form-control form-control-sm"
            placeholder="{{ __('lang.loanAmount') }}" required>
        @error('amount')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group form-row align-items-center col-md-6 float-left">
        <label for="sector">{{ __('lang.loanSector') }}
        </label>
        <select name="sector" wire:model="sector" class="form-control form-control-sm">
            <option>{{ __('lang.chose') }}</option>
            @foreach ($sectors as $sec)
                <option value="{{ $sec->sector }}">{{ $sec->{'sector_'.app()->getLocale()} }}</option>
            @endforeach
        </select>
        @error('sector')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group form-row align-items-center col-md-6 float-left">
        <label for="institution">{{ __('lang.loanProvider') }}</label>
        <select name="institute" wire:model="institute" class="form-control form-control-sm">
            <option>{{ __('lang.chose') }}</option>
            <option value="{{ __('ADBL') }}">{{ __('lang.ADBL') }}</option>
            <option value="{{ __('Sana Kisan') }}">{{ __('lang.SanaKisan') }}</option>
        </select>
        @error('institute')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group form-row align-items-center col-md-12">
        <label for="institute">{{ __('lang.Firm') }}</label>
        <input type="text" wire:model="firm" name="firm" class="form-control form-control-sm"
            placeholder="{{ __('lang.Firm') }}" required>
    </div>

    <div class="form-group form-row align-items-center col-md-6 float-left">
        <label for="applieddate">{{ __('lang.loanDate') }}</label>
        <input type="text" id="dol" wire:model="loanDate" name="loanDate" class="date-picker form-control"
            placeholder="{{ __('lang.loanDate') }}" required>
        @error('loanDate')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group form-row align-items-center col-md-6">
        <label for="loancleardate">{{ __('lang.clearanceDate') }}</label>
        <input type="text" wire:model.debounced="clearDate" name="clearDate" class="form-control"
            placeholder="{{ __('lang.loanClearDate') }}" required>
        @error('clearDate')
            <span class="error text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <button class="btn btn-success ml-2" type="submit">{{ __('lang.Create') }}</button>
    </div>
</form>
