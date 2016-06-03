    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>     
            </div>
			<div class="navbar-header visible-lg visible-sm visible-md">
				</div>
				<div class="navbar-header visible-lg visible-sm visible-md">
					<a class="navbar-brand top-name" href="<?php echo site_url('dashboard');?>">Penjurusan SMA N 1 Kawedanan</a>
				</div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown Profil -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="javascript:cprofil_modal()"><i class="fa fa-user fa-fw"></i>Ganti Profil</a>                       
                        </li>
                        <li><a href="#" onclick="javascript:cpass_modal()"><i class="fa fa-lock fa-fw"></i>Ganti Password</a>                      
                        </li>
                        <li class="divider"></li>
                        <li>
						<?php echo anchor('logout','<i class="fa fa-sign-out fa-fw"></i> Logout'); ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

			
			 <!-- Left menu -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
							<?php echo anchor('dashboard','<i class="fa fa-dashboard fa-fw"></i> Dashboard'); ?>
                           
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
								<?php echo anchor('kriteria','Kriteria Group'); ?>
                                </li>
                                <li>
                                <?php echo anchor('alternatif','Alternatif'); ?>
                                </li>
                                <li>
                                <?php echo anchor('siswa','Siswa'); ?>
                                </li>
                            </ul>
                        </li>                                             
                    </ul>
                    
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>