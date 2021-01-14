@extends('layouts.app')

@section('content')


                    <!-- end page title -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <input type="hidden" name="id_usuario" id="id_usuario" value="3">
                                <input type="hidden" id="hay_promociones" value="5">
                                <h4 class="text-center text-primary">Ventas</h4>
                                <div class="card-body p-1 p-md-4">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="row h-100 align-content-between">
                                                <div class="col-12">
                                                    <h5 class="text-primary text-center">Distribuidor</h5>
                                                    <table class="table table-striped table-sm">
                                                        <tr>
                                                            <th>Audífono</th>
                                                            <th>Cantidad</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Cheer 20</td>
                                                            <td>23</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cheer 40</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Journey 40</td>
                                                            <td>2</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enchant 20</td>
                                                            <td>15</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enchant 40</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enchant 60</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enchant 100</td>
                                                            <td>4</td>
                                                        </tr>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Total</th>
                                                                <th>44</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="col-12 mt-1">
                                                    <div class="row justify-content-between align-items-center">
                                                        <span class="col-6">Venta Total Neta </span><b class="h4 col-6 text-right">$ 19,317.80</b>
                                                    </div>
                                                    <div class="row justify-content-between align-items-center">
                                                        <span class="col-6">Venta Total </span><b class="h4 col-6 text-right">$ 22,795.00</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7  border border-top-0 border-bottom-0">
                                            <div class="row align-content-between">
                                                <h5 class=" col-12 text-primary text-center">Particular</h5>
                                                <div class="col-3">
                                                    <table class="table table-striped table-sm">
                                                        <tr>
                                                            <th>Audífono</th>
                                                            <th>Cantidad</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Cheer 20</td>
                                                            <td>29</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cheer 40</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Journey 40</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enchant 20</td>
                                                            <td>12</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enchant 40</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enchant 60</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enchant 100</td>
                                                            <td>10</td>
                                                        </tr>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Total</th>
                                                                <th>51</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="col-9">
                                                    <table class="table table-striped table-sm">
                                                        <tr>
                                                            <th>Sucursal</th>
                                                            <th>Venta</th>
                                                            <th>AC Nuevo</th>
                                                            <th>AC Conti</th>
                                                            <th>AC Cierre</th>
                                                            <th>Total</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Arequipa - Peral</td>
                                                            <td class="text-right">42,915.25</td>
                                                            <td class="text-right">2,542.37</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">1,694.92</td>
                                                            <th class="text-right">47,152.54</th>
                                                        </tr>
                                                        <tr>
                                                            <td>San Borja </td>
                                                            <td class="text-right">24,105.93</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <th class="text-right">24,105.93</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Piura</td>
                                                            <td class="text-right">15,559.32</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <th class="text-right">15,559.32</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Trujillo</td>
                                                            <td class="text-right">4,644.07</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">5,932.20</td>
                                                            <th class="text-right">10,576.27</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Tacna</td>
                                                            <td class="text-right">8,525.42</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">1,949.15</td>
                                                            <th class="text-right">10,474.58</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Arequipa - Umacollo</td>
                                                            <td class="text-right">7,279.66</td>
                                                            <td class="text-right">2,542.37</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <th class="text-right">9,822.03</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Chiclayo</td>
                                                            <td class="text-right">5,661.02</td>
                                                            <td class="text-right">84.75</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <th class="text-right">5,745.76</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Cuzco</td>
                                                            <td class="text-right">1,966.10</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <th class="text-right">1,966.10</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Huancayo</td>
                                                            <td class="text-right">1,593.22</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <th class="text-right">1,593.22</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Los Olivos </td>
                                                            <td class="text-right">1,194.92</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <th class="text-right">1,194.92</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Juliaca</td>
                                                            <td class="text-right">50.85</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <td class="text-right">0.00</td>
                                                            <th class="text-right">50.85</th>
                                                        </tr>
                                                        <tfoot>
                                                            <tr>
                                                                <th>TOTAL</th>
                                                                <th class="text-right">113,495.76</th>
                                                                <th class="text-right">5,169.49</th>
                                                                <th class="text-right">0.00</th>
                                                                <th class="text-right">9,576.27</th>
                                                                <th class="text-right">128,241.53</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row justify-content-between align-items-center">
                                                        <span class="col-6">Venta Total Neta </span><b class="h4 col-6 text-right">S/ 128,241.53</b>
                                                    </div>
                                                    <div class="row justify-content-between align-items-center">
                                                        <span class="col-6">Venta Total </span><b class="h4 col-6 text-right">S/ 151,325.00</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="row h-100 align-content-between">
                                                <div class="col-12">
                                                    <h5 class="text-center text-primary">Regional</h5>
                                                    <table class="table table-striped table-sm">
                                                        <tr>
                                                            <th>Licitación</th>
                                                            <td class="text-right">S/ 22,881.36</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Equipos</th>
                                                            <td class="text-right">S/ 0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Implantes</th>
                                                            <td class="text-right">S/ 47,152.54</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row justify-content-between align-items-center">
                                                        <span class="col-6">Venta Total Neta </span><b class="h4 col-6 text-right">S/ 70,033.90</b>
                                                    </div>
                                                    <div class="row justify-content-between align-items-center">
                                                        <span class="col-6">Venta Total </span><b class="h4 col-6 text-right">S/ 82,640.00</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="mx-1 text-primary">Visitas Medicas</h5>
                                <div class="card-body p-1 p-md-4">
                                    <div data-simplebar class="col-12" style="height: 340px;">
                                        <table class="table table-sm">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Asesora Regional</th>
                                                    <th class="text-center">N° Visitas</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>Maria Paola </td>
                                                <td class="text-center">3</td>
                                            </tr>
                                            <tr>
                                                <td>Bárbara</td>
                                                <td class="text-center">10</td>
                                            </tr>
                                            <tfoot>
                                                <tr>
                                                    <th>Total</th>
                                                    <th class="text-center">13</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="mx-1 text-primary">Asistencia </h5>
                                <div class="card-body p-1 p-md-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="col-12">
                                                <div class="bg-primary text-light h3 text-center rounded-circle pt-2" style="width: 50px; height: 50px; margin: 0 auto">
                                                    1 </div>
                                                <p class="text-muted text-center">
                                                    Faltas
                                                </p>
                                            </div>
                                            <table class="table table-striped table-sm">
                                                <tr>
                                                    <td>Yessica Milagritos</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <div class="col-12">
                                                <div class="bg-success text-light h3 text-center rounded-circle pt-2" style="width: 50px; height: 50px; margin: 0 auto">
                                                    4 </div>
                                                <p class="text-muted text-center">
                                                    Tardanzas
                                                </p>
                                            </div>
                                            <table class="table table-striped table-sm">
                                                <tr>
                                                    <td>Deyssi Fiorella (83 mins.)</td>
                                                </tr>
                                                <tr>
                                                    <td>Estefany Lizbeth(17 mins.)</td>
                                                </tr>
                                                <tr>
                                                    <td>Lidia(17 mins.)</td>
                                                </tr>
                                                <tr>
                                                    <td>Mary Luz (8 mins.)</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="mx-1 text-primary">Cumpleaños Doctores</h5>
                                <div class="card-body">
                                    <table class="table table-sm w-100">
                                        <tbody>
                                            <tr>
                                                <td><i class="mdi mdi-cake text-primary"></i> Roger Ernesto Rueda Zegarra</td>
                                                <td class="text-center">943535924</td>
                                            </tr>
                                            <tr>
                                                <td><i class="mdi mdi-cake text-primary"></i> Roger Ernesto Rueda Zegarra </td>
                                                <td class="text-center">943535924</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="row justify-content-center">
                                    <h5 class="mx-1 p-1 text-center bg-primary text-light col-6">Tabla de Posiciones</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="media bg-warning-lighten py-1 px-2 mb-1">
                                            <h2 class="mr-1"><span class="badge badge-warning">1</span></h2>
                                            <img class="mr-1 mr-xl-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/1579727830lidia.jpg" width="40" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Lidia Arredondo Pinares </h5>
                                                <span class="font-13">Arequipa - Peral</span>
                                            </div>
                                        </div>
                                        <div class="media bg-success-lighten py-1 px-2 mb-1">
                                            <h2 class="mr-1"><span class="badge badge-success">2</span></h2>
                                            <img class="mr-1 mr-xl-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/1579727957norma.jpg" width="40" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Norma Zarela Ramirez Minaya</h5>
                                                <span class="font-13">San Borja </span>
                                            </div>
                                        </div>
                                        <div class="media bg-info-lighten py-1 px-2 mb-1">
                                            <h2 class="mr-1"><span class="badge badge-info">3</span></h2>
                                            <img class="mr-1 mr-xl-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/1579727796karen.jpg" width="40" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Karen Yanett Ipanaque Alayo</h5>
                                                <span class="font-13">Piura</span>
                                            </div>
                                        </div>
                                        <div class="media bg-light-lighten py-1 px-2 mb-1">
                                            <h4 class="mr-1"><span class="badge badge-light">4</span></h4>
                                            <!-- <img class="mr-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/usuario.jpg" width="40" alt="Generic placeholder image"> -->
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Viviana Edith Sosa Maguiña</h5>
                                                <span class="font-13">Tacna</span>
                                            </div>
                                        </div>
                                        <div class="media bg-light-lighten py-1 px-2 mb-1">
                                            <h4 class="mr-1"><span class="badge badge-light">5</span></h4>
                                            <!-- <img class="mr-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/usuario.jpg" width="40" alt="Generic placeholder image"> -->
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Estefany Lizbeth Quispe Chavez</h5>
                                                <span class="font-13">Arequipa - Umacollo</span>
                                            </div>
                                        </div>
                                        <div class="media bg-light-lighten py-1 px-2 mb-1">
                                            <h4 class="mr-1"><span class="badge badge-light">6</span></h4>
                                            <!-- <img class="mr-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/1579728113yessica.jpg" width="40" alt="Generic placeholder image"> -->
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Yessica Milagritos Esteves Vidal</h5>
                                                <span class="font-13">Trujillo</span>
                                            </div>
                                        </div>
                                        <div class="media bg-light-lighten py-1 px-2 mb-1">
                                            <h4 class="mr-1"><span class="badge badge-light">7</span></h4>
                                            <!-- <img class="mr-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/1579727907paola.jpg" width="40" alt="Generic placeholder image"> -->
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Maria Paola Arbulu Montenegro</h5>
                                                <span class="font-13">Chiclayo</span>
                                            </div>
                                        </div>
                                        <div class="media bg-light-lighten py-1 px-2 mb-1">
                                            <h4 class="mr-1"><span class="badge badge-light">8</span></h4>
                                            <!-- <img class="mr-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/usuario.jpg" width="40" alt="Generic placeholder image"> -->
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Ceci Sprancer Celi Sánchez </h5>
                                                <span class="font-13">Trujillo</span>
                                            </div>
                                        </div>
                                        <div class="media bg-light-lighten py-1 px-2 mb-1">
                                            <h4 class="mr-1"><span class="badge badge-light">9</span></h4>
                                            <!-- <img class="mr-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/1584810425mary_luz.jpg" width="40" alt="Generic placeholder image"> -->
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Mary Luz Quispe Huillca </h5>
                                                <span class="font-13">Cuzco</span>
                                            </div>
                                        </div>
                                        <div class="media bg-light-lighten py-1 px-2 mb-1">
                                            <h4 class="mr-1"><span class="badge badge-light">10</span></h4>
                                            <!-- <img class="mr-3 rounded-circle" src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/catalogo/1591655570Deyssi.jpeg" width="40" alt="Generic placeholder image"> -->
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">Deyssi Fiorella Celestino Campos </h5>
                                                <span class="font-13">Huancayo</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade bs-example-modal-lg" id="popUp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Promociones Vigentes</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
                                                </ol>
                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active col-12">
                                                        <div class="carousel-caption" style="padding: 10px;background: #6666; font-weight: bolder;font-size: 20px;border-radius: 10px;bottom:45px;">
                                                            promo 03 Adhear </div>
                                                        <img src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/promociones/31..png" alt="promo 03 Adhear" style="height: 70vh;margin:0 auto">
                                                    </div>
                                                    <div class="carousel-item  col-12">
                                                        <div class="carousel-caption" style="padding: 10px;background: #6666; font-weight: bolder;font-size: 20px;border-radius: 10px;bottom:45px;">
                                                            Promo 01 Enchant </div>
                                                        <img src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/promociones/29..png" alt="Promo 01 Enchant" style="height: 70vh;margin:0 auto">
                                                    </div>
                                                    <div class="carousel-item  col-12">
                                                        <div class="carousel-caption" style="padding: 10px;background: #6666; font-weight: bolder;font-size: 20px;border-radius: 10px;bottom:45px;">
                                                            promo 02 Enchant </div>
                                                        <img src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/promociones/30..png" alt="promo 02 Enchant" style="height: 70vh;margin:0 auto">
                                                    </div>
                                                    <div class="carousel-item  col-12">
                                                        <div class="carousel-caption" style="padding: 10px;background: #6666; font-weight: bolder;font-size: 20px;border-radius: 10px;bottom:45px;">
                                                            Promo 04 Rondo 2 </div>
                                                        <img src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/promociones/34..png" alt="Promo 04 Rondo 2" style="height: 70vh;margin:0 auto">
                                                    </div>
                                                    <div class="carousel-item  col-12">
                                                        <div class="carousel-caption" style="padding: 10px;background: #6666; font-weight: bolder;font-size: 20px;border-radius: 10px;bottom:45px;">
                                                            Promo 05 Pilas </div>
                                                        <img src="https://sisperu.net/sistema/aplication/view/TPL2020/publicroot/imgs/promociones/35..png" alt="Promo 05 Pilas" style="height: 70vh;margin:0 auto">
                                                    </div>
                                                </div>
                                                <!-- Controls -->
                                                <a class="carousel-control-prev splash-control-carrusel" href="#carousel-example-generic" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next splash-control-carrusel" href="#carousel-example-generic" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                            <!-- Fin Template -->
                        </div>
                        <!-- container -->
@endsection
