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
        <div class="row">
            <div class="col-lg-4 logo">
                <a href="/">Yams</a>
            </div>
            <div class="col-lg-8 text-right">
                <a class="btn btn-success" href="/register">Sign up</a>
                <a class="btn btn-default" href="/">Sign in</a>
            </div>
        </div>
    </div>
</header>

<div class="site-main" ng-view></div>

    <?php foreach($this->js as $jsFile): ?>
        <script src="<?= $jsFile ?>"></script>
    <?php endforeach; ?>
</body>
</html>
