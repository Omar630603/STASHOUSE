<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryDriverController extends Controller
{
    public function index()
    {
        return view('delivery_driver.dashboard');
    }
}
