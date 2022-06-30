<?php
	/**
	 * Material Cards Widget
	 *
	 * @package           MaterialCards
	 * @author            Anisur Rahman
	 * @copyright         2022 anisur2805
	 * @license           GPL-2.0-or-later
	 */

	namespace ARM_Material_Cards\widgets;

	use Elementor\Controls_Manager;
	use Elementor\Utils;
	use Elementor\Widget_Base;

	if ( !defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}

	/**
	 * Elementor List Widget.
	 *
	 * Elementor widget that inserts an embbedable content into the page, from any given URL.
	 *
	 * @since 1.0.0
	 */
	class ARM_Test_Widget extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve list widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'arm-test-widget';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve list widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Test Widget', 'elementor-list-widget' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve list widget icon.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'eicon-bullet-list';
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
		 * Retrieve the list of categories the list widget belongs to.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return ['basic'];
		}

		/**
		 * Get widget keywords.
		 *
		 * Retrieve the list of keywords the list widget belongs to.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return ['test', 'widget'];
		}

		/**
		 * Register list widget controls.
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
					'label' => esc_html__( 'Content', 'elementor-list-widget' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'test-title',
				[
					'label'     => esc_html__( 'Hello', 'elementor' ),
					'type'      => Controls_Manager::TEXT,
					'default'   => 'div',
					'separator' => 'before',
				]
			);

			$this->add_control(
				'title_html_tag',
				[
					'label'     => esc_html__( 'Title HTML Tag', 'elementor' ),
					'type'      => Controls_Manager::SELECT,
					'options'   => [
						'h1'  => 'H1',
						'h2'  => 'H2',
						'h3'  => 'H3',
						'h4'  => 'H4',
						'h5'  => 'H5',
						'h6'  => 'H6',
						'div' => 'div',
					],
					'default'   => 'div',
					'separator' => 'before',
				]
			);

			/* Start repeater */

			$this->end_controls_section();

			// General Typo Styles
			$this->start_controls_section(
				'typography_section',
				[
					'label' => __( 'Typography', 'plugin-name' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);

			$this->end_controls_section();

		}

		/**
		 * Render list widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {
			$settings  = $this->get_settings_for_display();
			$tab_count = 1;

			$tab_title_setting_key = $this->get_repeater_setting_key( 'tab_title', 'tabs', $tab_count );

			$tab_content_setting_key = $this->get_repeater_setting_key( 'tab_content', 'tabs', $tab_count );

			$this->add_render_attribute( $tab_title_setting_key, [
				'id'            => 'elementor-tab-title-' . $tab_count,
				'class'         => ['elementor-tab-title'],
				'data-tab'      => $tab_count,
				'role'          => 'tab',
				'aria-controls' => 'elementor-tab-content-' . $tab_count,
				'aria-expanded' => 'false',
			] );
		?>
		    	<<?php Utils::print_validated_html_tag( $settings['title_html_tag'] );?><?php $this->print_render_attribute_string( $tab_title_setting_key );?>>
                <?php echo $settings['test-title'] ?>
				</<?php Utils::print_validated_html_tag( $settings['title_html_tag'] );?>>
<?php

	}

    // protected function content_template() {}
}