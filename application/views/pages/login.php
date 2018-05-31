
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">

<!-- BEGIN: PAGE CONTENT -->
<div id="particles-js"></div>
<div class="container-fluid">
                 <div class="row">

                    <div class="animate pulse">
                        <p style="text-align:center;">
                            <a href="http://icti.michoacan.gob.mx" target="_blank">
                                <img src="<?=base_url();?>assets/images/michoacan.png" width="250" border="0" title="Portal principal">
                            </a>
                        </p>
                    </div>
                    <div class="col-sm-offset-4 col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="c-center">Instituto de Ciencia, Tecnología e Innovación del Estado de Michoacán</h3>
                            </div>
                            <div class="panel-body">

                                <?php if($this->session->flashdata('success')){ ?>
                                        <div class="alert alert-success">
                                            <strong>Genial!</strong> <?php echo $this->session->flashdata('success'); ?>
                                        </div>
                                    <?php }else if($this->session->flashdata('error')){  ?>
                                        <div class="alert alert-danger">
                                            <strong>Oops!</strong> <?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                    <?php } ?>


                                 <?php $atrib = array('id' => 'loggin', 'autocomplete'=> 'off');
                                    echo form_open('login/acceso', $atrib); ?>
                                   <div class="form-group">
                                        <label for="usuario" class="col-sm-3 form-text">Usuario</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="username" id="username" class="form-control c-theme c-square input-lg" value="<?php echo set_value('username') ?>">
                                        <?php echo form_error('username', '<div class="alert alert-danger">', '</div>'); ?>
                                    </div>

                                  </div>
                                  <div class="form-group">
                                        <label for="password" class="col-sm-3 form-text">Contraseña</label>
                                    <div class="col-sm-12">
                                        <input type="password" name="password" id="password" class="form-control c-theme c-square input-lg">
                                        <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-12">
                                        <input type="submit" value="Inicio de sesión" class="btn c-theme-btn c-btn-uppercase btn-lg c-btn-square btn-block">
                                    </div>
                                  </div>
                                    <?php echo form_close(); ?>

                                    <div class="form-group">
                                        <label for="recuperacion" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-12">
                                        <a href="<?=base_url('recuperacion');?>">Olvidaste tu contraseña?</a>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>

  
</div><!-- END: PAGE CONTENT -->





</div><!-- END: PAGE CONTAINER -->
