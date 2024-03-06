<?php
    function ejecutarConsulta($consulta){
        // $query = "SELECT DISTINCT  REGION FROM atc_sucursal WHERE DIVISION = 'Metro' ORDER BY REGION ASC";
        $query = $consulta;
        $resultados = mysqli_query($conn, $query);
        while ($resultado = mysqli_fetch_assoc($resultados)){
            // <p class="m-2"><?php echo $resultado['REGION'];
            echo "<p>".$resultado['REGION']."</p>"."<br/>";
        }
    }