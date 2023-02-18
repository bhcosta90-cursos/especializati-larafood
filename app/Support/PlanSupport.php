<?php

namespace App\Support;

use App\Models\Plan;
use Illuminate\Support\Facades\Hash;

class PlanSupport
{
    public function __construct(private Plan $plan)
    {
    }

    public function generateWithToken(string $id)
    {
        $date = now()->getTimestamp();
        $random = str()->random(15);

        return [
            'plan' => $id,
            'date' => $date,
            'random' => $random,
            'token' => base64_encode(Hash::make(config('hashing.plan') . $id . $date . $random)),
        ];
    }

    public function validateWithToken(string $id, string $date, string $random, string $token)
    {
        $token = base64_decode($token);
        $hash = config('hashing.plan') . $id . $date . $random;

        return Hash::check($hash, $token);
    }
}
