<?php
function CUSTOM_SUBSTR($str, int $limit, bool $strip_html = false, bool $dots = true, string $allowed = "") {
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