<?php

namespace ARM_Material_Cards\widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography; 
use Elementor\Utils;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;

class InfoBox extends Widget_Base {
	public function get_name() {
		return 'arm-info-box';
	}

	public function get_title() {
		return esc_html__( 'Info Box', 'ar-afe' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_keywords() {
		return [ 'info', 'blurb', 'box', 'text', 'content' ];
	}

	public function get_categories() {
		return [ 'arm' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'icon_image',
			[
				'label' => __( 'Image/ Icon', 'ar-afe' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'infobox_type', [
			'label'   => __( 'Infobox Type', 'ar-afe' ),
			'type'    => Controls_Manager::CHOOSE,
			'default' => 'image',
			'options' => [
				'none'  => [
					'title' => __( 'None', 'ar-afe' ),
					'icon'  => 'fa fa-ban',
				],
				'icon'  => [
					'title' => __( 'Icon', 'ar-afe' ),
					'icon'  => 'fa fa-info-circle',
				],
				'image' => [
					'title' => __( 'Image', 'ar-afe' ),
					'icon'  => 'fa fa-picture-o',
				],
			],
		] );

		$this->add_control( 'icon', [
			'label'     => __( 'Icon', 'ar-afe' ),
			'type'      => Controls_Manager::ICON,
			'default'   => 'fa fa-bell-o',
			'condition' => [
				'infobox_type' => 'icon',
			],
		] );

		$this->add_control( 'image', [
			'label'       => __( 'Image', 'ar-afe' ),
			'type'        => Controls_Manager::MEDIA,
			'default'     => [
				'url' => Utils::get_placeholder_image_src(),
			],
			'label_block' => true,
			'condition'   => [
				'infobox_type' => 'image',
			],
		] );

		$this->add_group_control( Group_Control_Image_Size::get_type(), [
			'name'      => 'thumbnail',
			'label'     => __( 'Image Size', 'ar-afe' ),
			'default'   => 'medium',
			'type'      => 'image',
			'condition' => [
				'infobox_type' => 'image',
			],
		] );

		$this->end_controls_section();

		//Content Section
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Title & Description', 'ar-afe' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'title', [
			'label'       => __( 'Title', 'ar-afe' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => __( 'Ever Info Box Title', 'ar-afe' ),
		] );

		$this->add_control( 'desc', [
			'label'       => __( 'Description', 'ar-afe' ),
			'type'        => Controls_Manager::TEXTAREA,
			'label_block' => true,
			'default'     => __( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'ar-afe' ),
		] );

		$this->add_control(
			'alignment',
			[
				'label'     => __( 'Alignment', 'ar-afe' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'ar-afe' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ar-afe' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'ar-afe' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'   => 'center',
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .ever-info-box-wrapper' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->add_control( 'title_tag', [
				'label'       => __( 'Title Tag', 'ar-afe' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => true,
				'default'     => __( 'h4', 'ar-afe' ),
				'toggle'      => false,
				'options'     => [
					'h1' => [
						'title' => __( 'H1', 'ar-afe' ),
						'icon'  => 'eicon-editor-h1',
					],
					'h2' => [
						'title' => __( 'H2', 'ar-afe' ),
						'icon'  => 'eicon-editor-h2',
					],
					'h3' => [
						'title' => __( 'H3', 'ar-afe' ),
						'icon'  => 'eicon-editor-h3',
					],
					'h4' => [
						'title' => __( 'H4', 'ar-afe' ),
						'icon'  => 'eicon-editor-h4',
					],
					'h5' => [
						'title' => __( 'H5', 'ar-afe' ),
						'icon'  => 'eicon-editor-h5',
					],
					'h6' => [
						'title' => __( 'H6', 'ar-afe' ),
						'icon'  => 'eicon-editor-h6',
					],
				],
			]
		);

		$this->end_controls_section();

		//Button Section
		$this->start_controls_section(
			'section_btn',
			[
				'label' => __( 'Button', 'ar-afe' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control( 'display_btn', [
			'label'        => __( 'Display Button?', 'ar-afe' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => __( 'Yes', 'ar-afe' ),
			'label_off'    => __( 'No', 'ar-afe' ),
			'return_value' => 'yes',
			'default'      => 'yes',
		] );

		$this->add_control( 'btn_text', [
			'label'       => __( 'Button Text', 'ar-afe' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => __( 'Read More', 'ar-afe' ),
			'condition'   => [
				'display_btn' => 'yes'
			],
		] );

		$this->add_control( 'btn_url', [
			'label'       => __( 'Button URL', 'ar-afe' ),
			'type'        => Controls_Manager::URL,
			'label_block' => true,
			'default'     => [
				'url'         => '',
				'is_external' => 'true',
			],
			'placeholder' => __( 'http://example.com', 'ar-afe' ),
			'condition'   => [
				'display_btn' => 'yes'
			],
		] );

		$this->add_control( 'btn_icon', [
			'label'     => __( 'Button Icon', 'ar-afe' ),
			'type'      => Controls_Manager::ICON,
			'condition' => [
				'display_btn' => 'yes'
			],
		] );

		$this->add_control( 'btn_icon_pos', [
			'label'     => __( 'Icon Posistion', 'ar-afe' ),
			'type'      => Controls_Manager::CHOOSE,
			'options'   => [
				'left'  => [
					'title' => __( 'Left', 'ar-afe' ),
					'icon'  => 'eicon-text-align-left',
				],
				'right' => [
					'title' => __( 'Right', 'ar-afe' ),
					'icon'  => 'eicon-text-align-right',
				],
			],
			'default'   => 'right',
			'condition' => [
				'display_btn' => 'yes'
			],
		] );

		$this->add_control( 'icon_space', [
			'label'      => __( 'Icon Spacing', 'ar-afe' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%' ],
			'range'      => [
				'px' => [
					'min' => 0,
					'max' => 100,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .ever_icon__position--right' => 'margin-left: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .ever_icon__position--left'  => 'margin-right: {{SIZE}}{{UNIT}};',
			],
			'default'    => [
				'unit' => 'px',
				'size' => 5,
			]
		] );

		$this->end_controls_section();

		//Start Style Section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Image/ Icon', 'ar-afe' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control( 'icon_size', [
			'label'      => __( 'Icon Size', 'ar-afe' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%' ],
			'default'    => [
				'unit' => 'px',
				'size' => '36',
			],
			'selectors'  => [
				'{{WRAPPER}} .ever-info-box__top_icon_wrappper' => 'font-size: {{SIZE}}{{UNIT}};',
			],
			'condition'  => [
				'infobox_type' => 'icon',
			],
		] );

		$this->add_responsive_control( 'margin', [
			'label'      => __( 'Margin', 'ar-afe' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .ever-info-box__top' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'img_width', [
			'label'      => __( 'Width', 'ar-afe' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%' ],
			'range'      => [
				'px' => [
					'min' => 0,
					'max' => 1000,
				],
				'%'  => [
					'min' => 0,
					'max' => 100,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .ever-infobox-figure' => 'width: {{SIZE}}{{UNIT}};',
			],
			'condition'  => [
				'infobox_type' => 'image',
			],
		] );

		$this->add_responsive_control( 'img_height', [
			'label'      => __( 'Height', 'ar-afe' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => [ 'px', '%' ],
			'range'      => [
				'px' => [
					'min' => 0,
					'max' => 1000,
				],
				'%'  => [
					'min' => 0,
					'max' => 100,
				],
			],
			'selectors'  => [
				'{{WRAPPER}} .ever-infobox-figure' => 'height: {{SIZE}}{{UNIT}};',
			],
			'condition'  => [
				'infobox_type' => 'image',
			],
		] );


		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'normal_style_tab',
			[
				'label' => __( 'Normal', 'ar-afe' ),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Icon Color', 'ar-afe' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__top_icon_wrappper .icon-color' => 'color: {{VALUE}}',
				],
				'condition' => [
					'infobox_type' => 'icon',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'background',
				'label'    => __( 'Background', 'ar-afe' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ever-info-box__top',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'hover_style_tab',
			[
				'label' => __( 'Hover', 'ar-afe' ),
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label'     => __( 'Icon Color', 'ar-afe' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__top_icon_wrappper .icon-color:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'infobox_type' => 'icon',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'background-hover',
				'label'    => __( 'Background', 'ar-afe' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .arm-infobox-wrapper:hover',
			]
		);

		$this->add_responsive_control( 'icon_border_width_hover', [
				'label'      => __( 'Border Width', 'ar-afe' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ever-info-box__top_icon_wrappper:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_border_style_hover',
			[
				'label'     => __( 'Border Style', 'ar-afe' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'none'   => __( 'None', 'ar-afe' ),
					'solid'  => __( 'Solid', 'ar-afe' ),
					'double' => __( 'Double', 'ar-afe' ),
					'dotted' => __( 'Dotted', 'ar-afe' ),
					'groove' => __( 'Groove', 'ar-afe' ),
				],
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__top_icon_wrappper:hover' => 'border-style: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'border_color_hover',
			[
				'label'     => __( 'Border Color', 'ar-afe' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__top_icon_wrappper:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control( 'icon_border_radius_hover', [
				'label'      => __( 'Border Radius', 'ar-afe' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .ever-info-box__top_icon_wrappper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			] );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box-shadow_hover',
				'label'    => __( 'Box Shadow', 'ar-afe' ),
				'selector' => '{{WRAPPER}} .ever-info-box__top_icon_wrappper:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		//Title & description section
		$this->start_controls_section(
			'title_section',
			[
				'label' => esc_html__( 'Title & Description', 'ar-afe' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control( 'title_heading', [
			'type'  => Controls_Manager::HEADING,
			'label' => __( 'Title', 'ar-afe' ),
		] );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => __( 'title_typography', 'ar-afe' ),
				'label'    => __( 'Title Typography', 'ar-afe' ),
				'selector' => '{{WRAPPER}} .ever-info-box__bottom .ever_addons__title',
			]
		);

		$this->add_responsive_control( 'title_margin', [
			'label'      => __( 'Margin', 'ar-afe' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .ever-info-box__bottom .ever_addons_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_control( 'title_color', [
			'label'     => __( 'Color', 'ar-afe' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#244573',
			'selectors' => [
				'{{WRAPPER}} .ever-info-box__title' => 'color: {{VALUE}};'
			]
		] );

		$this->add_control( 'desc_heading', [
			'type'      => Controls_Manager::HEADING,
			'label'     => __( 'Description', 'ar-afe' ),
			'separator' => 'before',
		] );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'desc_typography',
				'label'    => __( 'Description Typography', 'ar-afe' ), 
				'selector' => '{{WRAPPER}} .ever-info-box__bottom .ever-infobox__desc',
			]
		);

		$this->add_responsive_control( 'desc_margin', [
			'label'      => __( 'Margin', 'ar-afe' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .ever-info-box__bottom .ever-infobox__desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_control( 'desc_color', [
			'label'     => __( 'Color', 'ar-afe' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#6B7586',
			'selectors' => [
				'{{WRAPPER}} .ever-infobox__desc' => 'color: {{VALUE}};'
			]
		] );

		$this->end_controls_section();

		//Button Section
		$this->start_controls_section(
			'btn_section',
			[
				'label' => esc_html__( 'Button', 'ar-afe' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control( 'btn_margin', [
			'label'      => __( 'Margin', 'ar-afe' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .ever-info-box__btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_responsive_control( 'btn_padding', [
			'label'      => __( 'Padding', 'ar-afe' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .ever-info-box__btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'btn_typography',
				'label'    => __( 'Typography', 'ar-afe' ), 
				'selector' => '{{WRAPPER}} .ever-info-box__btn',
			]
		);

		$this->start_controls_tabs(
			'btn_style_tabs'
		);

		$this->start_controls_tab(
			'btn_style_normal_tab',
			[
				'label' => __( 'Normal', 'ar-afe' ),
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label'     => __( 'Color', 'ar-afe' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__btn' => 'color: {{VALUE}}',
				],
				'default'   => '#FF5D8B',
			]
		);


		$this->add_control(
			'btn_bg_color',
			[
				'label'     => __( 'Background Color', 'ar-afe' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'btn_style_hover_tab',
			[
				'label' => __( 'Hover', 'ar-afe' ),
			]
		);

		$this->add_control(
			'btn_hover_color',
			[
				'label'     => __( 'Color', 'ar-afe' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__btn:hover ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_bg_hover_color',
			[
				'label'     => __( 'Background Color', 'ar-afe' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__btn:hover' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control( 'btn_hover_border_radius', [
			'label'      => __( 'Border Radius', 'ar-afe' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .ever-info-box__btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			]
		] );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'btn_hover_box_shadow',
				'label'    => __( 'Box Shadow', 'ar-afe' ),
				'selector' => '{{WRAPPER}} .ever-info-box__btn:hover',
			]
		);

		$this->add_control( 'btn_hover_icon_translate', [
			'type'      => Controls_Manager::SLIDER,
			'range'     => [
				'px' => [
					'min' => - 100,
					'max' => 100,
				]
			],
			'label'     => __( 'Icon Translate X', 'ar-afe' ),
			'selectors' => [
				'{{WRAPPER}} .ever-info-box__btn:hover i' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));'
			],
		] );

		$this->end_controls_tab();

		$this->add_responsive_control( 'btn_border_radius', [
			'label'      => __( 'Border Radius', 'ar-afe' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => [ 'px', '%', 'em' ],
			'selectors'  => [
				'{{WRAPPER}} .ever-info-box__btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		] );

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'btn_box_shadow',
				'label'    => __( 'Box Shadow', 'ar-afe' ),
				'selector' => '{{WRAPPER}} .ever-info-box__btn',
			]
		);

		$this->add_control( 'btn_icon_translate', [
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => - 100,
						'max' => 100,
					]
				],
				'label'     => __( 'Icon Translate X', 'ar-afe' ),
				'selectors' => [
					'{{WRAPPER}} .ever-info-box__btn i' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));'
				],
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		$this->add_inline_editing_attributes( 'button', 'none' );

		$this->add_render_attribute( 'button', 'class', 'ever-info-box__btn arm-btn' );
		$this->add_render_attribute( 'button', 'class', 'left' == $settings['btn_icon_pos'] ? 'left' : 'right' );
		$this->add_render_attribute( 'button', 'href', ! empty( $settings['btn_url']['url'] ) ? esc_url( $settings['btn_url']['url'] ) : 'javascript:void(0)' );
		if ( ! empty( $settings['btn_url']['is_external'] ) ) {
			$this->add_render_attribute( 'button', 'target', '_blank' );
		}
		if ( ! empty( $settings['btn_url']['nofollow'] ) ) {
			$this->add_render_attribute( 'button', 'rel', 'nofollow' );
		}

		?>

		<div class="ever-info-box-wrapper arm-wrapper">

			<div class="ever-info-box__top">

				<?php if ( $settings['infobox_type'] === 'image' ) { ?>
					<figure class="ever-infobox-figure">
						<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
					</figure>
				<?php } else { ?>
					<div class="ever-info-box__top_icon_wrappper">
						<i class="icon-color <?php echo $settings['icon'] ?>"></i>
					</div>
				<?php } ?>

			</div>

			<div class="ever-info-box__bottom">

				<?php
				if ( $settings['title'] ) {
					printf( '<%1$s class="ever-info-box__title arm-title">%2$s</%1$s>', tag_escape( $settings['title_tag'] ), esc_html( $settings['title'] ) );
				}
				?>

				<p class="ever-infobox__desc"> <?php echo esc_html( $settings['desc'] ); ?> </p>

				<?php if ( ( 'yes' == $settings['display_btn'] ) && ( ! empty( $settings['btn_text'] ) ) ) {
					printf( 'left' == $settings['btn_icon_pos'] ? '<a %1$s>%2$s %3$s</a>' : '<a %1$s>%3$s %2$s</a>',
						$this->get_render_attribute_string( 'button' ),
						sprintf( '<i class="ever-btn-icon ever_icon__position--%s %s"></i>', $settings['btn_icon_pos'], $settings['btn_icon'] ),
						sprintf( '<span>%s</span>', $settings['btn_text'] )
					);
				} ?>
			</div>
		</div>
		<?php
	}
}
