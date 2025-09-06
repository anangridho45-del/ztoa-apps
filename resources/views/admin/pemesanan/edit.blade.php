@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-5" style="color: #6A0DAD;">Edit Pemesanan #{{ $pemesanan->id }}</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.pemesanan.update', $pemesanan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_pemesan" class="form-label">Nama Pemesan:</label>
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan', $pemesanan->nama_pemesan) }}" required>
                    @error('nama_pemesan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="whatsapp_number" class="form-label">Nomor WhatsApp Anda:</label>
                    <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ old('whatsapp_number', $pemesanan->whatsapp_number) }}" required>
                    @error('whatsapp_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="variant" class="form-label">Pilih Varian Minuman:</label>
                    <select class="form-select" id="variant" name="variant" required>
                        <option value="boba" {{ old('variant', $pemesanan->variant) == 'boba' ? 'selected' : '' }}>Es Telang Boba</option>
                        <option value="squash" {{ old('variant', $pemesanan->variant) == 'squash' ? 'selected' : '' }}>Es Telang Squash</option>
                    </select>
                    @error('variant')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Pesan / Pertanyaan Tambahan (Opsional):</label>
                    <textarea class="form-control" id="message" name="message" rows="3">{{ old('message', $pemesanan->message) }}</textarea>
                    @error('message')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Pesanan</button>
                <a href="{{ route('admin.pemesanan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
