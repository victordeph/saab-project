CREATE DATABASE bdsaab;

use bdsaab;

CREATE TABLE refacciones (
id_refacciones INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
refaccion VARCHAR(20) NOT NULL,
vehiculo VARCHAR(20) NOT NULL,
cantidad INT NOT NULL,
costo DECIMAL NOT NULL,
fecha DATE NOT NULL
);	

INSERT INTO refacciones (refaccion,vehiculo,cantidad, costo, fecha) values ('test','test','10','10','2000-03-31');

