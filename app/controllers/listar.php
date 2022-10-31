<?php
require_once '../config/cors.php';
require_once '../models/persona.dao.php';

cors();

echo json_encode(PersonaDAO::selectAll());