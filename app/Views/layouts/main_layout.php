<!-- app/Views/layouts/main_layout.php -->
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="http://localhost/tickr/public/style.css" rel="stylesheet">
</head>
<body>

<header>
    <h1>سامانه پشتیبانی</h1>
    <nav>
        <a href="http://localhost/tickr/public/tickets">تیکت ها</a> | <a href="http://localhost/tickr/public/auth/signup">ثبت نام</a> | <a href="/about">درباره ما</a> | <a href="http://localhost/tickr/public/auth/logout">خروج</a>
    </nav>
</header>

<main>
    <?= $this->renderSection('content') ?>
</main>

<footer>
    <p>&copy; <?= date('Y') ?> سامانه پشتیبانی</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>