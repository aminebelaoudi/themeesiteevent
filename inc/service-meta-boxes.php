<?php
/**
 * Service Page Meta Boxes — Native WordPress custom fields
 * Provides an admin-editable interface for all service page content.
 *
 * @package EasyEvents
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_enqueue_scripts', 'easyevents_service_meta_enqueue_media' );

function easyevents_service_meta_enqueue_media( $hook ) {
    if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
        return;
    }

    $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
    if ( ! $screen || 'page' !== $screen->post_type ) {
        return;
    }

    wp_enqueue_media();
}

/* ───────────────────────────────────────────────
 * 1. Register meta boxes for service pages
 * ─────────────────────────────────────────────── */
add_action( 'add_meta_boxes_page', 'easyevents_service_meta_boxes' );

function easyevents_service_meta_boxes( $post ) {
    $services = array( 'easyflair', 'easyflash', 'easychallenge', 'easyrelax', 'easytoilets' );

    // Check 1 : slug direct de la page
    if ( in_array( $post->post_name, $services, true ) ) {
        easyevents_add_all_service_meta_boxes();
        return;
    }

    // Check 2 : URI complète (ex: services/easyflash)
    $uri = get_page_uri( $post->ID );
    foreach ( $services as $s ) {
        if ( false !== strpos( $uri, $s ) ) {
            easyevents_add_all_service_meta_boxes();
            return;
        }
    }
}

function easyevents_add_all_service_meta_boxes() {
    add_meta_box( 'easyevents_service_hero',         '🎯 Hero Section',            'easyevents_render_hero_meta',         'page', 'normal', 'high'    );
    add_meta_box( 'easyevents_service_stats',        '📊 Statistiques',            'easyevents_render_stats_meta',        'page', 'normal', 'high'    );
    add_meta_box( 'easyevents_service_images',       '🖼️ Images des sections',     'easyevents_render_images_meta',       'page', 'normal', 'default' );
    add_meta_box( 'easyevents_service_testimonials', '⭐ Témoignages',             'easyevents_render_testimonials_meta', 'page', 'normal', 'default' );
    add_meta_box( 'easyevents_service_faq',          '❓ FAQ',                     'easyevents_render_faq_meta',          'page', 'normal', 'default' );
    add_meta_box( 'easyevents_service_contact',      '📞 Contact & CTA',           'easyevents_render_contact_meta',      'page', 'side',   'default' );
    add_meta_box( 'easyevents_service_sections',     '👁️ Visibilité des sections', 'easyevents_render_sections_meta',     'page', 'side',   'high'    );
}

/* ───────────────────────────────────────────────
 * 2. (registration is now handled by add_meta_boxes_page — no CSS hiding needed)
 * ─────────────────────────────────────────────── */

/* ───────────────────────────────────────────────
 * 3. Admin styles for meta boxes
 * ─────────────────────────────────────────────── */
add_action( 'admin_head', 'easyevents_service_meta_styles' );

function easyevents_service_meta_styles() {
    echo '<style>
    .ee-field { margin-bottom: 1.25rem; }
    .ee-field label { display: block; font-weight: 600; margin-bottom: 4px; color: #1d2327; font-size: 13px; }
    .ee-field input[type="text"],
    .ee-field textarea { width: 100%; padding: 8px 10px; border: 1px solid #8c8f94; border-radius: 4px; font-size: 14px; }
    .ee-field textarea { min-height: 80px; resize: vertical; }
    .ee-field .description { color: #646970; font-size: 12px; margin-top: 4px; font-style: italic; }
    .ee-repeater { border: 1px solid #c3c4c7; border-radius: 6px; padding: 0; margin-bottom: 10px; }
    .ee-repeater-item { padding: 15px; border-bottom: 1px solid #e0e0e0; background: #f9f9f9; }
    .ee-repeater-item:last-child { border-bottom: 0; }
    .ee-repeater-item:nth-child(odd) { background: #fff; }
    .ee-repeater-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
    .ee-repeater-header strong { color: #2271b1; font-size: 13px; }
    .ee-remove-item { color: #b32d2e; background: none; border: 1px solid #b32d2e; border-radius: 3px; padding: 2px 8px; cursor: pointer; font-size: 12px; }
    .ee-remove-item:hover { background: #b32d2e; color: #fff; }
    .ee-add-item { background: #2271b1; color: #fff; border: none; border-radius: 4px; padding: 8px 16px; cursor: pointer; font-size: 13px; margin-top: 10px; }
    .ee-add-item:hover { background: #135e96; }
    .ee-section-desc { background: #f0f6fc; border-left: 4px solid #2271b1; padding: 10px 15px; margin-bottom: 20px; border-radius: 0 4px 4px 0; font-size: 13px; color: #1d2327; }
    .ee-media-row { display:flex; gap:8px; align-items:center; margin-top:8px; flex-wrap:wrap; }
    .ee-media-preview { margin-top:10px; }
    .ee-media-preview img { max-width: 220px; border-radius: 6px; border: 1px solid #dcdcde; display:block; }
    .ee-image-item { border:1px solid #dcdcde; border-radius:6px; padding:12px; margin-bottom:10px; background:#fff; }
    .ee-image-item h4 { margin:0 0 8px; font-size:13px; }
    </style>';
}

/* ───────────────────────────────────────────────
 * Defaults par service — pré-remplissage admin
 * ─────────────────────────────────────────────── */

function ee_get_service_defaults( $slug, $key ) {
    static $map = null;
    if ( null === $map ) {
        $map = array(
            'easyflash' => array(
                'hero_title'    => 'Location de PhotoBooth en Suisse',
                'hero_subtitle' => 'Depuis 2009, EasyFlash propose des bornes photo entièrement personnalisables dans toute la Suisse pour offrir un élément de distraction unique à vos invités.',
                'hero_badge'    => 'EasyFlash · Location de PhotoBooth',
                'hero_cta_1'    => 'Obtenir un devis',
                'hero_cta_2'    => 'Voir nos modèles',
                'phone'         => '+41 22 519 21 66',
                'stats' => array(
                    array( 'value' => '2009', 'label' => 'Fondé à Genève' ),
                    array( 'value' => '500+', 'label' => 'Événements couverts' ),
                    array( 'value' => '4',    'label' => 'Modèles de PhotoBooth' ),
                    array( 'value' => '24h',  'label' => 'Réponse garantie' ),
                ),
                'testimonials' => array(
                    array( 'text' => 'Le photobooth EasyFlash a fait sensation ! Les invités en parlent encore. Les tirages étaient magnifiques et l\'équipe très professionnelle.', 'author' => 'Mariage', 'company' => 'Julie & Thomas' ),
                    array( 'text' => 'Le 360° a été l\'attraction numéro un de notre soirée corporate. Vidéos spectaculaires, partage instantané. On recommande à 100% !', 'author' => 'Gala d\'entreprise', 'company' => 'Laurent M.' ),
                    array( 'text' => 'Service impeccable du début à la fin. Le Miroir a ajouté une touche glamour parfaite à notre événement. Merci EasyFlash !', 'author' => 'Anniversaire', 'company' => 'Sandra K.' ),
                ),
                'faq' => array(
                    array( 'q' => 'Quelle est la différence entre l\'EasyBox, l\'EasyBox 360° et l\'EasyBox Miroir ?', 'a' => 'L\'EasyBox B&W est notre borne photo signature : épurée, élégante et au rendu noir & blanc intemporel. L\'EasyBox 360° capture une vidéo panoramique à 360° de vos invités pour un effet spectaculaire. L\'EasyBox Miroir est un grand écran miroir interactif qui propose des filtres et animations en temps réel. Chaque modèle est entièrement personnalisable aux couleurs de votre événement.' ),
                    array( 'q' => 'Les impressions sont-elles incluses dans la location ?', 'a' => 'Les impressions sont facultatives et se configurent directement sur notre devis en ligne. Si vous optez pour un pack impression, vous avez le choix entre une formule limitée ou illimitée selon vos besoins. Les photos numériques restent disponibles en téléchargement via QR code ou par e-mail après l\'événement, quel que soit le pack choisi.' ),
                    array( 'q' => 'Est-il possible de personnaliser le cadre photo et l\'interface ?', 'a' => 'Oui, vous avez 3 options : (1) Accès gratuit à notre bibliothèque de plus de 5 000 templates que vous personnalisez vous-même avec votre logo, slogan ou couleurs. (2) Vous nous transmettez votre thématique, couleurs et polices, et notre équipe crée un template entièrement sur mesure (option payante). (3) Mode Portrait IA : le système plonge chaque invité dans un univers visuel unique dont il devient l\'acteur principal.' ),
                    array( 'q' => 'Combien de temps faut-il pour installer une borne ?', 'a' => 'Le montage prend entre 30 et 45 minutes. Notre équipe intervient bien en amont du début de votre événement afin que tout soit prêt en toute sérénité. Un technicien reste sur place toute la durée de la prestation.' ),
                    array( 'q' => 'Dans quelle zone géographique intervenez-vous ?', 'a' => 'Nous intervenons à Genève et en Suisse francophone. Contactez-nous pour un devis incluant les frais de déplacement.' ),
                    array( 'q' => 'Comment se déroule la réservation ?', 'a' => 'Tout se passe en ligne, en moins de 5 minutes : (1) Configurez votre devis en choisissant votre borne, la date et le lieu. (2) Confirmez votre réservation en ligne. (3) Personnalisez ensuite votre expérience depuis votre espace.' ),
                ),
            ),
        );
    }
    return isset( $map[ $slug ][ $key ] ) ? $map[ $slug ][ $key ] : null;
}

/* ───────────────────────────────────────────────
 * 4. Meta box render functions
 * ─────────────────────────────────────────────── */

function easyevents_render_hero_meta( $post ) {
    wp_nonce_field( 'easyevents_service_save', 'easyevents_service_nonce' );

    $hero_image    = get_post_meta( $post->ID, '_ee_hero_image', true );
    $hero_title    = get_post_meta( $post->ID, '_ee_hero_title', true );
    $hero_subtitle = get_post_meta( $post->ID, '_ee_hero_subtitle', true );
    $hero_badge    = get_post_meta( $post->ID, '_ee_hero_badge', true );
    $hero_cta_1    = get_post_meta( $post->ID, '_ee_hero_cta_1', true );
    $hero_cta_2    = get_post_meta( $post->ID, '_ee_hero_cta_2', true );

    // Pré-remplir avec les valeurs natives de la page si aucune valeur personnalisée n'est enregistrée
    $slug = $post->post_name;
    if ( empty( $hero_title ) )    $hero_title    = (string) ( ee_get_service_defaults( $slug, 'hero_title' )    ?? '' );
    if ( empty( $hero_subtitle ) ) $hero_subtitle = (string) ( ee_get_service_defaults( $slug, 'hero_subtitle' ) ?? '' );
    if ( empty( $hero_badge ) )    $hero_badge    = (string) ( ee_get_service_defaults( $slug, 'hero_badge' )    ?? '' );
    if ( empty( $hero_cta_1 ) )    $hero_cta_1    = (string) ( ee_get_service_defaults( $slug, 'hero_cta_1' )    ?? '' );
    if ( empty( $hero_cta_2 ) )    $hero_cta_2    = (string) ( ee_get_service_defaults( $slug, 'hero_cta_2' )    ?? '' );

    echo '<div class="ee-section-desc">✏️ Les valeurs actuelles de la page sont pré-remplies ci-dessous. Modifiez puis enregistrez pour les personnaliser.</div>';

    echo '<div class="ee-field"><label>Titre Hero</label>';
    echo '<input type="text" name="_ee_hero_title" value="' . esc_attr( $hero_title ) . '" placeholder="Titre principal du hero">';
    echo '<p class="description">Ex: La Pause Bien-Être pour vos Événements</p></div>';

    echo '<div class="ee-field"><label>Image Hero (URL)</label>';
    echo '<input type="text" name="_ee_hero_image" value="' . esc_attr( $hero_image ) . '" placeholder="https://.../image.jpg">';
        echo '<div class="ee-media-row">';
        echo '<button type="button" class="button" id="ee_hero_image_pick">Choisir depuis la médiathèque</button>';
        echo '<button type="button" class="button" id="ee_hero_image_clear">Retirer</button>';
        echo '</div>';
        echo '<div class="ee-media-preview" id="ee_hero_image_preview"' . ( empty( $hero_image ) ? ' style="display:none"' : '' ) . '>';
        echo '<img src="' . esc_url( $hero_image ) . '" alt="Aperçu image Hero">';
        echo '</div>';
    echo '<p class="description">Collez l\'URL de l\'image depuis la bibliothèque média. Priorité: ce champ > image mise en avant > image par défaut.</p></div>';

        echo '<script>
        (function(){
            var input = document.querySelector("input[name=\"_ee_hero_image\"]");
            var pickBtn = document.getElementById("ee_hero_image_pick");
            var clearBtn = document.getElementById("ee_hero_image_clear");
            var preview = document.getElementById("ee_hero_image_preview");
            if (!input || !pickBtn || !clearBtn || typeof wp === "undefined" || !wp.media) return;

            function setPreview(url){
                if (!preview) return;
                if (!url) {
                    preview.style.display = "none";
                    preview.innerHTML = "";
                    return;
                }
                preview.style.display = "block";
                preview.innerHTML = "<img src=\"" + url.replace(/\"/g, "&quot;") + "\" alt=\"Aperçu image Hero\">";
            }

            pickBtn.addEventListener("click", function(e){
                e.preventDefault();
                var frame = wp.media({
                    title: "Choisir une image Hero",
                    button: { text: "Utiliser cette image" },
                    multiple: false,
                    library: { type: "image" }
                });
                frame.on("select", function(){
                    var attachment = frame.state().get("selection").first().toJSON();
                    if (!attachment || !attachment.url) return;
                    input.value = attachment.url;
                    setPreview(attachment.url);
                });
                frame.open();
            });

            clearBtn.addEventListener("click", function(e){
                e.preventDefault();
                input.value = "";
                setPreview("");
            });

            input.addEventListener("change", function(){ setPreview(input.value.trim()); });
            setPreview(input.value.trim());
        })();
        </script>';

    echo '<div class="ee-field"><label>Sous-titre Hero</label>';
    echo '<textarea name="_ee_hero_subtitle" placeholder="Description sous le titre">' . esc_textarea( $hero_subtitle ) . '</textarea></div>';

    echo '<div class="ee-field"><label>Badge / Pill</label>';
    echo '<input type="text" name="_ee_hero_badge" value="' . esc_attr( $hero_badge ) . '" placeholder="Ex: EasyRelax · Bien-être événementiel"></div>';

    echo '<div class="ee-field"><label>Texte CTA principal</label>';
    echo '<input type="text" name="_ee_hero_cta_1" value="' . esc_attr( $hero_cta_1 ) . '" placeholder="Ex: Simuler une offre"></div>';

    echo '<div class="ee-field"><label>Texte CTA secondaire</label>';
    echo '<input type="text" name="_ee_hero_cta_2" value="' . esc_attr( $hero_cta_2 ) . '" placeholder="Ex: Voir les formules"></div>';
}

function easyevents_render_stats_meta( $post ) {
    $stats = get_post_meta( $post->ID, '_ee_stats', true );
    if ( ! is_array( $stats ) || empty( $stats ) ) {
        $defaults_stats = ee_get_service_defaults( $post->post_name, 'stats' );
        $stats = $defaults_stats ?: array(
            array( 'value' => '', 'label' => '' ),
            array( 'value' => '', 'label' => '' ),
            array( 'value' => '', 'label' => '' ),
            array( 'value' => '', 'label' => '' ),
        );
    }

    echo '<div class="ee-section-desc">✏️ Les valeurs actuelles de la page sont pré-remplies ci-dessous. Modifiez puis enregistrez pour les personnaliser.</div>';
    echo '<div class="ee-repeater">';
    foreach ( $stats as $i => $s ) {
        echo '<div class="ee-repeater-item">';
        echo '<div class="ee-repeater-header"><strong>Stat ' . ( $i + 1 ) . '</strong></div>';
        echo '<div class="ee-field"><label>Valeur</label>';
        echo '<input type="text" name="_ee_stats[' . $i . '][value]" value="' . esc_attr( $s['value'] ?? '' ) . '" placeholder="Ex: 98%"></div>';
        echo '<div class="ee-field"><label>Label</label>';
        echo '<input type="text" name="_ee_stats[' . $i . '][label]" value="' . esc_attr( $s['label'] ?? '' ) . '" placeholder="Ex: Clients satisfaits"></div>';
        echo '</div>';
    }
    echo '</div>';
}

function easyevents_render_faq_meta( $post ) {
    $faq = get_post_meta( $post->ID, '_ee_faq', true );
    if ( ! is_array( $faq ) || empty( $faq ) ) {
        $defaults_faq = ee_get_service_defaults( $post->post_name, 'faq' );
        $faq = $defaults_faq ?: array();
    }

    echo '<div class="ee-section-desc">✏️ Les questions actuelles de la page sont pré-remplies ci-dessous. Modifiez puis enregistrez pour les personnaliser.</div>';
    echo '<div class="ee-repeater" id="ee-faq-repeater">';
    foreach ( $faq as $i => $item ) {
        echo '<div class="ee-repeater-item">';
        echo '<div class="ee-repeater-header"><strong>Question ' . ( $i + 1 ) . '</strong><button type="button" class="ee-remove-item" onclick="this.closest(\'.ee-repeater-item\').remove()">✕ Supprimer</button></div>';
        echo '<div class="ee-field"><label>Question</label>';
        echo '<input type="text" name="_ee_faq[' . $i . '][q]" value="' . esc_attr( $item['q'] ?? '' ) . '"></div>';
        echo '<div class="ee-field"><label>Réponse</label>';
        echo '<textarea name="_ee_faq[' . $i . '][a]">' . esc_textarea( $item['a'] ?? '' ) . '</textarea></div>';
        echo '</div>';
    }
    echo '</div>';
    echo '<button type="button" class="ee-add-item" onclick="easyeventsAddFaqItem()">+ Ajouter une question</button>';
    echo '<script>
    function easyeventsAddFaqItem() {
        var r = document.getElementById("ee-faq-repeater");
        var n = r.children.length;
        var html = \'<div class="ee-repeater-item">\' +
            \'<div class="ee-repeater-header"><strong>Question \' + (n+1) + \'</strong><button type="button" class="ee-remove-item" onclick="this.closest(\\\'.ee-repeater-item\\\').remove()">✕ Supprimer</button></div>\' +
            \'<div class="ee-field"><label>Question</label><input type="text" name="_ee_faq[\' + n + \'][q]" value=""></div>\' +
            \'<div class="ee-field"><label>Réponse</label><textarea name="_ee_faq[\' + n + \'][a]"></textarea></div>\' +
            \'</div>\';
        r.insertAdjacentHTML("beforeend", html);
    }
    </script>';
}

function easyevents_render_testimonials_meta( $post ) {
    $testimonials = get_post_meta( $post->ID, '_ee_testimonials', true );
    if ( ! is_array( $testimonials ) || empty( $testimonials ) ) {
        $defaults_t = ee_get_service_defaults( $post->post_name, 'testimonials' );
        $testimonials = $defaults_t ?: array();
    }

    echo '<div class="ee-section-desc">✏️ Les témoignages actuels de la page sont pré-remplies ci-dessous. Modifiez puis enregistrez pour les personnaliser.</div>';
    echo '<div class="ee-repeater" id="ee-testimonials-repeater">';
    foreach ( $testimonials as $i => $t ) {
        echo '<div class="ee-repeater-item">';
        echo '<div class="ee-repeater-header"><strong>Avis ' . ( $i + 1 ) . '</strong><button type="button" class="ee-remove-item" onclick="this.closest(\'.ee-repeater-item\').remove()">✕ Supprimer</button></div>';
        echo '<div class="ee-field"><label>Texte</label>';
        echo '<textarea name="_ee_testimonials[' . $i . '][text]">' . esc_textarea( $t['text'] ?? '' ) . '</textarea></div>';
        echo '<div class="ee-field"><label>Auteur</label>';
        echo '<input type="text" name="_ee_testimonials[' . $i . '][author]" value="' . esc_attr( $t['author'] ?? '' ) . '"></div>';
        echo '<div class="ee-field"><label>Entreprise / Rôle</label>';
        echo '<input type="text" name="_ee_testimonials[' . $i . '][company]" value="' . esc_attr( $t['company'] ?? '' ) . '"></div>';
        echo '</div>';
    }
    echo '</div>';
    echo '<button type="button" class="ee-add-item" onclick="easyeventsAddTestimonial()">+ Ajouter un témoignage</button>';
    echo '<script>
    function easyeventsAddTestimonial() {
        var r = document.getElementById("ee-testimonials-repeater");
        var n = r.children.length;
        var html = \'<div class="ee-repeater-item">\' +
            \'<div class="ee-repeater-header"><strong>Avis \' + (n+1) + \'</strong><button type="button" class="ee-remove-item" onclick="this.closest(\\\'.ee-repeater-item\\\').remove()">✕ Supprimer</button></div>\' +
            \'<div class="ee-field"><label>Texte</label><textarea name="_ee_testimonials[\' + n + \'][text]"></textarea></div>\' +
            \'<div class="ee-field"><label>Auteur</label><input type="text" name="_ee_testimonials[\' + n + \'][author]" value=""></div>\' +
            \'<div class="ee-field"><label>Entreprise / Rôle</label><input type="text" name="_ee_testimonials[\' + n + \'][company]" value=""></div>\' +
            \'</div>\';
        r.insertAdjacentHTML("beforeend", html);
    }
    </script>';
}

function easyevents_render_contact_meta( $post ) {
    $phone = get_post_meta( $post->ID, '_ee_phone', true );
    $email = get_post_meta( $post->ID, '_ee_email', true );
    $cta   = get_post_meta( $post->ID, '_ee_devis_cta', true );

    if ( empty( $phone ) ) $phone = (string) ( ee_get_service_defaults( $post->post_name, 'phone' ) ?? '' );

    echo '<div class="ee-field"><label>Téléphone</label>';
    echo '<input type="text" name="_ee_phone" value="' . esc_attr( $phone ) . '" placeholder="+41 22 519 21 66"></div>';

    echo '<div class="ee-field"><label>Email</label>';
    echo '<input type="text" name="_ee_email" value="' . esc_attr( $email ) . '" placeholder="contact@easyevents.ch"></div>';

    echo '<div class="ee-field"><label>Texte CTA Devis</label>';
    echo '<input type="text" name="_ee_devis_cta" value="' . esc_attr( $cta ) . '" placeholder="Demander votre devis"></div>';
}

function easyevents_get_service_image_override_fields( $slug ) {
        $all = array(
                'easyflair' => array(
                        'easyflair' => 'Image principale EasyFlair',
                ),
                'easyflash' => array(
                        'easyflash'          => 'Image principale EasyFlash',
                        'panel-easybox-bw'   => 'Image onglet EasyBox (classique)',
                        'panel-easybox-miroir' => 'Image onglet EasyBox Miroir',
                        'panel-easybox-360'  => 'Image onglet EasyBox 360°',
                        'panel-easybox-iris' => 'Image onglet EasyBox Iris',
                ),
                'easychallenge' => array(
                        'easychallenge' => 'Image principale EasyChallenge',
                        'easychallenge-brand-b' => 'Brand block image 2 (Duel du rire)',
                        'easychallenge-brand-c' => 'Brand block image 3 (SlideBall)',
                ),
                'easyrelax' => array(
                        'hero' => 'Image hero EasyRelax',
                        'easyrelax-1' => 'Image intro / immersive 1',
                        'easyrelax-2' => 'Image immersive 2',
                        'easyrelax-3' => 'Background immersive',
                        'easyrelax-11' => 'Brand mosaic 1',
                        'easyrelax-12' => 'Brand mosaic 2',
                        'easyrelax-13' => 'Brand mosaic 3',
                ),
                'easytoilets' => array(
                        'easytoilets' => 'Image principale EasyToilets',
                        'hero' => 'Image option premium 1',
                        'easyflair' => 'Image option premium 2',
                ),
        );

        return isset( $all[ $slug ] ) ? $all[ $slug ] : array();
}

function easyevents_render_images_meta( $post ) {
        $fields = easyevents_get_service_image_override_fields( $post->post_name );
        if ( empty( $fields ) ) {
                echo '<p>Aucune image configurable pour cette page.</p>';
                return;
        }

        $images = get_post_meta( $post->ID, '_ee_section_images', true );
        if ( ! is_array( $images ) ) {
                $images = array();
        }

        echo '<div class="ee-section-desc">Images section par section. Si vide, le thème utilise la valeur par défaut.</div>';

        foreach ( $fields as $key => $label ) {
                $input_id = 'ee_img_' . preg_replace( '/[^a-z0-9_\-]/i', '_', $key );
                $val = isset( $images[ $key ] ) ? (string) $images[ $key ] : '';

                echo '<div class="ee-image-item">';
                echo '<h4>' . esc_html( $label ) . '</h4>';
                echo '<input id="' . esc_attr( $input_id ) . '" type="text" name="_ee_section_images[' . esc_attr( $key ) . ']" value="' . esc_attr( $val ) . '" placeholder="https://.../image.jpg">';
                echo '<div class="ee-media-row">';
                echo '<button type="button" class="button ee-media-pick" data-target="' . esc_attr( $input_id ) . '">Choisir depuis la médiathèque</button>';
                echo '<button type="button" class="button ee-media-clear" data-target="' . esc_attr( $input_id ) . '">Retirer</button>';
                echo '</div>';
                echo '</div>';
        }

        echo '<script>
        (function(){
            if (typeof wp === "undefined" || !wp.media) return;
            function byId(id){ return document.getElementById(id); }
            document.querySelectorAll(".ee-media-pick").forEach(function(btn){
                btn.addEventListener("click", function(e){
                    e.preventDefault();
                    var target = btn.getAttribute("data-target");
                    var input = byId(target);
                    if (!input) return;
                    var frame = wp.media({
                        title: "Choisir une image",
                        button: { text: "Utiliser cette image" },
                        multiple: false,
                        library: { type: "image" }
                    });
                    frame.on("select", function(){
                        var attachment = frame.state().get("selection").first().toJSON();
                        if (attachment && attachment.url) input.value = attachment.url;
                    });
                    frame.open();
                });
            });
            document.querySelectorAll(".ee-media-clear").forEach(function(btn){
                btn.addEventListener("click", function(e){
                    e.preventDefault();
                    var target = btn.getAttribute("data-target");
                    var input = byId(target);
                    if (input) input.value = "";
                });
            });
        })();
        </script>';
}

function easyevents_render_sections_meta( $post ) {
    $sections = easyevents_get_available_sections( $post->post_name );
    $hidden   = get_post_meta( $post->ID, '_ee_hidden_sections', true );
    if ( ! is_array( $hidden ) ) $hidden = array();

    echo '<div class="ee-section-desc">Décochez pour masquer une section de la page.</div>';
    echo '<div style="margin-top:8px">';
    foreach ( $sections as $key => $label ) {
        $checked = ! in_array( $key, $hidden, true ) ? 'checked' : '';
        echo '<label style="display:block;margin-bottom:6px;font-size:13px;cursor:pointer">';
        echo '<input type="checkbox" name="_ee_visible_sections[]" value="' . esc_attr( $key ) . '" ' . $checked . ' style="margin-right:6px">';
        echo esc_html( $label ) . '</label>';
    }
    echo '</div>';
}

function easyevents_get_available_sections( $slug = '' ) {
    $common = array(
        'hero'         => '🎯 Hero',
        'marquee'      => '✦ Marquee (mots défilants)',
        'testimonials' => '⭐ Témoignages / Avis clients',
        'brand'        => '🏢 Brand Block (CTA marque)',
        'crosssell'    => '🔗 Cross-sell (autres services)',
        'faq'          => '❓ FAQ',
        'contact'      => '📞 Contact',
    );

    $specific = array(
        'easyrelax' => array(
            'gallery'   => '📷 Galerie photos',
            'intro'     => '📝 Votre moment de détente',
            'immersive' => '🌿 Découvrez la pause bien-être',
            'formulas'  => '📋 Formules / Accordion',
        ),
        'easytoilets' => array(
            'approche'  => '🎯 Notre approche',
            'demarquez' => '✨ Démarquez-vous',
            'events'    => '🎪 Solution pour vos événements',
            'options'   => '⚡ Options Premium',
        ),
        'easyflash' => array(
            'products'  => '📦 Onglets Produits',
            'values'    => '💎 Nos valeurs',
        ),
        'easychallenge' => array(
            'why'       => '💡 Pourquoi le Team Building',
            'products'  => '📦 Onglets Formules',
            'values'    => '💎 Valeurs',
        ),
        'easyflair' => array(
            'intro'     => '📝 Texte d\'introduction',
            'tabs'      => '📦 Onglets Prestations',
        ),
    );

    $extra = isset( $specific[ $slug ] ) ? $specific[ $slug ] : array();

    // Build ordered list: hero first, then specific, then common tail
    $ordered = array( 'hero' => $common['hero'] );
    foreach ( $extra as $k => $v ) {
        $ordered[ $k ] = $v;
    }
    foreach ( $common as $k => $v ) {
        if ( ! isset( $ordered[ $k ] ) ) $ordered[ $k ] = $v;
    }
    return $ordered;
}

/* ───────────────────────────────────────────────
 * 5. Save meta data
 * ─────────────────────────────────────────────── */
add_action( 'save_post_page', 'easyevents_save_service_meta' );

function easyevents_save_service_meta( $post_id ) {
    if ( ! isset( $_POST['easyevents_service_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['easyevents_service_nonce'], 'easyevents_service_save' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_page', $post_id ) ) return;

    // Hero fields
    $text_fields = array( '_ee_hero_title', '_ee_hero_subtitle', '_ee_hero_badge', '_ee_hero_cta_1', '_ee_hero_cta_2', '_ee_phone', '_ee_email', '_ee_devis_cta' );
    foreach ( $text_fields as $f ) {
        if ( isset( $_POST[ $f ] ) ) {
            update_post_meta( $post_id, $f, sanitize_text_field( wp_unslash( $_POST[ $f ] ) ) );
        }
    }

    if ( isset( $_POST['_ee_hero_image'] ) ) {
        update_post_meta( $post_id, '_ee_hero_image', esc_url_raw( wp_unslash( $_POST['_ee_hero_image'] ) ) );
    }

    if ( isset( $_POST['_ee_section_images'] ) && is_array( $_POST['_ee_section_images'] ) ) {
        $clean_images = array();
        foreach ( $_POST['_ee_section_images'] as $key => $url ) {
            $clean_key = sanitize_key( wp_unslash( $key ) );
            $clean_url = esc_url_raw( wp_unslash( $url ) );
            if ( '' !== $clean_key && '' !== $clean_url ) {
                $clean_images[ $clean_key ] = $clean_url;
            }
        }
        update_post_meta( $post_id, '_ee_section_images', $clean_images );
    } else {
        delete_post_meta( $post_id, '_ee_section_images' );
    }

    // Stats (array of value/label pairs)
    if ( isset( $_POST['_ee_stats'] ) && is_array( $_POST['_ee_stats'] ) ) {
        $clean_stats = array();
        foreach ( $_POST['_ee_stats'] as $s ) {
            $clean_stats[] = array(
                'value' => sanitize_text_field( wp_unslash( $s['value'] ?? '' ) ),
                'label' => sanitize_text_field( wp_unslash( $s['label'] ?? '' ) ),
            );
        }
        update_post_meta( $post_id, '_ee_stats', $clean_stats );
    }

    // FAQ (array of q/a pairs)
    if ( isset( $_POST['_ee_faq'] ) && is_array( $_POST['_ee_faq'] ) ) {
        $clean_faq = array();
        foreach ( $_POST['_ee_faq'] as $item ) {
            $q = sanitize_text_field( wp_unslash( $item['q'] ?? '' ) );
            $a = sanitize_textarea_field( wp_unslash( $item['a'] ?? '' ) );
            if ( ! empty( $q ) ) {
                $clean_faq[] = array( 'q' => $q, 'a' => $a );
            }
        }
        update_post_meta( $post_id, '_ee_faq', $clean_faq );
    }

    // Sections visibility
    $all_sections = easyevents_get_available_sections( get_post_field( 'post_name', $post_id ) );
    $visible = isset( $_POST['_ee_visible_sections'] ) && is_array( $_POST['_ee_visible_sections'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['_ee_visible_sections'] ) ) : array();
    $hidden  = array();
    foreach ( array_keys( $all_sections ) as $sec ) {
        if ( ! in_array( $sec, $visible, true ) ) {
            $hidden[] = $sec;
        }
    }
    update_post_meta( $post_id, '_ee_hidden_sections', $hidden );

    // Testimonials
    if ( isset( $_POST['_ee_testimonials'] ) && is_array( $_POST['_ee_testimonials'] ) ) {
        $clean_t = array();
        foreach ( $_POST['_ee_testimonials'] as $t ) {
            $text    = sanitize_textarea_field( wp_unslash( $t['text'] ?? '' ) );
            $author  = sanitize_text_field( wp_unslash( $t['author'] ?? '' ) );
            $company = sanitize_text_field( wp_unslash( $t['company'] ?? '' ) );
            if ( ! empty( $text ) ) {
                $clean_t[] = array( 'text' => $text, 'author' => $author, 'company' => $company );
            }
        }
        update_post_meta( $post_id, '_ee_testimonials', $clean_t );
    }
}

/* ───────────────────────────────────────────────
 * 6. Helper: get service meta with fallback
 * ─────────────────────────────────────────────── */

/**
 * Get a service field value with fallback to default.
 *
 * @param int    $post_id  Post ID
 * @param string $key      Meta key (without _ee_ prefix)
 * @param mixed  $default  Default value if meta is empty
 * @return mixed
 */
/**
 * Check if a section should be shown (not hidden via admin).
 */
function ee_show_section( $post_id, $section ) {
    $hidden = get_post_meta( $post_id, '_ee_hidden_sections', true );
    if ( ! is_array( $hidden ) ) return true;
    return ! in_array( $section, $hidden, true );
}

function ee_get( $post_id, $key, $default = '' ) {
    $val = get_post_meta( $post_id, '_ee_' . $key, true );
    if ( empty( $val ) ) return $default;
    return $val;
}

function ee_get_image( $post_id, $key, $default = '' ) {
    $images = get_post_meta( $post_id, '_ee_section_images', true );
    if ( is_array( $images ) && ! empty( $images[ $key ] ) ) {
        return esc_url_raw( $images[ $key ] );
    }
    return $default;
}

/**
 * Get FAQ items — returns admin values if set, otherwise default array.
 */
function ee_get_faq( $post_id, $defaults = array() ) {
    $custom = get_post_meta( $post_id, '_ee_faq', true );
    if ( ! empty( $custom ) && is_array( $custom ) ) return $custom;
    return $defaults;
}

/**
 * Get testimonials — returns admin values if set, otherwise default array.
 */
function ee_get_testimonials( $post_id, $defaults = array() ) {
    $custom = get_post_meta( $post_id, '_ee_testimonials', true );
    if ( ! empty( $custom ) && is_array( $custom ) ) return $custom;
    return $defaults;
}

/**
 * Get stats — returns admin values if set (non-empty), otherwise default array.
 */
function ee_get_stats( $post_id, $defaults = array() ) {
    $custom = get_post_meta( $post_id, '_ee_stats', true );
    if ( ! empty( $custom ) && is_array( $custom ) ) {
        // Check if at least one stat has a value filled in
        $has_value = false;
        foreach ( $custom as $s ) {
            if ( ! empty( $s['value'] ) ) { $has_value = true; break; }
        }
        if ( $has_value ) return $custom;
    }
    return $defaults;
}
