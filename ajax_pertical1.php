<?php  
	$con=mysqli_connect("localhost","root","","ajax");
	$sql_res="SELECT * FROM `ajax_insert`";
	$resdata=mysqli_query($con,$sql_res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ajax</title>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .container {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    max-width: 550px;
    width: 100%;
  }

  .form-group {
    margin-bottom: 25px;
  }

  label {
    display: block;
    font-weight: bold;
    color: #555;
    margin-bottom: 10px;
  }
  form{
    height: 200px;
    width: 300px;
    text-align: center;
  }
  input[type="text"], input[type="email"] {
    width: 100%;
    padding: 10px 0;
    border: none;
    border-bottom: 2px solid #bbb; 
    background-color: transparent; 
    box-sizing: border-box;
    font-size: 16px;
    color: #333;
    outline: none;
  }

  input[type="text"]:focus, input[type="email"]:focus {
    border-bottom: 2px solid #4CAF50; /* Change bottom border color on focus */
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    display: block;
    margin: 0 auto; /* Center the button */
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }
  .flex{
  	display: flex
  	justify-content:space-between;
  }
  .table{
  	margin-top: 20px;	
  }
  .container2{
  	padding-left: 200px;
  }
  td{
  	padding: 5px 10px;
  }
</style>
</head>
<body>

<!-- bootstrap connectivity -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

<div class="flex">
	<div class="container">
  		<form id="myForm" method="post">
		    <div class="form-group">
		      <label for="name">Name:</label>
		      <input type="text"  name="name" id="name" placeholder="Enter your name.." required> 
		    </div>
		    <div class="form-group">
		      <label for="email">Email:</label>
		      <input type="email"  name="email" id="email" placeholder="Enter your email.." required>
		    </div>
		    <input type="submit" value="Submit">
 		</form>
	</div>


<!-- Bootstrap modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <form id="form" method="post">
            <div class="modal-body">
            <input type="hidden" name="u_id" id="u_id">
              Name:<input type="text" name="u_name" id="uname">
              Email:<input type="email" name="u_email" id="uemail">
            </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
        </div>
    </div>
</div>

<div>
    	<div>
	        <table border="2">
	            <thead>
	                <tr>
	                    <th>Id</th>
	                    <th>Name</th>
	                    <th>Email</th>
	                    <th>Action</th>

	                </tr>
	            </thead>
	            <tbody id="ans">
	            	
	          <?php while ($data=mysqli_fetch_assoc($resdata)) { ?>
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
 
	            </tbody>
	        </table>
   	 </div>
</div>

  <!-- <h1 id="res"></h1> -->

	


</body>
</html>

<script type="text/javascript">

	$(document).ready(function(){
		 $('#myForm').submit(function(e){
            e.preventDefault();
            // var name = $('input[name="name"]').val();
            // var email = $('input[name="email"]').val();

            var formdata=$('#myForm').serialize();
            $.ajax({
                type:'POST',
                // data:{name: name ,email: email},
                data:formdata,
                url:'ajax_insert.php',
                success:function(res)
                {
                	$('#name').val('');
                	$('#email').val('');
                	// $('#res').text(name + " " + email);
                	$('#ans').html(res);
                }
            })
        });

		  $(document).on('click', '.delete-link', function() {
	        var id = $(this).attr('attr-id');
	        $.ajax({
	            type: 'GET',
	            url: 'ajax_delete.php',
	            data: { "id": id },
	            success: function(res) {
	               $('#ans').html(res);
	            }
	        })
    	});


	$(document).on('click', '.edit-link', function() {
    var id = $(this).attr('data-id');
    $.ajax({
        type: 'GET',
        url: 'ajax_edit.php',
        dataType: 'json', 
        data: { "uid": id }, 
        success: function(res) {
            $('#u_id').val(res.id);
            $('#uname').val(res.name);
            $('#uemail').val(res.email);
            $('#exampleModal').modal('show');
        	}
    	});
	});


     $(document).on('submit', '#form', function(e) {
	      e.preventDefault();
	      var frm_data=$('#form').serialize();
	        $.ajax({
	            type: 'POST',
	            url: 'ajax_edit.php',
				      data: frm_data,
	            success: function(res) {
	            	$('#ans').html(res)
	               $('#exampleModal').modal('hide');
	            }
	        })
    	});



	})
	

       

       
   
 

</script>


