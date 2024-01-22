<?php
namespace Components;
class AuthComponent {

    public static function isStrongPassword($password) {
        // Minimum length
        $minLength = 8;
    
        // Check if the password meets the minimum length
        if (strlen($password) < $minLength) {
            return false;
        }
    
        // Check if the password contains at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
    
        // Check if the password contains at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
    
        // Check if the password contains at least one digit
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }
    
        // Check if the password contains at least one special character
        if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
            return false;
        }
    
        // Password meets all criteria
        return true;
    }
    
}