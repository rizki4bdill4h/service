<?= $this->extend('layout/template'); ?>

<?= $this->section('containt'); ?>

<section class="pt-5">
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <div class="img-sampul">
                    <img src="/asset/gambar/blogs/sampul/<?= $blogs['gambar_judul']; ?>" alt="" class="img-fluid">
                </div>
                <article class="blog-post">
                    <h3 class="pt-5 fst-italic border-bottom">
                        <?= $blogs['judul']; ?>
                    </h3>
                    <p class="blog-post-meta"><?= $blogs['created_at']; ?></p>

                    <p><?= $blogs['text_satu']; ?></p>
                    <hr>
                    <p><?= $blogs['text_dua']; ?></p>
                </article>

                <article class="blog-post">
                    <h2 class="blog-post-title">Another blog post</h2>
                    <p class="blog-post-meta">December 23, 2020 by <a href="#">Jacob</a></p>
                    <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p>
                </article>

                <article class="blog-post">
                    <h2 class="blog-post-title">New feature</h2>
                    <p class="blog-post-meta">December 14, 2020 by <a href="#">Chris</a></p>

                    <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                    <ul>
                        <li>First list item</li>
                        <li>Second list item with a longer description</li>
                        <li>Third list item to close it out</li>
                    </ul>
                    <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p>
                </article>
            </div>
            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Archives</h4>
                        <ol class="list-unstyled mb-0">
                            <li><a href="#">March 2021</a></li>
                            <li><a href="#">February 2021</a></li>
                            <li><a href="#">January 2021</a></li>
                            <li><a href="#">December 2020</a></li>
                            <li><a href="#">November 2020</a></li>
                            <li><a href="#">October 2020</a></li>
                            <li><a href="#">September 2020</a></li>
                            <li><a href="#">August 2020</a></li>
                            <li><a href="#">July 2020</a></li>
                            <li><a href="#">June 2020</a></li>
                            <li><a href="#">May 2020</a></li>
                            <li><a href="#">April 2020</a></li>
                        </ol>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Elsewhere</h4>
                        <ol class="list-unstyled">
                            <li><a href="#">GitHub</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<?= $this->endSection(); ?>