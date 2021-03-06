<?php
function CUSTOM_SUBSTR($str, int $limit, bool $strip_html = false, bool $dots = true, string $allowed = "")
{
    if (!empty($str)) {
        if ($strip_html) {
            $str = strip_tags($str, $allowed);
        }
        if (strlen($str) <= $limit) {
            return $str;
        }
        $last_space = strrpos(substr($str, 0, $limit), ' ');
        $trim = substr($str, 0, $last_space);

        if ($dots) {
            $trim .= '...';
        }
        return $trim;
    }
    return $str;
}
function CUSTOM_SLUG(string $text, string $encoding = 'utf-8') {
    // Décommenté à moins que l'on en ai besoin par la suite si certains slugs ne s'écrivent pas correctement
    // car la version d'iconv n'est pas la même en local et en prod ce qui provoque des problèmes en prod.
    //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = htmlentities($text, ENT_NOQUOTES, $encoding);
    $text = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $text);
    $text = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $text);
    $text = preg_replace('#&[^;]+;#', '', $text);
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) {
    return 'n-a';
    }
    return $text;
}