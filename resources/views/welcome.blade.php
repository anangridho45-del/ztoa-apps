@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-lg rounded-xl p-6 md:p-8 mt-6">
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <h1 class="text-5xl md:text-6xl font-league-spartan font-bold text-center mb-6 text-[#6A0DAD]">Es Telang ZtoA</h1>

        <!-- Banner Section -->
        <div class="bg-[#E0BBE4] rounded-lg p-6 text-center mb-8 flex flex-col items-center">
            <img src="{{ asset('images/banner.jpeg') }}" alt="Banner Es Telang" class="rounded-lg shadow-md w-full md:w-3/4 lg:w-1/2 h-auto max-h-80 object-cover">
            <p class="mt-4 text-gray-700 max-w-2xl mx-auto">
                Nikmati kesegaran alami Es Telang ZtoA! Terbuat dari bunga telang pilihan, minuman kami tidak hanya menyegarkan tetapi juga kaya akan manfaat kesehatan. Pilih varian favoritmu: Es Telang Boba dengan kenyalnya boba, atau Es Telang Squash dengan sentuhan lemon dan selasih yang menyegarkan.
            </p>
        </div>

        <!-- Benefits Section -->
        <div class="bg-[#D1F7C4] rounded-lg p-6 text-center">
            <h2 class="text-2xl font-bold text-green-700">Manfaat Bunga Telang</h2>
            <ul class="mt-4 space-y-2 text-gray-600 inline-block text-left">
                <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Kaya Antioksidan</li>
                <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Meningkatkan Kesehatan Mata</li>
                <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Mendukung Kesehatan Otak</li>
                <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Mengurangi Stres dan Kecemasan</li>
                <li class="flex items-center"><i class="fas fa-check-circle text-green-500 mr-2"></i> Detoksifikasi Tubuh</li>
            </ul>
        </div>
    </div>
</div>
@endsection
