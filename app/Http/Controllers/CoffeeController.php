<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCoffeeRequest;
use App\Http\Requests\UpdateCoffeeRequest;
use App\Models\Coffee;
use App\Http\Resources\CoffeeCollection;
use App\Http\Resources\CoffeeResource;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CoffeeCollection(Coffee::all());
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
    public function store(StoreCoffeeRequest $request)
    {
        Coffee::create($request->all());

        return "You have created";
    }

    /**
     * Display the specified resource.
     */
    public function show(Coffee $coffee)
    {
        return new CoffeeResource($coffee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coffee $coffee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoffeeRequest $request, Coffee $coffee)
    {
        $coffee->update($request->all());
        return 'updated successfully';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coffee $coffee)
    {
        new CoffeeResource(Coffee::where("id", $coffee->id)->delete());
        return "Your record has been deleted";
    }

    public function sell($id, Request $request) {
        //modifying available value
        $modify = $request->modify;
        $value = Coffee::find($id);
        Coffee::findOrFail($id)->update(array('available' => $value->available - $modify));
        
        //modifying sold value
        Coffee::findOrFail($id)->update(array('sold' => $value->sold + $modify));

        return "You have selled";
    }
}
