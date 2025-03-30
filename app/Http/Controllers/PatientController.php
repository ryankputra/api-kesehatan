<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Menampilkan semua pasien
    public function index()
    {
        return response()->json(Patient::all(), 200);
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kontak' => 'required|string|max:255',
        ]);

        $patient = Patient::create($validatedData);

        return response()->json($patient, 201);
    }

    // Menampilkan detail pasien berdasarkan ID
    public function show($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        return response()->json($patient, 200);
    }

    // Memperbarui data pasien
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'sometimes|string|max:255',
            'tanggal_lahir' => 'sometimes|date',
            'kontak' => 'sometimes|string|max:255',
        ]);

        $patient->update($validatedData);

        return response()->json($patient, 200);
    }

    // Menghapus data pasien
    public function destroy($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->delete();

        return response()->json(['message' => 'Patient deleted successfully'], 200);
    }
}
