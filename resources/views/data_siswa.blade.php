@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')
<div class="main">
    <div class="card">
        <div class="card-header">
        	halaman data siswa
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table_siswa"></table>
        </div>
    </div>
</div>
@endsection