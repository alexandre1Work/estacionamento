<div class="app-sidebar colored">
<div class="sidebar-header">
            <a class="header-brand" href="<?php echo base_url('/') ?>">

                <!-- <div class="logo-img">
                    <img src="s<?php echo base_url('public/src/img/brand-white.svg'); ?>" class="header-brand-img" alt="lavalite"> 
                </div> -->
                
                <span class="text"><i class="fab fa-pied-piper"></i>&nbsp;Park Cloud</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Park Cloud</div>
                    <div class="nav-item <?php echo ($this->router->fetch_class() == 'home' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                        <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i><span>Home</span></a>
                    </div>

                    <div class="nav-item <?php echo ($this->router->fetch_class() == 'estacionar' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                        <a data-toggle="tooltip" data-placement="bottom" title="Estacionar" href="<?php echo base_url('estacionar'); ?>"><i class="fas fa-parking"></i><span>Estacionar</span></a>
                    </div>

                    <div class="nav-item <?php echo ($this->router->fetch_class() == 'mensalistas' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                        <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar mensalistas" href="<?php echo base_url('mensalistas'); ?>"><i class="fa fa-user-tie"></i><span>Mensalistas</span></a>
                    </div>

                    <div class="nav-item <?php echo ($this->router->fetch_class() == 'mensalidades' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                        <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar mensalidades" href="<?php echo base_url('mensalidades'); ?>"><i class="fas fa-hand-holding-usd"></i><span>Mensalidades</span></a>
                    </div>

                    <div class="nav-lavel">Administração</div>

                    <!-- Esconde a visualização dos atendentes e permite apenas para admins -->
                    <?php if($this->ion_auth->is_admin()): ?>

                        <div class="nav-item <?php echo ($this->router->fetch_class() == 'usuarios' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                        <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar usuários" href="<?php echo base_url('usuarios'); ?>"><i class="ik ik-users"></i><span>Usuários</span></a>
                        </div>
                        <div class="nav-item <?php echo ($this->router->fetch_class() == 'sistema' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                            <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar sistema" href="<?php echo base_url('sistema'); ?>"><i class="ik ik-settings"></i><span>Sistema</span></a>
                        </div>
                        <div class="nav-item <?php echo ($this->router->fetch_class() == 'precificacoes' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                            <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar precificações" href="<?php echo base_url('precificacoes'); ?>"><i class="ik ik-dollar-sign"></i><span>Precificações</span></a>
                        </div>

                    <?php endif; ?>

                    <!-- É permitida a visualização por parte dos atendentes -->
                    <div class="nav-item <?php echo ($this->router->fetch_class() == 'formas' && $this->router->fetch_method() == 'index' ? 'active' : ''); ?>">
                        <a data-toggle="tooltip" data-placement="bottom" title="Gerenciar formas de pagamento" href="<?php echo base_url('formas'); ?>"><i class="fas fa-comment-dollar"></i><span>Formas de pagamento</span></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>