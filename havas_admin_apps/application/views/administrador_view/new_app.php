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
              <section class="panel">
                <header class="panel-heading font-bold">
                  Añadir Aplicación
                </header>
                <div class="panel-body">
                  <form id="new_app" class="form-horizontal" method="post" action="">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Rounded</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control rounded">                        
                      </div>
                    </div>                    
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <a href="#" id="enviar_newApp" class="btn btn-sm btn-default">Submit</a>
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