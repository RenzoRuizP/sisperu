<div class="left-side-menu">
            <div class="h-100" id="left-side-menu-container" data-simplebar>
                <!-- LOGO3 -->
                <a href="{{url('https://sisperu.net/sistema/')}}" class="logo text-center">
                    <span class="logo-lg">
                        <img src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/logo.svg" alt="" height="50" id="side-main-logo">
                    </span>
                    <span class="logo-sm">
                        <img src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/logo.svg" alt="" height="50" id="side-sm-main-logo">
                    </span>
                </a>
                <!--- Sidemenu -->
                <ul class="metismenu side-nav">
                    <!--  <li class="side-nav-title side-nav-item">Navegación</li>
                    <li class="side-nav-item">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span class="badge badge-success float-right">4</span>
                            <span> Dashboards </span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="dashboard-analytics.html">Inicio</a>
                            </li>
                            <li>
                                <a href="dashboard-crm.html">CRM</a>
                            </li>
                            <li>
                                <a href="index.html">Comercio</a>
                            </li> 
                            <li>
                                <a href="dashboard-projects.html">Productos</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="side-nav-title side-nav-item">Modulos</li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-invoice"></i>
                            <span>Cotizaciones</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('cotizaciones/proforma/new')}}">Nueva proforma</a>
                            </li>
                            <li>
                                <a href="{{url('cotizaciones')}}">Mis proformas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-bill"></i>
                            <span>Ventas</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('ventas/recibos')}}">Recibos</a>
                            </li>
                            <li>
                                <a href="{{url('ventas/boletas')}}">Boletas</a>
                            </li>
                            <li>
                                <a href="{{url('ventas/facturas')}}">Facturas</a>
                            </li>
                            <li>
                                <a href="{{url('ventas/nc')}}">Notas de Credito</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-truck"></i>
                            <span>Almacen</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('almacen/nuevo-pedido')}}">Nuevo pedido</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/pedidos-list')}}">Mis pedidos</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/solicitud-de-pedido')}}">Solicitud de Mercader&iacute;a</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/devoluciones')}}">Devoluci&oacute;n de Mercader&iacute;a</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/stock-almacen')}}">Stock Almacen Central</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/ingresar-productos')}}">Ingresar Productos</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/stock-sucursales')}}">Stock Sucursal</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/series')}}">Seguimiento Serie</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/buscar-producto')}}">Buscar Producto</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/baja-producto')}}">Baja de Productos</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/movimiento-stock')}}">Movimiento de Stock</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/separaciones')}}">Separaciones Sin Stock</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/prestamos')}}">Prestamos</a>
                            </li>
                            <li>
                                <a href="{{url('almacen/auditorias')}}">Auditorias</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-chart-growth"></i>
                            <span>Reportes</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('reportes/reporte-individual')}}">Asistencia Individual</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/reporte-general')}}">Asistencia General</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/extraer-ventas')}}">Base de Datos</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/extraer-formato-contable')}}">Reporte Calcum</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/venta-particular')}}">Venta Particular</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/venta-licitacion')}}">Venta Licitacion</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/venta-distribuidores')}}">Venta Distribuidores</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/venta-acuenta')}}">A Cuentas</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/venta-productos')}}">Venta por Productos</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/stocks')}}">Stock por Categoria</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/pagos')}}">Pagos</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/cuestionarios')}}">CheckList</a>
                            </li>
                            <li>
                                <a href="{{url('reportes/venta-sucursal')}}">Ventas Sucursal</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-money-withdrawal"></i>
                            <span>Caja</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('caja/control')}}">Ingresos/Egresos</a>
                            </li>
                            <li>
                                <a href="{{url('caja/depositos')}}">Depositos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item active">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-medkit"></i>
                            <span>Doctores</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('doctores/lista')}}">Lista </a>
                            </li>
                            <li>
                                <a href="{{url('doctores/comisiones-doctor')}}">Puntos</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/instituciones')}}">Instituciones</a>
                            </li>
                            <li>
                                <a href="{{url('doctores/financiador')}}">Financiador</a>
                            </li>
                            <li>
                                <a href="{{url('doctores/sms')}}">SMS's Masivos</a>
                            </li>
                            <li>
                                <a href="{{url('doctores/articulos')}}">Articulos</a>
                            </li>
                            <li>
                                <a href="{{url('doctores/pacientes')}}">Referidos</a>
                            </li>
                            <li>
                                <a href="{{url('doctores/visitas')}}">Visitas Medicas</a>
                            </li>
                            <li>
                                <a href="{{url('doctores/eventos')}}">Eventos App</a>
                            </li>
                            <li>
                                <a href="{{url('doctores/descargas')}}">Descargas App</a>
                            </li>
                            <li>
                                <a href="{{url('doctores/financiamientos')}}">Financiamientos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="dripicons-clockwise"></i>
                            <span>Registro</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('registros/venta-historica')}}">Venta Hist&oacute;rica</a>
                            </li>
                            <li>
                                <a href="{{url('registros/pacientes')}}">Registro de Pacientes</a>
                            </li>
                            <li>
                                <a href="{{url('registros/equipos')}}">Equipos Medicos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-truck-loading"></i>
                            <span>Distribuidores</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('distribuidores/distribuidor')}}">Distribuidor</a>
                            </li>
                            <li>
                                <a href="{{url('distribuidores/pedidos')}}">Pedidos Distribuidor</a>
                            </li>
                            <li>
                                <a href="{{url('distribuidores/precios')}}">Precios Distribuidor</a>
                            </li>
                            <li>
                                <a href="{{url('distribuidores/cupones')}}">Cupones</a>
                            </li>
                            <li>
                                <a href="{{url('distribuidores/novedades')}}">Novedades</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-assistive-listening-systems"></i>
                            <span>Implantes</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('implantes/pacientes')}}">Pacientes</a>
                            </li>
                            <li>
                                <a href="{{url('implantes/terapistas')}}">Terapistas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-wrench"></i>
                            <span>Mantenimiento</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('mantenimiento/productos')}}">Productos</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/cargos')}}">Cargos</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/proveedores')}}">Proveedores</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/categorias')}}">Tipos</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/marcas')}}">Marcas</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/pacientes')}}">Pacientes</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/contactos')}}">Contactos</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/sucursales')}}">Sucursales</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/servicios')}}">Servicios</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/clientes')}}">Clientes</a>
                            </li>
                            <li>
                                <a href="{{url('mantenimiento/cupones')}}">Cupones Impresos</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-graduation-hat"></i>
                            <span>Capacitaciones</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('capacitaciones/evaluaciones')}}">Evaluaciones</a>
                            </li>
                            <li>
                                <a href="{{url('capacitaciones/biblioteca')}}">Biblioteca</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-user"></i>
                            <span>Clientes</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('clientes/controles')}}">Controles</a>
                            </li>
                            <li>
                                <a href="{{url('clientes/hc')}}">Historia Clinica</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-processor"></i>
                            <span>Laboratorio</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('laboratorio/servicios')}}">Mis Servicios</a>
                            </li>
                            <li>
                                <a href="{{url('laboratorio/equipos')}}">Equipamiento Medico</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="{{url('javascript: void(0)')}};" class="side-nav-link">
                            <i class="mdi mdi-clipboard-list"></i>
                            <span>Historia Clinica</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('agenda/citas')}}">Citas</a>
                            </li>
                            <li>
                                <a href="{{url('agenda/buscar-cita')}}">Buscar Cita</a>
                            </li>
                            <li>
                                <a href="{{url('agenda/evolucion')}}">Evolucion</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="{{url('javascript: void(0)')}}" class="side-nav-link">
                            <i class="uil-card-atm"></i>
                            <span>Puntos</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('puntos/canje')}}">Canje</a>
                            </li>
                            <li>
                                <a href="{{url('puntos/premios')}}">Premios</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-sliders-v"></i>
                            <span>Configuracion</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('index.php')}}">Panel de inicio</a>
                            </li>
                            <li>
                                <a href="{{url('configuracion/sistema')}}">Sistema</a>
                            </li>
                            <li>
                                <a href="{{url('configuracion/usuarios')}}">Cuentas y Accesos</a>
                            </li>
                            <li>
                                <a href="{{url('configuracion/promociones')}}">Promociones</a>
                            </li>
                            <li>
                                <a href="{{url('configuracion/comisiones')}}">Comisiones</a>
                            </li>
                            <li>
                                <a href="{{url('configuracion/responsables')}}">Responsables de Proveedores</a>
                            </li>
                        </ul>
                    </li>
                    <li class="side-nav-item ">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-newspaper"></i>
                            <span>Planilla</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{url('planillas/descuentos')}}">Descuentos</a>
                            </li>
                            <li>
                                <a href="{{url('planillas/calcular')}}">Calcular</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- End Sidebar -->
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
        </div>