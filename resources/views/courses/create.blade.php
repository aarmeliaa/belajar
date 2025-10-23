@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="container py-4">
    {{-- Header Section --}}
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-primary font-libre mb-1">Tambah Mata Kuliah Baru</h2>
        </div>
    </div>

    {{-- Form Section --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post" action="{{ route('courses.store') }}">
                        @csrf
                        
                        {{-- Field Semester --}}
                        <div class="mb-3">
                            <label for="semester_id" class="form-label">Semester</label>
                            <input type="number" class="form-control" id="semester_id" name="semester_id" required>
                        </div>

                        {{-- Field Kode Mata Kuliah --}}
                        <div class="mb-3">
                            <label for="course_code" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" id="course_code" name="course_code" required>
                        </div>

                        {{-- Field Nama Mata Kuliah --}}
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="course_name" name="course_name" required>
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        {{-- Field Harga --}}
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga (Rp)</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>

                        <div class="d-flex justify-content-between pt-2">
                            <a href="{{ url('/courses') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Mata Kuliah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection