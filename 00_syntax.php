<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  Hello World
  <?php
  echo "<br>";
  echo "From PHP";
  echo "<br>";


  $name = "Kevin";
  $age = 24;
  $isMale = true;
  $height = 1.75;
  $salary = null;
  echo $name;
  echo "<br>";
  echo $age . "<br>";
  echo $height . "<br>";
  echo "Is male: " . $isMale . "<br>";

  echo gettype($salary) . "<br>";

  function addTwo($age, $height)
  {
    echo $age * $height . "<br>";
  }
  addTwo($age, 10);

  for ($i = 30; $i >= $age; $i--) {
    echo "$i: $age" . "<br>";
  }





  ?>
  <!--Echo HTML tags-->
</body>

</html>