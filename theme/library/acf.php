<?php

if (!F_DEVELOPMENT) {

    require_once('acf/acf-lite.php');
    
    function my_acf_settings( $options )
    {
        // activate add-ons
        $options['activation_codes']['repeater'] = 'QJF7-L4IX-UCNP-RF2W';    

        return $options;

    }
    add_filter('acf_settings', 'my_acf_settings');

    include_once 'acf.php';

    function acf_admin_head() {
        global $current_user;
        get_currentuserinfo();

        $str = '<style type="text/css">';
        if (true || $current_user->user_login != 'admin') {
            $str .= '#toplevel_page_edit-post_type-acf{display:none;}';
        }
        $str .= '#cpt_info_box{display:none;}';
        $str .= '#menu-comments{display:none;}';
        $str .= '</style>';
        echo $str;
    }
    add_action('admin_head', 'acf_admin_head');
    

    function my_acf_result_query($args)
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            preg_match('/post=(\d+)/', $_SERVER['HTTP_REFERER'], $matches);
            if (isset($matches[1])) {
                $lang = wp_get_post_terms($matches[1], 'language');
                if ($lang) {
                    $lang = $lang[0];
                    $args['tax_query'][] = array(
                        'taxonomy' => 'language',
                        'field' => 'slug',
                        'terms' => array($lang->slug)
                    );
                }    
            }
        }
        return $args;
    }

    // acf/fields/relationship/result - filter for every field
    add_filter('acf/fields/relationship/query', 'my_acf_result_query', 10, 2);



    if(function_exists("register_field_group"))
    {
	register_field_group(array (
		'id' => '51a36d2c82215',
		'title' => 'Bacheca',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_7',
				'label' => 'Scadenza',
				'name' => 'expiry_date',
				'type' => 'date_picker',
				'order_no' => 0,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
						),
					),
					'allorany' => 'all',
				),
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'bulletin_board',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '51a36d2c8bf0f',
		'title' => 'Seminario',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_9',
				'label' => 'Relatore',
				'name' => 'relatore',
				'type' => 'text',
				'order_no' => 0,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			1 => 
			array (
				'key' => 'field_13',
				'label' => 'Vincoli di partecipazione',
				'name' => 'vincoli',
				'type' => 'text',
				'order_no' => 1,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			2 => 
			array (
				'key' => 'field_14',
				'label' => 'Docente di riferimento',
				'name' => 'docente',
				'type' => 'text',
				'order_no' => 2,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
			3 => 
			array (
				'key' => 'field_15',
				'label' => 'Date',
				'name' => 'date',
				'type' => 'repeater',
				'order_no' => 3,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_16',
						'label' => 'Luogo',
						'name' => 'luogo',
						'type' => 'text',
						'order_no' => 0,
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 
						array (
							'status' => 0,
							'allorany' => 'all',
							'rules' => 0,
						),
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					1 => 
					array (
						'key' => 'field_17',
						'label' => 'Data',
						'name' => 'data',
						'type' => 'date_picker',
						'order_no' => 1,
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 
						array (
							'status' => 0,
							'allorany' => 'all',
							'rules' => 0,
						),
						'column_width' => '',
						'date_format' => 'yymmdd',
						'display_format' => 'dd/mm/yy',
					),
					2 => 
					array (
						'key' => 'field_18',
						'label' => 'Orario',
						'name' => 'orario',
						'type' => 'text',
						'order_no' => 2,
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 
						array (
							'status' => 0,
							'allorany' => 'all',
							'rules' => 0,
						),
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
					),
					3 => 
					array (
						'key' => 'field_19',
						'label' => 'Crediti',
						'name' => 'crediti',
						'type' => 'text',
						'order_no' => 3,
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 
						array (
							'status' => 0,
							'allorany' => 'all',
							'rules' => 0,
						),
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'none',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Aggiungi data',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'seminars',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '51a36d2c8d54b',
		'title' => 'Slider',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_2',
				'label' => 'Slide',
				'name' => 'slides',
				'type' => 'repeater',
				'order_no' => 0,
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 
				array (
					'status' => 0,
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_5',
						'label' => 'Immagine',
						'name' => 'image',
						'type' => 'image',
						'order_no' => 0,
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 
						array (
							'status' => 0,
							'allorany' => 'all',
							'rules' => 0,
						),
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
					),
					1 => 
					array (
						'key' => 'field_3',
						'label' => 'Titolo',
						'name' => 'title',
						'type' => 'text',
						'order_no' => 1,
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 
						array (
							'status' => 0,
							'allorany' => 'all',
							'rules' => 0,
						),
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'none',
					),
					2 => 
					array (
						'key' => 'field_4',
						'label' => 'Descrizione',
						'name' => 'description',
						'type' => 'textarea',
						'order_no' => 2,
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 
						array (
							'status' => 0,
							'allorany' => 'all',
							'rules' => 0,
						),
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'br',
					),
					3 => 
					array (
						'key' => 'field_6',
						'label' => 'Link',
						'name' => 'link',
						'type' => 'text',
						'order_no' => 3,
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 
						array (
							'status' => 0,
							'allorany' => 'all',
							'rules' => 0,
						),
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'none',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Aggiungi slide',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
    }
    
}

?>