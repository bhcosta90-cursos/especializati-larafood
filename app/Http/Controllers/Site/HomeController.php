<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $plans = Plan::with('details')->orderBy('price')->get();
        return view('site.home.index', compact('plans'));
    }

    public function plan(string $url)
    {
        $rs = Plan::where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $date = Carbon::now()->getTimestamp();
        $random = str()->random(15);

        return redirect()->route('register', [
            'plan' => $rs->id,
            'date' => $date,
            'random' => $random,
            'token' => base64_encode(Hash::make($rs->id . $date . $random)),
        ]);
    }
}
