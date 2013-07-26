<!DOCTYPE html>
<html ng-app="yams">
<head>
    <title>Yams</title>
    <?php foreach($this->css as $cssFile): ?>
        <link rel="stylesheet" href="<?= $cssFile ?>" />
    <?php endforeach; ?>
</head>
<body>

<header class="site-header">
    <div class="container">
        <div class="logo">
            <a href="/">Yams</a>
        </div>
        <div class="sign-buttons">
            <a href="/register" class="btn btn-success">Sign up</a>
            <a href="/login" class="btn">Sign in</a>
        </div>
    </div>
</header>

<div class="container" ng-view></div>
    <?php foreach($this->js as $jsFile): ?>
        <script src="<?= $jsFile ?>"></script>
    <?php endforeach; ?>
</body>
</html>
