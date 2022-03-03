<!DOCTYPE html>
<html lang = "en">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compotible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, intial-scale=1.0">
        <link rel = "stylesheet" href = "css\bootstrap.min.css">
        <link rel = "stylesheet" href = "css\style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>champion</title>
    </head>
    <body>
        <header>
        </header>

        <section class="forwhom">
            <div class="container">
                <form method="post"> 
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Введите комментарий</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <div class="mb-3">
                      <div class="row g-3">
                        <div class="col">
                          <input name="name" type="text" class="form-control" id="validationCustomUsername" placeholder="Имя" aria-label="Имя" required>
                        </div>
                        <div class="col">
                          <input name="name" type="text" class="form-control" id="validationCustomUsername" placeholder="Фамилия" aria-label="Фамилия" required>
                        </div>
                        <div class="col">
                            <input name="name" type="text" class="form-control" id="validationCustomUsername" placeholder="Отчество" aria-label="Отчество" required>
                          </div>
                      </div>
                    </div>

                    <div class="mb-3">
                        <label for="InputAdress1" class="form-label">Адресс</label>
                        <input type="adress" class="form-control" id="InputAdress1" aria-describedby="adressHelp">
                        <div id="adress" class="form-text">Необходимо ввести домашний адресс(город, улица, дом..)</div>
                      </div>
                      <div class="mb-3">
                        <label for="InputEmail1" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="InputMobileNumber1" class="form-label">Мобильный телефон</label>
                        <input name="mobile" type="mobile" class="form-control" id="InputMobileNumber1" aria-describedby="mobileHelp" required>
                      </div>

                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02">
                      </div>

                      <!-- Сообщение при ошибке -->
      <div class="alert alert-danger form-error d-none">
        Исправьте данные и отправьте форму ещё раз.
      </div>
    
                    <button type="submit" class="btn btn-primary">Отправить</button>
                  </form>
                  </div>
            </section>
            
        
            
<?php


session_start();
$data['result'] = 'success';

  $name = filter_var(trim($_POST['name']),
  FILTER_SANITIZE_STRING);
  $email = filter_var(trim($_POST['email']),
  FILTER_SANITIZE_STRING);
  $mobile  = filter_var(trim($_POST['mobile']),
  FILTER_SANITIZE_STRING);
  
  if (mb_strlen($name) < 5 || mb_strlen($name) > 90) {
    echo "Недопустимая длина имени";
    exit();
  } else if(preg_match('/@gmail.com/i', $email)){
    echo "регистрация пользователей с таким почтовым адресом невозможна";
    exit();
  } else if(mb_strlen($mobile) < 5 || mb_strlen($mobile) > 90) {
    echo "Недопустимый номер";
    exit();
  }
?>


  
       
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src = "js\bootstrap.bundle.min.js"></script>

    </body>
</html>