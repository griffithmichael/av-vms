<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleController extends Controller
{
    //
    public function index()
    {
        $vehicles = Vehicle::all();

        return response()->json($vehicles, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|digits:4|integer',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'trim' => 'required|string|max:255',
        ]);

        $vehicle = Vehicle::create($request->all());

        return response()->json($vehicle, Response::HTTP_OK);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'year' => 'required|digits:4|integer',
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'trim' => 'required|string|max:255',
        ]);

        $vehicle->update($request->all());

        return response()->json($vehicle, Response::HTTP_OK);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicleId = $vehicle->id;
        $vehicle->delete();

        return response()->json([
            'message' => "ID#{$vehicleId} deleted",
        ], Response::HTTP_OK);
    }
}
