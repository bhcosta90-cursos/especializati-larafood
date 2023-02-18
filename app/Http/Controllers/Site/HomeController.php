<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Support\PlanSupport;

class HomeController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->orderBy('price')->get();
        return view('site.home.index', compact('plans'));
    }

    public function plan(string $url, PlanSupport $planSupport)
    {
        $rs = Plan::where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        return redirect()->route('register', $planSupport->generateWithToken($rs->id));
    }
}
