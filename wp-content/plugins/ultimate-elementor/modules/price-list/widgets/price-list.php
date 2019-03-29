<?php
/**
 * UAEL Price List.
 *
 * @package UAEL
 */

namespace UltimateElementor\Modules\PriceList\Widgets;


// Elementor Classes.
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

// UltimateElementor Classes.
use UltimateElementor\Base\Common_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit;   // Exit if accessed directly.
}

if ( ! class_exists( 'Price_List' ) ) {

	/**
	 * Class UAEL_Price_List.
	 */
	class Price_List extends Common_Widget {

		/**
		 * Retrieve Price List name.
		 *
		 * @since 0.0.1
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return parent::get_widget_slug( 'Price_List' );
		}

		/**
		 * Retrieve Price List title.
		 *
		 * @since 0.0.1
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return parent::get_widget_title( 'Price_List' );
		}

		/**
		 * Retrieve Price List icon.
		 *
		 * @since 0.0.1
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return parent::get_widget_icon( 'Price_List' );
		}

		/**
		 * Retrieve Widget Keywords.
		 *
		 * @since 1.5.1
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_keywords() {
			return parent::get_widget_keywords( 'Price_List' );
		}

		/**
		 * Register Price List controls.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
		protected function _register_controls() {

			// Content Tab.
			$this->render_list_item_control();
			$this->render_structure_control();

			// Style Tab.
			$this->render_item_style_control();
			$this->render_list_style_control();
			$this->render_image_style_control();
			$this->register_helpful_information();
		}

		/**
		 * Register Price List controls.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
		protected function render_list_item_control() {

			$this->start_controls_section(
				'section_list',
				[
					'label' => __( 'Price List Items', 'uael' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
				]
			);

				$this->add_control(
					'price_list',
					[
						'type'        => Controls_Manager::REPEATER,
						'fields'      => [
							[
								'name'        => 'title',
								'label'       => __( 'Title', 'uael' ),
								'type'        => Controls_Manager::TEXT,
								'dynamic'     => [
									'active' => true,
								],
								'default'     => '',
								'label_block' => true,
							],
							[
								'name'    => 'item_description',
								'label'   => __( 'Description', 'uael' ),
								'type'    => Controls_Manager::TEXTAREA,
								'default' => '',
								'dynamic' => [
									'active' => true,
								],
							],
							[
								'name'    => 'price',
								'label'   => __( 'Price', 'uael' ),
								'type'    => Controls_Manager::TEXT,
								'default' => '',
								'dynamic' => [
									'active' => true,
								],
							],
							[
								'name'         => 'has_discount',
								'label'        => __( 'Offering Discount?', 'uael' ),
								'type'         => Controls_Manager::SWITCHER,
								'default'      => 'no',
								'label_on'     => __( 'Yes', 'uael' ),
								'label_off'    => __( 'No', 'uael' ),
								'return_value' => 'yes',
							],
							[
								'name'      => 'original_price',
								'label'     => __( 'Original Price', 'uael' ),
								'type'      => Controls_Manager::TEXT,
								'default'   => '$100',
								'dynamic'   => [
									'active' => true,
								],
								'condition' => [
									'has_discount' => 'yes',
								],
							],
							[
								'name'    => 'image',
								'label'   => __( 'Image', 'uael' ),
								'type'    => Controls_Manager::MEDIA,
								'default' => [
									'url' => Utils::get_placeholder_image_src(),
								],
								'dynamic' => [
									'active' => true,
								],
							],
							[
								'name'    => 'link',
								'label'   => __( 'Link', 'uael' ),
								'type'    => Controls_Manager::URL,
								'default' => [ 'url' => '#' ],
								'dynamic' => [
									'active' => true,
								],
							],
						],
						'default'     => [
							[
								'title'            => __( 'First Item', 'uael' ),
								'item_description' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'uael' ),
								'price'            => '$20',
								'link'             => [ 'url' => '#' ],
							],
							[
								'title'            => __( 'Second Item', 'uael' ),
								'item_description' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'uael' ),
								'price'            => '$9',
								'link'             => [ 'url' => '#' ],
							],
							[
								'title'            => __( 'Third Item', 'uael' ),
								'item_description' => __( 'I am item content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'uael' ),
								'price'            => '$32',
								'link'             => [ 'url' => '#' ],
							],
						],
						'title_field' => '{{{ title }}}',
					]
				);
			$this->end_controls_section();
		}

		/**
		 * Register Price List controls.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
		protected function render_structure_control() {

			$this->start_controls_section(
				'section_structure_field',
				[
					'label' => __( 'Layout', 'uael' ),
				]
			);

				$this->add_control(
					'image_position',
					[
						'label'   => __( 'Image Position', 'uael' ),
						'type'    => Controls_Manager::SELECT,
						'options' => [
							'above' => __( 'Top', 'uael' ),
							'left'  => __( 'Left', 'uael' ),
							'right' => __( 'Right', 'uael' ),
						],
						'default' => 'left',
					]
				);

				$this->add_control(
					'price_position',
					[
						'label'     => __( 'Price Position', 'uael' ),
						'type'      => Controls_Manager::SELECT,
						'options'   => [
							'below' => __( 'Below Heading & Description', 'uael' ),
							'right' => __( 'Right of Heading', 'uael' ),
						],
						'default'   => 'right',
						'condition' => [
							'image_position' => [ 'left', 'right' ],
						],
					]
				);

				$this->add_control(
					'connector_style',
					[
						'label'       => __( 'Title Price Connector Style', 'uael' ),
						'type'        => Controls_Manager::SELECT,
						'options'     => [
							'solid'  => __( 'Solid', 'uael' ),
							'dotted' => __( 'Dotted', 'uael' ),
							'dashed' => __( 'Dashed', 'uael' ),
							'double' => __( 'Double', 'uael' ),
							'none'   => __( 'None', 'uael' ),
						],
						'default'     => 'dotted',
						'selectors'   => [
							'{{WRAPPER}} .uael-price-list-separator' => 'border-bottom-style: {{VALUE}};',
						],
						'condition'   => [
							'image_position' => [ 'left', 'right' ],
							'price_position' => 'right',
						],
						'label_block' => true,
					]
				);

				$this->add_responsive_control(
					'pricelist_overall_align',
					[
						'label'        => __( 'Overall Alignment', 'uael' ),
						'type'         => Controls_Manager::CHOOSE,
						'options'      => [
							'left'   => [
								'title' => __( 'Left', 'uael' ),
								'icon'  => 'fa fa-align-left',
							],
							'center' => [
								'title' => __( 'Center', 'uael' ),
								'icon'  => 'fa fa-align-center',
							],
							'right'  => [
								'title' => __( 'Right', 'uael' ),
								'icon'  => 'fa fa-align-right',
							],
						],
						'prefix_class' => 'uael-align-price-list%s-',
					]
				);

				$this->add_control(
					'vertical_align',
					[

						'label'                => __( 'Vertical Alignment', 'uael' ),
						'type'                 => Controls_Manager::CHOOSE,
						'options'              => [
							'top'    => [
								'title' => __( 'Top', 'uael' ),
								'icon'  => 'fa fa-long-arrow-up',
							],
							'center' => [
								'title' => __( 'Center', 'uael' ),
								'icon'  => 'fa fa-arrows-v',
							],
							'bottom' => [
								'title' => __( 'Bottom', 'uael' ),
								'icon'  => 'fa fa-long-arrow-down',
							],
						],
						'selectors'            => [
							'{{WRAPPER}} .uael-price-list-item' => 'align-items: {{VALUE}};',
						],
						'condition'            => [
							'image_position' => [ 'left', 'right' ],
						],
						'selectors_dictionary' => [
							'top'    => 'flex-start',
							'bottom' => 'flex-end',
						],
						'default'              => 'center',
					]
				);

				$this->add_control(
					'pricelist_min_height',
					[
						'label'        => __( 'Minimum Height', 'uael' ),
						'type'         => Controls_Manager::SWITCHER,
						'label_on'     => __( 'Yes', 'uael' ),
						'label_off'    => __( 'No', 'uael' ),
						'return_value' => 'yes',
						'default'      => '',
						'selectors'    => [
							'{{WRAPPER}}' => '',
						],
					]
				);

				$this->add_responsive_control(
					'pricelist_height',
					[
						'label'      => __( 'Enter Height', 'uael' ),
						'type'       => Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range'      => [
							'px' => [
								'min' => 1,
								'max' => 2000,
							],
						],
						'condition'  => [
							'pricelist_min_height' => 'yes',
						],
						'selectors'  => [
							'{{WRAPPER}} .uael-price-list-item' => 'min-height: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'stack_on',
					[
						'label'        => __( 'Stack on', 'uael' ),
						'description'  => __( 'Choose on what breakpoint where the list will stack.', 'uael' ),
						'type'         => Controls_Manager::SELECT,
						'default'      => 'mobile',
						'options'      => [
							''       => __( 'None', 'uael' ),
							'tablet' => __( 'Tablet (1023px >)', 'uael' ),
							'mobile' => __( 'Mobile (767px >)', 'uael' ),
						],
						'prefix_class' => 'uael-pricelist-stack-',
					]
				);

			$this->end_controls_section();
		}

		/**
		 * Register Price List controls.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
		protected function render_list_style_control() {

			$this->start_controls_section(
				'section_list_style',
				[
					'label' => __( 'Content Area', 'uael' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);

				$this->add_control(
					'heading__title',
					[
						'label' => __( 'Title', 'uael' ),
						'type'  => Controls_Manager::HEADING,
					]
				);

				$this->add_control(
					'heading_color',
					[
						'label'     => __( 'Color', 'uael' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_1,
						],
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-title' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'heading_hover_color',
					[
						'label'     => __( 'Hover Color', 'uael' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-item:hover .uael-price-list-title' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name'     => 'heading_typography',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
						'selector' => '{{WRAPPER}} .uael-price-list-title',
					]
				);

				$this->add_responsive_control(
					'pricelist_title_margin',
					[
						'label'      => __( 'Title Margin', 'uael' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px' ],
						'default'    => [
							'top'    => '10',
							'bottom' => '10',
							'left'   => '10',
							'right'  => '10',
							'unit'   => 'px',
						],
						'selectors'  => [
							'{{WRAPPER}} .uael-price-list-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'heading_item_description',
					[
						'label'     => __( 'Description', 'uael' ),
						'type'      => Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);

				$this->add_control(
					'description_color',
					[
						'label'     => __( 'Color', 'uael' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_3,
						],
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-description' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'description_hover_color',
					[
						'label'     => __( 'Hover Color', 'uael' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-item:hover .uael-price-list-description' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name'     => 'description_typography',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_3,
						'selector' => '{{WRAPPER}} .uael-price-list-description',
					]
				);

				$this->add_responsive_control(
					'pricelist_desc_margin',
					[
						'label'      => __( 'Description Margin', 'uael' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px' ],
						'default'    => [
							'top'    => '10',
							'bottom' => '10',
							'left'   => '10',
							'right'  => '10',
							'unit'   => 'px',
						],
						'selectors'  => [
							'{{WRAPPER}} .uael-price-list-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'heading_item_price',
					[
						'label'     => __( 'Price', 'uael' ),
						'type'      => Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);

				$this->add_control(
					'price_color',
					[
						'label'     => __( 'Color', 'uael' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_1,
						],
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-price' => 'color: {{VALUE}};',
							'{{WRAPPER}} .uael-price-list-discount-price' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_control(
					'price_hover_color',
					[
						'label'     => __( 'Hover Color', 'uael' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-item:hover .uael-price-list-price' => 'color: {{VALUE}};',
							'{{WRAPPER}} .uael-price-list-item:hover .uael-price-list-discount-price' => 'color: {{VALUE}};',
						],
					]
				);

				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name'     => 'price_typography',
						'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
						'selector' => '{{WRAPPER}} .uael-price-list-price, {{WRAPPER}} .uael-price-list-discount-price',
					]
				);

				$this->add_responsive_control(
					'pricelist_price_margin',
					[
						'label'      => __( 'Price Margin', 'uael' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px' ],
						'default'    => [
							'top'    => '10',
							'bottom' => '10',
							'left'   => '10',
							'right'  => '10',
							'unit'   => 'px',
						],
						'selectors'  => [
							'{{WRAPPER}} .uael-price-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'title_price_connector',
					[
						'label'     => __( 'Title Price Connector', 'uael' ),
						'type'      => Controls_Manager::HEADING,
						'separator' => 'before',
						'condition' => [
							'image_position' => [ 'left', 'right' ],
							'price_position' => 'right',
						],
					]
				);

				$this->add_control(
					'connector_weight',
					[
						'label'     => __( 'Thickness', 'uael' ),
						'type'      => Controls_Manager::SLIDER,
						'range'     => [
							'px' => [
								'max' => 10,
							],
						],
						'condition' => [
							'connector_style!' => 'none',
							'image_position'   => [ 'left', 'right' ],
							'price_position'   => 'right',
						],
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-separator' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
						],
						'default'   => [
							'size' => 2,
						],
					]
				);

				$this->add_control(
					'connector_color',
					[
						'label'     => __( 'Color', 'uael' ),
						'type'      => Controls_Manager::COLOR,
						'scheme'    => [
							'type'  => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_2,
						],
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-separator' => 'border-bottom-color: {{VALUE}};',
						],
						'condition' => [
							'connector_style!' => 'none',
							'image_position'   => [ 'left', 'right' ],
							'price_position'   => 'right',
						],
					]
				);

				$this->add_control(
					'connector_hover_color',
					[
						'label'     => __( 'Hover Color', 'uael' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .uael-price-list-item:hover .uael-price-list-separator' => 'border-bottom-color: {{VALUE}};',
						],
						'condition' => [
							'connector_style!' => 'none',
							'image_position'   => [ 'left', 'right' ],
							'price_position'   => 'right',
						],
					]
				);

			$this->end_controls_section();
		}

		/**
		 * Register Price List controls.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
		protected function render_image_style_control() {

			$this->start_controls_section(
				'section_image_style',
				[
					'label' => __( 'Image Area', 'uael' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				]
			);

				$this->add_group_control(
					Group_Control_Image_Size::get_type(),
					[
						'name'    => 'image_size',
						'default' => 'thumbnail',
					]
				);

				$this->add_responsive_control(
					'image_width',
					[
						'label'      => __( 'Width', 'uael' ),
						'type'       => Controls_Manager::SLIDER,
						'range'      => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
							'%'  => [
								'min' => 0,
								'max' => 100,
							],
						],
						'size_units' => [ 'px', '%' ],
						'selectors'  => [
							'{{WRAPPER}} .uael-price-list-image' => 'width: {{SIZE}}{{UNIT}}; min-width:{{SIZE}}{{UNIT}}',
						],
						'default'    => [
							'size' => 150,
						],
					]
				);

				$this->add_control(
					'border_radius',
					[
						'label'      => __( 'Border Radius', 'uael' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'selectors'  => [
							'{{WRAPPER}} .uael-price-list-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

			$this->end_controls_section();
		}

		/**
		 * Register Price List controls.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
		protected function render_item_style_control() {

			$this->start_controls_section(
				'section_item_style',
				[
					'label'      => __( 'General', 'uael' ),
					'tab'        => Controls_Manager::TAB_STYLE,
					'show_label' => false,
				]
			);

				$this->add_responsive_control(
					'row_gap',
					[
						'label'      => __( 'Spacing Between Price Items', 'uael' ),
						'type'       => Controls_Manager::SLIDER,
						'range'      => [
							'px' => [
								'max' => 100,
							],
							'em' => [
								'max'  => 5,
								'step' => 0.1,
							],
						],
						'size_units' => [ 'px', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .uael-price-list-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
						],
						'default'    => [
							'size' => 20,
						],
					]
				);

				$this->add_responsive_control(
					'pricelist_image_gap',
					[
						'label'      => __( 'Spacing Between Image & Content', 'uael' ),
						'type'       => Controls_Manager::SLIDER,
						'range'      => [
							'px' => [
								'min' => 0,
								'max' => 500,
							],
							'%'  => [
								'min' => 0,
								'max' => 100,
							],
						],
						'size_units' => [ 'px', '%' ],
						'selectors'  => [
							'(desktop){{WRAPPER}} .uael-price-list-left .uael-price-list-image' => 'margin-right: {{SIZE}}{{UNIT}};',
							'(desktop){{WRAPPER}} .uael-price-list-right .uael-price-list-image' => 'margin-left: {{SIZE}}{{UNIT}};',
							'(desktop){{WRAPPER}} .uael-price-list-above .uael-price-list-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
							'(tablet){{WRAPPER}} .uael-price-list-left .uael-price-list-image' => 'margin-right: {{SIZE}}{{UNIT}};',
							'(tablet){{WRAPPER}} .uael-price-list-right .uael-price-list-image' => 'margin-left: {{SIZE}}{{UNIT}};',
							'(tablet){{WRAPPER}} .uael-price-list-above .uael-price-list-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
						],
						'default'    => [
							'size' => 0,
							'unit' => 'px',
						],
					]
				);

				$this->add_responsive_control(
					'list_padding',
					[
						'label'      => __( 'Padding', 'uael' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors'  => [
							'{{WRAPPER}} .uael-price-list-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);

				$this->start_controls_tabs( 'infobox_tabs_icon_style' );

					$this->start_controls_tab(
						'normal',
						[
							'label' => __( 'Normal', 'uael' ),
						]
					);

						$this->add_control(
							'bg_color',
							[
								'label'     => __( 'Background Color', 'uael' ),
								'type'      => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .uael-price-list-item' => 'background-color: {{VALUE}};',
								],
							]
						);

						$this->add_group_control(
							Group_Control_Border::get_type(),
							[
								'name'     => 'item_border',
								'selector' => '{{WRAPPER}} .uael-price-list-item',
							]
						);

						$this->add_group_control(
							Group_Control_Box_Shadow::get_type(),
							[
								'name'     => 'item_box_shadow',
								'selector' => '{{WRAPPER}} .uael-price-list-item',
							]
						);

					$this->end_controls_tab();

					$this->start_controls_tab(
						'hover',
						[
							'label' => __( 'Hover', 'uael' ),
						]
					);

						$this->add_control(
							'bg_hover_color',
							[
								'label'     => __( 'Background Color', 'uael' ),
								'type'      => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .uael-price-list-item:hover' => 'background-color: {{VALUE}};',
								],
							]
						);

						$this->add_control(
							'border_hover_color',
							[
								'label'     => __( 'Border Color', 'uael' ),
								'type'      => Controls_Manager::COLOR,
								'selectors' => [
									'{{WRAPPER}} .uael-price-list-item:hover' => 'border-color: {{VALUE}};',
								],
							]
						);

						$this->add_group_control(
							Group_Control_Box_Shadow::get_type(),
							[
								'name'     => 'item_hover_box_shadow',
								'label'    => __( 'Hover Box Shadow', 'uael' ),
								'selector' => '{{WRAPPER}} .uael-price-list-item:hover',
							]
						);

						$this->add_control(
							'hover_animation',
							[
								'label'   => __( 'Hover Animation', 'uael' ),
								'type'    => Controls_Manager::SELECT,
								'default' => '',
								'options' => [
									''                => 'None',
									'float'           => 'Float',
									'sink'            => 'Sink',
									'wobble-vertical' => 'Wobble Vertical',
								],
							]
						);

					$this->end_controls_tab();

				$this->end_controls_tabs();

			$this->end_controls_section();
		}

		/**
		 * Helpful Information.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function register_helpful_information() {

			if ( parent::is_internal_links() ) {
				$this->start_controls_section(
					'section_helpful_info',
					[
						'label' => __( 'Helpful Information', 'uael' ),
					]
				);

				$this->add_control(
					'help_doc_5',
					[
						'type'            => Controls_Manager::RAW_HTML,
						/* translators: %1$s doc link */
						'raw'             => sprintf( __( '%1$s Getting started article » %2$s', 'uael' ), '<a href="https://uaelementor.com/docs/price-list-widget/?utm_source=uael-pro-dashboard&utm_medium=uael-editor-screen&utm_campaign=uael-pro-plugin" target="_blank" rel="noopener">', '</a>' ),
						'content_classes' => 'uael-editor-doc',
					]
				);

				$this->add_control(
					'help_doc_1',
					[
						'type'            => Controls_Manager::RAW_HTML,
						/* translators: %1$s doc link */
						'raw'             => sprintf( __( '%1$s Getting started video » %2$s', 'uael' ), '<a href="https://www.youtube.com/watch?v=bVfJNMZOsv0&list=PL1kzJGWGPrW_7HabOZHb6z88t_S8r-xAc&index=13" target="_blank" rel="noopener">', '</a>' ),
						'content_classes' => 'uael-editor-doc',
					]
				);

				$this->add_control(
					'help_doc_2',
					[
						'type'            => Controls_Manager::RAW_HTML,
						/* translators: %1$s doc link */
						'raw'             => sprintf( __( '%1$s Minimum height » %2$s', 'uael' ), '<a href="https://uaelementor.com/docs/minimum-height-option-in-price-list/?utm_source=uael-pro-dashboard&utm_medium=uael-editor-screen&utm_campaign=uael-pro-plugin" target="_blank" rel="noopener">', '</a>' ),
						'content_classes' => 'uael-editor-doc',
					]
				);

				$this->add_control(
					'help_doc_3',
					[
						'type'            => Controls_Manager::RAW_HTML,
						/* translators: %1$s doc link */
						'raw'             => sprintf( __( '%1$s How to set different image positions? » %2$s', 'uael' ), '<a href="https://uaelementor.com/docs/how-to-set-different-image-positions-in-price-list/?utm_source=uael-pro-dashboard&utm_medium=uael-editor-screen&utm_campaign=uael-pro-plugin" target="_blank" rel="noopener">', '</a>' ),
						'content_classes' => 'uael-editor-doc',
					]
				);

				$this->add_control(
					'help_doc_4',
					[
						'type'            => Controls_Manager::RAW_HTML,
						/* translators: %1$s doc link */
						'raw'             => sprintf( __( '%1$s How to set hover colors & animations? » %2$s', 'uael' ), '<a href="https://uaelementor.com/docs/how-to-set-hover-colors-and-animations-for-price-list/?utm_source=uael-pro-dashboard&utm_medium=uael-editor-screen&utm_campaign=uael-pro-plugin" target="_blank" rel="noopener">', '</a>' ),
						'content_classes' => 'uael-editor-doc',
					]
				);

				$this->end_controls_section();
			}
		}

		/**
		 * Renders header for link.
		 *
		 * @param string $item link attributes.
		 * @since 0.0.1
		 * @access protected
		 */
		protected function render_item_header( $item ) {

			$url = $item['link']['url'];

			$item_id = $item['_id'];

			if ( $url ) {
				$unique_link_id = 'item-link-' . $item_id;

				$this->add_render_attribute(
					$unique_link_id,
					[
						'href'  => $url,
						'class' => 'uael-price-list-title',
					]
				);

				if ( $item['link']['is_external'] ) {
					$this->add_render_attribute( $unique_link_id, 'target', '_blank' );
				}

				return '<a ' . $this->get_render_attribute_string( $unique_link_id ) . '>';
			} else {
				return '<div class="uael-price-list-title">';
			}
		}

		/**
		 *  Render Image HTML.
		 *
		 *  @param string $item image attributes.
		 *  @param string $instance settings object instance.
		 *  @since 0.0.1
		 */
		public function render_image( $item, $instance ) {

			$image_id   = $item['image']['id'];
			$image_size = $instance['image_size_size'];
			$class      = '';

			if ( 'custom' === $image_size ) {
				$image_src = Group_Control_Image_Size::get_attachment_image_src( $image_id, 'image_size', $instance );
			} else {
				$image_src = wp_get_attachment_image_src( $image_id, $image_size );
				$image_src = $image_src[0];
			}

			if ( '' == $image_id ) {
				if ( isset( $item['image']['url'] ) ) {
					$image_src = $item['image']['url'];
					$class     = 'uael-pl-default-img';
				}
			}

			return sprintf( '<img class="%s" src="%s" alt="%s" />', $class, $image_src, $item['title'] );
		}

		/**
		 *  Render footer for link HTML.
		 *
		 *  @param string $item link attributes.
		 *  @since 0.0.1
		 */
		public function render_item_footer( $item ) {

			if ( $item['link']['url'] ) {
				return '</a>';
			} else {
				return '</div>';
			}
		}

		/**
		 *  Render Price HTML.
		 *
		 *  @param integer $index current item index.
		 *  @param integer $pos current items price position.
		 *  @since 0.0.1
		 */
		public function get_price( $index, $pos ) {

			$settings  = $this->get_settings_for_display();
			$item      = $settings['price_list'][ $index ];
			$price_pos = 'uael-pl-price-' . $pos;

			if ( 'yes' == $item['has_discount'] ) {
				$price_item_cls = 'has-discount';
				$original_price = $item['original_price'];
			} else {
				$price_item_cls = '';
				$original_price = $item['price'];
			}

			$price_key = $this->get_repeater_setting_key( 'price', 'price_list', $index );

			$this->add_render_attribute( $price_key, 'class', 'uael-price-list-price ' . $price_item_cls );
			$this->add_inline_editing_attributes( $price_key, 'basic' );

			$discount_price_key = $this->get_repeater_setting_key( 'discount_price', 'price_list', $index );

			$this->add_render_attribute( $discount_price_key, 'class', 'uael-price-list-discount-price' );
			$this->add_inline_editing_attributes( $discount_price_key, 'basic' );

			?>
			<span class="uael-price-wrapper <?php echo $price_pos; ?>">
				<span <?php echo $this->get_render_attribute_string( $price_key ); ?> ><?php echo $original_price; ?></span>
				<?php

				if ( 'yes' == $item['has_discount'] ) {
					?>
					<span <?php echo $this->get_render_attribute_string( $discount_price_key ); ?>><?php echo $item['price']; ?></span>
				<?php } ?>
			</span>
			<?php
		}

		/**
		 * Render Price list output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
		protected function render() {

			$html     = '';
			$settings = $this->get_settings_for_display();
			$node_id  = $this->get_id();
			ob_start();
			include 'template.php';
			$html = ob_get_clean();
			echo $html;
		}

		/**
		 * Render Price List widget output in the editor.
		 *
		 * Written as a Backbone JavaScript template and used to generate the live preview.
		 *
		 * @since 0.0.1
		 * @access protected
		 */
		protected function _content_template() {
			?>
			<div class="uael-price-list uael-price-list-{{settings.image_position}} uael-pl-price-position-{{settings.price_position}}">
				<#
					for ( var i in settings.price_list ) {

						if ( settings.hover_animation ) {
							var anim = 'elementor-animation-' + settings.hover_animation;
						}

					#>

					<div class="uael-price-list-item {{ anim }}">

					<#
						var item = settings.price_list[i],
							item_open_wrap = '',
							item_close_wrap = '',
							price_item_cls = '',
							original_price = '';

						if( 'yes' == item.has_discount ) {
							price_item_cls = 'has-discount';
						}

						if ( item.image && item.image.id ) {

							var image = {
								id: item.image.id,
								url: item.image.url,
								size: settings.image_size_size,
								dimension: settings.image_size_custom_dimension,
								model: view.getEditModel()
							};

							var image_url = elementor.imagesManager.getImageUrl( image );

							if ( ! image_url ) {
								return;
							}

							if ( 'undefined' != typeof image_url ) { #>
								<div class="uael-price-list-image">
									<img src="{{ image_url }}" alt="{{ item.title }}">
								</div>
							<# } #>

						<# } else {

							var image_url = item.image.url;

							if ( image_url ) { #>
								<div class="uael-price-list-image">
									<img class="uael-pl-default-img" src="{{ image_url }}" alt="{{ item.title }}">
								</div>
							<# }

						} #>
						<div class="uael-price-list-text">
							<div class="uael-price-list-header">

								<# if ( item.link.url ) { #>
									<a href="{{ item.link.url }}" class="uael-price-list-title">
								<# } else { #>
									<div class="uael-price-list-title">
								<# } #>
										<span class="elementor-inline-editing" data-elementor-setting-key="price_list.{{ i }}.title" data-elementor-inline-editing-toolbar="basic">
										{{{ item.title }}}
										</span>

								<# if ( item.link.url ) { #>
									</a>
								<# } else { #>
									</div>
								<# } #>
								<#

								if( 'above' !== settings.image_position && 'below' !== settings.price_position ) { #>
									<span class="uael-price-list-separator"></span>
								<# }

								if( 'below' !== settings.price_position && 'above' != settings.image_position ) {

									if ( 'yes' == item.has_discount ) {
										original_price = item.original_price;
									} else {
										original_price = item.price;
									} #>

									<span class="uael-price-wrapper uael-pl-price-inner">
										<span class="elementor-inline-editing uael-price-list-price {{{ price_item_cls }}}" data-elementor-setting-key="price_list.{{ i }}.price" data-elementor-inline-editing-toolbar="basic">{{{ original_price }}}
										</span>

										<# if( 'yes' == item.has_discount ) { #>

											<span class="uael-price-list-discount-price elementor-inline-editing" data-elementor-setting-key="price_list.{{ i }}.price" data-elementor-inline-editing-toolbar="basic" >{{{ item.price }}}</span>

										<# } #>
									</span>
								<# } #>
							</div>
							<# if( '' != item.item_description ) { #>
							<p class="uael-price-list-description elementor-inline-editing" data-elementor-setting-key="price_list.{{ i }}.item_description" data-elementor-inline-editing-toolbar="basic">{{{ item.item_description }}}</p>
							<# }

							<!-- if( 'below' == settings.price_position || 'above' == settings.image_position ) { -->

								if ( 'yes' == item.has_discount ) {
									original_price = item.original_price;
								} else {
									original_price = item.price;
								} #>

								<span class="uael-price-wrapper uael-pl-price-outer">
									<span class="elementor-inline-editing uael-price-list-price {{{ price_item_cls }}}" data-elementor-setting-key="price_list.{{ i }}.price" data-elementor-inline-editing-toolbar="basic">{{{ original_price }}}
									</span>

									<# if( 'yes' == item.has_discount ) { #>

										<span class="uael-price-list-discount-price elementor-inline-editing" data-elementor-setting-key="price_list.{{ i }}.price" data-elementor-inline-editing-toolbar="basic" >{{{ item.price }}}
										</span>

									<# } #>
								</span>
							<# <!-- } --> #>
						</div>
					</div>
				<# } #>
			</div>
			<?php
		}

	}
}
