# EasyEvents Group — WordPress Theme

Thème WordPress professionnel pour EasyEvents Group, répliquant fidèlement le site React original. Architecture modulaire, Carbon Fields pour le contenu structuré, design responsive mobile-first.

## Prérequis

- **WordPress** 6.0+
- **PHP** 8.0+
- **Carbon Fields** (installé via Composer)

## Installation

1. Copier le dossier `easyevents-theme` dans `wp-content/themes/`
2. Installer Carbon Fields :

```bash
cd wp-content/themes/easyevents-theme
composer require htmlburger/carbon-fields
```

3. Activer le thème depuis **Apparence → Thèmes**
4. À l'activation, le thème crée automatiquement :
   - La page **Accueil** (définie comme page d'accueil statique)
   - La page **Services** (parent)
   - Les 5 pages enfants : EasyFlair, EasyFlash, EasyChallenge, EasyRelax, EasyToilets

## Architecture

```
easyevents-theme/
├── style.css               # En-tête du thème
├── functions.php            # Chargement des modules
├── header.php               # Navbar glassmorphism
├── footer.php               # Footer gradient sombre
├── front-page.php           # Template homepage
├── page-service.php         # Template pages services
├── page.php                 # Page générique
├── single.php               # Article unique
├── archive.php              # Archives / blog
├── 404.php                  # Page 404
├── index.php                # Fallback
├── inc/
│   ├── setup.php            # after_setup_theme
│   ├── enqueue.php          # Styles & scripts
│   ├── helpers.php          # Services, icônes SVG, utilitaires
│   ├── carbon-fields.php    # Champs Carbon Fields
│   └── activation.php       # Création auto des pages
├── assets/
│   ├── css/
│   │   ├── main.css         # Stylesheet principal
│   │   └── services.css     # Overrides par service
│   ├── js/
│   │   └── main.js          # Animations & interactions
│   └── images/              # Médias statiques
└── template-parts/
    └── sections/
        ├── hero.php
        ├── services.php
        ├── why-us.php
        ├── showcase.php
        ├── testimonials.php
        ├── social.php
        ├── blog.php
        ├── contact.php
        ├── target.php
        └── process-cta.php
```

## Palettes de couleurs

| Service       | Couleur   | Hex       |
|---------------|-----------|-----------|
| EasyFlair     | Or        | `#b8963e` |
| EasyFlash     | Violet    | `#7c5cfc` |
| EasyChallenge | Orange    | `#e87c1a` |
| EasyRelax     | Vert      | `#5a7f50` |
| EasyToilets   | Rouge     | `#f04158` |

## Configuration

### Options du thème

Accessible via **Admin → EasyEvents Options** :

- **Général** : Téléphones, email, adresse, réseaux sociaux
- **Horaires** : Titre et détails de disponibilité

### Contenu de la page d'accueil

Éditer la page « Accueil » pour accéder aux champs Carbon Fields :

- **Hero Section** : Image, badge, titre, mot mis en valeur, sous-titre, CTA
- **Réalisations** : Événements avec titre, service, catégorie, image
- **Témoignages** : Avis clients avec nom, rôle, entreprise, note, texte

### Pages services

Chaque page service utilise le template `page-service.php`. Le contenu rédigé dans l'éditeur WordPress s'affiche dans la section « Produits ». La couleur et les textes du hero sont automatiquement adaptés au slug de la page.

## Images

Ajouter des images mises en avant aux pages services pour qu'elles s'affichent dans :
- Le hero de la page service
- Les cartes du bento grid services (homepage)
- Les cartes cross-sell

## Fonts

- **Plus Jakarta Sans** (headings) — 400, 500, 600, 700, 800
- **Inter** (body) — 400, 500, 600, 700

Chargées via Google Fonts CDN.

## Licence

Tous droits réservés © EasyEvents Group
