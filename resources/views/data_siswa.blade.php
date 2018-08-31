@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')

<div class="main">
    <div class="card">
        <div class="card-header">
        	halaman data siswa
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="siswa">
                <thead>
                    <th style="width:200px;">Nama</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Opsi</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#siswa').dataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('api/datasiswa') }}",
                columns:[
                {data: 'nama', name:'nama'},
                {data: 'nis', name:'nis'},
                {data: 'nisn', name:'nisn'},
                {data: 'option', name:'option',orderable:false,searchable:false}
                ]
            });
        } );
    </script>
@endpush