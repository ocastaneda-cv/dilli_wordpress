 <!-- Start the Loop. -->
 <?php $query = new WP_Query( 'page_id=67' );
	 if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		 <?php 
		 $section = get_field('section_id');
		 
		 ?>

			<div class="container-fluid">
			  <div class="container">
			    <section id="s5" class="">
      <div class="row">
        <div class="col-sm-1 hidden-xs"></div>
          <div class="col-sm-10">
            <h1>Store Locator</h1>
               
              
                    <form class="map-searchbox">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Search within US and Canada</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="addressInput" placeholder="Search by street address, city, or zip" onkeypress="onSearchPressEnter(window.event)">
                                        <div class="input-group-addon">
                                            <a href="javascript:void(0)" onclick="searchLocations('srch', 'some')"><i class="fa fa-search"></i></a>
                                        </div>
                                        <!--//<input type="button" onclick="searchLocations()" value="Search"/>//-->
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Search Internationally</label>
                                    
                                    <div class="input-group">
                                        <select name="country" class="form-control" id="Country-Selected">
                                            <option value="US">US</option>
                                            <option value="UK">UK</option>
                                        </select>
                                        <div class="input-group-addon">
                                            <a href="javascript:void(0)" onclick="searchLocations('srch', 'some')"><i class="fa fa-search"></i></a>                                        
                                        </div>                                    
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
               
                <div class="row">
                  <div class="col-md-4" id="locationSelect">
                      <h3 id="locationsCount">&nbsp;</h3>
                      <div id="nano" class="nano">
                          <div class="nano-content">
                              <ol class="simple-list"></ol>
                          </div>
                      </div>    
                  </div>
                  <div class="hidden-xs hidden-ms col-md-8">
                      <div class="map-container">
                          <div id="map" style="width: 100%; height: 380px;"></div>
                          <!--// turned into a hidden input field for now since we do not have this 
                          dropdown in the design         
                          <select id="locationSelect" style="width:100%;visibility:hidden"></select>
                          //-->
                          <div class="depth-shadow"></div>
                      </div>
                      <input type="hidden" id="radiusSelect" value="25" />
                      <input type="hidden" id="locationSelect" value="25" />
                  </div>
            </div><!-- /col-row -->                
          </div><!-- /col-8 -->
        <div class="col-sm-1 hidden-xs"></div>
      </div><!-- /row -->    
    </section> <!-- /section -->
			  </div><!-- /container -->
			</div><!-- /container fluid -->
		
		<!-- Stop The Loop (but note the "else:" - see next line). -->
		<?php endwhile; else : ?>
		
		<!-- The very first "if" tested to see if there were any Posts to  -->
		<!--  This "else" part tells what do if there weren't any. -->
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<!-- REALLY stop The Loop. -->
	<?php endif; ?>