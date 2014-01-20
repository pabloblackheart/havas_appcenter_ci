<?php include("header.php");?>
<body>
  <section class="hbox stretch">
    <?php include("sidebar.php");?>
    <!-- .vbox -->
    <section id="content">
      <section class="hbox stretch">
        <aside class="aside bg-white b-r" id="subNav">
          <div class="wrapper b-b font-bold">Submenu Header</div>
          <ul class="nav">
            <li class="b-b"><a href="#">Phasellus at ultricies</a></li>
            <li class="b-b"><a href="#">Malesuada augue</a></li>
            <li class="b-b"><a href="#">Donec eleifend</a></li>
            <li class="b-b"><a href="#">Dapibus porta</a></li>
            <li class="b-b"><a href="#">Dacus eu neque</a></li>
          </ul>
        </aside>
        <aside>
          <section class="vbox">
            <header class="header bg-white b-b clearfix">
              <div class="row m-t-sm">
                <div class="col-sm-6 m-b-xs">
                  <a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-info active"><i class="fa fa-caret-right text fa fa-large"></i><i class="fa fa-caret-left text-active fa fa-large"></i></a>
                  <a href="new_app" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Create</a>
                </div>
                <div class="col-sm-6 m-b-xs">
                  <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                      <button class="btn btn-sm btn-white" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </header>
            <section class="scrollable wrapper w-f">
              <section class="panel">
                <div class="table-responsive">
                  <table class="table table-striped m-b-none">
                    <thead>
                      <tr>
                        <th width="20"><input type="checkbox"></th>
                        <th width="20"></th>
                        <th class="th-sortable" data-toggle="class">Nombre Aplicación
                          <span class="th-sort">
                            <i class="fa fa-sort-down text"></i>
                            <i class="fa fa-sort-up text-active"></i>
                            <i class="fa fa-sort"></i>
                          </span>
                        </th>
                        <th>App Id</th>
                        <th>App Secret</th>
                        <th>Fecha</th>
                        <th width="30"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($aplicaciones as $item): ?>
                      <tr>
                        <td><input type="checkbox" name="post[]" value="2"></td>
                        <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus"></i></a></td>
                        <td><?php echo $item['ap_nombre']; ?></td>
                        <td><?php echo $item['ap_appId']; ?></td>
                        <td><?php echo $item['ap_appSecret']; ?></td>
                        <td><?php echo $item['ap_fecha']; ?></td>
                        <td>
                          <a href="#" data-toggle="class"><i class="fa fa-check text-success text-active"></i><i class="fa fa-times text-danger text"></i></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </section>
            </section>
            <footer class="footer bg-white b-t">
              <div class="row m-t-sm text-center-xs">
                <div class="col-sm-4">
                  <select class="input-sm form-control input-s-sm inline">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                  </select>
                  <button class="btn btn-sm btn-white">Apply</button>                  
                </div>
                <div class="col-sm-4 text-center">
                  <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-4 text-right text-center-xs">                
                  <ul class="pagination pagination-sm m-t-none m-b-none">
                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                  </ul>
                </div>
              </div>
            </footer>
          </section>
        </aside>
      </section>      
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
    <!-- /.vbox -->
  </section>
  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Idrawfast 02/2013</h4>
        </div>
        <div class="modal-body">
          <p>This is a table in a modal, click the trash icon to remove the item</p>
          <section class="panel m-l-n-lg  m-r-n-lg m-b-none">
            <header class="panel-heading">
              <span class="label bg-danger pull-right">4 left</span>
              Tasks
            </header>
            <table class="table table-striped m-b-none text-sm">
              <thead>
                <tr>
                  <th>Progress</th>
                  <th>Item</th>                    
                  <th width="20"></th>
                </tr>
              </thead>
              <tbody>
                <tr id="item-1">
                  <td>
                    <div class="progress progress-sm progress-striped active m-t-xs m-b-none">
                      <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="80%" style="width: 80%"></div>
                    </div>
                  </td>
                  <td>App prototype design</td>
                  <td class="text-right">
                    <a href="#item-1" data-dismiss="alert"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <tr id="item-2">
                  <td>
                    <div class="progress progress-xs m-t-xs m-b-none">
                      <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="40%" style="width: 40%"></div>
                    </div>
                  </td>
                  <td>Design documents</td>
                  <td class="text-right">
                     <a href="#item-2" data-dismiss="alert"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <tr id="item-3">                    
                  <td>
                    <div class="progress progress-xs m-t-xs m-b-none">
                      <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="20%" style="width: 20%"></div>
                    </div>
                  </td>
                  <td>UI toolkit</td>
                  <td class="text-right">
                     <a href="#item-3" data-dismiss="alert"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <tr id="item-4">                    
                  <td>
                    <div class="progress progress-xs m-t-xs m-b-none">
                      <div class="progress-bar progress-bar-danger" data-toggle="tooltip" data-original-title="15%" style="width: 15%"></div>
                    </div>
                  </td>
                  <td>Testing</td>
                  <td class="text-right">
                     <a href="#item-4" data-dismiss="alert"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" data-loading-text="Updating...">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<?php include("footer.php");?>