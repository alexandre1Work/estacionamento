

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
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Listar <?php echo $this->router->fetch_class(); ?>" href=" <?php echo base_url($this->router->fetch_class()); ?>">Listar &nbsp; <?php echo ($this->router->fetch_class()); ?> </a>
                                </li>
                                <li data-toggle="tooltip" data-placement="bottom" class="breadcrumb-item active" aria-current="page"> <?php echo $titulo; ?> </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"> 
                            <?php echo(isset($mensalista) ? '<i class="ik ik-calendar ik-1x"></i> &nbsp; Data da última alteração:&nbsp;'.formata_data_banco_com_hora ($mensalista-> mensalista_data_alteracao) : ''); ?> 
                        </div>
                        <div class="card-body">
                        
                            <form class="forms-sample" name="form_core" method="POST">

                                <div class="form-group row">
                                
                                    <div class="col-md-4 mb-20">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="mensalista_nome" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_nome : set_value('mensalista_nome')); ?>">
                                        <?php echo form_error('mensalista_nome', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-8 mb-20">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" name="mensalista_sobrenome" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_sobrenome : set_value('mensalista_sobrenome')); ?>">
                                        <?php echo form_error('mensalista_sobrenome', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    
                                    <div class="col-md-2 mb-20">
                                        <label>Data de nascimento</label>
                                        <input type="date" class="form-control" name="mensalista_data_nascimento" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_data_nascimento : set_value('mensalista_data_nascimento')); ?>">
                                        <?php echo form_error('mensalista_data_nascimento', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-2 mb-20">
                                        <label>CPF</label>
                                        <input type="text" class="form-control cpf" name="mensalista_cpf" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_cpf : set_value('mensalista_cpf')); ?>">
                                        <?php echo form_error('mensalista_cpf', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-2 mb-20">
                                        <label>RG</label>
                                        <input type="text" class="form-control" name="mensalista_rg" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_rg : set_value('mensalista_rg')); ?>">
                                        <?php echo form_error('mensalista_rg', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-6 mb-20">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="mensalista_email" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_email : set_value('mensalista_email')); ?>">
                                        <?php echo form_error('mensalista_email', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-2 mb-20">
                                        <label>Telefone Fixo</label>
                                        <input type="text" class="form-control sp_celphones" name="mensalista_telefone_fixo" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_telefone_fixo : set_value('mensalista_telefone_fixo')); ?>">
                                        <?php echo form_error('mensalista_telefone_fixo', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-2 mb-20">
                                        <label>Telefone Móvel</label>
                                        <input type="text" class="form-control sp_celphones" name="mensalista_telefone_movel" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_telefone_movel : set_value('mensalista_telefone_movel')); ?>">
                                        <?php echo form_error('mensalista_telefone_movel', '<div class="text-danger">', '</div>'); ?>
                                    </div>


                                    <div class="col-md-2 mb-20">
                                        <label>CEP</label>
                                        <input type="text" class="form-control cep" name="mensalista_cep" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_cep : set_value('mensalista_cep')); ?>">
                                        <?php echo form_error('mensalista_cep', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-4 mb-20">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" name="mensalista_endereco" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_endereco : set_value('mensalista_endereco')); ?>">
                                        <?php echo form_error('mensalista_endereco', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-2 mb-20">
                                        <label>Número</label>
                                        <input type="text" class="form-control" name="mensalista_numero_endereco" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_numero_endereco : set_value('mensalista_numero_endereco')); ?>">
                                        <?php echo form_error('mensalista_numero_endereco', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-2 mb-20">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" name="mensalista_bairro" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_bairro : set_value('mensalista_bairro')); ?>">
                                        <?php echo form_error('mensalista_bairro', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-2 mb-20">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name="mensalista_cidade" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_cidade : set_value('mensalista_cidade')); ?>">
                                        <?php echo form_error('mensalista_cidade', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-2 mb-20">
                                        <label>UF</label>
                                        <input type="text" class="form-control uf" name="mensalista_estado" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_estado : set_value('mensalista_estado')); ?>">
                                        <?php echo form_error('mensalista_estado', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-6 mb-20">
                                        <label>Complemento</label>
                                        <input type="text" class="form-control" name="mensalista_complemento" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_complemento : set_value('mensalista_complemento')); ?>">
                                        <?php echo form_error('mensalista_complemento', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                </div> 

                                <div class="form-group row">

                                    <div class="col-md-2 mb-20">
                                        <label>Ativo</label>
                                        <select class="form-control" name="active">
                                        
                                            <?php if(isset($mensalista)): ?>

                                            <option value="0" <?php echo ($mensalista->mensalista_ativo == 0 ? 'selected' : '') ?> >Não</option>
                                            <option value="1" <?php echo ($mensalista->mensalista_ativo == 1 ? 'selected' : '') ?>>Sim</option>
                                            
                                            <?php else: ?>

                                                <option value="0">Não</option>
                                                <option value="1">Sim</option>

                                            <?php endif; ?>
                                        </select>
                                        
                                    </div>

                                    <div class="col-md-4 mb-20">
                                        <label>Dia vencimento mensalidade</label>
                                        <input type="number" class="form-control" name="mensalista_dia_vencimento" value="<?php echo(isset($mensalista) ? $mensalista->mensalista_dia_vencimento : set_value('mensalista_dia_vencimento')); ?>">
                                        <?php echo form_error('mensalista_dia_vencimento', '<div class="text-danger">', '</div>'); ?>
                                    </div>

                                    <div class="col-md-6 mb-20">
                                        <label>Observações</label>
                                        <textarea rows="1" class="form-control" name="mensalista_obs">
                                        <?php echo(isset($mensalista) ? $mensalista->mensalista_obs : set_value('mensalista_obs')); ?>
                                        </textarea>
                                    </div>

                                </div> 

                                <?php if(isset($mensalista)): ?>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="hidden" class="form-control" name="mensalista_id" 
                                        value="<?php echo $mensalista->mensalista_id; ?>">
                                    </div>
                                </div>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                <a class="btn btn-info" href="<?php echo base_url($this->router->fetch_class()); ?>">Voltar</a>
                            </form>

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

