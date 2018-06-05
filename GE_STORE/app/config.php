<?php 
// Path dossiers mvc/public



// Path dossiers models/views/controllers dans app

define('CONTROLLERS', APP . 'controllers' . DS);


define('MODELS', APP . 'models' . DS);

define('VIEWS', APP . 'views' . DS);

// Path  dossier MVC
define('CORE', ROOT . 'core' . DS);

// Path dossier Public
define('PBC', APP . 'public' . DS);

// Path dossier assets dans Public
define('ASSETS', PBC . 'assets'. DS);

//controller/action/template par défaut
define('DEFAULT_CONTROLLER_NAME', 'user');
define('DEFAULT_ACTION_NAME', 'connect');
define('DEFAULT_TEMPLATE_PATH', 'accueil.html');


//Constantes  Base de donnees
define('DB_DSN', 'mysql:host=localhost;dbname=globe;charset=utf8');
define('DB_USER_NAME', 'AKMW');
define('DB_PASSWORD', '84ehJ89nA4DE00zC');


error_reporting(E_ALL); 




//Admin constantes
/*define('PRODUCTS_BY_PAGE', 10);
define('ORDERS_BY_PAGE', 1);
define('ADMIN_EMAIL', '*****');
define('ADMIN_CUSTOMERS_BY_PAGE', 5);
define('ADMIN_CATEGORIES_BY_PAGE', 5);
define('ADMIN_ORDERS_BY_PAGE', 1);
define('ADMIN_PRODUCTS_BY_PAGE', 10);*/



/* Connexion Base de DONNEES 
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'AKMW');
define('DB_PASS', 'P9coyVp7GqCp5zHu');
define('DB_NAME', 'AKMW');


*/









?>