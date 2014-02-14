<?php
/**
 * @package WP Chaos Search
 * @version 1.0
 */

/**
 * WordPress Widget that display a search form
 * to be used with CHAOS
 */
class WPChaos_Search_Widget extends WPChaosWidget {
	
	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(
			'chaos-search',
			__('CHAOS Search','wpchaossearch'),
			array( 'description' => __('Adds form to search in CHAOS material','wpchaossearch') )
		);

		$this->fields = array(
			array(
				'title' => __('Title','wpchaossearch'),
				'name' => 'title'
			),
			array(
				'title' => __('Placeholder','wpchaossearch'),
				'name' => 'placeholder'
			)
		);
	}

	/**
	 * GUI for widget content
	 * 
	 * @param  array $args Sidebar arguments
	 * @param  array $instance Widget values from database
	 * @return void 
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		WPChaosSearch::create_search_form($instance['placeholder']);
		
		echo $args['after_widget'];
	}

}

//eol