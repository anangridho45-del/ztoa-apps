<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::latest()->paginate(10);
        return view('admin.pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        return view('admin.pemesanan.edit', compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validatedData = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'whatsapp_number' => 'required|string|max:25',
            'variant' => 'required|string|in:boba,squash',
            'message' => 'nullable|string',
        ]);

        $pemesanan->update($validatedData);

        return redirect()->route('admin.pemesanan.index')->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        // Delete the photo if it exists
        if ($pemesanan->photo_path) {
            Storage::disk('public')->delete($pemesanan->photo_path);
        }

        $pemesanan->delete();

        return redirect()->route('admin.pemesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
