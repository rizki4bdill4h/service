<!-- template -->
<?= $this->extend('Layout/template'); ?>
<!-- containt -->
<?= $this->section('containt'); ?>
<!-- banner -->
<!-- foreach -->
<div class="pt-5">
    <img src="asset/gambar/carousel/bg-aplikasi.jpg" class="d-block w-100" alt="...">
    <div class="container">
        <div class=" text-center">
            <h1>Artikel teknisi Ac</h1>
            <p>Akses Semua artikel terbaru kami di sini</p>
        </div>
    </div>
</div>
<!-- end banner -->
<!-- artikel -->
<section class="">
    <div class="container border-top">
        <!-- search -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 pt-3 justify-content-center">
            <form action="" method="GET">
                <div class="input-group input-group-sm">
                    <input type="text" name="keyword" class="form-control" placeholder="Masukan keyword pencarian..." aria-label="Search">
                    <button class="btn btn-primary" type="submit" name="submit"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        <!-- blogs -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            <?php foreach ($pager_blogs as $pb) : ?>
                <div class="col mt-3">
                    <div class="card">
                        <img src="/asset/gambar/blogs/sampul/<?= $pb['gambar_judul']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $pb['judul']; ?></h5>
                            <p class="card-text"><?= substr($pb['text_satu'], 0, 120) . ' ...'; ?></p>
                            <a href="/blogs/<?= $pb['slug']; ?>" class="btn btn-sm btn-primary">Lanjutkan baca...</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<div class="container p-2">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <!-- pagenation -->
            <?= $pager->links('blogs_user', 'blogs_pagination') ?>
        </div>
    </div>
</div>
<!-- end artikel -->
<?= $this->endSection(); ?>