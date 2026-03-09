<!doctype html>
<html>
<head>
    <?php $current_route = uri_string(); ?>
    <title>CodeIgniter - <?= esc($current_route); ?></title>
    <style>
        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        .container { margin: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>
        <?php if (isset($title_header)): ?>
            <h1><?= esc($title_header); ?> - <?= esc($current_route); ?></h1>
        <?php endif ?>
        </h1>