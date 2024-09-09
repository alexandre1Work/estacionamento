

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

            <div class="row">
                <!-- project-ticket start -->
                <div class="col-xl-3 col-md-12">
                    <div class="card proj-t-card">
                        <div class="card-body">
                            <div class="row align-items-center mb-30">
                                <div class="col-auto">
                                    <i class="far fa-calendar-check text-red f-30"></i>
                                </div>
                                <div class="col pl-0">
                                    <h6 class="mb-5">Ticket Answered</h6>
                                    <h6 class="mb-0 text-red">Live Update</h6>
                                </div>
                            </div>
                            <div class="row align-items-center text-center">
                                <div class="col">
                                    <h6 class="mb-0">327</h6></div>
                                <div class="col"><i class="fas fa-exchange-alt text-red f-18"></i></div>
                                <div class="col">
                                    <h6 class="mb-0">10 Days</h6></div>
                            </div>
                            <h6 class="pt-badge bg-red">53%</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card proj-t-card">
                        <div class="card-body">
                            <div class="row align-items-center mb-30">
                                <div class="col-auto">
                                    <i class="fas fa-paper-plane text-green f-30"></i>
                                </div>
                                <div class="col pl-0">
                                    <h6 class="mb-5">Project Launched</h6>
                                    <h6 class="mb-0 text-green">Live Update</h6>
                                </div>
                            </div>
                            <div class="row align-items-center text-center">
                                <div class="col">
                                    <h6 class="mb-0">3 Year</h6></div>
                                <div class="col"><i class="fas fa-exchange-alt text-green f-18"></i></div>
                                <div class="col">
                                    <h6 class="mb-0">623</h6></div>
                            </div>
                            <h6 class="pt-badge bg-green">76%</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card proj-t-card">
                        <div class="card-body">
                            <div class="row align-items-center mb-30">
                                <div class="col-auto">
                                    <i class="fas fa-lightbulb text-yellow f-30"></i>
                                </div>
                                <div class="col pl-0">
                                    <h6 class="mb-5">Unique Innovation</h6>
                                    <h6 class="mb-0 text-yellow">Live Update</h6>
                                </div>
                            </div>
                            <div class="row align-items-center text-center">
                                <div class="col">
                                    <h6 class="mb-0">1 Month</h6></div>
                                <div class="col"><i class="fas fa-exchange-alt text-yellow f-18"></i></div>
                                <div class="col">
                                    <h6 class="mb-0">248</h6></div>
                            </div>
                            <h6 class="pt-badge bg-yellow">73%</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card proj-t-card">
                        <div class="card-body">
                            <div class="row align-items-center mb-30">
                                <div class="col-auto">
                                    <i class="fas fa-lightbulb text-yellow f-30"></i>
                                </div>
                                <div class="col pl-0">
                                    <h6 class="mb-5">Unique Innovation</h6>
                                    <h6 class="mb-0 text-yellow">Live Update</h6>
                                </div>
                            </div>
                            <div class="row align-items-center text-center">
                                <div class="col">
                                    <h6 class="mb-0">1 Month</h6></div>
                                <div class="col"><i class="fas fa-exchange-alt text-yellow f-18"></i></div>
                                <div class="col">
                                    <h6 class="mb-0">248</h6></div>
                            </div>
                            <h6 class="pt-badge bg-yellow">73%</h6>
                        </div>
                    </div>
                </div>
                <!-- project-ticket end -->
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

