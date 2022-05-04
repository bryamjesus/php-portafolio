CREATE TABLE `album`.`fotos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombreFotos` VARCHAR(500) NOT NULL,
    `ruta` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO
    `fotos` (`id`, `nombreFotos`, `ruta`)
VALUES
    (NULL, 'Jugando con la programacion', 'foto.jpg');

CREATE TABLE `album`.`proyectos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(500) NOT NULL,
    `imagen` VARCHAR(500) NOT NULL,
    `descripcion` TEXT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO
    `proyectos` (`id`, `nombre`, `imagen`, `descripcion`)
VALUES
    (
        NULL,
        'Proyecto 1',
        'imagen.jpg',
        'Es un proyecto de hace mucho tiempo'
    );

DELETE FROM
    `proyectos`
WHERE
    `proyectos`.`id` = 8;