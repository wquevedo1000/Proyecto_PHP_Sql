CREATE DATABASE dbHotel;
USE dbHotel;

CREATE TABLE tblcliente (
Cli_Id Int Primary Key AUTO_INCREMENT,
Cli_Nombre Varchar(20) not null,
Cli_Apellido Varchar(30) not null,
Cli_TipoIdentificacion Varchar(4) not null,
Cli_NumeroIdentificacion Varchar(12) not null,
Cli_Nacionalidad Varchar(60),
Cli_Ciudad Varchar(60),
Cli_Direccion Varchar(50),
Cli_Telefono Varchar(15) not null,
Cli_Email Varchar(50),
Cli_Contrasena Varchar(200));

CREATE TABLE tbladministrador (
Admin_Id Int Primary Key AUTO_INCREMENT,
Admin_Nombre Varchar(20) not null,
Admin_Apellido Varchar(30) not null,
Admin_TipoDocumento Varchar(4) not null,
Admin_NumeroDocumento Varchar(12) not null,
Admin_Direccion Varchar(50),
Admin_Telefono Varchar(15) not null,
Admin_Cargo Varchar(50),
Admin_Email Varchar(50),
Admin_Contrasena Varchar(200));

CREATE TABLE tblhabitacion (
Hab_Numero Int Primary Key,
Hab_Piso Int,
Hab_Descripcion Varchar(200) not null,
Hab_Caracteristicas Text,
Hab_PrecioDia Float not null,
Hab_Tipo Varchar(20),
Hab_Estado Varchar(15) not null);

CREATE TABLE tblreserva (
Res_Id Int AUTO_INCREMENT,
Res_IdCliente Int not null,
Res_NumeroHabitacion Int not null,
Res_Fecha Date,
Res_FechaIngreso Date,
Res_HoraIngreso Time,
Res_FechaSalida Date,
Res_HoraSalida Time,
Res_CantidadDias Int,
Res_Costo Float not null,
Res_Estado Varchar(15) not null,
Primary Key(Res_Id, Res_IdCliente, Res_NumeroHabitacion));

ALTER TABLE tblreserva
ADD Foreign Key (Res_IdCliente) REFERENCES tblcliente(Cli_Id),
ADD Foreign Key (Res_NumeroHabitacion) REFERENCES tblhabitacion(Hab_Numero);

-- Insertar habitaciones para funcionamiento de la plataforma.

INSERT INTO `tblhabitacion` (`Hab_Numero`, `Hab_Piso`, `Hab_Descripcion`, `Hab_Caracteristicas`, `Hab_PrecioDia`, `Hab_Tipo`, `Hab_Estado`) VALUES
(100, 1, 'HabitaciÃ³n con vista a la calle con superficie de 8 a 9 metros cuadrados, cuenta con baÃ±o privado perfecta para una persona.', 'Cama individual(120cm), ConexiÃ³n Wi-Fi gratuita, TelevisiÃ³n LCD de pantalla plana, TelÃ©fono directo en la habitaciÃ³n, Nevera/minibar, ClimatizaciÃ³n individual.', 20.93, 'Individual', 'Ocupada'),
(101, 1, 'HabitaciÃ³n con vista a la calle con superficie de 8 a 9 metros cuadrados, cuenta con baÃ±o privado perfecta para una persona.', 'Cama individual(120cm), ConexiÃ³n Wi-Fi gratuita, TelevisiÃ³n LCD de pantalla plana, TelÃ©fono directo en la habitaciÃ³n, Nevera/minibar, ClimatizaciÃ³n individual.', 20.93, 'Individual', 'Ocupada'),
(102, 1, 'HabitaciÃ³n con vista a la calle con superficie de 8 a 9 metros cuadrados, cuenta con baÃ±o privado perfecta para una persona.', 'Cama individual(120cm), ConexiÃ³n Wi-Fi gratuita, TelevisiÃ³n LCD de pantalla plana, TelÃ©fono directo en la habitaciÃ³n, Nevera/minibar, ClimatizaciÃ³n individual.', 20.93, 'Individual', 'Disponible'),
(103, 1, 'HabitaciÃ³n con vista a la calle con superficie de 8 a 9 metros cuadrados, cuenta con baÃ±o privado perfecta para una persona.', 'Cama individual(120cm), ConexiÃ³n Wi-Fi gratuita, TelevisiÃ³n LCD de pantalla plana, TelÃ©fono directo en la habitaciÃ³n, Nevera/minibar, ClimatizaciÃ³n individual.', 20.93, 'Individual', 'Disponible'),
(104, 1, 'HabitaciÃ³n con vista a la calle de 12 metros cuadrados con baÃ±o privado especializada para dos personas.', 'Dos camas separadas, nevera/minibar, televisor LED de pantalla plana, conexiÃ³n de Wi-Fi gratuita, aire acondicionado, telÃ©fono de lÃ­nea directa.', 31.39, 'Doble', 'Disponible'),
(105, 1, 'HabitaciÃ³n con vista a la calle de 12 metros cuadrados con baÃ±o privado especializada para dos personas.', 'Dos camas separadas, nevera/minibar, televisor LED de pantalla plana, conexiÃ³n de Wi-Fi gratuita, aire acondicionado, telÃ©fono de lÃ­nea directa.', 31.39, 'Doble', 'Disponible'),
(106, 1, 'HabitaciÃ³n con vista a la calle de 12 metros cuadrados con baÃ±o privado especializada para dos personas.', 'Dos camas separadas, nevera/minibar, televisor LED de pantalla plana, conexiÃ³n de Wi-Fi gratuita, aire acondicionado, telÃ©fono de lÃ­nea directa.', 31.39, 'Doble', 'Disponible'),
(107, 1, 'HabitaciÃ³n con vista a la calle de 12 metros cuadrados con baÃ±o privado especializada para dos personas.', 'Dos camas separadas, nevera/minibar, televisor LED de pantalla plana, conexiÃ³n de Wi-Fi gratuita, aire acondicionado, telÃ©fono de lÃ­nea directa.', 31.39, 'Doble', 'Disponible'),
(108, 2, 'Perfecta para grupos de 4 personas esta habitaciÃ³n contiene 2 camas individuales y una cama doble si tiene niÃ±os en brazos se dispone una cuna a la habitaciÃ³n, vista hacia la calle y baÃ±o privado.', 'Cama Doble de 160cm de ancho x 195cm de largo, 2 camas individuales de 100cm de ancho x 190cm de largo, conexiÃ³n a Wi-Fi gratuita, televisor LED pantalla plana, aire acondicionado, telÃ©fono de lÃ­nea directa y si el cliente lo desea una cuna de 70cm de ancho x 140cm de largo.', 41.86, 'Cuadruple', 'Ocupada'),
(109, 2, 'Perfecta para grupos de 4 personas esta habitaciÃ³n contiene 2 camas individuales y una cama doble si tiene niÃ±os en brazos se dispone una cuna a la habitaciÃ³n, vista hacia la calle y baÃ±o privado.', 'Cama Doble de 160cm de ancho x 195cm de largo, 2 camas individuales de 100cm de ancho x 190cm de largo, conexiÃ³n a Wi-Fi gratuita, televisor LED pantalla plana, aire acondicionado, telÃ©fono de lÃ­nea directa y si el cliente lo desea una cuna de 70cm de ancho x 140cm de largo.', 41.86, 'Cuadruple', 'Disponible'),
(110, 2, 'Perfecta para grupos de 4 personas esta habitaciÃ³n contiene 2 camas individuales y una cama doble si tiene niÃ±os en brazos se dispone una cuna a la habitaciÃ³n, vista hacia la calle y baÃ±o privado.', 'Cama Doble de 160cm de ancho x 195cm de largo, 2 camas individuales de 100cm de ancho x 190cm de largo, conexiÃ³n a Wi-Fi gratuita, televisor LED pantalla plana, aire acondicionado, telÃ©fono de lÃ­nea directa y si el cliente lo desea una cuna de 70cm de ancho x 140cm de largo.', 41.86, 'Cuadruple', 'Disponible'),
(111, 2, 'Perfecta para grupos de 4 personas esta habitaciÃ³n contiene 2 camas individuales y una cama doble si tiene niÃ±os en brazos se dispone una cuna a la habitaciÃ³n, vista hacia la calle y baÃ±o privado.', 'Cama Doble de 160cm de ancho x 195cm de largo, 2 camas individuales de 100cm de ancho x 190cm de largo, conexiÃ³n a Wi-Fi gratuita, televisor LED pantalla plana, aire acondicionado, telÃ©fono de lÃ­nea directa y si el cliente lo desea una cuna de 70cm de ancho x 140cm de largo.', 41.86, 'Cuadruple', 'Disponible'),
(112, 2, 'Son dos habitaciones dobles continuas que le brindan a las familias más espacio y privacidad su área es de 40 metros cuadrados.', 'Cada una cuenta con 2 camas individuales, conexiÃ³n a Wi-Fi gratuita, aire acondicionado, telÃ©fono con lÃ­nea directa, baÃ±o privado, televisor de pantalla plana y minibar.', 47.14, 'Familiar', 'Ocupada'),
(114, 2, 'Son dos habitaciones dobles continuas que le brindan a las familias mï¿½s espacio y privacidad su ï¿½rea es de 40 metros cuadrados.', 'Cada una cuenta con 2 camas individuales, conexiÃ³n a Wi-Fi gratuita, aire acondicionado, telÃ©fono con lÃ­nea directa, baÃ±o privado, televisor de pantalla plana y minibar.', 47.14, 'Familiar', 'Disponible'),
(116, 3, 'Si usted y su pareja quieren pasar una velada inolvidable esta es su habitaciÃ³n ideal con hermosa vista hacia la ciudad, cuenta con espacio amplio y privacidad perfecta para parejas.', 'Cama matrimonial, conexiÃ³n Wi-Fi gratuita, televisor LED pantalla plana, baÃ±o privado con tina, nevera/minibar, telÃ©fono con lÃ­nea directa y de cortesÃ­a una botella de champaÃ±a.', 52.09, 'Matrimonial', 'Disponible'),
(117, 3, 'Si usted y su pareja quieren pasar una velada inolvidable esta es su habitaciÃ³n ideal con hermosa vista hacia la ciudad, cuenta con espacio amplio y privacidad perfecta para parejas.', 'Cama matrimonial, conexiÃ³n Wi-Fi gratuita, televisor LED pantalla plana, baÃ±o privado con tina, nevera/minibar, telÃ©fono con lÃ­nea directa y de cortesÃ­a una botella de champaÃ±a.', 52.09, 'Matrimonial', 'Disponible'),
(118, 3, 'Si usted y su pareja quieren pasar una velada inolvidable esta es su habitaciÃ³n ideal con hermosa vista hacia la ciudad, cuenta con espacio amplio y privacidad perfecta para parejas.', 'Cama matrimonial, conexiÃ³n Wi-Fi gratuita, televisor LED pantalla plana, baÃ±o privado con tina, nevera/minibar, telÃ©fono con lÃ­nea directa y de cortesÃ­a una botella de champaÃ±a.', 52.09, 'Matrimonial', 'Disponible'),
(119, 3, 'Si usted y su pareja quieren pasar una velada inolvidable esta es su habitaciÃ³n ideal con hermosa vista hacia la ciudad, cuenta con espacio amplio y privacidad perfecta para parejas.', 'Cama matrimonial, conexiÃ³n Wi-Fi gratuita, televisor LED pantalla plana, baÃ±o privado con tina, nevera/minibar, telÃ©fono con lÃ­nea directa y de cortesÃ­a una botella de champaÃ±a.', 52.09, 'Matrimonial', 'Disponible');

-- Insertar administrador para tener acesso a esta interfaz estos datos son para funcionamiento no son veridicos.

INSERT INTO `tbladministrador` (`Admin_Id`, `Admin_Nombre`, `Admin_Apellido`, `Admin_TipoDocumento`, `Admin_NumeroDocumento`, `Admin_Direccion`, `Admin_Telefono`, `Admin_Cargo`, `Admin_Email`, `Admin_Contrasena`) VALUES
(1, 'William', 'GarzÃ³n', 'CC', '73405860493', 'Calle 10 N 10 - 30', '3402653017', 'Mantenimiento de Computo', 'william06@gmail.com', '$2y$10$EarSd.9FmzOiVspYW1w2GO0j2WUB8P36Axo68NseLYRQ3U96aHRF6');

