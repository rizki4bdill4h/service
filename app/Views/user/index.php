<?= $this->extend('layout/user/template'); ?>

<?= $this->section('containt'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col fs-6">
            <?php
            $tanggal = mktime(date("m"), date("d"), date("Y"));
            echo  date("d-M-Y", $tanggal) . "</b> ";
            date_default_timezone_set('Asia/Jakarta');
            $a = date("H");
            if (($a >= 6) && ($a <= 11)) {
                echo "<b>, Selamat Pagi !! </b>";
            } else if (($a > 11) && ($a <= 15)) {
                echo ", Selamat siang !! ";
            } else if (($a > 15) && ($a <= 18)) {
                echo 'Selamat sore';
            } else {
                echo 'selamat malam';
            }
            ?>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
        <div class="col">
            <div class="p-3 border bg-light">Row column</div>
        </div>
        <div class="col">
            <div class="p-3 border bg-light">Row column</div>
        </div>
        <div class="col">
            <div class="p-3 border bg-light">Row column</div>
        </div>
        <div class="col">
            <div class="p-3 border bg-light">Row column</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>