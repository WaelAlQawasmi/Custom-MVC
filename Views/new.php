<h1> Creat new  prdact </h1>
    <form action="<?php isset($prodact)? "update/$prodact[id]": "create" ?>" method="post">
        <label> prodact name </label>
        <input type="text" name="name"  value="<?= $prodact['name']??''?>" id="">
        <button type="submit">submit</button>
    </form>
</body>
</html>