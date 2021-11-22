CREATE VIEW vw_productosVentas AS
SELECT pedidos.ID as idPedido, productos.nombre as producto, productos.precio as precio, pedidos_productos.cantidad as cantidad, pedidos_productos.subtotal as subtotal
FROM pedidos, pedidos_productos, productos
WHERE pedidos.ID=pedidos_productos.ID_Pedido AND productos.ID=pedidos_productos.ID_Producto;
