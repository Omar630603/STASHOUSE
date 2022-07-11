<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role_id;
        switch ($role) {
            case Role::ADMIN:
                return redirect()->route('dashboard.admin');
                break;
            case Role::CUSTOMER:
                return redirect()->route('dashboard.customer');
                break;
            case Role::STORAGE_OWNER:
                return redirect()->route('dashboard.storage_owner');
                break;
            case Role::DELIVERY_DRIVER:
                return redirect()->route('dashboard.delivery_driver');
                break;
            default:
                return redirect('/');
                break;
        }
    }
}
