CREATE TABLE Administrator (
	idAdministrator int(11) NOT NULL AUTO_INCREMENT,
	name varchar(45) NOT NULL,
	lastName varchar(45) NOT NULL,
	email varchar(45) NOT NULL,
	password varchar(45) NOT NULL,
	picture varchar(45) DEFAULT NULL,
	phone varchar(45) DEFAULT NULL,
	mobile varchar(45) DEFAULT NULL,
	state tinyint DEFAULT NULL,
	PRIMARY KEY (idAdministrator)
);

INSERT INTO Administrator (idAdministrator, name, lastName, email, password, phone, mobile, state) VALUES 
	('1', 'administrator', 'administrator', 'admin@udistrital.edu.co', md5('123'), '123', '123', '1'); 

CREATE TABLE LogAdministrator (
	idLogAdministrator int(11) NOT NULL AUTO_INCREMENT,
	action varchar(45) NOT NULL,
	information text NOT NULL,
	date date NOT NULL,
	time time NOT NULL,
	ip varchar(45) NOT NULL,
	os varchar(45) NOT NULL,
	browser varchar(45) NOT NULL,
	administrator_idAdministrator int(11) NOT NULL,
	PRIMARY KEY (idLogAdministrator)
);

CREATE TABLE Facultad (
	idFacultad int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	PRIMARY KEY (idFacultad)
);

CREATE TABLE ProgramaAcademico (
	idProgramaAcademico int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	facultad_idFacultad int(11) NOT NULL,
	PRIMARY KEY (idProgramaAcademico)
);

CREATE TABLE LogEstudiante (
	idLogEstudiante int(11) NOT NULL AUTO_INCREMENT,
	action varchar(45) NOT NULL,
	information text NOT NULL,
	date date NOT NULL,
	time time NOT NULL,
	ip varchar(45) NOT NULL,
	os varchar(45) NOT NULL,
	browser varchar(45) NOT NULL,
	estudiante_idEstudiante int(11) NOT NULL,
	PRIMARY KEY (idLogEstudiante)
);

CREATE TABLE Estudiante (
	idEstudiante int(11) NOT NULL AUTO_INCREMENT,
	codigo varchar(45) NOT NULL,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	fecha_registro date NOT NULL,
	fecha_actualizacion date NOT NULL,
	foto varchar(45) DEFAULT NULL,
	telefono varchar(45) NOT NULL,
	puntaje int NOT NULL,
	token varchar(45) DEFAULT NULL,
	state tinyint NOT NULL,
	programaAcademico_idProgramaAcademico int(11) NOT NULL,
	rango_idRango int(11) NOT NULL,
	PRIMARY KEY (idEstudiante)
);

CREATE TABLE Asignatura (
	idAsignatura int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	PRIMARY KEY (idAsignatura)
);

CREATE TABLE AsignaturaPrograma (
	idAsignaturaPrograma int(11) NOT NULL AUTO_INCREMENT,
	programaAcademico_idProgramaAcademico int(11) NOT NULL,
	asignatura_idAsignatura int(11) NOT NULL,
	PRIMARY KEY (idAsignaturaPrograma)
);

CREATE TABLE Publicacion (
	idPublicacion int(11) NOT NULL AUTO_INCREMENT,
	titulo varchar(45) NOT NULL,
	descripcion text NOT NULL,
	anexo varchar(45) DEFAULT NULL,
	fecha date NOT NULL,
	votoPositivo int DEFAULT NULL,
	votoNegativo int DEFAULT NULL,
	idRespuesta int DEFAULT NULL,
	estudiante_idEstudiante int(11) NOT NULL,
	asignatura_idAsignatura int(11) NOT NULL,
	PRIMARY KEY (idPublicacion)
);

CREATE TABLE Rango (
	idRango int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	descripcion varchar(45) NOT NULL,
	valorMinimo int NOT NULL,
	valorMaximo int NOT NULL,
	PRIMARY KEY (idRango)
);

CREATE TABLE Etiqueta (
	idEtiqueta int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	PRIMARY KEY (idEtiqueta)
);

CREATE TABLE PublicacionEtiqueta (
	idPublicacionEtiqueta int(11) NOT NULL AUTO_INCREMENT,
	publicacion_idPublicacion int(11) NOT NULL,
	etiqueta_idEtiqueta int(11) NOT NULL,
	PRIMARY KEY (idPublicacionEtiqueta)
);

CREATE TABLE Causal (
	idCausal int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	PRIMARY KEY (idCausal)
);

CREATE TABLE ReportePublicacion (
	idReportePublicacion int(11) NOT NULL AUTO_INCREMENT,
	fechaReporte varchar(45) NOT NULL,
	estudiante_idEstudiante int(11) NOT NULL,
	publicacion_idPublicacion int(11) NOT NULL,
	causal_idCausal int(11) NOT NULL,
	PRIMARY KEY (idReportePublicacion)
);

ALTER TABLE LogAdministrator
 	ADD FOREIGN KEY (administrator_idAdministrator) REFERENCES Administrator (idAdministrator); 

ALTER TABLE ProgramaAcademico
 	ADD FOREIGN KEY (facultad_idFacultad) REFERENCES Facultad (idFacultad); 

ALTER TABLE LogEstudiante
 	ADD FOREIGN KEY (estudiante_idEstudiante) REFERENCES Estudiante (idEstudiante); 

ALTER TABLE Estudiante
 	ADD FOREIGN KEY (programaacademico_idProgramaAcademico) REFERENCES ProgramaAcademico (idProgramaAcademico); 

ALTER TABLE Estudiante
 	ADD FOREIGN KEY (rango_idRango) REFERENCES Rango (idRango); 

ALTER TABLE AsignaturaPrograma
 	ADD FOREIGN KEY (programaacademico_idProgramaAcademico) REFERENCES ProgramaAcademico (idProgramaAcademico); 

ALTER TABLE AsignaturaPrograma
 	ADD FOREIGN KEY (asignatura_idAsignatura) REFERENCES Asignatura (idAsignatura); 

ALTER TABLE Publicacion
 	ADD FOREIGN KEY (estudiante_idEstudiante) REFERENCES Estudiante (idEstudiante); 

ALTER TABLE Publicacion
 	ADD FOREIGN KEY (asignatura_idAsignatura) REFERENCES Asignatura (idAsignatura); 

ALTER TABLE PublicacionEtiqueta
 	ADD FOREIGN KEY (publicacion_idPublicacion) REFERENCES Publicacion (idPublicacion); 

ALTER TABLE PublicacionEtiqueta
 	ADD FOREIGN KEY (etiqueta_idEtiqueta) REFERENCES Etiqueta (idEtiqueta); 

ALTER TABLE ReportePublicacion
 	ADD FOREIGN KEY (estudiante_idEstudiante) REFERENCES Estudiante (idEstudiante); 

ALTER TABLE ReportePublicacion
 	ADD FOREIGN KEY (publicacion_idPublicacion) REFERENCES Publicacion (idPublicacion); 

ALTER TABLE ReportePublicacion
 	ADD FOREIGN KEY (causal_idCausal) REFERENCES Causal (idCausal); 

