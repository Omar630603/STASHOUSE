<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }
    public function chooceCity()
    {
        $user_ip = getenv('REMOTE_ADDR');
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $city = $geo["geoplugin_city"];
        $cities = Unit::select('city')->distinct()
            ->orderByRaw('FIELD(city, "' . $city . '") DESC')
            ->get(['city']);
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
        if ($cities->count() > 0 && isset($city)) {
            $message = 'Cool, we found units near you';
            Session::flash('info', $message);
        }
        return view(
            'customer.choose_city',
            compact('cities'),
        )->with('message', $message);
    }
}
