create view vista_getLessArt as select * from articulo where articulo.existencia < 10;