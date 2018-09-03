<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id="main-core".
 *
 * @package ThinkUpThemes
 */
?>

		</div><!-- #main-core -->
		</div><!-- #main -->
		<?php /* Sidebar */ thinkup_sidebar_html(); ?>
	</div>
	</div><!-- #content -->

	<footer>
	    
		<?php /* Custom Footer Layout */ thinkup_input_footerlayout();
		echo	'<!-- #footer -->';  ?>
		
		
			<div class="copyright">
			<?php /* === Add custom footer === */ thinkup_input_copyright(); ?>
			</div>
			<!-- .copyright -->

			<?php if ( has_nav_menu( 'sub_footer_menu' ) ) : ?>
			<?php wp_nav_menu( array( 'depth' => 1, 'container_class' => 'sub-footer-links', 'container_id' => 'footer-menu', 'theme_location' => 'sub_footer_menu' ) ); ?>
			<?php endif; ?>
			<!-- #footer-menu -->

			<?php if ( ! has_nav_menu( 'sub_footer_menu' ) ) : ?>
			<?php /* Social Media Icons */ thinkup_input_socialmediafooter(); ?>
			<?php endif; ?>

	</footer><!-- footer -->

</div><!-- #body-core -->



<?php wp_footer(); ?>

<!-- Íconos de redes sociales  -->
<div style="display: flex; justify-content: space-around;">
    <div style="display: table-cell;" >
        <img src="wp-content/uploads/2018/06/logos1.png" alt="logos Gobernaci贸n" width="250px" margin-right="15px">
    </div>
    <div style="margin-top: 35px;" > 
        <div id="redes-sociales" > 
            <a href="https://www.twitter.com/" data-tip="top" data-original-title="Twitter" target="_blank">
                <img  src="wp-content/uploads/2018/08/Twitter.png" alt="logos Gobernaci贸n" >
            </a>
            <a href="https://www.facebook.com/Gerencia-Para-las-Juventudes-del-Meta-713863738709297/" data-tip="top" data-original-title="Facebook" target="_blank"> 
                <img  src="wp-content/uploads/2018/08/Facebook.png" alt="logos Gobernaci贸n">
            </a>
            <a href="https://www.youtube.com/channel/UCqyt1BtAvfhHR7In-Ndnadw/featured" data-tip="top" data-original-title="YouTube" target="_blank">
                <img  src="wp-content/uploads/2018/08/YouTube.png" alt="logos Gobernaci贸n" >
            </a>
            <a href="https://www.instagram.com/" data-tip="top" data-original-title="Instagram" target="_blank">
                <img  src="wp-content/uploads/2018/08/Instagram.png" alt="logos Gobernaci贸n" >
            </a>
        </div>
    </div>   
    <div style="display: table-cell;" >    
    <img  src="wp-content/uploads/2018/06/logos2.png" alt="logos Gobernaci贸n" width="250px" margin-left="15px">
    </div>
</div> 
<!-- barra de colores -->
<img src="wp-content/uploads/2018/06/BarraDeColores.png" style= "vertical-align: middle; height: 30px; width: 100%;">
</body>

</html>