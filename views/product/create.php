<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
    <h1>Editar producto <?=$pro->nombre?></h1>
    <?php $url_action = base_url."products/save&id=".$pro->id; ?>
<?php else: ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url."products/save"; ?> 
<?php endif; ?>

<div id="formProduct">

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">

        <label for="description">Descripción</label>
        <textarea name="description" id="description"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>

        <label for="precio">Precio</label>
        <input type="text" name="price" id="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">

        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">

        <label for="category">Categoría</label>
        <?php $categories = Utils::showCategories(); ?>
        <select name="category" id="category">
            <?php while($cat = $categories->fetch_object()): ?>
                <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                    <?= $cat->nombre; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="image">Imagen</label>
        <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="imageEdit" />
        <?php endif; ?>
        <input type="file" name="image" id="image">

        <input type="submit" value="Guardar">
    </form>
</div>