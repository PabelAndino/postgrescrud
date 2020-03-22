<?php

require_once '../model/User.php';
$user = new User();


switch ($_GET["op"]){

    case 'showUsers':
        $fetch = $user->showList();

        echo '<thead style="background-color:#e3a100">
               <th>Opciones</th> 
                <th>ID</th> 
               <th>Nombres</th>
               <th>Descripcion</th>
               <th>Estado</th>
              </thead>
        ';
        while ($data = pg_fetch_object($fetch)){
            $state = "";
            $editarEstado = "";

            if($data->state == "Activado"){
                $state = '<span class="label bg-green">Activado</span>';
                $editarEstado = '<button class="btn btn-google" onclick="eliminar('.$data->iduser.')">Eliminar</button>';
            }else{
                $state = '<span class="label bg-red">Anulado</span>';
                $editarEstado = '<button class="btn btn-dark" onclick="restaurar('.$data->iduser.')">Restaurar</button>';
            }

            echo '<tr>
                    <td><button class="btn btn-flickr" onclick="editar('.$data->iduser.',\''.$data->name.'\',\''.$data->description.'\')">Editar</button> '.$editarEstado.' </td>
                     <td>'.$data->iduser. '</td>
                    <td>'.$data->name. '</td>
                    <td>'.$data->description.'</td>
                    <td>'.$state.'</td>

                </tr>';
        }
        break;

    case 'saveUsers':
        $idusario = $_POST['idusario'];
        $nombres = $_POST['nombres'];
        $descripcion = $_POST['descripcion'];


        if(empty($idusario)){
            $query = $user->saveUser($nombres,$descripcion);
            echo $query ? "Usario Guardado correctamente" : "No se pudo guardar el usuario";
        }else{
            $query = $user->editUser($idusario,$nombres,$descripcion);
            echo $query ? "Datos editados correctamente":"No se pudieron editar los datos";
        }


        break;

    case 'deleteUser':
        $idusario = $_POST['idusuario'];
        $query = $user->deleteUser($idusario);
        echo $query ? "Usuario Eliminado correctamente ": "No se pudo eliminar el Usario";

        break;

    case 'restoreUser':
        $idusario = $_POST['idusuario'];
        $query = $user->restoreUser($idusario);
        echo $query ? "Usuario Restaurado correctamente":"No se pudo restaurar el usario";

        break;

}


