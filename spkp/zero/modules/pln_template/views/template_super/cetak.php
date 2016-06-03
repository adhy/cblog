<html lang="en">
<body>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:3px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:3px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-2to7{font-weight:bold;font-size:12px;font-family:Tahoma, Geneva, sans-serif !important;;text-align:center;vertical-align:top}
.tg .tg-6222{font-size:10px;font-family:Tahoma, Geneva, sans-serif !important;;text-align:center;vertical-align:top}
.tg .tg-2gew{font-size:10px;font-family:Tahoma, Geneva, sans-serif !important;;vertical-align:top}
//kop
.tkop  {border-collapse:collapse;border-spacing:0;}
.tkop td{font-family:Arial, sans-serif;font-size:14px;padding:0px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tkop th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:0px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tkop .tkop-s6z2{text-align:center}
.tkop .tkop-6iqf{font-size:16px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tkop .tkop-lrzf{font-size:14px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tkop .tkop-lvl4{font-weight:bold;font-size:16px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tkop .tkop-pz9v{font-size:12px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tkop .tkop-2bfz{font-size:10px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.noborder{border:none; }
.divA{
    height: 1px;
    border-bottom: 1px solid black;
}
.divB{
    height: 1px;
    border-bottom: 2px solid black;
}
.cssline{font-size:10px;font-family:Arial, Helvetica, sans-serif !important;;text-align:left}
</style>
</head>
<body>
<table class="tkop noborder" style="width:100%;" >
  <tr>
    <th class="tkop-s6z2" rowspan="5" width="10%"> <img src="assets/img/logo_1.jpg" height="100" width="90"> </th>
    <th class="tkop-6iqf">PEMERINTAH KABUPATEN MAGETAN</th>
    <th class="tkop-s6z2" rowspan="5" width="10%"><img src="assets/img/7693531.jpg" height="100" width="90"></th>
  </tr>
  <tr>
    <td class="tkop-lrzf">DINAS PENDIDIKAN</td>
  </tr>
  <tr>
    <td class="tkop-lvl4">SMA NEGERI 1 KAWEDANAN</td>
  </tr>
  <tr>
    <td class="tkop-pz9v">JL. RAYA GENENGAN GORANGGARENG TELP (0351)439255</td>
  </tr>
  <tr>
    <td class="tkop-2bfz">Website : www.sman1kawedanan.sch.id E-mail : sman1kawedanan@yahoo.com</td>
  </tr>
</table>
<span></span>
<div class="divA"></div>
<div class="divB"></div>
<br/>
<!--<table class="tg" style="undefined;table-layout: fixed; width: 100%;page-break-after:always;">-->
<table class="tg" style="undefined;table-layout: fixed; width: 100%;">
  <thead>
  <tr>
    <th class="tg-2to7" width="5%">No<br></th>
    <th class="tg-2to7" width="35%">Nama</th>
    <th class="tg-2to7" width="20%">Tgl Lahir<br></th>
    <th class="tg-2to7" width="30%">Wali Siswa<br></th>
    <th class="tg-2to7" width="10%">Jurusan</th>
  </tr></thead>
  <tbody>
<?php 
	$no=1;
	foreach($cetak->result() as $row){ 
	if($row->jurusan == 1){
		$jurusan ='IPA';
	}else if($row->jurusan == 2){
		$jurusan ='IPS';
	}else{
		$jurusan ='Belum Dijuruskan';
	}
	//$tgl=date('d F Y', strtotime(str_replace('-', '/', $row->tgl_lahir)));
	$tgl=tgl_indo($row->tgl_lahir);
	
?>
	<tr>
		<td class="tg-6222"><?php echo $no++; ?></td>
		<td class="tg-2gew"><?php echo $row->nm_siswa; ?></td>
		<td class="tg-2gew"><?php echo $tgl; ?></td>
		<td class="tg-2gew"><?php echo $row->walisiswa; ?></td>
		<td class="tg-6222"><?php echo $jurusan; ?></td>
	</tr>
<?php } 
$tgl_sah=tgl_indo(date('Y-m-d'));

?></tbody>
</table>
<br>
<table class="noborder" style="width:100%;">
  <tr>
    <th></th>
    <th width="35%" class="cssline" style="text-align:left">Kawedanan, <?=$tgl_sah?></th>
  </tr>
   <tr>
    <td></td>
    <td class="cssline">Kepala SMA Negeri 1 Kawedanan</td>
  </tr>
  <tr>
    <td></td>
    <td><br></td>
  </tr>
    <tr>
    <td></td>
    <td><br></td>
  </tr>
  <tr>
    <td ></td>
    <td class="cssline">Drs. H. AGUS HARIANTO, M.MPd</td>
  </tr>
    <tr>
    <td></td>
    <td class="cssline">NIP. 19560602 198603 1 009</td>
  </tr>
</table>
</body>
</html>