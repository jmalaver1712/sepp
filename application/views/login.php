<?php require __DIR__.'/templates/header.php'; ?>

<div class="container">
    
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <br /><br /><br /><br />
            <h3>Ingreso a Administraci&oacute;n</h3>
        </div>
    </div>    
    <div class="row">
        
        <div class="col-md-4 col-md-offset-4">
            <?php if($this->session->flashdata('error') !== FALSE && $this->session->flashdata('error') != ""){ ?>
            <div class="well well-sm danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
            <?php } ?>
                
            <?= validation_errors('<div class="well alert-danger">', '</div>') ?>
            <?= form_open("user/login", "id='login' data-parsley-validate class='form-signin'") ?>
                <div class="form-group">
                    <input type="text" id="username" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Ingresar</button>
                </div>
            
            <?= form_close() ?>
        </div>
        
    </div>
    
</div>

<?php require __DIR__.'/templates/footer.php'; ?>
