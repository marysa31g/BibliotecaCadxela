
CREATE TABLE libros(
   idlibro int(10) NOT NULL  auto_increment,
   titulo varchar(200) NOT NULL,
   ISBN varchar (200)NOT NULL,
   numeroejemplar int (10) NOT NULL,
   paginas int(10) NOT NULL,
   editorial varchar(200) NOT NULL,
   CONSTRAINT PK_id_libro PRIMARY KEY (idlibro));

CREATE TABLE autores(
   idautor int(10) NOT NULL  auto_increment,
   nombre varchar(200) NOT NULL,
   apellido varchar(200)NOT NULL,
   CONSTRAINT PK_id_autor PRIMARY KEY (idautor));

CREATE TABLE autores_libro(
   idlibro int(10) NOT NULL,
   idautor int (10) NOT NULL
   );


ALTER TABLE `autores_libro`
  ADD KEY `idlibro` (`idlibro`),
  ADD KEY `idautor` (`idautor`);

CREATE TABLE estudiante(
   matricula varchar(10) NOT NULL,
   nombre varchar(200) NOT NULL,
   apellido varchar(200)NOT NULL,
   password varchar(50) NOT NULL,
   CONSTRAINT PK_matricula PRIMARY KEY (matricula));

CREATE TABLE prestamo(
   idprestamo int(10) NOT NULL  auto_increment,
   matricula  varchar(10) NOT NULL,
   fechaprestamo time NOT NULL,
   fechalimite time NOT NULL,
   fechadevolucion time NOT NULL,
   idlibro int(10) NOT NULL,
   CONSTRAINT PK_id_prestamo PRIMARY KEY (idprestamo));

ALTER TABLE `prestamo`
  ADD KEY `idprestamo` (`idprestamo`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `idlibro` (`idlibro`);

CREATE TABLE adeudos(
   idadeudo int(10) NOT NULL  auto_increment,
   matricula  varchar(10) NOT NULL,
   descripcionadeudo varchar(200) NOT null,
   fechaadeudo time NOT NULL,
   fechareposicion time NOT NULL,
   idlibro int(10)NOT NULL,
   CONSTRAINT PK_id_adeudo PRIMARY KEY (idadeudo));


ALTER TABLE `adeudos`
  ADD KEY `matricula` (`matricula`),
  ADD KEY `idlibro` (`idlibro`);

CREATE TABLE usuarios(
   idusuario int(10) NOT NULL  auto_increment,
   nombre varchar(200) NOT NULL,
   apellido varchar(200)NOT NULL,
   tiporol int(10) NOT NULL,
   email varchar(50) NOT NULL,
   password varchar(50) NOT NULL,
   CONSTRAINT PK_id_usuario PRIMARY KEY (idusuario));