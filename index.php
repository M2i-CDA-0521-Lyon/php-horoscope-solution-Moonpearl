<?php
if (isset($_GET['sign'])) {
    $sign = intval($_GET['sign']);
} else {
    $sign = null;
}
?>

<?php $links = [
    'https://fr.wikipedia.org/wiki/Astrologie' => 'L\'astrologie sur Wikipedia',
    'https://www.amazon.fr/Bible-lAstrologie-Judy-Hall/dp/281320238X/ref=sr_1_1?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=bible+astrologie&qid=1599851245&sr=8-1' => 'La bible de l\'astrologie sur Amazon',
    'http://astroo.com/' => 'Astroo, le site pour calculer votre propre thème astral'
] ?>

<?php $horoscopes = [
    [
        'name' => 'Bélier',
        'icon' => 'images/zodiac/012-aries.svg',
        'description' => 'Votre code sera truffé d\'erreurs cette semaine. Mais vous gardez confiance: l\'ordinateur va finir par céder.',
        'startDate' => '21 mars',
        'endDate' => '19 avr.'
    ],
    [
        'name' => 'Taureau',
        'icon' => 'images/zodiac/011-taurus.svg',
        'description' => 'Vous ne croyez pas en l\'astrologie de toute façon, donc si vous lisez ça, c\'est que vous n\'êtes pas Taureau, mais plutôt Balance.',
        'startDate' => '20 avr.',
        'endDate' => '20 mai'
    ],
    [
        'name' => 'Gémeaux',
        'icon' => 'images/zodiac/010-gemini.svg',
        'description' => 'Arrêtez de maudire vos collaborateurs qui cassent votre code à chaque fois, et rappelez-vous que vous êtes seul à travailler sur ce projet.',
        'startDate' => '21 mai',
        'endDate' => '20 juin'
    ],
] ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2i horoscope</title>

    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
    <div id="container">
        <header>
            <div class="center-container">
                <h1>
                    M2i horoscope
                    <hr class="separator" />
                </h1>
                <p id="subtitle">
                    Apprentis développeurs, cet horoscope est fait pour vous! Vous codez, vous codez, mais on n'est jamais à l'abri des surprises, bonnes ou mauvaises, que nous réserve le destin&hellip; Alors, ne vous laissez pas prendre au dépourvu! Entre deux <em>pull requests</em>, prenez le temps de lire ces prévisions réalisés par notre spécialiste! 
                </p>
            </div>
        </header>

        <main>
            <form>
                <label for="sign">Signe astrologique</label>
                <select name="sign">
                    <?php foreach ($horoscopes as $index => $horoscope): ?>
                    <option value="<?= $index ?>" <?php if ($sign === $index) { echo 'selected'; } ?>><?= $horoscope['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Valider</button>
            </form>

            <section id="horoscope">
                <h2>Horoscope du jour</h2>
                <ol id="sign-grid">

                    <?php foreach ($horoscopes as $index => $horoscope): ?>
                    <li class="sign <?php if ($index === $sign) { echo 'user-sign'; } ?>">
                        <img class="sign-icon" src="<?= $horoscope['icon'] ?>" alt="Icône <?= $horoscope['name'] ?>" />
                        <h3 class="sign-name"><?= $horoscope['name'] ?></h3>
                        <div class="sign-date"><?= $horoscope['startDate'] ?> - <?= $horoscope['endDate'] ?></div>
                        <p class="sign-description">
                            <?= $horoscope['description'] ?>
                        </p>
                    </li>
                    <?php endforeach; ?>

                </ol>
            </section>

            <section id="resources">
                <h2>Ressources</h2>
                <ul>

                    <?php foreach ($links as $url => $name): ?>
                    <li>
                        <a target="_blank" href="<?= $url ?>">
                            <?= $name ?>
                        </a>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </section>
        </main>

        <footer>
            <div id="copyright" class="center-container">
                Copyright &copy; DWWM 09/2020
            </div>
        </footer>
    </div>
</body>
</html>
