<?php
$link = "./test.php" . "?" . $_SERVER['QUERY_STRING'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="icon" href="img/favicon.ico" />
  <title>Product</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/test.css" />
</head>

<body>
  <div class="container">
    <header class="header">
      <a href="" class="header__logo"><img src="img/logo.png" alt="logo" /></a>
      <a href="" class="header__burger">
        <span></span><span></span><span></span>
      </a>
    </header>
    <main class="main">
      <img src="img/mainBg.svg" alt="mainBg" class="main__img" />
      <h1 class="main__title">
        Пройдите тест и получите персональный план питания
      </h1>
      <form action="test.php" class="main__form">
        <button class="main__form-btn btn">Пройти тест</button>
        <div class="main__form-terms">
          <input type="checkbox" id="terms" name="terms" required />
          <label for="terms"></label>
          <span>Продолжая, я соглашаюсь c Условиями использования, Политикой
            приватности, Условиями подписки, Политикой cookies</span>
        </div>
      </form>
    </main>
  </div>
</body>

</html>