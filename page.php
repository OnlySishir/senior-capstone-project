<?php
get_header();

?>
<style type="text/css">
/* page.php css for content*/

	.contents
	{
		color: black;
		margin: 10px;
		padding: 10px;
	}
</style>

<div>
	<?php
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			?>
			<div class="contents">
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<p><?php the_content();?></p>
			</div>
			<?php
		}
	}


	?>

</div>

<?php
	get_footer();


?>