#retornar factura
DELIMITER //

create PROCEDURE getFactura(_folio int)
BEGIN

select * from DetalleFactura DF 
INNER JOIN Factura F on F.Folio = DF.FolioFactura
INNER JOIN articulo A on DF.idArticulo = A.id
INNER JOIN cliente C on F.rfcCliente = C.Rfc
WHERE F.Folio = _folio;

END//

Delimiter ;

## factura compra

DELIMITER //

create PROCEDURE getFacturaCompra(_folio int)
BEGIN

select * from DetalleFacturaCompra DFC
INNER JOIN FacturaCompra FC on FC.Folio = DFC.FolioFactura
INNER JOIN articulo A on DFC.idArticulo = A.id
WHERE FC.Folio = _folio;

END//

Delimiter ;

#facturas de un cliente
DELIMITER //

CREATE PROCEDURE facturascliente(
_rfc VARCHAR(10)
) 
BEGIN
	SELECT * FROM Factura f
	INNER JOIN cliente c on f.rfcCliente = c.Rfc
	where f.rfcCliente = _rfc;
END//

DELIMITER ;

#facturas de un proveedor
DELIMITER //

CREATE PROCEDURE facturasproveedor(
_rfc VARCHAR(10)
) 
BEGIN
	SELECT * FROM FacturaCompra f
	INNER JOIN Proveedor p on f.rfcProveedor = p.RFC
	where f.rfcProveedor = _rfc;
END//

DELIMITER ;

#facturas fecha cliente
DELIMITER //

CREATE PROCEDURE facturasfechacliente(
_fecha DATE
) 
BEGIN
	SELECT * FROM Factura f
	INNER JOIN cliente c on f.rfcCliente = c.Rfc
	where  f.fecha = _fecha;
END//

DELIMITER ;


#facturas de un proveedor
DELIMITER //

CREATE PROCEDURE facturasfechaproveedor(
_fecha DATE
) 
BEGIN
	SELECT * FROM FacturaCompra f
	INNER JOIN Proveedor p on f.rfcProveedor = p.RFC
	where f.fecha = _fecha;
END//

DELIMITER ;


#kardex articulos
DELIMITER //

CREATE PROCEDURE kardexarticulos() 
BEGIN
	select * from articulo;
END//

DELIMITER ;

#articulos menores a
DELIMITER //

CREATE PROCEDURE kardexarticulos() 
BEGIN
	select * from articulo;
END//

DELIMITER ;