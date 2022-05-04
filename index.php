<?php
include 'db.php';
$table2 = $_GET['table'] ?? 'gymprogramme';
setcookie('table',$table2,time() + 10000,"/");


    

if (isset($_POST['submit'])){
    $exercise = $_POST['exercise'];
    $reps = $_POST['reps'];
    $weight = $_POST['weight'];
    $notes = $_POST['notes'];

    $query = "INSERT INTO {$table2} (exercise,reps,weight,notes) VALUES('$exercise','$reps','$weight','$notes')"; 
    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Could not post. Sorry.");
     }
};

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $exercise = $_POST['exercise'];
    $reps = $_POST['reps'];
    $weight = $_POST['weight'];
    $notes = $_POST['notes'];

    $query = "UPDATE `$table2` SET Exercise='$exercise',Reps='$reps',Weight='$weight',Notes='$notes'  WHERE id = $id";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Update query failed" . mysqli_error($connection));
    }
  };

if (isset($_POST['delete'])) {  
    $id = $_POST['id']; 
    $query = "DELETE FROM `$table2` WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Delete query failed" . mysqli_error($connection));
    }
  };

  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Workout Tracker</title>
</head>
<body>
  <header>
<h1> Workouts </h1>
</header>
    <div class="container1">
     

          <form action="index.php?table=<?=$table2?>" method="POST" class="form">
            <textarea
                id="exercise"
                name="exercise"></textarea>
                <textarea
                id="reps"
                name="reps"></textarea>
                <textarea
                id="weight"
                name="weight"></textarea>
                <textarea
                id="notes"
                name="notes"></textarea>
            
              <button type="submit" name="submit" class="btn">Add item to the list</button>
            
          </form>
    </div>


    <div class="container2">




<div class="workouts">
    <form class="getter" action="index.php?table=<?=$table2?>" method="GET">
    <select class="tableSelect" name="table">
           <?php 
           $query = "SHOW TABLES";
                $result = mysqli_query($connection, $query);
                if(!$result){
                    die("Couldn't do that, sorry");
                  };
                  while($row = mysqli_fetch_assoc($result)){
                    //printr $result shows row name
                    // while($row = $result->fetch_array()){
                     $tables = $row['Tables_in_gymApp'];
                    // $tables = $row;
                // } 
                // foreach($tables as $row){
                    ?>
                  <option value=<?=$tables?>><?=$tables?></option>
                  <?php
                } ?>
            </select>
            <button>Select</button>
</form>
                <form class="update" action="index.php?table=<?=$table2?>" method="post">
                <?php 
                $query = "SELECT * FROM {$table2}";
                $result = mysqli_query($connection, $query);
                if(!$result){
                    die('Computer says no');
                    
                };
                
                while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $exercise = $row['Exercise'];
    $reps = $row['Reps'];
    $weight = $row['Weight'];
    $notes = $row['Notes'];
    ?>
       <select name="id">
            <?= "<option value='$id'>$id</option>"?>
        </select>
        <input class="textfield" type="text"  value="<?= $exercise ?>"  name="exercise" /> 
        <input class="textfield" type="text"  value="<?= $reps ?>"  name="reps" />
        <input class="textfield" type="text"  value="<?= $weight ?>"  name="weight" />
        <input class="textfield" type="text"  value="<?= $notes ?>"  name="notes" />
         <input class="inputButton" type="submit" name="update" value="Update">
         <input class="inputButton" type="submit" name="delete" value="Delete">
    </form>
    <?php } ?> 
</div>

 </div>
</body>
</html>