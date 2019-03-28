<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(<?php echo base_url()?>assets/admin/images/background.jpg);">
			   		<div class="overlay"></div>
			   	</li>
			   	<li style="background-image: url(<?php echo base_url()?>assets/images/video.jpg);">
			   		<div class="overlay"></div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Paket Wedding</span></h2>
						<p></p>
					</div>
				</div>
				<div class="row">
				  	<?php 

                  	function rupiah($angka){
                    	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                    	return $hasil_rupiah;
                  	}

				  	foreach($wedding->result_array() as $row) :
	                    $id = $row['paket_id'];
	                    $nama = $row['paket_nama'];
	                    $tanggal = $row['paket_tanggal'];
	                    $harga = $row['paket_harga'];
	                    $gambar = $row['paket_gambar'];
	                    $deskripsi = $row['paket_keterangan'];
	                    $kategori_paket = $row['kp_nama'];
                  	?>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(<?php echo base_url()?>assets/images/<?php echo $gambar?>);">
								<div class="cart">
									<p>

										<span><a href="<?php echo base_url()?>Home/Detail/<?php echo $id?>"><i class="icon-eye"></i></a></span>

									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="<?php echo base_url()?>Home/Detail/<?php echo $id?>"><?php echo $nama?></a></h3>
								<p class="price"><span><?php echo rupiah($harga)?></span></p>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Paket Event</span></h2>
						<p></p>
					</div>
				</div>
				<div class="row">
				  	<?php foreach($event->result_array() as $row) :
	                    $id = $row['paket_id'];
	                    $nama = $row['paket_nama'];
	                    $tanggal = $row['paket_tanggal'];
	                    $harga = $row['paket_harga'];
	                    $deskripsi = $row['paket_keterangan'];
	                    $gambar = $row['paket_gambar'];
	                    $kategori_paket = $row['kp_nama'];
                  	?>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(<?php echo base_url()?>assets/images/<?php echo $gambar?>);">
								<div class="cart">
									<p>

										<span><a href="<?php echo base_url()?>Home/Detail/<?php echo $id?>"><i class="icon-eye"></i></a></span>

									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="<?php echo base_url()?>Home/Detail/<?php echo $id?>"><?php echo $nama?></a></h3>
								<p class="price"><span><?php echo rupiah($harga)?></span></p>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Paket Film Pendek</span></h2>
						<p></p>
					</div>
				</div>
				<div class="row">
				  	<?php foreach($film_pendek->result_array() as $row) :
	                    $id = $row['paket_id'];
	                    $nama = $row['paket_nama'];
	                    $tanggal = $row['paket_tanggal'];
	                    $harga = $row['paket_harga'];
	                    $gambar = $row['paket_gambar'];
	                    $deskripsi = $row['paket_keterangan'];
	                    $kategori_paket = $row['kp_nama'];
                  	?>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(<?php echo base_url()?>assets/images/<?php echo $gambar?>);">
								<div class="cart">
									<p>

										<span><a href="<?php echo base_url()?>Home/Detail/<?php echo $id?>"><i class="icon-eye"></i></a></span>

									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="<?php echo base_url()?>Home/Detail/<?php echo $id?>"><?php echo $nama?></a></h3>
								<p class="price"><span><?php echo rupiah($harga)?></span></p>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>

		<div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Apa yang dikatakan customer kami?</span></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="owl-carousel2">
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(<?php echo base_url()?>assets/images/person1.jpg);"></span>
									<span class="user">Alysha Myers</span>
									<small>Miami Florida, USA</small>
									<blockquote>
										<p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(<?php echo base_url()?>assets/images/person2.jpg);"></span>
									<span class="user">James Fisher</span>
									<small>New York, USA</small>
									<blockquote>
										<p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(<?php echo base_url()?>assets/images/person3.jpg);"></span>
									<span class="user">Jacob Webb</span>
									<small>Athens, Greece</small>
									<blockquote>
										<p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
