<?php
include "inc/inc.koneksi.php";
include "inc/library.php";
include "inc/fungsi_indotgl.php";
include "inc/fungsi_combobox.php";
include "inc/class_paging.php";
include "inc/fungsi_rupiah.php";
include "inc/fungsi_tanggal.php";
include "inc/fungsi_hdt.php";

$mod = $_GET['module'];

// Bagian Home
if ($mod=='home'){
	echo "<h2>Selamat Datang</h2>";
	echo " <b>$_SESSION[namalengkap] </b>, .";
	
			
	echo"<p>&nbsp;</p>
          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
  
}
//users
elseif ($mod=='pengguna'){
    include "modul/users/users.php";
}
elseif ($mod=='barang'){
    include "modul/barang/barang.php";
}
//supplier
elseif ($mod=='supplier'){
    include "modul/supplier/supplier.php";
}
elseif ($mod=='pembelian'){
    include "modul/pembelian/pembelian.php";
}
elseif ($mod=='penjualan'){
    include "modul/penjualan/penjualan.php";
}
elseif ($mod=='retur_beli'){
    include "modul/retur_beli/retur_beli.php";
}
//lap_barang
elseif ($mod=='lap_barang'){
    include "modul/lap_barang/lap_barang.php";
}

elseif ($mod=='lap_penjualan'){
    include "modul/lap_penjualan/lap_penjualan.php";
}

elseif ($mod=='lap_pembelian'){
    include "modul/lap_pembelian/lap_pembelian.php";
}

elseif ($mod=='lap_retur'){
    include "modul/lap_retur/lap_retur.php";
}

elseif ($mod=='lap_stok'){
    include "modul/lap_stok/lap_stok.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<b>MODUL BELUM ADA ATAU BELUM LENGKAP</b>";
}
?>
