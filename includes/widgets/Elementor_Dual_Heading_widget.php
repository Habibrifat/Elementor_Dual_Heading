<?php

namespace Elementor_Dual_Heading;

use \Elementor\Widget_Base;


class Elementor_Dual_Heading_widget extends Widget_Base
{
    public function get_name()
    {
        return 'Dual-Heading';
    }

    public function get_title()
    {
        return esc_html__( 'Dual-Heading', 'dualHeading' );
    }

    public function get_icon()
    {
        return 'eicon-heading';
    }

    public function get_custom_help_url()
    {
        return 'https://go.elementor.com/widget-name';
    }

    public function get_categories()
    {
        return [ 'general' ];
    }

    public function get_keywords()
    {
        return [ 'keyword', 'keyword' ];
    }

    public function get_script_depends()
    {
        return [ 'script-handle' ];
    }

    public function get_style_depends()
    {
        return [ 'style-handle' ];
    }

    protected function register_controls()
    {

        $this->register_content_controls();
        $this->register_style_controls();


    }

    function register_content_controls(){

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'dualHeading' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_one',
            [
                'label' => esc_html__( 'Heading One', 'dualHeading' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Quick Brown Fox', 'dualHeading' ),
                'placeholder' => esc_html__( 'Heading One', 'dualHeading' ),
            ]
        );
        $this->add_control(
            'heading_two',
            [
                'label' => esc_html__( 'Heading Two', 'dualHeading' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Jump Over the Lazy Dogs', 'dualHeading' ),
                'placeholder' => esc_html__( 'Heading Two', 'dualHeading' ),
            ]
        );
        $this->add_control(
            'heading_selector',
            [
                'label' => esc_html__( 'Heading Selector', 'dualHeading' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1' => esc_html__( 'h1', 'dualHeading' ),
                    'h2' => esc_html__( 'h2', 'dualHeading' ),
                    'h3'  => esc_html__( 'h3', 'dualHeading' ),
                    'h4' => esc_html__( 'h4', 'dualHeading' ),
                    'h5' => esc_html__( 'h5', 'dualHeading' ),
                    'h6' => esc_html__( 'h6', 'dualHeading' ),
                    'p' => esc_html__( 'p', 'dualHeading' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    function register_style_controls(){

        $this->start_controls_section(
            'style_section_one',
            [
                'label' => esc_html__( 'Heading One Style', 'dualHeading' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_one_color',
            [
                'label' => esc_html__( 'Heading One Color', 'dualHeading' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default'=> '#ff0000',
                'selectors' => [
                    '{{WRAPPER}} .heading-one-style' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_one_typography',
                'selector' => '{{WRAPPER}} .heading-one-style',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section_two',
            [
                'label' => esc_html__( 'Heading Two Style', 'dualHeading' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_two_color',
            [
                'label' => esc_html__( 'Heading Two Color', 'dualHeading' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default'=> '#008000',
                'selectors' => [
                    '{{WRAPPER}} .heading-two-style' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_two_typography',
                'selector' => '{{WRAPPER}} .heading-two-style',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_inline_editing_attributes( 'heading_one', 'none' );
        $this->add_inline_editing_attributes( 'heading_two', 'none' );

        $this->add_render_attribute( 'heading_one',[
            'class'=>'heading-one-style'
        ] );

        $this->add_render_attribute( 'heading_two',[
            'class'=>'heading-two-style'
        ] );

        ?>
        <<?php echo $settings['heading_selector']; ?>>
            <span <?php echo $this->get_render_attribute_string( 'heading_one' ); ?>><?php echo $settings['heading_one']; ?></span><span> </span>
            <span <?php echo $this->get_render_attribute_string( 'heading_two' ); ?>><?php echo $settings['heading_two']; ?></span>

        </<?php echo $settings['heading_selector']; ?>>
        <?php

    }

    protected function content_template()
    {
        ?>
        <#
        console.log(settings);
        view.addInlineEditingAttributes( 'heading_one', 'none' );
        view.addInlineEditingAttributes( 'heading_two', 'basic' );

        view.addRenderAttribute( 'heading_one', {'class':'heading-one-style'} );
        view.addRenderAttribute( 'heading_two', {'class':'heading-two-style'} );
        #>
        <{{{ settings.heading_selector }}}>
        <span {{{ view.getRenderAttributeString( 'heading_one' ) }}} >{{{ settings.heading_one }}}</span><span> </span>
        <span {{{ view.getRenderAttributeString( 'heading_two' ) }}} >{{{ settings.heading_two }}}</span>

        </{{{ settings.heading_selector }}}>

        <?php
    }
}