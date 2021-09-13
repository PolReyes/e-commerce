<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{Request::is("/")? 'active': ''}}">
                        <a href="/home"><i class="menu-icon fa fa-laptop"></i>Panel Principal </a>
                    </li>
                    <li class="menu-title">Administración</li><!-- /.menu-title -->
                    <li class="{{Request::is("/productos*")? 'active': ''}}">
                        <a href="{{route('clientes.index')}}" aria-haspopup="true"> <i class="menu-icon fa fa-users"></i>Clientes</a>                        
                    </li>
                    <li class="{{Request::is("/productos*")? 'active': ''}}">
                        <a href="{{route('productos.index')}}" aria-haspopup="true"> <i class="menu-icon fa fa-shopping-cart"></i>Productos</a>                        
                    </li>
                    <li class="{{Request::is("/ventas*")? 'active': ''}}">
                        <a href="{{route('ventas.index')}}" aria-haspopup="true"> <i class="menu-icon fa fa-money"></i>Ventas</a>                        
                    </li>
                    <!--<li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>-->

                    <li class="menu-title">Reportes</li><!-- /.menu-title -->
                    <li class="{{Request::is("reporte/venta*")? 'active': ''}}">
                        <a href="{{route('reportes.ventas')}}" aria-haspopup="true"> <i class="menu-icon fa fa-line-chart"></i>Ventas</a>                        
                    </li>
                    <li class="{{Request::is("reporte/cliente*")? 'active': ''}}">
                        <a href="{{route('reportes.clientes')}}" aria-haspopup="true"> <i class="menu-icon fa fa-pie-chart"></i>Clientes</a>                        
                    </li>
                    
                    <li class="menu-title">Configuración</li><!-- /.menu-title -->

                    <li class="{{ Request::is("usuarios*") ? 'active' : ''  }}">
                        <a href="{{ route('usuarios.index') }}" aria-haspopup="true"> <i class="menu-icon fa fa-users"></i> Usuarios</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>