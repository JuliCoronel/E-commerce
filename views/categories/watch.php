<?php if(isset($category)): ?>
    <h1><?=$category->nombre;?></h1>
    <?php if($products->num_rows == 0): ?>
        <p class="noProduct">No hay productos en esta categoría</p>
    <?php else: ?>
        <div id="productos">
            <?php while($product = $products->fetch_object()): ?>
                <div class="product">
                    <a href="<?=base_url?>products/watch&id=<?=$product->id?>">
                        <?php if($product->imagen != null): ?>
                            <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="Imagen del producto">
                        <?php else: ?>
                            <img src="<?=base_url?>assets/img/logo-php.png" alt="Imagen del producto">
                        <?php endif; ?>
                        <h2><?=$product->nombre?></h2>
                    </a>
                    <p><?=$product->precio?></p>
                    <a href="<?=base_url?>cart/add&id=<?=$product->id?>" class="button">Comprar</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <h1>La categoría no existe</h1>
<?php endif; ?>