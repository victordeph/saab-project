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

/* CREACION DE TABLA REPORTES */
create table reportes(
id_reportes INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
refaccion_reportes VARCHAR(20) NOT NULL,
vehiculo_reportes VARCHAR(20) NOT NULL,
cantidad_reportes INT NOT NULL,
costo_reportes DECIMAL NOT NULL,
costo_total_reportes DECIMAL NOT NULL,
fecha_solictud_reportes DATE NOT NULL,
departamento_reportes VARCHAR(20) NOT NULL,
estado_reportes VARCHAR(20) NOT NULL,
id_refacciones INT NOT NULL
);

create table trending(
id_trending INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
refaccion_trending VARCHAR(20) NOT NULL,
vehiculo_trending VARCHAR(20) NOT NULL,
cantidad_trending INT NOT NULL,
id_refacciones INT NOT NULL
);

ALTER TABLE trending ADD FOREIGN KEY(id_refacciones) REFERENCES refacciones(id_refacciones);
ALTER TABLE reportes ADD FOREIGN KEY(id_refacciones) REFERENCES refacciones(id_refacciones);




INSERT INTO reportes (refaccion,vehiculo,cantidad, costo_unitario, costo_total, fecha_solictud, id_refacciones) values ('test','test','10','10','10','2000-03-31','1');

    INSERT INTO reportes (refaccion_reportes, vehiculo_reportes,cantidad_reportes, costo_reportes, costo_total_reportes, fecha_solictud_reportes,departamento_reportes, id_refacciones) 
    values ('test','test','2','10','10','2000-03-31','Ventas','2');
    UPDATE refacciones SET cantidad = cantidad-2 where id_refacciones=2;

