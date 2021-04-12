create table recepcion
(
    exp_procedencia INT NOT NULL AUTO_INCREMENT,
    fecha DATE NOT NULL,
    PRIMARY KEY (exp_procedencia)
);

create table paciente
(
    /* Datos paciente */
    num_paciente INT NOT NULL AUTO_INCREMENT,
    exp_procedencia INT NOT NULL,
    nombre_p VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    direccion_p VARCHAR(100) NOT NULL,
    telefono_p INT NOT NULL,
    poblacion VARCHAR(30) NOT NULL,
    estado VARCHAR(30) NOT NULL,
    edad INT NOT NULL,
    sexo VARCHAR(10) NOT NULL,
    procedencia VARCHAR(10) NOT NULL,
    num_afiliacion INT NOT NULL,
    /* Datos acompanante */
    nombre_a VARCHAR(50) NOT NULL,
    parentesco VARCHAR(20) NOT NULL,
    telefono_a INT NOT NULL,
    direccion_a VARCHAR(100) NOT NULL,
    /* Medico */
    medico_esp VARCHAR(50) NOT NULL,
    especialidad VARCHAR(20) NOT NULL,
    anestesiologo VARCHAR(50) NOT NULL,
    diagnostico VARCHAR(255) NOT NULL,
    procedimiento VARCHAR(30) NOT NULL,
    estado bool,
    PRIMARY KEY (num_paciente),
    FOREIGN KEY (exp_procedencia) REFERENCES recepcion(exp_procedencia)
);

create table enfermeros
(
    nombre_completo VARCHAR(50) NOT NULL,
    cedula_p INT NOT NULL,
    estudios VARCHAR(100) NOT NULL,
    usuario VARCHAR(20) NOT NULL,
    contrasena VARCHAR(20) NOT NULL
)

create table medicos
(
    nombre_completo VARCHAR(50) NOT NULL,
    cedula_p INT NOT NULL,
    estudios VARCHAR(100) NOT NULL,
    usuario VARCHAR(20) NOT NULL,
    contrasena VARCHAR(20) NOT NULL
)

create table anestesiologos
(
    nombre_completo VARCHAR(50) NOT NULL,
    cedula_p INT NOT NULL,
    estudios VARCHAR(100) NOT NULL,
    usuario VARCHAR(20) NOT NULL,
    contrasena VARCHAR(20) NOT NULL
)