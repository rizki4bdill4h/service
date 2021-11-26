<!doctype html>
<html lang="id">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/asset/vendor/bootsrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login page</title>


    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            font-family: 'Poppins', sans-serif
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: 15px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 15px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body class="text-center">

    <main class="form-signin shadow rounded-xl bg-light">
        <!-- session Berhasil register -->
        <?php if (session()->getFlashdata('pesan')) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
            </svg>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- flash data session error pass or email tidak valid -->
        <?php if (session()->getFlashdata('error')) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('/manager/auth/process_login'); ?>" method="POST">
            <!-- menangani ke amanan form -->

            <img class="mb-3 shadow-xl border-dark" src="/asset/gambar/logo/flag.png" alt="" width="90" height="57">
            <h2 class="h3 mb-3">Please Login</h2>

            <div class="form-floating">
                <input type="text" name="name" class="form-control rounded" id="floatingInput" placeholder="username" autofocus>
                <label for="floatingInput"><i class="bi bi-person-circle"></i> username </label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control rounded" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword"><i class="bi bi-lock-fill"></i> Password</label>
            </div>
            <button type="submit" class="btn btn-sm btn-md btn-primary px-3 mt-3">Login <i class="bi bi-box-arrow-in-right"></i></button>
            <p class="mt-3 mb-3 text-muted">&copy; service ac</p>
        </form>
    </main>


    <script src="/asset/vendor/bootsrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>