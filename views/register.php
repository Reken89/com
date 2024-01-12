<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <div class="col-md-offset-3 col-md-6">
        <div class="tab" role="tabpanel">
            <div class="tab-content tabs">
                <form action="/com/add" class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Телефон</label>
                        <input type="text" class="form-control" name="telephone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Почта</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Повторите пароль</label>
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


