<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonnements | ProVision</title>
    <link rel="stylesheet" href="subscription.css">
</head>
<body>
<?php include_once __DIR__ . '/../includes/nav.php'; ?>

<main class = "subscribe-page">
    <section class="subscribeHome">

        <div class="subscribeHome-text">
            <h3 class="subscribe_title">Choisissez le forfait qui vous convient</h3>
            <span class="h3-text">Rejoignez ProVision et choisissez parmi nos options d’abonnement flexibles adaptées à vos préférences de visionnage. Préparez-vous à un divertissement non-stop</span>
        </div>

        <div class="subscribeHome-container">
            <div class="subscribeHome-card">
                <div class="subscribeHome-txt">
                    <span class="subscribeHome-title">Standard</span>
                    <span class="subscribeHome-description2">Accès à une plus large sélection de films et d'émissions, y compris la plupart des nouveautés et du contenu exclusif</span>
                    <span class="subscribeHome-price2">10,99 &euro;<span class="subscribeHome-price-text">/mois</span></span>
                </div>
                <div class="subscribeHome-btn">
                    <button class="tryYourself" id="standard">
                        Essai Gratuit
                    </button>
                </div>
            </div>
            <div class="subscribeHome-card">
                <div class="subscribeHome-txt">
                    <span class="subscribeHome-title">Premium</span>
                    <span class="subscribeHome-description2">Accès à la plus large sélection de films et d'émissions, y compris toutes les nouveautés et le visionnage hors ligne</span>
                    <span class="subscribeHome-price2">14,99 &euro;<span class="subscribeHome-price-text">/mois</span></span>

                </div>
                <div class="subscribeHome-btn">
                    <button class="tryYourself" id="premium">
                        Essai Gratuit
                    </button>
                </div>
            </div>
        </div>

        <div class="board-text">
            <div class="subscribeHome-text">
                <h3 class="subscribe_title">Comparez nos offres de choisissez celle qui vous convient !</h3>
                <span class="h3-text">ProVision offre deux offres differentes : Standart et Premium. Comparez les caractéristiques de chacun et choisissez celui qui vous convient.</span>
            </div>
        </div>
        <?php
        $plans = [
            'Standard' =>[
                'Prix' => '12,99€/mois',
                'Contenu' => "Accès à une plus large sélection de films et d'émissions, y compris la plupart des nouveautés et du contenu exclusif",
                'Appareils' => "Regardez sur deux appareils en simultané ",
                'Essai gratuit' => '7 Jours',
                'Annulation à tout moment' => 'Oui',
                'HDR' => 'Non',
                'Streaming hors-ligne' => 'None'
            ],
            'Premium' =>[
                'Prix' => '14,99€/mois',
                'Contenu' => "Accès à la plus large sélection de films et d'émissions, y compris toutes les nouveautés et le visionnage hors ligne",
                'Appareils' => "Regardez sur quatres appareils en simultané",
                'Essai gratuit' => '7 Jours',
                'Annulation à tout moment' => 'Oui',
                'HDR' => 'Oui',
                'Streaming hors-ligne' => 'Oui'
            ]
];
        ?>



        <div class="board">
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Caractéristiques</th>
                        <th>Standard <span class="populaire">Populaire</span></th>
                        <th>Premium</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (array_keys($plans['Standard']) as $feature) : ?>
                        <tr>
                            <td><?= $feature ?></td>
                            <td><?= $plans['Standard'][$feature] ?></td>
                            <td><?= $plans['Premium'][$feature] ?></td>
                        </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>


<?php include '../includes/footer.php'; ?>
<script src="https://kit.fontawesome.com/386dcd1ba2.js" crossorigin="anonymous"></script>


<script>
    document.querySelector('.nav-toggle').addEventListener('click', () => {
        document.querySelector('.header-list').classList.toggle('active');
    });
</script>
</body>


</html>
