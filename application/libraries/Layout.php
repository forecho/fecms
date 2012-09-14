<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    var $obj;
    var $layout;

    function Layout($params = array())
    {
        $this->obj =& get_instance();
        if (count($params) > 0)
        {
            $this->initialize($params);
        }
        else
        {
            $this->layout = 'admin/layout';
        }
    }

    function initialize($params = array())
    {
        if (count($params) > 0)
        {  
            foreach ($params as $key => $val)
            {
                $this->$key = $val;
            }        
        }
    }

    function view($view, $data = null, $return = false)
    {
        $data['content_for_layout'] = $this->obj->load->view($view, $data, true);

        if($return)
        {
            $output = $this->obj->load->view($this->layout, $data, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $data, false);
        }
    }
}
?>