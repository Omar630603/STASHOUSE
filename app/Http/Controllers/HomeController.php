<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function beranda()
    {
        $unitCategory = UnitCategory::all();
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
        return view('welcome', compact('unitCategory'));
    }
    public function daftarUnitPenyimpanan()
    {
        return view('daftarUnitPenyimpanan');
    }
    public function tentangKami()
    {
        return view('tentangKami');
    }
    public function faq()
    {
        return view('faq');
    }
}
