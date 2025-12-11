<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name'  => 'required|string|max:255',
            'date'         => 'required|date',
            'time'         => 'required',
            'reason'       => 'nullable|string',
            'status'       => 'required|in:pendiente,realizada,cancelada',
        ]);

        $appointment = Appointment::create($data);

        return response()->json($appointment, 201);
    }

    public function show(Appointment $appointment)
    {
        return $appointment;
    }

    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'patient_name' => 'sometimes|required|string|max:255',
            'doctor_name'  => 'sometimes|required|string|max:255',
            'date'         => 'sometimes|required|date',
            'time'         => 'sometimes|required',
            'reason'       => 'nullable|string',
            'status'       => 'sometimes|required|in:pendiente,realizada,cancelada',
        ]);

        $appointment->update($data);

        return $appointment;
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return response()->json(['message' => 'Appointment deleted']);
    }
}