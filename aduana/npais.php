<?php
    $pais=$_REQUEST['nombre']??"";
    if($pais!=""){
        $sql="insert into pais(NOMBRE) values('".$pais."')";
        //echo $sql;
        $c_g_pais = $aduana->query($sql);
        if($c_g_pais){
            echo "<script>alert('País registrado');</script>";
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

<div class="titulo">
    Nuevo País
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
        
            <td colspan="2" style="text-align: center;">
                <input type="hidden" name="menu" value="npais">
                <button class="btn-guardar">Guardar</button>
            </td>
        </tr>
    </table>
</div>