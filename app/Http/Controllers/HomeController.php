<?php

namespace App\Http\Controllers;

use App\Models\DeliveryCompany;
use App\Models\Unit;
use App\Models\UnitCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function beranda()
    {
        $unitCategory = UnitCategory::all();
        $deliveryCompanies = DeliveryCompany::all();
        foreach ($unitCategory as $key => $value) {
            $units = Unit::where('unit_category_id', $value->id)->pluck('price_per_day');
            // get the average price of the unit
            if ($units->count() > 0) {
                $average = $units->sum() / $units->count();
                $value->average_price = "Rp." . number_format($average, 0, ',', '.') . " - " . "Rp." . number_format($average + 2000, 0, ',', '.') . " / hari";
            } else {
                $value->average_price = "No available price Rp.0";
            }
        }
        return view('welcome', compact('unitCategory', 'deliveryCompanies'));
    }

    public function daftarUnitPenyimpanan(Request $request)
    {
        $selectedUnit = $request->unit_id;
        $selectedUnit = Unit::where([
            ['id', $selectedUnit],
            ['is_active', true],
            ['is_rented', false],
        ])->first();
        $city_name = $request->city;
        $cities = $this->getUintCitiesByCurrentCity($city_name);
        $unitCategory_id = $request->unitCategory;
        $categoryName = UnitCategory::find($unitCategory_id);
        $unitCategories = UnitCategory::all();
        if (isset($categoryName)) {
            $categoryName = $categoryName->name;
        }
        $units = Unit::where([
            ['is_active', true],
            ['is_rented', false],
        ]);
        $message = "";
        if ($city_name == 'all' && $unitCategory_id == 'all') {
            $units = $units->get();
        }
        if (isset($city_name) && isset($unitCategory_id) && $city_name != 'all' && $unitCategory_id != 'all') {
            $units = $units->where([
                ['city', $city_name],
                ['unit_category_id', $unitCategory_id],
            ])->get();
            if ($units->count() <= 0) {
                $message = "No unit with category " . $categoryName . " are available in " . $city_name . " city ";
            }
        } else if (isset($city_name) && $city_name != 'all') {
            if ($city_name == 0) return redirect()->back()->with('warning', 'Please select a city');
            $units = $units->where('city', $city_name,)->get();
            if ($units->count() <= 0) {
                $message = "No unit available in " . $city_name . " city";
                if ($unitCategory_id == 'all') {
                    $message = $message . " with all categories";
                }
            }
        } else if (isset($unitCategory_id) && $unitCategory_id != 'all') {
            $units = $units->where('unit_category_id', $unitCategory_id)->get();
            if ($units->count() <= 0) {
                $message = "No unit available with category " . $categoryName;
                if ($city_name == 'all') {
                    $message = $message . " in all cities";
                }
            }
        } else {
            if ($city_name != 'all' && $unitCategory_id != 'all') {
                $units = $units->get();
            }
            if ($city_name == 'all' && $unitCategory_id != 'all') {
                $units = $units->get();
            }
            if ($city_name != 'all' && $unitCategory_id == 'all') {
                $units = $units->get();
            }
            if ($units->count() <= 0) {
                $message = "No unit available";
            }
        }
        if ($message != "") {
            Session::flash('info', $message);
        }
        return view('daftarUnitPenyimpanan', compact(
            'units',
            'city_name',
            'cities',
            'unitCategory_id',
            'categoryName',
            'unitCategories',
            'selectedUnit'
        ));
    }

    public function chooceCity()
    {
        $currentCity = $this->getUserCity();
        $cities = $this->getUintCitiesByCurrentCity($currentCity);
        foreach ($cities as $value) {
            $count_units = Unit::where([
                ['city', $value->city],
                ['is_active', true],
                ['is_rented', false]
            ])->get()->count();
            if ($count_units > 0) {
                $value->available_units =  $count_units;
            } else {
                $value->available_units = 0;
            }
        }
        if ($cities->count() > 0 && isset($currentCity)) {
            $message = 'Cool, we found units near you';
            Session::flash('info', $message);
        }
        return view(
            'choose_city',
            compact('cities'),
        )->with('message', $message);
    }

    public function tentangKami()
    {
        return view('tentangKami');
    }

    public function faq()
    {
        return view('faq');
    }

    public function getUserCity()
    {
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $city = $geo["geoplugin_city"];
        return $city;
    }

    public function getUintCitiesByCurrentCity($currentCity)
    {
        $cities = Unit::select('city')->distinct()
            ->orderByRaw('FIELD(city, "' . $currentCity . '") DESC')
            ->get(['city']);
        return $cities;
    }
}
