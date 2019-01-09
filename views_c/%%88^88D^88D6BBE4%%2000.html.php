<?php /* Smarty version 2.6.30, created on 1546372843
         compiled from 2000.html */ ?>
<div class="sidebar" data-active-color="rose" data-background-color="black" data-image="../tt1/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->

    <div class="logo">
        <a href="" class="simple-text logo-mini">TT </a>

        <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=1000" class="simple-text logo-normal"> Tuna Tekstil </a>
    </div>

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="<?php echo $this->_tpl_vars['URL']; ?>
/img/faces/avatar.JPG" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="regular.html#collapseExample" class="collapsed">
                    <span> 
						<?php if ($this->_tpl_vars['USER_ID'] > 0): ?>
							<?php echo $this->_tpl_vars['NAME']; ?>
,<br/> <br/>
						<?php endif; ?>
                        <b class="caret"></b>
						
						<span> 
							<?php if ($this->_tpl_vars['USER_ID'] > 0): ?>
								Son Giriş : <?php echo $this->_tpl_vars['LAST_LOGIN']; ?>

							<?php endif; ?>
						</span>
                    </span>
                </a>
				
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="regular.html#">
                                <span class="sidebar-mini"> BP </span>
                                <span class="sidebar-normal"> Benim Profilim </span>
                            </a>
                        </li>
                        <li>
                            <a href="regular.html#">
                                <span class="sidebar-mini"> PD </span>
                                <span class="sidebar-normal"> Profil Güncelle </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            
            <li>
                <a data-toggle="collapse" href="regular.html#pagesExamples" class="collapsed">
                    <i class="material-icons">group</i>
                    <p> Personel İşlemleri 
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li>
                            <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=7000&a=0">
								<i class="material-icons">assignment</i>
                                <span class="sidebar-normal"> Personel Listesi </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=5000">
								<i class="material-icons">person_add</i>
                                <span class="sidebar-normal"> Personel Ekle </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

        <ul class="nav">
            
            <li>
                <a data-toggle="collapse" href="regular.html#materials" class="collapsed">
                    <i class="material-icons">build</i>
                    <p> Atölye İşlemleri
                       <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="materials">
                    <ul class="nav">
                        <li>
                            <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=7000&a=0">
								<i class="material-icons">assignment</i>
                                <span class="sidebar-normal"> Makine Listesi </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=5000">
								<i class="material-icons">library_add</i>
                                <span class="sidebar-normal"> Makine Ekle </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=5000">
								<i class="material-icons">assignment</i>
                                <span class="sidebar-normal"> Malzeme Listesi </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $this->_tpl_vars['URL']; ?>
index.php?p=5000">
								<i class="material-icons">library_add</i>
                                <span class="sidebar-normal"> Malzeme Ekle </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>