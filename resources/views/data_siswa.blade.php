@extends('layouts.app2')
@section('content')
@include('layouts.sidebar')

<div class="main">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home"><span><i class="fa fa-vcard"></i></span> Siswa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"><span><i class="fa fa-edit"></i></span> Insert Data</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages"><span><i class="fa fa-gear"></i></span> Setting</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel">
                    <table class="table table-bordered table-striped display" id="siswa" style="width:100%;">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th style="text-align:center;">TTL</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </thead>
                        <tbody>
                        <?php $x=1?>
                        @foreach($siswa as $s)
                        <tr>
                            <td>{{$x++}}</td>
                            <td>{{$s->nama}}</td>
                            <td>{{$s->nis}}</td>
                            <td>{{$s->nisn}}</td>
                            <td>{{$s->tmp_lahir}}, {{$s->tgl_lahir}} </td>
                            <td>X IPA A</td>
                            <td>{{$s->status->status}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info"><span><i class="fa fa-search"></i></span></a>
                                <a href="#" class="btn btn-sm btn-primary"><span><i class="fa fa-pencil"></i></span></a>
                                <a href="#" class="btn btn-sm btn-danger"><span><i class="fa fa-trash"></i></span></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="profile" role="tabpanel">2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                  <div class="tab-pane" id="messages" role="tabpanel">3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $('#siswa').DataTable();
});
</script>
@endpush