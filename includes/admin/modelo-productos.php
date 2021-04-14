<?php
error_reporting(E_ALL ^ E_NOTICE);
/* Crear productos y mandar ifo a la BD */
include_once "functions/funciones.php";
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$url_foto = $_POST['url_foto'];
$id_registroEditar = $_POST["id_registro"];

if($_POST['registro'] == 'nuevo') {
    
    /*Comprobar si se esta mandado los datos de file y de post
    $respuesta = array(
        'post' => $_POST,
        'file' => $_FILES
    );
    die(json_encode($respuesta));
    CHECAR VIDEO 777
    */
    $directorio = "../../assets/images/";
    if(!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se cargo correctamente";
    } else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    try {
        include_once "functions/funciones.php";
        $stmt = $con->prepare("INSERT INTO productos (nombre, precio, nombre_cat, url_foto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $precio, $categoria, $imagen_url);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if ($stmt->affected_rows){
            $respuesta=array(
                'respuesta'=>'exito',
                'id_producto'=>$id_insertado,
                'resultado_imagen' => $imagen_resultado
            );
        }else{
            $respuesta=array(
                'respuesta'=>'Error'
            );
        }
        $stmt->close();
        $con->close();
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
    die(json_encode($respuesta));
}


/*Actualizar Registro de usuario */
if($_POST['registro'] == 'actualizar') {
    
    $directorio = "../../assets/images/";
    if(!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se cargo correctamente";

    } 
    try {
        if($_FILES['archivo_imagen']['size' > 0]) {
            //con imagen
            $stmt = $con->prepare("UPDATE productos SET nombre = ?, precio = ?, nombre_cat = ?, url_foto = ?, WHERE id_pro = ?");
            $stmt->bind_param("ssisi", $nombre, $precio, $categoria, $url_foto, $id_registroEditar);
        } else {
            //sin imagen
            $stmt = $con->prepare("UPDATE productos SET nombre = ?, precio = ?, nombre_cat = ? WHERE id_pro = ?");
            $stmt->bind_param("ssii", $nombre, $precio, $categoria, $id_registroEditar);
        }
        $estado = $stmt->execute();
        if($estado == true) {
            $respuesta = array(
                'respuesta' => 'actualizar',
                'actualizar' => $id_registroEditar
            );
        } else {
            $respuesta + array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $con->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

/*Eliminar usuario */
if($_POST['registro'] == 'eliminar') { 
    $id_borrar = $_POST['id'];
    try {
        $stmt = $con->prepare("DELETE FROM productos WHERE id_pro = ?");
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}