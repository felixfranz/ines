<?php
/*
 Template Name: Referenzen gefiltert
 *
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap">

						<main id="main" class="m-all t-all d-all">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							

								

								<section class="entry-content" >
									<?php
										
										the_content();

									?>
								</section>

								<section>
									<div class="filtered_refs">
										<div class="refs_container">
											<?php
												$featured_posts = get_field('filter_refs');
												if( $featured_posts ): ?>
													<ul>
													<?php foreach( $featured_posts as $post ): 

														// Setup this post for WP functions (variable must be named $post).
														setup_postdata($post); ?>
														<li>
															<?php 
															$terms = get_the_terms( get_the_ID(), 'ref_topic' );

																if ( $terms && ! is_wp_error( $terms ) ) : 

																foreach ( $terms as $term ) {
																	
																	$term_slug = $term->slug;
																	$term_name = $term->name;
																	
																	$term_name_array[]  = $term->name;
																	//echo ($term_slug);
																}
																
																echo $terms_to_echo = join( ", ", $term_name_array );

																endif; ?>

															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
															<span>A custom field from this post: <?php the_field( 'ref_datum' ); ?></span>


														</li>
													<?php endforeach; ?>
													</ul>
													<?php 
													// Reset the global post object so that the rest of the page works correctly.
													wp_reset_postdata(); ?>
												<?php endif; ?>
										</div>
									</div>
								</section>


							

							

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

						

				</div>

			</div>


<?php get_footer(); ?>
