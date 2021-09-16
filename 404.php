<?php get_header(); ?>


<div class="<?php echo section_class('page-404') ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 col-lg-6 text-center py-5">
				<span class="title-404">404</span>
				<!-- Title -->
				<h1 class="headline-5 wow fadeInUp " data-wow-delay=".2s"><?php _e('Página não encontrada', 'menin') ?></h1>
				<!-- Description -->
				<p class="wow fadeInUp" data-wow-delay=".3s"><?php _e('Desculpe, mas parece que a página que você acessou não existe ou pode ter sido removida.', 'menin') ?></p>
				<!-- Button -->
				<a href="<?php bloginfo('url') ?>" class="btn-theme wow fadeInUp" data-wow-delay=".4s"><?php _e('Voltar ao Início', 'menin') ?></a>
			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
