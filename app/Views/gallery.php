<!-- template -->
<?= $this->extend('layout/template'); ?>
<!-- containt -->
<?= $this->section('containt'); ?>
<!-- Gallery -->
<section class="gallery min-vh-100">
    <div class="container">
        <div class="photo-gallery text-center">
            <h1>Gallery</h1>
            <p>berikut sebagain gallery kami</p>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
            <div class="col">
                <img src="/asset/gambar/why/Asset-2fortune-1536x970.png" alt="" class="gallery-item img-fluid img-thumbnail">
            </div>
        </div>
    </div>
</section>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close border" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="asset/gambar/blogs/haeder.jpg" alt="" class="img-fluid modal-img img-thumbnail">
            </div>
        </div>
    </div>
</div>
<!-- end Gallery -->

<!-- and containt -->
<?= $this->endSection(); ?>