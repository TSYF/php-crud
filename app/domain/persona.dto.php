<?php
// DTO for Persona
final class Persona implements JsonSerializable {

    //* ATTRS
    private int $id;
    private string $pnombre;
    private string | null $snombre;
    private string $appaterno;
    private string | null $apmaterno;
    private string $email;
    private string $edad;

    //* CONTSRUCTOR

    public function _construct() {}


    //* IMPLEMENTATIONS

    public function jsonSerialize(): mixed {
        $arr = array();

        if (isset($this->id)) $arr["id"] = $this->id;
        if (isset($this->pnombre)) $arr["pnombre"] = $this->pnombre;
        if (isset($this->snombre)) $arr["snombre"] = $this->snombre;
        if (isset($this->appaterno)) $arr["appaterno"] = $this->appaterno;
        if (isset($this->apmaterno)) $arr["apmaterno"] = $this->apmaterno;
        if (isset($this->email)) $arr["email"] = $this->email;
        if (isset($this->edad)) $arr["edad"] = $this->edad;
        
        return $arr;
    }


    //* GETTERS
    
    /**
     * Get the value of id
     */ 
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get the value of pnombre
     */ 
    public function getPnombre(): string {
        return $this->pnombre;
    }

    /**
     * Get the value of snombre
     */ 
    public function getSnombre(): string {
        return $this->snombre;
    }

    /**
     * Get the value of appaterno
     */ 
    public function getAppaterno(): string {
        return $this->appaterno;
    }

    /**
     * Get the value of apmaterno
     */ 
    public function getApmaterno(): string {
        return $this->apmaterno;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Get the value of edad
     */ 
    public function getEdad(): int {
        return $this->edad;
    }


    //* SETTERS

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of pnombre
     *
     * @return  self
     */ 
    public function setPnombre($pnombre) {
        $this->pnombre = $pnombre;

        return $this;
    }

    /**
     * Set the value of snombre
     *
     * @return  self
     */ 
    public function setSnombre($snombre) {
        $this->snombre = $snombre;

        return $this;
    }

    /**
     * Set the value of appaterno
     *
     * @return  self
     */ 
    public function setAppaterno($appaterno) {
        $this->appaterno = $appaterno;

        return $this;
    }

    /**
     * Set the value of apmaterno
     *
     * @return  self
     */ 
    public function setApmaterno($apmaterno) {
        $this->apmaterno = $apmaterno;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */ 
    public function setEdad($edad) {
        $this->edad = $edad;

        return $this;
    }
}