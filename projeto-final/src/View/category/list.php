

<h1>Listar Categorias</h1>

<a class="btn btn-primary mb-3 " href="/categorias/nova" role="button">Nova Categoria</a>

<table class="table table-hover table-striped">
    <thead class="table-dark">
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($category = $data->fetch(\PDO::FETCH_ASSOC)){
                ?>

               
                <tr>
                   <td><?php echo $category['id'] ?></td>
                   <td><?php echo $category['name'] ?></td>
                   <td><?php echo $category['description'] ?></td>
                   <td> 
                        <a href='/categorias/editar?id=<?php echo $category['id'] ?>' class='btn btn-primary btn-sm'>Editar</a>
                        <a href='/categorias/excluir?id=<?php echo $category['id'] ?>' class='btn btn-secondary btn-sm'>Excluir</a>
                          </td>
                    </tr>
            
                    <?php } ?>
    </tbody>
</table>