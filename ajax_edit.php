<?php
$con = mysqli_connect("localhost", "root", "", "ajax");
if(isset($_POST['u_name'])){

	$uname=$_POST['u_name'];
	$uemail=$_POST['u_email'];
	$u_id=$_POST['u_id'];

	$query="UPDATE `ajax_insert` SET name='$uname',email='$uemail' WHERE id=$u_id";
	mysqli_query($con,$query);
}
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    $sql = "SELECT * FROM `ajax_insert` WHERE id =$id";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
    echo json_encode($data);

}else{

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
	 	
<?php } } ?>
