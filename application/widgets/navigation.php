<?php

/*
 * Demo widget
 */
class Navigation extends Widget {

    public function display($data) {

    	// $this->load->helper('download');
        
        if (!isset($data['items'])) {
            $data['items'] = array('Home', 'About', 'Contact');
        }

        $this->view('default/widgets/navigation', $data);
    }
    
}