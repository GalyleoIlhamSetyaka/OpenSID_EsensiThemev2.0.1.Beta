<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view($folder_themes . '/commons/meta') ?>
  <?php $this->load->view($folder_themes . '/commons/source_css') ?>
  <?php $this->load->view($folder_themes . '/commons/source_js') ?>
  <style>
    .scrollable-article {
        overflow-y: auto; /* Aktifkan scroll vertikal */
    }
    .scrollbar-hidden::-webkit-scrollbar {
      display: none; /* Sembunyikan scrollbar untuk Webkit (Chrome, Safari) */
    }
    .scrollbar-hidden {
      -ms-overflow-style: none;  /* Sembunyikan scrollbar untuk Internet Explorer dan Edge */
      scrollbar-width: none;  /* Sembunyikan scrollbar untuk Firefox */
    }
  </style>
</head>
<body class="font-primary ">

  <?php if($single_artikel['id']) : ?>
    <?php $this->load->view($folder_themes . '/commons/loading_screen') ?>
    <?php $this->load->view($folder_themes . '/commons/header') ?>
    
    <div class="container mx-auto lg:px-5 px-3 flex flex-col lg:flex-row my-2 gap-3 lg:gap-5 justify-between bg-primary-100">
      <main class="lg:w-full w-full overflow-hidden ">
          <div class="scrollable-article scrollbar-hidden"> <!-- Tambahkan kelas scrollbar-hidden -->
            <?php $this->load->view($folder_themes . '/partials/article'); ?>
            <?php $this->load->view($folder_themes . '/partials/comment') ?>
            <?php $this->load->view($folder_themes . '/commons/sticky_share'); ?>
          </div>
      </main>
    </div>

    <?php $this->load->view($folder_themes .'/commons/footer') ?>

    <?php else : ?>
      <?php $this->load->view($folder_themes .'/commons/404') ?>
  <?php endif ?>

  <script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/script.min.js?" . THEME_VERSION) ?>"></script>

</body>
</html>