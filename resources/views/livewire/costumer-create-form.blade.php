<div>
    <form wire:submit.prevent="submit">
        <div class="form-row align-items-center from-group col-md-6 float-left">
            <label for="name">{{ __('lang.Name') }}</label></label>

            <input type="text" wire:model="cname" name="cname" class="form-control form-control-sm"
                placeholder="{{ __('lang.enterName') }}">
            @error('cname')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-row align-items-center  col-md-6">
            <label for="exampleInputEmail1">{{ __('lang.Email') }}</label>
            <input type="email" wire:model="cemail" name="cemail" class="form-control form-control-sm"
                placeholder="{{ __('lang.enterEmail') }}">
            @error('cemail')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-row align-items-center  col-md-6 float-left">
            <label for="loancleardate">{{ __('lang.phoneNumber') }}</label>
            <input type="text" wire:model="cphone" name="cphone" class="form-control form-control-sm"
                placeholder="{{ __('lang.enterPhoneNumber') }}">
            @error('cphone')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-row align-items-center col-md-6 float-left">
            <label for="state">{{ __('lang.Province') }}</label>
            <select name="selectedState" wire:model="selectedState" class="form-control form-control-sm">
                <option selected>{{ __('lang.Chose') }}</option>
                @foreach ($state as $states)
                    <option value="{{ $states->id }}">{{ $states->{'name_'.app()->getLocale()} }}</option>
                @endforeach
            </select>
            @error('selectedState')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-row align-items-center col-md-6 float-left">
            <label for="district">{{ __('lang.District') }}</label>
            <select name="selectedDistrict" wire:model="selectedDistrict" class="form-control form-control-sm">
                <option selected>{{ __('lang.Chose') }}</option>
                @foreach ($district as $districts)
                    <option value="{{ $districts->id }}">{{ $districts->{'name_'.app()->getLocale()} }}</option>
                @endforeach
            </select>
            @error('selectedDistrict')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-row align-items-center col-md-6 float-left">
            <label for="locallevel">{{ __('lang.localLevel') }}</label>
            <select id="local" wire:model="selectedLocal" class="form-control form-control-sm">
                <option selected>{{ __('lang.Chose') }}</option>
                @foreach ($local as $local_levels)
                    <option value="{{ $local_levels->id }}">{{ $local_levels->{'name_'.app()->getLocale()} }}</option>
                @endforeach
            </select>
            @error('selectedLocal')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">

            <button class="btn btn-success ml-2" type="submit">{{ __('lang.Create') }}</button>

        </div>
    </form>
</div>
