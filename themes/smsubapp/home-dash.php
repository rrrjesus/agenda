<?= $this->layout("dashboard", ["head" => $head]); ?>

<div class="container-fluid">
    <div class="col-md-12 ml-auto mt-3"> <!-- https://getbootstrap.com/docs/4.0/layout/grid/#mix-and-match -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("")?>"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a class="link-body-emphasis fw-semibold text-decoration-none text-danger" href="<?=url("/dashboard")?>"><i class="bi bi-telephone"></i> Contatos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-list"></i> Lista de Contatos</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-center">
        <div class="col-12">


            <!-- -GRAFICS -->

        </div>
    </div>
</div>


