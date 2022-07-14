<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function beranda()
    {
        return view('welcome');
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
