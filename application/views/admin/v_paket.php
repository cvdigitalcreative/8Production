<div class="content-wrapper">
    <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Daftar Paket</li>
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
                    <th>Nama paket</th>
                    <th>Harga paket</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach($paket->result_array() as $row) :
                    $id = $row['paket_id'];
                    $nama = $row['paket_nama'];
                    $tanggal = $row['paket_tanggal'];
                    $harga = $row['paket_harga'];
                    $deskripsi = $row['paket_keterangan'];
                    $gambar = $row['paket_gambar'];
                    $kategori_paket = $row['kp_nama'];
                  ?>
                  <tr>
                      <td style="width: 10%"><img src="<?php echo base_url()?>assets/images/<?php echo $gambar;?>"  style="width: 100px"></td>
                      <td><?php echo $nama?></td>
                      <td><?php echo $harga?></td>
                      <td><?php echo $kategori_paket?></td>
                      <td>
                        <a href="<?php echo base_url()?>Admin/Paket/vUpdate_Paket/<?php echo $id?>" style="margin-right: 20px"><span class="ti-pencil"></span></a>
                        <a href="#" style="margin-right: 20px" data-toggle="modal" data-target="#HapusData<?php echo $id?>"><span class="ti-trash"></span></a>
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
                    <form action="<?php echo base_url()?>Admin/Paket/save_paket" method="post" enctype="multipart/form-data">
                      <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Nama paket*</label>
                                      <input class="form-control form-white" placeholder="Nama paket" type="text" name="nama_paket" required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Harga Paket*</label>
                                      <input class="form-control form-white" placeholder="Harga paket" type="text" name="harga_paket" value="Rp. " required/>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Kategori</label>
                                      <select class="form-control" name="kategori">
                                          <option selected value="">Pilih</option>
                                           <?php
                                              $no=0;
                                              foreach ($kategori->result_array() as $row) :
                                                $no++;
                                                $id_kategori = $row['kp_id'];
                                                $nama_kategori = $row['kp_nama'];
                                                ?>
                                              <option value="<?php echo $id_kategori;?>"><?php echo $nama_kategori;?></option>
                                            <?php endforeach;?>
                                      </select>
                                  </div>
                                  <div class="col-md-12">
                                      <label class="control-label">Deskripsi</label>
                                      <textarea id="summernote" name="deskripsi_paket" required><p>Deskripsi Paket</p></textarea>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="exampleFormControlFile1">Upload Gambar</label>
                                    <input type="file" class="form-control-file" name="filefoto"  required>
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

        <!--Modal Delete Data -->
        <?php foreach($paket->result_array() AS $row) :
          $id = $row['paket_id'];
          $nama = $row['paket_nama'];
          $tanggal = $row['paket_tanggal'];
          $harga = $row['paket_harga'];
          $gambar = $row['paket_gambar'];
          $deskripsi = $row['paket_keterangan'];
          $kategori_paket = $row['kp_nama'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="HapusData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Admin/Paket/hapus_paket" method="post" enctype="multipart/form-data">
                        <div class="modal-body p-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                    <input type="hidden" name="gambar" value="<?php echo $gambar?>">
                                    <p>Apakah kamu yakin ingin menghapus paket <b><i><?php echo $nama?></i></b></p>
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
                      heading: 'Berhasil',
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
