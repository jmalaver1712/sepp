<?php require __DIR__.'/../templates/header.php'; ?>

<div class="container">
    <br><br><br><br>
    <div class="row">
        <div class="col-md-10">
            <h1>Bienvenido, <?= $this->session->userdata('nombre') ?></h1>
        </div>
    </div>
    
    <div class="row">
        <hr>
        <div class="well well-sm warning">
            <span class="glyphicon glyphicon-warning-sign">&nbsp;</span> Dashboard de Administrador.
        </div>
        
    </div>
    
</div> 


<?php require __DIR__.'/../templates/footer.php'; ?>

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