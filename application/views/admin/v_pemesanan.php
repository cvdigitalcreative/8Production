<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"></h4>              
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Pemesanan </li>
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
                    <th width="50">Nama Pemesanan</th>
                    <th>Nama Paket</th>
                    <th width="50">Nomor HP</th>
                    <th>Email</th>
                    <th>Tanggal Awal</th>
                    <th>Tanggal Akhir</th>
                    <th>Transaksi</th>
                    <th>Konfirmasi</th>
                    <th><center>  Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                    $no = 0;
                    foreach($pemesanan->result_array() as $row) :
                    $no++;
                    $pemesanan_id = $row['pemesanan_id'];
                    $pemesanan_nama = $row['pemesanan_nama'];
                    $pemesanan_nohp = $row['pemesanan_nohp'];
                    $pemesanan_email = $row['pemesanan_email'];
                    $pemesanan_alamat = $row['pemesanan_alamat'];
                    $pemesanan_status = $row['pemesanan_status'];
                    $s_videografer = $row['s_videografer'];
                    $s_fotografer = $row['s_fotografer'];
                    $s_pilot_drone = $row['s_pilot_drone'];
                    $s_backup_data = $row['s_backup_data'];
                    $s_koordinator_tim = $row['s_koordinator_tim'];
                    $s_editing = $row['s_editing'];
                    $tglawal = $row['tglawal'];
                    $tglakhir = $row['tglakhir'];
                    $paket_id = $row['paket_id'];
                    $paket_nama = $row['paket_nama'];
                  ?>
                    <tr>         
                        <td><?php echo $pemesanan_nama?></td>
                        <td><?php echo $paket_nama?></td>
                        <td><?php echo $pemesanan_nohp?></td>
                        <td><?php echo $pemesanan_email?></td>
                        <td><?php echo $tglawal?></td>
                        <td><?php echo $tglakhir?></td>
                        <td><a href="<?php echo base_url()?>Admin/Pemesanan/transaksi/<?php echo $pemesanan_id?>"><button class="btn btn-primary">Transaksi</button></a></td>
                        <?php if($pemesanan_status == 0) : ?>
                          <td><a href="#" data-toggle="modal" data-target="#konfirmasi<?php echo $pemesanan_id?>"><button class="btn btn-success">Konfirmasi</button></a></td>
                        <?php elseif($pemesanan_status == 1) :?>
                          <td><a href="#" data-toggle="modal" data-target="#pegawai<?php echo $pemesanan_id?>"><button class="btn btn-primary">Pilih Pegawai</button></a></td>
                        <?php endif;?>
                        <td>
                          <a href="#" style="margin-right: 10px" data-toggle="modal" data-target="#EditData<?php echo $pemesanan_id?>"><span class="ti-pencil"></span></a>
                          <a href="#" style="margin-right: 10px" data-toggle="modal" data-target="#HapusData<?php echo $pemesanan_id?>"><span class="ti-trash"></span></a>
                        </td>
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
        foreach($pemesanan->result_array() as $row) :
          $no++;
          $pemesanan_id = $row['pemesanan_id'];
          $s_videografer = $row['s_videografer'];
          $s_fotografer = $row['s_fotografer'];
          $s_pilot_drone = $row['s_pilot_drone'];
          $s_backup_data = $row['s_backup_data'];
          $s_koordinator_tim = $row['s_koordinator_tim'];
          $s_editing = $row['s_editing'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="pegawai<?php echo $pemesanan_id?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Pegawai<?php echo $s_fotografer?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                        <form action="<?php echo base_url()?>Admin/Pemesanan/pilih_pegawai" method="post" enctype="multipart/form-data">
                          <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="col-md-12">
                                        <label class="control-label">Videografer</label>
                                        <input type="hidden" name="id" value="<?php echo $pemesanan_id?>">
                                        <select class="form-control" name="videografer">
                                            <option value="">Pilih</option>
                                              <?php foreach ($videografer->result_array() as $row) {
                                                $pegawai_id = $row['pegawai_id'];
                                                $pegawai_nama = $row['pegawai_nama'];
                                                if($s_videografer==$pegawai_id)
                                                  echo "<option value='$pegawai_id' selected disabled>$pegawai_nama</option>";
                                                else
                                                  echo "<option value='$pegawai_id'>$pegawai_nama</option>";
                                              }?>
                                        </select>
                                      </div>
                                    <div class="col-md-12">
                                      <label class="control-label">Fotografer</label>
                                      <select class="form-control" name="fotografer">
                                            <option selected value="">Pilih</option>
                                              <?php foreach ($fotografer->result_array() as $row) {
                                                $pegawai_id = $row['pegawai_id'];
                                                $pegawai_nama = $row['pegawai_nama'];
                                                if($s_fotografer==$pegawai_id)
                                                  echo "<option value='$pegawai_id' selected disabled>$pegawai_nama</option>";
                                                else
                                                  echo "<option value='$pegawai_id'>$pegawai_nama</option>";
                                              }?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="col-md-12">
                                      <label class="control-label">Pilot Drone</label>
                                      <select class="form-control" name="pilot_drone">
                                          <option selected value="">Pilih</option>
                                           <?php foreach ($pilot_drone->result_array() as $row) {
                                                $pegawai_id = $row['pegawai_id'];
                                                $pegawai_nama = $row['pegawai_nama'];
                                                if($s_pilot_drone==$pegawai_id)
                                                  echo "<option value='$pegawai_id' selected disabled>$pegawai_nama</option>";
                                                else
                                                  echo "<option value='$pegawai_id'>$pegawai_nama</option>";
                                              }?>
                                      </select>
                                    </div>
                                     <div class="col-md-12">
                                      <label class="control-label">Backup Data</label>
                                      <select class="form-control" name="backup_data">
                                          <option selected value="">Pilih</option>
                                           <?php foreach ($backup_data->result_array() as $row) {
                                                $pegawai_id = $row['pegawai_id'];
                                                $pegawai_nama = $row['pegawai_nama'];
                                                if($s_backup_data==$pegawai_id)
                                                  echo "<option value='$pegawai_id' selected disabled>$pegawai_nama</option>";
                                                else
                                                  echo "<option value='$pegawai_id'>$pegawai_nama</option>";
                                              }?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                     <div class="col-md-12">
                                      <label class="control-label">Koordiantor Tim</label>
                                      <select class="form-control" name="koordinator_tim">
                                          <option selected value="">Pilih</option>
                                           <?php foreach ($koordinator_tim->result_array() as $row) {
                                                $pegawai_id = $row['pegawai_id'];
                                                $pegawai_nama = $row['pegawai_nama'];
                                                if($s_koordinator_tim==$pegawai_id)
                                                  echo "<option value='$pegawai_id' selected disabled>$pegawai_nama</option>";
                                                else
                                                  echo "<option value='$pegawai_id'>$pegawai_nama</option>";
                                              }?>
                                      </select>
                                    </div>
                                     <div class="col-md-12">
                                      <label class="control-label">Editing</label>
                                      <select class="form-control" name="editing">
                                          <option selected value="">Pilih</option>
                                            <?php foreach ($editing->result_array() as $row) {
                                                $pegawai_id = $row['pegawai_id'];
                                                $pegawai_nama = $row['pegawai_nama'];
                                                if($s_editing==$pegawai_id)
                                                  echo "<option value='$pegawai_id' selected disabled>$pegawai_nama</option>";
                                                else
                                                  echo "<option value='$pegawai_id'>$pegawai_nama</option>";
                                              }?>
                                      </select>
                                    </div>
                                  </div>
                                  
                              </div>          
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success ripple save-category" id="simpan">Simpan</button>
                          </div>
                        </form>             
                </div>
            </div>
        </div>
        <?php endforeach;?>

      <?php 
        $no = 0;
        foreach($pemesanan->result_array() as $row) :
          $no++;
          $pemesanan_id = $row['pemesanan_id'];
          $pemesanan_nama = $row['pemesanan_nama'];
          $pemesanan_nohp = $row['pemesanan_nohp'];
          $pemesanan_email = $row['pemesanan_email'];
          $pemesanan_alamat = $row['pemesanan_alamat'];
          $tglawal = $row['tglawal'];
          $tglakhir = $row['tglakhir'];
          $paket_id = $row['paket_id'];
          $paket_nama = $row['paket_nama'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="EditData<?php echo $pemesanan_id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                        <form action="<?php echo base_url()?>Admin/Pemesanan/update_pemesanan" method="post" enctype="multipart/form-data">
                          <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Nama Pemesan</label>
                                      <input type="hidden" name="kode" value="<?php echo $pemesanan_id?>">
                                      <input class="form-control form-white" placeholder="Nama Lengkap" type="text" name="nama" value="<?php echo $pemesanan_nama?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Nomor hp pemesan</label>
                                      <input class="form-control form-white" placeholder="Masukkan nomor hp" type="text" name="nohp" value="<?php echo $pemesanan_nohp?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Email pemesan</label>
                                      <input class="form-control form-white" placeholder="Email Kamu" type="email" name="emailpemesanan" value="<?php echo $pemesanan_email?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Alamat pemesan</label>
                                      <textarea rows="4" class="form-control form-white" name="alamat"><?php echo $pemesanan_alamat?></textarea>
                                  </div>
                                  <div class="col-md-6">
                                      <label class="control-label">Tanggal Awal</label>
                                      <input class="form-control form-white" placeholder="Tanggal Awal" type="date" name="tglawal" value="<?php echo $tglawal?>" required/>
                                  </div>
                                  <div class="col-md-6">
                                      <label class="control-label">Tanggal Akhir</label>
                                      <input class="form-control form-white" placeholder="Tanggal Akhir" type="date" name="tglakhir" value="<?php echo $tglakhir?>" required/>
                                  </div>
                              </div>          
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success ripple save-category" id="simpan">Konfirmasi</button>
                          </div>
                        </form>             
                </div>
            </div>
        </div>
        <?php endforeach;?>

        <?php 
        $no = 0;
        foreach($pemesanan->result_array() as $row) :
          $no++;
          $pemesanan_id = $row['pemesanan_id'];
          $pemesanan_nama = $row['pemesanan_nama'];
          $pemesanan_nohp = $row['pemesanan_nohp'];
          $pemesanan_email = $row['pemesanan_email'];
          $pemesanan_alamat = $row['pemesanan_alamat'];
          $tglawal = $row['tglawal'];
          $tglakhir = $row['tglakhir'];
          $paket_id = $row['paket_id'];
          $paket_nama = $row['paket_nama'];
        ?>
        <!--Modal Delete Data -->
        <div class="modal" tabindex="-1" role="dialog" id="HapusData<?php echo $pemesanan_id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Admin/Pemesanan/hapus_pemesanan" method="post" enctype="multipart/form-data">
                        <div class="modal-body p-20">                     
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="kode" value="<?php echo $pemesanan_id?>">
                                    <p>Apakah kamu yakin ingin menghapus pemesanan <b><i><?php echo $paket_nama?></i></b> atas nama <b><i><?php echo $pemesanan_nama?></i></b> ?</p>
                                </div>
                            </div>                  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success ripple save-category">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach;?> 

         <?php 
        $no = 0;
        foreach($pemesanan->result_array() as $row) :
          $no++;
          $pemesanan_id = $row['pemesanan_id'];
          $pemesanan_nama = $row['pemesanan_nama'];
          $email = $row['pemesanan_email'];
          $paket_nama = $row['paket_nama'];
        ?>
        <!--Modal Delete Data -->
        <div class="modal" tabindex="-1" role="dialog" id="konfirmasi<?php echo $pemesanan_id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Admin/Pemesanan/Konfirmasi" method="post" enctype="multipart/form-data">
                        <div class="modal-body p-20">                     
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="kode" value="<?php echo $pemesanan_id?>">
                                    <input type="hidden" name="emailp" value="<?php echo $email?>">
                                    <input type="hidden" name="nama" value="<?php echo $pemesanan_nama?>">
                                    <p>Apakah kamu yakin ingin konfirmasi pemesanan <b><i><?php echo $paket_nama?></i></b> atas nama <b><i><?php echo $pemesanan_nama?></i></b>?</p>
                                </div>
                            </div>                  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-success ripple save-category">Simpan</button>
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
<?php if($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Status Pemesanan Telah dikonfirmasi",
                    showHideTransition: 'slide',
                    icon: 'Warning',
                    loader: true,        // Change it to false to disable loader
                    loaderBg: '#ffffff',
                    position: 'top-right',
                    bgColor: 'blue'
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

      <?php elseif($this->session->flashdata('msg')=='hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Warning',
                    text: "Data Berhasil dihapus dari database.",
                    showHideTransition: 'slide',
                    icon: 'Warning',
                    loader: true,        // Change it to false to disable loader
                    loaderBg: '#ffffff',
                    position: 'top-right',
                    bgColor: 'red'
                });
        </script>
    
    <?php else:?>

    <?php endif;?>