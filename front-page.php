<?php
/*
Template Name: Front Page customizations
*/
?>

<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo esc_attr( tc__f( 'tc_main_wrapper_classes' , 'container' ) ) ?>">

    
    <div class="container" role="main">
       
	   <!-- TODO: extract in a seperate js file -->
	   <script type="text/javascript">
		
		function allowDrop(ev) {
			ev.preventDefault();
		}

		function drag(ev) {
			console.debug('dragging.. ' + ev.target.parentNode.id + " (ev.target.id)=" + ev.target.id);
			ev.dataTransfer.setData("text", ev.target.parentNode.id);
		}

		function drop(ev) {
			ev.preventDefault();
			console.debug("Target: " + ev.target);
			var data = ev.dataTransfer.getData("text");
			ev.target.appendChild(document.getElementById(data));
		}
			
	</script>
	   
		<!-- <div style="border: 2px solid white" class="container-fluid"> -->
			<?php wp_nav_menu( array( 
				'theme_location' => 'extra-menu', 
				//'container' => 'div', default
				'container_class' => 'row-fluid menu-container',
				//'echo' => false,
				'items_wrap' => '%3$s', //do not wrap with the default <ul> element
				'walker' => new seaside_navwalker()) ); ?> 
				
			<!-- placeholders for drop locations. Do not display them in a small screens as the occupy free unusable space -->	
			<div style="  height: 20%;" class="asdf row-fluid">
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" >&nbsp;</div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" >&nbsp;</div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" >&nbsp;</div>
			
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
			
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
		
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
			</div>
			<div style="  height: 20%;" class="asdf row-fluid">
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
			
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
			
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
		
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
			</div>
			<div style="  height: 20%;" class="asdf row-fluid">
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
			
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style="  height: 100%;" class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
			
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
		
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
				  <div style=" height: 100%; " class="col-lg-1 col-md-3 col-xs-6 col-sm-4" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
			</div>
		<!-- </div> -->
		
		
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

	</div>


</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>
