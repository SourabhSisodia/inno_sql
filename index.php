<?php
include "connection.php";
include "queries.php";
$query = new Queries($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sql Tasks</title>
</head>

<body>

  <p>Q1</p>
  <?php $query->query1(); ?>
  <p>Q2</p>
  <?php $query->query2(); ?>
  <p>Q3</p>
  <?php $query->query3(); ?>
  <p>Q4</p>
  <?php $query->query4(); ?>
  <p>Q5</p>
  <?php $query->query5(); ?>
  <p>Q6</p>
  <?php $query->query6(); ?>

</body>

</html>