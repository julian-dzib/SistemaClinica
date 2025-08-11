<?php

//Comunicacion con el controlador de la API
require_once "../app/Controllers/PattienController.php";

//Evitamoos problemas de CORS
//* - de cualquier origen permitido
header("Access-Control-Allow-Origin: *");
//El formato que se va a utilizar, problemas de escritura 
header("Content-Type: application/json; charset=UTF-8");


//Definir mis variables de entorno, para saber que metodo se esta utilizando CRUD
$method = $_SERVER["REQUEST_METHOD"];
$pattientController = new PattienController();

switch($method){
    case "POST":
        $pattientController->create();    
        break;
    case "GET":
        $pattientController->read();
        break;
    case "GET_ID":
        $pattientController->read($curp);
        break;
    case "PUT":
        $pattientController->update();
        break;
    case "DELETE":
        $pattientController->delete();  
        break;
    default:
        //Mandar un mensaje de error si el metodo no es valido
        http_response_code(405);
        echo json_encode(
            [
                "message"=>"El metodo no es valido, por favor utiliza POST, GET, PUT o DELETE."
            ]
        );
        break;

}