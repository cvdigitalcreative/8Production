<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Jadwal</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
      <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
          <div class="card-body">
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                    <th>Paket</th>
                    <th>Kontak Pelanggan</th>
                    <th>Email Pelanggan</th>
                    <th>Alamat Pekerjaan</th>
                    <th>Tanggal Awal</th>
                    <th>Tanggal Akhir</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                    $no = 0;
                    foreach($jadwal->result_array() as $row) :
                    $no++;
                    $pemesanan_id = $row['pemesanan_id'];
                    $pemesanan_nama = $row['pemesanan_nama'];
                    $pemesanan_nohp = $row['pemesanan_nohp'];
                    $pemesanan_email = $row['pemesanan_email'];
                    $pemesanan_alamat = $row['pemesanan_alamat'];
                    $tglawal = $row['tglawal'];
                    $tglakhir = $row['tglakhir'];
                    $pegawai_spesialis = $row['pegawai_spesialis'];
                    $konfirmasi_id = $row['konfirmasi_id'];
                    $konfirmasi_status = $row['konfirmasi_status'];
                  ?>
                  <tr>
                    <td><?php echo $pemesanan_nama?></td>
                    <td><?php echo $pemesanan_nohp?></td>
                    <td><?php echo $pemesanan_email?></td>
                    <td><?php echo $pemesanan_alamat?></td>
                    <td><?php echo $tglawal?></td>
                    <td><?php echo $tglakhir?></td>
                    <?php if($konfirmasi_status == 0) :?>
                    <td>
                      <a href="<?php echo base_url()?>Pegawai/Jadwal/Terima/<?php echo $konfirmasi_id?>/<?php echo $pemesanan_id?>/<?php echo $pegawai_spesialis?>"><button class="btn btn-primary mb-10">Terima</button></a>
                      <a href="#" data-toggle = "modal" data-target="#HapusData<?php echo $pemesanan_id?>"><button class="btn btn-danger ">Tidak Terima</button></a>
                    </td>
                    <?php else :?>
                      <td>
                        <a href=""><button class="btn btn-success">Pekerjaan Diterima</button></a>
                      </td>
                    <?php endif;?>
                      
                  </tr>
                  <?php endforeach;?>
              </tbody>
           </table>
          </div>
          </div>
        </div>
      </div>

        <?php 
                    $no = 0;
                    foreach($jadwal->result_array() as $row) :
                    $no++;
                    $pemesanan_id = $row['pemesanan_id'];
                    $pemesanan_nama = $row['pemesanan_nama'];
                    $pemesanan_nohp = $row['pemesanan_nohp'];
                    $pemesanan_email = $row['pemesanan_email'];
                    $pemesanan_alamat = $row['pemesanan_alamat'];
                    $tglawal = $row['tglawal'];
                    $tglakhir = $row['tglakhir'];
                    $pegawai_spesialis = $row['pegawai_spesialis'];
                    $konfirmasi_id = $row['konfirmasi_id'];
                    $konfirmasi_status = $row['konfirmasi_status'];
                  ?>
        <div class="modal" tabindex="-1" role="dialog" id="HapusData<?php echo $pemesanan_id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Pegawai/Jadwal/Tidak_Terima/<?php echo $konfirmasi_id?>/<?php echo $pemesanan_id?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" value="">
                                    <p>Jika anda melakukan aksi konfirmasi ini maka sistem akan menghapus pekerjaan dari daftar pekerjaan anda.</p>
                                    <p><b>Apakah anda yakin ?</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-success ripple save-category">Ya </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach;?>
  </div>


<!--=================================
 footer -->

    <footer class="bg-white p-4">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center text-md-left">
              <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="text-center text-md-right">
            <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
            <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
            <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
          </ul>
        </div>
      </div>
    </footer>
    </div>
  </div>
</div>
</div>

<!--=================================
 footer -->



<!--=================================
 jquery -->

<!-- jquery -->
<script src="<?php echo base_url()?>assets/admin/js/jquery-3.3.1.min.js"></script>

<!-- plugins-jquery -->
<script src="<?php echo base_url()?>assets/admin/js/plugins-jquery.js"></script>

<!-- plugin_path -->
<script>var plugin_path = '<?php echo base_url()?>assets/admin/js/';</script>

<!-- chart -->
<script src="<?php echo base_url()?>assets/admin/js/chart-init.js"></script>

<!-- calendar -->
<script src="<?php echo base_url()?>assets/admin/js/calendar.init.js"></script>

<!-- charts sparkline -->
<script src="<?php echo base_url()?>assets/admin/js/sparkline.init.js"></script>

<!-- charts morris -->
<script src="<?php echo base_url()?>assets/admin/js/morris.init.js"></script>

<!-- datepicker -->
<script src="<?php echo base_url()?>assets/admin/js/datepicker.js"></script>

<!-- sweetalert2 -->
<script src="<?php echo base_url()?>assets/admin/js/sweetalert2.js"></script>

<!-- toastr -->
<!-- <script src="<?php echo base_url()?>assets/admin/js/toastr.js"></script> -->

<!-- validation -->
<script src="<?php echo base_url()?>assets/admin/js/validation.js"></script>

<!-- lobilist -->
<script src="<?php echo base_url()?>assets/admin/js/lobilist.js"></script>

<!-- custom -->
<script src="<?php echo base_url()?>assets/admin/js/custom.js"></script>

</body>
</html>
<script src="<?php echo base_url().'assets/admin/js/jquery.toast.min.js'?>"></script>

<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>

    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Sukses',
                    text: "Data Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    loader: true,        // Change it to false to disable loader
                    loaderBg: '#ffffff',
                    position: 'top-right',
                    bgColor: '#7EC857'
                });
        </script>

      <?php elseif($this->session->flashdata('msg')=='success'):?>
          <script type="text/javascript">
                  $.toast({
                      heading: 'Sukses',
                      text: "Hapus data berhasil",
                      showHideTransition: 'slide',
                      icon: 'warning',
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#ffffff',
                      position: 'top-right',
                      bgColor: 'red'
                  });
          </script>
      <?php elseif($this->session->flashdata('msg')=='warning'):?>
          <script type="text/javascript">
                  $.toast({
                      heading: 'Berhasil',
                      text: "Pekerjaan Telah Dihialngkan",
                      showHideTransition: 'slide',
                      icon: 'warning',
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#ffffff',
                      position: 'top-right',
                      bgColor: 'orange'
                  });
          </script>
    <?php else:?>

    <?php endif;?>
