<?= $this->layout("dashboard", ["head" => $head]); ?>

<div class="container-fluid">
<div class="row mb-0">
    <div class="col-md-12 ml-auto mt-3"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
        <nav style="--bs-breadcrumb-divider: \'\';" aria-label="breadcrumb" id="nav-inicio">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fas fa-home-user me-2 text-primary"></i> <a class="text-uppercase" href="/">
                        <strong>INÍCIO </strong></a> <i class="fas fa-arrow-right ms-1 me-1"></i>
                </li>
                <li class="breadcrumb-item text-uppercase active"><strong>AGENDA</strong> </li>
            </ol>
        </nav>
    </div>

    <div class="col-md-12 text-center">;

                <div class="ajax_response"><?=flash();?></div>
                    <form class="row gy-2 gx-3 align-items-center needs-validation" novalidate id="contact-registers" action="<?=url()?>" method="post" enctype="multipart/form-data">

                        <?=csrf_input();?>


                </form>
            </div>
        </div>
    </div>