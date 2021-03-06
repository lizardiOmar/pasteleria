<?php
//La lista de rutas se le de arriba para abajo, asi que se agregarán nuevas rutas al final
//Funcionan de la siguiente manera:
//$route['ruta']='Controlador/función';
$route['default_controller'] = 'HomeC/contacto'; 
$route['contacto'] = 'HomeC/contacto';
$route['acceso'] = 'HomeC/acceder';
$route['registro'] = 'HomeC/registrarme';

$route['clientes/(:num)'] = 'ClientesC/perfil/$1';
$route['productos/(:num)'] = 'ClientesC/verCatalogo/$1';
$route['buscar/(:num)/(:num)'] = 'ClientesC/busquedaTipo/$1/$2';
$route['pedido/(:num)'] = 'ClientesC/abrirPedidos/$1/$2';
$route['compra/(:num)/(:num)'] = 'ClientesC/carrito/$1/$2';
$route['CancelarPedido/(:num)/(:num)'] = 'ClientesC/cancelarPedido/$1/$2';
$route['pagarPedido/(:num)/(:num)'] = 'ClientesC/pagarPedido/$1/$2';
$route['pedidoListo/(:num)/(:num)'] = 'ClientesC/PedidoPagado/$1/$2';
$route['agregarAlCarritoCliente/(:num)/(:num)/(:num)'] = 'ClientesC/agregarAlCarritoCliente/$1/$2/$3';

$route['administrador/(:num)'] = 'AdministradoresC/perfil/$1';
$route['editarProductos/(:num)'] = 'AdministradoresC/verProductosEditables/$1';
$route['editar/(:num)/(:num)'] = 'AdministradoresC/editar/$1/$2';
$route['agregarProductos/(:num)'] = 'AdministradoresC/registrarProductos/$1';

$route['caja/(:num)'] = 'CajerosC/abrirVenta/$1';
$route['venta/(:num)/(:num)']='CajerosC/caja/$1/$2';
$route['cancelarVenta/(:num)/(:num)']='CajerosC/cancelarVenta/$1/$2';
$route['cobrarVenta/(:num)/(:num)']='CajerosC/cobrarVenta/$1/$2';
$route['ventaLista/(:num)/(:num)']='CajerosC/ventaCobrada/$1/$2';
$route['agregarAlCarrito/(:num)/(:num)/(:num)'] = 'CajerosC/agregarAlCarro/$1/$2/$3';
