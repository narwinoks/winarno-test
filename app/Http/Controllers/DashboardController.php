<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $newCustomer = Customer::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
        $customerDistribution =  Customer::select('city', DB::raw('COUNT(*) as count'))
            ->groupBy('city')
            ->get();
        return view('features.dashboard.dashboard.index', compact('newCustomer', 'customerDistribution'));
    }
}
