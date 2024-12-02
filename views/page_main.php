<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hulladékszállítás - MVC</title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT ?>css/main_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php if ($viewData['style']) echo '<link rel="stylesheet" type="text/css" href="' . $viewData['style'] . '">'; ?>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Fejléc -->
    <header class="bg-success text-white text-center py-4">
        <div id="user" class="mb-2 p-2 text-end">
            <em><?= "Bejelentkezve: " . $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'] ?></em>
        </div>
        <h1 class="display-5">Hulladékszállítás - Web-programozás II</h1>
    </header>

    <!-- Menü -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container-fluid">
            <?php echo Menu::getMenu($viewData['selectedItems']); ?>
        </div>
    </nav>

    <!-- Fő tartalom -->
    <main class="container my-5">
        <div class="row">
            <!-- Oldalsáv -->
            <aside class="col-md-3 bg-light p-3 rounded">
                    <img src="./img/image.png" id="auto" width="auto" height="200px">
            </aside>

            <!-- Fő tartalom -->
            <section class="col-md-9">
                <?php if ($viewData['render']) include($viewData['render']); ?>
            </section>
        </div>
    </main>

    <!-- Lábléc -->
    <footer class="bg-light text-center text-muted py-3 mt-auto">
        <p>&copy; NJE - GAMF - FLX1D8 & I99I9G <?= date("Y") ?></p>
        <p>Köszönjük, hogy a hulladékszállítást felelősségteljesen kezelik!</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
