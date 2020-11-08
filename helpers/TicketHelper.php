<?php

class TicketHelper {
    public static function getAllowedUserActions($status, $user) {
        $allowedActions = [];
        if ($status === 'NEW') {
            if (!$user->inGroup('employee')) {
                $allowedActions[] = 'edit';
                $allowedActions[] = 'delete';
            }
            if ($user->inGroup('manager')) {
                $allowedActions[] = 'approve';
            }
        } elseif ($status === 'APPROVED') {
            if ($user->inGroup('manager')) {
                $allowedActions[] = 'edit';
                $allowedActions[] = 'delete';
                $allowedActions[] = 'move';
            } elseif ($user->inGroup('employee')) {
                $allowedActions[] = 'move';
            }
        } elseif ($status === 'IN_PROGRESS' && $user->inGroup('employee')) {
            $allowedActions[] = 'move';
        } elseif ($user->inGroup('manager') || $user->inGroup('employee')) {
            $allowedActions[] = 'delete';
            $allowedActions[] = 'move';
        }
        return $allowedActions;
    }

    public static function getAllowedMoveActions($status, $user) {
        $moveActions = [];
        if ($status === 'APPROVED') {
            if ($user->inGroup('manager')) {
                $moveActions[] = 'NEW';
            } elseif ($user->inGroup('employee')) {
                $moveActions[] = 'IN_PROGRESS';
            }
        } elseif ($status === 'IN_PROGRESS' && $user->inGroup('employee')) {
            $moveActions[] = 'APPROVED';
            $moveActions[] = 'DONE';
        } elseif ($status === 'DONE') {
            if ($user->inGroup('manager') || $user->inGroup('employee')) {
                $moveActions[] = 'APPROVED';
            }
            if ($user->inGroup('employee')) {
                $moveActions[] = 'IN_PROGRESS';
            }
        }
        return $moveActions;
    }
}