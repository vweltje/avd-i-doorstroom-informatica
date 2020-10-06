<?php

class FormHelper {
    public static function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public static function getField($fieldName, $type = 'POST') {
        return $_POST[$fieldName] ?? '';
    }
}
