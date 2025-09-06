<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // Import the model

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the table to start fresh, preventing duplicates.
        Product::truncate();

        // Existing Products (updated descriptions and paths)
        Product::create([
            'name' => 'Es Telang Boba',
            'description' => 'Minuman segar es telang dengan tambahan boba kenyal yang manis. Ukuran besar.',
            'price' => 15000,
            'image_path' => 'images/bobatelang.jpeg',
        ]);

        Product::create([
            'name' => 'Es Telang Squash',
            'description' => 'Minuman es telang yang menyegarkan dengan perasan lemon dan biji selasih. Ukuran besar.',
            'price' => 12000,
            'image_path' => 'images/squashtelang.jpeg',
        ]);

        // New Products
        Product::create([
            'name' => 'Es Telang Boba (Kecil)',
            'description' => 'Versi hemat dari Es Telang Boba, dengan kesegaran dan rasa yang sama dalam porsi kecil.',
            'price' => 10000,
            'image_path' => 'images/bobatelang.jpeg', // Re-using image
        ]);

        Product::create([
            'name' => 'Es Telang Squash (Kecil)',
            'description' => 'Kesegaran Es Telang Squash dalam porsi yang lebih pas di kantong dan cocok untuk sekali minum.',
            'price' => 8000,
            'image_path' => 'images/squashtelang.jpeg', // Re-using image
        ]);

        Product::create([
            'name' => 'Bunga Telang Kering',
            'description' => 'Bunga telang kering berkualitas untuk Anda seduh sendiri di rumah. Nikmati manfaat kesehatannya setiap saat.',
            'price' => 25000,
            'image_path' => 'images/teler.jpeg', // Placeholder image
        ]);
    }
}