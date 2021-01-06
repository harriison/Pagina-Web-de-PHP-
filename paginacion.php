<nav class="margenArriba" aria-label="...">
    <ul class="pagination justify-content-center">
        <?php
        $cantPaginas = $cantTotal / 10;
        for ($i = 0; $i < $cantPaginas; $i++) {
            if (!empty($_GET["pag"]) and ($_GET['pag']) == $i) {
                echo "<li class='page-item disabled'><a class='page-link' href='" . $direccion . "pag=" . $i . "'>" . $i . "</a></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='" . $direccion . "pag=" . $i . "'>" . $i . "</a></li>";
            }
        }
        ?>
    </ul>
</nav>