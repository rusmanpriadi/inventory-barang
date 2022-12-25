<?php

include '../../koneksi.php';



header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Barang(".date('d-m-Y').").xls");

?>	

<h2>Laporan Data Barang</h2>

<table border="1">
<tr>
        <th>No</th>
                                        <th>Kode Supplier</th>
                                        <th>Nama Supplier</th>
                                        <th>Jenis Barang</th>
                                        <th>Satuan</th>
                                        <th>Stock</th>
                                        
</tr>

<?php
    $no = 1;
    $sql = $koneksi->query("select * from tblbarang");
    while ($row = $sql->fetch_assoc()) {	

    



?>

<tr>
       <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kodeBarang'] ?></td>
                                        <td><?php echo $row['namaBarang'] ?></td>
                                        <td><?php echo $row['jenisBarang'] ?></td>
                                        <td><?php echo $row['satuan'] ?></td>
                                        <td><?php echo $row['jumlah'] ?></td>
                
</tr>




<?php

}

?>

</table>