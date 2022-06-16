

<h1>Listar Produtos</h1>

<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Valor</th>
            <th>Estoque</th>

            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($product = $data->fetch(\PDO::FETCH_ASSOC)){
                ?>

               
                <tr>
                   <td><?php echo $product['id'] ?></td>
                   <td><?php echo $product['name'] ?></td>
                   <td><?php echo $product['description'] ?></td>
                   <td><img src="<?php echo $product['photo'] ?>" alt="" width="100px"></td>
                   <td><?php echo $product['value'] ?></td>
                   <td><?php echo $product['quantity'] ?></td>
                   <td> 
                        <a href='/produtos/editar?id=<?php echo $product['id'] ?>' class='btn btn-primary btn-sm'>Editar</a>
                        <a href='/produtos/excluir?id=<?php echo $product['id'] ?>' class='btn btn-secondary btn-sm'>Excluir</a>
                          </td>
                          


                    </tr>
            
                    <?php } ?>
    </tbody>
</table>