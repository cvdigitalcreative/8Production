 <div class="content-wrapper">
      <div class="page-title">
      <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"> Transaksi</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>" class="default-color">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>Admin/Pemesanan" class="default-color">Data Pemasanan</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
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
                      <i class="fa fa-plus pr-2"></i> Tambah Transaksi
                  </a>
            </div>
              <div class="table-responsive">
              <table id="datatable" class="table table-striped table-bordered p-0">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Jumlah Uang</th>
                        <th>Keterangan</th>
                        <th style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                            <?php 
                            function rupiah($angka){
                              $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                              return $hasil_rupiah;
                            }

                            foreach($transaksi->result_array() as $row) :
                              $id = $row['transaksi_id'];
                              $harga = $row['transaksi_harga'];
                              $tanggal = $row['transaksi_tanggal'];
                              $keterangan = $row['transaksi_keterangan'];
                              $pemesanan_id = $row['pemesanan_id'];
                            ?>
                            <tr>
                              <td><?php echo $tanggal?></td>
                              <td><?php echo rupiah($harga)?></td>
                              <td><?php echo $keterangan?></td>
                              <td style="text-align:left;">
                                <a href="#" data-toggle="modal" data-target="#EditData<?php echo $id?>"><span class="ti-pencil"></span></a>
                                <a href="#" style="margin-left: 10px" data-toggle="modal" data-target="#HapusData<?php echo $id?>"><span class="ti-trash"></span></a>
                              </td>
                            </tr>
                            <?php endforeach;?>
                            
                </tbody>  
                <tfoot>
                <tr>
                  <th>Jumlah</th>
                  <th><?php echo rupiah($jumlah)?></ths>
                </tr>
              </tfoot>              
            </table>
            </div>
            </div>
          </div>   
        </div>
        
        <div class="modal" tabindex="-1" role="dialog" id="tambah-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body p-20">
                        <form action="<?php echo base_url().'Admin/Pemesanan/save_transaksi'?>" method="post">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <label class="control-label">Masukkan Jumlah Uang</label>
                                    <input type="hidden" name="pemesanan_id" value="<?php echo $pemesanan_id?>">
                                    <input class="form-control form-white" placeholder="Jumlah uang" type="number" name="duit" required/>    
                                </div>
                                <div class="col-md-12"> 
                                    <label class="control-label">Keterangan Transaksi</label>
                                    <input class="form-control form-white" placeholder="" type="text" name="keterangan" required/>    
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success ripple save-category">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach($transaksi->result_array() as $row) :
          $id = $row['transaksi_id'];
          $harga = $row['transaksi_harga'];
          $tanggal = $row['transaksi_tanggal'];
          $keterangan = $row['transaksi_keterangan'];
          $pemesanan_id = $row['pemesanan_id'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="EditData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                   <div class="modal-body p-20">
                        <form action="<?php echo base_url().'Admin/Pemesanan/update_transaksi'?>" method="post">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <label class="control-label">Masukkan Jumlah Uang</label>
                                    <input type="hidden" name="pemesanan_id" value="<?php echo $pemesanan_id?>">
                                    <input type="hidden" name="transaksi_id" value="<?php echo $id?>">
                                    <input class="form-control form-white" placeholder="Jumlah uang" type="number" name="duit" value="<?php echo $harga?>" required/>    
                                </div>
                                <div class="col-md-12"> 
                                    <label class="control-label">Keterangan Transaksi</label>
                                    <input class="form-control form-white" placeholder="" type="text" name="keterangan" value="<?php echo $keterangan?>" required/>    
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success ripple save-category">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach;?>
 

        <?php foreach($transaksi->result_array() as $row) :
          $id = $row['transaksi_id'];
          $harga = $row['transaksi_harga'];
          $tanggal = $row['transaksi_tanggal'];
          $keterangan = $row['transaksi_keterangan'];
          $pemesanan_id = $row['pemesanan_id'];
        ?>
        <div class="modal" tabindex="-1" role="dialog" id="HapusData<?php echo $id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Nobel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body p-20">
                        <form action="<?php echo base_url().'Admin/Pemesanan/hapus_transaksi'?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="kode" value="<?php echo $id?>"/> 
                                    <input type="hidden" name="pemesanan_id" value="<?php echo $pemesanan_id?>">
                                    <p>Apakah kamu yakin ingin menghapus dengan keterangan pembayaran <b><i><?php echo $keterangan?></i></b>?</p>
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
 wrapper -->
      
<!--=================================
 footer -->

    <footer class="bg-white p-4">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center text-md-left">
              <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="https://www.digitalcreative.web.id" target="blank"> Digital Creative </a> All Rights Reserved. </p>
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
<!-- <script src="<?php echo base_url()?>assets/admin/js/toastr.js"></script> -->

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


