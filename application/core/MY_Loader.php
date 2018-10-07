<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
	public function admin_template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
        $content  = $this->view('admin/header', $vars, $return);
        $content  = $this->view('admin/navbar', $vars, $return);
        $content  = $this->view('admin/navs', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('admin/footer', $vars, $return);

        return $content;
    else:
        $this->view('admin/header', $vars);
        $this->view('admin/navbar', $vars);
        $this->view('admin/navs', $vars);
        $this->view($template_name, $vars);
        $this->view('admin/footer', $vars);
    endif;
    }
    public function user_template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
        $content  = $this->view('user/header', $vars, $return);
        $content  = $this->view('user/nav', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content  = $this->view('user/cart', $vars, $return);
        $content  = $this->view('user/credit', $vars, $return);
        $content .= $this->view('user/footer', $vars, $return);

        return $content;
    else:
        $this->view('user/header', $vars);
        $this->view('user/nav', $vars);
        $this->view($template_name, $vars);
        $this->view('user/footer', $vars);
    endif;
    }
}
