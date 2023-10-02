<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function showRegisterClient(){
        $vehicles = Vehicle::all();
        return View('admin.RegisterClient')->with([
            'vehicles' => $vehicles,
        ]);
    }

    public function rentalAccount(Request $request){
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'names' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'lastname2' => 'required|string|max:255',
            'RUT' => 'required|string|min:8|max:12',
            'email' => 'required|email|max:255',
            'deadline' => 'required|date|after_or_equal:today',
            'returndate' => 'required|date|after_or_equal:deadline',
        ],[
            'vehicle_id.required' => 'Patente es campo obligatorio.',
            'names.required' => 'Nombres es campo obligatorio.',
            'lastname.required' => 'Apellido Paterno es campo obligatorio.',
            'lastname2.required' => 'Apellido Materno es campo obligatorio.',
            'RUT.required' => 'RUT es campo obligatorio.',
            'email.required' => 'Email es campo obligatorio.',
            'deadline.required' => 'Fecha Arriendo es campo obligatorio.',
            'returndate.required' => 'Fecha de Entrega es obligatorio.',
        ]);

        // Validacion si existe disponibilidad del vehiculo en las fechas ingresadas
        $existingRentals = Client::where('vehicle_id', $request->vehicle_id)
        ->where(function($query) use ($request) {
            $query->whereBetween('deadline', [$request->deadline, $request->returndate])
                ->orWhereBetween('returndate', [$request->deadline, $request->returndate])
                ->orWhere(function($query) use ($request) {
                    $query->where('deadline', '<=', $request->deadline)
                        ->where('returndate', '>=', $request->returndate);
                });
        })
        ->exists();

        if($existingRentals) {
        return redirect()->back()->withErrors(['error' => 'El vehículo ya está arrendado en las fechas seleccionadas']);
        }

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
