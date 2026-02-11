<?php
    $nombre=$_REQUEST['nombre']??"";
    $apellido=$_REQUEST['apellido']??"";
    $fecha_nacimiento=$_REQUEST['fecha_nacimiento']??"";
    $fecha_entrada=$_REQUEST['fecha_entrada']??"";
    $fecha_salida=$_REQUEST['fecha_salida']??"";
    $pais_entrada=$_REQUEST['pais_entrada']??"";
    $pais_salida=$_REQUEST['pais_salida']??"";
    $pais=$_REQUEST['pais']??"";
    $dni=$_REQUEST['dni']??"";
    $motivo=$_REQUEST['motivo']??"";
    
    if($nombre!="" && $apellido!="" && $fecha_nacimiento!="" && $dni!="" && $pais_entrada!="Seleccione un pais" && $pais !="Seleccione un pais" && $fecha_entrada!="" && $motivo!="" ){
        $sql="insert into persona (NOMBRE, APELLIDO, FECHA_NACIMIENTO, FECHA_ENTRADA, MOTIVO, PAIS, PAIS_ENTRADA, DNI, FECHA_SALIDA, PAIS_SALIDA) VALUES('".$nombre."', '".$apellido."', '".$fecha_nacimiento."', '".$fecha_entrada."','".$motivo."','".$pais."','".$pais_entrada."','".$dni."',";
        if($fecha_salida==""){
            $sql.="NULL, ";
                if($pais_salida==""){
                   $sql.=", NULL ";
                }else{
                   $sql.=", '".$pais_salida."' ";
                  }
        }else{
            $sql.="'".$fecha_salida."', ";
            if($pais_salida=="seleccione un pais"){
                   $sql.=", NULL ";
                }else{ 
                   $sql.=" '".$pais_salida."'";
                  }
        }
        $sql.=")";
        echo $sql;
        $c_g_persona = $aduana->query($sql);
        if($c_g_persona){
            echo "<script>alert('Persona registrada');</script>";
        }else{
            echo "<script>alert('Error al registrar');</script>";
        }
    } 
    ?>
    <style>
    table {
        border: 1px solid black; 
        width: 100%; 
        font-family: Arial, sans-serif; 
        margin-bottom: 20px;     }
    
    th, td {
        border: 1px solid rgba(221, 221, 221, 1); 
        padding: 12px; 
        text-align: left; 
    }
    th {
        background-color: rgba(242, 242, 242, 1); 
        color: #333;
    }
    tbody tr:hover {
        background-color: rgba(241, 241, 241, 1);
        
    }
    </style>
<form action="npersona.php" method="post">
<div class="titulo">
    Nueva Persona
</div>
<div>
    <table>
        <tr>
            <td>
                Nombre
            </td>
            <td>
                <input type="text" name="nombre" required  autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Apellido
            </td>
            <td>
                <input type="text" name="apellido" required  autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Fecha de Nacimiento
            </td>
            <td>
                <input type="date" name="fecha_nacimiento" required  autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Fecha de entrada
            </td>
            <td>
                <input type="date" name="fecha_entrada" required  autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Fecha de salida
            </td>
            <td>
                <input type="date" name="fecha_salida" autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Motivo
            </td>
            <td>
                <?php
                    $sql="SELECT * FROM motivo ORDER BY MOTIVO ASC";
                    $c_motivo = $aduana->query($sql);
                ?>
                    <select name="motivo" required>
                        <option value="">Seleccione un motivo</option>
                    <?php
                        
                        while($r_motivo = $c_motivo->fetch_assoc()){ ?>
                        
                            <option value="<?php echo $r_motivo['ID']; ?>"><?php echo $r_motivo['MOTIVO']; ?></option>
                    <?php
                        }
                    ?>          
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Pais de entrada
            </td>
            <td>
                <?php
                    $sql="SELECT * FROM pais ORDER BY ID ASC";
                    $c_pais = $aduana->query($sql);
                ?>
                    <select name="pais_entrada" required>
                         <option value="">seleccione un pais</option>
                    <?php
                        
                        while($r_pais = $c_pais->fetch_assoc()){ ?>
                             
                            <option value="<?php echo $r_pais['ID']; ?>"><?php echo $r_pais['NOMBRE']; ?></option>
                    <?php
                        } 
                    ?>          
                </select> 
            </td>
        </tr>
        <tr>
            <td>
                pais de salida
            </td>
            <td>
                <?php
                    $sql="SELECT * FROM pais ORDER BY ID ASC";
                    $c_pais = $aduana->query($sql);
                ?>
                    <select name="pais_salida" >
                        <option value="0">Seleccione un pais</option>
                    <?php
                        while($r_pais = $c_pais->fetch_assoc()){ ?>
                             
                            <option value="<?php echo $r_pais['ID']; ?>"><?php echo $r_pais['NOMBRE']; ?></option>
                    <?php
                        }
                    ?>          
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Pais de Origen
            </td>
            <td>
                <?php
                    $sql="SELECT * FROM pais ORDER BY ID ASC";
                    $c_pais = $aduana->query($sql);
                ?>
                    <select name="pais" required>
                         <option value="">seleccione un pais</option>
                    <?php
                    if($r_pais['ID']=="1"){
                            echo "<option value='' selected>Seleccione un país</option>";
                        }else{
                        while($r_pais = $c_pais->fetch_assoc()){ ?>
                           
                            <option value="<?php echo $r_pais['ID']; ?>"><?php echo $r_pais['NOMBRE']; ?></option>
                    <?php
                        } }
                    ?>          
                </select>
            </td>
        </tr>
        <tr>
            <td>
                DNI
            </td>
            <td>
                <input type="text" name="dni" required  autocomplete="off">
            </td>
        </tr>
    </table>
<input type="hidden" name="menu" value="npersona">


<button type="submit" class="btn" name="guardar" value="guardar">guardar</button>

</form>






