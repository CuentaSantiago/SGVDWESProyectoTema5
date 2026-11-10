CREATE USER 'userSGVDWESProyectoTema5'@'%' IDENTIFIED BY 'paso';
GRANT ALL PRIVILEGES ON *.* TO 'userSGVDWESProyectoTema5'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
CREATE DATABASE IF NOT EXISTS DBSGVDWESProyectoTema5;
use DBSGVDWESProyectoTema5;
CREATE TABLE T01_Usuario(
    T01_CodUsuario varchar(8) primary key,
    T01_Password VARCHAR(255) not null,
    T01_DescUsuario CHAR(255) not null,
    T01_FechaHoraUltimaConexion datetime  default now(),
    T01_NumConexiones int  default 1,
    T01_Perfil ENUM('usuario', 'administrador') default "usuario",
    T01_ImagenUsuario LONGBLOB null, 
    CHECK (CHAR_LENGTH(T01_CodUsuario) BETWEEN 4 AND 8));