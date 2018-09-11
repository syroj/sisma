<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="position: relative;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN MENU</li>
      <li class="treeview">
        <a href="{{url('/home')}}">
          <i class="fa fa-desktop"></i> <span>Dashboard</span>
        </a>
      </li>
      <!-- data sekolah -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-home"></i> <span>Data Sekolah</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{url('struktur')}}"><i class="fa fa-sitemap"></i> Struktur Organisasi</a></li>
          <li><a href="{{url('/staf')}}"><i class="fa fa-users"></i> Staf</a></li>
          <li><a href="{{url('/data_guru')}}"><i class="fa fa-user-circle"></i> Guru</a></li>
          <li><a href="{{url('/data_siswa')}}"><i class="fa fa-vcard"></i> Siswa</a></li>
          <li><a href="{{url('/kbm')}}"><i class="fa fa-book"></i> Proses KBM</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="{{url('nilai')}}">
          <i class="fa fa-edit"></i>
          <span> Nilai</span>
          <!-- <span class="label label-primary pull-right">4</span> -->
        </a>
      </li>
      <li>
        <a href="{{url('presensi')}}">
          <i class="fa fa-book"></i> <span>Presensi</span>
          <!-- <small class="label pull-right bg-green">new</small> -->
        </a>
      </li>
      <li class="treeview">
        <a href="{{url('guru')}}">
          <i class="fa fa-briefcase"></i>
          <span> Guru</span>
        </a>
      </li>
      <li class="treeview">
        <a href="{{url('siswa')}}">
          <i class="fa fa-users"></i>
          <span>Siswa</span>
        </a>
      </li>
      <li class="treeview">
        <a href="{{url('tu')}}">
          <i class="fa fa-gears"></i> <span>Tata Usaha</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
      </li>
      <li>
        <a href="{{url('bendahara')}}">
          <i class="fa fa-money"></i> <span> Bendahara</span>
          <!-- <small class="label pull-right bg-red">3</small> -->
        </a>
      </li>
      <li class="header">SETTINGS</li>
      <li><a href="{{url('/setting')}}"><i class="fa fa-wrench text-red"></i> <span>Setting</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>