<?php require __DIR__.'/../../templates/header.php'; ?>

<div class="container">
    <br><br><br><br>
    <div class="row">
        <div class="col-md-10">
            <h1>Profesores</h1>
        </div>
        <div class="col-md-2 col-md-offset-10 text-center">
            
            <form id="cancel" method="post" action="<?= base_url()."index.php/admin/profesor/add" ?>">    
                <button id="back" class="btn btn-small btn-block"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Nuevo</button>
            </form>
        </div>
    </div>
    
    <div class="row">
        <hr>
        <table id="dataTable" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Programa</th>
                    <th>Facultad</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nombres</th>
                    <th>Programa</th>
                    <th>Estado</th>
                </tr>
            </tfoot>
            <tbody>
            <?= $html ?>
            </tbody>
        </table>
    </div>
    
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            <form id="submitOLD" method="post" action="<?= base_url()."index.php/admin/profesor/batch" ?>">
                <button id="btnsend" class="btn btn-success"><span class="glyphicon glyphicon-upload">&nbsp;</span>subir batch</button>
            </form>
        </div>
    </div>
    
</div> 

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Enviando batch</h3>
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

