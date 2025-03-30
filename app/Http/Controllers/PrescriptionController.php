<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    // Menampilkan semua resep obat
    public function index()
    {
        // Mengambil semua data resep obat beserta relasi medical record
        return response()->json(Prescription::with('medicalRecord')->get(), 200);
    }

    // Menyimpan data resep obat baru
    public function store(Request $request)
    {
        // Validasi data yang dikirim melalui request
        $validatedData = $request->validate([
            'medical_record_id' => 'required|exists:medical_records,id', // Harus ada di tabel medical_records
            'obat' => 'required|string', // Wajib diisi dan harus berupa string
            'dosis' => 'required|string', // Wajib diisi dan harus berupa string
        ]);

        // Menyimpan data yang sudah divalidasi ke dalam database
        $prescription = Prescription::create($validatedData);

        // Mengembalikan response JSON dengan status 201 (Created)
        return response()->json([
            'success' => true,
            'message' => 'Resep obat berhasil ditambahkan',
            'data' => $prescription
        ], 201);
    }

    // Menampilkan detail resep obat berdasarkan ID
    public function show($id)
    {
        // Mencari resep obat berdasarkan ID, termasuk relasi dengan medical record
        $prescription = Prescription::with('medicalRecord')->find($id);

        // Jika data tidak ditemukan, kembalikan response 404
        if (!$prescription) {
            return response()->json([
                'success' => false,
                'message' => 'Prescription not found'
            ], 404);
        }

        // Jika ditemukan, kembalikan response JSON dengan data resep obat
        return response()->json($prescription, 200);
    }

    // Memperbarui data resep obat
    public function update(Request $request, $id)
    {
        // Mencari resep obat berdasarkan ID
        $prescription = Prescription::find($id);

        // Jika data tidak ditemukan, kembalikan response 404
        if (!$prescription) {
            return response()->json([
                'success' => false,
                'message' => 'Prescription not found'
            ], 404);
        }

        // Validasi data yang diperbarui (boleh kosong)
        $validatedData = $request->validate([
            'medical_record_id' => 'sometimes|exists:medical_records,id', // Opsional, harus valid jika diisi
            'obat' => 'sometimes|string', // Opsional, harus string jika diisi
            'dosis' => 'sometimes|string', // Opsional, harus string jika diisi
        ]);

        // Update data resep obat dengan data yang telah divalidasi
        $prescription->update($validatedData);

        // Mengembalikan response JSON dengan status 200 (OK)
        return response()->json([
            'success' => true,
            'message' => 'Resep obat berhasil diperbarui',
            'data' => $prescription
        ], 200);
    }

    // Menghapus data resep obat
    public function destroy($id)
    {
        // Mencari resep obat berdasarkan ID
        $prescription = Prescription::find($id);

        // Jika data tidak ditemukan, kembalikan response 404
        if (!$prescription) {
            return response()->json([
                'success' => false,
                'message' => 'Prescription not found'
            ], 404);
        }

        // Menghapus data dari database
        $prescription->delete();

        // Mengembalikan response JSON dengan status 200 (OK)
        return response()->json([
            'success' => true,
            'message' => 'Resep obat berhasil dihapus'
        ], 200);
    }
}
