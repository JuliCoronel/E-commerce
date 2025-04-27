<h1>Gestión de productos</h1>

<a href="<?=base_url?>products/create" class="button small-button">Crear producto</a>

<?php if(isset($_SESSION['product']) && $_SESSION['product'] == 'completed'): ?>
    <strong>¡El producto se ha creado correctamente!</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] != 'completed'): ?>
    <strong>¡El producto NO se ha creado correctamente!</strong>
<?php endif; ?>
<?php Utils::deleteSession('product'); ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed'): ?>
    <strong>¡El producto se ha borrado correctamente!</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'completed'): ?>
    <strong>¡El producto NO se ha borrado correctamente!</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>


<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>

    <?php while($pro = $products->fetch_object()): ?>
        <tr>
            <td><strong><?= $pro->id; ?></strong></td>
            <td><strong><?= $pro->nombre; ?></strong></td>
            <td><strong><?= $pro->precio; ?></strong></td>
            <td><strong><?= $pro->stock; ?></strong></td>
            <td>
                <a href="<?=base_url?>products/edit&id=<?=$pro->id?>" class="button">Editar</a>
                <a href="<?=base_url?>products/delete&id=<?=$pro->id?>" class="button">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>