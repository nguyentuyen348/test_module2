
<div class="container">
    <form method="post" >
        <h3>UPDATE PRODUCT</h3>
        <?php if(isset($product)):?>
        <div class="mb-3">
            <label for="product" class="form-label">Product</label>
            <input type="text"  class="form-control" id="product" name="product-name" value="<?php echo $product->getFirstName()?>">
        </div>
            <div class="mb-3">
                <label for="brand" class="form-label">brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $product->getBrand()?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo $product->getPrice()?>">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">amount</label>
                <input type="text" class="form-control" id="amount" name="amount" value="<?php echo $product->getAmount()?>">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">status</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $product->getStatus()?>">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">date</label>
                <input type="text" class="form-control" id="date" name="date" value="<?php echo $product->getDate()?>">
            </div>

        <?php endif ?>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>


