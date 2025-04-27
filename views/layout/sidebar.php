<div id="content">

<aside id="lateral">

    <div id="cart" class="block-aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stats = Utils::statsCart() ?>
            <li><a href="<?=base_url?>cart/index">Productos (<?=$stats['count']?>)</a></li>
            <li><a href="<?=base_url?>cart/index">Total: $<?=$stats['total']?></a></li>
            <li><a href="<?=base_url?>cart/index">Ver el carrito</a></li>
        </ul>
    </div>

    <div id="login" class="block-aside">

        <?php if(!isset($_SESSION['identity'])): ?>
        <h3>Inicia sesión</h3>
        <form action="<?=base_url?>users/login" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">
            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <input type="submit" value="Iniciar sesión">
        </form>
        <?php else: ?>
            <h3><?=$_SESSION['identity']->nombre ?> <?=$_SESSION['identity']->apellidos ?></h3></br>
        <?php endif; ?>

        <ul>
            <?php if (isset($_SESSION['admin'])):?>
                <li><a href="<?=base_url?>categories/index">Gestionar categorías</a></li>
                <li><a href="<?=base_url?>products/management">Gestionar productos</a></li>
                <li><a href="<?=base_url?>orders/management">Gestionar pedidos</a></li>
            <?php endif; ?>

            <?php if(isset($_SESSION['identity'])): ?>
            <li><a href="<?=base_url?>orders/myOrders">Mis pedidos</a></li>
            <li><a href="<?=base_url?>users/logout">Cerrar sesión</a></li>
            <?php else: ?>
                <li><a href="<?=base_url?>users/register">Registrate aquí</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>

<div id="central">