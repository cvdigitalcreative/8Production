<html>
<head>
  <title>Laporan Absensi</title>
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
              <td><h2 style="margin-bottom: 10px;margin-top: 0px"><center>Laporan Absensi Anggota</h2></center><center><h4 style="margin-bottom: 0px;margin-top: 0px">Jl.PDAM,Bukit Lama, 1 Ilir Barat I</h4></center><center><h4 style="margin-bottom: 0px;margin-top: 0px">Telp : 0821 7763 0579/0821 7779 44015</h4></center></td>
            </tr>
          </table>
          <hr style="margin-left:10px;margin-right:10px;">
          <hr>
          <br>
             <table border="1" cellpadding="7" width="100%" style="border-style: solid;border-width: thin;border-collapse: collapse;" >
              <tr>
                <th><center>Nama</th>
                <th><center>Tanggal</th>
                <th><center>Kehadiran</center></th>
              </tr>
                <?php
                  $no=0;
                  foreach ($absensi->result_array() as $i):
                  $no++;
                  $absensi_id           = $i['absensi_id'];
                  $absensi_tanggal   = $i['absensi_tanggal'];
                  $absensi_status      = $i['absensi_status'];
                  $pegawai_id          = $i['pegawai_id'];
                  $pegawai_nama             = $i['pegawai_nama'];
                ?>
              <tr>
                <td><center><?php echo $pegawai_nama;?></td>
                <td><center><?php echo $absensi_tanggal?></td>
                <?php if($absensi_status == 0):?>
                  <td><center>Tidak Ada</td>
                <?php elseif($absensi_status == 1):?>
                  <td><center>Ada</td>
                <?php endif;?>    
              </tr>
              <?php endforeach;?>
             </table>
      </div>

</body>
</html>

<script type="text/javascript">
 window.print();
</script>
