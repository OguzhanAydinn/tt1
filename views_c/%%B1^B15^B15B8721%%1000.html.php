<?php /* Smarty version 2.6.30, created on 1546636073
         compiled from 1000.html */ ?>

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
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="orange">
                                <i class="material-icons">group</i>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Kayıtlı Personel Sayısı</strong></p>
                                <h3 class="card-title"><?php echo $this->_tpl_vars['dashboard']->countPersons; ?>
</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i> <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=7000&a=0">Detaylı Personel Listesi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">notification_important</i>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong> Önemli Hatırlatmalar</strong> </p>
                                <h3 class="card-title"><?php echo $this->_tpl_vars['dashboard']->notification; ?>
</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">warning</i> <a href="dashboard.html#pablo">Görmek İçin Tıklayınız.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">build</i>
                            </div>
                            <div class="card-content">
                                <p class="category"><strong>Toplam Makine Sayısı </strong> </p>
                                <h3 class="card-title"><?php echo $this->_tpl_vars['dashboard']->machines; ?>
</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i> <a href="dashboard.html#pablo">Detaylar için Tıklayınız</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header" data-background-color="blue">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Buraya ne gelir bilemedim</p>
                                <h3 class="card-title">blabla</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <br><br>


<div class="row">
	<div class="col-md-4">
		<div class="card card-chart">
			<div class="card-header" data-background-color="rose" data-header-animation="true">
				<div class="ct-chart" id="websiteViewsChart"></div>
			</div>
			<div class="card-content">
				<div class="card-actions">
					<button type="button" class="btn btn-danger btn-simple fix-broken-card">
						<i class="material-icons">build</i> Fix Header!
					</button>

					<button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Yenile">
						<i class="material-icons">refresh</i>
					</button>
					<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Düzenle">
						<i class="material-icons">edit</i>
					</button>
				</div>

				<h4 class="card-title">Aylık Tonaj Çizelgesi</h4>
				<p class="category">Sol Taraf : Tonaj  - Alt Taraf : Aylar.</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> 
				</div>
			</div>

		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-chart">
			<div class="card-header" data-background-color="green" data-header-animation="true">
				<div class="ct-chart" id="dailySalesChart"></div>
			</div>
			<div class="card-content">
				<div class="card-actions">
					<button type="button" class="btn btn-danger btn-simple fix-broken-card">
						<i class="material-icons">build</i> Fix Header!
					</button>

					<button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
						<i class="material-icons">refresh</i>
					</button>
					<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
						<i class="material-icons">edit</i>
					</button>
				</div>

				<h4 class="card-title">Geçen Ay'a Göre İş Artışı</h4>
				<p class="category"><span class="text-success"><i class="fa fa-long-arrow-up"></i> 55%  </span> !! Palet Sayısına Göre Hesaplanmıştır.</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> updated 4 minutes ago
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-chart">
			<div class="card-header" data-background-color="blue" data-header-animation="true">
				<div class="ct-chart" id="completedTasksChart"></div>
			</div>
			<div class="card-content">
				<div class="card-actions">
					<button type="button" class="btn btn-danger btn-simple fix-broken-card">
						<i class="material-icons">build</i> Fix Header!
					</button>

					<button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
						<i class="material-icons">refresh</i>
					</button>
					<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
						<i class="material-icons">edit</i>
					</button>
				</div>

				<h4 class="card-title">Tamamlanan Palet </h4>
				<p class="category">Aylık Tamamlanan Palet Sayısı</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> campaign sent 2 days ago
				</div>
			</div>
		</div>
	</div>
</div>

<h3>Manage Listings</h3>
<br>
<div class="row">
<div class="col-md-4">
    <div class="card card-product">
        <div class="card-image" data-header-animation="true">
            <a href="dashboard.html#pablo">
                <img class="img" src="../tt1/img/card-2.jpeg">
            </a>
        </div>

        <div class="card-content">
            <div class="card-actions">
                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                    <i class="material-icons">build</i> Fix Header!
                </button>

                <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                    <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                    <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                    <i class="material-icons">close</i>
                </button>
            </div>

            <h4 class="card-title">
                <a href="dashboard.html#pablo">Cozy 5 Stars Apartment</a>
            </h4>
            <div class="card-description">
                The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona.
            </div>
        </div>
        <div class="card-footer">
            <div class="price">
                <h4>$899/night</h4>
            </div>
            <div class="stats pull-right">
                <p class="category"><i class="material-icons">place</i> Barcelona, Spain</p>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-product">
        <div class="card-image" data-header-animation="true">
            <a href="dashboard.html#pablo">
                <img class="img" src="../tt1/img/card-3.jpeg">
            </a>
        </div>

        <div class="card-content">
            <div class="card-actions">
                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                    <i class="material-icons">build</i> Fix Header!
                </button>

                <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                    <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                    <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                    <i class="material-icons">close</i>
                </button>
            </div>

            <h4 class="card-title">
                <a href="dashboard.html#pablo">Office Studio</a>
            </h4>
            <div class="card-description">
                The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the night life in London, UK.
            </div>
        </div>
        <div class="card-footer">
            <div class="price">
                <h4>$1.119/night</h4>
            </div>
            <div class="stats pull-right">
                <p class="category"><i class="material-icons">place</i> London, UK</p>
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card card-product">
        <div class="card-image" data-header-animation="true">
            <a href="dashboard.html#pablo">
                <img class="img" src="../tt1/img/card-1.jpeg">
            </a>
        </div>

        <div class="card-content">
            <div class="card-actions">
                <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                    <i class="material-icons">build</i> Fix Header!
                </button>

                <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
                    <i class="material-icons">art_track</i>
                </button>
                <button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
                    <i class="material-icons">edit</i>
                </button>
                <button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
                    <i class="material-icons">close</i>
                </button>
            </div>

            <h4 class="card-title">
                <a href="dashboard.html#pablo">Beautiful Castle</a>
            </h4>
            <div class="card-description">
                The place is close to Metro Station and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Milan.
            </div>
        </div>
        <div class="card-footer">
            <div class="price">
                <h4>$459/night</h4>
            </div>
            <div class="stats pull-right">
                <p class="category"><i class="material-icons">place</i> Milan, Italy</p>
            </div>
        </div>
    </div>
</div>
</div>

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