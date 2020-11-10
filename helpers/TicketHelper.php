<?php

class TicketHelper {
    public static function getAllowedUserActions($status, $user) {
        $allowedActions = [];
        if ($status === 'NEW' && !$user->inGroup('employee')) {
            if ($user->inGroup('manager')) {
                $allowedActions[] = 'approve';
            }
            $allowedActions[] = 'edit';
            $allowedActions[] = 'delete';
        } elseif (!$user->inGroup('client')) {
            if ($user->inGroup('manager')) {
                $allowedActions[] = 'edit';
                $allowedActions[] = 'delete';
            }
            $allowedActions[] = 'move';
        } 
        return $allowedActions;
    }

    public static function getAllowedMoveActions($status, $user) {
        $moveActions = [];
        if ($status === 'APPROVED') {
            if ($user->inGroup('manager')) {
                $moveActions[] = 'NEW';
            }
            $moveActions[] = 'IN_PROGRESS';
        } elseif ($status === 'IN_PROGRESS') {
            $moveActions[] = 'APPROVED';
            $moveActions[] = 'DONE';
        } elseif ($status === 'DONE') {
            $moveActions[] = 'APPROVED';
            $moveActions[] = 'IN_PROGRESS';
        }
        return $moveActions;
    }
}