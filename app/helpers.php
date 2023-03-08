<?php


/**
 * Convert an Array/Object result set to Array/Array
 *
 * @param $result
 * @return array
 */
function convert_array( $result ) : array
{
    $new = [];
    foreach ( $result as $key => $item )
    {
        $new[$key] = json_decode( json_encode( $item ), true );
    }
    return $new;
}
