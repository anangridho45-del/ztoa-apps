@extends('layouts.app')

@push('styles')
<style>
    /* Carousel height fix */
    #teamCarousel .carousel-item,
    #teamCarousel .carousel-item img {
        object-fit: cover;
        object-position: center;
    }

    /* Responsive height for smaller screens */
    #teamCarousel .carousel-item {
        height: 50vh;
    }

    /* Fixed height for screens >= 1200px wide */
    @media (min-width: 1200px) {
        #teamCarousel .carousel-item {
            height: 627px;
        }
    }
</style>
@endpush

@section('content')
{{-- Use container-fluid to allow the carousel to be full-width --}}
<div class="container-fluid">
    <div class="text-center my-5">
        <h1 class="text-5xl md:text-6xl" style="color: #6A0DAD; font-family: 'League Spartan', sans-serif;">Dari Telang Menjadi Gemilang</h1>
        <p class="lead text-xl md:text-2xl text-gray-700" style="font-family: 'League Spartan', sans-serif;">Teknologi, Ekonomi, Lingkungan, Alam, Nutrisi, Gemilang</p>
    </div>

    <div class="mb-5 shadow-lg" style="border-radius: 15px; overflow: hidden;">
        <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/1.JPG') }}" class="d-block w-100" alt="Team Image 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/2.JPG') }}" class="d-block w-100" alt="Team Image 2">
                </div>
                <div class="carousel-item" 
                     style="background-image: url('{{ asset('images/3.JPG') }}'); background-size: contain; background-position: center; background-repeat: no-repeat;">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- Use a standard container for the team members below the carousel --}}
    <div class="container">
        <div class="row justify-content-center">
            <!-- Team Member 1 -->
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4 team-member d-flex flex-column align-items-center" 
                 data-name="Chika Putri" 
                 data-role="CEO & Visionary Leader" 
                 data-photo="{{ asset('images/chikaaa.JPG') }}" 
                 data-bio="Chika adalah pemimpin visioner di balik Es Telang ZtoA. Dengan semangat inovasi, ia memimpin strategi perusahaan dan memastikan setiap produk memiliki kualitas terbaik untuk pelanggan.">
                <img src="{{ asset('images/chikaaa.JPG') }}" class="rounded-circle img-fluid mb-3 shadow-sm" alt="Chika Putri" style="cursor: pointer; width: 150px; height: 150px; object-fit: cover;">
                <h5 class="text-center">Chika Putri</h5>
                <p class="text-muted text-center">@chikkkapw_</p>
            </div>
            <!-- Team Member 2 -->
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4 team-member d-flex flex-column align-items-center"
                 data-name="Anang Ridho Sumantri"
                 data-role="CTO & Operations Head"
                 data-photo="{{ asset('images/dho.JPG') }}"
                 data-bio="Anang adalah otak di balik operasional dan teknologi kami. Keahliannya memastikan proses produksi dari bunga telang hingga menjadi minuman segar berjalan efisien dan higienis.">
                <img src="{{ asset('images/dho.JPG') }}" class="rounded-circle img-fluid mb-3 shadow-sm" alt="Anang Ridho Siswoyo" style="cursor: pointer; width: 150px; height: 150px; object-fit: cover;">
                <h5 class="text-center">Anang Ridho</h5>
                <p class="text-muted text-center">@anang.ridho.756</p>
            </div>
            <!-- Team Member 3 -->
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4 team-member d-flex flex-column align-items-center"
                 data-name="Zalfa Tri"
                 data-role="Creative & Brand Designer"
                 data-photo="{{ asset('images/tri.JPG') }}"
                 data-bio="Zalfa adalah seniman yang menciptakan identitas visual Es Telang ZtoA. Dari desain kemasan hingga materi promosi, sentuhan kreatifnya membuat brand kami menarik dan mudah dikenali.">
                <img src="{{ asset('images/tri.JPG') }}" class="rounded-circle img-fluid mb-3 shadow-sm" alt="Zalfa Tri" style="cursor: pointer; width: 150px; height: 150px; object-fit: cover;">
                <h5 class="text-center">Zalfa Tri</h5>
                <p class="text-muted text-center">@nvl.lisaa</p>
            </div>
            <!-- Team Member 4 -->
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4 team-member d-flex flex-column align-items-center"
                 data-name="Muhammad Adib"
                 data-role="Digital Platform Developer"
                 data-photo="{{ asset('images/ngib.JPG') }}"
                 data-bio="Adib adalah ahli digital yang membangun dan memelihara platform online kami. Berkat dia, pengalaman pelanggan di website dan media sosial kami selalu lancar dan menyenangkan.">
                <img src="{{ asset('images/ngib.JPG') }}" class="rounded-circle img-fluid mb-3 shadow-sm" alt="Muhammad Adib" style="cursor: pointer; width: 150px; height: 150px; object-fit: cover;">
                <h5 class="text-center">Muhammad Adib</h5>
                <p class="text-muted text-center">@muhaadib</p>
            </div>
            <!-- Team Member 5 -->
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4 team-member d-flex flex-column align-items-center"
                 data-name="Vresty Pasha"
                 data-role="Marketing & Community Manager"
                 data-photo="{{ asset('images/vres.JPG') }}"
                 data-bio="Vresty adalah suara Es Telang ZtoA di dunia luar. Ia merancang strategi pemasaran yang efektif dan membangun komunitas pelanggan yang loyal melalui berbagai program menarik.">
                <img src="{{ asset('images/vres.JPG') }}" class="rounded-circle img-fluid mb-3 shadow-sm" alt="Vresty Pasha" style="cursor: pointer; width: 150px; height: 150px; object-fit: cover;">
                <h5 class="text-center">Vresty Pasha</h5>
                <p class="text-muted text-center">@vrestysha</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modals')
<!-- Biodata Modal -->
<div x-ignore class="modal fade" id="biodataModal" tabindex="-1" aria-labelledby="biodataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title w-100 text-center" id="modalName"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center px-4 pb-4">
        <img id="modalPhoto" src="" class="rounded-circle img-fluid mb-3 shadow-sm" alt="Member Photo" style="width: 120px; height: 120px; object-fit: cover; margin-left: auto; margin-right: auto;">
        <h6 id="modalRole" class="text-muted mb-3"></h6>
        <p id="modalBio" class="mt-2"></p>
      </div>
    </div>
  </div>
</div>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof bootstrap === 'undefined') {
        console.error('Bootstrap is not loaded. Modal functionality will not work.');
        return;
    }

    const biodataModalElement = document.getElementById('biodataModal');
    if (!biodataModalElement) {
        console.error('Modal element #biodataModal not found.');
        return;
    }
    const biodataModal = new bootstrap.Modal(biodataModalElement);
    
    document.querySelectorAll('.team-member').forEach(member => {
        member.addEventListener('click', function() {
            const modalName = document.getElementById('modalName');
            const modalRole = document.getElementById('modalRole');
            const modalPhoto = document.getElementById('modalPhoto');
            const modalBio = document.getElementById('modalBio');

            if(modalName) modalName.textContent = this.dataset.name;
            if(modalRole) modalRole.textContent = this.dataset.role;
            if(modalPhoto) modalPhoto.src = this.dataset.photo;
            if(modalBio) modalBio.textContent = this.dataset.bio;
            
            biodataModal.show();

            // Drastically reduce animation load to prevent freezing
            triggerFlowerFall(3);
        });
    });

    // Optimized flower animation function
    function triggerFlowerFall(count) {
        const body = document.querySelector('body');
        if (!body) return;

        for (let i = 0; i < count; i++) {
            setTimeout(() => {
                const flower = document.createElement('div');
                flower.classList.add('flower');

                const size = Math.random() * (25 - 10) + 10;
                flower.style.width = `${size}px`;
                flower.style.height = `${size}px`;
                flower.style.left = `${Math.random() * window.innerWidth}px`;
                flower.style.position = 'fixed';
                flower.style.zIndex = '9999';

                const duration = Math.random() * (15 - 8) + 8;
                flower.style.animationDuration = `${duration}s, ${duration / 2}s`;
                
                body.appendChild(flower);

                flower.addEventListener('animationend', () => {
                    if (flower) {
                        flower.remove();
                    }
                });
            }, i * 150); // Increased stagger delay
        }
    }
});
</script>
@endpush