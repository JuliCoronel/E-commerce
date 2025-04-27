<?php if(isset($management)): ?>
    <h1>Gestionar pedidos</h1>
<?php else: ?>
    <h1>Mis pedidos</h1>
<?php endif; ?>

<table>
    <tr>
        <th>N° pedido</th>
        <th>Costo</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php while($ord = $orders->fetch_object()): ?>
        <tr>
            <td>
                <a href="<?=base_url?>orders/detail&id=<?=$ord->id;?>"><?=$ord->id;?></a>
            </td>
            <td>
                $ <?=$ord->coste;?>
            </td>
            <td>
                <?=$ord->fecha;?>
            </td>
            <td>
                <?= Utils::showStatus($ord->estado); ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>