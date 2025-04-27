    <h1>Algunos de nuestros productos</h1>

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