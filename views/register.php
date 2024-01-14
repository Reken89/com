<?php
    //Уведомляем пользователя, что введенная им информация
    //уже присутствует в БД
    if(isset($data["info"])){
        echo $data["info"]["name_text"];
        echo "</br>";
        echo $data["info"]["telephone_text"];
        echo "</br>";
        echo $data["info"]["email_text"];
    }
    
    //Показываем пользователю какие ошибки были допущены
    if(isset($data["error"])){
        echo $data["error"];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Регистрация</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <div class="tab" role="tabpanel">
                    <div class="tab-content tabs">
                        <form action="/com/add" class="form-horizontal" method="POST">   
                            <div class="form-group">
                                <label>Имя</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Телефон</label>
                                <input type="text" class="form-control" name="telephone">
                            </div>
                            <div class="form-group">
                                <label>Почта</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Пароль</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label>Повторите пароль</label>
                                <input type="password" class="form-control" name="repeat">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Регистрация</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>




