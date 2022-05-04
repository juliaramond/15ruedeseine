<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', '15ruedeseine' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Ft^CSr}hM4YI]=ls@{}.L$=V4x?-10#aLRh4R_}r;KV79AG*)c!{0FJKqxibS=3e' );
define( 'SECURE_AUTH_KEY',  '`;NWI$n&D4C0/FY!H8$G MS7P5J].-[3k8?ZN<Iz)hXR T4fqIh_ lYV![02hP+$' );
define( 'LOGGED_IN_KEY',    '.:JKb=>%/A)K*:/Da5*acz&N^d5cA~Iht5eIBUI%6/FuPuSWO=>%0lbX&d_vQOnu' );
define( 'NONCE_KEY',        ']YoML@{H}!(vR b4xk:8b+I::yHcT*p 9!@n+!J#a)ryr!B_p8.^oqkbt5t fIm`' );
define( 'AUTH_SALT',        'p`7  r?[S}kMB]fE^,NTMc@55@S+of78V7F+m@kM`XmrWLj+Kfk8c=FKR3ca?@nv' );
define( 'SECURE_AUTH_SALT', '<Bx:D43D~]i WX%pk|]$|@IQ B]+}r*)%w=ewbaok^I9S5-F$CN9o7;sR@5/:|uq' );
define( 'LOGGED_IN_SALT',   'RKPJV*0gpH|/J.S_sW&7u+@wWe4A-rRA)7S`/G/0Mk#o}`?.f,(=IRYrUXTykD?T' );
define( 'NONCE_SALT',       '5&K/6^_cv<Atm|wf1C%[v+aS?&+(-G!rm :{h>JoK;#?.ZU<okkM32fl~q8i#4[7' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
