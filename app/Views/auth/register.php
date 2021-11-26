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
    <title>Register page</title>


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

        .form-signin input[type="email"] {
            margin-bottom: 2px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 2px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin input[type="text"] {
            margin-bottom: 2px;
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
        <form action="<?= site_url('/manager/auth/save_register'); ?>" method="post">
            <!-- hanya bisa di input lewat halaman ini saja-->
            <?= csrf_field(); ?>

            <img class="mb-3 shadow-xl" src="/asset/gambar/logo/flag.png" alt="" width="90" height="57">
            <h1 class="h3 mb-3">Please registrasi </h1>

            <div class="form-floating">
                <input type="text" class="form-control rounded <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" name="name" id="floatingInput" placeholder="Username" autofocus value="<?= old('name'); ?>">
                <label for="floatingInput"><i class="bi bi-person-circle"></i> Username </label>
                <div id="validationServer03Feedback" class="invalid-feedback d-flex pb-2">
                    <?= $validation->getError('name'); ?>
                </div>
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control rounded <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="floatingInput" placeholder="Email" value="<?= old('email'); ?>">
                <label for="floatingInput"><i class="bi bi-envelope"></i> Email </label>
                <div id="validationServer03Feedback" class="invalid-feedback d-flex pb-2">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
            <div class="form-floating">
                <input type="password" name="password_satu" class="form-control rounded <?= ($validation->hasError('password_satu')) ? 'is-invalid' : ''; ?>" id="floatingPassword" placeholder="Password" value="<?= old('password_satu'); ?>" autocomplete="of">
                <label for="floatingPassword"><i class="bi bi-lock-fill"></i> Password</label>
                <div id="validationServer03Feedback" class="invalid-feedback d-flex pb-2">
                    <?= $validation->getError('password_satu'); ?>
                </div>
            </div>
            <div class="form-floating">
                <input type="password" name="password_dua" class="form-control rounded" id="floatingInput" placeholder="Repeat password" value="<?= old('password_dua'); ?>" autocomplete="of">
                <label for="floatingInput"><i class="bi bi-lock-fill"></i> Repeat password</label>
                <div id="validationServer03Feedback" class="invalid-feedback d-flex pb-2">

                </div>
            </div>
            <button class="btn btn-sm btn-primary mt-3" type="submit">Register <i class="bi bi-box-arrow-in-right"></i></button>
            <p class="mt-3 mb-2 text-muted">&copy; 2017–2021</p>
        </form>
    </main>

    <script src="/asset/vendor/bootsrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>