<?php

declare(strict_types=1);

namespace App\Controller;


use App\Connection\Connection;
use Dompdf\Dompdf;



class ProductController extends AbstractController
{

    public function listAction($message = null): void
    {



        $con = Connection::getConnection();

        $result = $con->prepare('SELECT * FROM tb_product');
        $result->execute();


        parent::render('product/list', $result, null, $message);
    }

    public function addAction(): void
    {
        $con = Connection::getConnection();

        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $value = $_POST['value'];
            $photo = $_POST['photo'];
            $quantity = $_POST['quantity'];
            $categoryId = $_POST['category'];
            $createdAt = date('Y-m-d H:i:s');

            $query = "INSERT INTO tb_product (name, description, value, photo, quantity, category_id, created_at) VALUES 
            ('{$name}','{$description}','{$value}','{$photo}','{$quantity}','{$categoryId}','{$createdAt}');";

            $result = $con->prepare($query);
            $result->execute();

            $message = 'Produto cadastrado com sucesso';
            (new ProductController())->listAction($message);
            die();
        }

        $result = $con->prepare('SELECT * FROM tb_category');
        $result->execute();

        parent::render('product/add', $result);
    }

    public function removeAction(): void
    {
        $id = $_GET['id'];

        $con = Connection::getConnection();

        $result = $con->prepare("DELETE FROM tb_product WHERE id='{$id}'");
        $result->execute();

        $message = 'Produto Removido com sucesso';
        (new ProductController())->listAction($message);
        die();
    }


    public function editAction(): void
    {
        $id = $_GET['id'];
        $con = Connection::getConnection();


        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $value = $_POST['value'];
            $photo = $_POST['photo'];
            $quantity = $_POST['quantity'];
            $category = $_POST['category'];


            $query = "UPDATE tb_product SET name = '{$name}',category_id =  '{$category}',description = '{$description}',value = '{$value}',
            photo = '{$photo}',
            quantity = '{$quantity}'
            WHERE id='{$id}'";
            $resultUpdate = $con->prepare($query);
            $resultUpdate->execute();
            $message = 'Produto atualizado com sucesso';
            (new ProductController())->listAction($message);
            die();
        }

        $categories = $con->prepare('SELECT * FROM tb_category');
        $categories->execute();

        $product = $con->prepare("SELECT * FROM tb_product WHERE id='{$id}'");
        $product->execute();

        parent::render('product/edit', ['product' => $product->fetch(\PDO::FETCH_ASSOC)], $categories);
    }

    public function reportAction(): void
    {

        $con = Connection::getConnection();
        $result = $con->prepare('SELECT prod.id, prod.name, prod.quantity, cat.name as category FROM tb_product prod INNER JOIN tb_category cat ON prod.category_id = cat.id');
        $result->execute();
        $data = '';
        while ($product = $result->fetch(\PDO::FETCH_ASSOC)) {
            extract($product);
            $data .= "<tr>
                        <td>{$id}</td>
                        <td>{$name}</td>
                        <td>{$quantity}</td>
                        <td>{$category}</td>
                    </tr>";
        }

        $content = "<html>
        <head>
            <title>Relatório de Produtos</title>
        </head>
        <body>
        <center>
            <h1>Relatório de Produtos</h1>
            <table border='1' width='100%'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                {$data}
                
               </tbody>
                            </table>
                        </body>
                    </html>";

                    $pdf = new Dompdf();
                    $pdf->loadHtml($content);
                    $pdf->render();
                    $pdf->stream();
    }
}
