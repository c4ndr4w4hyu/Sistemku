<script type="text/javascript">	
$(document).ready(function() {
	$("#data").load('modul/lap_retur/tampil_data.php');
	
	$("#cari").click(function() {
		var kode1	= $("#kode1").val();
		var kode2	= $("#kode2").val();
		
		if (kode1.length==''){
			alert('Maaf, Kriteria belum lengkap');
			$("#kode1").focus();
			return false;
		}
		if (kode2.length==''){
			alert('Maaf, Kriteria belum lengkap');
			$("#kode2").focus();
			return false;
		}
	   	$.ajax({
			type	: "GET",
			url		: "modul/lap_retur/tampil_data.php",
			data	: "kode1="+kode1+"&kode2="+kode2,
			success	: function(data){
				$("#data").html(data);
			}
		});		
	});
	
	$("#refresh").click(function() {
		window.location.reload();
		//alert('tes');
	});
	
	$("#cetak").click(function() {
		var kode1	= $("#kode1").val();
		var kode2	= $("#kode2").val();
		window.location.href='modul/laporan/lap_retur.php?kode1='+kode1+'&kode2='+kode2;
		/*
	   	$.ajax({
			type	: "GET",
			url		: "modul/laporan/lap_stok_retur.php",
			data	: "kode1="+kode1+"&kode2="+kode2,
			success	: function(data){
				//$("#data").html(data);
				alert('Data Sukses dicetak');
			}
		});
		*/
	});
});
</script>
<style type="text/css">
#info {
	font-size:12px;
	font-weight:bold;
	color:#F00;
}
</style>
<?php
echo "<div id='form' align='center'><h2>LAPORAN DATA RETUR PEMBELIAN <h3></div>";
echo "<div id='filter' align='center'>
	<fieldset>
		<legend>Filter Data </legend>
		<table width='100%'>
			<tr>
				<td width='10%'>Tanggal  Retur</td>
				<td width='2%'>:</td>
				<td ><select nama='kode1' id='kode1'>
				<option value=''>-Pilih Tanggal Retur-</option>";
				$query	= "SELECT * FROM retur_pembelian ORDER BY tgl_retur";
				$sql	= mysql_query($query);
				while($r_data=mysql_fetch_array($sql)){
					echo "<option value='".$r_data['tgl_retur']."'>".$r_data['tgl_retur']." - ".$r_data['nama_retur']."</option>";
				}
				echo "</select>
				</td>
				<td width='15%'> Sampai Dengan </td>
				<td width='10%'>Tanggal Retur</td>
				<td width='2%'>:</td>
				<td ><select nama='kode2' id='kode2'>
				<option value=''>-Pilih Tanggal Retur-</option>";
				$query	= "SELECT * FROM retur_pembelian ORDER BY tgl_retur";
				$sql	= mysql_query($query);
				while($r_data=mysql_fetch_array($sql)){
					echo "<option value='".$r_data['tgl_retur']."'>".$r_data['tgl_retur']." - ".$r_data['nama_retur']."</option>";
				}
				echo "</select>
				</td>	
			</tr>
			<tr>
				<td align='center' colspan='7'>
				<button name='cari' id='cari'>CARI DATA</button>
				<button name='refresh' id='refresh'>REFRESH</button>
				</td>
			</tr>
		</table>
	</fieldset>
	</div><br>";
echo "<div id='data' align='center'></div>";
echo "<div id='tombol' align='center'><button name='cetak' id='cetak'>Cetak</button></div>";
?>
