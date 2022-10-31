<?php
require_once '../config/connection.php';
require_once '../domain/persona.dto.php';
require 'persona.dao.interface.php';

final class PersonaDAO implements IPersonaDAO {

    private const SELECT_ALL = 'SELECT id_persona, pnombre_persona, snombre_persona, appaterno_persona, apmaterno_persona, email_persona, edad_persona FROM persona;';
    private const SELECT_BY_ID = 'SELECT id_persona, pnombre_persona, snombre_persona, appaterno_persona, apmaterno_persona, email_persona, edad_persona FROM persona WHERE id_persona = :id;';
    private const INSERT = 'INSERT INTO persona (pnombre_persona, snombre_persona, appaterno_persona, apmaterno_persona, email_persona, edad_persona) VALUES (:pnombre, :snombre, :appaterno, :apmaterno, :email, :edad);';
    private const UPDATE = 'UPDATE persona SET pnombre_persona = :pnombre, snombre_persona = :snombre, appaterno_persona = :appaterno, apmaterno_persona = :apmaterno, email_persona = :email, edad_persona = :edad WHERE id_persona = :id;';
    private const DELETE = 'DELETE FROM persona WHERE id_persona = :id;';
    
    public static function selectAll(): array {
        try {
            
            $connection = Connection::getConnection();
            $statement = $connection->prepare(self::SELECT_ALL);
            
            $statement->execute();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            
            $personArray = array();
            
            foreach ($result as $person) {
                $obj =  new Persona();

                $obj->setId($person['id_persona'])
                    ->setPnombre($person['pnombre_persona'])
                    ->setSnombre($person['snombre_persona'])
                    ->setAppaterno($person['appaterno_persona'])
                    ->setApmaterno($person['apmaterno_persona'])
                    ->setEmail($person['email_persona'])
                    ->setEdad($person['edad_persona']);

                array_push($personArray, $obj);
            }

            return $personArray;

        } catch (PDOException $th) {

            echo $th->getMessage();
        } 
    }

    public static function selectByID(Persona $persona): Persona {
        
        try {
            
            $connection = Connection::getConnection();
            $statement = $connection->prepare(self::SELECT_BY_ID);

            $statement->bindParam(":id", $persona->getId(), PDO::PARAM_INT);

            $statement->execute();

            $result = $statement->fetch();

            $obj =  new Persona();

            $obj->setId($result['id_persona'])
                ->setPnombre($result['pnombre_persona'])
                ->setSnombre($result['snombre_persona'])
                ->setAppaterno($result['appaterno_persona'])
                ->setApmaterno($result['apmaterno_persona'])
                ->setEmail($result['email_persona'])
                ->setEdad($result['edad_persona']);

            return $obj;

        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public static function insert(Persona $persona): bool {
        try {
            
            $connection = Connection::getConnection();
            $statement = $connection->prepare(self::INSERT);

            $statement->bindParam(':pnombre', $persona->getPnombre(), PDO::PARAM_STR);
            $statement->bindParam(':snombre', $persona->getSnombre(), PDO::PARAM_STR);
            $statement->bindParam(':appaterno', $persona->getAppaterno(), PDO::PARAM_STR);
            $statement->bindParam(':apmaterno', $persona->getApmaterno(), PDO::PARAM_STR);
            $statement->bindParam(':email', $persona->getEmail(), PDO::PARAM_STR);
            $statement->bindParam(':edad', $persona->getEdad(), PDO::PARAM_INT);

            $statement->execute();

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
    }

    public static function update(Persona $persona): bool {

        try {
            
            $connection = Connection::getConnection();
            $statement = $connection->prepare(self::UPDATE);

            $statement->bindParam(':pnombre', $persona->getPnombre(), PDO::PARAM_STR);
            $statement->bindParam(':snombre', $persona->getSnombre(), PDO::PARAM_STR);
            $statement->bindParam(':appaterno', $persona->getAppaterno(), PDO::PARAM_STR);
            $statement->bindParam(':apmaterno', $persona->getApmaterno(), PDO::PARAM_STR);
            $statement->bindParam(':email', $persona->getEmail(), PDO::PARAM_STR);
            $statement->bindParam(':edad', $persona->getEdad(), PDO::PARAM_INT);
            $statement->bindParam(':id', $persona->getId(), PDO::PARAM_INT);

            $statement->execute();

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }
        
    }

    public static function delete(Persona $persona): bool {

        try {
            
            $connection = Connection::getConnection();
            $statement = $connection->prepare(self::DELETE);

            $statement->bindParam(':id', $persona->getId(), PDO::PARAM_INT);
            
            $statement->execute();

            return true;

        } catch (PDOException $e) {

            echo $e->getMessage();
            return false;
        }

    }
}
?>