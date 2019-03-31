<html>
<head>
  <title>Invoice</title>
</head>
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/logo.png" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
<style type="text/css" media="print">

@page {size: landscape;}

</style> 
<body>
        <?php
                  function rupiah($angka){
                    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                    return $hasil_rupiah;
                  }


                  $no=0;
                  foreach ($invoice->result_array() as $row):
                  $no++;
                  $pemesanan_id = $row['pemesanan_id'];
                  $pemesanan_nama = $row['pemesanan_nama'];
                  $pemesanan_nohp = $row['pemesanan_nohp'];
                  $pemesanan_email = $row['pemesanan_email'];
                  $pemesanan_alamat = $row['pemesanan_alamat'];
                  $pemesanan_tanggal = $row['tanggal'];
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
                  $paket_harga = $row['paket_harga'];
                ?>
        <div>
          <table>
            <tr>
              <td><h3 style="margin-bottom: 0px;margin-top: 0px">8Production Films</h3><h4 style="margin-bottom: 0px;margin-top: 0px">Jl.PDAM,Bukit Lama, 1 Ilir Barat I</h4><h4 style="margin-bottom: 0px;margin-top: 0px">Telp : 0821 7763 0579/0821 7779 44015</h4></td>
              <td width="190"></td>
              <td><center><h1>INVOICE</h1></center></td>
              <td width="220"></td>
              <td><h3 style="margin-bottom: 0px;margin-top: 0px">Number : <?php echo $pemesanan_id?></h3><h4 style="margin-bottom: 0px;margin-top: 0px">Inv. Date : <?php echo $pemesanan_tanggal?></h4><h4 style="margin-bottom: 0px;margin-top: 0px">Payment : Cash / Tunai</h4></td>
            </tr>
          </table>
          <hr style="margin-left:10px;margin-right:10px;">
          <hr>
          <br>

          <table>
            <tr>
              <td><b>Customer</b></td>
              <td><b>:</b></td>
              <td><b><?php echo $pemesanan_nama?></b></td>
            </tr>
            <tr>
              <td><b>Phone</b></td>
              <td><b>:</b></td>
              <td><b><?php echo $pemesanan_nohp?></b></td>
            </tr>
          </table>
          <br>
          <table border="1" cellpadding="7" width="100%" style="border-style: solid;border-collapse: collapse;" >
            <tr>
              <th><center>No</th>
              <th><center>Nama Paket</th>
              <th><center>Tanggal Awal</th>
              <th><center>Tanggal Akhir</th>
              <th><center>Harga</center></th>
            </tr>
            <tr>
              <td><center><?php echo $no;?></td>
              <td><center><?php echo $paket_nama?></td>
              <td><center><?php echo $tglawal?></td>
              <td><center><?php echo $tglakhir?></td>
              <td><center><?php echo rupiah($paket_harga)?></td>
            </tr>
          </table>
          <br>
          <table>
            <tr>
              <td><b>Transfer Via BCA</b></td>
            </tr>
            <tr><td>A/C : 8435 2276 74</td></tr>
            <tr><td>A/N : Muhammad Rezki</td></tr>
          </table>
      </div>
      <?php endforeach;?>

</body>
</html>

<script type="text/javascript">
 window.print();
</script>
