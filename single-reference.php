<?php
/*
 * CUSTOM PROJECT TEMPLATE
 *
 *
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<main id="main" class="inner-content__main m-all t-all d-all cf" >

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php 

							// Setup this post for WP functions (variable must be named $post).
							setup_postdata($post); 

							// kind taxonomies
								$topics = get_the_terms( get_the_ID(), 'ref_topic' );
								$audiences = get_the_terms( get_the_ID(), 'ref_audience' );
								$ref_kinds = get_the_terms( get_the_ID(), 'ref_kind' );
								$ref_formats = get_the_terms( get_the_ID(), 'ref_format' );

								$topic_name_array = array();
								$format_name_array = array();
								$kind_name_array = array();
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


							$ref_date		 	= get_field('ref_datum');
							$ref_date_since		= get_field('ref_datum_since');
							$ref_content		= get_field('ref_content');
							$ref_veranstalter	= get_field('ref_veranstalter');
							$ref_anlass		 	= get_field('ref_anlass');
							$ref_link		 	= get_field('ref_link');
							$ref_duration		= get_field('ref_duration');
							$ref_project_duration = get_field('ref_project_duration');
							$ref_coauthors		= get_field('ref_coauthors');
							$ref_client		 	= get_field('ref_client');
							$ref_language		  = get_field('ref_language');

							?>

							<article class="reference_content" id="post-<?php the_ID(); ?>" role="article">

								<aside>
									<?php if($ref_date) : ?>
									<div class="ref_meta ref_date"><span>Datum:</span><?php echo $ref_date; ?></div>
									<?php endif; ?>
									<?php if($ref_date_since) : ?>
									<div class="ref_meta ref_date_since"><span>Datum:</span><?php echo $ref_date_since; ?></div>
									<?php endif; ?>

									<?php if($kinds_to_echo) : ?>
									<div class="ref_meta ref_kind"><span>Aufgabe:</span><?php echo $kinds_to_echo; ?></div>
									<?php endif; ?>

									<?php if($formats_to_echo) : ?>
									<div class="ref_meta ref_format"><span>Format:</span><?php echo $formats_to_echo; ?></div>
									<?php endif; ?>

									<?php if($topics_to_echo) : ?>
									<div class="ref_meta ref_topic"><span>Thema:</span><?php echo $topics_to_echo; ?></div>
									<?php endif; ?>

									<?php if($ref_link) : ?>
									<div class="ref_meta ref_link"><span>Link:</span><a href="<?php echo $ref_link; ?>">Hier entlang ›</a></div>
									<?php endif; ?>

									<?php if($ref_language) : ?>
									<div class="ref_meta ref_topic"><span>Sprache:</span><?php echo $ref_language; ?></div>
									<?php endif; ?>

									<?php if($ref_duration) : ?>
									<div class="ref_meta ref_topic"><span>Dauer:</span><?php echo $ref_duration; ?></div>
									<?php endif; ?>

									<?php if($ref_project_duration) : ?>
									<div class="ref_meta ref_topic"><span>Projektdauer:</span><?php echo $ref_project_duration; ?></div>
									<?php endif; ?>

									<?php if($ref_coauthors) : ?>
									<div class="ref_meta ref_topic"><span>Beteilige:</span><?php echo $ref_coauthors; ?></div>
									<?php endif; ?>

									<?php if($ref_client) : ?>
									<div class="ref_meta ref_topic"><span>Auftrag:</span><?php echo $ref_client; ?></div>
									<?php endif; ?>
								</aside>
								<!-- end aside -->

								<section class="reference_content__article_text article_text">

									<header class="article_text__header">

										<h1 class="single-title reference-title"><?php the_title(); ?></h1>

										<div class="line-container">
											<div class="circle"><span></span></div>
											
										</div>
									</header>
									<!-- end header -->

									<div class="entry-content cf">
										<?php

											echo $ref_content;
										?>
									</div> 
									<!-- end article content section -->

								</section>

							</article>

							<?php endwhile; ?>



							<?php endif; ?>

						</main>


				</div>

			</div>

<?php get_footer(); ?>
