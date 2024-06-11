<?php
$con=mysqli_connect("localhost","root","","ajax");
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM ajax_insert WHERE id = '$id'";
    $res = mysqli_query($con, $sql);
  
}
$sql_res="SELECT * FROM `ajax_insert`";
	$resdata=mysqli_query($con,$sql_res);
 while ($data=mysqli_fetch_assoc($resdata)) { ?>
	 			<tr>
	 		<td><?php echo $data['id']; ?></td>
	 		<td><?php echo $data['name']; ?></td>
	 		<td><?php echo $data['email']; ?></td>
        	 <td>
            <a href="javascript:void(0)" class="edit-link" data-id="<?php echo $data['id']; ?>">EDIT</a> |
            <a href="javascript:void(0)" class="delete-link" attr-id="<?php echo $data['id']; ?>">DELETE</a>
        </td>
	 	</tr>
	 	
<?php } ?>