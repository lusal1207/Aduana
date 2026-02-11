<div style="width:auto;height:20px;background-color:red;">
    <?php include "menu.php"; ?>
</div>
<div style="width:auto;height:auto;">
    <form method="post" action="index.php">
    <?php
        include "conexion.php"; 
        $menu=$_REQUEST['menu']??"inicio";
        include "$menu.php";
    ?>
    </form>
</div>