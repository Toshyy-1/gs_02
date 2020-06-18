<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet/less" type="text/css" href="css/login.less">
<script src="http://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
</head>
<body>
  

<div class="wrapper">
    <div class="container">
        <h1>書籍管理</h1>
        <h2>Welcome</h2>
        <form class="form" action="list.php" method = "post">
            <input type="text" placeholder="Username" name="username" value = "">
            <input type="password" placeholder="Password" name="pass" value = "">
            <button type="submit" id="login-button" name ="login" value = "ログイン">Login</button>
        </form>
    </div>
    
    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

