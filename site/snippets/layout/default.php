<!DOCTYPE html>
<html lang="de" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <!-- !CSS -->
    <?= css('/assets/css/main.css') ?>
</head>
<!-- !Body -->
<body>
    <div id="container">
        <?= $slots->head() ?>
        <?= $slots->main() ?>
        <footer>
        
        </footer><!-- /footer -->
    </div><!--!/#container -->
</body>
</html>
