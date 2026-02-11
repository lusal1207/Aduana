<?php
    $motivo=$_REQUEST['motivo']??"";
    if($motivo!=""){
        $sql="insert into motivo(MOTIVO) values('".$motivo."')";
        //echo $sql;
        $c_g_motivo = $aduana->query($sql);
        if($c_g_motivo){
            echo "<script>alert('Motivo registrado');</script>";
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
    Nuevo Motivo
</div>
<div>
    <table>
        <tr>
            <td>
                Motivo
            </td>
            <td>
                <input type="text" name="motivo" required  autocomplete="off">
            </td>
        
            <td colspan="2" style="text-align: center;">
                <input type="hidden" name="menu" value="nmotivo">
                <button class="btn-guardar">Guardar</button>
            </td>
        </tr>
    </table>
</div>