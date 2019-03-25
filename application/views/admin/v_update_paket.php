
<!--=================================
 Main content -->

 <!--=================================
wrapper -->
    <?php foreach($paket->result_array() as $row) :
                    $id = $row['paket_id'];
                    $nama = $row['paket_nama'];
                    $tanggal = $row['paket_tanggal'];
                    $harga = $row['paket_harga'];
                    $deskripsi = $row['paket_keterangan'];
                    $gambar = $row['paket_gambar'];
                    $id_kat =$row['kp_id'];
                    $kategori_paket = $row['kp_nama'];
   ?>
    <div class="content-wrapper">
      <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"> Form Edit </h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
              <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Form Edit </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                  <form  action="<?php echo base_url().'Admin/Paket/update_paket'?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                      <div class="form-group">
                          <label class="control-label">Nama Paket</label>
                          <div class="mb-4">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input type="hidden" name="gambar" value="<?php echo $gambar?>">
                            <input type="text" class="form-control" name="nama_paket" value="<?php echo $nama;?>" required />
                          </div>
                          <label class="control-label" for="fname">Deskripsi Paket</label>
                            <textarea id="summernote" name="deskripsi_paket" required><?php echo $deskripsi?></textarea>
                      </div>
                  </div>
              </div>  
          </div>
        <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-51"> 
                <div class="card-body">
                  <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="kategori" required>
                        <option selected value="">Choose...</option>
                        <?php
                          foreach ($kategori->result_array() as $row) {
                                      $no++;
                                      $id_kategori = $row['kp_id'];
                                      $nama_kategori = $row['kp_nama'];
                                       if($id_kat==$id_kategori)
                                          echo "<option value='$id_kategori' selected>$nama_kategori</option>";
                                       else
                                          echo "<option value='$id_kategori'>$nama_kategori</option>";
                          }?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Harga Paket</label>
                          <div class="mb-4">
                            <input type="text" class="form-control" name="harga_paket" value="<?php echo $harga;?>" required />
                          </div>
                  </div>
                  <div class="form-group">
                       <label for="exampleFormControlFile1">Upload Gambar</label>
                       <input type="file" class="form-control-file" name="filefoto" >
                  </div>
                  <div class="form-group">
                      <a href="<?php echo $this->agent->referrer();?>"><button type="button" class="btn btn-danger" name="signup" value="Batal">Batal</button></a>
                      <button type="submit" class="btn btn-primary" name="" value="Sava">Save It</button>
                  </div>
                  </form>
                <?php endforeach;?>
                </div>
            </div>  
        </div>
      </div>
           
<!--=================================
 wrapper -->
      
<!--=================================
 footer -->

    <footer class="bg-white p-4">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center text-md-left">
              <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="https://www.digitalcreative.web.id" target="blank"> Warung Kreatif </a> All Rights Reserved. </p>
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
    </div><!-- main content wrapper end-->
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
<script src="<?php echo base_url()?>assets/admin/js/toastr.js"></script>

<!-- validation -->
<script src="<?php echo base_url()?>assets/admin/js/validation.js"></script>

<!-- lobilist -->
<script src="<?php echo base_url()?>assets/admin/js/lobilist.js"></script>
 
<!-- custom -->
<script src="<?php echo base_url()?>assets/admin/js/custom.js"></script>
<script src="<?php echo base_url().'assets/admin/js/jquery.toast.min.js'?>"></script>
 
</body>
</html>

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
    <?php else:?>

    <?php endif;?>