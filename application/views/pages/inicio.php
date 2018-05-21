
        <!-- BEGIN: CONTENT/USER/SIGNUP-FORM -->
        <div class="modal fade c-content-login-form" id="signup-form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content c-square">
                    <div class="modal-header c-no-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="c-font-24 c-font-sbold">Create An Account</h3>
                        <p>Please fill in below form to create an account with us</p>
                        <form>
                            <div class="form-group">
                                <label for="signup-email" class="hide">Email</label>
                                <input type="email" class="form-control input-lg c-square" id="signup-email" placeholder="Email"> </div>
                            <div class="form-group">
                                <label for="signup-username" class="hide">Username</label>
                                <input type="email" class="form-control input-lg c-square" id="signup-username" placeholder="Username"> </div>
                            <div class="form-group">
                                <label for="signup-fullname" class="hide">Fullname</label>
                                <input type="email" class="form-control input-lg c-square" id="signup-fullname" placeholder="Fullname"> </div>
                            <div class="form-group">
                                <label for="signup-country" class="hide">Country</label>
                                <select class="form-control input-lg c-square" id="signup-country">
                                    <option value="1">Country</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Signup</button>
                                <a href="javascript:;" class="c-btn-forgot" data-toggle="modal" data-target="#login-form" data-dismiss="modal">Back To Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: CONTENT/USER/SIGNUP-FORM -->
        <!-- BEGIN: CONTENT/USER/LOGIN-FORM -->
        <div class="modal fade c-content-login-form" id="login-form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content c-square">
                    <div class="modal-header c-no-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="c-font-24 c-font-sbold">Good Afternoon!</h3>
                        <p>Let's make today a great day!</p>
                        <form>
                            <div class="form-group">
                                <label for="login-email" class="hide">Email</label>
                                <input type="email" class="form-control input-lg c-square" id="login-email" placeholder="Email"> </div>
                            <div class="form-group">
                                <label for="login-password" class="hide">Password</label>
                                <input type="password" class="form-control input-lg c-square" id="login-password" placeholder="Password"> </div>
                            <div class="form-group">
                                <div class="c-checkbox">
                                    <input type="checkbox" id="login-rememberme" class="c-check">
                                    <label for="login-rememberme" class="c-font-thin c-font-17">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> Remember Me </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Login</button>
                                <a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot">Forgot Your Password ?</a>
                            </div>
                            <div class="clearfix">
                                <div class="c-content-divider c-divider-sm c-icon-bg c-bg-grey c-margin-b-20">
                                    <span>or signup with</span>
                                </div>
                                <ul class="c-content-list-adjusted">
                                    <li>
                                        <a class="btn btn-block c-btn-square btn-social btn-twitter">
                                            <i class="fa fa-twitter"></i> Twitter </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-block c-btn-square btn-social btn-facebook">
                                            <i class="fa fa-facebook"></i> Facebook </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-block c-btn-square btn-social btn-google">
                                            <i class="fa fa-google"></i> Google </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer c-no-border">
                        <span class="c-text-account">Don't Have An Account Yet ?</span>
                        <a href="javascript:;" data-toggle="modal" data-target="#signup-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Signup!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: CONTENT/USER/LOGIN-FORM -->
        <!-- BEGIN: PAGE CONTAINER -->
        <div class="c-layout-page">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: LAYOUT/SLIDERS/REVO-SLIDER-4 -->
            <section class="c-layout-revo-slider c-layout-revo-slider-4" dir="ltr">
                <div class="tp-banner-container c-theme">
                    <div class="tp-banner rev_slider" data-version="5.0">
                        <ul>
                            <!--BEGIN: SLIDE #1 -->
                            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000">
                                <img alt="" src="<?=base_url();?>assets/images/bg-19.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                                <div class="tp-caption customin customout" data-x="center" data-y="center" data-hoffset="" data-voffset="-50" data-speed="500" data-start="1000" data-transform_idle="o:1;" data-transform_in="rX:0.5;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;"
                                    data-transform_out="rX:0.5;scaleX:0.75;scaleY:0.75;o:0;s:500;e:Back.easeInOut;" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="600">
                                    <h2 class="c-main-title-circle c-font-68 c-font-bold c-font-center c-font-uppercase c-font-white c-block">Sistema de Información Cientifica y <br>Tecnológia del Estado de Michoacán.</h2>
                                </div>
                            </li>
                            <!--END -->
                        </ul>
                    </div>
                </div>
            </section>
            <!-- END: LAYOUT/SLIDERS/REVO-SLIDER-4 -->
            <!-- BEGIN: CONTENT/FEATURES/FEATURES-1 -->
            <div class="c-content-box c-size-md c-bg-grey-1">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="c-content-feature-1 wow animate fadeInUp" data-wow-delay="0.1s">
                                <i class="far fa-address-book fa-5x c-content-line-icon c-theme"></i>
                                <h3 class="c-font-uppercase c-font-bold">Personacyt del Día</h3>
                                <button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Explore</button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="c-content-feature-1 wow animate fadeInUp" data-wow-delay="0.2s">
                                <i class="fas fa-chart-pie fa-5x c-content-line-icon c-theme"></i>
                                <h3 class="c-font-uppercase c-font-bold">Proyecto del <br> Día</h3>
                                <button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Explore</button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="c-content-feature-1 wow animate fadeInUp" data-wow-delay="0.4s">
                                <i class="fas fa-industry fa-5x c-content-line-icon c-theme"></i>
                                <h3 class="c-font-uppercase c-font-bold">Empresa del <br> Día</h3>
                                <button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Explore</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/FEATURES/FEATURES-1 -->

            <!-- BEGIN: CONTENT/TABS/TAB-1 -->
            <div class="c-content-box c-size-md c-no-bottom-padding c-overflow-hide">
                <div class="c-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="c-content-tab-2 c-theme c-opt-1">
                                <ul class="nav c-tab-icon-stack c-font-sbold c-font-uppercase">
                                    <li class="active">
                                        <a href="#c-tab2-opt1-1" data-toggle="tab">
                                            <i class="fas fa-search fa-5x c-content-line-icon"></i>
                                            <span class="c-title">ACCESO A CONSULTAS</span>
                                        </a>
                                        <div class="c-arrow"></div>
                                    </li>
                                    <li>
                                        <a href="#c-tab2-opt1-2" data-toggle="tab">
                                            <i class="fas fa-list-ul fa-5x c-content-line-icon"></i>
                                            <span class="c-title">ACCESO A INDICADORES</span>
                                        </a>
                                        <div class="c-arrow"></div>
                                    </li>
                                    <li>
                                        <a href="#c-tab2-opt1-3" data-toggle="tab">
                                            <i class="far fa-folder-open fa-5x c-content-line-icon"></i>
                                            <span class="c-title">ACCESO A PUBLICADOR</span>
                                        </a>
                                        <div class="c-arrow"></div>
                                    </li>
                                    <li>
                                        <a href="#c-tab2-opt1-4" data-toggle="tab">
                                            <i class="fas fa-users fa-5x c-content-line-icon"></i>
                                            <span class="c-title">ALTA PERSONA CYT</span>
                                        </a>
                                        <div class="c-arrow"></div>
                                    </li>
                                </ul>
                                <div class="c-tab-content">
                                    <div class="c-bg-img-center1 c-bg-white" >
                                        <div class="container">
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="c-tab2-opt1-1">
                                                    <div class="c-tab-pane">
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Estás interesado en buscar o consultar nuestro banco de información.</h4>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="c-content-feature-1 wow animate fadeInUp">
                                <i class="far fa-address-book fa-4x c-content-line-icon c-theme"></i>
                               <h3 class="c-font-uppercase c-font-bold">Investigadores</h4>
                                <button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Explore</button>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="c-content-feature-1 wow animate fadeInUp">
                                <i class="far fa-address-book fa-4x c-content-line-icon c-theme"></i>
                                <h3 class="c-font-uppercase c-font-bold">Personacyt del Día</h4>
                                <button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Explore</button>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="c-content-feature-1 wow animate fadeInUp" data-wow-delay="0.2s">
                                <i class="fas fa-chart-pie fa-4x c-content-line-icon c-theme"></i>
                                <h3 class="c-font-uppercase c-font-bold">Proyecto del Día</h4>
                                <button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Explore</button>
                            </div>
                        </div>
                        <div class="col-sm-3 c-card">
                            <div class="c-content-feature-1 wow animate fadeInUp" data-wow-delay="0.4s">
                                <i class="fas fa-industry fa-4x c-content-line-icon c-theme"></i>
                                <h3 class="c-font-uppercase c-font-bold">Empresa del Día</h4>
                                <button type="submit" class="btn c-btn-uppercase btn-md c-btn-bold c-btn-square c-theme-btn wow animate fadeIn">Explore</button>
                            </div>
                        </div>
                    </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="c-tab2-opt1-2">
                                                    <div class="c-tab-pane">
                                                        <img class="img-responsive" src="assets/base/img/content/stock2/04.jpg" alt="" />
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Optimzied For All Screen Sizes & Types</h4>
                                                        <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin "> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, exerci tation suscipit
                                                            lobortis nisl ut aliquip ex ea commodo consequat exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                                        <button class="btn btn-sm c-theme-btn c-btn-square c-btn-bold">
                                                        EXPLORE </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="c-tab2-opt1-3">
                                                    <div class="c-tab-pane">
                                                        <img class="img-responsive" src="assets/base/img/content/stock2/5.jpg" alt="" />
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Dedicated Support To All Customers</h4>
                                                        <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin "> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, exerci tation suscipit
                                                            enim ad minim veniam lobortis nisl ut aliquip ex ea commodo consequat exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                                        <button class="btn btn-sm c-theme-btn c-btn-square c-btn-bold">
                                                        EXPLORE </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="c-tab2-opt1-4">
                                                    <div class="c-tab-pane">
                                                        <img class="img-responsive" src="assets/base/img/content/stock2/06.jpg" alt="" />
                                                        <h4 class="c-font-30 c-font-thin c-font-uppercase c-font-bold">Coded By Developers For Developers</h4>
                                                        <p class="c-font-17 c-margin-b-20 c-margin-t-20 c-font-thin "> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed enim ad minim veniam diam nonummy nibh euismod tincidunt ut enim ad minim veniam laoreet dolore magna aliquam erat volutpat. Ut wisi
                                                            enim ad minim veniam, exerci tation suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                                        <button class="btn btn-sm c-theme-btn c-btn-square c-btn-bold"> EXPLORE </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: CONTENT/TABS/TAB-1 -->
            <!-- END: PAGE CONTENT -->
        </div>
        <!-- END: PAGE CONTAINER -->
