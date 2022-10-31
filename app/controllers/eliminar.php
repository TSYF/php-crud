<?php
require_once '../config/cors.php';
require_once '../domain/persona.dto.php';
require_once '../models/persona.dao.php';

cors();

$persona = new Persona();

$persona->setId((int)$_POST["id"]);

PersonaDAO::delete($persona);

echo json_encode($persona);