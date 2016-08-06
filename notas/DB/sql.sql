
-- 
-- TABLE: actividad 
--

CREATE TABLE actividad(
    id_actividad    INT          AUTO_INCREMENT,
    actividad       CHAR(200),
    fecha           CHAR(100),
    estado          INT,
    borrado         INT,
    id_curso        INT          NOT NULL,
    PRIMARY KEY (id_actividad)
)ENGINE=MYISAM
;



-- 
-- TABLE: alumno 
--

CREATE TABLE alumno(
    id_alumno    INT               AUTO_INCREMENT,
    nombre       CHAR(100),
    ci           DECIMAL(10, 0),
    telefono     DECIMAL(10, 0),
    direccion    CHAR(100),
    borrado      INT,
    usuario      CHAR(100),
    password     CHAR(100),
    PRIMARY KEY (id_alumno)
)ENGINE=MYISAM
;



-- 
-- TABLE: alumno_materia 
--

CREATE TABLE alumno_materia(
    id_alumno_materia    INT    AUTO_INCREMENT,
    id_alumno            INT    NOT NULL,
    id_materia           INT    NOT NULL,
    anho                 INT,
    calificacion         INT,
    borrado              INT,
    id_inscripcion       INT    NOT NULL,
    PRIMARY KEY (id_alumno_materia)
)ENGINE=MYISAM
;



-- 
-- TABLE: alumno_unidades 
--

CREATE TABLE alumno_unidades(
    id_alumno_unidad     INT    AUTO_INCREMENT,
    id_alumno            INT    NOT NULL,
    id_nivel_unidades    INT    NOT NULL,
    anho                 INT,
    calificacion         INT,
    borrado              INT,
    id_inscripcion       INT    NOT NULL,
    PRIMARY KEY (id_alumno_unidad)
)ENGINE=MYISAM
;



-- 
-- TABLE: curso 
--

CREATE TABLE curso(
    id_curso    INT          AUTO_INCREMENT,
    curso       CHAR(100),
    borrado     INT,
    PRIMARY KEY (id_curso)
)ENGINE=MYISAM
;



-- 
-- TABLE: evento 
--

CREATE TABLE evento(
    in_evento    INT          AUTO_INCREMENT,
    evento       CHAR(255),
    fecha        CHAR(100),
    hora         CHAR(10),
    PRIMARY KEY (in_evento)
)ENGINE=MYISAM
;



-- 
-- TABLE: inscripcion 
--

CREATE TABLE inscripcion(
    id_inscripcion    INT         AUTO_INCREMENT,
    id_alumno         INT         NOT NULL,
    id_curso          INT,
    id_nivel          INT,
    fecha             CHAR(10),
    tipo              INT,
    borrado           INT,
    PRIMARY KEY (id_inscripcion)
)ENGINE=MYISAM
;



-- 
-- TABLE: materia 
--

CREATE TABLE materia(
    id_materia    INT          AUTO_INCREMENT,
    nombre        CHAR(100),
    id_curso      INT          NOT NULL,
    borrado       INT,
    PRIMARY KEY (id_materia)
)ENGINE=MYISAM
;



-- 
-- TABLE: nivel 
--

CREATE TABLE nivel(
    id_nivel    INT          AUTO_INCREMENT,
    nivel       CHAR(100),
    borrado     INT,
    PRIMARY KEY (id_nivel)
)ENGINE=MYISAM
;



-- 
-- TABLE: nivel_unidades 
--

CREATE TABLE nivel_unidades(
    id_nivel_unidades    INT          AUTO_INCREMENT,
    id_nivel             INT          NOT NULL,
    unidades             CHAR(100),
    borrado              INT,
    PRIMARY KEY (id_nivel_unidades)
)ENGINE=MYISAM
;



-- 
-- TABLE: usuario 
--

CREATE TABLE usuario(
    id_usuario    INT          AUTO_INCREMENT,
    nombre        CHAR(100),
    password      CHAR(100),
    PRIMARY KEY (id_usuario)
)ENGINE=MYISAM
;



-- 
-- TABLE: actividad 
--

ALTER TABLE actividad ADD CONSTRAINT Refcurso9 
    FOREIGN KEY (id_curso)
    REFERENCES curso(id_curso)
;


-- 
-- TABLE: alumno_materia 
--

ALTER TABLE alumno_materia ADD CONSTRAINT Refalumno21 
    FOREIGN KEY (id_alumno)
    REFERENCES alumno(id_alumno)
;

ALTER TABLE alumno_materia ADD CONSTRAINT Refmateria22 
    FOREIGN KEY (id_materia)
    REFERENCES materia(id_materia)
;

ALTER TABLE alumno_materia ADD CONSTRAINT Refinscripcion26 
    FOREIGN KEY (id_inscripcion)
    REFERENCES inscripcion(id_inscripcion)
;


-- 
-- TABLE: alumno_unidades 
--

ALTER TABLE alumno_unidades ADD CONSTRAINT Refalumno24 
    FOREIGN KEY (id_alumno)
    REFERENCES alumno(id_alumno)
;

ALTER TABLE alumno_unidades ADD CONSTRAINT Refnivel_unidades25 
    FOREIGN KEY (id_nivel_unidades)
    REFERENCES nivel_unidades(id_nivel_unidades)
;

ALTER TABLE alumno_unidades ADD CONSTRAINT Refinscripcion27 
    FOREIGN KEY (id_inscripcion)
    REFERENCES inscripcion(id_inscripcion)
;


-- 
-- TABLE: inscripcion 
--

ALTER TABLE inscripcion ADD CONSTRAINT Refcurso16 
    FOREIGN KEY (id_curso)
    REFERENCES curso(id_curso)
;

ALTER TABLE inscripcion ADD CONSTRAINT Refnivel17 
    FOREIGN KEY (id_nivel)
    REFERENCES nivel(id_nivel)
;

ALTER TABLE inscripcion ADD CONSTRAINT Refalumno18 
    FOREIGN KEY (id_alumno)
    REFERENCES alumno(id_alumno)
;


-- 
-- TABLE: materia 
--

ALTER TABLE materia ADD CONSTRAINT Refcurso3 
    FOREIGN KEY (id_curso)
    REFERENCES curso(id_curso)
;


-- 
-- TABLE: nivel_unidades 
--

ALTER TABLE nivel_unidades ADD CONSTRAINT Refnivel14 
    FOREIGN KEY (id_nivel)
    REFERENCES nivel(id_nivel)
;




SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO `nivel` (`id_nivel`, `nivel`, `borrado`) VALUES
(1, 'Kids 3', NULL),
(2, 'Kids 4', NULL),
(3, 'Kids 5', NULL),
(4, 'Preparatory I', NULL),
(5, 'Preparatory II', NULL),
(6, 'Preparatory III', NULL),
(7, 'W.E.1', NULL),
(8, 'W.E.2', NULL);


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO `materia` (`id_materia`, `nombre`, `id_curso`) VALUES
(6, 'Gramatica y Redaccion LA1', 1),
(5, 'Comunicacion Oral A1-A2', 1),
(4, 'Comunicacion Oral Leading to A1', 1),
(7, 'Gramatica y Redaccion A1-A2', 1),
(8, 'Listening Intro LA1', 1),
(9, 'Laboratorio de Listening Elementary A1-A2', 1),
(10, 'Comunicacion Oral Pre-Intermediate Leading to B1', 2),
(11, 'Comunicacion Oral Intermediate B1-B2', 2),
(12, 'Gramatica y Redaccion Pre-Intermediate LB1', 2),
(13, 'Gramatica y Redaccion Intermediate B1-B2', 2),
(18, 'Comunicacion Oral Upper Intermediate Leading to C1', 3),
(15, 'Vocabulario Tecnico 1', 2),
(16, 'Listening Pre-Intermediate LB1', 2),
(17, 'Laboratorio de Listening Intermediate B1-B2', 2),
(19, 'Comunicacion Oral Advanced C1-C2', 3),
(20, 'Interpretacion 1', 3),
(21, 'Fonetica y Pronunciacion 1', 3),
(22, 'Gramatica y Redaccion Upper Intermediate LC1', 3),
(23, 'Gramatica y Redaccion Advanced C1-C2', 3),
(24, 'Etica Profesional', 3),
(25, 'Trabajo Final', 3),
(26, 'Traduccion Literaria 1', 3),
(27, 'Traduccion Cientifica 1', 3),
(28, 'Traduccion Tecnica 1 Comercial-Legal', 3),
(29, 'Lengua Espanola', 3),
(30, 'Listening Upper Intermediate LC1', 3),
(31, 'Laboratorio de Listening Advanced C1-2', 3);


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


INSERT INTO `curso` (`id_curso`, `curso`) VALUES
(3, 'Guia Interprete'),
(2, 'Tecnico en idioma extranjero ingles'),
(1, 'Auxiliar en Idioma extranjero ingles');


INSERT INTO `usuario` (`id_usuario`, `nombre`, `password`) VALUES
(1, 'admin','admin');


INSERT INTO `nivel_unidades` (`id_nivel`, `unidades`) VALUES
(1, 'Unit 1'),
(1, 'Unit 2'),
(1, 'Unit 3'),
(1, 'Unit 4'),
(1, 'Unit 5'),
(1, 'Unit 6'),
(1, 'Unit 7'),
(1, 'Unit 8'),
(1, 'Unit 9'),
(1, 'Unit 10'),
(1, 'Unit 11'),
(1, 'Unit 12'),

(2, 'Unit 1'),
(2, 'Unit 2'),
(2, 'Unit 3'),
(2, 'Unit 4'),
(2, 'Unit 5'),
(2, 'Unit 6'),
(2, 'Unit 7'),
(2, 'Unit 8'),
(2, 'Unit 9'),
(2, 'Unit 10'),
(2, 'Unit 11'),
(2, 'Unit 12'),

(3, 'Unit 1'),
(3, 'Unit 2'),
(3, 'Unit 3'),
(3, 'Unit 4'),
(3, 'Unit 5'),
(3, 'Unit 6'),
(3, 'Unit 7'),
(3, 'Unit 8'),
(3, 'Unit 9'),
(3, 'Unit 10'),
(3, 'Unit 11'),
(3, 'Unit 12'),

(4, 'Unit 1'),
(4, 'Unit 2'),
(4, 'Unit 3'),
(4, 'Unit 4'),
(4, 'Unit 5'),
(4, 'Unit 6'),
(4, 'Unit 7'),
(4, 'Unit 8'),
(4, 'Unit 9'),
(4, 'Unit 10'),
(4, 'Unit 11'),
(4, 'Unit 12'),

(5, 'Unit 1'),
(5, 'Unit 2'),
(5, 'Unit 3'),
(5, 'Unit 4'),
(5, 'Unit 5'),
(5, 'Unit 6'),
(5, 'Unit 7'),
(5, 'Unit 8'),
(5, 'Unit 9'),
(5, 'Unit 10'),
(5, 'Unit 11'),
(5, 'Unit 12'),

(6, 'Unit 1'),
(6, 'Unit 2'),
(6, 'Unit 3'),
(6, 'Unit 4'),
(6, 'Unit 5'),
(6, 'Unit 6'),
(6, 'Unit 7'),
(6, 'Unit 8'),
(6, 'Unit 9'),
(6, 'Unit 10'),
(6, 'Unit 11'),
(6, 'Unit 12'),

(7, 'Unit 1'),
(7, 'Unit 2'),
(7, 'Unit 3'),
(7, 'Unit 4'),
(7, 'Unit 5'),
(7, 'Unit 6'),
(7, 'Unit 7'),
(7, 'Unit 8'),
(7, 'Unit 9'),
(7, 'Unit 10'),
(7, 'Unit 11'),
(7, 'Unit 12'),

(8, 'Unit 1'),
(8, 'Unit 2'),
(8, 'Unit 3'),
(8, 'Unit 4'),
(8, 'Unit 5'),
(8, 'Unit 6'),
(8, 'Unit 7'),
(8, 'Unit 8'),
(8, 'Unit 9'),
(8, 'Unit 10'),
(8, 'Unit 11'),
(8, 'Unit 12');
