<?php
$route['siswa'] 	= "siswa/index";
$route['siswa/ceknis'] 	= "siswa/nis";
$route['siswa/simpan-siswa'] 	= "siswa/addsiswa";
$route['siswa/ubah-siswa'] 	= "siswa/edit_siswa";
$route['siswa/ambil-siswa'] 	= "siswa/getsis";
$route['siswa/view-tabel'] 	= "siswa/ajax_list";
$route['siswa/hapus-siswa'] 	= "siswa/delsis";
$route['siswa/formedit-nilai'] 	= "siswa/editnilai";
$route['siswa/form-nilai'] 	= "siswa/addnilai";
$route['siswa/nilai-masuk'] 	= "siswa/subnilai";
$route['siswa/nilai-edit'] 	= "siswa/subnilaiedit";
$route['siswa/proses/(:any)'] 	= "siswa/proses_detail/$1";
$route['cetak'] 	= "siswa/cetak";
?>