<?php

class FormHelper {
    public static function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public static function getField($fieldName, $type = 'POST') {
        if ($type === 'GET') {
            return  $_GET[$fieldName] ?? '';
        }
        return $_POST[$fieldName] ?? '';
    }
    
    public static function getFieldValue($fieldName, $defaultValue = false) {
        if ($defaultValue && !empty($defaultValue)) {
            $newUserInput = self::getField($fieldName);
            if (empty($newUserInput)) {
                return $defaultValue;
            }
        }
        return self::getField($fieldName);
    }
}
