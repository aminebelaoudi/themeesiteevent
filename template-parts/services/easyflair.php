
<?php
/**
 * EasyFlair — Full service page (100% React fidelity)
 * Most complex: 4 main tabs (Prestations, Cocktails Truck, Ateliers & Masters, Animations)
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) exit;

$C = array(
  'dark'   => '#2b2518',
  'darker' => '#1f1b12',
  'mid'    => '#3d3524',
  'gold'   => '#b8963e',
  'goldL'  => '#d4b45c',
  'olive'  => '#7a7248',
  'cream'  => '#f8f5ef',
  'beige'  => '#ede8dc',
);

$keywords = array('Mixologie','Cocktails','Barmen','Soirées','Événements','Sur mesure','Animations','Genève');

$testimonials = array(
  array( 'text' => "Service impeccable, des cocktails délicieux et un barman jongleur qui a émerveillé tous nos invités. Un vrai succès !", 'author' => 'Mariage', 'company' => 'Sophie & Marc' ),
  array( 'text' => "EasyFlair a transformé notre séminaire. Le Cocktails Truck était la star de la soirée, tout le monde en parle encore !", 'author' => 'Événement corporate', 'company' => 'Alexandra D.' ),
  array( 'text' => "Des barmen professionnels, réactifs et à l'écoute. Les cocktails étaient magnifiques et excellents. Merci !", 'author' => 'Anniversaire privé', 'company' => 'Thomas R.' ),
);
$testimonials = ee_get_testimonials( $post_id, $testimonials );

/* ---------- Pick & Drinks ---------- */
$pickDrinks = array(
  'name'     => 'Formule « Pick & Drinks »',
  'subtitle' => 'Un moment de joie et de célébration',
  'banner'   => get_theme_file_uri( 'assets/images/Formule-barman-02.jpg' ),
  'images'   => array(
    'https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-vin-honneur-self-service-2.jpg',
    'https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-vin-honneur-self-service-3.jpg',
    'https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-vin-honneur-self-service-4.jpg',
    'https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-vin-honneur-self-service-5.jpg',
    'https://www.easyflair.ch/wp-content/uploads/2020/06/animation-mariage-self-service-1-1.jpg',
    'https://www.easyflair.ch/wp-content/uploads/2020/06/animation-mariage-self-service-2-1.jpg',
  ),
  'desc'     => array(
    "Apportez une note rafraîchissante et personnalisée à votre événement, quel qu'il soit.",
    "Que ce soit pour un mariage, un anniversaire, un baptême ou une réception d'entreprise, proposez à vos invités une sélection de boissons qui sortent de l'ordinaire : eaux aromatisées aux fruits frais, mocktails colorés et gourmands, ou cocktails soigneusement élaborés selon vos envies.",
    "Nos boissons sont disponibles en livraison ou en retrait au dépôt, pour s'adapter à votre organisation.",
    "Et pour marquer l'occasion avec style, chaque récipient peut être entièrement personnalisé : vos initiales, la date de l'événement, un logo ou un message symbolique… Un petit détail qui enchantera vos invités et laissera une empreinte mémorable !"
  ),
  'formulaDetails' => array('Récipient avec robinet 4 litres','Eaux aromatisées 49.-','Limonade aromatisées 55.-','Cocktails sans alcool 79.-','Cocktails avec alcool 99.-'),
  'formulaInfo' => "4 litres d'eaux ou de limonade correspondent à :\n40 consommations\n4 litres de cocktails correspondent à :\n30 drinks\n\nD'autres formules sont disponibles...",
);

/* ---------- Barman Service ---------- */
$barmanService = array(
  'name'     => 'Formule Barman à votre service',
  'subtitle' => 'Cocktails & Élégance pour Vos Réceptions',
  'desc'     => array(
    "Offrez à vos invités une véritable expérience de bar, élégante et sur-mesure.",
    "Un barman professionnel sera à votre service pour sublimer votre événement avec une sélection de boissons raffinées, avec ou sans alcool. Cocktails classiques ou créations originales, ils seront préparés sous vos yeux et servis dans des verres adaptés, pour une dégustation aussi belle que savoureuse.",
    "La station de bar peut être installée sur place pour créer une ambiance conviviale et chic, digne des plus belles réceptions.",
    "Et pour répondre à tous les besoins, il est possible d'élargir l'équipe avec un ou plusieurs barmen supplémentaires ainsi qu'une hôtesse dédiée à l'accueil ou au service. Une prestation clé en main, pensée pour faire de votre événement un moment inoubliable."
  ),
  'formulas' => array(
    array( 'name' => 'Formule 2h illimitée', 'details' => array('Barmans professionnels','Consommations limitées ou illimitées','Déplacement','Prix : A partir de 19.-/pers'), 'images' => array('https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-vin-honneur-avec-barman-1.jpg','https://www.easyflair.ch/wp-content/uploads/2023/04/Formule-barman-02.jpg','https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-vin-honneur-avec-barman-2.jpg','https://www.easyflair.ch/wp-content/uploads/2023/04/Formule-barman-01.jpg') ),
    array( 'name' => 'Formule 4h illimitée', 'details' => array('Barmans professionnels','Consommations limitées ou illimitées','Déplacement','Prix : A partir de 23.-/pers'), 'images' => array('https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-vin-honneur-avec-barman-3.jpg','https://www.easyflair.ch/wp-content/uploads/2023/04/Formule-barman-03.jpg','https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-vin-honneur-avec-barman-4.jpg',get_theme_file_uri('assets/images/Cocktails.jpg')) ),
  ),
);

/* ---------- Barman Jongleur ---------- */
$barmanJongleur = array(
  'name'     => 'Formule Barman Jongleur',
  'subtitle' => "L'Expérience Cocktail Spectaculaire",
  'desc'     => array(
    "Mettez le feu à votre événement avec une animation cocktail spectaculaire !",
    "Notre équipe de Bar Tenders professionnels ne se contente pas de servir des boissons : elle vous offre un véritable show visuel et sensoriel.",
    "Cracheurs de feu, flair bartending et cocktails d'exception se mêlent dans une mise en scène dynamique, rythmée par la musique et l'énergie du moment. Chaque cocktail devient une performance, chaque verre un spectacle.",
    "Effet garanti : vos invités seront émerveillés autant par la qualité des boissons que par l'ambiance enflammée de la soirée.",
    "Et pour répondre aux grandes affluences, l'équipe peut être renforcée avec des barmen supplémentaires et des hôtesses pour un service fluide et impeccable.",
  ),
  'formulas' => array(
    array( 'name' => 'Formule 2h illimitée', 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/formule-2h.jpg' ),
    array( 'name' => 'Formule 4h illimitée', 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/formule-4h.jpg' ),
  ),
);

/* ---------- Truck ---------- */
$truckBanner = get_theme_file_uri( 'assets/images/la-roulotte-2.jpg' );
$truckFeatures = array(
  "Un design unique : avec son look chaleureux en bois et ses finitions élégantes dans les tons beige et naturels, la roulotte s'intègre parfaitement dans tous types d'univers, du champ en pleine nature au domaine chic et raffiné.",
  "Un point central pour vos invités : qu'il s'agisse d'un bar à cocktails, d'un bar à vins ou d'une animation sur-mesure, la roulotte attire naturellement les regards et devient le lieu de rassemblement et d'échange par excellence.",
  "Un service clé en main : que vous optiez pour la location seule ou pour l'une de nos formules avec service, nous nous adaptons à vos besoins pour créer une ambiance à votre image.",
  "Polyvalente et mobile : facilement transportable, la roulotte s'installe aussi bien en extérieur qu'en intérieur spacieux. Elle s'adapte à tous vos événements : mariages, anniversaires, événements d'entreprise, festivals, garden-parties, etc.",
);

/* ---------- Ateliers ---------- */
$ateliersCocktails = array(
  'title' => 'Ateliers & Masters Cocktails',
  'items' => array(
    array( 'name' => 'Atelier Cocktails', 'subtitle' => "Une immersion dans l'univers du cocktail", 'formula' => 'Formule « Atelier »', 'duration' => 'Durée : 1 heure / 1h30', 'minPersons' => 'Minimum de 6 personnes', 'price' => '59.-CHF HT', 'priceSuffix' => 'par personne', 'desc' => "Grâce à notre Barman Mixologue, vos amis apprendront l'art du cocktail pour devenir des pros du shaker, avant de passer à l'étape dégustation. Cette formule convient pour déployer un barman par groupe.", 'image' => 'https://www.easyflair.ch/wp-content/uploads/2020/06/easyflair-entreprise-atelier-cocktails-1.jpg', 'includes' => array("Présentation de l'animation",'Cocktails de bienvenue','Quizz','Technique de verse','Découpe de fruits frais','Création de cocktails','Dégustation de mini-cocktails','Photos souvenirs') ),
    array( 'name' => 'Master Cocktails', 'subtitle' => "Maîtriser l'Art Subtil du Cocktail", 'formula' => 'Formule « Master Cocktails »', 'duration' => 'Durée : 1h30 / 2h', 'minPersons' => 'Minimum de 25 personnes', 'price' => '49.-CHF HT', 'priceSuffix' => 'par personne', 'desc' => "Avec notre spécialiste de la mixologie, vos invités vont adorer créer des recettes de cocktails. Dégustation, jeux, blind tests, toutes les conditions sont réunies pour passer un moment inoubliable.", 'image' => 'https://www.easyflair.ch/wp-content/uploads/2020/06/easyflair-entreprise-master-cocktails-1.jpg', 'includes' => array('Présentation de la mission Master Cocktails','Création des cocktails par les convives','Élection du meilleur cocktail de chaque équipe','Finale entre les gagnants de chaque équipe','Élection du meilleur cocktail de la soirée par le jury','Dégustation de mini-cocktails','Photos souvenirs','Récompense pour l\'équipe gagnante') ),
  ),
);

$ateliersCafe = array(
  'title' => 'Ateliers & Masters Café - Barista',
  'items' => array(
    array( 'name' => 'Atelier Café', 'subtitle' => "Une immersion dans l'univers du café filtre", 'formula' => 'Formule « Atelier Café »', 'duration' => 'Durée : 1h / 1h30', 'minPersons' => 'Minimum de 6 personnes', 'price' => '59.-CHF', 'priceSuffix' => '/personne', 'desc' => "Nous sommes ravis de vous présenter notre toute nouvelle activité : l'Atelier Café - Barista, un atelier innovant où la créativité et l'esprit d'équipe sont à l'honneur ! Relevez le défi : avec vos coéquipiers, vous aurez pour mission de créer votre propre café.", 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/Atelier-Cafe.jpg', 'includes' => array('Quizz ludique de culture générale sur le café','Redécouvrez le café filtre','Dégustation et partage d\'expériences','Café de bienvenue','Découverte du café filtre','Création d\'un café','Dégustation de café','Photos souvenirs') ),
    array( 'name' => 'Master Café', 'subtitle' => "Maîtriser l'Art Subtil du Café Filtre", 'formula' => 'Formule « Master Café »', 'duration' => 'Durée : 1h30 / 2h', 'minPersons' => 'Minimum de 25 personnes', 'price' => '49.-CHF', 'priceSuffix' => '/personne', 'desc' => "Plongez dans l'univers captivant du Master Café - Barista, un atelier innovant où la créativité et l'esprit d'équipe sont à l'honneur. L'atelier est conçu pour favoriser la collaboration, développer la communication et renforcer la cohésion d'équipe.", 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/Master-Cafe.jpg', 'includes' => array('Présentation de la mission Master Café','Création des cafés par les convives','Élection du meilleur café de chaque équipe','Finale entre les gagnants','Élection du meilleur café par le jury','Dégustation','Photos souvenirs','Récompense pour l\'équipe gagnante') ),
  ),
);

$restaurants = array(
  array( 'name' => 'Amore Amore Genève', 'desc' => "Trattoria festive, célèbre la dolce vita avec cuisine italienne authentique, ambiance joyeuse et soirées animées.\nFormule repas assis", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2023/04/Amore01.jpg','https://www.easyflair.ch/wp-content/uploads/2023/04/Amore2.jpg') ),
  array( 'name' => 'Les Sales Gosses Genève', 'desc' => "Cuisine Maison & de Saison, Influence Italienne…\nCe lieu est pour vous!\nFormule repas assis", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2020/04/atelier-cocktails-evjf-2-1.jpg','https://www.easyflair.ch/wp-content/uploads/2020/04/atelier-cocktails-evjf-2-atelier.jpg') ),
  array( 'name' => 'Breitling Restaurant Genève', 'desc' => "Une carte repas tendance et un décor élégant!\nUn lieu original\nFormule repas assis", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2023/04/breitling-kitchen-01.jpg','https://www.easyflair.ch/wp-content/uploads/2023/04/breitling-kitchen-05.jpg') ),
  array( 'name' => 'La Fumisterie Carouge', 'desc' => "Cuisine italienne authentique, pizzas savoureuses et vins choisis, dans une ambiance chaleureuse et conviviale.\nFormule repas assis", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2023/04/Fumisterie1.jpg','https://www.easyflair.ch/wp-content/uploads/2023/04/Fumisterie2.jpg') ),
  array( 'name' => 'Le Floris Anières', 'desc' => "Distingué par le label Fait Maison. Le Floris est redevenu une référence de la bistronomie.\nFormule repas assis", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2023/04/Le-Floris-03.jpg','https://www.easyflair.ch/wp-content/uploads/2023/04/Le-Floris-01-1.jpg') ),
  array( 'name' => 'Prochainement', 'desc' => "De nouveaux partenaires arrivent bientôt : restaurants fun, concepts originaux et lieux agréables pour vivre des expériences inoubliables en équipe.", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2020/04/atelier-cocktails-evjf-1-plat1.jpg') ),
);

/* ---------- Animations ---------- */
$animStationBar = array(
  'title' => 'Personnalisez votre bar à cocktails',
  'images' => array(
    'https://www.easyflair.ch/wp-content/uploads/2023/04/bar-a-cocktails-1.jpg',
    'https://www.easyflair.ch/wp-content/uploads/2023/04/bar-a-cocktails-2.jpg',
    'https://www.easyflair.ch/wp-content/uploads/2023/04/bar-a-cocktails-3.jpg',
  ),
  'paragraphs' => array(
    "Que ce soit pour une soirée privée, une soirée Halloween, le Nouvel an ou encore une soirée Gatsby, l'installation d'un bar est indispensable !",
    "Particulièrement si vous organisez une soirée dansante. Vos invités viennent se détendre et partager un verre avec vous et bien sûr la qualité des boissons sera le reflet de la magie opérant lors de votre soirée.",
    "Une station de bar avec un barman professionnel servant des cocktails explosifs peut largement vous permettre d'offrir une distraction à vos amis. Un barman jongleur, magicien, cracheur de feu, offrant un show exceptionnel sur un rythme endiablé, donnera des étoiles dans les yeux à tous vos invités.",
  ),
  'pricing' => array(
    array( 'label' => 'Non Personnalisé (Noir ou Bois)', 'price' => '220.-CHF / bar' ),
    array( 'label' => 'Personnalisé (Voir photos)', 'price' => '350.-CHF / bar' ),
  ),
);

$animItems = array(
  array( 'name' => 'Personnalisez votre soirée Cocktail avec le Mouss\'Art Concept', 'image' => 'https://www.easyflair.ch/wp-content/uploads/2020/06/bar-concept-impression-cocktails-1.jpg', 'paragraphs' => array("Et si vous pouviez déposer délicatement votre marque sur les boissons servies lors de votre soirée de clôture ? Café, cocktails, smoothies, faites apparaître votre Personal Branding dans le verre de vos invités ! Effet impactant et engagé garanti ! Grâce à une imprimante 3D, les boissons servies seront marquées de votre logo.","De délicieux mélanges de fruits, de sucres, avec ou sans alcools, offriront un effet gourmand en alliant plaisir des yeux et des papilles. Vos barmen professionnels et mixologues certifiés jongleront avec les saveurs et le design pour un effet magique."), 'price' => null, 'extLink' => array('label' => "Découvrez le procédé du Mouss'Art Concept", 'url' => 'https://www.bar-concept.ch/moussart/') ),
  array( 'name' => 'Le Mur Végétal', 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/mur-vegetal-1024x682.jpg', 'paragraphs' => array("Offrez à vos invités une expérience d'accueil originale et inoubliable avec notre Mur Végétal. Ce mur orné de plantes artificielles luxuriantes apporte une touche de fraîcheur et de raffinement à vos événements en extérieur comme en intérieur.","Parfait pour un vin d'honneur, un cocktail de bienvenue ou un moment de célébration, ce mur accueille de délicates coupes de champagne soigneusement disposées parmi le feuillage.","Mais ce n'est pas tout : au centre du mur trône une cloche intrigante. Lorsque l'un de vos invités la fait retentir, une main gantée de blanc surgit malicieusement du mur pour lui tendre, en toute discrétion et avec élégance, une coupe servie à la main. Un instant de magie, de rires et de surprise garanti.","Une animation chic et décalée qui attire tous les regards et crée une atmosphère aussi festive qu'inattendue."), 'price' => null, 'extLink' => null ),
  array( 'name' => 'Animation autour du cocktail', 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/animation-autour-du-cocktail-1.jpg', 'paragraphs' => array("Parce qu'un cocktail mérite d'être aussi beau que bon, nous proposons une sélection d'animations visuelles et ludiques pour sublimer vos moments de partage.","Faites sensation avec des cocktails qui fument, grâce à l'utilisation de glace carbonique, pour un effet visuel saisissant dès le service. Ajoutez une touche de magie avec notre pistolet à fumée/bulles, qui dépose délicatement une bulle remplie de fumée parfumée sur le verre. Elle éclate au moment de la dégustation, libérant un léger nuage et éveillant tous les sens.","Ces animations s'intègrent parfaitement à vos cocktails de bienvenue, vins d'honneur, soirées privées ou événements professionnels, et créent des instants aussi surprenants qu'élégants.","À la fois spectaculaires et raffinées, elles transforment votre réception en véritable expérience immersive, dont vos invités se souviendront longtemps."), 'price' => '120.00', 'detailLabel' => 'Pistolet à bulle/fumée ou Cocktail qui fume — A partir de 120.- HT', 'extLink' => null ),
  array( 'name' => 'Le Welcome Drink', 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/animation-autour-du-cocktail-5.jpg', 'paragraphs' => array("Surprenez vos invités dès leur arrivée avec notre Welcome Drink servi dans de délicates éprouvettes en verre. Une manière originale et raffinée de souhaiter la bienvenue et de donner immédiatement le ton de votre événement.","Présentée comme une mise en bouche liquide, cette petite attention peut être proposée avec ou sans alcool, et s'accorde parfaitement à l'univers de votre réception : frais, fruité, floral, acidulé… Nous créons des recettes sur-mesure, à votre image.","Disposé sur un présentoir ou remis à la main à l'entrée, ce format élégant et ludique ne manque pas de faire son effet.","Un petit geste, un grand souvenir."), 'price' => '90.00', 'extLink' => null ),
);

$animationPartners = array(
  array( 'name' => 'Le Domaine de Collex', 'desc' => "Dans un cadre verdoyant et champêtre, pensé et adapté à l'organisation de votre mariage. A 10 minutes de Genève, ce domaine d'exception vous est proposé uniquement en location exclusive vous permettant de bénéficier d'un service personnalisé pour l'une des journées le plus importante de votre vie. Alliant authenticité et rusticité, nos espaces disposent d'une infrastructure moderne pour réaliser les différents moments de votre mariage.", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-partenaire-domaine-de-collex-1.jpg','https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-partenaire-domaine-de-collex-2.jpg','https://www.easyflair.ch/wp-content/uploads/2020/06/barman-mariage-partenaire-domaine-de-collex-3.jpg'), 'link' => 'https://www.domainedecollex.ch' ),
  array( 'name' => 'White Label Studio', 'desc' => "Spécialisée dans l'organisation, la décoration de mariages uniques et sur-mesure, WHITE LABEL STUDIO est une agence de Wedding Planning & Design différente, créative et novatrice dont la vocation et passion sont de mettre son expertise au service de votre imagination, pour vous aider à transformer votre rêve en réalisation concrète.", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2020/06/mariage-wedding-planner-1.jpg','https://www.easyflair.ch/wp-content/uploads/2020/06/mariage-wedding-planner-2.jpg'), 'link' => 'https://www.whitelabel-events.com' ),
  array( 'name' => 'DJ Event', 'desc' => "Vous recherchez un DJ pour le plus beau jour de votre vie ? DJ seul ou accompagné d'un saxophoniste ou un live, forfait sono et light, nous sommes à votre écoute, selon vos envies et votre budget. Nous travaillons entre passionnés de musique, toujours prêts à vous faire partager notre passion, la musique c'est notre vie et c'est un peu de cette vie que nous vous offrons pour votre mariage !", 'images' => array('https://www.easyflair.ch/wp-content/uploads/2020/06/dj-mariage.jpg'), 'link' => 'https://www.dj-mariages.ch' ),
);

$barPartners = array(
  array( 'name' => 'EasyFlash', 'desc' => "EasyFlash, c'est la touche fun, moderne et inoubliable de vos événements festifs, pros, culturels ou privés !", 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/Partenaire-Easyflash.jpg', 'link' => 'https://www.easyflash.ch/' ),
  array( 'name' => 'EasyChallenge', 'desc' => "EasyChallenge, c'est l'allié fun et fédérateur de vos séminaires ! Basée à Genève.", 'image' => 'https://www.easyflair.ch/wp-content/uploads/2023/04/Partenaire-Easychallenge.jpg', 'link' => 'https://www.easychallenge.ch/' ),
);

$faqItems = array(
  array( 'q' => "Quelles sont les prestations d'EasyFlair ?", 'a' => "EasyFlair regroupe plusieurs expertises : bar mobile avec barmen professionnels, Cocktails Truck « La Roulotte », ateliers cocktails & café-barista, et animations événementielles (Mouss'Art Concept, Mur Végétal, Welcome Drink). Tout peut être combiné selon votre événement." ),
  array( 'q' => "Pour quel type d'événement pouvez-vous intervenir ?", 'a' => "Mariage, soirée d'entreprise, séminaire, anniversaire, festival, garden-party… EasyFlair s'adapte à tous types d'événements, en intérieur comme en extérieur, pour des groupes de toutes tailles." ),
  array( 'q' => "Peut-on combiner plusieurs prestations pour un même événement ?", 'a' => "Absolument. Il est possible de composer un package sur mesure en associant par exemple un bar mobile, un atelier cocktails et une animation. Nous conseillons la combinaison la plus adaptée à votre budget et à votre programme." ),
  array( 'q' => "Quel est le délai minimum pour une réservation ?", 'a' => "Nous recommandons de nous contacter au moins 2 à 3 semaines avant votre événement. Pour les dates très demandées (week-ends, fêtes), plus tôt est préférable." ),
  array( 'q' => 'Dans quelle zone intervenez-vous ?', 'a' => "Nous intervenons à Genève et en Suisse francophone." ),
  array( 'q' => 'Comment obtenir un devis ?', 'a' => "Remplissez notre formulaire de demande en ligne : vous recevez instantanément votre devis. Vous pouvez aussi nous appeler directement si vous souhaitez un accompagnement personnalisé." ),
);

$faqItems     = ee_get_faq( $post_id, $faqItems );

$icons_map = array( 'easyflair' => 'wine', 'easyflash' => 'camera', 'easychallenge' => 'trophy', 'easyrelax' => 'coffee', 'easytoilets' => 'droplets' );

/* ── Carbon Fields overrides ──────────────────── */
if ( function_exists( 'carbon_get_post_meta' ) ) {
	/* Pick & Drinks */
	$_v = carbon_get_post_meta( $post_id, 'efr_pd_name' );
	if ( $_v ) $pickDrinks['name'] = $_v;
	$_v = carbon_get_post_meta( $post_id, 'efr_pd_subtitle' );
	if ( $_v ) $pickDrinks['subtitle'] = $_v;
	$_v = carbon_get_post_meta( $post_id, 'efr_pd_banner' );
	if ( $_v ) $pickDrinks['banner'] = ee_cf_image( $_v, $pickDrinks['banner'] );
	$_v = carbon_get_post_meta( $post_id, 'efr_pd_desc' );
	if ( $_v ) $pickDrinks['desc'] = ee_lines_to_array( $_v );
	$_v = carbon_get_post_meta( $post_id, 'efr_pd_formula_details' );
	if ( $_v ) $pickDrinks['formulaDetails'] = ee_lines_to_array( $_v );
	$_v = carbon_get_post_meta( $post_id, 'efr_pd_formula_info' );
	if ( $_v ) $pickDrinks['formulaInfo'] = $_v;
	$_cf = carbon_get_post_meta( $post_id, 'efr_pd_images' );
	if ( ! empty( $_cf ) ) { $pickDrinks['images'] = array(); foreach ( $_cf as $_r ) { $u = ee_cf_image( $_r['pd_image'] ?? 0 ); if ( $u ) $pickDrinks['images'][] = $u; } }

	/* Barman Service */
	$_v = carbon_get_post_meta( $post_id, 'efr_bs_name' );
	if ( $_v ) $barmanService['name'] = $_v;
	$_v = carbon_get_post_meta( $post_id, 'efr_bs_subtitle' );
	if ( $_v ) $barmanService['subtitle'] = $_v;
	$_v = carbon_get_post_meta( $post_id, 'efr_bs_desc' );
	if ( $_v ) $barmanService['desc'] = ee_lines_to_array( $_v );
	$_cf = carbon_get_post_meta( $post_id, 'efr_bs_formulas' );
	if ( ! empty( $_cf ) ) {
		$barmanService['formulas'] = array();
		foreach ( $_cf as $_r ) {
			$imgs = array();
			for ( $i = 1; $i <= 4; $i++ ) { $u = ee_cf_image( $_r['formula_image_' . $i] ?? 0 ); if ( $u ) $imgs[] = $u; }
			$barmanService['formulas'][] = array( 'name' => $_r['formula_name'] ?? '', 'details' => ee_lines_to_array( $_r['formula_details'] ?? '' ), 'images' => $imgs );
		}
	}

	/* Barman Jongleur */
	$_v = carbon_get_post_meta( $post_id, 'efr_bj_name' );
	if ( $_v ) $barmanJongleur['name'] = $_v;
	$_v = carbon_get_post_meta( $post_id, 'efr_bj_subtitle' );
	if ( $_v ) $barmanJongleur['subtitle'] = $_v;
	$_v = carbon_get_post_meta( $post_id, 'efr_bj_desc' );
	if ( $_v ) $barmanJongleur['desc'] = ee_lines_to_array( $_v );
	$_cf = carbon_get_post_meta( $post_id, 'efr_bj_formulas' );
	if ( ! empty( $_cf ) ) {
		$barmanJongleur['formulas'] = array();
		foreach ( $_cf as $_r ) {
			$barmanJongleur['formulas'][] = array( 'name' => $_r['formula_name'] ?? '', 'image' => ee_cf_image( $_r['formula_image'] ?? 0 ) );
		}
	}

	/* Truck */
	$_v = carbon_get_post_meta( $post_id, 'efr_truck_banner' );
	if ( $_v ) $truckBanner = ee_cf_image( $_v, $truckBanner );
	$_v = carbon_get_post_meta( $post_id, 'efr_truck_features' );
	if ( $_v ) $truckFeatures = ee_lines_to_array( $_v );

	/* Ateliers Cocktails */
	$_v = carbon_get_post_meta( $post_id, 'efr_ac_title' );
	if ( $_v ) $ateliersCocktails['title'] = $_v;
	$_cf = carbon_get_post_meta( $post_id, 'efr_ac_items' );
	if ( ! empty( $_cf ) ) {
		$ateliersCocktails['items'] = array();
		foreach ( $_cf as $_r ) {
			$ateliersCocktails['items'][] = array( 'name' => $_r['item_name'] ?? '', 'subtitle' => $_r['item_subtitle'] ?? '', 'formula' => $_r['item_formula'] ?? '', 'duration' => $_r['item_duration'] ?? '', 'minPersons' => $_r['item_min_persons'] ?? '', 'price' => $_r['item_price'] ?? '', 'priceSuffix' => $_r['item_price_suffix'] ?? '', 'desc' => $_r['item_desc'] ?? '', 'image' => ee_cf_image( $_r['item_image'] ?? 0 ), 'includes' => ee_lines_to_array( $_r['item_includes'] ?? '' ) );
		}
	}

	/* Ateliers Café */
	$_v = carbon_get_post_meta( $post_id, 'efr_acf_title' );
	if ( $_v ) $ateliersCafe['title'] = $_v;
	$_cf = carbon_get_post_meta( $post_id, 'efr_acf_items' );
	if ( ! empty( $_cf ) ) {
		$ateliersCafe['items'] = array();
		foreach ( $_cf as $_r ) {
			$ateliersCafe['items'][] = array( 'name' => $_r['item_name'] ?? '', 'subtitle' => $_r['item_subtitle'] ?? '', 'formula' => $_r['item_formula'] ?? '', 'duration' => $_r['item_duration'] ?? '', 'minPersons' => $_r['item_min_persons'] ?? '', 'price' => $_r['item_price'] ?? '', 'priceSuffix' => $_r['item_price_suffix'] ?? '', 'desc' => $_r['item_desc'] ?? '', 'image' => ee_cf_image( $_r['item_image'] ?? 0 ), 'includes' => ee_lines_to_array( $_r['item_includes'] ?? '' ) );
		}
	}

	/* Restaurants */
	$_cf = carbon_get_post_meta( $post_id, 'efr_restaurants' );
	if ( ! empty( $_cf ) ) {
		$restaurants = array();
		foreach ( $_cf as $_r ) {
			$imgs = array();
			$u1 = ee_cf_image( $_r['restaurant_image_1'] ?? 0 ); if ( $u1 ) $imgs[] = $u1;
			$u2 = ee_cf_image( $_r['restaurant_image_2'] ?? 0 ); if ( $u2 ) $imgs[] = $u2;
			$restaurants[] = array( 'name' => $_r['restaurant_name'] ?? '', 'desc' => $_r['restaurant_desc'] ?? '', 'images' => $imgs );
		}
	}

	/* Station Bar */
	$_v = carbon_get_post_meta( $post_id, 'efr_sb_title' );
	if ( $_v ) $animStationBar['title'] = $_v;
	$_v = carbon_get_post_meta( $post_id, 'efr_sb_desc' );
	if ( $_v ) $animStationBar['paragraphs'] = ee_lines_to_array( $_v );
	for ( $i = 1; $i <= 3; $i++ ) { $_v = carbon_get_post_meta( $post_id, 'efr_sb_image_' . $i ); if ( $_v ) $animStationBar['images'][ $i - 1 ] = ee_cf_image( $_v, $animStationBar['images'][ $i - 1 ] ?? '' ); }
	$_cf = carbon_get_post_meta( $post_id, 'efr_sb_pricing' );
	if ( ! empty( $_cf ) ) { $animStationBar['pricing'] = array(); foreach ( $_cf as $_r ) { $animStationBar['pricing'][] = array( 'label' => $_r['pricing_label'] ?? '', 'price' => $_r['pricing_price'] ?? '' ); } }

	/* Animation Items */
	$_cf = carbon_get_post_meta( $post_id, 'efr_anim_items' );
	if ( ! empty( $_cf ) ) {
		$animItems = array();
		foreach ( $_cf as $_r ) {
			$ext = null;
			if ( ! empty( $_r['anim_ext_label'] ) && ! empty( $_r['anim_ext_url'] ) ) { $ext = array( 'label' => $_r['anim_ext_label'], 'url' => $_r['anim_ext_url'] ); }
			$animItems[] = array( 'name' => $_r['anim_name'] ?? '', 'image' => ee_cf_image( $_r['anim_image'] ?? 0 ), 'paragraphs' => ee_lines_to_array( $_r['anim_desc'] ?? '' ), 'price' => $_r['anim_price'] ?: null, 'detailLabel' => $_r['anim_detail_label'] ?? '', 'extLink' => $ext );
		}
	}

	/* Partners */
	$_cf = carbon_get_post_meta( $post_id, 'efr_anim_partners' );
	if ( ! empty( $_cf ) ) {
		$animationPartners = array();
		foreach ( $_cf as $_r ) {
			$imgs = array();
			for ( $i = 1; $i <= 3; $i++ ) { $u = ee_cf_image( $_r['partner_image_' . $i] ?? 0 ); if ( $u ) $imgs[] = $u; }
			$animationPartners[] = array( 'name' => $_r['partner_name'] ?? '', 'desc' => $_r['partner_desc'] ?? '', 'images' => $imgs, 'link' => $_r['partner_link'] ?? '' );
		}
	}

	$_cf = carbon_get_post_meta( $post_id, 'efr_bar_partners' );
	if ( ! empty( $_cf ) ) {
		$barPartners = array();
		foreach ( $_cf as $_r ) {
			$barPartners[] = array( 'name' => $_r['partner_name'] ?? '', 'desc' => $_r['partner_desc'] ?? '', 'image' => ee_cf_image( $_r['partner_image'] ?? 0 ), 'link' => $_r['partner_link'] ?? '' );
		}
	}

	$_kw = carbon_get_post_meta( $post_id, 'efr_keywords' );
	if ( ! empty( $_kw ) ) { $keywords = array_map( 'trim', explode( ',', $_kw ) ); }
}
?>

<?php if ( ee_show_section( $post_id, 'hero' ) ) : ?>
<!-- ━━━━ HERO ━━━━ -->
<section class="service-hero service-hero--parallax" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
  <div class="service-hero__bg">
    <img src="<?php echo esc_url( $thumb_url ? $thumb_url : get_theme_file_uri( 'assets/images/Formule-barman-02.jpg' ) ); ?>" alt="EasyFlair — Bars & Mixologie" class="service-hero__img" loading="eager">
    <div class="service-hero__overlay-1" style="background:linear-gradient(150deg,<?php echo esc_attr( $C['dark'] ); ?>ee 0%,<?php echo esc_attr( $C['dark'] ); ?>c8 48%,<?php echo esc_attr( $C['gold'] ); ?>28 100%)"></div><div class="service-hero__overlay-2" style="background:radial-gradient(ellipse at 75% 25%,<?php echo esc_attr( $C['gold'] ); ?>1a 0%,transparent 60%)"></div><div class="service-hero__overlay-3" style="background:radial-gradient(ellipse at 20% 80%,<?php echo esc_attr( $C['goldL'] ); ?>0c 0%,transparent 50%)"></div><div class="service-hero__overlay-bottom" style="background:linear-gradient(to top,<?php echo esc_attr( $C['dark'] ); ?>aa 0%,transparent 55%)"></div>
  </div>
  <div class="container service-hero__content">
    <nav class="service-hero__breadcrumb" aria-label="Fil d'Ariane"><a href="<?php echo esc_url( home_url('/') ); ?>">Accueil</a><span>›</span><span>Services</span><span>›</span><span class="current">EasyFlair</span></nav>
    <div class="service-hero__pill" style="border-color:<?php echo esc_attr( $C['gold'] ); ?>35"><?php echo easyevents_icon( 'wine', 13 ); ?><span><?php echo esc_html( ee_get( $post_id, 'hero_badge', 'EasyFlair · Bars & Mixologie' ) ); ?></span></div>
    <div style="max-width:42rem">
      <?php $custom_title = ee_get( $post_id, 'hero_title', '' ); ?>
      <?php if ( $custom_title ) : ?>
        <h1 class="hero__title"><?php echo esc_html( $custom_title ); ?></h1>
      <?php else : ?>
        <h1 class="hero__title">Une prestation sur mesure grâce à une équipe de <span style="color:<?php echo esc_attr( $C['goldL'] ); ?>">Barmen Professionnels</span></h1>
      <?php endif; ?>
      <p class="hero__desc"><?php echo esc_html( ee_get( $post_id, 'hero_subtitle', 'À Genève et en Suisse francophone, EasyFlair vous accompagne dans tous vos événements.' ) ); ?></p>
      <div class="hero__actions">
        <a href="https://www.easyflair.ch/fr/demande-de-devis/?utm_source=EasyEvents" class="btn btn-hero" style="background:<?php echo esc_attr( $C['gold'] ); ?>"><?php echo esc_html( ee_get( $post_id, 'hero_cta_1', 'Demander un devis' ) ); ?></a>
        <a href="#prestations" class="btn btn-hero-outline"><?php echo esc_html( ee_get( $post_id, 'hero_cta_2', 'Voir les prestations' ) ); ?> <?php echo easyevents_icon( 'arrow-right', 16 ); ?></a>
      </div>
    </div>
    <div class="stats-grid">
      <?php
      $default_stats = array(
        array( 'value' => '2009', 'label' => 'Fondé à Genève' ),
        array( 'value' => '3000+', 'label' => 'Événements réalisés' ),
        array( 'value' => '4', 'label' => 'Prestations principales' ),
        array( 'value' => '24h', 'label' => 'Réponse garantie' ),
      );
      foreach ( ee_get_stats( $post_id, $default_stats ) as $s ) : ?>
        <div class="stat-card"><p class="stat-card__value" style="color:<?php echo esc_attr( $C['goldL'] ); ?>"><?php echo esc_html( $s['value'] ); ?></p><p class="stat-card__label"><?php echo esc_html( $s['label'] ); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'marquee' ) ) : ?>
<!-- ━━━━ MARQUEE ━━━━ -->
<div class="marquee" style="background:<?php echo esc_attr( $C['beige'] ); ?>;border-color:<?php echo esc_attr( $C['olive'] ); ?>18">
  <div class="marquee__track">
    <?php foreach ( array_merge( $keywords, $keywords, $keywords, $keywords ) as $w ) : ?>
      <span class="marquee__word"><?php echo esc_html( $w ); ?><span class="marquee__dot" style="width:6px;height:6px;border-radius:50%;display:inline-block;background:<?php echo esc_attr( $C['gold'] ); ?>"></span></span>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'intro' ) ) : ?>
<!-- ━━━━ INTRO TEXT ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>;padding-bottom:2rem">
  <div class="container" style="max-width:48rem;text-align:center">
    <p class="animate-on-scroll" style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.9375rem;line-height:1.8;margin-bottom:1.5rem">Parce que chaque évènement est unique et que les parties boissons et animations sont la clé du divertissement, il est essentiel de bien choisir la formule qui vous convient.</p>
    <p class="animate-on-scroll" style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-size:.9375rem;line-height:1.8"><strong>À Genève et en Suisse francophone, EasyFlair</strong> vous accompagne dans tous vos événements. Avec plus de dix-sept ans d'expérience dans l'événementiel privé et professionnel, notre équipe de barmen mixologues vous proposera différentes formules. Du mariage à l'anniversaire en passant par les salons ou congrès professionnels, vous serez enchantés des animations proposées autour du cocktail.</p>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'tabs' ) ) : ?>
<!-- ━━━━ TABS SECTION ━━━━ -->
<section id="prestations" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>;padding-top:2rem;position:relative;overflow:hidden">
  <div class="decorative-blob" style="background:radial-gradient(circle,<?php echo esc_attr( $C['gold'] ); ?>08,transparent 70%)"></div>
  <div class="container">
    <!-- Tab header -->
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['gold'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['gold'] ); ?>"></span>Nos prestations</span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Choisissez votre <span class="italic" style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-weight:400">expérience</span></h2>
      <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;max-width:32rem;margin:0 auto">Quatre univers pour sublimer vos événements — des bars mobiles aux animations sur mesure.</p>
    </div>

    <!-- Tab buttons -->
    <div class="main-tabs animate-on-scroll" data-tabs="easyflair-main">
      <button class="main-tab main-tab--active" data-tab="prestations-panel" data-panel="prestations-panel" style="--tab-color:<?php echo esc_attr( $C['gold'] ); ?>"><?php echo easyevents_icon('wine',14); ?> Prestations</button>
      <button class="main-tab" data-tab="truck-panel" data-panel="truck-panel" style="--tab-color:<?php echo esc_attr( $C['gold'] ); ?>"><?php echo easyevents_icon('truck',14); ?> Cocktails Truck</button>
      <button class="main-tab" data-tab="ateliers-panel" data-panel="ateliers-panel" style="--tab-color:<?php echo esc_attr( $C['gold'] ); ?>"><?php echo easyevents_icon('book-open',14); ?> Ateliers & Masters</button>
      <button class="main-tab" data-tab="animations-panel" data-panel="animations-panel" style="--tab-color:<?php echo esc_attr( $C['gold'] ); ?>"><?php echo easyevents_icon('party-popper',14); ?> Animations</button>
    </div>

    <!-- ═══ TAB 1: PRESTATIONS ═══ -->
    <div id="prestations-panel" class="main-panel main-panel--active">
      <!-- 1A. Pick & Drinks -->
      <div class="presta-card presta-card--hero animate-on-scroll" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
        <div class="presta-card__banner"><img src="<?php echo esc_url( $pickDrinks['banner'] ); ?>" alt="Pick &amp; Drinks"><div class="presta-card__banner-overlay"></div><div class="presta-card__banner-content"><span class="presta-card__badge"><?php echo easyevents_icon('droplets',12); ?> Formule Self-Service</span><h3><?php echo esc_html( $pickDrinks['name'] ); ?></h3><p><?php echo esc_html( $pickDrinks['subtitle'] ); ?></p></div></div>
        <div class="two-col-layout" style="padding:2rem">
          <div class="presta-card__images">
            <?php foreach ( $pickDrinks['images'] as $i => $pdImg ) : ?><div class="presta-card__img-thumb"><img src="<?php echo esc_url( $pdImg ); ?>" alt="Pick &amp; Drinks <?php echo $i+1; ?>" loading="lazy"></div><?php endforeach; ?>
          </div>
          <div style="display:flex;flex-direction:column">
            <?php foreach ( $pickDrinks['desc'] as $p ) : ?>
              <p style="color:<?php echo esc_attr( $C['cream'] ); ?>aa;margin-bottom:1rem"><?php echo esc_html( $p ); ?></p>
            <?php endforeach; ?>
            <div class="accordion-block">
              <button class="accordion-trigger" style="color:<?php echo esc_attr( $C['goldL'] ); ?>"><span>Détails & Tarifs</span><span class="faq-chevron"><?php echo easyevents_icon('chevron-right',14); ?></span></button>
              <div class="accordion-content">
                <div style="color:<?php echo esc_attr( $C['cream'] ); ?>99">
                  <?php foreach ( $pickDrinks['formulaDetails'] as $d ) : ?>
                    <p style="display:flex;align-items:center;gap:.5rem;margin-bottom:.375rem"><span style="width:6px;height:6px;border-radius:50%;flex-shrink:0;background:<?php echo esc_attr( $C['gold'] ); ?>"></span><?php echo esc_html( $d ); ?></p>
                  <?php endforeach; ?>
                </div>
                <p style="color:<?php echo esc_attr( $C['cream'] ); ?>77;white-space:pre-line;font-size:.875rem;margin-top:1rem"><?php echo esc_html( $pickDrinks['formulaInfo'] ); ?></p>
              </div>
            </div>
            <a href="https://www.easyflair.ch/fr/demande-de-devis-barman/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $C['gold'] ); ?>;margin-top:1.25rem;align-self:flex-start"><?php echo esc_html( $pickDrinks['ctaLabel'] ?? 'Estimer le montant de ma prestation' ); ?> <?php echo easyevents_icon('arrow-right',14); ?></a>
          </div>
        </div>
      </div>

      <!-- 1B. Barman à votre service -->
      <div class="presta-card presta-card--premium animate-on-scroll" style="background:linear-gradient(135deg,<?php echo esc_attr( $C['cream'] ); ?>,<?php echo esc_attr( $C['beige'] ); ?>);border:1px solid <?php echo esc_attr( $C['gold'] ); ?>20">
        <div style="text-align:center;padding:2.5rem 2rem 0">
          <span class="presta-card__badge presta-card__badge--gold" style="background:<?php echo esc_attr( $C['gold'] ); ?>15;color:<?php echo esc_attr( $C['gold'] ); ?>"><?php echo easyevents_icon('star',12); ?> Premium</span>
          <h3 style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-size:1.5rem;margin:.75rem 0 .25rem"><?php echo esc_html( $barmanService['name'] ); ?></h3>
          <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-style:italic"><?php echo esc_html( $barmanService['subtitle'] ); ?></p>
          <div style="width:5rem;height:2px;background:linear-gradient(90deg,transparent,<?php echo esc_attr( $C['gold'] ); ?>,transparent);margin:1.5rem auto"></div>
        </div>
        <div style="max-width:48rem;margin:0 auto;padding:0 2rem">
          <?php foreach ( $barmanService['desc'] as $p ) : ?>
            <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;margin-bottom:1rem;text-align:center"><?php echo esc_html( $p ); ?></p>
          <?php endforeach; ?>
        </div>
        <div class="two-col-layout" style="padding:2rem;gap:1.5rem">
          <?php foreach ( $barmanService['formulas'] as $fi => $f ) : ?>
            <div class="formula-card" style="background:<?php echo $fi === 0 ? esc_attr( $C['dark'] ) : 'linear-gradient(160deg,' . esc_attr( $C['mid'] ) . ' 0%,' . esc_attr( $C['darker'] ) . ' 100%)'; ?>;border-radius:1.5rem;padding:2rem">
              <h4 style="color:#fff;margin-bottom:.5rem"><?php echo esc_html( $f['name'] ); ?></h4>
              <span class="formula-card__price-badge" style="background:<?php echo esc_attr( $C['gold'] ); ?>22;color:<?php echo esc_attr( $C['goldL'] ); ?>"><?php echo esc_html( end( $f['details'] ) ); ?></span>
              <?php if ( ! empty( $f['images'] ) ) : ?>
                <div class="formula-card__images">
                  <?php foreach ( $f['images'] as $fImg ) : ?><div><img src="<?php echo esc_url( $fImg ); ?>" alt="<?php echo esc_attr( $f['name'] ); ?>" loading="lazy"></div><?php endforeach; ?>
                </div>
              <?php endif; ?>
              <div class="accordion-block">
                <button class="accordion-trigger" style="color:<?php echo esc_attr( $C['goldL'] ); ?>"><span>Ce qui est inclus</span><span class="faq-chevron"><?php echo easyevents_icon('chevron-right',14); ?></span></button>
                <div class="accordion-content">
                  <ul style="color:<?php echo esc_attr( $C['cream'] ); ?>99">
                    <?php foreach ( array_slice( $f['details'], 0, -1 ) as $d ) : ?>
                      <li><?php echo easyevents_icon('check-circle',12); ?> <?php echo esc_html( $d ); ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              <a href="https://www.easyflair.ch/fr/demande-de-devis-barman/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $C['gold'] ); ?>;margin-top:1rem;width:100%">Estimer le montant de ma prestation <?php echo easyevents_icon('arrow-right',14); ?></a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- 1C. Barman Jongleur -->
      <div class="presta-card presta-card--dramatic animate-on-scroll" style="background:linear-gradient(135deg,#1a0a02,<?php echo esc_attr( $C['darker'] ); ?>,#1a0808)">
        <div class="presta-card__glow" style="background:radial-gradient(circle,#ef8a3e12,transparent 60%)"></div>
        <div style="text-align:center;padding:2.5rem 2rem 0;position:relative;z-index:1">
          <span class="presta-card__badge" style="background:#ef8a3e18;color:#ef8a3e"><?php echo easyevents_icon('sparkles',12); ?> Show & Spectacle</span>
          <h3 style="color:#fff;font-size:1.5rem;margin:.75rem 0 .25rem"><?php echo esc_html( $barmanJongleur['name'] ); ?></h3>
          <p style="color:#ef8a3e;font-style:italic"><?php echo esc_html( $barmanJongleur['subtitle'] ); ?></p>
          <div style="width:5rem;height:2px;margin:1.25rem auto 0;border-radius:999px;background:linear-gradient(90deg,transparent,#ef8a3e,transparent)"></div>
        </div>
        <div style="max-width:48rem;margin:0 auto;padding:1.5rem 2rem;position:relative;z-index:1">
          <?php foreach ( $barmanJongleur['desc'] as $p ) : ?>
            <p style="color:<?php echo esc_attr( $C['cream'] ); ?>aa;margin-bottom:1rem;text-align:center"><?php echo esc_html( $p ); ?></p>
          <?php endforeach; ?>
        </div>
        <div class="two-col-layout" style="padding:0 2rem 2rem;gap:1.5rem;position:relative;z-index:1">
          <?php $jongleurColors = array( $C['gold'], '#ef8a3e' ); foreach ( $barmanJongleur['formulas'] as $fi => $f ) : ?>
            <div class="formula-card formula-card--glass" style="border-radius:1.5rem;padding:0;overflow:hidden">
              <?php if ( ! empty( $f['image'] ) ) : ?><div class="formula-card__hero-img"><img src="<?php echo esc_url( $f['image'] ); ?>" alt="<?php echo esc_attr( $f['name'] ); ?>"><div class="formula-card__img-overlay"></div></div><?php endif; ?>
              <div style="padding:1.5rem;text-align:center">
                <h4 style="color:#fff"><?php echo esc_html( $f['name'] ); ?></h4>
                <a href="https://www.easyflair.ch/fr/demande-de-devis-barman/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $jongleurColors[ $fi ] ); ?>;margin-top:1rem;width:100%">Estimer le montant de ma prestation <?php echo easyevents_icon('arrow-right',14); ?></a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- 1D. Pioneer + Moët text -->
      <div class="presta-callout animate-on-scroll" style="background:linear-gradient(135deg,<?php echo esc_attr( $C['dark'] ); ?>,<?php echo esc_attr( $C['darker'] ); ?>);text-align:center;padding:3rem 2rem;border-radius:1.5rem;margin-top:2rem">
        <p style="color:<?php echo esc_attr( $C['cream'] ); ?>bb;max-width:36rem;margin:0 auto 1.5rem">Depuis 2009, Easyflair est reconnu comme un pionnier dans le domaine du bar à domicile et de l'animation cocktail. Habitué à servir une clientèle prestigieuse et Internationale, vous pourrez compter sur notre savoir-faire et notre discrétion lors de vos événements.</p>
        <p style="color:<?php echo esc_attr( $C['goldL'] ); ?>;font-weight:600"><?php echo easyevents_icon('star',12); ?> Partenaire du Groupe Moët & Hennessy <?php echo easyevents_icon('star',12); ?></p>
      </div>

      <!-- 1E. Trust logos -->
      <div class="trust-logos animate-on-scroll" style="margin-top:2rem">
        <h4 style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:center;font-size:1.125rem;font-weight:800;margin-bottom:1.5rem">Ils nous font confiance</h4>
        <div class="trust-logos__row">
          <?php foreach ( array(
            'https://www.easyflair.ch/wp-content/uploads/2018/02/easyflair-Barman-Jongleur-Domicile-Geneve-121.png',
            'https://www.easyflair.ch/wp-content/uploads/2018/02/easyflair-Barman-Jongleur-Domicile-Geneve-120.png',
            get_theme_file_uri( 'assets/images/W&W logo.png' ),
            'https://www.easyflair.ch/wp-content/uploads/2018/02/easyflair-Barman-Jongleur-Domicile-Geneve-43.png',
          ) as $logo ) : ?>
            <img src="<?php echo esc_url( $logo ); ?>" alt="Client" class="trust-logos__img" loading="lazy">
          <?php endforeach; ?>
        </div>
      </div>

      <!-- 1F. Bar Partners -->
      <div class="partners-section animate-on-scroll" style="margin-top:3rem">
        <h4 style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:center;margin-bottom:.5rem">Nos Partenaires</h4>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;text-align:center;font-size:.875rem;margin-bottom:2rem">Découvrez nos partenaires privilégiés pour un évènement réussi !</p>
        <div class="partners-grid partners-grid--3" <?php if ( count( $barPartners ) < 2 ) echo 'style="justify-content:center"'; ?>>
          <?php foreach ( $barPartners as $bp ) : ?>
            <div class="partner-card" style="background:#fff;border-radius:1rem;padding:1.5rem;text-align:center">
              <?php if ( ! empty( $bp['image'] ) ) : ?><div class="partner-card__img"><img src="<?php echo esc_url( $bp['image'] ); ?>" alt="<?php echo esc_attr( $bp['name'] ); ?>" loading="lazy"></div><?php endif; ?>
              <h5 style="color:<?php echo esc_attr( $C['dark'] ); ?>;margin-bottom:.25rem"><?php echo esc_html( $bp['name'] ); ?></h5>
              <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.8125rem"><?php echo esc_html( $bp['desc'] ); ?></p>
              <?php if ( ! empty( $bp['link'] ) ) : ?>
                <a href="<?php echo esc_url( $bp['link'] ); ?>" target="_blank" rel="noopener noreferrer" style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-size:.75rem;font-weight:600;margin-top:.5rem;display:inline-flex;align-items:center;gap:.25rem"><?php echo esc_html( str_replace( 'https://', '', $bp['link'] ) ); ?></a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- 1G. Final CTA -->
      <div style="text-align:center;margin-top:2.5rem" class="animate-on-scroll">
        <a href="https://www.easyflair.ch/fr/demande-de-devis-barman/?utm_source=EasyEvents" class="btn btn-service btn-service--lg" style="background:<?php echo esc_attr( $C['gold'] ); ?>">Demander mon devis <?php echo easyevents_icon('arrow-right',14); ?></a>
      </div>
    </div>

    <!-- ═══ TAB 2: COCKTAILS TRUCK ═══ -->
    <div id="truck-panel" class="main-panel">
      <!-- 2A. Hero banner -->
      <div class="presta-card presta-card--hero animate-on-scroll" style="border-radius:1.5rem;overflow:hidden">
        <div class="presta-card__banner presta-card__banner--tall"><img src="<?php echo esc_url( $truckBanner ); ?>" alt="Cocktails Truck la Roulotte"><div class="presta-card__banner-overlay"></div><div class="presta-card__banner-content"><span class="presta-card__badge"><?php echo easyevents_icon('truck',12); ?> Bar Mobile</span><h3>Cocktails Truck « la Roulotte »</h3><p>L'alliée idéale pour vos événements extérieurs</p></div></div>
      </div>

      <!-- 2B. Desc + Price card -->
      <div class="two-col-layout two-col-layout--price animate-on-scroll" style="margin-top:2rem">
        <div>
          <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;margin-bottom:1rem">Pour vos événements en plein air, nous vous proposons notre nouvelle Roulotte « Cocktails Truck », un espace unique au design élégant alliant le charme du bois et la douceur du beige.</p>
          <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;margin-bottom:1rem">Conçue pour offrir à vos invités une expérience inoubliable, ce Food Truck aménagé en version Cocktails est l'option parfaite pour créer une atmosphère chaleureuse et conviviale.</p>
          <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88">Disponible à la location seule ou accompagnée de nos différentes formules de bar, Cocktails Truck « la Roulotte » s'adapte à tous types d'événements : mariages, anniversaires, soirées entre amis ou séminaires d'entreprise.</p>
        </div>
        <div class="price-card" style="background:linear-gradient(160deg,<?php echo esc_attr( $C['dark'] ); ?> 0%,<?php echo esc_attr( $C['darker'] ); ?> 100%);border:1px solid <?php echo esc_attr( $C['gold'] ); ?>25;border-radius:1rem">
          <p style="color:<?php echo esc_attr( $C['cream'] ); ?>77;font-size:.75rem;text-transform:uppercase;letter-spacing:.15em;margin-bottom:.5rem">À partir de</p>
          <p style="color:#fff;font-size:3rem;font-weight:800;line-height:1">390.-</p>
          <p style="color:<?php echo esc_attr( $C['goldL'] ); ?>;font-size:.75rem;text-transform:uppercase;letter-spacing:.1em;margin-top:.5rem">CHF HT</p>
          <div style="width:3rem;height:1px;background:<?php echo esc_attr( $C['gold'] ); ?>40;margin:1.25rem auto"></div>
          <a href="https://www.easyflair.ch/fr/demande-de-devis-barman/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $C['gold'] ); ?>;margin-top:1rem;width:100%">Demande de devis <?php echo easyevents_icon('arrow-right',14); ?></a>
        </div>
      </div>

      <!-- 2C. Why choose -->
      <div class="presta-card animate-on-scroll" style="background:<?php echo esc_attr( $C['dark'] ); ?>;border-radius:1.5rem;padding:2.5rem;margin-top:2rem">
        <h4 style="color:#fff;margin-bottom:1rem">Pourquoi choisir Cocktails Truck « la Roulotte » ?</h4>
        <p style="color:<?php echo esc_attr( $C['cream'] ); ?>88;margin-bottom:1.5rem">Notre Cocktails Truck « la Roulotte » n'est pas qu'un simple bar mobile : c'est une véritable expérience itinérante, pensée pour sublimer vos événements avec style et convivialité.</p>
        <ul class="checklist">
          <?php foreach ( $truckFeatures as $tf ) : ?>
            <li style="color:<?php echo esc_attr( $C['cream'] ); ?>cc"><span style="color:<?php echo esc_attr( $C['goldL'] ); ?>;flex-shrink:0;margin-top:4px;display:inline-flex"><?php echo easyevents_icon('check-circle',14); ?></span><span><?php echo esc_html( $tf ); ?></span></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- ═══ TAB 3: ATELIERS & MASTERS ═══ -->
    <div id="ateliers-panel" class="main-panel">
      <!-- Sub-tabs -->
      <div class="sub-tabs animate-on-scroll" data-tabs="easyflair-sub">
        <button class="sub-tab sub-tab--active" data-subtab="cocktails-sub" data-panel="cocktails-sub" style="--tab-color:<?php echo esc_attr( $C['dark'] ); ?>"><?php echo easyevents_icon('wine',14); ?> Cocktails</button>
        <button class="sub-tab" data-subtab="cafe-sub" data-panel="cafe-sub" style="--tab-color:<?php echo esc_attr( $C['dark'] ); ?>"><?php echo easyevents_icon('coffee',14); ?> Café - Barista</button>
      </div>

      <!-- Cocktails sub-panel -->
      <div id="cocktails-sub" class="sub-panel sub-panel--active">
        <h3 class="animate-on-scroll" style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:center;margin-bottom:2rem"><?php echo esc_html( $ateliersCocktails['title'] ); ?></h3>
        <div class="two-col-layout" style="gap:2rem">
          <?php foreach ( $ateliersCocktails['items'] as $ati => $at ) : ?>
            <div class="atelier-card animate-on-scroll" style="background:#fff;border:1px solid <?php echo esc_attr( $C['olive'] ); ?>15;border-radius:1rem;overflow:hidden;transition:all .3s">
              <div class="atelier-card__price-header" style="padding:1.5rem .5rem .5rem;text-align:center">
                <h4 style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-weight:800;text-transform:uppercase;letter-spacing:.05em;font-size:1.125rem"><?php echo esc_html( $at['name'] ); ?></h4>
                <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.75rem;margin:.25rem 0">À partir de</p>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-size:1.5rem;font-weight:800;line-height:1"><?php echo esc_html( $at['price'] ); ?></p>
                <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.75rem;margin-top:.25rem"><?php echo esc_html( $at['priceSuffix'] ); ?></p>
              </div>
              <?php if ( ! empty( $at['image'] ) ) : ?><div style="aspect-ratio:4/3;overflow:hidden;margin:0 1rem;border-radius:.75rem;margin-top:.5rem"><img src="<?php echo esc_url( $at['image'] ); ?>" alt="<?php echo esc_attr( $at['name'] ); ?>" style="width:100%;height:100%;object-fit:cover" loading="lazy"></div><?php endif; ?>
              <div style="padding:1.5rem">
                <h5 style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-weight:700;font-size:1rem;margin-bottom:.25rem"><?php echo esc_html( $at['name'] ); ?></h5>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-style:italic;font-size:.875rem;margin-bottom:.75rem"><?php echo esc_html( $at['subtitle'] ); ?></p>
                <?php if ( ! empty( $at['desc'] ) ) : ?><p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.8125rem;line-height:1.6;margin-bottom:1rem"><?php echo esc_html( $at['desc'] ); ?></p><?php endif; ?>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-weight:600;font-size:.875rem;margin-bottom:.25rem"><?php echo esc_html( $at['formula'] ); ?></p>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-size:.75rem;margin-bottom:.125rem"><?php echo esc_html( $at['duration'] ); ?></p>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-size:.75rem;margin-bottom:1rem"><?php echo esc_html( $at['minPersons'] ); ?></p>
                <ul class="includes-list">
                  <?php foreach ( $at['includes'] as $inc ) : ?>
                    <li style="color:<?php echo esc_attr( $C['dark'] ); ?>bb"><span style="color:<?php echo esc_attr( $C['gold'] ); ?>;flex-shrink:0;margin-top:2px"><?php echo easyevents_icon('check-circle',13); ?></span> <?php echo esc_html( $inc ); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="animate-on-scroll" style="text-align:center;margin-top:2rem">
          <p style="color:<?php echo esc_attr( $C['dark'] ); ?>bb;font-size:.875rem;font-weight:600;margin-bottom:1.5rem">Nous réalisons également des offres sur mesures Premium en fonction de votre budget.</p>
          <a href="https://www.easyflair.ch/fr/devis-en-ligne/devis-atelier-cocktails/?utm_source=EasyEvents" class="btn btn-service btn-service--lg" style="background:<?php echo esc_attr( $C['gold'] ); ?>">DEMANDER VOTRE DEVIS MAINTENANT ! <?php echo easyevents_icon('arrow-right',14); ?></a>
        </div>
      </div>

      <!-- Café sub-panel -->
      <div id="cafe-sub" class="sub-panel">
        <h3 class="animate-on-scroll" style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:center;margin-bottom:2rem"><?php echo esc_html( $ateliersCafe['title'] ); ?></h3>
        <div class="two-col-layout" style="gap:2rem">
          <?php foreach ( $ateliersCafe['items'] as $ati => $at ) : ?>
            <div class="atelier-card animate-on-scroll" style="background:#fff;border:1px solid <?php echo esc_attr( $C['olive'] ); ?>15;border-radius:1rem;overflow:hidden;transition:all .3s">
              <div class="atelier-card__price-header" style="padding:1.5rem .5rem .5rem;text-align:center">
                <h4 style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-weight:800;text-transform:uppercase;letter-spacing:.05em;font-size:1.125rem"><?php echo esc_html( $at['name'] ); ?></h4>
                <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.75rem;margin:.25rem 0">À partir de</p>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-size:1.5rem;font-weight:800;line-height:1"><?php echo esc_html( $at['price'] ); ?></p>
                <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.75rem;margin-top:.25rem"><?php echo esc_html( $at['priceSuffix'] ); ?></p>
              </div>
              <?php if ( ! empty( $at['image'] ) ) : ?><div style="aspect-ratio:4/3;overflow:hidden;margin:0 1rem;border-radius:.75rem;margin-top:.5rem"><img src="<?php echo esc_url( $at['image'] ); ?>" alt="<?php echo esc_attr( $at['name'] ); ?>" style="width:100%;height:100%;object-fit:cover" loading="lazy"></div><?php endif; ?>
              <div style="padding:1.5rem">
                <h5 style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-weight:700;font-size:1rem;margin-bottom:.25rem"><?php echo esc_html( $at['name'] ); ?></h5>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-style:italic;font-size:.875rem;margin-bottom:.75rem"><?php echo esc_html( $at['subtitle'] ); ?></p>
                <?php if ( ! empty( $at['desc'] ) ) : ?><p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.8125rem;line-height:1.6;margin-bottom:1rem"><?php echo esc_html( $at['desc'] ); ?></p><?php endif; ?>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-weight:600;font-size:.875rem;margin-bottom:.25rem"><?php echo esc_html( $at['formula'] ); ?></p>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-size:.75rem;margin-bottom:.125rem"><?php echo esc_html( $at['duration'] ); ?></p>
                <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-size:.75rem;margin-bottom:1rem"><?php echo esc_html( $at['minPersons'] ); ?></p>
                <ul class="includes-list">
                  <?php foreach ( $at['includes'] as $inc ) : ?>
                    <li style="color:<?php echo esc_attr( $C['dark'] ); ?>bb"><span style="color:<?php echo esc_attr( $C['gold'] ); ?>;flex-shrink:0;margin-top:2px"><?php echo easyevents_icon('check-circle',13); ?></span> <?php echo esc_html( $inc ); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="animate-on-scroll" style="text-align:center;margin-top:2rem">
          <p style="color:<?php echo esc_attr( $C['dark'] ); ?>bb;font-size:.875rem;font-weight:600;margin-bottom:1.5rem">Nous réalisons également des offres sur mesures Premium en fonction de votre budget.</p>
          <a href="https://www.easyflair.ch/fr/devis-en-ligne/devis-atelier-cocktails/?utm_source=EasyEvents" class="btn btn-service btn-service--lg" style="background:<?php echo esc_attr( $C['gold'] ); ?>">DEMANDER VOTRE DEVIS MAINTENANT ! <?php echo easyevents_icon('arrow-right',14); ?></a>
        </div>
      </div>

      <!-- Restaurant Partners -->
      <div class="partners-section animate-on-scroll" style="margin-top:3rem">
        <h4 style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:center;margin-bottom:.5rem">Découvrez Nos Restaurants Partenaires</h4>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;text-align:center;font-size:.875rem;margin-bottom:2rem">Notre réseau de restaurants partenaires à Genève vous accueille pour accompagner cette activité d'un bon repas.</p>
        <div class="partners-grid partners-grid--3">
          <?php foreach ( $restaurants as $r ) : ?>
            <div class="partner-card" style="background:#fff;border-radius:1rem;padding:1.5rem;text-align:center">
              <?php if ( ! empty( $r['images'] ) ) : ?>
                <div class="partner-card__img restaurant-slider" data-interval="5000">
                  <?php foreach ( $r['images'] as $ri => $rImg ) : ?>
                    <img src="<?php echo esc_url( $rImg ); ?>" alt="<?php echo esc_attr( $r['name'] ); ?> <?php echo $ri+1; ?>" loading="lazy" class="restaurant-slider__img<?php echo $ri === 0 ? ' restaurant-slider__img--active' : ''; ?>" style="<?php echo $ri > 0 ? 'opacity:0;position:absolute;inset:0;' : ''; ?>">
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              <h5 style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-decoration:underline;margin-bottom:.25rem"><?php echo esc_html( $r['name'] ); ?></h5>
              <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.8125rem;white-space:pre-line"><?php echo esc_html( $r['desc'] ); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- ═══ TAB 4: ANIMATIONS ═══ -->
    <div id="animations-panel" class="main-panel">
      <div class="section-header section-header--center animate-on-scroll">
        <span class="svc-label" style="color:<?php echo esc_attr( $C['gold'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['gold'] ); ?>"></span>Nos Autres Prestations<span class="svc-label__line" style="background:<?php echo esc_attr( $C['gold'] ); ?>"></span></span>
        <h3 style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-size:1.5rem">La Magic Touch de vos évènements</h3>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;max-width:32rem;margin:0 auto">Privés, libres et à thème — personnalisez chaque détail de votre soirée.</p>
      </div>

      <!-- 4A. Station de Bar -->
      <div class="presta-card animate-on-scroll" style="background:<?php echo esc_attr( $C['dark'] ); ?>;border-radius:1rem;padding:0;overflow:hidden;margin-top:2rem">
        <div style="padding:1.25rem 1.5rem;border-bottom:1px solid rgba(255,255,255,.06)">
          <h4 style="color:<?php echo esc_attr( $C['goldL'] ); ?>;font-size:1rem"><?php echo esc_html( $animStationBar['title'] ); ?></h4>
        </div>
        <div class="two-col-layout" style="padding:1.5rem;gap:1.5rem">
          <div class="station-bar__images">
            <?php foreach ( $animStationBar['images'] as $i => $sbImg ) : ?>
              <div class="station-bar__img"><img src="<?php echo esc_url( $sbImg ); ?>" alt="Station de bar <?php echo $i+1; ?>" loading="lazy"></div>
            <?php endforeach; ?>
          </div>
          <div>
            <?php foreach ( $animStationBar['paragraphs'] as $p ) : ?>
              <p style="color:<?php echo esc_attr( $C['cream'] ); ?>aa;margin-bottom:.75rem;font-size:.9375rem"><?php echo esc_html( $p ); ?></p>
            <?php endforeach; ?>
            <div class="accordion-block">
              <button class="accordion-trigger" style="color:<?php echo esc_attr( $C['goldL'] ); ?>"><span>Détails des bars...</span><span class="faq-chevron"><?php echo easyevents_icon('chevron-right',14); ?></span></button>
              <div class="accordion-content">
                <p style="font-weight:700;font-size:.75rem;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.75rem;color:<?php echo esc_attr( $C['goldL'] ); ?>">Station de Bar</p>
                <?php foreach ( $animStationBar['pricing'] as $pr ) : ?>
                  <div style="display:flex;justify-content:space-between;padding:.5rem 0;border-bottom:1px solid rgba(255,255,255,.06)">
                    <span style="color:<?php echo esc_attr( $C['cream'] ); ?>99"><?php echo esc_html( $pr['label'] ); ?></span>
                    <span style="color:<?php echo esc_attr( $C['goldL'] ); ?>;font-weight:600"><?php echo esc_html( $pr['price'] ); ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <a href="https://www.easyflair.ch/fr/demande-de-devis/?utm_source=EasyEvents" class="btn btn-service btn-service--sm" style="background:<?php echo esc_attr( $C['gold'] ); ?>;margin-top:1rem">Demande de devis <?php echo easyevents_icon('arrow-right',14); ?></a>
          </div>
        </div>
      </div>

      <!-- 4B. Animation items -->
      <?php foreach ( $animItems as $ai => $anim ) : ?>
        <div class="animation-item animate-on-scroll <?php echo $ai % 2 === 1 ? 'animation-item--reverse' : ''; ?>" style="margin-top:2rem">
          <?php if ( ! empty( $anim['image'] ) ) : ?><div class="animation-item__img"><img src="<?php echo esc_url( $anim['image'] ); ?>" alt="<?php echo esc_attr( $anim['name'] ); ?>" loading="lazy"></div><?php endif; ?>
          <div class="animation-item__text">
            <h4 style="color:<?php echo esc_attr( $C['dark'] ); ?>;font-size:1.125rem;margin-bottom:1rem"><?php echo esc_html( $anim['name'] ); ?></h4>
            <?php foreach ( $anim['paragraphs'] as $p ) : ?>
              <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;margin-bottom:.75rem;font-size:.875rem;line-height:1.6"><?php echo esc_html( $p ); ?></p>
            <?php endforeach; ?>
            <?php if ( ! empty( $anim['extLink'] ) ) : ?>
              <button type="button" class="moussart-video-btn" data-video="https://www.youtube.com/embed/us0As6UwyZc?si=uVtzuv5W-RSUBD0b&autoplay=1" style="background:<?php echo esc_attr( $C['gold'] ); ?>;color:#fff;border:none;border-radius:9999px;padding:.6rem 1.25rem;font-size:.875rem;font-weight:700;cursor:pointer;display:inline-flex;align-items:center;gap:.5rem;margin:.5rem 0 1rem;font-family:inherit;box-shadow:0 4px 18px -4px rgba(184,150,62,.45);transition:filter .2s,transform .2s" onmouseover="this.style.filter='brightness(1.12)';this.style.transform='translateY(-1px)'" onmouseout="this.style.filter='';this.style.transform=''"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg> Voir le concept en vidéo</button>
            <?php endif; ?>
            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;margin-top:.75rem">
              <a href="https://www.easyflair.ch/fr/demande-de-devis/?utm_source=EasyEvents" class="btn btn-service btn-service--sm" style="background:<?php echo esc_attr( $C['gold'] ); ?>">Demande de devis <?php echo easyevents_icon('arrow-right',14); ?></a>
              <?php if ( ! empty( $anim['price'] ) ) : ?>
                <div style="text-align:right">
                  <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.75rem;text-transform:uppercase;letter-spacing:.05em">À partir de</p>
                  <p style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-weight:800;font-size:1.5rem"><?php echo esc_html( $anim['price'] ); ?> <span style="font-size:.875rem;font-weight:600;color:<?php echo esc_attr( $C['dark'] ); ?>88">chf</span></p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- 4C. Animation Partners -->
      <div class="partners-section animate-on-scroll" style="margin-top:3rem">
        <div style="text-align:center;margin-bottom:.5rem"><span class="svc-label" style="color:<?php echo esc_attr( $C['gold'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['gold'] ); ?>"></span>Nos Autres Partenaires<span class="svc-label__line" style="background:<?php echo esc_attr( $C['gold'] ); ?>"></span></span></div>
        <h4 style="color:<?php echo esc_attr( $C['dark'] ); ?>;text-align:center;margin-bottom:.25rem">Découvrez nos partenaires privilégiés</h4>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;text-align:center;font-size:.875rem;margin-bottom:2rem">Pour un évènement réussi !</p>
        <div class="partners-grid partners-grid--3">
          <?php foreach ( $animationPartners as $ap ) : ?>
            <div class="partner-card" style="background:#fff;border-radius:1rem;padding:1.5rem;text-align:center">
              <?php if ( ! empty( $ap['images'] ) ) : ?>
                <div class="partner-card__img restaurant-slider" data-interval="5000">
                  <?php foreach ( $ap['images'] as $ai => $apImg ) : ?>
                    <img src="<?php echo esc_url( $apImg ); ?>" alt="<?php echo esc_attr( $ap['name'] ); ?> <?php echo $ai+1; ?>" loading="lazy" class="restaurant-slider__img<?php echo $ai === 0 ? ' restaurant-slider__img--active' : ''; ?>" style="<?php echo $ai > 0 ? 'opacity:0;position:absolute;inset:0;' : ''; ?>">
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
              <h5 style="color:<?php echo esc_attr( $C['dark'] ); ?>;margin-bottom:.25rem"><?php echo esc_html( $ap['name'] ); ?></h5>
              <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-size:.8125rem"><?php echo esc_html( $ap['desc'] ); ?></p>
              <?php if ( ! empty( $ap['link'] ) ) : ?>
                <a href="<?php echo esc_url( $ap['link'] ); ?>" target="_blank" rel="noopener noreferrer" style="color:<?php echo esc_attr( $C['gold'] ); ?>;font-size:.75rem;font-weight:600;margin-top:.5rem;display:inline-flex;align-items:center;gap:.25rem"><?php echo esc_html( str_replace( 'https://www.', 'www.', $ap['link'] ) ); ?> <?php echo easyevents_icon('arrow-right',12); ?></a>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'testimonials' ) ) : ?>
<!-- ━━━━ AVIS CLIENTS ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['beige'] ); ?>">
  <div class="container">
    <div class="svc-section-header animate-on-scroll">
      <span class="svc-label" style="color:<?php echo esc_attr( $C['gold'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['gold'] ); ?>"></span>Témoignages<span class="svc-label__line" style="background:<?php echo esc_attr( $C['gold'] ); ?>"></span></span>
      <h2 class="svc-title" style="color:<?php echo esc_attr( $C['dark'] ); ?>">Avis <span class="italic" style="color:<?php echo esc_attr( $C['gold'] ); ?>">clients</span></h2>
    </div>
    <div class="testimonials-grid animate-on-scroll">
      <?php foreach ( $testimonials as $t ) :
        $initials = strtoupper( substr( $t['company'], 0, 1 ) );
      ?>
        <div class="testimonial-card" style="border-color:<?php echo esc_attr( $C['olive'] ); ?>10">
          <div class="testimonial-stars"><?php for($j=0;$j<5;$j++) echo '<span style="color:' . esc_attr( $C['gold'] ) . '">' . easyevents_icon('star',12) . '</span>'; ?></div>
          <p class="testimonial-text" style="color:<?php echo esc_attr( $C['dark'] ); ?>88;font-style:italic">"<?php echo esc_html( $t['text'] ); ?>"</p>
          <div class="testimonial-author" style="border-color:<?php echo esc_attr( $C['olive'] ); ?>12">
            <div class="testimonial-avatar" style="background:<?php echo esc_attr( $C['gold'] ); ?>"><?php echo $initials; ?></div>
            <div><p class="testimonial-name" style="color:<?php echo esc_attr( $C['dark'] ); ?>"><?php echo esc_html( $t['author'] ); ?></p><p class="testimonial-role" style="color:<?php echo esc_attr( $C['olive'] ); ?>"><?php echo esc_html( $t['company'] ); ?></p></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'brand' ) ) : ?>
<!-- ━━━━ BRAND BLOCK ━━━━ -->
<section id="devis" class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="brand-block animate-on-scroll" style="background:<?php echo esc_attr( $C['dark'] ); ?>">
      <div class="brand-block__dots"></div>
      <div class="brand-block__glow" style="background:radial-gradient(ellipse at 80% 40%,<?php echo esc_attr( $C['gold'] ); ?>14,transparent 60%)"></div>
      <div class="brand-block__inner brand-block__inner--2col">
        <div class="brand-block__text">
          <span class="svc-label" style="color:<?php echo esc_attr( $C['goldL'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['goldL'] ); ?>40"></span>Bars mobiles & Mixologie</span>
          <h2 style="color:#fff">Easy<span class="italic" style="color:<?php echo esc_attr( $C['goldL'] ); ?>">Flair</span></h2>
          <p style="color:rgba(255,255,255,.5)">Depuis 2009, EasyFlair sublime vos événements avec des barmen professionnels, des cocktails d'exception et des animations sur mesure. Du mariage intime au gala d'entreprise, nous apportons l'art de la mixologie directement à votre événement.</p>
          <div class="brand-tags">
            <?php foreach ( array( 'Clé en main', 'Depuis 2009', 'Sur mesure', 'Toute la Suisse' ) as $tag ) : ?>
              <span style="color:<?php echo esc_attr( $C['goldL'] ); ?>;border-color:<?php echo esc_attr( $C['goldL'] ); ?>25;background:<?php echo esc_attr( $C['goldL'] ); ?>08"><?php echo esc_html( $tag ); ?></span>
            <?php endforeach; ?>
          </div>
          <a href="https://www.easyflair.ch/fr/demande-de-devis-barman/?utm_source=EasyEvents" class="btn btn-service" style="background:<?php echo esc_attr( $C['gold'] ); ?>">Demander votre devis <?php echo easyevents_icon( 'arrow-right', 14 ); ?></a>
        </div>
        <div class="brand-block__images brand-block__images--mosaic">
          <?php
            $brand_mosaic = array(
              get_theme_file_uri( 'assets/images/easyflair-bar.jpg' ),
              get_theme_file_uri( 'assets/images/la-roulotte-2.jpg' ),
              'https://www.easyflair.ch/wp-content/uploads/2020/06/easyflair-entreprise-atelier-cocktails-1.jpg',
            );
            $float_classes = array( 'brand-block__img-wrap--float-a', 'brand-block__img-wrap--float-b', 'brand-block__img-wrap--float-c' );
            foreach ( $brand_mosaic as $bi => $bm ) : ?>
            <div class="brand-block__img-wrap <?php echo $float_classes[ $bi ]; ?>"><img src="<?php echo esc_url( $bm ); ?>" alt="EasyFlair" loading="lazy"></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'crosssell' ) ) : ?>
<!-- ━━━━ CROSS-SELL ━━━━ -->
<section class="svc-section svc-section--dark" style="background:<?php echo esc_attr( $C['darker'] ); ?>">
  <div class="container">
    <div class="crosssell-header animate-on-scroll">
      <div><span class="svc-label" style="color:<?php echo esc_attr( $C['goldL'] ); ?>">EasyEvents Group</span><h2 style="color:#fff">Découvrez nos <span style="color:<?php echo esc_attr( $C['goldL'] ); ?>">autres expertises</span></h2></div>
    </div>
    <div class="crosssell-grid animate-on-scroll">
      <?php foreach ( $others as $other ) :
        $op = get_page_by_path('services/'.$other['slug']);
        $ot = $op && has_post_thumbnail($op) ? get_the_post_thumbnail_url($op,'medium_large') : ( isset( $img[ $other['slug'] ] ) ? $img[ $other['slug'] ] : '' );
        if ( 'easyrelax' === $other['slug'] ) {
          $ot = get_theme_file_uri( 'assets/images/easyrelax hero.png' );
        } elseif ( 'easytoilets' === $other['slug'] ) {
          $ot = get_theme_file_uri( 'assets/images/easytoilets-banner2.jpg' );
        }
        $oi = isset($icons_map[$other['slug']]) ? $icons_map[$other['slug']] : 'star';
      ?>
        <a href="<?php echo esc_url( home_url('/services/'.$other['slug'].'/') ); ?>" class="crosssell-card">
          <?php if ($ot) : ?><img src="<?php echo esc_url($ot); ?>" alt="<?php echo esc_attr($other['label']); ?>" class="crosssell-card__img" loading="lazy"><?php endif; ?>
          <div class="crosssell-card__overlay"></div>
          <div class="crosssell-card__content"><div class="crosssell-card__icon"><?php echo easyevents_icon($oi,15); ?></div><h3><?php echo esc_html($other['label']); ?></h3><p><?php echo esc_html($other['tagline']); ?></p></div>
          <div class="crosssell-card__arrow"><?php echo easyevents_icon('arrow-right',12); ?></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'faq' ) ) : ?>
<!-- ━━━━ FAQ ━━━━ -->
<section class="svc-section" style="background:<?php echo esc_attr( $C['cream'] ); ?>">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-sidebar animate-on-scroll">
        <span class="svc-label" style="color:<?php echo esc_attr( $C['olive'] ); ?>"><span class="svc-label__line" style="background:<?php echo esc_attr( $C['olive'] ); ?>60"></span>FAQ</span>
        <h2 style="color:<?php echo esc_attr( $C['dark'] ); ?>">Questions <span style="color:<?php echo esc_attr( $C['gold'] ); ?>">fréquentes</span></h2>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>88">Tout ce que vous devez savoir sur nos services de bar mobile et d'animation cocktail.</p>
        <p style="color:<?php echo esc_attr( $C['dark'] ); ?>77;font-size:.875rem">Une question spécifique ? Contactez-nous directement.</p>
        <a href="tel:<?php echo esc_attr( str_replace(' ', '', ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ) ); ?>" class="faq-phone-btn" style="background:<?php echo esc_attr( $C['dark'] ); ?>;color:<?php echo esc_attr( $C['cream'] ); ?>"><?php echo easyevents_icon('phone',14); ?> <?php echo esc_html( ee_get( $post_id, 'phone', '+41 22 519 21 66' ) ); ?></a>
      </div>
      <div class="faq-items animate-on-scroll">
        <?php foreach ( $faqItems as $item ) : ?>
          <div class="faq-item" style="border-color:<?php echo esc_attr( $C['gold'] ); ?>10;background:#fff">
            <button class="faq-trigger" style="color:<?php echo esc_attr( $C['dark'] ); ?>"><span><?php echo esc_html( $item['q'] ); ?></span><span class="faq-chevron"><?php echo easyevents_icon('chevron-right',16); ?></span></button>
            <div class="faq-content" style="color:<?php echo esc_attr( $C['dark'] ); ?>88"><p><?php echo esc_html( $item['a'] ); ?></p></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if ( ee_show_section( $post_id, 'contact' ) ) : ?>
<?php get_template_part( 'template-parts/sections/contact' ); ?>
<?php endif; ?>

<!-- ━━━━ MOUSS'ART VIDEO MODAL ━━━━ -->
<div id="moussart-modal" role="dialog" aria-modal="true" aria-label="Vidéo Mouss'Art Concept" style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,.82);backdrop-filter:blur(6px);align-items:center;justify-content:center;padding:1rem">
  <div style="position:relative;width:100%;max-width:840px;margin:0 auto">
    <button id="moussart-modal-close" aria-label="Fermer" style="position:absolute;top:-2.5rem;right:0;background:rgba(255,255,255,.12);border:none;color:#fff;width:2.25rem;height:2.25rem;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:1.25rem;transition:background .2s" onmouseover="this.style.background='rgba(255,255,255,.22)'" onmouseout="this.style.background='rgba(255,255,255,.12)'">✕</button>
    <div style="position:relative;padding-bottom:56.25%;height:0;border-radius:1rem;overflow:hidden;background:#000;box-shadow:0 24px 60px rgba(0,0,0,.6)">
      <iframe id="moussart-iframe" src="" title="Mouss'Art Concept" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="position:absolute;inset:0;width:100%;height:100%"></iframe>
    </div>
  </div>
</div>
<script>
(function(){
  var modal   = document.getElementById('moussart-modal');
  var iframe  = document.getElementById('moussart-iframe');
  var btnClose= document.getElementById('moussart-modal-close');
  if(!modal||!iframe||!btnClose) return;

  function openModal(src){
    iframe.src = src;
    modal.style.display='flex';
    document.body.style.overflow='hidden';
  }
  function closeModal(){
    modal.style.display='none';
    iframe.src='';
    document.body.style.overflow='';
  }

  document.querySelectorAll('.moussart-video-btn').forEach(function(btn){
    btn.addEventListener('click', function(){
      openModal(btn.getAttribute('data-video'));
    });
  });

  btnClose.addEventListener('click', closeModal);
  modal.addEventListener('click', function(e){ if(e.target===modal) closeModal(); });
  document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeModal(); });
})();
</script>
