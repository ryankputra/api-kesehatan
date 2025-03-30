<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    // Menampilkan semua rekam medis
    public function index()
    {
        return response()->json(MedicalRecord::with('patient')->get(), 200);
    }

    // Menyimpan data rekam medis baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $medicalRecord = MedicalRecord::create($validatedData);

        return response()->json($medicalRecord, 201);
    }

    // Menampilkan detail rekam medis berdasarkan ID
    public function show($id)
    {
        $medicalRecord = MedicalRecord::with('patient')->find($id);

        if (!$medicalRecord) {
            return response()->json(['message' => 'Medical Record not found'], 404);
        }

        return response()->json($medicalRecord, 200);
    }

    // Memperbarui data rekam medis
    public function update(Request $request, $id)
    {
        $medicalRecord = MedicalRecord::find($id);

        if (!$medicalRecord) {
            return response()->json(['message' => 'Medical Record not found'], 404);
        }

        $validatedData = $request->validate([
            'patient_id' => 'sometimes|exists:patients,id',
            'diagnosis' => 'sometimes|string',
            'treatment' => 'sometimes|string',
            'tanggal' => 'sometimes|date',
        ]);

        $medicalRecord->update($validatedData);

        return response()->json($medicalRecord, 200);
    }

    // Menghapus data rekam medis
    public function destroy($id)
    {
        $medicalRecord = MedicalRecord::find($id);

        if (!$medicalRecord) {
            return response()->json(['message' => 'Medical Record not found'], 404);
        }

        $medicalRecord->delete();

        return response()->json(['message' => 'Medical Record deleted successfully'], 200);
    }
}
