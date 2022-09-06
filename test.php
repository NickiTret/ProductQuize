<?php
$link = "./email.php" . "?" . $_SERVER['QUERY_STRING'];
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
  <link rel="stylesheet" href="css/custom-select.css" />
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
    <div class="infoBg">
      <img src="img/infoBg.svg" alt="infoBg" />
    </div>
    <main class="quiz">
      <ul class="quiz__list test">
        <li class="test__unit">
          <h2 class="test__title">Выберите пол</h2>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="gender" id="gen1" value="man" />
              <label for="gen1" class="test__gender">
                <p><span>Мужчина</span></p>
                <img src="img/genderman.png" alt="" />
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="gender" id="gen2" value="woman" />
              <label for="gen2" class="test__gender">
                <p><span>Женщина</span></p>
                <img src="img/gendergirl.png" alt="" />
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Какой ваш желаемый вес?</h2>
          <ul class="test__controls">
            <li class="test__input">
              <input type="number" name="normalWeight" id="normalWeight" placeholder="Введите желаемый вес..." />
              <div id="unitOfWeight"></div>
            </li>
          </ul>
        </li>
        <li class="test__unit" id="multiValue">
          <h2 class="test__title test__title-increased">
            Уточните физические параметры вашего тела
          </h2>
          <ul class="test__controls">
            <li class="test__input test__input-full">
              <label class="test__input-label">
                Ваш возраст (полных лет)
              </label>
              <input type="number" name="age" id="age" placeholder="Введите ваш возраст" />
            </li>
            <li class="test__input">
              <label class="test__input-label">Рост</label>
              <input type="number" name="height" id="height" placeholder="Введите ваш рост" />
              <div id="unitOfWeight1"></div>
            </li>
            <li class="test__input">
              <label class="test__input-label">Текущий вес</label>
              <input type="number" name="weight" id="weight" placeholder="Введите ваш вес" />
              <div id="unitOfWeight2"></div>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title test__title-decrease">
            Какой у вас тип фигуры?
          </h2>
          <p class="test__subtitle">
            Каждый тип телосложения отличается особенностями метаболизма
          </p>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="bodyType" id="bt1" value="Эктоморф" />
              <label for="bt1" class="test__bodyType">
                <p>
                  <span>Эктоморф</span>
                  <span>Худой и высокий, быстрый метаболизм</span>
                </p>
                <img src="img/ectomorf.svg" alt="ectomorf" />
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="bodyType" id="bt2" value="Мезоморф" />
              <label for="bt2" class="test__bodyType">
                <p>
                  <span>Мезоморф</span>
                  <span>
                    Мускулистый, с крепким телосложением, обмен веществ
                    средний
                  </span>
                </p>
                <img src="img/mezomorf.svg" alt="mezomorf" />
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="bodyType" id="bt3" value="Эндоморф" />
              <label for="bt3" class="test__bodyType">
                <p>
                  <span>Эндоморф</span>
                  <span>Мягкий и объемный, медленный метаболизм</span>
                </p>
                <img src="img/endomorf.svg" alt="endomorf" />
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title test__title-decrease">
            Опишите свой обычный день
          </h2>
          <p class="test__subtitle">
            <span id="dayMale" style="display: none;">Мужчины <span class="age">50+</span> лет, которые хотят похудеть, требуют индивидуального
              подхода в зависимости от образа жизни</span>
            <span id="dayFemale" style="display: none;">Женщины <span class="age">20+</span> лет, которые хотят похудеть, требуют индивидуального подхода
              в зависимости от образа жизни</span>
          </p>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="typicalDay" id="td1" value="находяться в основном дома." />
              <label for="td1" class="test__gender">
                <p><span>В основном дома</span></p>
                <img src="img/home.png" alt="home" />
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="typicalDay" id="td2" value="работают в офисе." />
              <label for="td2" class="test__gender">
                <p><span>Работа в офисе</span></p>
                <img src="img/work.png" alt="work" />
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="typicalDay" id="td3" value="часто прогуливаются пешком." />
              <label for="td3" class="test__gender">
                <p><span>Ежедневные долгие прогулки</span></p>
                <img src="img/stroll.png" alt="stroll" />
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="typicalDay" id="td4" value="работают физически." />
              <label for="td4" class="test__gender">
                <p><span>Физическая работа</span></p>
                <img src="img/engineer.png" alt="engineer" />
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit" id="plag">
          <h2 class="test__title test__title-decrease">
            Строгие диеты не работают
          </h2>
          <p class="test__subtitle">
            Поэтому мы помогаем вам сформировать новые полезные привычки ради
            долгосрочных результатов
          </p>
          <img class="test__unit-bg" src="img/dietImg.svg" alt="dietImg" />
          <div class="test__diet">
            <div class="test__diet-point">
              <img src="img/redPoint.svg" alt="redPoint" />
              <span>Строгая диета</span>
            </div>
            <div class="test__diet-point">
              <img src="img/orangePoint.svg" alt="orangePoint" />
              <span>Сбалансированная диета</span>
            </div>
          </div>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            У вас появляются неприятные ощущения в желудке в течение дня?
          </h2>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="stomach" id="stomach1" value="Да" />
              <label for="stomach1" class="test__gender">
                <p><span>Да</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="stomach" id="stomach2" value="Нет" />
              <label for="stomach2" class="test__gender">
                <p><span>Нет</span></p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            Как давно вы находились в своем идеальном весе?
          </h2>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="idealWeight" id="iw1" value="Меньше 1 года назад" />
              <label for="iw1" class="test__gender">
                <p><span>Меньше 1 года назад</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="idealWeight" id="iw2" value="1-3 года назад" />
              <label for="iw2" class="test__gender">
                <p><span>1-3 года назад</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="idealWeight" id="iw3" value="Более 3 лет назад" />
              <label for="iw3" class="test__gender">
                <p><span>Более 3 лет назад</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="idealWeight" id="iw4" value="Мне пока не удавалось достигнуть своего идеального
                веса" />
              <label for="iw4" class="test__gender">
                <p>
                  <span>
                    Мне пока не удавалось достигнуть своего идеального веса
                  </span>
                </p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Сколько раз вы пытались похудеть?</h2>
          <p class="test__subtitle">
            Мы сформируем ваш план питания согласно вашим предпочтениям
          </p>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="trying" id="tr1" value="Ни разу" />
              <label for="tr1" class="test__gender">
                <p><span>Ни разу</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="trying" id="tr2" value="1-2 раза" />
              <label for="tr2" class="test__gender">
                <p><span>1-2 раза</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="trying" id="tr3" value="Много раз" />
              <label for="tr3" class="test__gender">
                <p><span>Много раз</span></p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Сколько раз в день вы хотели бы есть?</h2>
          <p class="test__subtitle">
            Мы сформируем ваш план питания согласно вашим предпочтениям
          </p>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="meals" id="meals1" value="Два раза (завтрак, обед и 2 перекуса)" />
              <label for="meals1" class="test__gender">
                <p><span>Два раза (завтрак, обед и 2 перекуса)</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="meals" id="meals2" value="Три раза (завтрак, обед и ужин)" />
              <label for="meals2" class="test__gender">
                <p><span>Три раза (завтрак, обед и ужин)</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="meals" id="meals3" value="Четыре раза (завтрак, перекус, обед и ужин)" />
              <label for="meals3" class="test__gender">
                <p>
                  <span>Четыре раза (завтрак, перекус, обед и ужин)</span>
                </p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="meals" id="meals4" value="Пять раз (завтрак, обед, ужин и 2 перекуса)" />
              <label for="meals4" class="test__gender">
                <p>
                  <span>Пять раз (завтрак, обед, ужин и 2 перекуса)</span>
                </p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Выберите все, что вам свойственно:</h2>
          <ul class="test__controls">
            <li class="test__checkbox">
              <input type="checkbox" name="habit" id="hab1" value="Я ем поздно ночью" />
              <label for="hab1">
                <span></span>
                <p>Я ем поздно ночью</p>
                <img src="img/sleep1.svg" alt="sleep1" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="habit" id="hab2" value="Я мало сплю" />
              <label for="hab2">
                <span></span>
                <p>Я мало сплю</p>
                <img src="img/sleep2.svg" alt="sleep2" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="habit" id="hab3" value="Я не могу отказаться от сладкого" />
              <label for="hab3">
                <span></span>
                <p>Я не могу отказаться от сладкого</p>
                <img src="img/sleep3.svg" alt="sleep3" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="habit" id="hab4" value="Я люблю газированные напитки" />
              <label for="hab4">
                <span></span>
                <p>Я люблю газированные напитки</p>
                <img src="img/sleep4.svg" alt="sleep4" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="habit" id="hab5" value="В моем рационе очень много соли" />
              <label for="hab5">
                <span></span>
                <p>В моем рационе очень много соли</p>
                <img src="img/sleep5.svg" alt="sleep5" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="habit" id="hab6" value="Ничего из перечисленного выше" />
              <label for="hab6">
                <span></span>
                <p>Ничего из перечисленного выше</p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit" id="info">
          <h2 class="test__title">Верите ли вы в то, что нельзя есть:</h2>
          <ul class="test__list">
            <li>После 18</li>
            <li>Жирное</li>
            <li>Бананы</li>
            <li>Сладости</li>
          </ul>
          <strong>... если вы хотите похудеть?</strong>
          <ul class="test__controls test__faith">
            <li class="test__option">
              <input type="radio" name="faith" id="faith1" value="Да" />
              <label for="faith1" class="test__faith-item">
                <p><span>Да</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="faith" id="faith2" value="Нет" />
              <label for="faith2" class="test__faith-item">
                <p><span>Нет</span></p>
              </label>
            </li>
          </ul>

          <div class="info">
            <strong id="done" style="display: none;" class="title">Все верно!</strong>
            <strong class="title">

              Это только мифы!
            </strong>
            <span>
              Позвольте нам доказать, что вы можете достичь тела своей мечты
              <strong>без ограничений</strong>
              в еде, которую вы любите.
            </span>
            <img class="img" src="img/stars.png" alt="stars" />
          </div>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Вы занимаетесь спортом?</h2>
          <p class="test__subtitle">
            <span style="display: none;" id="sportMale"> Важно учитывать уровень активности для мужчин, которые хотят
              сбросить <span class="weightBox">28 </span>кг и <span class="place">в основном дома.</span> </span>
            <span style="display: none;" id="sportFemale"> Важно учитывать уровень активности для женщин, которые хотят
              сбросить <span class="weightBox">28</span>кг и <span class="place">в основном дома.</span> </span>
          </p>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="sport" id="sport1" value="sport1" />
              <label for="sport1" class="test__gender">
                <p><span>Практически нет</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="sport" id="sport2" value="sport2" />
              <label for="sport2" class="test__gender">
                <p><span>Только прогулки</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="sport" id="sport3" value="sport3" />
              <label for="sport3" class="test__gender">
                <p><span>1-2 раза в неделю</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="sport" id="sport4" value="sport4" />
              <label for="sport4" class="test__gender">
                <p><span>3-5 раза в неделю</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="sport" id="sport5" value="sport5" />
              <label for="sport5" class="test__gender">
                <p><span>5-7 раз в неделю</span></p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            Как вы можете оценить уровень своей энергии изо дня в день?
          </h2>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="energy" id="energy1" value="Стабильный" />
              <label for="energy1" class="test__gender">
                <p><span>Стабильный</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="energy" id="energy2" value="Вялость перед едой" />
              <label for="energy2" class="test__gender">
                <p><span>Вялость перед едой</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="energy" id="energy3" value="Снижение активности после обеда" />
              <label for="energy3" class="test__gender">
                <p><span>Снижение активности после обеда</span></p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Как долго вы спите?</h2>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="sleep" id="sleep1" value="Меньше 5 часов" />
              <label for="sleep1" class="test__gender">
                <p><span>Меньше 5 часов</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="sleep" id="sleep2" value="5-6 часов" />
              <label for="sleep2" class="test__gender">
                <p><span>5-6 часов</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="sleep" id="sleep3" value="7-8 часов" />
              <label for="sleep3" class="test__gender">
                <p><span>7-8 часов</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="sleep" id="sleep4" value="Больше 8 часов" />
              <label for="sleep4" class="test__gender">
                <p><span>Больше 8 часов</span></p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Сколько воды вы выпиваете в день?</h2>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="water" id="water1" value="Только кофе или чай" />
              <label for="water1" class="test__gender">
                <p><span>Только кофе или чай</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="water" id="water2" value="Меньше двух стаканов" />
              <label for="water2" class="test__gender">
                <p><span>Меньше двух стаканов</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="water" id="water3" value="2-6 стаканов" />
              <label for="water3" class="test__gender">
                <p><span>2-6 стаканов</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="water" id="water4" value="7-10 стаканов" />
              <label for="water4" class="test__gender">
                <p><span>7-10 стаканов</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="water" id="water5" value="Больше 10 стаканов" />
              <label for="water5" class="test__gender">
                <p><span>Больше 10 стаканов</span></p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            Сколько времени вы готовы тратить на приготовление одного блюда?
          </h2>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="cooking" id="cookin1" value="Менее 30 минут" />
              <label for="cookin1" class="test__gender">
                <p><span>Менее 30 минут</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="cooking" id="cookin2" value="30-60 минут" />
              <label for="cookin2" class="test__gender">
                <p><span>30-60 минут</span></p>
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="cooking" id="cookin3" value="Более 1 часа" />
              <label for="cookin3" class="test__gender">
                <p><span>Более 1 часа</span></p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            Вы хотите включить замороженные продукты и полуфабрикаты в свой
            план питания?
          </h2>
          <p class="test__subtitle">
            Это поможет вам сэкономить время на приготовлении пищи.
          </p>
          <ul class="test__controls">
            <li class="test__option">
              <input type="radio" name="freezing" id="freezin1" value="Да" />
              <label for="freezin1" class="test__gender test__gender-minImg">
                <p><span>Да</span></p>
                <img src="img/checkMult.svg" alt="checkMult" />
              </label>
            </li>
            <li class="test__option">
              <input type="radio" name="freezing" id="freezin2" value="Нет, я люблю свежеприготовленную еду" />
              <label for="freezin2" class="test__gender test__gender-minImg">
                <p><span>Нет, я люблю свежеприготовленную еду</span></p>
                <img src="img/crossmult.svg" alt="crossmult" />
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Какая кухонная техника у вас есть?</h2>
          <p class="test__subtitle">
            Это поможет вам сэкономить время на приготовлении пищи.
          </p>
          <ul class="test__controls">
            <li class="test__checkbox">
              <input type="checkbox" name="technique" id="tech1" value="Блендер" />
              <label for="tech1">
                <span></span>
                <p>Блендер</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="technique" id="tech2" value="Духовка" />
              <label for="tech2">
                <span></span>
                <p>Духовка</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="technique" id="tech3" value="Микроволновая печь" />
              <label for="tech3">
                <span></span>
                <p>Микроволновая печь</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="technique" id="tech4" value="Плита" />
              <label for="tech4">
                <span></span>
                <p>Плита</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="technique" id="tech5" value="Мультиварка" />
              <label for="tech5">
                <span></span>
                <p>Мультиварка</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="technique" id="tech6" value="Ничего из перечисленного выше" />
              <label for="tech6">
                <span></span>
                <p>Ничего из перечисленного выше</p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            У вас есть ограничения в питании или аллергия?
          </h2>
          <ul class="test__controls">
            <li class="test__checkbox">
              <input type="checkbox" name="restrictions" id="restr1" value="У меня непереносимость лактозы" />
              <label for="restr1">
                <span></span>
                <p>У меня непереносимость лактозы</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="restrictions" id="restr2" value="Я не ем глютен" />
              <label for="restr2">
                <span></span>
                <p>Я не ем глютен</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="restrictions" id="restr3" value="Я вегетарианец" />
              <label for="restr3">
                <span></span>
                <p>Я вегетарианец</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="restrictions" id="restr4" value="Я веган" />
              <label for="restr4">
                <span></span>
                <p>Я веган</p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">Выберите все, что вам свойственно:</h2>
          <ul class="test__controls">
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg1" value="Брокколи" />
              <label for="veg1">
                <span></span>
                <p>Брокколи</p>
                <img src="img/veg1.svg" alt="veg1" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg2" value="Цветная капуста" />
              <label for="veg2">
                <span></span>
                <p>Цветная капуста</p>
                <img src="img/veg2.svg" alt="veg2" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg3" value="Болгарский перец" />
              <label for="veg3">
                <span></span>
                <p>Болгарский перец</p>
                <img src="img/veg3.svg" alt="veg3" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg4" value="Баклажан" />
              <label for="veg4">
                <span></span>
                <p>Баклажан</p>
                <img src="img/veg4.svg" alt="veg4" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg5" value="Капуста" />
              <label for="veg5">
                <span></span>
                <p>Капуста</p>
                <img src="img/veg5.svg" alt="veg5" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg6" value="Спаржа" />
              <label for="veg6">
                <span></span>
                <p>Спаржа</p>
                <img src="img/veg6.svg" alt="veg6" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg7" value="Шпинат" />
              <label for="veg7">
                <span></span>
                <p>Шпинат</p>
                <img src="img/veg7.svg" alt="veg7" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg8" value="Лук" />
              <label for="veg8">
                <span></span>
                <p>Лук</p>
                <img src="img/veg8.svg" alt="veg8" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg9" value="Помидор" />
              <label for="veg9">
                <span></span>
                <p>Помидор</p>
                <img src="img/veg9.png" alt="veg9" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="vegetables" id="veg10" value="Огурец" />
              <label for="veg10">
                <span></span>
                <p>Огурец</p>
                <img src="img/veg10.png" alt="veg10" />
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            Отметьте крупы, которые вы хотели бы включить в свой рацион:
          </h2>
          <ul class="test__controls">
            <li class="test__checkbox">
              <input type="checkbox" name="groats" id="groats1" value="Рис" />
              <label for="groats1">
                <span></span>
                <p>Рис</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="groats" id="groats2" value="Киноа" />
              <label for="groats2">
                <span></span>
                <p>Киноа</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="groats" id="groats3" value="Гречка" />
              <label for="groats3">
                <span></span>
                <p>Гречка</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="groats" id="groats4" value="Амарант" />
              <label for="groats4">
                <span></span>
                <p>Амарант</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="groats" id="groats5" value="Кукурузная крупа" />
              <label for="groats5">
                <span></span>
                <p>Кукурузная крупа</p>
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="groats" id="groats6" value="Пшенная крупа" />
              <label for="groats6">
                <span></span>
                <p>Пшенная крупа</p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            Отметьте продукты, которые вы хотели бы включить в свой рацион:
          </h2>
          <ul class="test__controls">
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod1" value="Авокадо" />
              <label for="prod1">
                <span></span>
                <p>Авокадо</p>
                <img src="img/prod1.svg" alt="prod1" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod2" value="Бобы" />
              <label for="prod2">
                <span></span>
                <p>Бобы</p>
                <img src="img/prod2.svg" alt="prod2" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod3" value="Грибы" />
              <label for="prod3">
                <span></span>
                <p>Грибы</p>
                <img src="img/prod3.png" alt="prod3" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod4" value="Яйца" />
              <label for="prod4">
                <span></span>
                <p>Яйца</p>
                <img src="img/prod4.svg" alt="prod4" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod5" value="Молоко" />
              <label for="prod5">
                <span></span>
                <p>Молоко</p>
                <img src="img/prod5.svg" alt="prod5" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod6" value="Творог" />
              <label for="prod6">
                <span></span>
                <p>Творог</p>
                <img src="img/prod6.svg" alt="prod6" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod7" value="Тофу" />
              <label for="prod7">
                <span></span>
                <p>Тофу</p>
                <img src="img/prod7.svg" alt="prod7" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod8" value="Хумус" />
              <label for="prod8">
                <span></span>
                <p>Хумус</p>
                <img src="img/prod8.svg" alt="prod8" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="products" id="prod9" value="Растительное молоко" />
              <label for="prod9">
                <span></span>
                <p>Растительное молоко</p>
                <img src="img/prod9.svg" alt="prod9" />
              </label>
            </li>
          </ul>
        </li>

        <li class="test__unit">
          <h2 class="test__title">
            Отметьте виды мяса и рыбы, которые вы хотели бы включить в свой
            рацион:
          </h2>
          <ul class="test__controls">
            <li class="test__checkbox">
              <input type="checkbox" name="meat" id="meat1" value="Индейка" />
              <label for="meat1">
                <span></span>
                <p>Индейка</p>
                <img src="img/meat1.svg" alt="meat1" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="meat" id="meat2" value="Говядина" />
              <label for="meat2">
                <span></span>
                <p>Говядина</p>
                <img src="img/meat2.svg" alt="meat2" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="meat" id="meat3" value="Курятина" />
              <label for="meat3">
                <span></span>
                <p>Курятина</p>
                <img src="img/meat3.svg" alt="meat3" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="meat" id="meat4" value="Свинина" />
              <label for="meat4">
                <span></span>
                <p>Свинина</p>
                <img src="img/meat4.svg" alt="meat4" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="meat" id="meat5" value="Рыба" />
              <label for="meat5">
                <span></span>
                <p>Рыба</p>
                <img src="img/meat5.svg" alt="meat5" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="meat" id="meat6" value="Морепродукты" />
              <label for="meat6">
                <span></span>
                <p>Морепродукты</p>
                <img src="img/meat6.svg" alt="meat6" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="meat" id="meat7" value="Ничего из перечисленного выше" />
              <label for="meat7">
                <span></span>
                <p>Ничего из перечисленного выше</p>
              </label>
            </li>
          </ul>
        </li>
        <li class="test__unit">
          <h2 class="test__title">
            Отметьте фрукты, которые вы хотели бы включить в свой рацион:
          </h2>
          <ul class="test__controls">
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit1" value="Цитрусовые" />
              <label for="fruit1">
                <span></span>
                <p>Цитрусовые</p>
                <img src="img/fruit1.png" alt="fruit1" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit2" value="Яблоки" />
              <label for="fruit2">
                <span></span>
                <p>Яблоки</p>
                <img src="img/fruit2.png" alt="fruit2" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit3" value="Груши" />
              <label for="fruit3">
                <span></span>
                <p>Груши</p>
                <img src="img/fruit3.png" alt="fruit3" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit4" value="Киви" />
              <label for="fruit4">
                <span></span>
                <p>Киви</p>
                <img src="img/fruit4.svg" alt="fruit4" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit5" value="Бананы" />
              <label for="fruit5">
                <span></span>
                <p>Бананы</p>
                <img src="img/fruit5.svg" alt="fruit5" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit6" value="Тропические фрукты" />
              <label for="fruit6">
                <span></span>
                <p>
                  Тропические фрукты

                  <span>ананас, манго, папайя, питахайя</span>
                </p>
                <img src="img/fruit6.svg" alt="fruit6" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit7" value="Хурма" />
              <label for="fruit7">
                <span></span>
                <p>Хурма</p>
                <img src="img/fruit7.svg" alt="fruit7" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit8" value="Персик и нектарин" />
              <label for="fruit8">
                <span></span>
                <p>Персик и нектарин</p>
                <img src="img/fruit8.svg" alt="fruit8" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit9" value="Ягоды" />
              <label for="fruit9">
                <span></span>
                <p>Ягоды</p>
                <img src="img/fruit9.svg" alt="fruit9" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit10" value="Виноград" />
              <label for="fruit10">
                <span></span>
                <p>Виноград</p>
                <img src="img/fruit10.svg" alt="fruit10" />
              </label>
            </li>
            <li class="test__checkbox">
              <input type="checkbox" name="fruit" id="fruit11" value="Гранат" />
              <label for="fruit11">
                <span></span>
                <p>Гранат</p>
                <img src="img/fruit11.svg" alt="fruit11" />
              </label>
            </li>
          </ul>
        </li>
      </ul>
    </main>
  </div>
  <template id="quizMeter">
    <div class="quiz__meter meter">
      <div class="meter__nums">
        <span class="unitID">00</span>
        /
        <span class="unitTotal">00</span>
      </div>

      <div class="meter__meter">
        <span class="meterVal"></span>
      </div>
    </div>
  </template>
  <template id="backButton">
    <button class="back backUnit">
      <svg width="27.5" height="16.5" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path style="
              color: #000;
              fill: #868686;
              stroke-linecap: round;
              stroke-linejoin: round;
              -inkscape-stroke: none;
            " d="M8.25 0a.917.917 0 0 0-.648.268L.268 7.602a.917.917 0 0 0-.182.275.917.917 0 0 0 0 .002.917.917 0 0 0-.027.08.917.917 0 0 0-.05.242A.917.917 0 0 0 0 8.25a.917.917 0 0 0 .01.049.917.917 0 0 0 .049.242.917.917 0 0 0 .027.08.917.917 0 0 0 0 .002.917.917 0 0 0 .182.275l7.334 7.334a.917.917 0 0 0 1.296-.002.917.917 0 0 0 0-1.294l-5.77-5.77h23.456a.917.917 0 0 0 .916-.916.917.917 0 0 0-.916-.916H3.129l5.77-5.77a.917.917 0 0 0 0-1.296A.917.917 0 0 0 8.25 0z" />
      </svg>
      <span>К предыдущему вопросу</span>
    </button>
  </template>
  <template id="confirmButton">
    <button class="mk-button unitConfirm" disabled>Далее</button>
  </template>

  <a id="confirmLink" href="<?php echo $link ?>" style="display: none;"></a>

  <script src="js/jquery.min.js"></script>
  <script src="js/custom-select.js"></script>
  <script src="js/test1.js"></script>
  <script>
    const btnNo = document.querySelector('#faith2');
    const btnResults = document.querySelector('#done');
    const male = document.querySelector('#gen1');
    const female = document.querySelector('#gen2');
    const answerSportMale = document.querySelector('#sportMale');
    const answerSportFemale = document.querySelector('#sportFemale');
    const answerDayMale = document.querySelector('#dayMale');
    const answerDayFemale = document.querySelector('#dayFemale');



    male.addEventListener('click', () => {
      answerSportMale.style.display = '';
      answerSportFemale.style.display = 'none';
      answerDayMale.style.display = '';
      answerDayFemale.style.display = 'none';
    })

    female.addEventListener('click', () => {
      answerSportFemale.style.display = '';
      answerSportMale.style.display = 'none';
      answerDayFemale.style.display = '';
      answerDayMale.style.display = 'none';
    })

    btnNo.addEventListener('click', function() {
      btnResults.style.display = '';
    })
  </script>
</body>

</html>