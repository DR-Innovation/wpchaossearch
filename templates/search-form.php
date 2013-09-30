<?php
/**
 * @package WP Chaos Search
 * @version 1.0
 */
?>
<form method="GET" action="<?php echo $page; ?>" class="col-12">
	<div class="col-12 input-group">
		<input type="hidden" name="<?php echo WPChaosSearch::QUERY_KEY_VIEW; ?>" value="<?php echo WPChaosSearch::get_search_var(WPChaosSearch::QUERY_KEY_VIEW, 'esc_attr'); ?>">
		<input type="hidden" name="<?php echo WPChaosSearch::QUERY_KEY_SORT; ?>" value="<?php echo WPChaosSearch::get_search_var(WPChaosSearch::QUERY_KEY_SORT, 'esc_attr'); ?>">
		<input class="form-control" id="appendedInputButton" type="text" name="<?php echo WPChaosSearch::QUERY_KEY_FREETEXT; ?>" value="<?php echo WPChaosSearch::get_search_var(WPChaosSearch::QUERY_KEY_FREETEXT, 'esc_attr,trim'); ?>" placeholder="<?php echo $freetext_placeholder; ?>" />
		<span class="input-group-btn">
			<button type="submit" class="btn btn-search btn-large" id="searchsubmit"><?php _ex('Search','verb','dka'); ?></button>
		</span>
	</div>
</form>