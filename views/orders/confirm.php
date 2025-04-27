<?php if(isset($_SESSION['order']) && $_SESSION['order'] == 'completed'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con éxito, 
        una vez realices la transferencia bancaria a la cuenta 7382947289239ADD con el costo del pedido, será procesado y enviado.
    </p>

    <br>
    <?php if(isset($order)): ?>

        <h3>Datos del pedido:</h3>
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
<?php elseif(isset($_SESSION['order']) && $_SESSION['order'] != 'completed'): ?>
    <h1>Tu pedido no pudo ser registrado</h1>
<?php endif; ?>