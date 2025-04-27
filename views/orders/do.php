<?php if(isset($_SESSION['identity'])): ?>
    <h1>Hacer pedido</h1>

    <p>
        <a href="<?=base_url?>cart/index">Ver los productos y el precio del pedido</a>
    </p>
    <br>
    <h3>Domicilio para el envío</h3>
    <form action="<?=base_url?>orders/add" method="POST">
        <label for="state">Provincia</label>
        <input type="text" name="state" id="state" required>
        <label for="locality">Localidad</label>
        <input type="text" name="locality" id="locality" required>
        <label for="address">Dirección</label>
        <input type="text" name="address" id="address" required>
        <input type="submit" value="Confirmar">
    </form>

<?php else: ?>
    <h1>Debes iniciar sesión para hacer un pedido</h1>
    <p>¡No es posible realizar un pedido sin haberse logueado antes!</p>
<?php endif; ?>