<html>
<head>
  <title>Laporan Agenda</title>
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
              <td><h2 style="margin-bottom: 10px;margin-top: 0px"><center>Laporan Bulanan/Tahunan 8Production Films</h2></center><center><h4 style="margin-bottom: 0px;margin-top: 0px">Jl.PDAM,Bukit Lama, 1 Ilir Barat I</h4></center><center><h4 style="margin-bottom: 0px;margin-top: 0px">Telp : 0821 7763 0579/0821 7779 44015</h4></center></td>
            </tr>
          </table>
          <hr style="margin-left:10px;margin-right:10px;">
          <hr>
          <br>
             <table border="1" cellpadding="7" width="100%" style="border-style: solid;border-width: thin;border-collapse: collapse;" >
              <tr>
                <th><center>No</th>
                <th><center>Tanggal</th>
                <th><center>Agenda/Kegiatan</center></th>
              </tr>
                <?php
                  $no=0;
                  foreach ($agenda->result_array() as $i):
                  $no++;
                  $agenda_id           = $i['agenda_id'];
                  $agenda_pembahasan   = $i['agenda_pembahasan'];
                  $tanggal             = $i['tanggal'];
                ?>
              <tr>
                <td><center><?php echo $no;?></td>
                <td><center><?php echo $tanggal?></td>
                <td><center><?php echo $agenda_pembahasan?></td>
              </tr>
              <?php endforeach;?>
             </table>
      </div>

</body>
</html>

<script type="text/javascript">
 window.print();
</script>
