<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use Illuminate\Http\Request;

class SellController extends Controller
{
    // Menampilkan semua transaksi penjualan
    public function index()
    {
        return response()->json(Sell::with(['prescription', 'market'])->get(), 200);
    }

    // Menyimpan data penjualan baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prescription_id' => 'required|exists:prescriptions,id',
            'market_id' => 'required|exists:markets,id',
            'jumlah' => 'required|integer|min:1',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $sell = Sell::create($validatedData);

        return response()->json($sell, 201);
    }

    // Menampilkan detail penjualan berdasarkan ID
    public function show($id)
    {
        $sell = Sell::with(['prescription', 'market'])->find($id);

        if (!$sell) {
            return response()->json(['message' => 'Sell not found'], 404);
        }

        return response()->json($sell, 200);
    }

    // Memperbarui data penjualan
    public function update(Request $request, $id)
    {
        $sell = Sell::find($id);

        if (!$sell) {
            return response()->json(['message' => 'Sell not found'], 404);
        }

        $validatedData = $request->validate([
            'prescription_id' => 'sometimes|exists:prescriptions,id',
            'market_id' => 'sometimes|exists:markets,id',
            'jumlah' => 'sometimes|integer|min:1',
            'total_harga' => 'sometimes|numeric|min:0',
        ]);

        $sell->update($validatedData);

        return response()->json($sell, 200);
    }

    // Menghapus data penjualan
    public function destroy($id)
    {
        $sell = Sell::find($id);

        if (!$sell) {
            return response()->json(['message' => 'Sell not found'], 404);
        }

        $sell->delete();

        return response()->json(['message' => 'Sell deleted successfully'], 200);
    }
}
