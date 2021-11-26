<?= $this->extend('layout/user/template'); ?>
<?= $this->section('containt'); ?>


<div class="container mt-5 ">
    <div class="row ">
        <?php foreach ($user as $s) : ?>
            <div class="col col-lg-3 col-md-6 col-sm-12 justify-content-center d-flex p-3">
                <div class="card shadow border-lg" style="width: 15rem;">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $s['name']; ?></h5>
                        <h6 class="card-subtitle mb-2"><?= $s['email']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted d-none"><?= $s['password']; ?></h6>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<?= $this->endSection(); ?>