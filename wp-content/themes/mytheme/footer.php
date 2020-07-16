<footer class="basdepage">
			<p>&copy 2020 - <?php _e('All right reserved', 'mytheme'); ?> - Jonathan FAUCHOUX / Cepegra </p>
			<nav class="nav">
				
			<?php
				$args = array(
					"theme_location" => "footer",
					"menu_class" => "navbar-brand",
					'add_li_class'  => 'navbar-item bottom',
					'before' => " | "
				);
				wp_nav_menu($args); ?>
			</nav>
		
		</footer>
	</div>
	<?php wp_footer(); ?>
	
</body>
</html>