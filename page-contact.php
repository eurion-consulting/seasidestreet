<?php
/*
Template Name: Custom Page Example
*/
?>

<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo esc_attr( tc__f( 'tc_main_wrapper_classes' , 'container' ) ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
        		
		<script type="text/javascript">
			
			var directionsDisplay;
			var directionsService = new google.maps.DirectionsService();
			var map;
			
			function initialize() {
				
				directionsDisplay = new google.maps.DirectionsRenderer();
				var wake_park = new google.maps.LatLng(42.431457, 27.649763);
				var myOptions = {
					zoom: 6,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					center: wake_park
				}
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				directionsDisplay.setMap(map);
				calcRoute();
			}

			function calcRoute() {

				var waypts = [];

				if(navigator.geolocation){
					navigator.geolocation.getCurrentPosition(
						function(position){
							var latitude  = position.coords.latitude;
							var longitude = position.coords.longitude;
							console.log("Latitude : "+latitude+" Longitude : "+longitude);
							alert("Latitude : "+latitude+" Longitude : "+longitude);
						},
						function(){
							//alert("Geo Location not supported now");
						}
					); 
				}  	

				start  = new google.maps.LatLng(42.4274194,27.1149512); // sofia
				end = new google.maps.LatLng(42.431457, 27.649763); //gradina
				var request = {
					origin: start,
					destination: end,
					waypoints: waypts,
					optimizeWaypoints: true,
					travelMode: google.maps.DirectionsTravelMode.DRIVING
				};
				directionsService.route(request, function(response, status) {
					if (status == google.maps.DirectionsStatus.OK) {
						directionsDisplay.setDirections(response);
						var route = response.routes[0];
						console.debug(route);
						//alert(route);
					}
				});
			}
			
			initialize();
			
		
			
		</script>

			
		<div id="map_canvas" style="width:50%;height:50%;">
        </div>
		
		<div class="<?php echo esc_attr( tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ) ?>">

            <?php do_action( '__before_article_container' ); ##hook of left sidebar?>
                
                <div id="content" class="<?php echo esc_attr( tc__f( '__screen_layout' , tc__f( '__ID' ) , 'class' ) ) ?> article-container">
                    
                    <?php do_action( '__before_loop' );##hooks the header of the list of post : archive, search... ?>

                        <?php if ( have_posts() ) : ?>  

                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                                
                                <?php the_post(); ?>

                                <?php do_action( '__before_article' ) ?>
                                    <article <?php tc__f( '__article_selectors' ) ?>>
                                        <?php do_action( '__loop' ); ?>
                                    </article>
                                <?php do_action( '__after_article' ) ?>

                            <?php endwhile; ?>

                        <?php endif; ##end if have posts ?>

                    <?php do_action( '__after_loop' );##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->

           <?php do_action( '__after_article_container' ); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>
