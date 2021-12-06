use midatabase;

DROP TABLE IF EXISTS pre_requ;
CREATE TABLE IF NOT EXISTS pre_requ (
        curso_id_1 INTEGER UNSIGNED NOT NULL,
        curso_id_2 INTEGER UNSIGNED NOT NULL,
        PRIMARY KEY (curso_id_1 , curso_id_2)
);

DROP TABLE IF EXISTS curso;
CREATE TABLE IF NOT EXISTS curso (
		curso_id INTEGER UNSIGNED NOT NULL,
        nombre VARCHAR(30),
        creditos INTEGER,
        depa_id INTEGER UNSIGNED NOT NULL
);

DROP TABLE IF EXISTS departamento;
CREATE TABLE IF NOT EXISTS departamento (
       depa_id INTEGER UNSIGNED NOT NULL,
       nombre VARCHAR(30)
);

ALTER TABLE departamento ADD PRIMARY KEY (depa_id);
ALTER TABLE departamento MODIFY depa_id INTEGER UNSIGNED AUTO_INCREMENT, AUTO_INCREMENT = 1;
ALTER TABLE curso ADD PRIMARY KEY (curso_id);
ALTER TABLE curso MODIFY curso_id INTEGER UNSIGNED AUTO_INCREMENT, AUTO_INCREMENT = 1;

ALTER TABLE curso ADD FOREIGN KEY (depa_id) REFERENCES departamento(depa_id);
ALTER TABLE pre_requ ADD FOREIGN KEY (curso_id_1) REFERENCES curso(curso_id)
		ON DELETE CASCADE
        ON UPDATE CASCADE;
ALTER TABLE pre_requ ADD FOREIGN KEY (curso_id_2) REFERENCES curso(curso_id)
		ON DELETE CASCADE
        ON UPDATE CASCADE;


DELIMITER //
DROP PROCEDURE IF EXISTS insertar_curso //
CREATE PROCEDURE insertar_curso (IN nom VARCHAR(30) , IN cred INTEGER , IN dep_id INTEGER) 
BEGIN
    DECLARE ID INTEGER;
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN 
		GET DIAGNOSTICS CONDITION 1 @sqlsate = RETURNED_SQLSTATE,  @error_string = MESSAGE_TEXT;
		SELECT @error_string;
        ROLLBACK;
    END; 
		START TRANSACTION;	
		 IF (SELECT COUNT(*) FROM curso WHERE nombre = nom) = 0 THEN
		   INSERT INTO curso (curso_id , nombre , creditos , depa_id) VALUES (NULL , nom , cred , dep_id);  
		 ELSE
           SET ID = (SELECT curso_id FROM curso WHERE nombre = nom);
           SELECT ID;
           UPDATE curso SET nombre = nom , creditos = cred , depa_id = dep_id WHERE curso_id = ID;
        END IF;
        COMMIT; 
END;
//
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS insertar_pre_reque //
CREATE PROCEDURE  insertar_pre_reque (IN curs_1 INTEGER , IN curs_2 INTEGER) 
BEGIN
	DECLARE exist1 INTEGER; 
    DECLARE exist2 INTEGER;
    DECLARE existr INTEGER; 
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN 
		GET DIAGNOSTICS CONDITION 1 @sqlsate = RETURNED_SQLSTATE,  @error_string = MESSAGE_TEXT;
		SELECT @error_string;
        ROLLBACK;
    END; 
		START TRANSACTION;	
		 SET exist1 =  (SELECT COUNT(*) FROM curso WHERE curso_id = curs_1);
         SET exist2 = (SELECT COUNT(*) FROM curso WHERE curso_id = curs_2);
         SET existr = (SELECT COUNT(*) FROM pre_requ WHERE curso_id_1 = curs_1 AND curso_id_2 = curs_2);
		 IF exist1 > 0 AND exist2 > 0 THEN
           IF (existr = 0) THEN
		       INSERT INTO pre_requ (curso_id_1 , curso_id_2) VALUES (curs_1,curs_2);  
		   END IF;
         END IF;
        COMMIT; 
END;
//
DELIMITER ;





