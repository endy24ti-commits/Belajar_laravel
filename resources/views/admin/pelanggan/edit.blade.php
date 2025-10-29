@extends('admin.layouts.app')
@section('title', 'Edit Pelanggan')
@section('content')

{{-- start main content --}}
<div class="py-4"> {{-- Gunakan py-4 di sini untuk padding vertikal --}}
    
    <!-- Bagian Atas: Breadcrumb, Judul, dan Tombol Kembali -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-4">
        
        <!-- Kolom Kiri: Breadcrumb dan Judul -->
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                </ol>
            </nav>
            <h2 class="h4">Edit Pelanggan</h2>
            <p class="mb-0">Form untuk mengedit data pelanggan.</p>
        </div>

        <!-- Kolom Kanan: Tombol Kembali -->
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('pelanggan.index') }}" class="btn btn-gray-800 d-inline-flex align-items-center">
                Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Bagian Card Form -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- First Name -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="first_name" class="form-label">First name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control"
                                       value="{{ old('first_name', $dataPelanggan->first_name) }}" required>
                                {{-- Tambahkan penanganan error di sini jika diperlukan --}}
                            </div>

                            <!-- Birthday -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="birthday" class="form-label">Birthday</label>
                                <div class="input-group">
                                    <input type="date" id="birthday" name="birthday" class="form-control"
                                           value="{{ old('birthday', $dataPelanggan->birthday) }}">
                                    <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg></span>
                                </div>
                                {{-- Tambahkan penanganan error di sini jika diperlukan --}}
                            </div>

                            <!-- Email -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       value="{{ old('email', $dataPelanggan->email) }}" required>
                                {{-- Tambahkan penanganan error di sini jika diperlukan --}}
                            </div>
                        </div>

                        <div class="row">
                            <!-- Last Name -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control"
                                       value="{{ old('last_name', $dataPelanggan->last_name) }}" required>
                                {{-- Tambahkan penanganan error di sini jika diperlukan --}}
                            </div>

                            <!-- Gender -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    <option value="Male" {{ $dataPelanggan->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $dataPelanggan->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ $dataPelanggan->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                {{-- Tambahkan penanganan error di sini jika diperlukan --}}
                            </div>

                            <!-- Phone -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                       value="{{ old('phone', $dataPelanggan->phone) }}">
                                {{-- Tambahkan penanganan error di sini jika diperlukan --}}
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-4 d-flex justify-content-end"> {{-- Atur tombol ke kanan --}}
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-light ms-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end main content --}}
@endsection
