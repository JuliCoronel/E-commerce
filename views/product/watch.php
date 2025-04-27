<?php if(isset($product)): ?>
    <h1><?=$product->nombre;?></h1>
    
    <div id="detailProduct">
        <?php if($product->imagen != null): ?>
            <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="Imagen del producto">
        <?php else: ?>
            <img src="<?=base_url?>assets/img/logo-php.png" alt="Imagen del producto">
        <?php endif; ?>
        <div id="textDetailProduct">
            <p class="descriptionProduct"><?=$product->descripcion?></p>
            <p class="priceProduct">$<?=$product->precio?></p>
            <a href="<?=base_url?>cart/add&id=<?=$product->id?>" class="button">Comprar</a>
        </div>
    </div>

<?php else: ?>
    <h1>El producto no existe no existe</h1>
<?php endif; ?>