CREATE TABLE persona (
    id_persona SERIAL NOT NULL,
    pnombre_persona CHARACTER VARYING(25) NOT NULL,
    snombre_persona CHARACTER VARYING(25) NULL,
    appaterno_persona CHARACTER VARYING(25) NOT NULL,
    apmaterno_persona CHARACTER VARYING(25) NULL,
    email_persona CHARACTER VARYING(100) NOT NULL,
    edad_persona INTEGER NOT NULL,
    
    PRIMARY KEY (id_persona)
);

SELECT
    pnombre_persona
    || ' ' ||
    snombre_persona
    || ' ' ||
    appaterno_persona
    || ' ' ||
    apmaterno_persona "NOMBRE",
    email_persona "EMAIL",
    edad_persona "EDAD"
FROM persona;