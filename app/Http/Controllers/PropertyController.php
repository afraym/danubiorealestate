<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Property::all();
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
    public function store(Request $request)
    {
        // validate inputs
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'address' => 'required|string',
            'size' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'lat' => 'numeric',
            'lon' => 'numeric',
            'price' => 'required|numeric',
        ]);
       

        // store the in database
        $property = Property::create($request->only([
        'name',
        'type',
        'address',
        'size',
        'bedrooms',
        'lat',
        'lon',
        'price',
        ]));

        return response()->json("success", "Property added successfully",200);
    }

    /**
     * search properties by radius.
     */
    public function search(Request $request)
    {
        $query = Property::query();

        if ($request->has('type')) {
            $query->where('type', $request->input('type'));
        }

        if ($request->has('address')) {
            $query->where('address', 'LIKE', '%' . $request->input('address') . '%');
        }

        if ($request->has('')) {
            $query->where('size', '>=', $request->input('size'));
        }

        if ($request->has('bedrooms')) {
            $query->where('bedrooms', $request->input('bedrooms'));
        }

        if ($request->has('price')) {
            $query->where('price', '<=', $request->input('price'));
        }

        if ($request->has('lat') && $request->has('lon') && $request->has('radius')) {
            $lat = $request->input('lat');
            $lon = $request->input('lon');
            $radius = $request->input('radius'); // in kilometers

            $query->selectRaw("*, 6371 * acos(cos(radians($lat)) * cos(radians(lat)) * cos(radians(lon) - radians($lon)) + sin(radians($lat)) * sin(radians(lat))) as distance")->havingRaw("distance <= ?", [$radius]);
        }

        $properties = $query->get();

        return response()->json($properties);

    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        if (!$property) {
            return response()->json(['error' => 'Property not found'], 404);
        }
        return response()->json($property);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'type' => 'string',
            'address' => 'string',
            'size' => 'numeric',
            'bedrooms' => 'integer',
            'lat' => 'numeric',
            'lon' => 'numeric',
            'price' => 'numeric',
        ]);

        $property->update($request->only([
            'name',
            'type',
            'address',
            'size',
            'bedrooms',
            'lat',
            'lon',
            'price',
        ]));

        return response()->json(['success' => 'Property updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        
        $property = Property::find($property->id);
        if(!$property){
            return response()->json(['error' => 'Property not found', 404]);
        }
        $property->delete();
        return response()->json(['success' => 'Property deleted successfully']);
    }
}
