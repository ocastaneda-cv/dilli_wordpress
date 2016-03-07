	 <!-- Start the Loop. -->
 <?php $query = new WP_Query( 'page_id=5' );
	 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		 <?php 
		 $section = get_field('section_id');
		 $frst_list_title = get_field('1st_list_title');
		 $frst_list_image = get_field('1st_list_image');
		 $frst_list_copy = get_field('1st_list_copy');
		 $frst_list_ul_list = get_field('1st_list_ul_list');
		 $scd_list_title = get_field('2nd_list_title');
		 $scd_list_image = get_field('2nd_list_image');
		 $scd_list_copy = get_field('2nd_list_copy');
		 $scd_list_ul_list = get_field('2nd_list_ul_list');
		 $thrd_list_title = get_field('3rd_list_title');
		 $thrd_list_image = get_field('3rd_list_image');
		 $thrd_list_copy = get_field('3rd_list_copy');
		 $thrd_list_ul_list = get_field('3rd_list_ul_list');
		 ?>

			<div class="container-fluid">
				<div class="container">
					<section id="<?php echo $section; ?>" class=""> 
						<div class="row why">
							<div class="col-sm-4"> <h1><?php the_title(); ?></h1></div>
							<div class="col-sm-8">
								<?php the_content(); ?>
							</div><!-- /col-10 -->
						</div><!-- /row -->

						 <div class="row mrg-top-40">
					        <div class="hidden-xs hidden-ms col-sm-4 mrg-bot-20 ">
					          <img src="<?php echo $frst_list_image['url']; ?>" class="img-responsive"> </div>
					        <div class="col-xs-12 col-sm-8 design">
					            <h1 class=""><span><img src="<?php echo $frst_list_image['url']; ?>" class="icons-small"></span><?php echo $frst_list_title ?></h1>
					            <p><?php echo $frst_list_copy ?></p>


					             <div class="show-toggle">
					              <div class="collapse" id="more-design">
					                <div class="">
					                  
					                  	<?php echo $frst_list_ul_list ?>
					                 
					                  <span class="fprint"><span class="note">**</span><i> exclusive to Dilli Dalli Soft Touch frames.</i><br>&nbsp;</span>
					                </div>
					              </div>
					              <a class="more" data-text-swap="Read Less" data-text-original="Read More" data-toggle="collapse" href="#more-design" aria-expanded="false" aria-controls="">Read More</a> <i class="fa fa-caret-up"></i>
					           </div>  
					         </div><!-- /col-10 -->
					      </div><!-- /row -->

					    <div class="row mrg-top-40">
					        <div class="hidden-xs hidden-ms col-sm-4 mrg-bot-20 ">
					          <img src="<?php echo $scd_list_image['url']; ?>" class="img-responsive"> </div>
					        <div class="col-xs-12 col-sm-8 comfort">
					            <h1 class=""><span><img src="<?php echo $scd_list_image['url']; ?>" class="icons-small"></span><?php echo $scd_list_title ?></h1>
					            <p><?php echo $scd_list_copy ?></p>


					             <div class="show-toggle">
					              <div class="collapse" id="more-comfort">
					                <div class="">
					                  
					                  	<?php echo $scd_list_ul_list ?>
					                 
					                  <span class="fprint"><span class="note">**</span><i> exclusive to Dilli Dalli Soft Touch frames.</i><br>&nbsp;</span>
					                </div>
					              </div>
					              <a class="more" data-text-swap="Read Less" data-text-original="Read More" data-toggle="collapse" href="#more-comfort" aria-expanded="false" aria-controls="">Read More</a> <i class="fa fa-caret-up"></i>
					           </div>  
					         </div><!-- /col-10 -->
					      </div><!-- /row -->

					    <div class="row mrg-top-40">
					        <div class="hidden-xs hidden-ms col-sm-4 mrg-bot-20 ">
					          <img src="<?php echo $frst_list_image['url']; ?>" class="img-responsive"> </div>
					        <div class="col-xs-12 col-sm-8 safety">
					            <h1 class=""><span><img src="<?php echo $frst_list_image['url']; ?>" class="icons-small"></span><?php echo $thrd_list_title ?></h1>
					            <p><?php echo $thrd_list_copy ?></p>


					             <div class="show-toggle">
					              <div class="collapse" id="more-safety">
					                <div class="">
					                  
					                  	<?php echo $thrd_list_ul_list ?>
					                 
					                  <span class="fprint"><span class="note">**</span><i> exclusive to Dilli Dalli Soft Touch frames.</i><br>&nbsp;</span>
					                </div>
					              </div>
					              <a class="more" data-text-swap="Read Less" data-text-original="Read More" data-toggle="collapse" href="#more-safety" aria-expanded="false" aria-controls="">Read More</a> <i class="fa fa-caret-up"></i>
					           </div>  
					         </div><!-- /col-10 -->
					      </div><!-- /row -->

					</section> <!-- closes the first section box -->
				</div><!-- /container -->
			</div><!-- /container fluid -->
		
		<!-- Stop The Loop (but note the "else:" - see next line). -->
		<?php endwhile; else : ?>
		
		<!-- The very first "if" tested to see if there were any Posts to  -->
		<!--  This "else" part tells what do if there weren't any. -->
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<!-- REALLY stop The Loop. -->
	<?php endif; ?>

