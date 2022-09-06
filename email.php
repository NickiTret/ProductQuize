<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="viewport" content="width=device-width" />
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
      <a href="" class="header__logo"></a>
      <img src="img/logo.png" alt="logo" />
      </a>
      <a href="" class="header__burger">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </header>
    <main class="result">
      <div class="result__preloader">
        <h1 class="result__title">Обработка данных</h1>
        <p class="result__subtitle">
          Ваш персональный план питания формируется
        </p>
        <div class="result__percent">
          <svg class="progress-ring" width="250" height="250">
            <circle class="progress-ring__circle" stroke="#f97b25" stroke-width="20" cx="125" cy="125" r="110" fill="transparent"></circle>
          </svg>
          <span id="present">0%</span>
        </div>
      </div>
      <form action="order.php" method="post" class="result__input-email" id="email">
        <input type="hidden" name="sub1" value="{subid}" />

        <input type="hidden" name="phone" value="user__phone" />
        <p>
          Введите ваше имя и адрес электронной почты, чтобы получить персональный план
          питания и тренировок. Мы уважаем вашу конфиденциальность и очень
          серьезно относимся к ее защите — никакого спама.
        </p>
        <label>Например: Иван Иванов</label>
        <input type="text" name="name" placeholder="Введите ваше Имя" style="margin-bottom: 15px;" />
        <label>Например: example@mail.com</label>
        <input class="input-email" type="email" name="other[email]" placeholder="Введите ваш Email" />
        <button type="submit" class="btn">
          Далее
        </button>
        </а>
      </form>
    </main>
  </div>
</body>

<a id="confirmLink" href="order.php" style="display: none;"></a>
<script src="js/email.js"></script>

</html>