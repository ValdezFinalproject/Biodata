<?php
require_once 'db_connection.php';
?>


<?php

  if (isset($_POST['Insert_Data'])) { // if the button is clicked?

    //Get the value of fields and tranfer it to each variables.
    $pangalan = $_POST['name'];
    $CA = $_POST['city_address'];
    $probinsya = $_POST['provincial_address'];
    $EA = $_POST['email_address'];
    $DOB = $_POST['date_of_birth'];
    $CS = $_POST['civil_status'];
    $taas = $_POST['height'];
    $bigat = $_POST['weight'];
    $relihiyon = $_POST['religion'];
    $FN = $_POST['fathers_name'];
    $MN = $_POST['mothers_name'];
    $lenggwahe = $_POST['lengwahe'];
    $kasarian = $_POST['sex'];
    $telepono = $_POST['cell_phone'];
    $POB = $_POST['place_of_birth'];
    $pagkamamamayan = $_POST['citizenship'];
    $occupation = $_POST['occupation'];
    $ftrabaho = $_POST['fathers_occupation'];
    $mtrabaho = $_POST['mothers_occupation'];


    foreach($_POST as $key => $value) {
      $validate = $_POST[$key];
      if($validate == '') {
          $_SESSION[$key]  = $key. " field is required";
          if(isset($_POST['Insert_Data'])) {
              unset($_SESSION['Insert_Data']);
          } else {
              
          }
        }
      }

      if(empty($mtrabaho)) {
        header('Location: insert_data.php');
        exit;
      } else {
     
    $query = 'INSERT INTO bio_data_tbl
          (
            name,
            city_address,
            provincial_address,
            email_address,
            date_of_birth,
            civil_status,
            height,
            religion,
            fathers_name,
            mothers_name,
            lengwahe,
            sex,
            cell_phone,
            place_of_birth,
            citizenship,
            weight,
            occupation,
            fathers_occupation,
            mothers_occupation
          ) 
          VALUES(
          :name,
          :city_address,
          :provincial_address,
          :email_address,
          :date_of_birth,
          :civil_status,
          :height,
          :religion,
          :fathers_name,
          :mothers_name,
          :lengwahe,
          :sex,
          :cell_phone,
          :place_of_birth,
          :citizenship,
          :weight,
          :occupation,
          :fathers_occupation,
          :mothers_occupation 
        )';


    $stmt = $DB_con->prepare($query);

    $stmt->bindParam(':name',$pangalan);
    $stmt->bindParam(':city_address',$CA);
     $stmt->bindParam(':provincial_address',$probinsya);
     $stmt->bindParam(':email_address',$EA);
     $stmt->bindParam(':date_of_birth',$DOB);
     $stmt->bindParam(':civil_status',$CS);
     $stmt->bindParam(':height',$taas);
     $stmt->bindParam(':religion',$relihiyon);
     $stmt->bindParam(':fathers_name',$FN);
     $stmt->bindParam(':mothers_name',$MN);
     $stmt->bindParam(':lengwahe',$lenggwahe);
     $stmt->bindParam(':sex',$kasarian);
     $stmt->bindParam(':cell_phone',$telepono);
     $stmt->bindParam(':place_of_birth',$POB);
     $stmt->bindParam(':citizenship',$pagkamamamayan);
     $stmt->bindParam(':weight',$bigat);
     $stmt->bindParam(':occupation',$occupation);
     $stmt->bindParam(':fathers_occupation',$ftrabaho);
     $stmt->bindParam(':mothers_occupation',$mtrabaho);
    
    if($stmt->execute()){

      ?>
<script>
alert('New record succesfully inserted ...'); // alert message
</script>
<?php

      }else{

      ?>
<script>
alert('Error while inserting....'); // alert message
</script>
<?php

      } 
  }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Insert Data </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
    body {
        background-color: #fefbd8;

    }

    .container {
        width: 74%;
        margin-left: 10px;
    }

    .container1 {
        width: 99%;
        margin-left: 21px;
    }

    .x1 {
        position: absolute;
        top: 31%;
        left: 75%;
        width: 25%;
    }

    .x2 {
        position: absolute;
        top: 63.5%;
        left: 75%;
        width: 25%;
    }

    .x3 {
        position: absolute;
        top: 74.5%;
        left: 75%;
        width: 25%;
    }

    .x4 {
        position: absolute;
        top: 85.5%;
        left: 75%;
        width: 25%;
    }

    .x5 {
        position: absolute;
        top: 96.5%;
        left: 75%;
        width: 25%;
    }

    .x6 {
        position: absolute;
        top: 118%;
        left: 75%;
        width: 25%;
    }

    .x7 {
        position: absolute;
        top: 129%;
        left: 75%;
        width: 25%;
    }

    h1 {
        padding: 0px;
        text-align: left;
        text-decoration: none;
        text-transform: uppercase;
        font-family: Times Rew Roman;
        font-size: 17px;
        color: white;
        background-color: black;
    }

    h2 {
        padding: 0px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        font-family: Times New Roman;
        font-size: 35px;
        color: black;
        float: left;
        margin-left: 600px;
        margin-top: 50px;
    }

    .square {
        float: right;
        height: 130px;
        width: 130px;
        padding: 0;
        border: 2px solid;
        border-color: black;
        background-color: white;
    }
    </style>
</head>

<body>
    <center>
        <h2>BIO DATA</h2>
        <div class="square"> <br> <br> ID PHOTO</div>
    </center>
    </center>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>PERSONAL DATA</h1>
    </head>

    <body>

        <hr>
        <form method="POST">
            <div class="form-group">
                <div class="container">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" value="<?=isset($_SESSION['name']) ? $_SESSION['name'] : ''?>"placeholder="Lastname,Given Name, Middle Initial"
                        name="name">
                        <?=isset($_SESSION['name']) ? '<label class="text-danger">'.$_SESSION['name'].'</label>' : ''; unset($_SESSION['name'])?>
                </div>
                <div class="container1">
                    <label>City Address:</label>
                    <input type="text" class="form-control" id="city_address" placeholder="Complete City Address"
                        name="city_address">
                        <?=isset($_SESSION['city_address']) ? '<label class="text-danger">'.$_SESSION['city_address'].'</label>' : ''; unset($_SESSION['city_address'])?>
                </div>
                <div class="container1">
                    <label>Provincial Address:</label>
                    <input type="text" class="form-control" id="provincial_address"
                        placeholder="Enter Provincial Address" name="provincial_address">
                        <?=isset($_SESSION['provincial_address']) ? '<label class="text-danger">'.$_SESSION['provincial_address'].'</label>' : ''; unset($_SESSION['provincial_address'])?>
                </div>
                <div class="container">
                    <label>E-mail Address:</label>
                    <input type="text" class="form-control" id="email_address" placeholder="Valid e-mail Address"
                        name="email_address">
                        <?=isset($_SESSION['email_address']) ? '<label class="text-danger">'.$_SESSION['email_address'].'</label>' : ''; unset($_SESSION['email_address'])?>

                </div>
                <div class="container">
                    <label>Date of Birth:</label>
                    <input type="date" class="form-control" id="date_of_birth" placeholder="Enter Date of Birth"
                        name="date_of_birth">
                        <?=isset($_SESSION['date_of_birth']) ? '<label class="text-danger">'.$_SESSION['date_of_birth'].'</label>' : ''; unset($_SESSION['date_of_birth'])?>
                </div>
                <div class="container">
                    <label>Civil Status:</label>
                    <input type="text" class="form-control" id="civil_status" placeholder="Enter Civil Status"
                        name="civil_status">
                        <?=isset($_SESSION['civil_status']) ? '<label class="text-danger">'.$_SESSION['civil_status'].'</label>' : ''; unset($_SESSION['civil_status'])?>
                </div>
                <div class="container">
                    <label>Height:</label>
                    <input type="text" class="form-control" id="heigth" placeholder="Enter Heigth in Centimeter"
                        name="height">
                        <?=isset($_SESSION['height']) ? '<label class="text-danger">'.$_SESSION['height'].'</label>' : ''; unset($_SESSION['height'])?>
                </div>
                <div class="container1">
                    <label>Religion:</label>
                    <input type="text" class="form-control" id="religion" placeholder="Enter Religion" name="religion">
                    <?=isset($_SESSION['religion']) ? '<label class="text-danger">'.$_SESSION['religion'].'</label>' : ''; unset($_SESSION['religion'])?>
                </div>
                <div class="container">
                    <label>Father's Name:</label>
                    <input type="text" class="form-control" id="fathers_name" placeholder="Enter Father's Name"
                        name="fathers_name">
                        <?=isset($_SESSION['fathers_name']) ? '<label class="text-danger">'.$_SESSION['fathers_name'].'</label>' : ''; unset($_SESSION['fathers_name'])?>
                </div>
                <div class="container">
                    <label>Mother's Name:</label>
                    <input type="text" class="form-control" id="mothers_name" placeholder="Enter Mother's Maiden Name"
                        name="mothers_name">
                        <?=isset($_SESSION['mothers_name']) ? '<label class="text-danger">'.$_SESSION['mothers_name'].'</label>' : ''; unset($_SESSION['mothers_name'])?>
                </div>
                <div class="container1">
                    <label>Language:</label>
                    <input type="text" class="form-control" id="lengwahe" placeholder="Mothertongue" name="lengwahe">
                    <?=isset($_SESSION['lengwahe']) ? '<label class="text-danger">'.$_SESSION['lengwahe'].'</label>' : ''; unset($_SESSION['lengwahe'])?>
                </div>

                <div class="x1">
                    <label>Sex:</label>
                    <input type="text" class="form-control" id="sex" placeholder="F/M" name="sex">
                    <?=isset($_SESSION['sex']) ? '<label class="text-danger">'.$_SESSION['sex'].'</label>' : ''; unset($_SESSION['sex'])?>
                </div>
                <div class="x2">
                    <label>Cellphone Number:</label>
                    <input type="text" class="form-control" id="cell_phone" placeholder="Enter Cellphone Number"
                        name="cell_phone">
                        <?=isset($_SESSION['cell_phone']) ? '<label class="text-danger">'.$_SESSION['cell_phone'].'</label>' : ''; unset($_SESSION['cell_phone'])?>
                </div>
                <div class="x3">
                    <label>Place of Birth:</label>
                    <input type="text" class="form-control" id="place_of_birth" placeholder="City,Province(Zipcode)"
                        name="place_of_birth">
                        <?=isset($_SESSION['place_of_birth']) ? '<label class="text-danger">'.$_SESSION['place_of_birth'].'</label>' : ''; unset($_SESSION['place_of_birth'])?>
                </div>

                <div class="x4">
                    <label>Citizenship:</label>
                    <input type="text" class="form-control" id="citizenship" placeholder=" Filipino/Foreign"
                        name="citizenship">
                        <?=isset($_SESSION['citizenship']) ? '<label class="text-danger">'.$_SESSION['citizenship'].'</label>' : ''; unset($_SESSION['citizenship'])?>
                </div>

                <div class="col-md-12">
                    <label>occupation:</label>
                    <input type="text" class="form-control" id="occupation" placeholder="Enter occupation"
                        name="occupation">
                        <?=isset($_SESSION['occupation']) ? '<label class="text-danger">'.$_SESSION['occupation'].'</label>' : ''; unset($_SESSION['occupation'])?>
                </div>

                <div class="x5">
                    <label>Weight:</label>
                    <input type="text" class="form-control" id="weight" placeholder="Weight(Kg)" name="weight">
                    <?=isset($_SESSION['weight']) ? '<label class="text-danger">'.$_SESSION['weight'].'</label>' : ''; unset($_SESSION['weight'])?>
                </div>



                <div class="x6">
                    <label>Father's Occupation:</label>
                    <input type="text" class="form-control" id="fathers_occupation"
                        placeholder="Enter Father's Occupation" name="fathers_occupation">
                        <?=isset($_SESSION['fathers_occupation']) ? '<label class="text-danger">'.$_SESSION['fathers_occupation'].'</label>' : ''; unset($_SESSION['fathers_occupation'])?>
                </div>
                <div class="x7">
                    <label>Mother's Occupation:</label>
                    <input type="text" class="form-control" id="mothers_occupation"
                        placeholder="Enter Mother's Occupation" name="mothers_occupation">
                        <?=isset($_SESSION['mothers_occupation']) ? '<label class="text-danger">'.$_SESSION['mothers_occupation'].'</label>' : ''; unset($_SESSION['mothers_occupation'])?>
                </div>





            </div>
            <center>
                <button type="submit" class="btn btn-primary" name="Insert_Data">Submit</button>
                <a href="index.php" class="btn btn-primary">Go Back to View</a>
            </center>
        </form>
        </div>
    </body>

</html>

