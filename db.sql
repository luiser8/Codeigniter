CREATE TABLE task(
    id_task INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    priority VARCHAR(200) NOT NULL,
    description VARCHAR(200) NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE = INNODB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE levels(
    id_level INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(25) NOT NULL,
    description VARCHAR(255) NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
)ENGINE = INNODB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE users(
    id_user INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_level INT UNSIGNED NOT NULL,
    first_name VARCHAR(200) NOT NULL,
    last_name VARCHAR(200) NOT NULL,
    email VARCHAR(45) UNIQUE NOT NULL,
    account VARCHAR(255) UNIQUE NOT NULL,
    pass VARCHAR(255) NOT NULL,
    confirm_pass VARCHAR(255) NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_level) REFERENCES levels(id_level)
)ENGINE = INNODB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_spanish_ci;