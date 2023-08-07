<?php

class Request {

    public function ip() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        return $ip_address;
    }

    public function userAgent() {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    public function pageUrl() {
        return $_SERVER['REQUEST_URI'];
    }

    public function query(string $paramName) {
        return $_GET[$paramName] ?? null;
    }
}