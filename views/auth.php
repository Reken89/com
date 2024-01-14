<!DOCTYPE html>
<html>
    <head>
        <title>Авторизация</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="assets/js/api.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="col-md-offset-3 col-md-6">
                <div class="tab" role="tabpanel">
                    <div class="tab-content tabs">
                        <form action="/com/authentication" class="form-horizontal" method="POST">  
                            <div class="form-group">
                                <label>Телефон или email</label>
                                <input type="text" class="form-control" name="login">
                            </div>                    
                            <div class="form-group">
                                <label>Пароль</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="g-recaptcha" data-sitekey="<?php echo $_SESSION['key']; ?>"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


