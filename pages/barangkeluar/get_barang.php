<?php
include("../../koneksi.php");
$tamp =$_POST['tamp'];
$pecah_bar = explode(".", $tamp);
$kode_bar = $pecah_bar[0];
    $sql = "SELECT *
    FROM tblbarang
    where kodeBarang = '$kode_bar'";
    $result = mysqli_query($koneksi, $sql);                            
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
                                       
    ?>
		
		<label for="stock">Stock</label>
                            <div class="form-group">
                               <div class="form-line">
                                 <input readonly="readonly" id="stock" type="number" class="form-control" value="<?php echo $row["jumlah"];?>">
								
							
								
								
								</input>
                                     
									 
							</div>
                            </div>
 <?php
   		}
    } else {
       echo "0 results";
    }

     mysqli_close($koneksi);
 
 ?>
							
							