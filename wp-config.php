<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'cheshire');

/** Имя пользователя MySQL */
define('DB_USER', 'mysql');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'mysql');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'IDwZ>f&<QBA-$a3qqla`1u=$ sSc10>jK#.@OQjIq[6]umR&JNWsQy<Pq.=#29u0');
define('SECURE_AUTH_KEY',  '<`=E>B]jh$C&@aSl 7}EMW?e`1F|#9@$F:k7VzxwlL&*=*7#3K(%^inErFc6%a=8');
define('LOGGED_IN_KEY',    'Qr)zz/VzC;[Fk`i/a<j=QpvL4]muuc5+`H-J: 9l#k*bU3*OLY2s>4W^w:G:Z9?i');
define('NONCE_KEY',        'HQ,LuZf{gTziQ%)g3gzIg!3}%kZHkL=O[krDZ 7vnoB8)_LgPbo gO:HkFTuVA%`');
define('AUTH_SALT',        't)uN9ab%k4-c0~0;`I^e k<ekL69bPXIv&{FB:d%Po*y(rIvE3$DL/;39@O8Fy?t');
define('SECURE_AUTH_SALT', 'q[z2#l<^%BdBDI4zOAS:~55fr3()/ n3<jy)<,FtH/q%ftynNmhgVllX`.ekQ*0V');
define('LOGGED_IN_SALT',   '@s1VQfuK}pu4.8+8~{ 9Mx4D( ~=@9rC2hlqiy0^>J#:r=2pSuH6,]^C>q&P!W1i');
define('NONCE_SALT',       'iRs~bDVlimFLO lwcg,vk?SW$cv@.}Ywr=$ht}!V+d?a0m`d{1d=tZy>=|,la4E_');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
