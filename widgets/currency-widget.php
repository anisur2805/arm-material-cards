<?php

namespace ARM_Currency_Widget\widgets;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Currency Widget.
 *
 * Elementor widget that uses the currency control.
 *
 * @since 1.0.0
 */
class ARM_Currency_Widget extends Widget_Base {
/**
 * Get widget name.
 *
 * Retrieve currency widget name.
 *
 * @since 1.0.0
 * @access public
 * @return string Widget name.
 */
	public function get_name() {
		return 'currency';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve currency widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Currency', 'elementor-currency-control' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve currency widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-cart-medium';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the currency widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['general'];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the currency widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return ['currency', 'currencies'];
	}

	/**
	 * Register currency widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-currency-control' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'price',
			[
				'label'   => esc_html__( 'Price', 'elementor-currency-control' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 100,
			]
		);

		$this->add_control(
			'price_currency',
			[
				'label' => esc_html__( 'Currency', 'elementor-currency-control' ),
				'type'  => 'arm-currency',
			]
		);

        $this->end_controls_section();
	}

    /**
	 * Render currency widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
    protected function render() {
        $settings = $this->get_settings_for_display();
        echo $settings['price_currency'] . ' ' . $settings['price'];
    }
}
