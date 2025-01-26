<?php
function generateHead($page, $additionalCSS = []) {
    $pageMetas = getPageMetas($page);
    $currentMeta = isset($pageMetas[$page]) ? $pageMetas[$page] : $pageMetas['default'];


    $cssFiles = array_merge($currentMeta['css'], $additionalCSS);

    ?>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $currentMeta['description'] ?>">
        <meta name="keywords" content="<?= $currentMeta['keywords'] ?>">
        <meta name="author" content="Souleimane, Hugo, Nassim">

        <title><?= $currentMeta['title'] ?> | ProVision</title>


        <?php foreach ($cssFiles as $css): ?>
            <link rel="stylesheet" href="<?= $css ?>" type="text/css">
        <?php endforeach; ?>


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <script src="https://kit.fontawesome.com/386dcd1ba2.js" crossorigin="anonymous"></script>

        <!-- Swiper -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <script src="/../assets/js/main.js" defer></script>
    </head>
    <style>
        .swiper-pagination-bullet {
            background-color: #e2d703;
        }
        .swiper-pagination-bullet-active {
            background: #e2d703;
        }
        .swiper-button-prev {
            position: absolute;
            left: 30%;
            top: 98%;
            transform: translateY(-50%);
            color: #fff;
            background: #e2d703;
            padding: 5px 10px;
            border-radius: 10px;
            width: 2rem;
        }
        .swiper-button-next {
            position: absolute;
            right: 30%;
            top: 98%;
            transform: translateY(-50%);
            color: #fff;
            background: #e2d703;
            padding: 5px 10px;
            border-radius: 10px;
            width: 2rem;
        }
    </style>
    <?php
}

?>