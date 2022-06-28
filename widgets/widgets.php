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
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class ARM_Material_Card_Widget extends Widget_Base {

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
		return 'arm-material-cards';
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
		return esc_html__( 'Material Cards', 'elementor-list-widget' );
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
		return [ 'basic' ];
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
		return [ 'cards', 'material' ];
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
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */

        $this->add_control(
			'arm_card_bars',
			[
				'label' => esc_html__( 'Bars Icon', 'elementor-list-widget' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
                    'value' => 'fa fa-bars',
                    'library' => 'solid',
                ]
			]
		);

        $this->add_control(
			'arm_card_closed',
			[
				'label' => esc_html__( 'Close Icon', 'elementor-list-widget' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
                'default' => [
                    'value' => 'fa fa-times',
                    'library' => 'solid',
                ]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'arm_card_title',
			[
				'label' => esc_html__( 'Title', 'elementor-list-widget' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Card Title', 'elementor-list-widget' ),
				'default' => esc_html__( 'Anisur Rahman', 'elementor-list-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $repeater->add_control(
			'arm_card_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'elementor-list-widget' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Card Subtitle', 'elementor-list-widget' ),
				'default' => esc_html__( 'CEO', 'elementor-list-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $repeater->add_control(
			'arm_card_content',
			[
				'label' => esc_html__( 'Content', 'elementor-list-widget' ),
				'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
				'placeholder' => esc_html__( 'Card Content', 'elementor-list-widget' ),
				'default' => esc_html__( 'As described in Getting Started, the main PHP file should include header comment what tells WordPress that a file is a plugin and provides information about the plugin.', 'elementor-list-widget' ),
				'label_block' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

        $repeater->add_control(
			'arm_card_image',
			[
				'label' => esc_html__( 'Add Images', 'plugin-name' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'follow_us_text',
			[
				'label' => esc_html__( 'Follow Us', 'plugin-name' ),
				'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Follow Us', 'elementor-list-widget'),
			]
		);

        $repeater->add_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Title Background Color', 'plugin-name' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .arm-material-title' => 'background: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} .mc-footer a' => 'background: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} .mc-footer' => 'background: #ffcdd2',
					'{{WRAPPER}} {{CURRENT_ITEM}} .mc-btn-action' => 'background: {{VALUE}}',
					'{{WRAPPER}} {{CURRENT_ITEM}} .material-card.Red h2:after' => 'border-top-color: #ff0',
					'{{WRAPPER}} {{CURRENT_ITEM}} .material-card.Red h2:after' => 'border-right-color: {{VALUE}}',
				],
			]
		);
        

        $repeater->add_control(
			'arm_material_card_fb_url',
			[
				'label' => esc_html__( 'Facebook URL', 'elementor-list-widget' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://facebook.com/anisuroo7', 'elementor-list-widget' ),
				'show_external' => true,
				'default' => [
					'url' => 'https://twitter.com',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

        $repeater->add_control(
			'arm_material_card_tt_url',
			[
				'label' => esc_html__( 'Twitter URL', 'elementor-list-widget' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://twitter.com/anisuroo7', 'elementor-list-widget' ),
				'show_external' => true,
				'default' => [
					'url' => 'https://twitter.com',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

        $repeater->add_control(
			'arm_material_card_li_url',
			[
				'label' => esc_html__( 'LinkedIn URL', 'elementor-list-widget' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://linkedin.com/me.anisuroo7', 'elementor-list-widget' ),
				'show_external' => true,
				'default' => [
					'url' => 'https://twitter.com',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

        $repeater->add_control(
			'arm_material_card_ig_url',
			[
				'label' => esc_html__( 'Instagram URL', 'elementor-list-widget' ),
				'type' => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://instagram.com/anisur8294', 'elementor-list-widget' ),
				'show_external' => true,
				'default' => [
					'url' => 'https://twitter.com',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		/* End repeater */

		$this->add_control(
			'arm_material_cards',
			[
				'label' => esc_html__( 'Card Items', 'elementor-list-widget' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),           /* Use our repeater */
				'default' => [
					[
						'arm_card_title' => esc_html__( 'Card Item - #1', 'elementor-list-widget' ),
						'arm_card_subtitle' => 'CEO',
						'arm_card_content' => 'So, what are you waiting for? Don’t waste time! Get on board and learn to truly master Object-oriented PHP!',
					],
					[
						'arm_card_title' => esc_html__( 'Card Item - #2', 'elementor-list-widget' ),
						'arm_card_subtitle' => 'CTO',
						'arm_card_content' => 'So, what are you waiting for? Don’t waste time! Get on board and learn to truly master Object-oriented PHP!',
					],
				],
				'title_field' => '{{{ arm_card_title }}}',
			]
		);

		$this->end_controls_section();

        // General Typo Styles
		$this->start_controls_section(
			'typography_section',
			[
				'label' => __( 'Typography', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Title', 'plugin-domain' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} article.material-card h2 .main_title',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typo',
				'label' => __( 'Subtitle', 'plugin-domain' ),
				'scheme' => Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .material-card h2 .main_subtitle',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typo',
				'label' => __( 'Content', 'plugin-domain' ),
				'scheme' => Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .material-card .mc-description',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'follow_text_typo',
				'label' => __( 'Follow', 'plugin-domain' ),
				'scheme' => Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .mc-footer h4',
			]
		);
        
        $this->end_controls_section();

        // Social Icon Styles
        $this->start_controls_section(
			'socials_section',
			[
				'label' => __( 'Social Icons', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'size',
			[
				'type' => Controls_Manager::NUMBER,
				'label' => esc_html__( 'Icon Font Size', 'plugin-name' ),
				'placeholder' => '20',
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .material-card .mc-footer a' => 'font-size: {{VALUE}}px',
                ]
			]
		);

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_background',
				'label' => esc_html__( 'Icon Background', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .material-card .mc-footer a',
			]
            );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_color',
				'label' => esc_html__( 'Icon Color', 'plugin-name' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .material-card .mc-footer a',
			]
		);

        $this->add_control(
			'icon_width',
			[
				'label' => esc_html__( 'Icon Box Width', 'plugin-name' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .material-card .mc-footer a' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'icon_height',
			[
				'label' => esc_html__( 'Icon Box Height', 'plugin-name' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .material-card .mc-footer a' => 'height: {{SIZE}}{{UNIT}};',
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
        if( $settings['arm_material_cards']) :
		?>
		    <div class="row active-with-click">
                <?php foreach( $settings['arm_material_cards'] as $card_item ) : ?>
                <div class="col-md-4 col-sm-6 col-xs-12 elementor-repeater-item-<?php echo $card_item['_id']; ?>">
                    <article class="material-card">
                        <h2 class="arm-material-title">
                            <span class="main_title"><?php echo $card_item['arm_card_title'] ?></span>
                            <strong class="main_subtitle">
                                <i class="fa fa-fw fa-star"></i>
                                <?php echo $card_item['arm_card_subtitle'] ?>
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="<?php echo $card_item['arm_card_image']['url'] ?>">
                            </div>
                            <div class="mc-description">
                            <?php echo $card_item['arm_card_content'] ?>
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                <?php echo $settings['follow_us_text']; ?>
                            </h4>
                            <?php 
                                $fb_url = $card_item['arm_material_card_fb_url']['url'];
                                $fb_is_external = $card_item['arm_material_card_fb_url']['is_external'] ? '_blank' : '';
                                $tt_url = $card_item['arm_material_card_tt_url']['url'];
                                $tt_is_external = $card_item['arm_material_card_tt_url']['is_external'] ? '_blank' : '';
                                $ig_url = $card_item['arm_material_card_ig_url']['url'];
                                $ig_is_external = $card_item['arm_material_card_ig_url']['is_external'] ? '_blank' : '';
                                $li_url = $card_item['arm_material_card_li_url']['url'];
                                $li_is_external = $card_item['arm_material_card_li_url']['is_external'] ? '_blank' : '';
                            ?>
                            <a href="<?php echo $fb_url; ?>" class="text-center" target="<?php echo $fb_is_external; ?>"> 
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="<?php echo $tt_url; ?>" class="text-center" target="<?php echo $tt_is_external; ?>"> 
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="<?php echo $li_url; ?>" class="text-center" target="<?php echo $li_is_external; ?>"> 
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="<?php echo $ig_url; ?>" class="text-center" target="<?php echo $ig_is_external; ?>">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
		<?php
        endif;

        ?>
        <script>
            jQuery(function() {
                jQuery('.material-card').materialCard({
                    icon_close: '<?php echo $settings['arm_card_closed']['value'] ?>',
                    icon_open: '<?php echo $settings['arm_card_bars']['value'] ?>',
                    icon_spin: 'fa-spin-fast',
                    card_activator: 'click'
                });

                window.setTimeout(function() {
                    jQuery('.material-card:eq(1)').materialCard('open');
                }, 2000);

                jQuery('.material-card').on('shown.material-card show.material-card hide.material-card hidden.material-card', function (event) {
                    console.log(event.type, event.namespace, jQuery(this));
                });

            });
        </script>
        <?php
	}
}