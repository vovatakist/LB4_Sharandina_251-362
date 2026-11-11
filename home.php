<?php
date_default_timezone_set('Etc/GMT-3');

include 'header.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<main class='container'><p>Ошибка: Данные формы не были отправлены.</p><a href='index.php' class='btn'>Перейти к форме</a></main>";
    exit;
}

$name = htmlspecialchars($_POST['name'] ?? 'Не указано');
$email = htmlspecialchars($_POST['email'] ?? 'Не указано');
$category = $_POST['category'] ?? '';
$message = htmlspecialchars($_POST['message'] ?? '');
$source = $_POST['source'] ?? '';
?>

<main class="container">
    <div class="result-box">
        <h2>Результат обработки обращения</h2>
        
        <p><b>Здравствуйте,</b> <?php echo $name; ?></p>
        
        <?php if ($category === 'propose'): ?>
            <p class="status-msg text-success">Спасибо за Ваше предложение:</p>
        <?php else: ?>
            <p class="status-msg text-danger">Мы рассмотрим Вашу жалобу:</p>
        <?php endif; ?>
        
        <div class="message-preview">
            <?php echo nl2br($message); ?>
        </div>
        
        <p class="file-info">
            <?php
            if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
                echo "<b>Вы приложили следующий файл:</b> " . htmlspecialchars($_FILES['attachment']['name']);
            } else {
                echo "Файл не был прикреплен.";
            }
            ?>
        </p>
        
        <div style="margin-top: 30px;">
            <a class="btn" href="index.php?N=<?php echo urlencode($name); ?>&E=<?php echo urlencode($email); ?>&S=<?php echo urlencode($source); ?>">Заполнить снова</a>
        </div>
    </div>
</main>

<footer>
    <p>Сформировано <?php echo date('d.m.Y в H-i:s'); ?></p>
</footer>
</body>
</html>
