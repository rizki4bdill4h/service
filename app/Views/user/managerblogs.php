<?= $this->extend('layout/user/template'); ?>

<?= $this->section('containt'); ?>
<div class="container pt-3">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <h2 class="fw-bold fs-5">Semua data blogs</h2>
            </div>
            <!-- session -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                </svg>
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        <?= session()->getFlashdata('pesan'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container pt-2">
    <div class="row">
        <div class="col d-md-flex justify-content-xl-between">
            <!-- fitur search... -->
            <div class="col-md-6">
                <form action="" method="GET">
                    <div class="input-group input-group-sm">
                        <input type="text" name="keyword" class="form-control" placeholder="Masukan keyword pencarian...">
                        <button class="btn btn-primary" type="submit" name="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <!-- tambah data -->
            <a href="/blogs/createblogs" class="btn btn-sm btn-primary my-auto fw-bold">Tambah Blogs <i class="bi bi-folder-plus"></i> </a>
        </div>
    </div>
</div>
<div class="container py-2">
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">judul</th>
                        <th scope="col">gambar</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- tambahin angka -->
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($pager_blogs as $pb) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= substr($pb['judul'], 0, 60); ?></td>
                            <td><img src="/asset/gambar/blogs/sampul/<?= $pb['gambar_judul']; ?>" alt="" class="img-fluid" height="40" width="40"></td>
                            <td>
                                <a href="/blogs/editblogs/<?= $pb['slug']; ?>" class="btn btn-sm btn-warning"><i class=" bi bi-pen"></i></a>
                                <form action="/blogs/deleteblogs/<?= $pb['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger" onClick="return confirm('apakah anda yakin')"><i class=" bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- pagenation -->
        <?= $pager->links('blogs_user', 'blogs_pagination') ?>
    </div>
</div>


<?= $this->endSection(); ?>