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

use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
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

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'test',
                    'label' => esc_html__( 'Anisur ', 'plugin-name' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .your-class',
                ]
            );

            $this->add_group_control(
                Group_Control_Image_Size::get_type(),
                [
                    'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                    'exclude' => [ 'custom' ],
                    'include' => [],
                    'default' => 'large',
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

            $slides_to = range( 1, 10 );
            $slides_to = array_combine( $slides_to, $slides_to );

		$this->add_responsive_control(
			'slides_to_show',
			[
				'label' => esc_html__( 'Slides to Show', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'elementor' ),
				] + $slides_to,
				'frontend_available' => true,
				'render_type' => 'template',
				'selectors' => [
					'{{WRAPPER}}' => '--e-image-carousel-slides-to-show: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'slides_to_scroll',
			[
				'label' => esc_html__( 'Slides to Scroll', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Default', 'elementor' ),
				] + $slides_to,
				'frontend_available' => true,
				'render_type' => 'template',
				'selectors' => [
					'{{WRAPPER}}' => '--e-image-carousel-slides-to-show: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
			'image_stretch',
			[
				'label' => esc_html__( 'Image Stretch', 'elementor' ),
				'type' => Controls_Manager::SELECT,
                'default' => '1',
				'options' => [
					'0' => esc_html__( 'No', 'elementor' ),
					'1' => esc_html__( 'Yes', 'elementor' ),
				] ,
				'selectors' => [
					'{{WRAPPER}}' => '--e-image-carousel-slides-to-show: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'link_to',
			[
				'label' => esc_html__( 'Link', 'plugin-name' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none'  => esc_html__( 'None', 'plugin-name' ),
					'media-file' => esc_html__( 'Media File', 'plugin-name' ),
					'custom-url' => esc_html__( 'Custom URL', 'plugin-name' ),
				],
			]
		);

        $this->add_control(
			'website_link',
			[
                'label' => esc_html__( 'Link', 'plugin-name' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
                'show_label' => false,
                'condition' => [
                    'link_to' => 'custom-url',
                ]
			]
		);

        $this->add_control(
			'caption_type',
			[
				'label' => esc_html__( 'Caption', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'None', 'elementor' ),
					'title' => esc_html__( 'Title', 'elementor' ),
					'caption' => esc_html__( 'Caption', 'elementor' ),
					'description' => esc_html__( 'Description', 'elementor' ),
				],
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

            $this->add_responsive_control(
                'content_align',
                [
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'label' => esc_html__( 'Alignment', 'plugin-name' ),
                    'options' => [
                        'left' => [
                            'title' => esc_html__( 'Left', 'plugin-name' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__( 'Center', 'plugin-name' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__( 'Right', 'plugin-name' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'devices' => [ 'desktop', 'tablet' ],
                    'prefix_class' => 'content-align-%s',
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
				Group_Control_Typography::get_type(),
				[
					'name'     => 'global_title_typo',
					'label'    => __( 'Global Title Typo', 'plugin-domain' ),
					'selector' => '{{WRAPPER}} article.material-card h2 .main_title',
                    'global' => [
                        'default' => Global_Typography::TYPOGRAPHY_ACCENT,
                    ]
				]
			);

			$this->end_controls_section();
            
            // General Typo Styles
			$this->start_controls_section(
				'image_section',
				[
					'label' => __( 'Image', 'plugin-name' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => esc_html__( 'Border', 'plugin-name' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .owl-item img',
                ]
            );


            $this->add_responsive_control(
                'image_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'elementor' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%' ],
                    'selectors' => [
                        '{{WRAPPER}} .owl-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
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
                <?php foreach ($settings['arm_logo_carousel_rp'] as $slide ): 
            $image_url = Group_Control_Image_Size::get_attachment_image_src( $slide['image'], 'thumbnail', $settings );
            // $image_url = 		$this->add_render_attribute( 'image', 'title', \Elementor\Control_Media::get_image_title( $settings['image'] ) );

            // echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );

            // $image_caption = $this->get_image_caption( $attachment );


            // var_dump($image_url);

                    ?>
                <div>
                    <img class="owl-lazy" data-src="<?php echo esc_url( $slide['image']['url'] ); ?>" alt="<?php esc_attr_e( $slide['image_title'] ); ?>" />
                    <div>
                        <?php echo $settings['caption_type']; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <?php
        }

        protected function content_template() {
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
                    <img class="owl-lazy" data-src="{{slide.image.url}}" alt="{{slide.image_title}}" />
                </div>
                <# }) #>                
            </div>
            <# } #>

           
            <?php
        }

    }