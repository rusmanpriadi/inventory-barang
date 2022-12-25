<?php

include '../../koneksi.php';



header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan_Supplier(".date('d-m-Y').").xls");

?>	

<h2>Laporan Data Supplier</h2>

<table border="1">
<tr>
        <th>No</th>
                                        <th>Kode Supplier</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        
</tr>

<?php
    $no = 1;
    $sql = $koneksi->query("select * from tblsupplier");
    while ($row = $sql->fetch_assoc()) {	

    



?>

<tr>
       <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kodeSupplier'] ?></td>
                                        <td><?php echo $row['namaSupplier'] ?></td>
                                        <td><?php echo $row['alamat'] ?></td>
                                        <td><?php echo $row['telp'] ?></td>
                
</tr>




<?php

}

?>

</table>