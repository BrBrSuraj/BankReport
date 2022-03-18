<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\State;
use App\Models\District;
use App\Models\Local;
use App\Models\Customer;

class CostumerCreateForm extends Component
{

    public $state, $district, $local, $cname, $cemail, $cphone, $statename, $districtname, $localLevelName;
    public $selectedState    = null;
    public $selectedDistrict = null;
    public $selectedLocal    = null;


    public function mount()
    {

        $this->state = State::all();
        $this->district = collect();
        $this->local    = collect();



    }

    protected $rules =
    [
        'cname' => 'required|min:3|max:20',
        'cemail' => 'required|unique:customers|email|max:50',
        'cphone' => 'numeric|digits:10',
        'selectedState' => 'required',
        'selectedDistrict' => 'required',
        'selectedLocal' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        $this->statename = State::where('id', $this->selectedState)->select('name')->first();

        $this->districtname = District::where('id', $this->selectedDistrict)->select('name')->first();
        $this->localLevelName = Local::where('id', $this->selectedLocal)->select('name')->first();

        $customer = Customer::firstOrCreate(
            ['cemail' => $this->cemail],
            [
                'user_id' => auth()->user()->id,
                'cname' => $this->cname,
                'cphone' => $this->cphone,
                'state' => $this->statename->name,
                'district' => $this-> districtname->name,
                'localLevel' => $this-> localLevelName->name,
            ]
        );

        if ($customer != null) {
            return redirect()->route('costumer.create')->with('success', 'Customer Created Successfully');
        } else {
            return redirect()->route('costumer.create')->with('success', 'Record Already Exist');
        }
    }



    public function updatedSelectedState($state)
    {

        $this->district = District::where('state_id', $state)->get();
    }

    public function updatedSelectedDistrict($district)
    {

        $this->local = Local::where('district_id', $district)->get();

    }


    public function render()
    {
        return view('livewire.costumer-create-form');
    }
}
