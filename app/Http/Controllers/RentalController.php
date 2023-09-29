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
            'RUT' => 'required|string|min:10|max:12',
            'email' => 'required|email',
            'deadline' => 'required|date|after_or_equal:today',
            'returndate' => 'required|date|after_or_equal:today',
        ],[
            'vehicle_id.required' => 'Patente es campo obligatorio.',
            'names.required' => 'Nombres es campo obligatorio.',
            'lastname.required' => 'Apellido Paterno es campo obligatorio.',
            'lastname2.required' => 'Apellido Materno es campo obligatorio.',
            'RUT.required' => 'RUT es campo obligatorio.',
            'email.required' => 'Email es campo obligatorio.',
            'deadline.required' => 'Fecha Arriendo es campo obligatorio.',
            'returndate.required' => 'Fecha de Entrega es obligatorio.',
            'after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',
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

    public function delete($id){
        $cliente = Client::find($id);
        $cliente->delete();
        return redirect()->route('home');
    }
}
