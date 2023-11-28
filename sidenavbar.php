    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Página Principal</div>
                    <a class="nav-link" href="Home_Cliente.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Inicio
                    </a>
                    <div class="sb-sidenav-menu-heading">Opciones</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Opciones de Pago
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="CrudFront/Metodo_pago/añadir.php">Añadir Método de Pago</a>
                            <a class="nav-link" href="CrudFront/Metodo_pago/metodos_guardados.php">Métodos de Pago Guardados</a>
                            <a class="nav-link" href="CrudFront/Fondos/añadir_fondos.php">Añadir Fondos</a> 
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Facturación
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="CrudFront/Facturacion/facturacion.php">Facturas</a>
                            <a class="nav-link" href="#">Opcion 2</a>
                            <a class="nav-link" href="#">Opcion 3</a> 
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Usuario
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="CrudFront/Usuario/info_usuario.php">Información de Usuario</a>
                            <a class="nav-link" href="#">Eliminar Cuenta</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Cumplimiento Normativo</div>
                    <a class="nav-link collapsed" href="CrudFront/Normatividad/normatividad.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Normatividad
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small"></div>
            </div>
        </nav>
    </div>