<?php
include 'db.php';

$error=0;
$allerror = " ";

if(isset($_POST['submit'])) {
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    @$user = $_POST['user'];

    if(empty($f_name))
    {
        $f_nameERR="<p style='color: red';>Please enter firstName!!</p>";
        $error=1;
    }elseif(!preg_match('/^[a-zA-Z]+[ ]+[a-zA-z]*/s',$_fname)){
        $f_nameERR = "<p style='color: red';>Please enter Only letter are allowed!!</p>";
    }


    if(empty($l_name)){
        $l_nameERR="<p style='color: red';>Please enter lastName!!</p>";
        $error=1;
    }elseif(!preg_match('/^[a-zA-Z]+[ ]+[a-zA-z]*/s',$l_name)){
        $l_nameERR= "<p style='color: red';>Please enter Only letter are allowed!!</p>";
        $error=1;
    }


    if(empty($e_email)){
        $emailERR="<p style='color: red';>Please enter email!!</p>";
        $error=1;
    }elseif(!filter_var($e_email,FILTER_VALIDATE_EMAIL)){
        $emailERR= "<p style='color: red';>Invalid Email Format!!</p>"; 
        $error=1;
    }


    if(empty($p_password)){

        $passERR="<p style='color: red';>Please enter password!!</p>";
        $error=1;
    }elseif(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/',$p_password)){
        $passERR="<p style='color: red';>Min 8 characters including a number, letters a-z, A-Z!!</p>";
        $error=1;
    }

    if(empty($u_user)){
        $userERR = "<p style='color: red';>Please Select User</p>";
        $error=1;
    }


    if($error == 0){
    $sql = "INSERT INTO ass_tbl (firstname,lastname,email,password,admin)VALUES('$fname','$lname','$email','$password','$user')";
    $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "Insert success";
            header("location:index.php");
        } else {
            echo "no data insert";
        }
    }else{
        $allerror =  "<p style='color: red';>Please fill all fields..!!</p>";
    }

} 
// else {
//     echo "data not insert..!!";
// }
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
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet" />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.2.0/mdb.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-3/assets/css/registration-3.css">
</head>

<body>
    <!-- Registration 3 - Bootstrap Brain Component -->

    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 bsb-tpl-bg-platinum">
                    <div class="d-flex flex-column justify-content-between h-100 p-3 p-md-4 p-xl-5">
                        <h3 class="m-0">Welcome Coderkube !</h3>
                        <img class="img-fluid rounded mx-auto my-4" loading="lazy" src="download.png" width="245" height="80" alt="BootstrapBrain Logo">
                        <p class="mb-0">Register now</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
                    <div class="p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <h2 class="h3">Registration</h2>
                                    <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register</h3>
                                </div>
                            </div>
                        </div>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name"><?php if(!empty($f_nameERR)){echo $f_nameERR;} ?>
                                </div>
                                <div class="col-12">
                                    <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" ><?php if(!empty($l_nameERR)) {echo $l_nameERR;} ?>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" mailto:placeholder="name@example.com" ><?php if(!empty($emailERR)) {echo $emailERR;} ?>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" ><?php if(!empty($passERR)) {echo  $passERR;} ?>
                                </div>
                                <!-- Default radio -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user" id="flexRadioDefault1" />
                                    <label class="form-check-label" for="flexRadioDefault1"> Admin </label>
                                </div>

                                <!-- Default checked radio -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="user" id="flexRadioDefault2" />
                                    <label class="form-check-label" for="flexRadioDefault2"> Normal User </label><?php if(!empty($userERR)) {echo  $userERR;} ?>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" name="submit" type="submit">Sign up</button><?php echo $allerror; ?>
                                        <a href="login.php">already have account?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Optional JavaScript -->
                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        <!-- MDB -->
                        <script
                            type="text/javascript"
                            src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.2.0/mdb.umd.min.js"></script>
                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>