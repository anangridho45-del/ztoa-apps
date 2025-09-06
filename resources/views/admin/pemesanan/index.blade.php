@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-5" style="color: #6A0DAD;">Manajemen Pemesanan</h1>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pemesan</th>
                            <th>Nomor WhatsApp</th>
                            <th>Varian</th>
                            <th>Jumlah</th>
                            <th>Pesan</th>
                            <th>Foto</th>
                            <th>Tanggal Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pemesanan as $pesanan)
                            <tr>
                                <td>{{ $pesanan->id }}</td>
                                <td>{{ $pesanan->nama_pemesan }}</td>
                                <td>{{ $pesanan->whatsapp_number }}</td>
                                <td>{{ $pesanan->variant }}</td>
                                <td>{{ $pesanan->quantity }}</td>
                                <td>{{ $pesanan->message }}</td>
                                <td>
                                    @if ($pesanan->photo_path)
                                        <a href="{{ asset('storage/' . $pesanan->photo_path) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $pesanan->photo_path) }}" alt="Foto Pesanan" style="max-width: 100px;">
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ $pesanan->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.pemesanan.edit', $pesanan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.pemesanan.destroy', $pesanan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus pesanan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data pemesanan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $pemesanan->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
</style>
@endpush
