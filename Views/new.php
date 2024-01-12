<h1> Creat new  prdact </h1>
    <form action="<?php  echo isset($prodact)?  "update": "create" ?>" method="post">
        <label> prodact name </label>
        <input type="text" name="name"  value="<?= $prodact['name']??''?>" id="">
        <button type="submit">submit</button>
    </form>
</body>
</html>