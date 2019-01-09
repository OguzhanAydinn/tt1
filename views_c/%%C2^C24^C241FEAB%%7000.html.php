<?php /* Smarty version 2.6.30, created on 1546636147
         compiled from 7000.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="wrapper">

	    
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "2000.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="main-panel">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "1.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="content">
					<div class="container-fluid">
					 	    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>

                <div class="card-content">
                    <h4 class="card-title">Personel Listesi</h4>
                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>TC</th>
                                    <th>İsim</th>
                                    <th>Soyisim</th>
                                    <th>Görevi</th>
                                    <th>SSK NO</th>
                                    <th class="disabled-sorting text-right">İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $_from = $this->_tpl_vars['personnels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
									<tr>
										<td><?php echo $this->_tpl_vars['item']->tc; ?>
</td>
										<td><?php echo $this->_tpl_vars['item']->name; ?>
</td>
										<td><?php echo $this->_tpl_vars['item']->surname; ?>
</td>
										<td><?php echo $this->_tpl_vars['item']->duty_id; ?>
</td>
										<td><?php echo $this->_tpl_vars['item']->ssk; ?>
</td>
										<td class="text-right">
											<a href="datatables.net.html#" class="btn btn-simple btn-warning btn-icon edit">Detay  <i class="material-icons">dvr</i></a>
											<a href="datatables.net.html#" class="btn btn-simple btn-danger btn-icon remove">Sil <i class="material-icons">close</i></a>
										</td>
									</tr>
                                <?php endforeach; endif; unset($_from); ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end content-->
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->

					</div>
				</div>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer_scripts.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>