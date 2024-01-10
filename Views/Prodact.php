<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Prodacts</title>
</head>
<body>
  <h1>
    <?php 
   echo "<h1>$prodact[name]</h1>";
   echo "<a href=\"$prodact[id]/edit/\"> edit </a>";

    ?>

  </h1> 
</body>
</html>