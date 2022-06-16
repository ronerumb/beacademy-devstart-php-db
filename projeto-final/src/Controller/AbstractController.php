<?php

declare(strict_types=1);

namespace App\Controller;

abstract class AbstractController
{
    public function render(string $viewName,  $data = null,$categories = null,$message = null):void
    {

        
        include dirname(__DIR__)."/View/_partials/head.php";
        
        if($message != null){
            include dirname(__DIR__)."/View/_partials/message.php";
        }
        
        include dirname(__DIR__)."/View/{$viewName}.php";
        include dirname(__DIR__)."/View/_partials/footer.php";
    }

}

