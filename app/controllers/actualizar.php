<?php
require_once '../config/cors.php';
require_once '../domain/persona.dto.php';
require_once '../models/persona.dao.php';

cors();

$persona = new Persona();

$persona
    ->setId($_POST["id"])
    ->setPnombre($_POST["pnombre"])
    ->setSnombre($_POST["snombre"])
    ->setAppaterno($_POST["appaterno"])
    ->setApmaterno($_POST["apmaterno"])
    ->setEmail($_POST["email"])
    ->setEdad($_POST["edad"]);

echo json_encode(PersonaDAO::update($persona));