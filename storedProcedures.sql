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

