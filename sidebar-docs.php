<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package socket.io-website
 */

?>
<?php $parents = get_post_ancestors( get_the_id() ); ?>
<?php $parent_post_id = ( ! empty( $parents ) ) ? $parents[0] : get_the_id(); ?>

<div id="sidebar" class="content-area">
	<ul id="posts">
		<li  <?php if ( get_the_id() == $parent_post_id ) echo 'id="parent"'; ?>><a href="<?php echo get_permalink( $parent_post_id ); ?>">Overview</a></li>
		<li class="anchor"></li>
		<?php $i = 0; ?>
		<?php $args = array( 'post_type' => 'page' , 'post_parent' => $parent_post_id, 'orderby' => 'post_id', 'order' => 'ASC' ); ?>
		<?php $children = get_children( $args ); ?>
		<?php foreach ( $children as $child ): ?>

			<?php if ( get_the_id() == $child->ID ): ?>
				<li id="parent"><a href="<?php echo get_permalink( $child->ID ); ?>"><?php echo $child->post_title; ?></a></li>
			<?php else: ?>
				<li id="post"><a href="<?php echo get_permalink( $child->ID ); ?>"><?php echo $child->post_title; ?></a></li>
			<?php endif; ?>

			<?php $i++; ?>
			<?php if ( 2 == $i ): ?>
				<li class="anchor"></li>
			<?php endif; ?>

		<?php endforeach; // end of the loop. ?>
	</ul>
</div>
