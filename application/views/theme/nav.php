        <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
        <!-- BEGIN: HEADER -->
        <header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
            <div class="c-navbar">
                <div class="container">
                    <!-- BEGIN: BRAND -->
                    <div class="c-navbar-wrapper clearfix">
                        <div class="c-brand c-pull-left">
                            <a href="<?=base_url();?>" class="c-logo">
                                <img src="<?=base_url();?>assets/img/infocyt.png" alt="INFOCYT" class="c-desktop-logo" width="250px" heigth="85px">
                                <img src="<?=base_url();?>assets/img/infocyt.png" alt="INFOCYT" class="c-desktop-logo-inverse" width="120px" heigth="30px">
                                <img src="<?=base_url();?>assets/img/infocyt.png" alt="INFOCYT" class="c-mobile-logo" width="110px" heigth="30px"> 
                            </a>
                            <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                                <span class="c-line"></span>
                                <span class="c-line"></span>
                                <span class="c-line"></span>
                            </button>
                            <button class="c-topbar-toggler" type="button">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                        </div>
                        <!-- END: BRAND -->

                        <!-- BEGIN: HOR NAV -->
                        <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                        <!-- BEGIN: MEGA MENU -->
                        <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                        <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                            <ul class="nav navbar-nav c-theme-nav">
                                <li>
                                    <a href="<?=base_url('infocyt');?>" class="c-link dropdown-toggle">INFOCYT
                                        <span class="c-arrow c-toggler"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('registro');?>" class="c-link dropdown-toggle">REGISTRO
                                        <span class="c-arrow c-toggler"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('consultas');?>" class="c-link dropdown-toggle">CONSULTAS
                                        <span class="c-arrow c-toggler"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('indicadores');?>" class="c-link dropdown-toggle">INDICADORES
                                        <span class="c-arrow c-toggler"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('publicador');?>" class="c-link dropdown-toggle">PUBLICADOR
                                        <span class="c-arrow c-toggler"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('contacto');?>" class="c-link dropdown-toggle">CONTACTO
                                        <span class="c-arrow c-toggler"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url('login');?>" class="c-link dropdown-toggle">INICIO DE SESIÓN
                                        <span class="c-arrow c-toggler"></span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- END: MEGA MENU -->
                        <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                        <!-- END: HOR NAV -->
                    </div>
                </div>
            </div>
        </header>
        <!-- END: HEADER -->
        <!-- END: LAYOUT/HEADERS/HEADER-1 -->