<?php
require_once __DIR__ . '/../includes/meta_config.php';
require_once __DIR__ . '/../includes/head.php';

$current_page = basename($_SERVER['PHP_SELF']);

$subscriptionPlans = [
    'standard' => [
        'title' => 'Standard',
        'description' => "Accès à une plus large sélection de films et d'émissions, y compris la plupart des nouveautés et du contenu exclusif",
        'features' => [
            'Full HD',
            '1 Écran',
            'Avec Pub',
            'Catalogue limité'
        ],
        'price' => [
            'monthly' => 10.99,
            'yearly' => 110
        ]
    ],
    'premium' => [
        'title' => 'Premium',
        'description' => "Accès à la plus large sélection de films et d'émissions, y compris toutes les nouveautés et le visionnage hors ligne",
        'features' => [
            '4K HDR',
            '4 Écrans',
            'Sans Pub',
            'Catalogue complet'
        ],
        'price' => [
            'monthly' => 14.99,
            'yearly' => 170
        ]
    ]
];

$plans_comparison = [
    'Prix' => ['12,99€/Mois', '14,99€/Mois'],
    'Qualité vidéo' => ['Full HD (1080p)', '4K HDR'],
    'Appareils simultanés' => ['2 écrans', '4 écrans'],
    'Téléchargements' => ['Non', 'Illimités'],
    'Publicités' => ['Quelques-unes', 'Aucune'],
    'Catalogue' => ['Standard', 'Complet'],
    'Avant-premières' => ['Non', 'Oui'],
    'Audio spatial' => ['Non', 'Oui'],
    'Essai gratuit' => ['7 jours', '7 jours'],
    'Annulation' => ['À tout moment', 'À tout moment']
];
?>

<!doctype html>
<html lang="fr">
<?php generateHead($current_page); ?>

<body>
<?php include_once __DIR__ . '/../includes/nav.php'; ?>

<main>
    <section class="subscribeHome sectionsMain">
        <div class="subscribeHome-text sectionsMain_txt">
            <h3>Choisissez le forfait qui vous convient</h3>
            <span>Des forfaits adaptés à tous les besoins. Rejoignez ProVision pour un divertissement illimité.</span>
        </div>

        <div class="subscribeHome-container">
            <?php foreach($subscriptionPlans as $planId => $plan): ?>
                <div class="subscribeHome-card">
                    <div class="subscribeHome-header">
                        <span class="subscribeHome-title"><?= $plan['title']?></span>
                    </div>
                    <div class="subscribeHome-description">
                        <p><?= $plan['description']?></p>
                    </div>
                    <div class="subscribeHome-features">
                        <ul>
                            <?php foreach($plan['features'] as $feature): ?>
                                <li><i class="fas fa-check"></i> <?= $feature?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="subscribeHome-pricing">
                        <span class="subscribeHome-price"><?= number_format($plan['price']['monthly'], 2)?> €/mois</span>
                        <span class="subscribeHome-price-yearly">ou <?= $plan['price']['yearly']?> €/an</span>
                    </div>
                    <div class="subscribeHome-btn">
                        <button class="tryYourself" id="<?= $planId?>">Essai Gratuit</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="comparison sectionsMain">
        <div class="subscribeHome-text sectionsMain_txt">
            <h3>Comparez nos offres en détail</h3>
            <span>Découvrez toutes les caractéristiques de nos abonnements</span>
        </div>

        <div class="comparison-container">
            <table class="comparison-table">
                <thead>
                <tr>
                    <th>Caractéristiques</th>
                    <th>Standard <span class="populaire">Populaire</span></th>
                    <th>Premium</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($plans_comparison as $feature => $values): ?>
                    <tr>
                        <td><?= $feature ?></td>
                        <td><?= $values[0] ?></td>
                        <td><?= $values[1] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>