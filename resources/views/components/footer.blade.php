<footer class="footer bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-graduation-cap me-2" style="color: var(--primary-blue); font-size: 1.5rem;"></i>
                    <h5 class="mb-0 font-libre text-white">Studivine</h5>
                </div>
                <p class="text-muted">Platform pembelajaran yang membantu mahasiswa TRPL belajar lebih terarah dan efektif dengan panduan semester dan mata kuliah yang terstruktur.</p>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-white">Navigasi</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="text-light text-decoration-none">
                            <i class="fas fa-home me-2"></i>Beranda
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('login') }}" class="text-light text-decoration-none">
                            <i class="fas fa-sign-in-alt me-2"></i>Masuk
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('register') }}" class="text-light text-decoration-none">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-white">Fitur</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-book me-2"></i>Belajar Terstruktur
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-bullseye me-2"></i>Fokus pada Esensi
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-door-open me-2"></i>Akses Mudah
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="text-light text-decoration-none">
                            <i class="fas fa-chart-line me-2"></i>Pembaruan Berkala
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-white">Kontak</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2" style="color: var(--primary-blue);"></i>
                        <a href="mailto:info@studivine.ac.id" class="text-light text-decoration-none">info@studivine.ac.id</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone me-2" style="color: var(--primary-blue);"></i>
                        <a href="tel:+6281285080000" class="text-light text-decoration-none">+62 812 8508 0000</a>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt me-2" style="color: var(--primary-blue);"></i>
                        <span class="text-light">Yogyakarta, Indonesia</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <hr class="my-4" style="border-color: rgba(255, 255, 255, 0.2);">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-light">&copy; {{ date('Y') }} Studivine. All rights reserved.</p>
            </div>
            <div class="col-md-6">
                <div class="social-links text-md-end">
                    <a href="#" class="text-light text-decoration-none">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-light text-decoration-none">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-light text-decoration-none">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-light text-decoration-none">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>