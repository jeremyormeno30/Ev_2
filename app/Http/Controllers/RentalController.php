<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function showRegisterClient(){
        $assigned = Client::pluck('vehicle_id')->toArray();
        $availableVehicles = Vehicle::whereNotIn('id', $assigned)->get();
        return View('admin.RegisterClient')->with([
            'vehicles' => $availableVehicles
        ]);
    }

    public function rentalAccount(Request $request){
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'names' => 'required|string',
            'lastname' => 'required|string',
            'lastname2' => 'required|string',
            'RUT' => 'required|string|min:7|max:9|unique:clientes,RUT',
            'email' => 'required|email',
            'deadline' => 'required',
            'returndate' => 'required',
        ]);
        Client::create([
            'vehicle_id' => $request->vehicle_id,
            'names' => $request->names,
            'lastname' => $request->lastname,
            'lastname2' => $request->lastname2,
            'RUT' => $request->RUT,
            'email' => $request->email,
            'deadline' => $request->deadline,
            'returndate' => $request->returndate,
        ]);
        return redirect()->route('home');
    }
}
