CREATE USER 'userSGVDWESNombreAplicacion'@'%' IDENTIFIED BY 'paso';
GRANT ALL PRIVILEGES ON *.* TO 'userSGVDWESNombreAplicacion'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
CREATE DATABASE IF NOT EXISTS DBSGVDWESProyectoTema4;
CREATE TABLE T01_Usuario(
    T02_Password VARCHAR(3) PRIMARY KEY,
    T02_DescDepartamento CHAR(255) not null,
    T02_FechaCreacionDepartamento DATETIME  default current_timestamp,
    T02_VolumenDeNegocio FLOAT default 0,
    T02_FechaBajaDepartamento DATETIME default current_timestamp);