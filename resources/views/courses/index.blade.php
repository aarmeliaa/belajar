@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah')

@section('content')
<div class="container py-4">
    {{-- Header Section --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="text-primary font-libre mb-1">Daftar Mata Kuliah</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Section --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body py-3">
                    <form action="{{ url('/courses') }}" method="GET" class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="filter" class="col-form-label fw-semibold">
                                <i class="fas fa-filter text-primary me-2"></i>Filter Semester:
                            </label>
                        </div>
                        <div class="col-auto">
                            <select name="semester_id" id="semester_id" class="form-select form-select-lg" onchange="this.form.submit()" style="min-width: 200px;">
                                <option value="">Semua Semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester }}" {{ $selectedSemesterId == $semester ? 'selected' : '' }}>
                                        Semester {{ $semester }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @if($selectedSemesterId)
                        <div class="col-auto">
                            <a href="{{ url('/courses') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>Reset
                            </a>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Search Section --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body py-3">
                    <form action="{{ url('/courses') }}" method="GET" class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="search_id" class="col-form-label fw-semibold">
                                <i class="fas fa-magnifying-glass text-primary me-2"></i>Cari Mata Kuliah:
                            </label>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="search" id="search_id" class="form-control" placeholder="Cari nama mata kuliah..." value="{{ $searchQuery }}">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    @if ($data_courses->isEmpty() && isset($searchQuery))
                    <div class="alert alert-warning mt-3">Tidak ada mata kuliah yang ditemukan.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Content Section --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-book me-2"></i>
                            @if($selectedSemesterId)
                                Mata Kuliah Semester {{ $selectedSemesterId }}
                            @else
                                Semua Mata Kuliah
                            @endif
                        </h5>
                        <a href="{{ route('courses.create') }}" class="btn btn-secondary btn-md">
                            <i class="fas fa-plus me-1"></i>Tambah Mata Kuliah
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if(count($data_courses) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold border-0 py-3">No.</th>
                                    <th class="fw-semibold border-0 py-3">Semester</th>
                                    <th class="fw-semibold border-0 py-3">Kode Mata Kuliah</th>
                                    <th class="fw-semibold border-0 py-3">Nama Mata Kuliah</th>
                                    <th class="fw-semibold border-0 py-3">Deskripsi</th>
                                    <th class="fw-semibold border-0 py-3">Harga</th>
                                    <th class="fw-semibold border-0 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_courses as $index => $course)
                                <tr class="border-bottom">
                                    <td class="py-3">
                                        <span class="badge bg-light text-dark">{{ $loop->iteration }}</span>
                                    </td>
                                    <td class="py-3">
                                        <span class="badge bg-primary">{{ $course->semester_id }}</span>
                                    </td>
                                    <td class="py-3">
                                        <code class="bg-light text-dark px-2 py-1 rounded">{{ $course->course_code }}</code>
                                    </td>
                                    <td class="py-3">
                                        <div class="fw-semibold text-dark">{{ $course->course_name }}</div>
                                    </td>
                                    <td class="py-3">
                                        <div class="text-muted small" style="max-width: 300px;">
                                            {{ Str::limit($course->description, 100) }}
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <span class="fw-bold text-success">{{ "Rp. ".number_format($course->harga, 0, ',', '.')}}</span>
                                    </td>
                                    <td class="py-3">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Yakin ingin dihapus?')" type="submit" class="btn btn-secondary btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-book-open text-muted" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="text-muted">Tidak ada mata kuliah</h5>
                        <p class="text-muted">Belum ada mata kuliah yang tersedia untuk semester yang dipilih.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Section --}}
    <div class="card mt-4 shadow-sm border-0">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="mb-0">
                <i class="fas fa-chart-bar me-2"></i>Statistik Mata Kuliah
            </h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Total Mata Kuliah:  </strong> {{ $totalCourses }}</li>
                <li class="list-group-item"><strong>Total Harga:    </strong> Rp. {{ number_format($totalHarga, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Harga Tertinggi:    </strong> Rp. {{ number_format($hargaTertinggi, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Harga Terendah: </strong> Rp. {{ number_format($hargaTerendah, 0, ',', '.') }}</li>
            </ul>
        </div>
    </div>
</div>

@endsection