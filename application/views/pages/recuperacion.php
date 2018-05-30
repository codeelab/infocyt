
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">

<div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">Inicio de Sesión</h3>
        </div>
        <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
            <li><a href="<?=base_url();?>" class="c-font-dark">Inicio</a></li>
            <li class="c-font-dark">/</li>
            <li><a href="<?=base_url('login');?>" class="c-font-dark">Inicio de Sesión</a></li>                    
        </ul>
    </div>
</div>


<!-- BEGIN: PAGE CONTENT -->
<div id="particles-js"></div>
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
                                Instituto de Ciencia, Tecnología e Innovación del Estado de Michoacán
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



                                 <?=form_open(base_url().'login/recovery')?>
                                  <div class="form-group">
                                        <label for="email" class="col-sm-3 control-label">Correo</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="correo_personal" id="correo_personal" class="form-control">
                                        <?php echo form_error('correo_personal', '<div class="alert alert-danger">', '</div>'); ?>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                        <label for="recuperacion" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-12">
                                        <input type="submit" value="Recuperación" class="btn btn-success btn-block">
                                    </div>
                                  </div>
                                    <div class="form-group">
                                        <label for="login" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-12">
                                        <a href="<?=base_url('login');?>">Inicio de sesión</a>
                                    </div>
                                  </div>
                                    <?php echo form_close(); ?>

                                    
                            </div>
                        </div>
                    </div>


                </div>

  
<!-- END: PAGE CONTENT -->





</div><!-- END: PAGE CONTAINER -->
