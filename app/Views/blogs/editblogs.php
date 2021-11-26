<?= $this->extend('layout/user/template'); ?>

<?= $this->section('containt'); ?>

<div class="container mt-4">
    <div class="row d-flex justify-content-center">
        <h2 class="fs-4 text-center">Edit data blogs</h2>
        <div class="col col-lg-10 shadow rounded-xl">
            <form action="/blogs/updateblogs/<?= $blogs['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <!-- slug -->
                <input type="hidden" name="slug" value="<?= $blogs['slug']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $blogs['gambar_judul']; ?>">
                <input type="hidden" name="gambarLama_satu" value="<?= $blogs['gambar_satu']; ?>">
                <input type="hidden" name="gambarLama_dua" value="<?= $blogs['gambar_dua']; ?>">
                <div class="p-2">
                    <div class="mb-2">
                        <span class="fw-bold ps-2">judul</span>
                        <input type="text" class="form-control  <?= ($validation->hasError('judul')) ? 'is-invalid' : '' ?>" id="judul" name="judul" placeholder="Username" aria-label="Username" aria-describedby="" value="<?= (old('judul')) ? old('judul') : $blogs['judul']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                    <div class=" mb-2">
                        <span class="fw-bold ps-2">text Satu</span>
                        <textarea class="form-control" id="text_satu" name="text_satu" aria-label="With textarea" value="<?= (old('text_satu')) ? old('text_satu') : $blogs['text_satu']; ?>"></textarea>
                    </div>
                    <div class=" mb-2">
                        <span class="fw-bold ps-2">text dua</span>
                        <textarea class="form-control" id="text_dua" name="text_dua" aria-label="With textarea" value="<?= (old('text_dua')) ? old('text_dua') : $blogs['text_dua']; ?>"></textarea>
                    </div>
                    <div class=" mb-2">
                        <span class="fw-bold ps-2">gambar judul</span>
                        <div class="input-group mb-3 ">
                            <input type="file" class="form-control rounded <?= ($validation->hasError('gambar_judul')) ? 'is-invalid' : '' ?>" id="gambar_judul" name="gambar_judul">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('gambar_judul'); ?>
                            </div>
                            <label class="" for="gambar_judul"></label>
                        </div>
                    </div>
                    <div class=" mb-2">
                        <span class="fw-bold ps-2">gambar satu</span>
                        <div class="input-group mb-3 ">
                            <input type="file" class="form-control rounded <?= ($validation->hasError('gambar_satu')) ? 'is-invalid' : '' ?>" id="gambar_satu" name="gambar_satu">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('gambar_satu'); ?>
                            </div>
                            <label class="" for="gambar_satu"></label>
                        </div>
                    </div>
                    <div class=" mb-2">
                        <span class="fw-bold ps-2">gambar dua</span>
                        <div class="input-group mb-3 ">
                            <input type="file" class="form-control rounded <?= ($validation->hasError('gambar_dua')) ? 'is-invalid' : '' ?>" id="gambar_dua" name="gambar_dua">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('gambar_dua'); ?>
                            </div>
                            <label class="" for="gambar_dua"></label>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse py-2">
                        <button type="submit" class="btn btn-primary btn-sm">Ubah data <i class="bi bi-folder-plus"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>