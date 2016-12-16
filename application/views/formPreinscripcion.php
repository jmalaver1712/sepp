<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?= validation_errors('<span class="error">', '</span>') ?>
<?= form_open("Preinscripcion/enviar", "id='demo-form2' data-parsley-validate class='form-horizontal form-label-left'") ?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cedula">Cédula<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="number" id="cedula" name="cedula" value="<?= set_value("cedula") ?>" required="required" class="form-control col-md-7 col-xs-12" min="0">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo_uniminuto">Código Uniminuto<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="number" id="codigo_uniminuto" name="codigo_uniminuto" value="<?= set_value("codigo_uniminuto") ?>" required="required" class="form-control col-md-7 col-xs-12" >
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Primer Nombre<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="nombre" name="nombre" value="<?= set_value("nombre") ?>" required="required" class="form-control col-md-7 col-xs-12" >
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre2">Segundo Nombre
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="nombre2" name="nombre2" value="<?= set_value("nombre2") ?>" class="form-control col-md-7 col-xs-12" >
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Primer Apellido<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="apellido" name="apellido" value="<?= set_value("apellido") ?>" required="required" class="form-control col-md-7 col-xs-12" >
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido2">Segundo Apellido
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" id="apellido2" name="apellido2" value="<?= set_value("apellido2") ?>" class="form-control col-md-7 col-xs-12" >
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email1">Primer Email<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="email" id="email1" name="email1" value="<?= set_value("email1") ?>" required="required" class="form-control col-md-7 col-xs-12" >
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email2">Segundo Email
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="email" id="email2" name="email2" value="<?= set_value("email2") ?>" class="form-control col-md-7 col-xs-12" >
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono_fijo">Teléfono Fijo
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="number" id="telefono_fijo" name="telefono_fijo" value="<?= set_value("telefono_fijo") ?>" class="form-control col-md-7 col-xs-12" min="0">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">Celular
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="number" id="celular" name="celular" value="<?= set_value("celular") ?>" class="form-control col-md-7 col-xs-12" min="0">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_facultad">Facultad<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="id_facultad" id="id_facultad" required="required" class="form-control col-md-7 col-xs-12">
            <option value="">Seleccione la facultad</option>
            <?php foreach ($facultades->result() as $value): ?>
                <option value="<?= $value->id ?>" <?= set_select("id_facultad", $value->id); ?> ><?= $value->nombre ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_programa">Programa<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="id_programa" id="id_programa" required="required" class="form-control col-md-7 col-xs-12">
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_sede">Sede<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="id_sede" id="id_sede" required="required" class="form-control col-md-7 col-xs-12">
            <option value="">Seleccione la Sede</option>
            <?php foreach ($sedes->result() as $value): ?>
                <option value="<?= $value->id ?>" <?= set_select("id_sede", $value->id); ?> ><?= $value->nombre ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-primary">Cancel</button>
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>

<?= form_close() ?>
<script>
    $(document).ready(function() {
        $("#id_facultad").trigger("change");
    });

    $("#id_facultad").change(function() {
        var valor = $("#id_facultad").val();
        $("#id_programa").empty();
        if (valor !== "") {
            $.ajax({
                url: "<?= base_url("preinscripcion") ?>" + "/traerPrograma/" + valor,
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