<!DOCTYPE html>
<html>
    <head>
        <title>Личный кабинет</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    </head>
    <body>
        <p>Вы находитесь в закрытой части сайта.</p>
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <div class="tab" role="tabpanel">
                    <div class="tab-content tabs">
                        <form action="/com/update" class="form-horizontal" method="POST">  
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['info']['id']; ?>">
                                <label>Имя</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['info']['name']; ?>">
                            </div>                    
                            <div class="form-group">
                                <label>Телефон</label>
                                <input type="text" class="form-control" name="telephone" value="<?php echo $_SESSION['info']['telephone']; ?>">
                            </div> 
                            <div class="form-group">
                                <label>Почта</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['info']['email']; ?>">
                            </div> 
                            <div class="form-group">
                                <label>Пароль</label>
                                <input type="password" class="form-control" name="password"">
                            </div> 
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

