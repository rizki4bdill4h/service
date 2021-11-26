<!D<!-- template -->
    <?= $this->extend('layout/template'); ?>
    <!-- containt -->
    <?= $this->section('containt'); ?>
    <!-- head about -->
    <div class="about">
        <div class="container">
            <div class="p-about rounded-3 mt-n5">
                <h1 class="text-center text-white">Tentang brokmen ac</h1>
            </div>
        </div>
    </div>
    <style>
        .about {
            padding: 80px 0 0 0;
            width: 100%;
            background: #0056A8;
        }

        .about .p-about {
            background: #57595c;
        }
    </style>
    <!-- end head about -->
    <!-- about me -->
    <section class="section mt-2 pb-5 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div>
                        <img src="/asset/gambar/blogs/logo baru Maju Jaya Service AC with background.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center mt-5">
                    <div class="">
                        <h2>Kenpa harus " brokmen ac" ?</h2>
                        <p>"Brokmen AC" adalah perusahaan jasa perbaikan AC profesional dan
                            terpercaya. Kami memberi pelayanan yang
                            berkualitas, servis cepat dan harga terjangkau. Betapa pentingnya membangun
                            kepercayaan pada pelanggan, dengan
                            pengalaman bertahun-tahun dalam bidang perbaikan (service) AC yang bertanggung jawab
                            serta bergaransi 30 hari, maka
                            kami yakin dapat memberikan pelayanan terbaik dan terpercaya untuk Anda.
                            Tidak hanya AC, kami juga melayani service kulkas, service pompa air, service
                            dispenser, service mesin cuci dan
                            beberapa perlengkapan rumah tangga yang bisa Anda lihat daftar layanan kami disini.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about me -->
    <!-- contact about me -->
    <section class="section mt-2 pb-5 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div>
                        <h2>Silahkan hubungi kami untuk sekedar konsultasi atau informasi lebih lanjut mengenai jasa
                            kami.</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                    <div class="">
                        <button type="button" class="btn btn-primary">Hubungi!</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact about me -->

    <!-- and containt -->
    <?= $this->endSection(); ?>