<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Prodacts</title>
</head>
<body>
  <h1>
    <?php  foreach ($Prodacts as $key => $value): ?>
    <h1>{{ value[name] }}</h1>
    <a href="{{ value[id] }}/show"> show </a>

  
    <?php endforeach; ?>
   prodacts      8888
  </h1> 
</body>
</html>