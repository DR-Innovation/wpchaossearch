<?php
/**
 * @package WP Chaos Search
 * @version 1.0
 */
?>
<?php get_header();

$current_view = (WPChaosSearch::get_search_var(WPChaosSearch::QUERY_KEY_VIEW) ? 'listview' : 'thumbnails');

$views = array(
	array(
		'title' => __('View as List','wpchaossearch'),
		'view' => 'listview',
		'class' => 'icon-th-list',
		'link' => 'liste'
	),
	array(
		'title' => __('View as Gallery','wpchaossearch'),
		'view' => 'thumbnails',
		'class' => 'icon-th',
		'link' => null
	),
);

?>
<article class="container search-results">
	<div class="row search-results-top">
		<div class="col-4 col-sm-4">
			<p><?php printf(__('<span class="hidden-sm">The search for %s gave&nbsp;</span><span>%s results</span>','wpchaossearch'),'<strong class="blue">'.WPChaosSearch::get_search_var(WPChaosSearch::QUERY_KEY_FREETEXT, 'esc_html').'</strong>',WPChaosSearch::get_search_results()->MCM()->TotalCount()); ?></p>
		</div>
		<div class="col-4 col-sm-2">
			<div class="search-result-listing btn-group">
<?php foreach($views as $view) :
		echo '<a type="button" class="btn btn-default'.($view['view'] == $current_view ? ' active' : '').'" href="'.WPChaosSearch::generate_pretty_search_url(array(WPChaosSearch::QUERY_KEY_VIEW => $view['link'])).'" title="'.$view['title'].'"><i class="'.$view['class'].'"></i></a>';
endforeach; ?>
			</div>
		</div>
		<div class="col-12 col-sm-4 pagination-div">
			<ul class="pagination pagination-large pull-right">
			  <?php echo $pagination = WPChaosSearch::paginate('echo=0&before=&after='); ?>
			</ul>
		</div>
	</div>
	<ul class="row <?php echo $current_view; ?>">

<?php
foreach(WPChaosSearch::get_search_results()->MCM()->Results() as $object) :
	WPChaosClient::set_object($object);
?>
		<li class="search-object col-12 col-sm-6 col-lg-3">
			<a class="thumbnail" href="<?php echo WPChaosClient::get_object()->url; ?>" id="<?php echo WPChaosClient::get_object()->GUID; ?>">
				<h2 class="title"><strong><?php echo WPChaosClient::get_object()->title; ?></strong></h2>
			</a>
		</li>
 <?php endforeach; WPChaosClient::reset_object(); ?>
	</ul>

	<div class="row search-results-top">
		<div class="col-sm-6 hidden-sm">
			<p><?php printf(__('<span class="hidden-sm">The search for %s gave&nbsp;</span><span>%s results</span>','wpchaossearch'),'<strong class="blue">'.WPChaosSearch::get_search_var(WPChaosSearch::QUERY_KEY_FREETEXT, 'esc_html').'</strong>',WPChaosSearch::get_search_results()->MCM()->TotalCount()); ?></p>
		</div>
		<div class="col-12 col-sm-6">
		<ul class="pagination pagination-large pull-right">
		  <?php echo $pagination; ?>
		</ul>
		</div>
	</div>
</article>

<?php get_footer(); ?>
