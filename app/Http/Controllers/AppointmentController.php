<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Menampilkan semua janji temu
    public function index()
    {
        return response()->json(Appointment::with(['patient', 'doctor'])->get(), 200);
    }

    // Menyimpan data janji temu baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'tanggal' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        $appointment = Appointment::create($validatedData);

        return response()->json($appointment, 201);
    }

    // Menampilkan detail janji temu berdasarkan ID
    public function show($id)
    {
        $appointment = Appointment::with(['patient', 'doctor'])->find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        return response()->json($appointment, 200);
    }

    // Memperbarui data janji temu
    public function update(Request $request, $id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $validatedData = $request->validate([
            'patient_id' => 'sometimes|exists:patients,id',
            'doctor_id' => 'sometimes|exists:doctors,id',
            'tanggal' => 'sometimes|date',
            'status' => 'sometimes|string|max:255',
        ]);

        $appointment->update($validatedData);

        return response()->json($appointment, 200);
    }

    // Menghapus data janji temu
    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully'], 200);
    }
}
