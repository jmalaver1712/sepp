<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?= validation_errors('<span class="error">', '</span>') ?>
<?= form_open("Preinscripcion/enviar") ?>
<label>Cédula*:</label><br>
<input type="number" name="cedula" value="<?= set_value("cedula") ?>" required min="0"><br>

<label>Código Uniminuto*:</label><br>
<input type="number" name="codigo" value="<?= set_value("codigo") ?>" required min="0"><br>

<label>Primer Nombre*:</label><br>
<input type="text" name="nombre1" value="<?= set_value("nombre1") ?>" required><br>

<label>Segundo Nombre:</label><br>
<input type="text" name="nombre2" value="<?= set_value("nombre2") ?>"><br>

<label>Primer Apellido*:</label><br>
<input type="text" name="apellido1" value="<?= set_value("apellido1") ?>" required><br>

<label>Segundo Apellido:</label><br>
<input type="text" name="apellido2" value="<?= set_value("apellido2") ?>"><br>

<label>Primer Email*:</label><br>
<input type="email" name="email1" value="<?= set_value("email1") ?>" required><br>

<label>Segundo Email:</label><br>
<input type="email" name="email2" value="<?= set_value("email2") ?>"><br>

<label>Teléfono Fijo:</label><br>
<input type="number" name="telFijo" value="<?= set_value("telFijo") ?>" min="0"><br>

<label>Celular:</label><br>
<input type="number" name="celular" value="<?= set_value("celular") ?>" min="0"><br>

<label>Facultad*:</label><br>
<select name="facultad" id="facultad" required>
    <option value="">Seleccione la facultad</option>
    <?php foreach ($facultades->result() as $value): ?>
        <option value="<?= $value->id ?>" <?= set_select("facultad", $value->id); ?> ><?= $value->nombre ?></option>
    <?php endforeach; ?>
</select><br>

<label>Programa*:</label><br>
<select name="programa" id="programa" required>
</select><br>

<label>Sede:</label><br>
<select name="sede" required>
    <option value="">Seleccione la Sede</option>
    <?php foreach ($sedes->result() as $value): ?>
        <option value="<?= $value->id ?>" <?= set_select("sede", $value->id); ?> ><?= $value->nombre ?></option>
    <?php endforeach; ?>
</select><br>
<button type="submit">Enviar</button>

<?= form_close() ?>
<script>
    $(document).ready(function() {
        $("#facultad").trigger("change");
    });

    $("#facultad").change(function() {
        var valor = $("#facultad").val();
        $("#programa").empty();
        if (valor !== "") {
            $.ajax({
                url: "<?= base_url("preinscripcion") ?>" + "/traerPrograma/" + valor,
                type: "POST",
                dataType: "json",
                success: function(msg) {
                    $("#programa").append("<option value=''>Seleccione el programa</option>");
                    for (i = 0; i < msg.length; i++) {
                        $("#programa").append("<option value='" + msg[i].id + "'>" + msg[i].nombre + "</option>");
                    }
                }

            });
        }

    });
</script>