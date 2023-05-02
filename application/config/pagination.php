<?php 
//config
        $config['base_url'] = 'http://192.168.27.52:81/kokama-api/user/index';
    
        $config['num_links'] = 5;
        
        //styling page
        $config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
        $config['full_tag_close'] = ' </ul> </nav>';

        $config['first_link'] = 'first';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#"</a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');