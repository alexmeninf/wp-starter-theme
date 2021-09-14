<?php

global $post;

/**
 * API para envio de e-mail.
 */
$api = 'https://mailsender.inovany.com.br/api/emails/send';

/**
 * Gerar formulário
 */
if (have_rows('campos')) :
?>

  <form id="form-theme-<?php the_ID(); ?>" action="javascript:void(0);" method="POST" class="material-form <?php the_field('form_style') ?>">
    <?php
    while (have_rows('campos')) :
      the_row();

      if (get_sub_field('display') == 'input') :

        $input_name   = get_sub_field('input_name');
        $input_id     = get_sub_field('input_id');
        $input_type   = get_sub_field('input_type');
        $input_value  = get_sub_field('input_value');
        $is_required  = get_sub_field('is_required');
        $custom_class = get_sub_field('class_name');
        $radio_name   = get_sub_field('input_radio_name');

        input($input_name, $input_id, $input_type, $is_required, $input_value, $custom_class, $radio_name);
      else: 
        
        echo '<p class="mb-0 mt-2">'.get_sub_field('group_title').'</p>';
      endif;
    endwhile;
    ?>
    <button type="submit" class="butn-dark p-4">
      <span><?php echo get_field('button_text') ? get_field('button_text') : __('Enviar', 'menin'); ?></span>
    </button>
  </form>


  <script>
    let form = '#form-theme-<?php the_ID(); ?>';
    $(form).find('input, select, textarea').prop('required', false);

    $(form).on('submit', function(e) {
      e.preventDefault();

      // Get values
      <?php
      $check_radio_name = ''; // Atribuir somente 1 variavel de validação no grupo.
      
      while (have_rows('campos')) :
        the_row();

        $id = get_sub_field('input_id');
        $input_type  = get_sub_field('input_type');
        
        // Type radio
        if ($input_type == 'radio') :
          $radio_name  = get_sub_field('input_radio_name');
          
          if ($check_radio_name != $radio_name) : ?>

            let <?= $radio_name ?> = !!$('input[name="<?= $radio_name ?>"]:checked').val() ? $('input[name="<?= $radio_name ?>"]:checked').val() : "";

            <?php
            $check_radio_name = get_sub_field('input_radio_name');
          endif;

        // Other types
        else : ?>

          let <?= $id ?> = $(this).find('#<?= $id ?>').val();

      <?php endif;
      endwhile;
      ?>

      // Validate values
      <?php
      $count_requireds = 0;
      $check_radio_name = '';

      while (have_rows('campos')) :
        the_row();

        if (get_sub_field('is_required')) :
          $id   = get_sub_field('input_id');
          $name = get_sub_field('input_name');
          $input_type  = get_sub_field('input_type');
          
          // Type radio
          if ($input_type == 'radio') :
            $radio_name  = get_sub_field('input_radio_name');
            
            if ($check_radio_name != $radio_name) : ?>

              if (<?= $radio_name ?>.trim() == "") {
                Swal.fire({
                  type: 'warning',
                  title: 'Oops...',
                  html: '<?php printf(__("Escolha uma opção em <b>%s</b>.", "menin"), $name) ?>'
                });
              } else

              <?php 
              $check_radio_name = get_sub_field('input_radio_name');
            endif;

          // Other types
          else : ?>

            if (<?= $id ?>.trim() == "") {
              Swal.fire({
                type: 'warning',
                title: 'Oops...',
                html: '<?php printf(__("O campo <b>%s</b> é obrigatório.", "menin"), $name) ?>'
              });
            } else

          <?php
          endif;

          $count_requireds++;
        endif;
      endwhile;
      ?>

      <?php echo $count_requireds > 0 ? '{' : '' ?>

      // Send informations
      let btnForm = form + ' button[type=submit]';

      $.ajax({
        url: '<?php echo $api ?>',
        method: 'POST',
        data: {
          <?php the_field('ajax_data') ?>
        },
        beforeSend: () => {
          $(btnForm).html('<?= __("Enviando...", "menin") ?>');
        }

      }).done(function(data) {
        clear_form_elements($(this));

        Swal.fire({
          title: '<?= __("Enviado!", "menin") ?>',
          text: '<?= __("Suas informações foram enviadas com sucesso.", "menin") ?>',
          type: 'success',
          confirmButtonText: '<?= __("Fechar", "menin") ?>'
        });

      }).fail(function(data) {
        Swal.fire({
          title: '<?= __( "Algo deu errado!", "menin") ?>',
          text: `${data.responseJSON.messages.error}`,
          type: 'error',
          confirmButtonText: 'Ok'
        });

      }).always(function() {
        $(btnForm).html('<?= __("Enviar", "menin") ?>');
      });

      <?php echo $count_requireds > 0 ? '}' : '' ?>
    }); // on submit
  </script>

<?php endif; ?>