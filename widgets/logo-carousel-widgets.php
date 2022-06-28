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
	use Elementor\Core\Schemes\Typography;
	use Elementor\Group_Control_Typography;
	use Elementor\Repeater;
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
	class ARM_Logo_Carousel extends Widget_Base {

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
			return 'arm-logo-carousel';
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
			return esc_html__( 'Logo Carousel', 'elementor-list-widget' );
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
			return ['logo', 'carousel'];
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

			$repeater = new Repeater();

			$repeater->add_control(
				'image_title',
				[
					'label'   => esc_html__( 'Carousel Text', 'plugin-name' ),
					'type'    => Controls_Manager::TEXT,
					'default' => 'Item 1',
				]
			);

			$repeater->add_control(
				'image',
				[
					'label'   => esc_html__( 'Choose Image', 'plugin-name' ),
					'type'    => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'arm_logo_carousel_rp',
				[
					'label'       => esc_html__( 'Card Items', 'elementor-list-widget' ),
					'type'        => Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(), /* Use our repeater */
					'default' => [
						[
							'image'       => '',
							'image_title' => esc_html__( 'Item 1', 'elementor-list-widget' ),
						],
					],
					'title_field' => '{{{ image_title }}}',
				]
			);

			$this->add_control(
				'show_dots',
				[
					'label'        => esc_html__( 'Show dots', 'plugin-name' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Show', 'your-plugin' ),
					'label_off'    => esc_html__( 'Hide', 'your-plugin' ),
					'return_value' => true,
					'default'      => false,
				]
			);

            $this->add_control(
				'loop_infinite',
				[
					'label'        => esc_html__( 'Loop Infinite', 'plugin-name' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Yes', 'your-plugin' ),
					'label_off'    => esc_html__( 'No', 'your-plugin' ),
					'return_value' => true,
					'default'      => false,
				]
			);

			$this->add_control(
				'show_nav',
				[
					'label'        => esc_html__( 'Show nav', 'plugin-name' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_on'     => esc_html__( 'Show', 'your-plugin' ),
					'label_off'    => esc_html__( 'Hide', 'your-plugin' ),
					'return_value' => true,
					'default'      => false,
				]
			);

            $this->add_control(
                'margin',
                [
                    'label' => esc_html__( 'Margin', 'plugin-name' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 5,
                    'max' => 100,
                    'step' => 5,
                    'default' => 10,
                ]
            );

			$this->end_controls_section();

			// General Typo Styles
			$this->start_controls_section(
				'typography_section',
				[
					'label' => __( 'Typography', 'plugin-name' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typo',
					'label'    => __( 'Title', 'plugin-domain' ),
					'scheme'   => Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} article.material-card h2 .main_title',
				]
			);

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'border',
                    'label' => esc_html__( 'Border', 'plugin-name' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .your-class',
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
			$settings = $this->get_settings_for_display();
            
            $this->add_render_attribute(
                'arm_logo_carousel_options',
                [
                    'id' => 'logo-carousel-' . $this->get_id(),
                    'data-dots' => $settings['show_dots'],
                    'data-nav' => $settings['show_nav'],
                    'data-loop' => $settings['loop_infinite'],
                    'data-margin' => $settings['margin'],
                ]
            );
                
		    ?>
		   <!-- Set up your HTML -->
            <div class="owl-carousel owl-theme logo-carousel" <?php echo $this->get_render_attribute_string('arm_logo_carousel_options'); ?>>
                <?php foreach ($settings['arm_logo_carousel_rp'] as $slide ): ?>
                <div>
                    <img src="<?php echo esc_url( $slide['image']['url'] ); ?>" alt="<?php esc_attr_e( $slide['image_title'] ); ?>" />
                </div>
                <?php endforeach; ?>
            </div>

            <?php
        }

        protected function _content_template() {
            ?>
            <# 
                view.addRenderAttribute(
                    'arm_logo_carousel_options',
                    {
                        'id': 'logo-carousel-id',
                        'data-dots': settings.show_dots,
                        'data-nav': settings.show_nav,
                        'data-margin': settings.margin,
                        'data-loop': settings.loop_infinite,
                    }
                );
            #>

            <# if( settings.arm_logo_carousel_rp.length ) { #>
                <div class="owl-carousel owl-theme logo-carousel" {{{ view.getRenderAttributeString('arm_logo_carousel_options') }}} >
                    <# _.each(settings.arm_logo_carousel_rp, function(slide) { #>
                <div>
                    <img src="{{slide.image.url}}" alt="{{slide.image_title}}" />
                </div>
                <# }) #>                
            </div>
            <# } #>

           
            <?php
        }

    }