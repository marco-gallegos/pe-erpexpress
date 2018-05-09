##detallefactura
CREATE TRIGGER actualizarExistenciasInsert AFTER INSERT ON DetalleFactura
FOR EACH ROW
UPDATE articulo SET existencia = existencia - NEW.cantidad
;
CREATE TRIGGER actualizarExistenciasUpdate AFTER UPDATE ON DetalleFactura
FOR EACH ROW
UPDATE articulo SET existencia = existencia + OLD.cantidad - NEW.cantidad
;


##factura
CREATE TRIGGER actualizarSaldoInsert AFTER INSERT ON Factura
FOR EACH ROW
UPDATE cliente SET saldo = saldo + NEW.total
;
CREATE TRIGGER eliminarArticulosEnDetalleFactura AFTER DELETE ON Factura
FOR EACH ROW
DELETE FROM detallefactura WHERE detallefactura.FolioFactura = old.Folio
;
CREATE TRIGGER actualizarSaldoUpdate AFTER UPDATE ON Factura
FOR EACH ROW
UPDATE cliente SET saldo = saldo - OLD.total + NEW.total
;