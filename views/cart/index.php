<h1>Carrito de la compra</h1>

<?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
    <?php foreach($cart as $index => $element): ?>
        <?php if(isset($element['product'])): ?>
            <?php $product = $element['product']; ?>
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
                    <a href="<?=base_url?>cart/up&index=<?=$index?>" class="diminute-button">+</a>
                    <?=$element['quantity']?>
                    <a href="<?=base_url?>cart/down&index=<?=$index?>" class="diminute-button">-</a>
                </td>
                <td>
                    <a href="<?=base_url?>cart/remove&index=<?=$index?>" class="button small-button">Quitar producto</a>
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td>No se encontró información</td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    </table>
    <br/>

    <a href="<?=base_url?>cart/delete_all" class="button small-button">Vaciar carrito</a>
    <?php $stats = Utils::statsCart(); ?>
    <h3 class="h3Orders">Precio total: $<?=$stats['total']?></h3>
    <a href="<?=base_url?>orders/do" class="button">Hacer pedido</a>
<?php else: ?>
    <p class="cartEmpty">El carrito está vacío, agrega algún producto</p>
<?php endif; ?>