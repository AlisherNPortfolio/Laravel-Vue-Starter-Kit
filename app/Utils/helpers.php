<?php

if (!function_exists('cleanNullArray')) {
    function cleanNullArray(array $originArray)
    {
        return array_filter($originArray, fn ($val) => !is_null($val));
    }
}
