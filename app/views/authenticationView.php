<?php

class authenticationView {



    public function showLogin($error = null) {
        require 'templates/login.phtml';
    }
}