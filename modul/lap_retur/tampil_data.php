<script type="text/javascript">
    $(function() {
        $("#theList tr:even").addClass("stripe1");
        $("#theList tr:odd").addClass("stripe2");

        $("#theList tr").hover(
            function() {
                $(this).toggleClass("highlight");
            },
            function() {
                $(this).toggleClass("highlight");
            }
        );
    });
</script>
<?php
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_hdt.php';
$kode1	= $_GET['kode1'];
$kode2	= $_GET['kode2'];
$hal	= $_GET['hal'] ? $_GET['hal'] : 0;
$lim	= 10;

if (empty($kode1) && empty($kode2)){
	$query2	= "SELECT * FROM retur_pembelian";
}else{
	$query2	= "SELECT * FROM retur_pembelian
			WHERE kode_retur BETWEEN '$kode1' AND '$kode2' ";
}
	$data2	= mysql_query($query2);
	$jml	= mysql_num_rows($data2);
	
	$max	= ceil($jml/$lim);

echo "<div id='info'>
	<table id='theList' width='100%'>
		<tr>
			<th>No.</th>
			<th>Kode Retur</th>
			<th>Tanggal Retur</th>
			<th>Kode Beli</th>
			<th>Kode Barang</th>
			<th>Jumlah Retur</th>
						
		</tr>";
		if (empty($kode1) && empty($kode2)){
		$sql = "SELECT * FROM retur_pembelian
				ORDER BY tgl_retur
				LIMIT $hal,$lim";
		}else{
		$sql = "SELECT * FROM retur_pembelian
				WHERE tgl_retur BETWEEN '$kode1' AND '$kode2'
				ORDER BY tgl_retur
				LIMIT $hal,$lim";
		}
				
		//echo $sql;
		$query = mysql_query($sql);
		
		$no=1+$hal;
		while($r_data=mysql_fetch_array($query)){
			echo "<tr>
					<td align='center'>".$no."</td>
					<td align='center'>".$r_data['kode_retur']."</td>
					<td align='center'>".$r_data['tgl_retur']."</td>
					<td align='center'>".$r_data['kode_beli']."</td>
					<td align='center'>".$r_data['kode_barang']."</td>
					<td align='center'>".$r_data['jumlah_retur']."</td>
					</tr>";
			$no++;
		}
		
	echo "</table>";
	echo "<table width='100%'>
		<tr>
			<td>Jumlah Data : $jml</td>";
		if (empty($kode1) && empty($kode2)){
		echo "<td align='right'>Halaman :";
			for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('modul/lap_retur/tampil_data.php?hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#info').html(data);})" <?php echo">".$h."</a> ";
				}
	echo "</td>";
		}else{
		echo "<td align='right'>Halaman :";
			for ($h = 1; $h <= $max; $h++) {
					$list[$h] = $lim * $h - $lim;
					echo " <a href='javascript:void(0)' ";?> 
                    onClick="$.get('modul/lap_retur/tampil_data.php?kode1=<?php echo $_GET['kode1'];?>
                    &kode2=<?php echo $_GET['kode2'];?>
                    &hal=<?php echo $list[$h]; ?>', 
                    null, function(data) {$('#info').html(data);})" <?php echo">".$h."</a> ";
				}
	echo "</td>";
		}
	echo "</tr>
		</table>";
	echo "</div>";
?>