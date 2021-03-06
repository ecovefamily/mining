<?php





PHP_VERSION >= 5.0 or die("DOMPDF requires PHP 5.0+");


define("DOMPDF_DIR", str_replace(DIRECTORY_SEPARATOR, '/', realpath(dirname(__FILE__))));


define("DOMPDF_INC_DIR", DOMPDF_DIR . "/include");


define("DOMPDF_LIB_DIR", DOMPDF_DIR . "/lib");


if( !isset($_SERVER['DOCUMENT_ROOT']) ) {
  $V3wwyy5a12nc = "";
  
  if ( isset($_SERVER['SCRIPT_FILENAME']) )
    $V3wwyy5a12nc = $_SERVER['SCRIPT_FILENAME'];
  elseif ( isset($_SERVER['PATH_TRANSLATED']) )
    $V3wwyy5a12nc = str_replace('\\\\', '\\', $_SERVER['PATH_TRANSLATED']);
    
  $_SERVER['DOCUMENT_ROOT'] = str_replace( '\\', '/', substr($V3wwyy5a12nc, 0, 0-strlen($_SERVER['PHP_SELF'])));
}


if ( file_exists(DOMPDF_DIR . "/dompdf_config.custom.inc.php") ){
  require_once(DOMPDF_DIR . "/dompdf_config.custom.inc.php");
}


require_once(DOMPDF_INC_DIR . "/functions.inc.php");


def("DOMPDF_ADMIN_USERNAME", "user");
def("DOMPDF_ADMIN_PASSWORD", "password");


def("DOMPDF_FONT_DIR", DOMPDF_DIR . "/lib/fonts/");


def("DOMPDF_FONT_CACHE", DOMPDF_FONT_DIR);


def("DOMPDF_TEMP_DIR", sys_get_temp_dir());


def("DOMPDF_CHROOT", realpath(DOMPDF_DIR));


def("DOMPDF_UNICODE_ENABLED", true);


def("DOMPDF_ENABLE_FONTSUBSETTING", false);


def("DOMPDF_PDF_BACKEND", "CPDF");





def("DOMPDF_DEFAULT_MEDIA_TYPE", "screen");


def("DOMPDF_DEFAULT_PAPER_SIZE", "letter");


def("DOMPDF_DEFAULT_FONT", "serif");


def("DOMPDF_DPI", 96);


def("DOMPDF_ENABLE_PHP", false);


def("DOMPDF_ENABLE_JAVASCRIPT", true);


def("DOMPDF_ENABLE_REMOTE", false);


def("DOMPDF_LOG_OUTPUT_FILE", DOMPDF_FONT_DIR."log.htm");


def("DOMPDF_FONT_HEIGHT_RATIO", 1.1);


def("DOMPDF_ENABLE_CSS_FLOAT", false);


def("DOMPDF_AUTOLOAD_PREPEND", false);


def("DOMPDF_ENABLE_HTML5PARSER", false);
require_once(DOMPDF_LIB_DIR . "/html5lib/Parser.php");



require_once(DOMPDF_INC_DIR . "/autoload.inc.php");


mb_internal_encoding('UTF-8');


global $Vlb1pyhumpag;
$Vlb1pyhumpag = array();


global $Vxh3hfxmt4gu;
$Vxh3hfxmt4gu = false;


global $Vatvjzg4ejqt;
$Vatvjzg4ejqt = false;


global $Vwvvrkk5e0vh;
$Vwvvrkk5e0vh = array(); 


def('DEBUGPNG', false);
def('DEBUGKEEPTEMP', false);
def('DEBUGCSS', false);


def('DEBUG_LAYOUT', false);
def('DEBUG_LAYOUT_LINES', true);
def('DEBUG_LAYOUT_BLOCKS', true);
def('DEBUG_LAYOUT_INLINE', true);
def('DEBUG_LAYOUT_PADDINGBOX', true);
