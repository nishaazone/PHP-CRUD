<!DOCTYPE html>
<html lang="en">
<head>
  <title>Photographer</title>
  <?php include 'links.php'  ?>
 
</head>
<body>

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
        <script src="https://cdn.lordicon.com/lordicon.js"></script>
        <lord-icon
            src="https://cdn.lordicon.com/bmlkvhui.json"
            trigger="hover"
            stroke="bold"
            colors="primary:#121331,secondary:#3a3347,tertiary:#08a88a,quaternary:#ebe6ef,quinary:#6c16c7,senary:#646e78,septenary:#911051"
            style="width:150px;height:150px">
        </lord-icon>
          <h3>Welcome</h3>
            <p>Please fill all the details carefully. </p>
             <a href="home.php">Check Form</a> <br/>
</div>
     <div class="col-md-9 register-right">
       <div class="tab-content" id="myTableContent">
         <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
           <h3 class="register-heading">Update Details</h3>

                <form action="" method="POST">
                <div class="row register-form">

                <?php
                    session_start();

                    // include 'connection.php';  
                    $username = "root";
                    $password = "";
                    $server = 'localhost';
                    $db = 'crudop';

                    $con = mysqli_connect($server, $username, $password, $db);

                    // $ids = $_GET['id'];
                    $ids = isset($_GET['id']) ? $_GET['id'] :'';

                    $showquery = "select * from registration where ID = '$ids'";

                    $showdata = mysqli_query($con, $showquery);
                    
                    $arrdata = mysqli_fetch_array($showdata);

                    if(isset($_POST['submit'])){

                        $idupdate = $_GET['id'];

                    $name = $_POST['user'];
                    $mobile = $_POST['mobile'];
                    $refer = $_POST['refer'];
                    $website = isset($_POST['website']) ? $_POST['website'] : '';
                    $email = $_POST['email'];
                    $experience = isset($_POST['experience']) ? $_POST['experience'] : '';

                    // $insertquery = " insert into registration(Name, Website, Mobile, Email_Id, Refer, Experience) values ('$name', '$website', '$mobile', '$email', '$refer', '$experience')";

                    $query = " UPDATE registration set id=$idupdate, Name='$name', Website='$website',Mobile='$mobile', Email_Id='$email', Refer='$refer', Experience='$experience' where id=$idupdate";

                    $res = mysqli_query($con, $query);

                    if($res){
                        $_SESSION['success_message'] = 'Data updated properly.';
                        header('Location: home.php');
                        // header("Location: ".$_SERVER['PHP_SELF']);
                        exit();
                    }else{
                    ?>
                    <script>
                        alert('Data not updated properly.');
                        </script>
                        <?php
                    }
                    }


                    if(isset($_SESSION['success_message'])) {
                    ?>
                    <script>
                        alert('<?php echo $_SESSION['success_message']; ?>');
                        <?php unset($_SESSION['success_message']); // Clear the session variable after displaying ?>
                    </script>
                    <?php
                    }
                    ?>

            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter your name *" name="user" value="<?php echo $arrdata['Name'];?>" required/>

             </div>

             <div class="form-group">
                <input type="tel" class="form-control" placeholder="Enter mobile number *" name="mobile" value="<?php echo $arrdata['Mobile'] ?>" required/>
             </div>

             <div class="form-group">
                <input type="text" class="form-control" placeholder="Any references *" name="refer" value="<?php echo $arrdata['Refer'] ?>" required/>
             </div>
          </div>

           <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter your Website *" name="website" value="<?php echo $arrdata['Website'] ?>" required/>
             </div>

             <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter email-id *" name="email" value="<?php echo $arrdata['Email_Id'] ?>" required/>
             </div>

             <div class="form-group">
                <input type="text" class="form-control" placeholder="Experience *" name="experience" value="<?php echo $arrdata['Experience'] ?>" />
             </div>
          </div>

          <input type="submit" class="btnRegister" name="submit" value="Update"/>
               </div>
             </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>




