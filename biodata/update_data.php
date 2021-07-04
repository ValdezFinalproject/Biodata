<!DOCTYPE html>
<html>

<head>
    <title>Update Data DEMO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <?php
  require_once 'db_connection.php';

  if(isset($_GET['update_id']) && !empty($_GET['update_id'])){
    $update_id = $_GET['update_id'];
    $stmt_edit = $DB_con->prepare('SELECT * FROM bio_data_tbl WHERE id =:update_id');
    $stmt_edit->execute(array(':update_id'=>$update_id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
      
  }else{
    header("Location: index.php");
    
  }
?>


    <?php

if(isset($_POST['Update_Data'])){ 
  
    $pangalan = $_POST['name'];
    $CA = $_POST['city_address'];
    $probinsya = $_POST['provincial_address'];
    $EA = $_POST['email_address'];
    $DOB = $_POST['date_of_birth'];
    $CS = $_POST['civil_status'];
    $taas = $_POST['height'];
    $relihiyon = $_POST['religion'];
    $FN = $_POST['fathers_name'];
    $MN = $_POST['mothers_name'];
    $lenggwahe = $_POST['language'];
    $kasarian = $_POST['sex'];
    $telepono = $_POST['cell_phone'];
    $pagkamamamayan = $_POST['citizenship'];
    $bigat = $_POST['weight'];
    $trabaho = $_POST['occupation'];
    $ftrabaho = $_POST['fathers_occupation'];
    $mtrabaho = $_POST['mothers_occupation'];
    // session_destroy();
    foreach($_POST as $key => $value) {
        $validate = $_POST[$key];
        if($validate == '') {
            $_SESSION[$key]  = $key. " field is required";
            if(isset($_POST['Update_Data'])) {
                unset($_SESSION['Update_Data']);
            } else {
                
            }
        }
        
    }

      if(empty($mtrabaho)  || empty($pangalan) || empty($CA) || empty($probinsya) || empty($EA) || empty($DOB) || empty($CS) || empty($taas) || empty($relihiyon) || empty($FN) || empty($MN) || empty($lenggwahe) || empty($kasarian) || empty($telepono) || empty($pagkamamamayan) || empty($bigat) || empty($trabaho) || empty($ftrabaho) || empty($mtrabaho)) {
        header('Location: update_data.php?update_id='.$update_id);
        exit;
      } else {
    
    $stmt = $DB_con->prepare('UPDATE bio_data_tbl SET name=:name,city_address=:city_address,provincial_address=:provincial_address,email_address=:email_address,date_of_birth=:date_of_birth,civil_status=:civil_status,height=:height,religion=:religion,fathers_name=:fathers_name,mothers_name=:mothers_name,lengwahe=:lengwahe,sex=:sex,cell_phone=:cell_phone,citizenship=:citizenship,weight=:weight,occupation=:occupation,fathers_occupation=:fathers_occupation,mothers_occupation=:mothers_occupation WHERE id=:id');

    $stmt->bindParam(':id',$id);               
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
    $stmt->bindParam(':citizenship',$pagkamamamayan);
    $stmt->bindParam(':weight',$bigat);
    $stmt->bindParam(':occupation',$trabaho);
    $stmt->bindParam(':fathers_occupation',$ftrabaho);
    $stmt->bindParam(':mothers_occupation',$mtrabaho);


    
      
      if($stmt->execute()){

        header('Location: update_data.php?update_id='.$update_id);


      }else{

        ?>
    <script>
    alert('Error while inserting....');
    </script>
    <?php

}
}
}
?>

    <div class="container">
        <h2>FINAL PROJECT (update)</h2>
        <a href="index.php" class="btn btn-danger">Cancel and Go Back to View</a>
        <hr>
        <form method="POST">
            <div class="form-group">
                <label for="name">NAME:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                    value="<?php echo $name; ?>">
                    <?=isset($_SESSION['name']) ? '<label class="text-danger">'.$_SESSION['name'].'</label>' : ''; unset($_SESSION['name'])?> <br>

                <label>City Address:</label>
                <input type="text" class="form-control" id="city_address" placeholder="Enter City Address"
                    value="<?php echo $city_address; ?>" name="city_address">
                    <?=isset($_SESSION['city_address']) ? '<label class="text-danger">'.$_SESSION['city_address'].'</label>' : ''; unset($_SESSION['city_address'])?><br>

                <label>Provincial Address:</label>
                <input type="text" class="form-control" id="provincial_address" placeholder="Enter Provincial Address"
                    value="<?php echo $provincial_address; ?>" name="provincial_address">
                    <?=isset($_SESSION['provincial_address']) ? '<label class="text-danger">'.$_SESSION['provincial_address'].'</label>' : ''; unset($_SESSION['provincial_address'])?><br>

                <label>E-mail Address:</label>
                <input type="text" class="form-control" id="email_address" placeholder="EnterE-mail Address"
                    value="<?php echo $email_address; ?>" name="email_address">
                    <?=isset($_SESSION['email_address']) ? '<label class="text-danger">'.$_SESSION['email_address'].'</label>' : ''; unset($_SESSION['email_address'])?><br>

                <label>Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" placeholder="Enter Date of Birth"
                    value="<?php echo $date_of_birth; ?>" name="date_of_birth">
                    <?=isset($_SESSION['date_of_birth']) ? '<label class="text-danger">'.$_SESSION['date_of_birth'].'</label>' : ''; unset($_SESSION['date_of_birth'])?><br>

                <label>Civil Status:</label>
                <input type="text" class="form-control" id="civil_status" placeholder="Enter Civil Status"
                    value="<?php echo $civil_status; ?>" name="civil_status">
                    <?=isset($_SESSION['civil_status']) ? '<label class="text-danger">'.$_SESSION['civil_status'].'</label>' : ''; unset($_SESSION['civil_status'])?><br>

                <label>Height:</label>
                <input type="text" class="form-control" id="height" placeholder="Enter Height"
                    value="<?php echo $height; ?>" name="height">
                    <?=isset($_SESSION['height']) ? '<label class="text-danger">'.$_SESSION['height'].'</label>' : ''; unset($_SESSION['height'])?><br>

                <label>Religion:</label>
                <input type="text" class="form-control" id="religion" placeholder="Enter Religion"
                    value="<?php echo $religion; ?>" name="religion">
                    <?=isset($_SESSION['religion']) ? '<label class="text-danger">'.$_SESSION['religion'].'</label>' : ''; unset($_SESSION['religion'])?><br>

                <label>Father's Name:</label>
                <input type="text" class="form-control" id="fathers_name" placeholder="Enter Father's Name"
                    value="<?php echo $fathers_name; ?>" name="fathers_name">
                    <?=isset($_SESSION['fathers_name']) ? '<label class="text-danger">'.$_SESSION['fathers_name'].'</label>' : ''; unset($_SESSION['fathers_name'])?><br>

                <label>Mother's Name:</label>
                <input type="text" class="form-control" id="mothers_name" placeholder="Enter Mother's Name"
                    value="<?php echo $mothers_name; ?>" name="mothers_name">
                    <?=isset($_SESSION['mothers_name']) ? '<label class="text-danger">'.$_SESSION['mothers_name'].'</label>' : ''; unset($_SESSION['mothers_name'])?><br>

                <label>language:</label>
                <input type="text" class="form-control" id="language" placeholder="Enter language"
                    value="<?php echo $lengwahe; ?>" name="language">
                    <?=isset($_SESSION['language']) ? '<label class="text-danger">'.$_SESSION['language'].'</label>' : ''; unset($_SESSION['language'])?><br>


                <div class="container1">
                    <label>sex:</label>
                    <input type="text" class="form-control" id="sex" placeholder="Enter sex" value="<?php echo $sex; ?>"
                        name="sex">
                    <?=isset($_SESSION['sex']) ? '<label class="text-danger">'.$_SESSION['sex'].'</label>' : ''; unset($_SESSION['sex'])?><br>
                </div>

                <div class="container2">
                    <label>cell phone:</label>
                    <input type="text" class="form-control" id="cell_phone" placeholder="Enter cell phone"
                        value="<?php echo $cell_phone; ?>" name="cell_phone">
                    <?=isset($_SESSION['cell_phone']) ? '<label class="text-danger">'.$_SESSION['cell_phone'].'</label>' : ''; unset($_SESSION['cell_phone'])?><br>
                </div>

                <div class="container4">
                    <label>citizenship:</label>
                    <input type="text" class="form-control" id="citizenship" placeholder="Enter citizenship"
                        value="<?php echo $citizenship; ?>" name="citizenship">
                    <?=isset($_SESSION['citizenship']) ? '<label class="text-danger">'.$_SESSION['citizenship'].'</label>' : ''; unset($_SESSION['citizenship'])?><br>
                </div>

                <div class="container5">
                    <label>weight:</label>
                    <input type="text" class="form-control" id="weight" placeholder="Enter weight"
                        value="<?php echo $weight; ?>" name="weight">
                    <?=isset($_SESSION['weight']) ? '<label class="text-danger">'.$_SESSION['weight'].'</label>' : ''; unset($_SESSION['weight'])?><br>
                </div>

                <div class="container6">
                    <label>occupation:</label>
                    <input type="text" class="form-control" id="occupation" placeholder="Enter occupation"
                        value="<?php echo $occupation; ?>" name="occupation">
                    <?=isset($_SESSION['occupation']) ? '<label class="text-danger">'.$_SESSION['occupation'].'</label>' : ''; unset($_SESSION['occupation'])?><br>
                </div>

                <div class="container7">
                    <label>father's occupation:</label>
                    <input type="text" class="form-control" id="fathers_occupation"
                        placeholder="Enter father's occupation" value="<?php echo $fathers_occupation; ?>"
                        name="fathers_occupation">
                    <?=isset($_SESSION['fathers_occupation']) ? '<label class="text-danger">'.$_SESSION['fathers_occupation'].'</label>' : ''; unset($_SESSION['fathers_occupation'])?><br>
                </div>
                <div class="container8">
                    <label>mother's occupation:</label>
                    <input type="text" class="form-control" id="mothers_occupation"
                        placeholder="Enter mother's occupation" value="<?php echo $mothers_occupation; ?>"
                        name="mothers_occupation">
                    <?=isset($_SESSION['mothers_occupation']) ? '<label class="text-danger">'.$_SESSION['mothers_occupation'].'</label>' : ''; unset($_SESSION['mothers_occupation'])?><br>
                </div>





                <button type="submit" class="btn btn-primary" name="Update_Data">Submit</button>
        </form>
    </div>


    <!--
      <div class="form-group">
        <label for="phone">City address:</label>
        <input type="text" class="form-control" id="city_address" placeholder="Enter city address" name="city_address" value="<?php echo $phone; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="Update_Data">Submit</button>
    </form>
  </div>-->
</body>

</html>