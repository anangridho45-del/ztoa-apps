@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5" style="color: #6A0DAD;">Formulir Pemesanan & Pemasaran</h1>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form id="orderForm" action="{{ route('pemasaran.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Nama Pemesan" required value="{{ old('nama_pemesan') }}">
            @error('nama_pemesan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="mb-3">
            <label class="form-label"><i class="fas fa-ruler-combined"></i> Pilih Ukuran:</label>
            <div class="d-flex">
                <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="size" id="sizeLarge" value="Large" checked>
                    <label class="form-check-label" for="sizeLarge">
                        Large
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="size" id="sizeSmall" value="Small">
                    <label class="form-check-label" for="sizeSmall">
                        Small
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label"><i class="fas fa-wine-bottle"></i> Pilih Menu:</label>
            <select class="form-select" id="product_id" name="product_id" required>
                {{-- Options will be populated by JavaScript --}}
            </select>
            @error('product_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label"><i class="fas fa-sort-numeric-up-alt"></i> Jumlah:</label>
            <div class="input-group quantity-input-group">
                <button class="btn btn-primary btn-sm" type="button" id="button-minus">-</button>
                <input type="number" class="form-control text-center" id="quantity" name="quantity" value="1" min="1" required>
                <button class="btn btn-primary btn-sm" type="button" id="button-plus">+</button>
            </div>
            @error('quantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label"><i class="fas fa-camera"></i> Unggah Foto Minuman (Opsional):</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Pesan / Pertanyaan Tambahan (Opsional)"></textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary submit-button">
            <i class="fas fa-paper-plane"></i> Kirim Pesanan
        </button>
    </form>
</div>
@endsection

@push('modals')
<!-- Confirmation Modal -->
<div x-ignore class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Pesanan Anda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nama Pemesan:</strong> <span id="summaryNama"></span></p>
        <p><strong>Pesanan:</strong> <span id="summaryPesanan"></span></p>
        <p><strong>Jumlah:</strong> <span id="summaryJumlah"></span></p>
        <p><strong>Rincian Harga:</strong> <span id="summaryRincian"></span></p>
        <hr>
        <h4 class="text-end"><strong>Total Harga:</strong> <span id="summaryTotal"></span></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" id="confirmButton" class="btn btn-primary">Konfirmasi & Kirim ke WhatsApp</button>
      </div>
    </div>
  </div>
</div>
@endpush

@push('styles')
<style>
    body {
        background-color: #F0F8FF; /* Light Blue */
    }
    main .container {
        background-color: #FFFFFF;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    h1 {
        font-weight: bold;
    }
    .form-label {
        font-weight: bold;
        color: #6A0DAD; /* Purple */
    }
    .form-control, .form-select {
        border-color: #E0BBE4; /* Light Purple */
    }
    .submit-button {
        background-color: #8A2BE2; /* Blue Violet */
        border-color: #8A2BE2;
        color: white;
    }
    .submit-button:hover {
        background-color: #6A0DAD; /* Darker Purple */
        border-color: #6A0DAD;
    }
    .alert-success {
        background-color: #D1F7C4; /* Light Green */
        border-color: #4CAF50;
        color: #333;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        main .container {
            margin: 10px;
            padding: 15px;
        }
        h1 {
            font-size: 1.8rem;
        }
    }

    .quantity-input-group .btn {
        padding: .25rem .5rem; /* Smaller padding for buttons */
        font-size: .875rem; /* Smaller font size */
        width: 40px; /* Fixed width for buttons */
    }
    .quantity-input-group .form-control {
        padding: .25rem .5rem; /* Smaller padding for input */
        font-size: .875rem; /* Smaller font size */
        height: calc(1.5em + .5rem + 2px); /* Adjust height to match buttons */
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Existing Scripts ---
        const quantityInput = document.getElementById('quantity');
        const buttonMinus = document.getElementById('button-minus');
        const buttonPlus = document.getElementById('button-plus');

        if(buttonMinus) {
            buttonMinus.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
        }

        if(buttonPlus) {
            buttonPlus.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });
        }

        const allProducts = @json($products);
        const productDropdown = document.getElementById('product_id');
        const sizeRadios = document.querySelectorAll('input[name="size"]');

        function updateProductDropdown(selectedSize) {
            productDropdown.innerHTML = '';
            const filteredProducts = allProducts.filter(product => {
                const isSmall = product.name.toLowerCase().includes('(kecil)');
                return (selectedSize === 'Small') ? isSmall : !isSmall;
            });

            const placeholder = document.createElement('option');
            placeholder.value = "";
            placeholder.textContent = "-- Pilih Menu " + selectedSize + " --";
            placeholder.disabled = true;
            placeholder.selected = true;
            productDropdown.appendChild(placeholder);

            filteredProducts.forEach(product => {
                const option = document.createElement('option');
                option.value = product.id;
                option.textContent = product.name + ' (Rp ' + product.price.toLocaleString('id-ID') + ')';
                productDropdown.appendChild(option);
            });
        }

        sizeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                updateProductDropdown(this.value);
            });
        });

        updateProductDropdown('Large');

        // --- New Modal Script ---
        const orderForm = document.getElementById('orderForm');
        const confirmationModalElement = document.getElementById('confirmationModal');
        const confirmationModal = new bootstrap.Modal(confirmationModalElement);
        let isConfirmed = false;

        orderForm.addEventListener('submit', function(event) {
            if (isConfirmed) {
                return; // Let form submit
            }
            
            event.preventDefault(); // Stop submission

            const namaPemesan = document.getElementById('nama_pemesan').value;
            const productId = document.getElementById('product_id').value;
            const quantity = parseInt(document.getElementById('quantity').value);

            if (!productId) {
                alert('Silakan pilih menu terlebih dahulu.');
                return;
            }

            const selectedProduct = allProducts.find(p => p.id == productId);
            const unitPrice = selectedProduct.price;
            const totalPrice = quantity * unitPrice;

            document.getElementById('summaryNama').textContent = namaPemesan;
            document.getElementById('summaryPesanan').textContent = selectedProduct.name;
            document.getElementById('summaryJumlah').textContent = quantity;
            document.getElementById('summaryRincian').textContent = `Rp ${unitPrice.toLocaleString('id-ID')} x ${quantity}`;
            document.getElementById('summaryTotal').textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
            
            confirmationModal.show();
        });

        document.getElementById('confirmButton').addEventListener('click', function() {
            isConfirmed = true;
            orderForm.submit();
        });
    });
</script>
@endpush