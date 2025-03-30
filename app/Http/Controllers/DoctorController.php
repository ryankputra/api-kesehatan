<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Menampilkan semua data dokter
    public function index()
    {
        return response()->json(Doctor::all(), 200);
    }

    // Menyimpan data dokter baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
        ]);

        $doctor = Doctor::create($validatedData);

        return response()->json($doctor, 201);
    }

    // Menampilkan detail dokter berdasarkan ID
    public function show($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        return response()->json($doctor, 200);
    }

    // Memperbarui data dokter
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'spesialisasi' => 'sometimes|string|max:255',
            'kontak' => 'sometimes|string|max:255',
        ]);

        $doctor->update($validatedData);

        return response()->json($doctor, 200);
    }

    // Menghapus data dokter
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $doctor->delete();

        return response()->json(['message' => 'Doctor deleted successfully'], 200);
    }
}
