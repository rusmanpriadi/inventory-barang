
<?php
if (isset($_POST['submit']))
{?>

 <?php



	$koneksi = new mysqli("localhost","root","","inventory");

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Laporan_Barang_Masuk (".date('d-m-Y').").xls");
	
	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;

?>	

<body>
<center>
<h2>Laporan Barang Masuk Bulan <?php echo $bln;?> Tahun <?php echo $thn;?></h2>
</center>
<table >
  <tr>
											<th>No</th>
											<th>Id Transaksi</th>
											<th>Tanggal Masuk</th>
											<th>Kode Barang</th>
											<th>Nama Barang</th>
										
											<th>Pengirim</th>
											

											<th>Jumlah Masuk</th>
											<th>Satuan Barang</th>
										
                                         
                                        </tr>
	

                    <?php 
									
									$no = 1;
									$sql = $koneksi->query("select * from barang_masuk where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'");
									while ($row = $sql->fetch_assoc()) {
										
									?>
									
                                        <tr>
                                            <td><?php echo $no++; ?></td>
											<td><?php echo $row['id_transaksi'] ?></td>
											<td><?php echo $row['tanggal'] ?></td>
											<td><?php echo $row['kode_barang'] ?></td>
											<td><?php echo $row['nama_barang'] ?></td>
											
											<td><?php echo $row['pengirim'] ?></td>

											<td><?php echo $row['jumlah'] ?></td>
										<td><?php echo $row['satuan'] ?></td>
								

                                        </tr>
									<?php }?>
					</table>	
					</body>
                                
	<?php 
	}
	?>
	
	<?php

	$koneksi = new mysqli("localhost","root","","inventory");
	

	$bln = $_POST['bln'] ;
	$thn = $_POST['thn'] ;
	?>
	
	<?php
	if ($bln == 'all') {
		?>
	<div class="table-responsive">
							
                                <table  class="display table table-bordered" id="transaksi">
								
                                    <thead>
                                      <tr>
											<th>No</th>
											<th>Id Transaksi</th>
											<th>Tanggal Masuk</th>
											<th>Kode Barang</th>
											<th>Nama Barang</th>
											<th>Pengirim</th>
											<th>Jumlah Masuk</th>
											<th>Satuan Barang</th>
										
                                         
                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $koneksi->query("select * from barang_masuk where YEAR(tanggal) = '$thn'");
		while ($data = $sql->fetch_assoc()) {
									
		?>
	
						
				 <tr>
                                            <td class="td-b text-center text-xs font-weight-bold "><?php echo $no++; ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['id_transaksi'] ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['tanggal'] ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['kode_barang'] ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['nama_barang'] ?></td>
											
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['pengirim'] ?></td>
									
                                         
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['jumlah'] ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['satuan'] ?></td>
								

                                        </tr>
						<?php 
						}
						?>

					</tbody>
                    </table>
					</div>
					
					
					<?php
					}
					else{ ?>
						<div class="table-responsive">
							
                                <table  class="display table table-bordered" id="transaksi">
								
                                     <thead>
                                      <tr>
											<th>No</th>
											<th>Id Transaksi</th>
											<th>Tanggal Masuk</th>
											<th>Kode Barang</th>
											<th>Nama Barang</th>
											<th>Pengirim</th>
											<th>Jumlah Masuk</th>
											<th>Satuan Barang</th>
						
                                        </tr>
                                    </thead>
		<tbody>
									
		
		<?php
		$no = 1;
		$sql = $koneksi->query("select * from barang_masuk where MONTH(tanggal) = '$bln' and YEAR(tanggal) = '$thn'");
			while ($data = $sql->fetch_assoc()) {
									
		?>
	
						 <tr>
                         <td class="td-b text-center text-xs font-weight-bold "><?php echo $no++; ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['id_transaksi'] ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['tanggal'] ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['kode_barang'] ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['nama_barang'] ?></td>
											
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['pengirim'] ?></td>
									
                                         
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['jumlah'] ?></td>
											<td class="td-b text-center text-xs font-weight-bold "><?php echo $data['satuan'] ?></td>
								
								

                                        </tr>
						<?php 
		}
		?>
    </tbody>
	</table>
</div>
	
	<?php

}

?>