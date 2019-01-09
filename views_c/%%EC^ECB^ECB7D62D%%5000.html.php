<?php /* Smarty version 2.6.30, created on 1546369333
         compiled from 5000.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
					<div class="card-header card-header-icon" data-background-color="black">
						<i class="material-icons">perm_identity</i>
					</div>
					<div class="card-content">
						<h4 class="card-title"> <strong>Personel Ekle</strong> - <small class="category">Personel Bilgilerini Giriniz</small></h4>

						<form id="editForm" method="post" action="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=5000&a=2">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label"  for="tc">Tc Kimlik No</label>
										<input type="text" class="form-control"  name ="d[tc]" maxlength="11" pattern="\d{11}" required id="tc">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">İsim</label>
										<input type="text" class="form-control" name ="d[name]" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Soyisim</label>
										<input type="text" class="form-control" name ="d[surname]">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">SSK No</label>
										<input type="text" class="form-control" name="d[ssk_no]" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">GSM</label>
										<input type="text"  pattern="\d{10}" class="form-control" name="d[gsm]" >
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Görevi</label>
										<input  type="search" list="duty_code"  class="form-control" name ="d[duty_id]" >
											<datalist id="duty_code">
												<?php $_from = $this->_tpl_vars['duty_codes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
													<option id="<?php echo $this->_tpl_vars['item']->id; ?>
" value="<?php echo $this->_tpl_vars['item']->name; ?>
"> <?php echo $this->_tpl_vars['item']->name; ?>
 </option>	
												<?php endforeach; endif; unset($_from); ?>
											</datalist>
										</input>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">İşe Giriş Tarihi</label>
										<input type="text" class="form-control datepicker" name ="d[employment_date]" />

									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group ">
										<label class="control-label">İşten Ayrılış Tarihi</label>
										
										<input  type="dateTime" class="form-control datepicker"  name ="d[employment_end_date]">
									</div>
								</div>
							</div>


							<button type="submit" class="btn btn-rose pull-right">Ekle</button>
						</form>
					</div>
				</div>
			</div>
		</div>		

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "foot.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>