<footer class="footer-site">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 text-center text-lg-start">
				<p>&copy; <?= date('Y') . ' ' . get_bloginfo('name') ?>. <?php _e('Todos os direitos reservados.', 'menin') ?></p>
			</div>

			<div class="col-lg-6 text-center text-lg-end">
				<p class="developer"><?php _e('Desenvolvido por', 'menin') ?> <a href="https://inovany.com.br" target="_blank" rel="noopener" title="iNova">
						<img src="https://assets.comet.com.br/assets/default/logo-inova-dark.png" alt="Inova">
					</a>
					<a href="https://bluelizard.com.br" target="_blank" rel="noopener" title="Blue Lizard">
						<img src="https://assets.comet.com.br/assets/default/logo-bluelizard-default.png" alt="Blue Lizard">
					</a>
				</p>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>