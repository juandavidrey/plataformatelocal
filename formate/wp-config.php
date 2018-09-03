<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'plataformate_formate');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '1K1. uYb>6=|XimK-R&MTSM?ZcZ+,cH4qNHX|L$8DK8pv;|eaKd>an$ydj1l!v]l');
define('SECURE_AUTH_KEY', 'bpRrJ={.1g{pKd!Pfs$u09N[1Tz4&tC~kHl>g[4Rw7aEo/#xhRf8;v?Bl!T>yM!X');
define('LOGGED_IN_KEY', 'V5rF]Qzd9u}J_.sx_Or (JU8nhCh:GJ`d:Xi499F.@_pTu(6}&Zy~R8 9,!m9=nU');
define('NONCE_KEY', 'W2@?NhC-A(vH8q@U[p;rOD+J+6`H@p@BRnv yJ6/RHNour[O N*1*obdc5~6Vok}');
define('AUTH_SALT', '(YYe|x3%Et##k_|6Qt_4:ju%|fyrZG_DzU~4s{,&#+1AaJpryap<cA?O%XCK0b{|');
define('SECURE_AUTH_SALT', 'KfpEgM((L*z 0hPm~37qr,1@9bL-):v=(9fYO#dKzlzz.*Gqz}_v4H%M(W2{_Blm');
define('LOGGED_IN_SALT', '];#2po)R.RRw~`W{-GR1I}IOeprBp$Sn@q|W`6O#qxfop$r+T}%TO.M}s+D$Czk3');
define('NONCE_SALT', 'cbA0ZU9zPV!6fniT@Zh$g90#k11yOorEXabmTC@[.Pw6Djo,.O.^Yd!WA!]F1i6Z');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
