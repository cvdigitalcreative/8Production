 <div class="content-wrapper">
    <div class="page-title">
        <div class="row">
          <div class="col-sm-6">
              <h4 class="mb-0"> Laporan Project</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>Pemimpin/Laporan_Keuangan" class="default-color">Home</a></li>
              <li class="breadcrumb-item active">Data Laporan Project</li>
            </ol>
          </div>
        </div>
      </div>
    <!-- main body -->
    <div class="row">
      <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
          <div class="card-body">
              <div class="col-xl-3 mb-10">
                  <a href="" data-toggle="modal" data-target="#cetak" class="btn btn-primary btn-block ripple m-t-20">
                      <i class="fa fa-print pr-2"></i> Cetak Laporan Project
                  </a>
              </div>
            <div class="table-responsive">
            <table id="datatable" class="display table table-striped table-bordered p-0">
              <thead>
                <tr>
                  <th>Tanggal Order</th>
                  <th>Nama Customer</th>
                  <th>Nama Paket</th>
                  <th>Harga Paket</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                    return $hasil_rupiah;
                  }

                  foreach($keuangan->result_array() as $row) :
                    $pemesanan_id = $row['pemesanan_id'];
                    $nama = $row['pemesanan_nama'];
                    $tanggal = $row['tanggal'];
                    $paket_id = $row['paket_id'];
                    $paket_nama = $row['paket_nama'];
                    $harga = $row['paket_harga'];
                ?>
                <tr>
                  <td><?php echo $tanggal?></td>
                  <td><?php echo $nama?></td>
                  <td><?php echo $paket_nama?></td>
                  <td><?php echo rupiah($harga)?></td>
                </tr>
                <?php endforeach;?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="3"><center>Jumlah</th>
                  <th><?php echo rupiah($jumlah)?></ths>
                </tr>
              </tfoot>
           </table>
          </div>
          </div>
        </div>
      </div>
      
      <!-- Modal Add Data -->
        <div class="modal" tabindex="-1" role="dialog" id="cetak">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cetak berdasarkan tanggal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form action="<?php echo base_url()?>Pemimpin/Laporan/cetak_keuangan" method="post" enctype="multipart/form-data" target="_blank">
                      <div class="modal-body p-20">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label class="control-label">Dari Tanggal*</label>
                                      <input class="form-control form-white" type="date" name="daritgl" required/>
                                  </div>
                                  <div class="col-md-6">
                                      <label class="control-label">Ke Tanggal*</label>
                                      <input class="form-control form-white" type="date" name="ketgl" required/>
                                  </div>
                              </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tutup</button>
                          <button type="submit" class="btn btn-success ripple save-category" id="simpan">Cetak</button>
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