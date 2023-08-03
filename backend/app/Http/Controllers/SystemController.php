<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSystemRequest;
use App\Http\Requests\UpdateSystemRequest;
use App\Http\Resources\SystemCollection;
use App\Http\Resources\SystemResource;
use App\Models\System;
use App\Helpers\IPHelper;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new SystemCollection(System::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSystemRequest $request)
    {
        return new SystemResource(System::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(System $system)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSystemRequest $request, System $system)
    {
        $system->update($request->all());
        return new SystemResource($system->fresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(System $system)
    {
        $this->authorize('delete', $system);
        $system->delete();
        return response()->json([
            'message' => 'The system has been removed'
        ]);
    }

    public function latencyTesting(System $system) {
        $response = IPHelper::pingIPv4($system->ip_address);
        $latency_testing = $system->latencyTestings()->create([
            'alive' => $response['success'],
            'time' => $response['response_time'],
        ]);

        return $latency_testing;
    }
}
