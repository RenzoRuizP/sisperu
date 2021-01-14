    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Configuración</h5>
        </div>
        <div class="rightbar-content h-100" data-simplebar>
            <div class="p-3">
                <!-- Settings -->
                <h5 class="mt-3">Esquema de Color</h5>
                <hr class="mt-1" />
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light" id="light-mode-check" checked />
                    <label class="custom-control-label" for="light-mode-check">Modo Claro</label>
                </div>
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
                    <label class="custom-control-label" for="dark-mode-check">Modo Oscuro</label>
                </div>
                <!-- Width -->
                <h5 class="mt-4">Ancho</h5>
                <hr class="mt-1" />
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked />
                    <label class="custom-control-label" for="fluid-check">Rectangulo</label>
                </div>
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
                    <label class="custom-control-label" for="boxed-check">Cuadrado</label>
                </div>
                <!-- Left Sidebar-->
                <h5 class="mt-4">Barra Menu</h5>
                <hr class="mt-1" />
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="theme" value="default" id="default-check" checked />
                    <label class="custom-control-label" for="default-check">Por Defecto</label>
                </div>
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="theme" value="light" id="light-check" />
                    <label class="custom-control-label" for="light-check">Claro</label>
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="radio" class="custom-control-input" name="theme" value="dark" id="dark-check" />
                    <label class="custom-control-label" for="dark-check">Oscuro</label>
                </div>
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="compact" value="fixed" id="fixed-check" checked />
                    <label class="custom-control-label" for="fixed-check">Estático</label>
                </div>
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="compact" value="condensed" id="condensed-check" />
                    <label class="custom-control-label" for="condensed-check">Minimizado</label>
                </div>
                <div class="custom-control custom-switch mb-1">
                    <input type="radio" class="custom-control-input" name="compact" value="scrollable" id="scrollable-check" />
                    <label class="custom-control-label" for="scrollable-check">Deslizable</label>
                </div>
                <button class="btn btn-primary btn-block mt-4" id="resetBtn">Restablecer</button>
            </div> <!-- end padding-->
        </div>
    </div>
    <div class="rightbar-overlay"></div>
    <!-- /Right-bar -->