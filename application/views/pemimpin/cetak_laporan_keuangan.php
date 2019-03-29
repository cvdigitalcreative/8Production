<html>
<head>
  <title>Laporan Keuangan Job Masuk</title>
</head>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/logo.png" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<body>
     <div>
          
          <table>
            <tr>
              <td rowspan="2"><img src="<?php echo base_url()?>assets/images/logo.png" style="width: 130%"></td>
              <td width="80"></td>
              <td><h2 style="margin-bottom: 10px;margin-top: 0px"><center>Laporan Pemasukan 8Production Films</h2></center><center><h4 style="margin-bottom: 0px;margin-top: 0px">Jl.PDAM,Bukit Lama, 1 Ilir Barat I</h4></center><center><h4 style="margin-bottom: 0px;margin-top: 0px">Telp : 0821 7763 0579/0821 7779 44015</h4></center></td>
            </tr>
          </table>
          <hr style="margin-left:10px;margin-right:10px;">
          <hr>
          <br>
             <table border="1" cellpadding="7" width="100%" style="border-style: solid;border-width: thin;border-collapse: collapse;" >
              <tr>
                <th><center>No</th>
                <th><center>Nama Customer</th>
                <th><center>Tanggal</center></th>
                <th><center>Nama Paket</th>
                <th><center>Uang</th>
              </tr>
                <?php
                  function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                    return $hasil_rupiah;
                  }

                  $no=0;
                  foreach ($keuangan->result_array() as $i):
                  $no++;
                  $pemesanan_id     = $i['pemesanan_id'];
                  $pemesanan_nama   = $i['pemesanan_nama'];
                  $tanggal          = $i['tanggal'];
                  $pemesanan_status = $i['pemesanan_status'];
                  $paket_id         = $i['paket_id'];
                  $paket_nama       = $i['paket_nama'];
                  $paket_harga      = $i['paket_harga'];
                ?>
              <tr>
                <td><center><?php echo $no;?></td>
                <td><center><?php echo $pemesanan_nama?></td>
                <td><center><?php echo $tanggal?></td>
                <td><center><?php echo $paket_nama?></td>
                <td><center><?php echo rupiah($paket_harga)?></td>
              </tr>
              <?php endforeach;?>
              <tr>
                  <th colspan="4"><center>Jumlah</th>
                  <th><center><?php echo rupiah($jumlah)?></th>
              </tr>
             </table>
      </div>

</body>
</html>

<script type="text/javascript">
 window.print();
</script>
