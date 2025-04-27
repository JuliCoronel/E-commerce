<h1>Detalles del pedido</h1>

<?php if(isset($order)): ?>
    <?php if(isset($_SESSION['admin'])): ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?=base_url?>orders/condition" method="POST">
            <input type="hidden" name="order_id" id="order_id" value="<?=$order->id?>">
            <select name="condition" id="condition">
                <option value="confirm" <?=$order->estado == 'confirm' ? 'selected' : '';?>>Pendiente</option>
                <option value="preparation" <?=$order->estado == 'preparation' ? 'selected' : '';?>>En preparación</option>
                <option value="ready" <?=$order->estado == 'ready' ? 'selected' : '';?>>Preparado para enviar</option>
                <option value="sent" <?=$order->estado == 'sent' ? 'selected' : '';?>>Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">
        </form>
        <br>
    <?php endif; ?>

<h3>Dirección de envío:</h3>
Provincia: <?=$order->provincia;?> <br>
Ciudad: <?=$order->localidad;?> <br>
Dirección: <?=$order->direccion;?> <br>


<h3>Datos del pedido:</h3>
Estado: <?= Utils::showStatus($order->estado); ?> <br>
Número del pedido: <?=$order->id; ?> <br>
Total a pagar: <?=$order->coste; ?> <br>
Productos: 

<table>
    <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
    </tr>
    <?php while($product = $products->fetch_object()): ?>
        <tr>
            <td>
                <?php if($product->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="Imagen del producto" class="img_cart">
                <?php else: ?>
                    <img src="<?=base_url?>assets/img/logo-php.png" alt="Imagen del producto" class="img_cart">
                <?php endif; ?>
            </td>
            <td>
                <a href="<?=base_url?>products/watch&id=<?=$product->id?>"><?=$product->nombre?></a>
            </td>
            <td>
                <?=$product->precio?>
            </td>
            <td>
                x<?=$product->unidades?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<?php endif; ?>