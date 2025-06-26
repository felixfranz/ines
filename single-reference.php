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

						<main id="main" class="m-all t-all d-all cf" >

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" role="article">

								<header class="article-header">

									<h1 class="single-title reference-title"><?php the_title(); ?></h1>

								</header>

								<section class="entry-content cf">
									<?php

										the_content();

									?>
								</section> <!-- end article section -->


							</article>

							<?php endwhile; ?>



							<?php endif; ?>

						</main>


				</div>

			</div>

<?php get_footer(); ?>
