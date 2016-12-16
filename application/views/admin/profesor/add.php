<?php require __DIR__.'/../../templates/header.php'; ?>

<div class="container">
    <br><br><br><br>
    <div class="row">
        <div class="col-md-10">
            <h1>Profesores</h1>
        </div>
        <div class="col-md-2 col-md-offset-10 text-center">
            
            <form id="cancel" method="post" action="<?= base_url()."index.php/admin/profesor" ?>">    
                <button id="back" class="btn btn-small btn-block"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Volver</button>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
          <form id="submitOLD" method="post" action="<?= base_url()."index.php/admin/profesor/create" ?>">    
                <div class="form-group">
                    <label class="control-label col-sm-4" for="nombre"><b>*</b> Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="apellido" id="nombre" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="nombre"><b>*</b> Apellido:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="apellido" id="apellido" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="nombre"><b>*</b> N&uacute;mero de c&eacute;dula:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="cedula" id="cedula" />
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-group-lg">
                            <span class="glyphicon glyphicon-save">&nbsp</span>Guardar
                        </button>
                    </div>
                </div>
            </form>  
        </div>
    </div>
    
</div> 

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Enviando recargas</h3>
            </div>
            <div class="modal-body" style="height: auto;">
                <div class="row">
                    <image class="important" src="<?= base_url()."/images/loader.gif"?>">
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__.'/../../templates/footer.php'; ?>

<script>
    $("#submit").submit(function(){
        $('#myModal').modal({
            keyboard : false,
            backdrop : 'static'
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

</body>
</html>