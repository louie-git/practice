<?php

include('connection.php');

$query = "select * from students;";
$result = mysqli_query($conn, $query);
// echo $result;
$resultCheck  = mysqli_num_rows($result);

include('insertstud.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/styles.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <title>Practice Document</title>
</head>
<body>
  <h2 class="text-center text-success" id='message'><?php echo $success;?></h2>
    <div class="container">
        <div class="row">
        
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Lastname</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Age</th>
                    <th></th>
                  </tr>
                </thead>
                <?php 
                if($resultCheck > 0){
                  while($rows = mysqli_fetch_assoc($result)){
                ?>
                <tbody>
                
                    <tr>
                      <td style="display: none"><?php echo $rows['stud_id']?></td>
                      <td><?php echo $rows['stud_lname']?></td>
                      <td><?php echo $rows['stud_fname']?></td>
                      <td><?php echo $rows['stud_mname']?></td>
                      <td><?php echo $rows['stud_age']?></td>
                      <td>
                      <button type="button" class="btn btn-warning btn-sm updatebtn" data-toggle="modal" data-target="#updatemodal">
                        Update Student
                      </button>
                      </td>
                    </tr>
                    <?php
                  }
                }else{
                  ?>
                  <h2>No Student Registered</h2>
                  <?php
                }
                ?>


        </div>
        
    </div>
    <div>
        <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#exampleModal">
          Register Student
        </button>
        
    </div>
    
   
    
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="students.php" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lname" required>
              </div>

              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="fname" required>
              </div>

              <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="mname">
              </div>

              <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="insertdata" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Update Student info -->
    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="students.php" method="POST">
            <div class="modal-body">
                <input type="text" id=upid name="upid" style="display:none">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="lname" id="uplname" required>
              </div>

              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="fname" id="upfname" required>
              </div>

              <div class="form-group">
                <label>Middle Name</label>
                <input type="text" class="form-control" name="mname" id="upmname">
              </div>

              <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" id="upage" required>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="updatedata" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function(){
        setTimeout(function(){
          $('#message').hide();
        },3000);
      })
    </script>
    <script>
      $(document).ready(function() {
      $('.updatebtn').on('click',function() {
      $tr = $(this).closest('tr');
      var data = $tr.children('td').map(function (){
          return $(this).text();
      }).get();
      console.log(data);
      $('#upid').val(data[0]);
      $('#uplname').val(data[1]);
      $('#upfname').val(data[2]);
      $('#upmname').val(data[3]);
      $('#upage').val(data[4]);
      });      
    });
    </script>
</body>

</html>
