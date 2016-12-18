<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">

            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <div class="box box-success">

                    <div class="box-header">
                        <div class="col-md-2 col-md-offset-10 text-center">
                            <a href="<?= base_url() . "admin/profesor" ?>">
                                <button id="back" class="btn btn-small btn-block"><span class="glyphicon glyphicon-arrow-left">&nbsp;</span>Volver</button>
                            </a>
                        </div>
                    </div>
                    <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong><i class="icon fa fa-check"></i>', '</strong>
                        </div>') ?>
                    <?= form_open("Preinscripcion/enviar", "id='demo-form2'") ?>
                    <div class="box-body">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong><i class="icon fa fa-check"></i> Profesor creado correctamente!</strong>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cédula<span class="required">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-barcode"></i>
                                    </div>
                                    <input type="number" id="cedula" name="cedula" value="<?= set_value("cedula") ?>" class="form-control" required="required"  min="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Código Uniminuto<span class="required">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-barcode"></i>
                                    </div>
                                    <input type="number" id="codigo_uniminuto" name="codigo_uniminuto" value="<?= set_value("codigo_uniminuto") ?>" required="required" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Primer Nombre<span class="required">*</span>
                                </label>
                                <div class="input-group">   
                                    <div class="input-group-addon">  
                                        <i class="fa fa-user"></i>    
                                    </div>
                                    <input type="text" id="nombre" name="nombre" value="<?= set_value("nombre") ?>" required="required" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Segundo Nombre
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">  
                                        <i class="fa fa-user"></i>   
                                    </div>
                                    <input type="text" id="nombre2" name="nombre2" value="<?= set_value("nombre2") ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Primer Apellido<span class="required">*</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon"> 
                                        <i class="fa fa-user"></i> 
                                    </div>
                                    <input type="text" id="apellido" name="apellido" value="<?= set_value("apellido") ?>" required="required" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Segundo Apellido
                                </label>
                                <div class="input-group">         
                                    <div class="input-group-addon"> 
                                        <i class="fa fa-user"></i>  
                                    </div>
                                    <input type="text" id="apellido2" name="apellido2" value="<?= set_value("apellido2") ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Primer Email<span class="required">*</span>
                                </label>
                                <div class="input-group">           
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" id="email1" name="email1" value="<?= set_value("email1") ?>" required="required" class="form-control" >
                                </div>
                            </div>

                        </div> <!-- col-md-6 -->

                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Segundo Email
                                </label>
                                <div class="input-group">         
                                    <div class="input-group-addon">      
                                        <i class="fa fa-envelope"></i>   
                                    </div>
                                    <input type="email" id="email2" name="email2" value="<?= set_value("email2") ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Teléfono Fijo
                                </label>
                                <div class="input-group">         
                                    <div class="input-group-addon"> 
                                        <i class="fa fa-phone"></i>       
                                    </div>
                                    <input type="number" id="telefono_fijo" name="telefono_fijo" value="<?= set_value("telefono_fijo") ?>" class="form-control" min="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Celular
                                </label>
                                <div class="input-group">         
                                    <div class="input-group-addon">  
                                        <i class="fa fa-phone"></i>   
                                    </div>
                                    <input type="number" id="celular" name="celular" value="<?= set_value("celular") ?>" class="form-control" min="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Facultad<span class="required">*</span>
                                </label>
                                <div class="input-group">        
                                    <div class="input-group-addon">                
                                        <i class="fa fa-institution"></i>              
                                    </div>
                                    <select name="id_facultad" id="id_facultad" required="required" class="form-control">
                                        <option value="">Seleccione la facultad</option>
                                        <?php foreach ($facultades->result() as $value): ?>
                                            <option value="<?= $value->id ?>" <?= set_select("id_facultad", $value->id); ?> ><?= $value->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Programa<span class="required">*</span>
                                </label>
                                <div class="input-group">            
                                    <div class="input-group-addon">  
                                        <i class="fa fa-graduation-cap"></i> 
                                    </div>
                                    <select name="id_programa" id="id_programa" required="required" class="form-control">
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Sede<span class="required">*</span>
                                </label>
                                <div class="input-group">           
                                    <div class="input-group-addon">    
                                        <i class="fa fa-home"></i>    
                                    </div>
                                    <select name="id_sede" id="id_sede" required="required" class="form-control">
                                        <option value="">Seleccione la Sede</option>
                                        <?php foreach ($sedes->result() as $value): ?>
                                            <option value="<?= $value->id ?>" <?= set_select("id_sede", $value->id); ?> ><?= $value->nombre ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <?= form_close() ?>

                </div><!-- /.box -->

            </section>
            <!-- Left col -->

        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    $(document).ready(function() {
        $("#id_facultad").trigger("change");
    });

    $("#id_facultad").change(function() {
        var valor = $("#id_facultad").val();
        $("#id_programa").empty();
        if (valor !== "") {
            $.ajax({
                url: "<?= base_url("admin/profesor") ?>" + "/traerPrograma/" + valor,
                type: "POST",
                dataType: "json",
                success: function(msg) {
                    $("#id_programa").append("<option value=''>Seleccione el programa</option>");
                    for (i = 0; i < msg.length; i++) {
                        $("#id_programa").append("<option value='" + msg[i].id + "'>" + msg[i].nombre + "</option>");
                    }
                }

            });
        }

    });
</script>