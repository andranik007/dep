<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/cont.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
?>



<style>
  .navbar {
    background-color: #FF9559; /* Оранжевый цвет фона */
  }

  .navbar .nav-link {
    color: #000000 !important; /* Черный цвет ссылок */
    font-size: 30px !important; /* Размер текста ссылок */
    width: 100% !important; /* Ширина ссылок */
    text-align: center  /* Черный цвет ссылок */
  }

  .navbar .nav-link:hover {
    color: #333333 !important; /* Цвет ссылки при наведении */
  }



.container1{
    margin-left{
        display: ;
    }
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="/ИС-4 Ханахян А.А/diploma/main.php"><img class="d-block w-100" src="uploads/Logotip.png" alt="Первый слайд"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Каталог</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Аренда</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/ИС-4 Ханахян А.А/diploma/about Us.php">О нас</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/ИС-4 Ханахян А.А/diploma/contacts.php">Контакты</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/ИС-4 Ханахян А.А/diploma/cart.php"><i class="bi bi-cart2"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-person"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/ИС-4 Ханахян А.А/diploma/login.php">Вход</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php
// Подключение к базе данных
$link = mysqli_connect("localhost", "root", "", "vel");

// Проверка соединения
if ($link === false) {
  die("Ошибка подключения: " . mysqli_connect_error());
}

// Получение ID товара из параметров запроса
$product_id = $_GET['id'];

// SQL запрос для получения информации о товаре по его ID
$sql = "SELECT * FROM products WHERE id = '$product_id'";
$result = mysqli_query($link, $sql);

// Проверка наличия товара
if (mysqli_num_rows($result) > 0) {
  // Отображение информации о товаре
  $row = mysqli_fetch_assoc($result);
  echo "<div class='container1'>";
  echo "<div class='row'>";
  echo "<div class='col-md-6'>";
  echo "<h2>{$row['name']}</h2>";
  echo "<img src='{$row['img']}' alt='{$row['name']}' class='img-fluid' style='width: 600px; height: 389px;'>";
  echo "<p>Описание: {$row['description']}</p>";
  echo "</div>";
  echo "<div class='col-md-6'>";
  echo "<p>Цена: {$row['price']}</p>";
  echo "<form method='post' action='add_to_cart.php'>";
  echo "<input type='hidden' name='product_id' value='{$row['id']}'>";
  echo "<button type='submit' class='btn btn-primary'>Добавить в корзину</button>";
  echo "</form>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
} else {
  echo "Товар не найден.";
}

// Закрытие соединения с базой данных
mysqli_close($link);
?>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>