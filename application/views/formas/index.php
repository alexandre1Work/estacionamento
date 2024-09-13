

<?php $this->load->view('layout/navbar'); ?>

<div class="page-wrap">

<?php $this->load->view('layout/sidebar'); ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class=" <?php echo $icone_view; ?> bg-blue"></i>
                            <div class="d-inline">
                                <h5> <?php echo $titulo; ?> </h5>
                                <span> <?php echo $sub_titulo; ?> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> <?php echo $titulo; ?> </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <?php if($message = $this->session->flashdata('sucesso')): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert bg-success alert-success text-white alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check"></i> &nbsp; <?php echo $message ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if($message = $this->session->flashdata('error')): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                            <strong><i class="fas fa-times"></i> &nbsp; 
                            <?php echo $message ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php if($message = $this->session->flashdata('info')): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert bg-info alert-info text-white alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-check"></i> &nbsp; <?php echo $message ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> <a data-toggle="tooltip" data-placement="right" title="Cadastrar <?php echo $this->router->fetch_class(); ?>" class="btn btn-success" href="<?php echo base_url($this->router->fetch_class() . '/core/'); ?>">+ Nova Forma de pagamento</a> </div>
                        <div class="card-body">
                            <table class="table data_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome da forma de pagamento</th>
                                        <th>Ativa</th>
                                        <th class="nosort text-right pr-45">
                                            <span class="pr-40">Ações</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($formas as $forma): ?>
                                    <tr>
                                        <td><?php echo $forma->forma_pagamento_id; ?></td>
                                        <td><?php echo $forma->forma_pagamento_nome; ?></td>

                                        <td><?php echo ($forma->forma_pagamento_ativa == 1 ? '<span class="badge badge-pill badge-success mb-1"> 
                                        <i class="fas fa-lock-open"></i> &nbsp;Sim</span>' : '<span class="badge badge-pill badge-warning mb-1"> <i class="fas fa-lock"></i> &nbsp;Não</span>'); ?></td>

                                        <td class="text-right">
                                            <!-- Botão de edição -->
                                            <?php if ($forma->forma_pagamento_id != 6): ?>
                                                <a data-toggle="tooltip" data-placement="bottom" title="Editar <?php echo $this->router->fetch_class(); ?>" href="<?php echo base_url($this->router->fetch_class().'/core/'.$forma->forma_pagamento_id); ?>" class="btn btn-primary mr-1">
                                                    <i class="ik ik-edit-2"></i>Editar
                                                </a>
                                            <?php else: ?>
                                                <button type="button" title="Edição não permitida para esta forma de pagamento" class="btn btn-primary mr-1" disabled>
                                                    <i class="ik ik-edit-2"></i>Editar
                                                </button>
                                            <?php endif; ?>

                                            <!-- Botão de exclusão -->
                                            <?php if ($forma->forma_pagamento_id != 6): ?>
                                                <!-- Exibir botão de exclusão se o ID não for 6 -->
                                                <button type="button" title="Excluir <?php echo $this->router->fetch_class(); ?> " class="btn btn-danger" data-toggle="modal" 
                                                data-target="#forma-<?php echo $forma->forma_pagamento_id; ?>">
                                                    <i class="ik ik-trash-2"></i>Excluir
                                                </button>
                                            <?php else: ?>
                                                <!-- Exibir botão desativado se o ID for 6 -->
                                                <button type="button" title="Exclusão não permitida para esta forma de pagamento" class="btn btn-danger" disabled>
                                                    <i class="ik ik-trash-2"></i>Excluir
                                                </button>
                                            <?php endif; ?>
                                        </td>
                                        
                                    </tr>

                                    <div class="modal fade" id="forma-<?php echo $forma->forma_pagamento_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterLabel"><i class="fas fa-exclamation-triangle text-danger">&nbsp;Tem certeza da exclusão do registro?</i></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                <p>Se deseja excluir o registro clique em <strong>"Sim, excluir"</strong></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button data-toggle="tooltip"    data-placement="bottom" title="Cancelar" type="button" class="btn btn-secondary" data-dismiss="modal">Não, voltar</button>

                                                    <a data-toggle="tooltip"    data-placement="bottom" title="Excluir" href="<?php echo base_url($this->router->fetch_class().'/del/'.$forma->forma_pagamento_id); ?>" class="btn btn-danger">
                                                    Sim, excluir
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y') ?> ThemeKit v2.0. All Rights Reserved.</span>
            
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">
                <a href="javascript:void" class="text-dark" >
                    Customizado <i class="fas fa-code text-dark"></i> by Alexandre Veloso
                </a>
            </span>
        </div>
    </footer>
    
</div>

