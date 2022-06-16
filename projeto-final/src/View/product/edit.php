<h1>Editar Produto</h1>
<?php
extract($data);
$selected = '';

?>
<form action="" method="post">

  

    <label for="name">Nome</label>
    <input value="<?php echo $product['name']; ?>" type="text" id="name" name="name" class="form-control mb-3">

    <label for="category">Categoria</label>
    <select name="category" id="category" class="form-select mb-3">
        <option>Selecione</option>
        <?php
            while ($category = $categories->fetch(\PDO::FETCH_ASSOC)){
                $selected = '';
                if($category['id'] == $product['category_id'] ){
                $selected = 'selected';                
                }
                
                ?>                
              <option <?php echo $selected ?> value='<?php echo $category['id'] ?> '><?php echo $category['name'] ?></option>";
         <?php } ?> 
    </select>

    <br>

    <label for="description">Descrição</label>
    <textarea id="description" name="description" class="form-control mb-3"><?php echo $product['description']; ?></textarea>

    <label for="value">Valor</label>
    <input value="<?php echo $product['value']; ?>"type="text" id="value" name="value" class="form-control mb-3">

    <label for="quantity">Quantidade</label>
    <input value="<?php echo $product['quantity']; ?>" type="text" id="quantity" name="quantity" class="form-control mb-3">

    <label for="photo">Foto</label>
    <input value="<?php echo $product['photo']; ?>" type="text" id="photo" name="photo" class="form-control mb-3">

    <button class="btn btn-primary">Atualizar</button>
</form>