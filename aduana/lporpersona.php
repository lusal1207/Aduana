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
    busqueda de la persona
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
    <input type="hidden" name="menu" value="lporpersona">
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
                    
                </tr>
            <?php } ?>
            
    </tbody>
</table>
</center>
</div>
<?php
}  ?>