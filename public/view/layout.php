<html>
<haed>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
</haed>
<body>
<div class="container" style="margin-top: 20px">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="/">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contacts">Contacts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/products">Products</a>
        </li>
    </ul>
    <div style="margin-top: 20px">
        <?php (new \helpers\FlashMessage())->display(); ?>
        <?= $content; ?>
    </div>
</div>
</body>
</html>