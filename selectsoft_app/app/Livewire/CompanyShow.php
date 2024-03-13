<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Company;
use Livewire\Component;

class CompanyShow extends Component
{
    public $searchCompany = "";
    public $filterCity = "";
    public function render()
    {
        $companies = Company::query();

        if ($this->searchCompany) {
            $companies->where('business_name', 'like', '%' . $this->searchCompany . '%');
        }

        if ($this->filterCity) {
            $companies->whereHas('city', function ($query) {
                $query->where('name',$this->filterCity);
            });
        }

        $companies = $companies->get();
        $cities = City::all();

        return view('livewire.company-show');[
            'companies' => $companies,
            'cities' => $cities,
        ];
    }
}
