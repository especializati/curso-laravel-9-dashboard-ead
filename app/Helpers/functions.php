<?php

if (!function_exists('convertItemsOfArrayToObject')) {
    function convertItemsOfArrayToObject (array $items): array {
        $items = array_map(function ($item) {
            $stdClass = new \stdClass;
            foreach ($item as $key => $value) {
                $stdClass->{$key} = $value;
            }
            return $stdClass;
        }, $items);

        return $items;
    }
}
