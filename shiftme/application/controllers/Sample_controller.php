<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sample_controller
 *
 * @author ashish
 */
class Sample_controller extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        
    }

    public function sample() {
        echo "hello"; die;
    }
}
