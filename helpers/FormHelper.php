<?php

class FormHelper {

    public static function getField($fieldName, $type = 'POST') {
        return $_POST[$fieldName] ?? '';
    }

}