<?php include("header.php");?>
<body>
  <section class="hbox stretch">
    <?php include("sidebar.php"); ?>
    <!-- .vbox -->
    <section id="content">
      <section class="vbox">
        <section class="scrollable wrapper">
          <div class="tab-content">
            <section class="tab-pane active" id="basic">
            <div class="alert alert-danger" style="display:none;">
              <strong>¡Error!</strong> No ha sido posible guardar la aplicación
            </div>
            <div class="alert alert-success" style="display:none;">
              <strong>¡La aplicación ha sido guardada exitosamente!</strong>
            </div>
              <section class="panel">
                <header class="panel-heading font-bold">
                  Añadir Aplicación
                </header>
                <div class="panel-body">
                  <form name="form_new_app" id="form_new_app" class="form-horizontal" method="post" action="">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nombre Aplicación</label>
                      <div class="col-sm-10">
                        <input type="text" name="app_name" class="form-control rounded">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">App Id Aplicación</label>
                      <div class="col-sm-10">
                        <input type="text" name="app_id" class="form-control rounded" onkeypress="return validanum(event)">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">App Secret Aplicación</label>
                      <div class="col-sm-10">
                        <input type="text" name="app_secret" class="form-control rounded">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Compartir - Titulo</label>
                      <div class="col-sm-10">
                        <input type="text" name="app_title" class="form-control rounded">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Compartir - Descripción</label>
                      <div class="col-sm-10">
                        <input type="text" name="app_description" class="form-control rounded">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Invitar - Mensaje</label>
                      <div class="col-sm-10">
                        <input type="text" name="app_message" class="form-control rounded">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Analytics</label>
                      <div class="col-sm-10">
                        <input type="text" name="app_analytics" class="form-control rounded">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Link Fanpage</label>
                      <div class="col-sm-10">
                        <input type="text" name="app_fanpage_link" class="form-control rounded">
                      </div>
                    </div>

                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-sm btn-default">Submit</a>
                      </div>
                    </div>
                  </form>
                </div>
              </section>
            </section>
          </div>
        </section>
      </section>
    </section>
    <!-- /.vbox -->
  </section>
<?php include("footer.php");?>