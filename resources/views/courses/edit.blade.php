@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="text-primary font-libre mb-1">Edit Mata Kuliah: {{ $course->course_name }}</h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <form method="post" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        @method('put')
                        
                        {{-- Field Semester --}}
                        <div class="mb-3">
                            <label for="semester_id" class="form-label">Semester</label>
                            <input type="number" class="form-control" id="semester_id" name="semester_id" value="{{ old('semester_id', $course->semester_id) }}" required>
                        </div>
                        
                        {{-- Field Kode Mata Kuliah --}}
                        <div class="mb-3">
                            <label for="course_code" class="form-label">Kode Mata Kuliah</label>
                            <input type="text" class="form-control" id="course_code" name="course_code" value="{{ old('course_code', $course->course_code) }}" required>
                        </div>
                        
                        {{-- Field Nama Mata Kuliah --}}
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="course_name" name="course_name" value="{{ old('course_name', $course->course_name) }}" required>
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $course->description) }}</textarea>
                        </div>

                        {{-- Field Harga --}}
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga (Rp)</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $course->harga) }}" required>
                        </div>

                        <div class="d-flex justify-content-between pt-2">
                            <a href="{{ url('/courses') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Perbarui Mata Kuliah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection