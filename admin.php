<?php 
include("db.php");

session_start();
if(!isset($_SESSION['id'])){
    header("location:login.php");
}


if(isset($_SESSION["id"])){

}else{
    header('location:login.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FIRSTNAME</th>
                    <th>LASTNAME</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>USER</th>
                    <th>UPDATE</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $select="SELECT * FROM ass_tbl";
                    $result=mysqli_query($conn, $select);
                    while($fetch=mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td scope="row"><?php echo $fetch['a_id']; ?></td>
                                <td><?php echo $fetch['firstname']; ?></td>
                                <td><?php echo $fetch['lastname']; ?></td>
                                <td><?php echo $fetch['email']; ?></td>
                                <td><?php echo $fetch['password']; ?></td>
                                <td><?php echo $fetch['admin']; ?></td>
                                <td><a href="update.php?upid=<?php echo $fetch['a_id']; ?>">Update</a></td>
                                <td><a href="delete.php?delid=<?php echo $fetch['a_id']; ?>">Delete</a></td>
                            </tr>
                        <?php
                    }
                ?>
                
              
            </tbody>
            
        </table>
        <button><a href="index.php">Register</a></button>
        <button><a href="logout.php">Logout</a></button>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>