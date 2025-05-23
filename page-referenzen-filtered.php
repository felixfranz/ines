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
													
													<?php foreach( $featured_posts as $post ): 

														// Setup this post for WP functions (variable must be named $post).
														setup_postdata($post); 

														// kind taxonomies
															$topics = get_the_terms( get_the_ID(), 'ref_topic' );
															$audiences = get_the_terms( get_the_ID(), 'ref_audience' );
															$ref_kinds = get_the_terms( get_the_ID(), 'ref_kind' );
															$ref_formats = get_the_terms( get_the_ID(), 'ref_format' );

															$topic_name_array = array();

															// TAXONOMIE: TOPIC
															if ( $topics && ! is_wp_error( $topics ) ) : 

																foreach ( $topics as $topic ) {	
																	$topic_slug = $topic->slug;
																	$topic_name = $topic->name;
																	$topic_name_array[] = $topic->name;
																}
																   $topics_to_echo = join( ", ", $topic_name_array );
																
															endif; // END TOPIC

															// TAXONOMIE: AUDIENCES
															if ( $audiences && ! is_wp_error( $audiences ) ) : 

																foreach ( $audiences as $audience ) {	
																	$audience_slug = $audience->slug;
																	$audience_name = $audience->name;
																	$audience_name_array[]  = $audience->name;
																}
																   $audiences_to_echo = join( ", ", $audience_name_array );
																
															endif; // END AUDIENCES

															// TAXONOMIE: KIND (art des Beitrags)
															if ( $ref_kinds && ! is_wp_error( $ref_kinds ) ) : 

																foreach ( $ref_kinds as $kind ) {	
																	$kind_slug = $kind->slug;
																	$kind_name = $kind->name;
																	$kind_name_array[]  = $kind->name;
																}
																   $kinds_to_echo = join( ", ", $kind_name_array );
																
															endif; // END KIND

															// TAXONOMIE: FORMAT
															if ( $ref_formats && ! is_wp_error( $ref_formats ) ) : 

																foreach ( $ref_formats as $format ) {	
																	$format_slug = $format->slug;
																	$format_name = $format->name;
																	$format_name_array[]  = $format->name;
																}
																   $formats_to_echo = join( ", ", $format_name_array );
																
															endif; // END FORMAT

																
															
														// get custom fields
															$ref_date		 	= get_field('ref_datum');
															$ref_content		= get_field('ref_content');
															$ref_veranstalter	= get_field('ref_veranstalter');
															$ref_anlass		 	= get_field('ref_anlass');
															$ref_link		 	= get_field('ref_link');
															$ref_duration		= get_field('ref_duration');
															$ref_project_duration = get_field('ref_project_duration');
															$ref_coauthors		= get_field('ref_coauthors');
															$ref_client		 	= get_field('ref_client');

																 ?>
														<div class="ref_article">
															<div class="ref_top_row">
																<div class="ref_date"><?php echo $ref_date; ?></div>
																<div class="ref_kind"><?php echo $kinds_to_echo; ?></div>
																<div class="ref_format"><?php echo $formats_to_echo; ?></div>
															</div>
															<div class="ref_middle_row">
																<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
															</div>
															<div class="ref_bottom_row">
																<div class="ref_topic"><?php echo $topics_to_echo; ?></div>
																<?php if($ref_link) : ?>
																<div class="ref_link"><?php echo $ref_link; ?></div>
																<?php endif; ?>
																<div class="ref_format">Mehr Informationen ›</div>
															</div>
															

																</div>
													<?php endforeach; ?>
													
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
