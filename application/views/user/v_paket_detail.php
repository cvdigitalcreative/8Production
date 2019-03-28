		<?php 
		function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
            return $hasil_rupiah;
        }

		foreach($paket->result_array() as $row) :
	        $id = $row['paket_id'];
	        $nama = $row['paket_nama'];
	        $tanggal = $row['paket_tanggal'];
	        $harga = $row['paket_harga'];
	        $gambar = $row['paket_gambar'];
	        $deskripsi = $row['paket_keterangan'];
	        $kategori_paket = $row['kp_nama'];
        ?>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(<?php echo base_url()?>assets/images/<?php echo $gambar?>);">	
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="desc">
										<h3><?php echo $nama?></h3>
										<p class="price">
											<span><?php echo rupiah($harga)?></span> 
										</p>
										<h4>Kategori : <?php echo $kategori_paket?></h4>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#description">Deskripsi</a></li>
									<li><a data-toggle="tab" href="#pesan">Pemesanan</a></li>
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
										<?php echo $deskripsi?>
						         </div>
						         <?php endforeach;?>
						         <div id="pesan" class="tab-pane fade">
						         	<form action="<?php echo base_url()?>Home/Pesan" method="post">
										<h2>Form Pemesanan</h2>
							              	<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="NamaPemesan">Nama Lengkap</label>
								                    		<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
								                    		<input type="hidden" name="paket_id" value="<?php echo $id?>">
								                  </div>
								               </div>
								               <div class="col-md-12">
													<div class="form-group">
														<label for="noHp">Nomor HP</label>
								                    	<input type="number" name="nohp" class="form-control" placeholder="Masukkan Nomor HP" required>
								               		</div>
								               </div>
								               <div class="col-md-12">
													<div class="form-group">
														<label for="email">Email</label>
								                    	<input type="email" name="emailpemesanan" class="form-control" placeholder="Email Kamu" required>
								                  	</div>
								               </div>
								               <div class="col-md-12">
														<div class="form-group">
															<label for="alamat">Alamat tempat pekerjaan untuk menggunakan jasa</label>
															<textarea class="form-control" name="alamat" required></textarea>
														</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label>Jika hanya satu hari pilih tanggal yang sama**</label>
													</div>
													
													<div class="col-md-6">
														<label for="tanggalawal">Tanggal Awal</label>
														<input type="date" id="tglawal" name="tglawal" class="form-control" placeholder="Tanggal awal mulai" required>
													</div>
													<div class="col-md-6">
														<label for="tanggalakhir">Tanggal Akhir</label>
														<input type="date" id="tglakhir" name="tglakhir" class="form-control" placeholder="Tanggal akhir" required>
													</div>
												</div>
												<div class="form-group ">
													<div class="col-md-12 mt-10">
														<button type="submit" class="btn btn-primary">Pesan</button>
													</div>
												</div>
							              	</div>
							        </form>	 
								 </div>
					         </div>
				         </div>
						</div>
					</div>
				</div>
			</div>
		</div>