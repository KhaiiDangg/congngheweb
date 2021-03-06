<?php
   include("../lib/connection.php");
   include('header.php');

?>



<div class="container mt-3">
  <h2>Tra cứu Hồ sơ sinh viên</h2>
  <p>Type something in the input field to search the table for first names, last names or emails:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Họ Tên</th>
        <th>CMND</th>
        <th>Email</th>
   
        <th></th>
      </tr>
    </thead>
    <tbody id="myTable">
     <?php
       
$sql = "SELECT  * FROM thisinh";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row['ho']." ".$row['ten']."</td>
    <td>".$row['CMND']."</td>
    <td>".$row['email']."</td>
  </tr>";
  }
} 
     
 $conn->close();
     
     ?>
      
    </tbody>
  </table>
  
  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
</div>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>






<?php
    include('footer.php');
?>