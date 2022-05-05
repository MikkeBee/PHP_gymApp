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

  if (isset($_POST['create'])) {
    $newtable = $_POST['newTable'];
    $query = "CREATE TABLE `$newtable` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Exercise TEXT,
        Reps TEXT,
        Weight TEXT,
        Notes TEXT
        )";
        
        $result = mysqli_query($connection, $query);
    if (!$result) {
      die("Creation is not existant" . mysqli_error($connection));
    }
  }
  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Racing+Sans+One&family=Staatliches&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/06ae1c778f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index.css">
    <title>Workout Tracker</title>
</head>
<body>
    <div class="overlay">
  <header>
<h1> <i class="fa-solid fa-dumbbell"></i>  Gainz Trackr  <i class="fa-solid fa-dumbbell"></i></h1>
</header>
    <div class="container1">
    <form class="getter" action="index.php?table=<?=$table2?>" method="GET">
    <button>Select your workout</button>
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
            
</form>
<form action="index.php" method="POST" class="createForm">
<p>Can't find what you're looking for? Add a new workout programme!</p>
<div>
<input type="text" id="newTable" name="newTable" placeholder="Enter name"></input>
<button type="submit" name="create" class="btn">Add it!</button>
</div>
</form>
          <form action="index.php?table=<?=$table2?>" method="POST" class="postForm">
          <p>Need to add an exercise? Do it here!</p>
          <div class="posterInputs">
            <input type="text"
                id="exercise"
                name="exercise" placeholder="exercise"></input>
                <input type="text"
                id="reps"
                name="reps" placeholder="reps"></input>
                <input type="text"
                id="weight"
                name="weight" placeholder="weight"></input>
                <input type="text"
                id="notes"
                name="notes" placeholder="notes"></input>
            </div>
              <button type="submit" name="submit" class="btn">Add it!</button>
            
          </form>
    </div>


    


<div class="workouts">
<p class="title">Your workout: <?= $table2?></p>
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
   <form class="update" action="index.php?table=<?=$table2?>" method="post">

    <div class="innerSanctum">
       <select name="id" hidden>
            <?= "<option value='$id'>$id</option>"?>
        </select>
        <input class="textfield" type="text"  value="<?= $exercise ?>"  name="exercise" /> 
        <input class="textfield" type="text"  value="<?= $reps ?>"  name="reps" />
        <input class="textfield" type="text"  value="<?= $weight ?>"  name="weight" />
        <input class="textfield" type="text"  value="<?= $notes ?>"  name="notes" />
         <input class="inputButton" type="submit" name="update" value="Update">
         <input class="inputButton" type="submit" name="delete" value="Delete">
                </div>
    </form>
    <?php } ?> 
</div>
</div>
</body>
</html>