<?php
namespace SC_Repair;

class Icon{

	public function __construct()
	{
		add_filter('elementor/icons_manager/additional_tabs', array($this, 'custom_icon'));
	
	}

	function custom_icon($array)
	{

		$plugin_url = plugins_url();

		return array(
			'custom-icon' => array(
				'name'          => 'custom-icon',
				'label'         => 'CM Repair Icon',
				'url'           => '',
				'enqueue'       => array(
					$plugin_url . '/bilent-core/assets/elementor/css/flaticon-style.css',
				),
				'prefix'        => '',
				'displayPrefix' => '',
				'labelIcon'     => 'fab fa-font-awesome-alt',
				'ver'           => '5.9.0',
				'fetchJson'     => $plugin_url . '/bilent-core/assets/elementor/js/flaticon.js',
				'native'        => 1,
			),
		);
	}





}
