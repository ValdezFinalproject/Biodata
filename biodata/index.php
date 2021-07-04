<!DOCTYPE html>
<html>
<head>
  <title>View Data</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>BIO DATA OUTPUT</h2> <a href="insert_data.php" class="btn btn-primary">Insert Data</a>
    <hr>           
    <table class="table table-striped">
      <thead>
        <tr>
          <th>NAME</th>
          <br>
          <th>CITY_ADDRESS</th>
          <th>PROVINCIAL_ADDRESS</th>
          <th>EMAIL_ADDRESS</th>
          <th>DATE_OF_BIRTH</th>
          <th>CIVIL_STATUS</th>
          <th>HEIGHT</th>
          <th>RELIGION</th>
          <th>FATHERS_NAME</th>
          <th>MOTHERS_NAME</th>
          <th>LANGUAGE</th>
          <th>SEX</th>
          <th>CELLPHONE</th>
          <th>CITIZENSHIP</th>
          <th>WEIGHT</th>
          <th>OCCUPATION</th>
          <th>FATHERS_OCCUPATION</th>
          <th>MOTHERS_OCCUPATION</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>

<?php
  require_once 'db_connection.php';
  $stmt = $DB_con->prepare('SELECT * FROM bio_data_tbl');
  $stmt->execute();
  
  if($stmt->rowCount() > 0){
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
      ?>

        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['city_address']; ?></td>
          <td><?php echo $row['provincial_address']; ?></td>
          <td><?php echo $row['email_address']; ?></td>
          <td><?php echo $row['date_of_birth']; ?></td>
          <td><?php echo $row['civil_status']; ?></td>
          <td><?php echo $row['height']; ?></td>
          <td><?php echo $row['religion']; ?></td>
          <td><?php echo $row['fathers_name']; ?></td>
          <td><?php echo $row['mothers_name']; ?></td>
          <td><?php echo $row['lengwahe']; ?></td>
          <td><?php echo $row['sex']; ?></td>
          <td><?php echo $row['cell_phone']; ?></td>
          <td><?php echo $row['citizenship']; ?></td>
          <td><?php echo $row['weight']; ?></td>
          <td><?php echo $row['occupation']; ?></td>
          <td><?php echo $row['fathers_occupation']; ?></td>
          <td><?php echo $row['mothers_occupation']; ?></td>
          <td>
            <a href="update_data.php?update_id=<?php echo $row['id']; ?>">[Update]</a>
            <a href="delete_data.php?delete_id=<?php echo $row['id']; ?>">[Delete]</a>
          </td>
        </tr>

              
      <?php
    }
  }
?>
      </tbody>
    </table>
  </div>
</body>
</html>