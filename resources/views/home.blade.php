@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="sidebar-logo py-3">
    <a class="fs-2" href="#">Dashboard</a>
    <p>Dashboard</p>
</div>

<main class="content px-3 py-2"
    style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.498); border-radius: 1.2rem;">
    @if (Session::get('canAccess'))
    <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
    @endif
    @if (Session::get('failed'))
    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
    @endif

    @if (Session::get('sudah'))
    <div class="alert alert-danger">{{ Session::get('sudah') }}</div>
    @endif
    @if (Auth::check() && Auth::user()->role == "admin")

    <div class="container-fluid">
        <div class="mb-3">
        </div>
        <div class="row">
            <div class="container px-4 ">
                <div class="row g-3 my-2 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
                            style="border: 1px solid #444;">
                            <div>
                                <h3 class="fs-2">{{ $jumlah_data_students }}</h3>
                                <p class="fs-5">Peserta Didik</p>
                            </div>
                            <i class="ri-user-fill fs-1"></i>
                        </div>
                    </div>
                    @php
                    $admin = 0;
                    $ps = 0;

                    foreach ($data_users as $user) {
                    if ($user['role'] === 'admin') {
                    $admin++;
                    } elseif ($user['role'] === 'ps') {
                    $ps++;
                    }
                    }
                    @endphp

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
                            style="border: 1px solid #444;">
                            <div>
                                <h3 class="fs-2">{{ $admin }}</h3>
                                <p class="fs-5">Admin</p>
                            </div>
                            <i class="ri-user-fill fs-1"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
                            style="border: 1px solid #444;">
                            <div>
                                <h3 class="fs-2">{{ $ps }}</h3>
                                <p class="fs-5">Pemb Siswa</p>
                            </div>
                            <i class="ri-user-fill fs-1"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
                            style="border: 1px solid #444;">
                            <div>
                                <h3 class="fs-2">{{ $jumlah_data_rombels }}</h3>
                                <p class="fs-5">Rombel</p>
                            </div>
                            <i class="ri-bookmark-fill fs-1"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded"
                            style="border: 1px solid #444;">
                            <div>
                                <h3 class="fs-2">{{ $jumlah_data_rayons }}</h3>
                                <p class="fs-5">Rayon</p>
                            </div>
                            <i class="ri-bookmark-fill fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
</main>


<script src="{{ asset('js/script.js') }}"></script>
@endsection