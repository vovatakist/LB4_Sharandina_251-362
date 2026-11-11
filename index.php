<?php
date_default_timezone_set('Etc/GMT-3');

include 'header.php';

$name_val = isset($_GET['N']) ? htmlspecialchars($_GET['N']) : '';
$email_val = isset($_GET['E']) ? htmlspecialchars($_GET['E']) : '';
$source_val = isset($_GET['S']) ? htmlspecialchars($_GET['S']) : '';
?>

<main class="container">
    <h2>Обратная связь</h2>
    <form action="home.php" method="POST" enctype="multipart/form-data">
        
        <div class="form-row">
            <label for="fullname">ФИО:</label>
            <input type="text" id="fullname" name="name" value="<?php echo $name_val; ?>" required>
        </div>

        <div class="form-row">
            <label for="email">Ваш е-майл:</label>
            <input type="email" id="email" name="email" placeholder="example@mail.ru" value="<?php echo $email_val; ?>" required>
        </div>

        <div class="form-row">
            <label>Откуда узнали о нас?</label>
            <div class="field-group">
                <input type="radio" id="src-internet" name="source" value="internet" <?php if($source_val === 'internet') echo 'checked'; ?>>
                <label for="src-internet" class="inline-label">Реклама из интернета</label>
                
                <input type="radio" id="src-friends" name="source" value="friends" <?php if($source_val === 'friends') echo 'checked'; ?>>
                <label for="src-friends" class="inline-label">Рассказали друзья</label>
            </div>
        </div>

        <div class="form-row">
            <label for="appeal-type">Тема обращения:</label>
            <select id="appeal-type" name="category">
                <option value="propose">Предложение</option>
                <option value="complaint">Жалоба</option>
            </select>
        </div>

        <div class="form-row">
            <label for="message">Сообщение:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>

        <div class="form-row">
            <label for="file-attachment">Выбор файла:</label>
            <input type="file" id="file-attachment" name="attachment">
        </div>

        <div class="form-row no-align">
            <input type="checkbox" id="agreement" name="agreement" value="yes" required>
            <label for="agreement" class="inline-label">Даю согласие на обработку данных</label>
        </div>

        <div class="form-row button-row">
            <button type="submit" class="btn">Отправить</button>
        </div>

    </form>
</main>

<footer>
    <p>Сформировано <?php echo date('d.m.Y в H:i:s'); ?></p>
</footer>
</body>
</html>
