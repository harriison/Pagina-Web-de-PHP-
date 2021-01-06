<div class="margenAbajo" style="color: red; text-align:center; font-size:small;">
    <?php
    if (!empty($_SESSION["error"])) {
        echo $_SESSION["error"];
        echo " <br>";
    }
    unset($_SESSION["error"]);
    ?>
</div>
<div style='color: green; text-align:center; font-size:small;'>
    <?php
    if (!empty($_SESSION["exito"])) {
        echo $_SESSION["exito"];
        echo " <br>";
    }
    unset($_SESSION["exito"]);
    ?>
</div>