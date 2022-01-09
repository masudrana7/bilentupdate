<?php

namespace SC_Repair;

class Element
{

    public function __construct()
    {

        add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));
    }

    public function widgets_registered()
    {

        if (defined('SC_REPAIR_ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {

            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/slider-widget.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/service-grid.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/service-slider.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/heading.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/button.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/video.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/contact-form7.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/portfolio-grid.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/portfolio-slider.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/testimonial.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/price-table.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/team.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/team-grid.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/blog.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/image.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/counter.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/contact-box.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/sc-menu.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/header-top.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/header-middle.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/header-menu.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/accordion.php';
            require_once SC_REPAIR_ELEMENTOR_INCLUDES . '/widgets/sidebar-offcanvas.php';
        }
    }
}
