<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de ropa</title>
    <link rel="stylesheet" href="<?=base_url?>/assets/css/style.css">
</head>
<body>
    <div id="container">
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>/assets/img/logo-php.png" alt="Percha logo" class="logo-image">
                <a href="index.php" class="name-store">
                    Tienda de ropa
                </a>
            </div>
        </header>

        <?php $categories = Utils::showCategories() ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?=base_url?>products/index">Inicio</a>
                </li>
                <?php while($cat = $categories->fetch_object()): ?>
                    <div id="bar"></div>
                    <li>
                        <a href="<?=base_url?>categories/watch&id=<?=$cat->id?>"><?=$cat->nombre; ?></a>
                    </li>
                <?php endwhile; ?>
                
            </ul>
        </nav>