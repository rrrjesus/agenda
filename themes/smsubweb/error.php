<?= $this->layout("_theme", ["head" => $head, "error" => $error]); ?>

<div class="px-4 py-5 my-5 text-center">
    <i class="bi bi-book-half display-2"></i>
    <p class="display-5 fw-bold text-body-emphasis">&bull;<?= $error->code; ?>&bull;</p>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-2 fs-2 fw-bold"><?= $error->title; ?></p>
        <p class="lead mb-4 fs-4">Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <?php if ($error->link): ?>
                <a class="btn btn-info btn-lg px-4 gap-3 text-light" role="button"
                   title="<?= $error->linkTitle; ?>" href="<?=$error->link; ?>"><?= $error->linkTitle; ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>