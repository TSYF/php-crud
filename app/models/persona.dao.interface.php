<?php
require_once '../domain/persona.dto.php';

interface IPersonaDAO {
    
    public static function selectAll(): array;

    public static function selectByID(Persona $id): Persona;

    public static function insert(Persona $id): bool;

    public static function update(Persona $persona): bool;
    
}