@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')
<div class="main">
    
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#struktur" role="tab" aria-controls="profile"><span><i class="fa fa-sitemap"></i></span> Struktur</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add_struktur" role="tab" aria-controls="profile"><span><i class="fa fa-pencil"></i></span> Tambah Struktur</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#jobdesc" role="tab" aria-controls="messages"><span><i class="fa fa-list"></i></span> Deskripsi</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="struktur" role="tabpanel">
                    ini halaman Struktur
                </div>
                <div class="tab-pane" id="add_struktur" role="tabpanel">
                    halaman add Struktur
                </div>
                <div class="tab-pane" id="jobdesc" role="tabpanel">
                    halaman job description
                </div>
            </div>
        </div>
    </div>

</div>
@endsection