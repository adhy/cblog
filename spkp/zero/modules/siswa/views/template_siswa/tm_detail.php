<?php 
foreach($siswaku->result() as $row){
	echo 'Nama Siswa = '.$row->nm_siswa;
}

foreach($siswaku->result() as $row){
	echo '<br/>Kriteria nilai Siswa Semester Satu : ';
	echo '<br/>Nilai matematika : '.$row->knmsa;
	echo '<br/>Nilai fisika : '.$row->knfsa;
	echo '<br/>Nilai kimia : '.$row->knksa;
	echo '<br/>Nilai biologi : '.$row->knbsa;
	echo '<br/>Nilai sejarah : '.$row->knsesa;
	echo '<br/>Nilai geografi : '.$row->kngsa;
	echo '<br/>Nilai ekonomi : '.$row->knesa;
	echo '<br/>Nilai sosiologi : '.$row->knsosa;
	echo '<br/>_______________________________________';
	echo '<br/>Kriteria nilai Siswa Semester dua : ';
	echo '<br/>Nilai matematika : '.$row->knmsb;
	echo '<br/>Nilai fisika : '.$row->knfsb;
	echo '<br/>Nilai kimia : '.$row->knksb;
	echo '<br/>Nilai biologi : '.$row->knbsb;
	echo '<br/>Nilai sejarah : '.$row->knsesb;
	echo '<br/>Nilai geografi : '.$row->kngsb;
	echo '<br/>Nilai ekonomi : '.$row->knesb;
	echo '<br/>Nilai sosiologi : '.$row->knsosb;
	echo '<br/>_______________________________________';
	echo '<br/>Hasil Tes IQ : '.$row->ktq;
	echo '<br/>Hasil minat : '.$row->khm;

}
foreach ($alternatif->result() as $row) {
	echo '<br/>-----------------------------------------------';
	echo '<br/>ALTERNATIF '.$row->nm_alternatif;
	echo '<br/>-----------------------------------------------';
	echo '<br/> Semester Satu : ';
	echo '<br/>Nilai matematika : '.$row->knmsa;
	echo '<br/>Nilai fisika : '.$row->knfsa;
	echo '<br/>Nilai kimia : '.$row->knksa;
	echo '<br/>Nilai biologi : '.$row->knbsa;
	echo '<br/>Nilai sejarah : '.$row->knsesa;
	echo '<br/>Nilai geografi : '.$row->kngsa;
	echo '<br/>Nilai ekonomi : '.$row->knesa;
	echo '<br/>Nilai sosiologi : '.$row->knsosa;
	echo '<br/>_______________________________________';
	echo '<br/> Semester dua : ';
	echo '<br/>Nilai matematika : '.$row->knmsb;
	echo '<br/>Nilai fisika : '.$row->knfsb;
	echo '<br/>Nilai kimia : '.$row->knksb;
	echo '<br/>Nilai biologi : '.$row->knbsb;
	echo '<br/>Nilai sejarah : '.$row->knsesb;
	echo '<br/>Nilai geografi : '.$row->kngsb;
	echo '<br/>Nilai ekonomi : '.$row->knesb;
	echo '<br/>Nilai sosiologi : '.$row->knsosb;
	echo '<br/>_______________________________________';
	echo '<br/>Hasil Tes IQ : '.$row->ktq;
	echo '<br/>Hasil minat : '.$row->khm;
}
echo '<br/>-----------------------------------------------';
echo '<br/>Nilai Ternormalisasi :';
echo '<br/>-----------------------------------------------';
echo '<br/>IPA : '.$terknmsa[0].'|'.$terknfsa[0].'|'.$terknksa[0].'|'.$terknbsa[0].'|'.$terknsesa[0].'|'.$terkngsa[0].'|'.$terknesa[0].'|'.$terknsosa[0].'|'.$terknmsb[0].'|'.$terknfsb[0].'|'.$terknbsb[0].'|'.$terknsesb[0].'|'.$terknsesb[0].'|'.$terkngsb[0].'|'.$terknesb[0].'|'.$terknsosb[0].'|'.$terktq[0].'|'.$terkhm[0].'|';
echo '<br/>IPS : '.$terknmsa[1].'|'.$terknfsa[1].'|'.$terknksa[1].'|'.$terknbsa[1].'|'.$terknsesa[1].'|'.$terkngsa[1].'|'.$terknesa[1].'|'.$terknsosa[1].'|'.$terknmsb[1].'|'.$terknfsb[1].'|'.$terknbsb[1].'|'.$terknsesb[1].'|'.$terknsesb[1].'|'.$terkngsb[1].'|'.$terknesb[1].'|'.$terknsosb[1].'|'.$terktq[1].'|'.$terkhm[1].'|';

echo '<br/>-----------------------------------------------';
echo '<br/>Nilai Terbobot :';
echo '<br/>-----------------------------------------------';
echo '<br/>IPA : '.$norknmsa[0].'|'.$norknfsa[0].'|'.$norknksa[0].'|'.$norknbsa[0].'|'.$norknsesa[0].'|'.$norkngsa[0].'|'.$norknesa[0].'|'.$norknsosa[0].'|'.$norknmsb[0].'|'.$norknfsb[0].'|'.$norknksb[0].'|'.$norknbsb[0].'|'.$norknsesb[0].'|'.$norkngsb[0].'|'.$norknesb[0].'|'.$norknsosb[0].'|'.$norktq[0].'|'.$norkhm[0].'|';
echo '<br/>IPS : '.$norknmsa[1].'|'.$norknfsa[1].'|'.$norknksa[1].'|'.$norknbsa[1].'|'.$norknsesa[1].'|'.$norkngsa[1].'|'.$norknesa[1].'|'.$norknsosa[1].'|'.$norknmsb[1].'|'.$norknfsb[1].'|'.$norknksb[1].'|'.$norknbsb[1].'|'.$norknsesb[1].'|'.$norkngsb[1].'|'.$norknesb[1].'|'.$norknsosb[1].'|'.$norktq[1].'|'.$norkhm[1].'|';

echo '<br/>-----------------------------------------------';
echo '<br/>Solusi Ideal Positif dan Solusi Ideal Negatif :';
echo '<br/>-----------------------------------------------';
echo '<br/>Max : '.$knmsamax.'-|-'.$knfsamax.'-|-'.$knksamax.'-|-'.$knbsamax.'-|-'.$knsesamax.'-|-'.$kngsamax.'-|-'.$knesamax.'-|-'.$knsosamax.'-|-'.$knmsbmax.'-|-'.$knfsbmax.'-|-'.$knksbmax.'-|-'.$knbsbmax.'-|-'.$knsesbmax.'-|-'.$kngsbmax.'-|-'.$knesbmax.'-|-'.$knsosbmax.'-|-'.$ktqmax.'-|-'.$khmmax.'-|-';
echo '<br/>Min : '.$knmsamin.'-|-'.$knfsamin.'-|-'.$knksamin.'-|-'.$knbsamin.'-|-'.$knsesamin.'-|-'.$kngsamin.'-|-'.$knesamin.'-|-'.$knsosamin.'-|-'.$knmsbmin.'-|-'.$knfsbmin.'-|-'.$knksbmin.'-|-'.$knbsbmin.'-|-'.$knsesbmin.'-|-'.$kngsbmin.'-|-'.$knesbmin.'-|-'.$knsosbmin.'-|-'.$ktqmin.'-|-'.$khmmin.'-|-';

echo '<br/>-----------------------------------------------';
echo '<br/>Jarak Antara Nilai Setiap Alternatif :';
echo '<br/>-----------------------------------------------';
echo '<br/>D+ Alternatif IPA :'.number_format($d_plus[0],9);
echo '<br/>D+ Alternatif IPS :'.number_format($d_plus[1],9);
echo '<br/>D- Alternatif IPA :'.number_format($d_min[0],9);
echo '<br/>D- Alternatif IPS :'.number_format($d_min[1],9);

echo '<br/>-----------------------------------------------';
echo '<br/>Nilai Preferensi Setiap Alternatif :';
echo '<br/>-----------------------------------------------';
echo '<br/>V+ Alternatif IPA :'.number_format($V_hasil[0],6);
echo '<br/>V+ Alternatif IPS :'.number_format($V_hasil[1],6);


?>