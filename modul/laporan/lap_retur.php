<?php
	include_once('../../inc/inc.koneksi.php');
	$kode1	= $_GET['kode1'];
	$kode2	= $_GET['kode2'];
	if (empty($kode1) && empty($kode2)){
	$q = "SELECT * FROM retur_pembelian
		ORDER BY kode_retur";
	}else{
	$q = "SELECT * FROM retur_pembelian
		WHERE kode_retur BETWEEN '$kode1' AND '$kode2'
		ORDER BY kode_retur";		
	}
		
	$r = mysql_query($q);
	$tgl = date('d M Y');
	$content = "<h3>LAPORAN DATA RETUR</h3><br/>
	PERTANGGAL  : $tgl
	<table width='390' border='1' style='border-collapse:collapse'>
		<tr>
			<th>No</th>
			<th>KODE RETUR</th>
			<th>TANGGAL RETUR</th>
			<th>KODE BELI</th>
			<th>KODE BARANG </th>
			<th>JUMLAH RETUR </th>
		</tr>";
	$no = 1;
	while ($d = mysql_fetch_array ($r)) {
		$content .= "
		<tr>
			<td align='center'>".$no."</td>
			<td align='center'>".$d['kode_retur']."</td>
			<td>".$d['tgl_retur']."</td>
			<td>".$d['kode_beli']."</td>
			<td align='right'>".$d['kode_barang']."</td>
			<td align='right'>".$d['jumlah_retur']."</td>
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
		header("Content-Disposition: attachment; filename=lap_retur.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $content;
		/*
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=lap_retur.doc");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $content;	
		*/
?>
