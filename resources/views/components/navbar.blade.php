<nav class="navbar navbar-expand-lg navbar-dark bg-primary-gradient py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand text-white fw-bold font-libre" href="{{ route('home') }}">Studivine</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Menu untuk yang belum login -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}#about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}#features">Fitur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-light ms-2 rounded-pill" href="{{ route('register') }}">Daftar</a>
                </li>            
            </ul>
        </div>
    </div>
</nav>
<div style="padding-top: 70px;"></div>