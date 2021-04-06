<?php
	include_once('../../inc/inc.koneksi.php');
	$kode1	= $_GET['kode1'];
	$kode2	= $_GET['kode2'];
	if (empty($kode1) && empty($kode2)){
	$q = "SELECT * FROM penjualan
		ORDER BY kode_jual";
	}else{
	$q = "SELECT * FROM penjualan
		WHERE kode_jual BETWEEN '$kode1' AND '$kode2'
		ORDER BY kode_jual";		
	}
		
	$r = mysql_query($q);
	$tgl = date('d M Y');
	$content = "<h3>LAPORAN DATA PENJUALAN</h3><br/>
	PERTANGGAL  : $tgl
	<table width='390' border='1' style='border-collapse:collapse'>
		<tr>
			<th>No</th>
			<th>KODE PENJUALAN</th>
			<th>TANGGAL PENJUALAN</th>
			<th>JUMLAH JUAL</th>
			<th>HARGA JUAL</th>

		</tr>";
	$no = 1;
	while ($d = mysql_fetch_array ($r)) {
		$content .= "
		<tr>
			<td align='center'>".$no."</td>
			<td align='center'>".$d['kode_jual']."</td>
			<td>".$d['tgl_jual']."</td>
			<td>".$d['kode_barang']."</td>
			<td align='right'>".$d['jumlah_jual']."</td>
			<td align='right'>".$d['harga_jual']."</td>
		</tr>";
		$no++;
		$t_beli = $t_beli+$d['harga_beli'];
		$t_jual = $t_jual+$d['harga_jual'];
	}
	$content .= "<tr>
					<td colspan='4' align='right'>Jumlah</td>
					<td align='right'>".$t_beli."</td>
					<td align='right'>".$t_jual."</td>
				</tr>
		</table>";
		
		//laporan ke excel
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=lap_penjualan.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $content;
		/*
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=lap_penjualan.doc");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $content;	
		*/
?>
