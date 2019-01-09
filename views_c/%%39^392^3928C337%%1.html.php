<?php /* Smarty version 2.6.30, created on 1546374226
         compiled from 1.html */ ?>

			<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=1000" class="dropdown-toggle" >
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md"></p>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="regular.html#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">notifications</i>
                        <span class="notification">2</span>
                        <p class="hidden-lg hidden-md">
                            Bildirimler
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="regular.html#">Vergi Ödemesi Son Tarih</a></li>
                        <li><a href="regular.html#">Maaş Ödemeleri Yaklaştı !! </a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo $this->_tpl_vars['URL']; ?>
/index.php?p=1&a=9">
                       <i class="material-icons">power_settings_new</i>
                    </a>
                </li>

                <li class="separator hidden-lg hidden-md"></li>
            </ul>

        </div>
    </div>
</nav>