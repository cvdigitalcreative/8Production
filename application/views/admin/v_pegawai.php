<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Daftar Pegawai</li>
            </ol>
          </div>
        </div>
    </div>
    <!-- main body -->
    <div class="row">
      <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
          <div class="card-body">
            <div class="col-xl-12 mb-10">
                  <a href="" data-toggle="modal" data-target="#tambah-data" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-plus pr-2"></i> Tambah Data
                  </a>
            </div>
            <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered p-0">
              <thead>
                  <tr>
                    <th>Gambar</th>
                    <th>Nama pegawai</th>
                    <th>Spesialis</th>
                    <th>Nomor HP</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach($pegawai->result_array() as $row) :
                    $id = $row['pegawai_id'];
                    $nama = $row['pegawai_nama'];
                    $spesialis = $row['pegawai_spesialis'];
                    $nohp = $row['pegawai_nohp'];
                    $email = $row['pegawai_email'];
                    $alamat = $row['pegawai_alamat'];
                    $foto = $row['pegawai_foto'];
                    $username = $row['pegawai_username'];
                    $password = $row['pegawai_password'];
                  ?>
                  <tr>
                      <td style="width: 10%"><img src="<?php echo base_url()?>assets/images/<?php echo $foto;?>"  style="width: 100px"></td>
                      <td><?php echo $nama?></td>
                      <td><?php echo $spesialis?></td>
                      <td><?php echo $nohp?></td>
                      <td><?php echo $email?></td>
                      <td><?php echo $alamat?></td>
                      <td><?php echo $username?></td>
                      <td><?php echo $password?></td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#EditData<?php echo $id?>"><span class="ti-pencil"></span></a>
                        <a href="#" style="margin-left: 10px" data-toggle="modal" data-target="#HapusData<?php echo $id?>"><span class="ti-trash"></span></a>
                      </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
           </table>
          </div>
          </div>
        </div>
      </div>

      <!-- Modal Add Data -->
        <div class="modal" tabindex="-1" role="dialog" id="tambah-data">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Admin/Pegawai/save_pegawai" method="post" enctype="multipart/form-data">
                      <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Nama Pegawai*</label>
                                      <input class="form-control form-white" placeholder="Nama Pegawai" type="text" name="nama_pegawai" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Spesialis</label>
                                      <select class="form-control" name="spesialis">
                                          <option selected value="">Pilih</option>
                                          <option value="Videografer">Videografer</option>
                                          <option value="Fotografer">Fotografer</option>
                                          <option value="Pilot Drone">Pilot Drone</option>
                                          <option value="Backup Data">Backup Data</option>
                                          <option value="Koordinator Tim">Koordinator Tim</option>
                                          <option value="Editing">Editing</option>
                                      </select>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Nomor HP*</label>
                                      <input class="form-control form-white" placeholder="Nomor HP" type="number" name="nohp" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Email Pegawai</label>
                                      <input class="form-control form-white" placeholder="Email Pegawai" type="email" name="email" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Alamat</label>
                                      <input class="form-control form-white" placeholder="Alamat Pegawai" type="text" name="alamat" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Username Pegawai</label>
                                      <input class="form-control form-white" placeholder="Username Pegawai" type="text" name="username" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Password Pegawai</label>
                                      <input class="form-control form-white" placeholder="Password Pegawai" type="text" name="password" required/>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="exampleFormControlFile1">Upload Gambar</label>
                                    <input type="file" class="form-control-file" name="filefoto" required>
                                  </div>
                              </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success ripple save-category" id="simpan">Save</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Edit Data -->
        <?php foreach($pegawai->result_array() as $row) :
          $id = $row['pegawai_id'];
          $nama = $row['pegawai_nama'];
          $spesialis = $row['pegawai_spesialis'];
          $nohp = $row['pegawai_nohp'];
          $email = $row['pegawai_email'];
          $alamat = $row['pegawai_alamat'];
          $foto = $row['pegawai_foto'];
          $username = $row['pegawai_username'];
          $password = $row['pegawai_password'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="EditData<?php echo $id?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Admin/Pegawai/update_pegawai" method="post" enctype="multipart/form-data">
                      <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Nama Pegawai*</label>
                                      <input type="hidden" name="id" value="<?php echo $id?>">
                                      <input type="hidden" name="gambar" value="<?php echo $foto?>">
                                      <input class="form-control form-white" placeholder="Nama Pegawai" type="text" name="nama_pegawai" value="<?php echo $nama?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Spesialis</label>
                                      <select class="form-control" name="spesialis">
                                          <?php if($spesialis == "Videografer") : ?>
                                            <option value="">Pilih</option>
                                            <option selected value="Videografer">Videografer</option>
                                            <option value="Fotografer">Fotografer</option>
                                            <option value="Pilot Drone">Pilot Drone</option>
                                            <option value="Backup Data">Backup Data</option>
                                            <option value="Koordinator Tim">Koordinator Tim</option>
                                            <option value="Editing">Editing</option>
                                          <?php elseif($spesialis == "Fotografer"):?>
                                            <option value="">Pilih</option>
                                            <option value="Videografer">Videografer</option>
                                            <option selected value="Fotografer">Fotografer</option>
                                            <option value="Pilot Drone">Pilot Drone</option>
                                            <option value="Backup Data">Backup Data</option>
                                            <option value="Koordinator Tim">Koordinator Tim</option>
                                            <option value="Editing">Editing</option>
                                          <?php elseif($spesialis == "Pilot Drone"):?>
                                            <option value="">Pilih</option>
                                            <option value="Videografer">Videografer</option>
                                            <option value="Fotografer">Fotografer</option>
                                            <option selected value="Pilot Drone">Pilot Drone</option>
                                            <option value="Backup Data">Backup Data</option>
                                            <option value="Koordinator Tim">Koordinator Tim</option>
                                            <option value="Editing">Editing</option>
                                          <?php elseif($spesialis == "Backup Data"):?>
                                            <option value="">Pilih</option>
                                            <option value="Videografer">Videografer</option>
                                            <option value="Fotografer">Fotografer</option>
                                            <option value="Pilot Drone">Pilot Drone</option>
                                            <option selected value="Backup Data">Backup Data</option>
                                            <option value="Koordinator Tim">Koordinator Tim</option>
                                            <option value="Editing">Editing</option>
                                          <?php elseif($spesialis == "Koordinator Tim"):?>
                                            <option value="">Pilih</option>
                                            <option value="Videografer">Videografer</option>
                                            <option value="Fotografer">Fotografer</option>
                                            <option value="Pilot Drone">Pilot Drone</option>
                                            <option value="Backup Data">Backup Data</option>
                                            <option selected value="Koordinator Tim">Koordinator Tim</option>
                                            <option value="Editing">Editing</option>
                                          <?php elseif($spesialis == "Editing"):?>
                                            <option value="">Pilih</option>
                                            <option value="Videografer">Videografer</option>
                                            <option value="Fotografer">Fotografer</option>
                                            <option value="Pilot Drone">Pilot Drone</option>
                                            <option value="Backup Data">Backup Data</option>
                                            <option value="Koordinator Tim">Koordinator Tim</option>
                                            <option selected value="Editing">Editing</option>  
                                          <?php else :?>
                                            <option selected value="">Pilih</option>
                                            <option value="Videografer">Videografer</option>
                                            <option value="Fotografer">Fotografer</option>
                                            <option value="Pilot Drone">Pilot Drone</option>
                                            <option value="Backup Data">Backup Data</option>
                                            <option value="Koordinator Tim">Koordinator Tim</option>
                                            <option value="Editing">Editing</option>
                                          <?php endif;?>  
                                      </select>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Nomor HP*</label>
                                      <input class="form-control form-white" placeholder="Nomor HP" type="number" name="nohp" value="<?php echo $nohp?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Email Pegawai</label>
                                      <input class="form-control form-white" placeholder="Email Pegawai" type="email" name="email" value="<?php echo $email?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Alamat</label>
                                      <input class="form-control form-white" placeholder="Alamat Pegawai" type="text" name="alamat" value="<?php echo $alamat?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Username Pegawai</label>
                                      <input class="form-control form-white" placeholder="Username Pegawai" type="text" name="username" value="<?php echo $username?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Password Pegawai</label>
                                      <input class="form-control form-white" placeholder="Password Pegawai" type="text" name="password" value="<?php echo $password?>" required/>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="exampleFormControlFile1">Upload Gambar</label>
                                    <input type="file" class="form-control-file" name="filefoto">
                                  </div>
                              </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success ripple save-category" id="simpan">Save</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach;?>

        <!--Modal Delete Data -->
        <?php foreach($pegawai->result_array() as $row) :
          $id = $row['pegawai_id'];
          $nama = $row['pegawai_nama'];
          $spesialis = $row['pegawai_spesialis'];
          $nohp = $row['pegawai_nohp'];
          $email = $row['pegawai_email'];
          $alamat = $row['pegawai_alamat'];
          $foto = $row['pegawai_foto'];
          $username = $row['pegawai_username'];
          $password = $row['pegawai_password'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="HapusData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Admin/Pegawai/hapus_pegawai" method="post" enctype="multipart/form-data">
                        <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                    <input type="hidden" name="gambar" value="<?php echo $foto?>">
                                    <p>Apakah kamu yakin ingin menghapus pegawai dengan nama <b><i><?php echo $nama?></i></b></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success ripple save-category">Save</button>
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
                      heading: 'Error',
                      text: "Data tidak berhasil disimpan data berhasil",
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
