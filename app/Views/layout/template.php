<!doctype html>
<html lang="id">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/asset/vendor/bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/asset/css/style-home.css">
    <title>jasa service ac tangerang selatan</title>
</head>

<body>
    <!-- loader -->
    <main class="main">
        <!-- templating -->
        <!-- header -->
        <?= $this->include('layout/header'); ?>
        <!-- section -->
        <?= $this->renderSection('containt'); ?>
        <!-- whatsapp -->
        <?= $this->include('layout/whatsapp'); ?>
        <!-- top -->
        <?= $this->include('layout/top'); ?>
        <!-- footer -->
        <?= $this->include('layout/footer'); ?>
        <!-- endMain -->
        <!-- endTemplating -->
    </main>
    <div class="loader-bg">
        <div class="loader" id="load"></div>
    </div>
    <!-- endLoader -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/asset/vendor/bootsrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="/asset/js/main-home.js"></script>
</body>

</html>