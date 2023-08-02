<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHistoryRequest;
use App\Http\Requests\UpdateHistoryRequest;
use App\Models\History;
use App\Http\Resources\HistoryCollection;
use App\Http\Resources\HistoryResource;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $lastId = History::orderBy('id', 'desc')->first();
        $table = History::create([
            'data' => json_encode([
                'name' => 'laravel',
                'order_number' => $lastId->id + 1
            ]),
            'order_id' => strval($lastId->id + 1)
        ]);

        return new HistoryCollection(History::all());
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
    public function store(StoreHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(History $history)
    {   
        return new HistoryResource($history);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryRequest $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(History $history)
    {
        //
    }
}
