@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5 text-5xl md:text-6xl font-league-spartan" style="color: #6A0DAD;">Menu Minuman Es Telang ZtoA</h1>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-6 mb-4">
            <div class="card product-card h-100">
                <img src="{{ asset($product->image_path) }}" 
                     class="card-img-top" 
                     alt="{{ $product->name }}"
                     style="cursor: pointer;"
                     data-bs-toggle="modal"
                     data-bs-target="#productModal"
                     data-image-url="{{ asset($product->image_path) }}"
                     data-name="{{ $product->name }}"
                     data-price="Rp {{ number_format($product->price, 0, ',', '.') }}"
                     data-description="{{ $product->description }}"
                     data-order-url="{{ route('pemasaran.form', ['product_id' => $product->id]) }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title" style="color: #6A0DAD;">{{ $product->name }}</h5>
                    <p class="card-text flex-grow-1">{{ $product->description }}</p>
                    <p class="card-price" style="color: #4CAF50; font-weight: bold;">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('pemasaran.form', ['product_id' => $product->id]) }}" class="btn btn-primary order-button mt-auto">Pesan Sekarang</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('modals')
<!-- Product Detail Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Detail Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <img id="modalImage" src="" class="img-fluid rounded" alt="Product Image">
            </div>
            <div class="col-md-6 d-flex flex-column">
                <h3 id="modalName"></h3>
                <p id="modalDescription" class="flex-grow-1"></p>
                <h4 id="modalPrice" class="text-success"></h4>
                <a href="#" id="modalOrderButton" class="btn btn-primary mt-3">Pesan Sekarang</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endpush

@push('styles')
<style>
    body {
        background-color: #F0F8FF;
    }
    main .container {
        background-color: #FFFFFF;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    .product-card {
        border: 1px solid #E0BBE4;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }
    .product-card:hover {
        transform: translateY(-5px);
    }
    .card-img-top {
        width: 100%;
        height: 250px; 
        object-fit: cover;
    }
    #modalImage {
        width: 100%;
        height: 400px;
        object-fit: contain;
        border-radius: 10px;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const productModal = document.getElementById('productModal');
    productModal.addEventListener('show.bs.modal', function (event) {
        // Element that triggered the modal
        const button = event.relatedTarget;

        // Extract info from data-* attributes
        const imageUrl = button.getAttribute('data-image-url');
        const name = button.getAttribute('data-name');
        const price = button.getAttribute('data-price');
        const description = button.getAttribute('data-description');
        const orderUrl = button.getAttribute('data-order-url');

        // Update the modal's content
        const modalImage = productModal.querySelector('#modalImage');
        const modalName = productModal.querySelector('#modalName');
        const modalDescription = productModal.querySelector('#modalDescription');
        const modalPrice = productModal.querySelector('#modalPrice');
        const modalOrderButton = productModal.querySelector('#modalOrderButton');

        modalImage.src = imageUrl;
        modalName.textContent = name;
        modalDescription.textContent = description;
        modalPrice.textContent = `Harga: ${price}`;
        modalOrderButton.href = orderUrl;
    });
});
</script>
@endpush