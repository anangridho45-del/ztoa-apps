<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function showForm()
    {
        $products = Product::all();
        return view('contact', compact('products'));
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'message' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $product = Product::find($validatedData['product_id']);
        $quantity = $validatedData['quantity'];
        $totalPrice = $product->price * $quantity;

        $pemesanan = Pemesanan::create([
            'nama_pemesan' => $validatedData['nama_pemesan'],
            'variant' => $product->name, // Store product name in variant column
            'quantity' => $quantity,
            'message' => $validatedData['message'],
            'photo_path' => $photoPath,
        ]);

        // Construct WhatsApp message
        $message  = "Halo, saya {$validatedData['nama_pemesan']}.\n\n";
        $message .= "Saya ingin memesan:\n";
        $message .= "- Produk: {$product->name}\n";
        $message .= "- Jumlah: {$quantity}\n";
        $message .= "- Total Harga: Rp " . number_format($totalPrice, 0, ',', '.') . "\n\n";

        if (!empty($validatedData['message'])) {
            $message .= "Pesan tambahan: " . $validatedData['message'];
        }

        // Hardcoded business WhatsApp number
        $businessWhatsappNumber = '62895321088824';

                $whatsappUrl = 'https://api.whatsapp.com/send/?phone=' . $businessWhatsappNumber . '&text=' . urlencode($message);

        return redirect()->away($whatsappUrl);
    }
}
