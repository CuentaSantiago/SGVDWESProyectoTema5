USE DBSGVDWESProyectoTema5;
INSERT INTO T01_Usuario() VALUES
    ('admin', SHA2('paso', 256), 'Administrador del sistema', NOW(), 1, 'administrador', null),
    ('Santi', SHA2('paso', 256), 'Santiago González Vicente', NOW(), 1, 'usuario', null);