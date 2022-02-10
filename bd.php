CREATE DATABASE `mydb` CHARACTER SET utf8 COLLATE 'utf8_general_ci';
CREATE TABLE `user` (
`id` INT(10) NOT NULL AUTO_INCREMENT,
`first_name` VARCHAR(255) NULL DEFAULT NULL,
`last_name` VARCHAR(255) NULL DEFAULT NULL,
`login` VARCHAR(255) NULL DEFAULT NULL,
`password` VARCHAR(255) NULL DEFAULT NULL,
PRIMARY KEY (`id`)
);
INSERT INTO `user` (`first_name`, `last_name`, `login`, `password`) VALUES ('админ', 'админов', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

<?php
    session_start(); // запускаем сессию. 
    /*
    * Чуть позже, если авторизация пройдут успешно, мы запишем в сессию login пользователя. 
    * По этой записи будем проверять, авторизован пользователь или нет
    * Теперь создадим несколько констант, необходимых для работы с базой данных
    * а также сделаем подключение к базе данных
    * обычно все константы и подключения к базе данных для удобства выносятся в отдельный файл 
    * и подключаются по необходимости, но сейчас все сделаем в этом скрипте, чтоб было понятней
    */
    // константы
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB_NAME", "mydb");
    //подключение к бд
    $db_connect = mysql_connect(HOST, USER, PASSWORD, TRUE); 
    mysql_selectdb(DB_NAME,$db_connect);
    mysql_set_charset('utf8'); // задаем кодировку для работы с бд
 
    /* 
    * проверяем, если пользователь нажал "OK"
    * то делаем запрос к бд и проверяем существует ли такой пользователь и такой пароль
    * если существует, то создадим запись о пользователе в сессии 
    * и отправим пользователя на другую страницу 
    * Примечание:
    * - Пароль в базе данных хранится в хешированном виде, поэтому сверяем с таким же видом MD5($_POST['pass'])
    * - В данном примере, я полученные данные сразу подставляю в запрос, так делать категорически нельзя. 
    * Обязательно нужно экранировать запросы, но сейчас я этого не делаю умышленно, чтобы код был более понятен
    */
    if(isset($_POST['login']) && isset($_POST['pass'])){
        $sql = mysql_query("
            SELECT count(*) FROM `user` 
                WHERE `login` = '".$_POST['login']."'
                AND `password` = '".MD5($_POST['pass'])."';
        ") or die(mysql_error());
        $row = mysql_fetch_assoc($sql);
        if($row['count(*)']>0){
            $_SESSION['login'] = $_POST['login'];
            header("Location: /user.php");exit;
        }else{
            echo '<b style="color:red;">Введен не верный логин/пароль!</b>';
        }
    }
?>
<form action="" method="post">
    <span>login: </span><input type="text" name="login" /><br/>
    <span>password: </span><input type="password" name="pass" /><br/>
    <input type="submit" value="OK" />
</form>
<?php
    session_start();
    // константы
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB_NAME", "mydb");
    //подключение к бд
    $db_connect = mysql_connect(HOST, USER, PASSWORD, TRUE); 
    mysql_selectdb(DB_NAME,$db_connect);
    mysql_set_charset('utf8');
     
    //проверяем, авторизовал ли пользователь,
    // если нет, то редиректим его на авторизацию
    if(isset($_SESSION['login'])){
        $sql = mysql_query("
            SELECT * FROM `user` 
                WHERE `login` = '".$_SESSION['login']."';
        ") or die(mysql_error());
        $row = mysql_fetch_assoc($sql);
?>
<table>
    <tr>
        <td>id</td>
        <td>first_name</td>
        <td>last_name</td>
    </tr>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['first_name']; ?></td>
        <td><?php echo $row['last_name']; ?></td>
    </tr>
</table>
 
<?php
    }else{
        header("Location: /login.php");exit;
    }
     
    /*
    для разлогинивания можно использовать такой код
    тут удаляются все сессионные куки и сами сессии
    а потом происходит редирект на авторизацию
    *//*
    unset($_COOKIE[session_name()]);
    unset($_COOKIE[session_id()]);
    session_unset();
    session_destroy();
    header("Location: /login.php");
    exit;
    */
?>
