<head>
    <link rel="stylesheet"  href="css/style.css">
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
</head>
<?php
$dni = $_REQUEST['dni'] ?? "";
if($dni!=""){
    $sql_b_persona = "SELECT a.*, p.NOMBRE AS NOMBREPAIS FROM persona a
                    JOIN pais p ON a.pais = p.ID
                    WHERE a.DNI LIKE '%$dni%' 
                    ORDER BY a.DNI ASC";
                    
    $c_b_persona = $aduana->query($sql_b_persona);
}   
$persona = $_REQUEST['persona'] ?? "";
if($persona!=""){
   $sql_m_persona = "SELECT * FROM persona 
                    WHERE ID = $persona";
    $c_m_persona = $aduana->query($sql_m_persona);

}
?>
<div class="titulo">
    modificacion de la persona
</div>
<div>
   <table style=" border: 1px solid black;">
    <tr>
        <td>
            dni
        </td>
        <td>

            <input type="text" name="dni">        
        </td>
        <td>
            <button type="submit" class="btn" name="buscar" value="buscar" style=" background-color: rgba(88, 247, 88, 1);">buscar</button>
        </td>
    </tr>
   </table>
    <input type="hidden" name="menu" value="mpersona">
</div>

<?php
if($dni!=""){
?>
<div class="titulo">
    resultado de la busqueda
</div>
<div>
    <center>
   <table>
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                NOMBRE
            </th>
            <th>
                apellido
            </th>
            <th>
                fecha de nacimiento
            </th>
            <th>
                fecha de entrada
            </th>
            <th>
                fecha de salida
            </th>
            <th>
                pais de entrada
            </th>
            <th>
                pais de salida  
            </th>
              <th>
                motivo
            </th>
              <th>
                modificar
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($r_b_persona=$c_b_persona->fetch_assoc()){ ?>
                <tr>
                    <td>
                        <?php echo $r_b_persona['ID']; ?>
                    </td>
                    <td>
                         <?php echo $r_b_persona['NOMBRE']; ?>
                    </td>
                    <td>
                        <?php echo $r_b_persona['APELLIDO']; ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y',strtotime($r_b_persona['FECHA_NACIMIENTO'])); ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y',strtotime($r_b_persona['FECHA_ENTRADA'])); ?>
                    </td>
                    <td>
                        <?php echo date('d-m-Y',strtotime($r_b_persona['FECHA_SALIDA'])); ?>
                    </td>
                    <td>
                        <?php echo $r_b_persona['PAIS_ENTRADA']; ?>
                    </td>
                    <td>
                        <?php echo $r_b_persona['PAIS_SALIDA']; ?>
                    </td>
                    <td>
                        <?php echo $r_b_persona['PAIS']; ?>
                    </td>
                    <td>
                        <button type="submit" name="persona" value="<?php echo $r_b_persona['ID']; ?>">modificar</button>
                        
                    </td>
                </tr>
            <?php } ?>
            
    </tbody>
</table>
</center>
</div>
<?php
}

if($persona!=""){
   $r_m_persona = $c_m_persona->fetch_assoc();
?>
<div class="titulo">
    MODIFICAR PERSONA
</div>
<div>
    <table>
        <tr>
            <td>
                Nombre
            </td>
            <td>
                <input type="text" name="nombre" value="<?php echo $r_m_persona['NOMBRE']; ?>" required  autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Apellido
            </td>
            <td>
                <input type="text" name="apellido"  value="<?php echo $r_m_persona['APELLIDO']; ?>" required  autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Fecha de Nacimiento
            </td>
            <td>
               <input type="date" name="fecha_nacimiento"  value="<?php echo $r_m_persona['FECHA_NACIMIENTO']; ?>" required  autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Fecha de entrada
            </td>
            <td>
               <input type="date" name="fecha_entrada"  value="<?php echo $r_m_persona['FECHA_ENTRADA']; ?>" required  autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Fecha de salida
            </td>
            <td>
                <input type="date" name="fecha_salida"  value="<?php echo $r_m_persona['FECHA_SALIDA']; ?>"autocomplete="off">
            </td>
        </tr>
        <tr>
            <td>
                Pais de Origen
            </td>
            <td>
                <?php
                    $sql="SELECT * FROM pais ORDER BY NOMBRE ASC";
                    $c_pais = $aduana->query($sql);
                ?>
                    <select name="pais" required>
                    <?php
                        while($r_pais = $c_pais->fetch_assoc()){ ?>
                            <option value="<?php echo $r_pais['ID']; ?>" <?php if($r_pais['ID']==$r_m_persona['PAIS']){ echo "selected";} ?>><?php echo $r_pais['NOMBRE']; ?></option>
                    <?php
                        }
                    ?>          
                </select>
            </td>
        </tr>
    </table>
<input type="hidden" name="menu" value="npersona">


<button type="submit" class="btn" name="guardar" value="guardar">guardar</button>

<?php } ?>