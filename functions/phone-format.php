<?php
function phone_format( $telephone )
{
    $telephone = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '($1) $2-$3', $telephone);
    return $telephone;
}
?>