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
            <table class="display table table-striped table-bordered p-0">
              <thead> 
                <tr>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>sad</td>
                  <td>asd</td>
                </tr>
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
                    <form action="<?php echo base_url()?>Admin/Pegawai/save_absensi" method="post" enctype="multipart/form-data">
                      <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label">Tanggal Absensi*</label>
                                      <input class="form-control form-white" type="date" name="tanggal" required/>
                                  </div>
                                  <div class="col-md-12 mt-20">
                                    <table id="datatable" class="table center-aligned-table mb-0">
                                      <thead>
                                          
                                          <tr>
                                            <th>Nama</th>
                                            <th>Status</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <?php foreach($pegawai->result_array() as $row) :
                                            $id = $row['pegawai_id'];
                                            $nama = $row['pegawai_nama'];
                                          ?>
                                          <tr>
                                              <td><?php echo $nama?></td>
                                              <td>
                                                  <input type="hidden" name="id[]" value="<?php echo $id?>">
                                                  <select class="form-control" name="status[]">
                                                    <option selected value="0">Tidak Ada</option>
                                                    <option value="1">Ada</option>
                                                  </select>
                                              </td>
                                          </tr>
                                          <?php endforeach;?>
                                      </tbody>
                                    </table>
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
<script src="<?php echo base_url()?>assets/admin/js/bootstrap-datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/admin/js/bootstrap-datatables/dataTables.bootstrap4.min.js"></script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>

<script type="text/javascript">
  
</script>

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

      <?php elseif($this->session->flashdata('msg')=='hapus'):?>
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
      <?php elseif($this->session->flashdata('msg')=='update'):?>
          <script type="text/javascript">
                  $.toast({
                      heading: 'Update',
                      text: "Data berhasil diupdate",
                      showHideTransition: 'slide',
                      icon: 'success',
                      loader: true,        // Change it to false to disable loader
                      loaderBg: '#ffffff',
                      position: 'top-right',
                      bgColor: 'blue'
                  });
          </script>
    <?php else:?>

    <?php endif;?>
