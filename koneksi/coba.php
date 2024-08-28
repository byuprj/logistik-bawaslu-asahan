<!DOCTYPE html>
<html>
<head>
 <title>maribelajarcoding.com</title>
 
 <?php 
  $con = mysqli_connect("localhost","root","", "db_laundry");

 ?>
</head>
<body>
 <h2>maribelajarcoding.com</h2>
<table> 
 <form>
  <tr>
   <td>NIM</td>
   <td>
    <select id="id_pelanggan" name="id_pelanggan" onchange="changeValue(this.value)">
     <option disabled="" selected="">Pilih</option>
     <?php 
       $sql=mysqli_query($con, "SELECT * FROM tb_pelanggan");
       $jsArray = "var prdName = new Array();\n";
       while ($data=mysqli_fetch_array($sql)) {
      
        echo '<option value="'.$data['id_pelanggan'].'">'.$data['id_pelanggan'].'</option> ';
        $jsArray .= "prdName['" . $data['id_pelanggan'] . "'] = {alamat:'" . addslashes($data['alamat']) . "'};\n";
      
       }
      ?>
    </select>
   </td>
  </tr>
  <tr>
   <td>Nama</td>
   <td><input type="text" name="nama" id="nama"></td>
  </tr>
 
  <tr>
   <td></td>
   <td><input type="submit" name="simpan" value="Simpan"></td>
  </tr>
 </form>
</table>
<script type="text/javascript" src="../asset/plugin/jquery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">    
    <?php echo $jsArray; ?>  
    function changeValue(x){  
    document.getElementById('alamat').value = prdName[x].alamat;   
    };  
    </script> 
    
</body>

</html>