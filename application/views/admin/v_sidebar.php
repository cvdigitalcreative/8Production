<div class="container-fluid">
  <div class="row">
    <!-- Left Sidebar -->
    <div class="side-menu-fixed">
     <div class="scrollbar side-menu-bg">
      <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <!-- menu title -->
         <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Website Components </li>
        <!-- All Form  -->
        <li>
          <a href="<?php echo base_url()?>Admin/Pemesanan"><i class="ti-calendar"></i><span class="right-nav-text">Data Pemesanan</span> </a>
        </li>
         <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#pegawai">
            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Pegawai</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
          </a>
          <ul id="pegawai" class="collapse" data-parent="#sidebarnav">
            <li> <a href="<?php echo base_url()?>Admin/Data_User">Data Pegawai</a> </li>
            <li> <a href="<?php echo base_url()?>Admin/Data_User/QC">Absensi Pegawai</a> </li>
          </ul>
        </li>
       <li>
          <a href="javascript:void(0);" data-toggle="collapse" data-target="#website">
            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Informasi Website</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div>
          </a>
          <ul id="website" class="collapse" data-parent="#sidebarnav">
            <li> <a href="<?php echo base_url()?>Admin/Data_User">Update Informasi</a> </li>
            <li> <a href="<?php echo base_url()?>Admin/Data_User/QC">Kategori Paket</a> </li>
            <li> <a href="<?php echo base_url()?>Admin/Data_User/QC">Tambah Paket</a> </li>

          </ul>
        </li>
        <li>
          <a href="<?php echo base_url()?>Admin/Pengguna"><i class="ti-user"></i><span class="right-nav-text">Agenda</span> </a>
        </li>
      
    </ul>
  </div> 
</div>
<!-- Left Sidebar End-->