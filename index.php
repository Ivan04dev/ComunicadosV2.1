<?php
    include "conexion.php"; 
    include "helpers.php"; 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunicados V2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <h1 class="display-4">Comunicados</h1>
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <label for="titulo">Titulo: </label>
                <input class="form-control mb-4" type="text" placeholder="PRUEBA" id="titulo" name="titulo">

                <label for="descripcion">Descripción: </label>
                <input class="form-control mb-4" type="text" placeholder="DESCRIBE EL CONTENIDO" id="descripcion" name="descripcion">

                <button class="btn btn-success" id="botonArchivo"><i class="bi bi-plus-circle"></i></button>
                <br><br>

                <label for="portada">Portada</label>
                <input type="file" name="portada" id="portada">

                <div class="mt-4" id="contenedorArchivos">
                    <label for="archivos">Archivos</label> 
                    <input type="file" name="archivo">
                </div>
                
                <div id="contadorArchivos"></div>
                <div id="cantidadArchivos"></div>

                <br><br>


                <h3 for="enviarA">Enviar a:</h3>

                <br>
                
                <div class="mt-4">
                    <h5 for="puesto">Puesto: </h5> 
                    <input type="checkbox" name="puesto" id="ejecutivoATC" value="ejecutivoATC" onclick="handleCheckboxChange(this)">
                    <label for="ejecutivoATC">Ejecutivo ATC</label>

                    <input type="checkbox" name="puesto" id="ejecutivoSRATC" value="ejecutivoSRATC" onclick="handleCheckboxChange(this)">
                    <label for="ejecutivoSRATC">Ejecutivo Sr ATC</label>

                    <input type="checkbox" name="puesto" id="jefeATC" value="jefeATC" onclick="handleCheckboxChange(this)">
                    <label for="jefeATC">Jefe ATC</label>

                    <input type="checkbox" name="puesto" id="jefeRegionalATC" value="jefeRegionalATC" onclick="handleCheckboxChange(this)"">
                    <label for="jefeRegionalATC">Jefe Regional ATC</label>

                    <input type="checkbox" name="puesto" id="gerenteATC" value="gerenteATC" onclick="handleCheckboxChange(this)">
                    <label for="gerenteATC">Gerente ATC</label>
                </div>

                <!-- Marca -->
                <div class="mt-4">
                    <h5 for="puesto">Marca: </h5>

                    <input type="checkbox" name="marca" id="izzi" value="izzi" onclick="handleCheckboxChange(this)">
                    <label for="izzi">izzi</label>

                    <input type="checkbox" name="marca" id="wizz" value="wizz" onclick="handleCheckboxChange(this)">
                    <label for="wizz">wizz</label>

                    <input type="checkbox" name="marca" id="wizzplus" value="wizzplus" onclick="handleCheckboxChange(this)">
                    <label for="wizzplus">wizz plus</label>
                </div>

                <!-- Ver Ciudad -->
                <div class="mt-4">
                    <!-- <input type="checkbox" name="ciudades" id="ciudades"> -->
                    <input type="checkbox" name="ciudades" id="ckbCiudades">
                    <label for="ciudades">Ver Ciudades</label>
                </div>

               

                <!-- Divisiones -->
                <!-- <div class="row mt-4" id="divisiones" style="display: none;"> -->
                <div class="row mt-4" id="divDivisiones" style="display: none;">

                    <!-- DIVISION METRO -->
                    <div class="col-md-4">
                        <input type="checkbox" name="metro" id="ckbMetro">
                        <label for="divMetro">División Metro</label>
                        <!-- Muestra las divisiones de Metro (Norte y Sur) -->
                        <?php
                            $query = "SELECT DISTINCT  REGION FROM atc_sucursal WHERE DIVISION = 'Metro' ORDER BY REGION ASC";
                            $regiones = mysqli_query($conn, $query);
                        ?>
                            <div id="divRegionesMetro">
                                <?php while ($region = mysqli_fetch_assoc($regiones)) : ?>
                                    <p class="m-2"><?php echo $region['REGION']; ?></p>
                                <?php endwhile; ?>
                            </div>
                        <!-- Metro Norte -->
                        <?php
                                $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Metro Norte' ORDER BY SUCURSAL ASC";
                                $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                        <?php endwhile; ?>
                        <!-- Metro Sur -->
                        <?php
                                $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Metro Sur' ORDER BY SUCURSAL ASC";
                                $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                        <?php endwhile; ?>
                    </div> <!-- FIN DIVISION METRO -->

                    <!-- DIVISION SUR -->
                    <div class="col-md-4">
                        <!-- <input type="checkbox" name="sur" id="divSur"> -->
                        <input type="checkbox" name="sur" id="ckbSur">
                        <label for="divMetro">División Sur</label>
                        <!-- Muestra las divisionesde Metro (Golfo, Occidente y Sureste) -->
                        <?php
                            $query = "SELECT DISTINCT  REGION FROM atc_sucursal WHERE DIVISION = 'Sur' ORDER BY REGION ASC";
                            $regiones = mysqli_query($conn, $query); ?>
                            <div id="divRegionesSur">
                                <?php while ($region = mysqli_fetch_assoc($regiones)) : ?>
                                    <p class="m-2"><?php echo $region['REGION']; ?></p>
                                <?php endwhile; ?>
                            </div>
                        <!-- Golfo -->
                        <?php
                                $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Golfo' ORDER BY SUCURSAL ASC";
                                $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                        <?php endwhile; ?>
                        <!-- Occidente -->
                        <?php
                                $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Occidente' ORDER BY SUCURSAL ASC";
                                $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                        <?php endwhile; ?>
                        <!-- Sureste -->
                        <?php
                                $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Sureste' ORDER BY SUCURSAL ASC";
                                $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                        <?php endwhile; ?>
                    </div>

                    <!-- DIVISION NORTE -->
                    <div class="col-md-4">
                        <!-- <input type="checkbox" name="sur" id="ckbSur" -->
                        <input type="checkbox" name="norte" id="ckbNorte">
                            <label for="divMetro">División Norte</label>
                            <!-- Muestra las divisionesde Metro (Centro, Noreste, Occidente, Pacifico) -->
                            <?php
                                $query = "SELECT DISTINCT  REGION FROM atc_sucursal WHERE DIVISION = 'Norte' ORDER BY REGION ASC";
                                $regiones = mysqli_query($conn, $query); ?>
                                <div id="divRegionesNorte">
                                    <?php while ($region = mysqli_fetch_assoc($regiones)) : ?>
                                        <p class="m-2"><?php echo $region['REGION']; ?></p>
                                    <?php endwhile; ?>
                                </div>
                            <!-- Centro -->
                            <?php
                                    $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Centro' ORDER BY SUCURSAL ASC";
                                    $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                            <?php endwhile; ?>
                            <!-- Noreste -->
                            <?php
                                    $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Noreste' ORDER BY SUCURSAL ASC";
                                    $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                            <?php endwhile; ?>
                            <!-- Occidente -->
                            <?php
                                    $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Occidente' ORDER BY SUCURSAL ASC";
                                    $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                            <?php endwhile; ?>
                            <!-- Pacifico -->
                            <?php
                                    $query = "SELECT DISTINCT  SUCURSAL FROM atc_sucursal WHERE REGION = 'Pacifico' ORDER BY SUCURSAL ASC";
                                    $sucursales = mysqli_query($conn, $query);
                                while ($sucursal = mysqli_fetch_assoc($sucursales)) : ?>
                                    <p class="m-2"><?php echo $sucursal['SUCURSAL']; ?></p>
                            <?php endwhile; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>   
    <script src="js/app.js"></script>
    <!-- <script src="js/app2.js"></script> -->
    <!-- <script src="js/ap3.js"></script> -->
</body>
</html>