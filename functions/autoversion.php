<?php
function autoversion( $url )
{
    $path = pathinfo( $url );
    $ver = '?v=' . filemtime( $_SERVER['DOCUMENT_ROOT'] . $url);
    return $path['dirname'] . '/' . $path['basename'] . $ver;
}
?>