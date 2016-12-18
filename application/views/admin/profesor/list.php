<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profesores
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("test") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profesores</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Main row -->
        <div class="row">
            <!-- right col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Chat box -->
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-2 col-md-offset-10 text-center">
                            <a href="<?= base_url() . "admin/profesor/add" ?>">
                                <button id="back" class="btn btn-small btn-block"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Nuevo</button>
                            </a>
                        </div>
                    </div>
                    <div class="box-body chat" id="chat-box">
                        <table id="data_table1" class="table table-bordered table-striped">
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
                                    <th>Facultad</th>
                                    <th>Estado</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?= $html ?>
                            </tbody>
                        </table>
                    </div><!-- /.chat -->
                    <div class="box-footer">

                    </div>
                </div><!-- /.box (chat box) -->
            </section>
            <!-- right col -->

        </div><!-- /.row (main row) -->

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <form id="submitOLD" method="post" action="<?= base_url() . "index.php/admin/profesor/batch" ?>">
                    <button id="btnsend" class="btn btn-success"><span class="glyphicon glyphicon-upload">&nbsp;</span>subir batch</button>
                </form>
            </div>
        </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->