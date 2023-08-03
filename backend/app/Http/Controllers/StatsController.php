<?php

namespace App\Http\Controllers;

use App\Models\System;
use App\Models\LatencyTesting;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return System::with('latencyTestings')->get()->each(function ($system) {
            $system->grouped = $system->latencyTestings->groupBy('alive');
        })->all();
    }

    /**
     * Making data fake.
     */
    public function make_fake_data()
    {
        return LatencyTesting::factory()->count(25)->create();
    }
}
