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
                return redirect()->route('admin.dashboard');
                break;
            case Role::CUSTOMER:
                return redirect()->route('customer.dashboard');
                break;
            case Role::STORAGE_OWNER:
                return redirect()->route('storage_owner.dashboard');
                break;
            case Role::DELIVERY_DRIVER:
                return redirect()->route('delivery_driver.dashboard');
                break;
            default:
                return redirect('/');
                break;
        }
    }
}
