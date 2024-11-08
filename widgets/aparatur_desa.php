<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="box ">
  <div class="box-body h-5">
    <div class="owl-carousel" id="aparatur-carousel">
      <?php foreach ($aparatur_desa['daftar_perangkat'] as $data) : ?>
        <div class="item p-1 mt-10" style="height: auto; width: auto;">
          <div class="relative space-y-1">
            <div class="w-full">
              <img src="<?= $data['foto'] ?>" alt="<?= $data['nama'] ?>" class="object-cover object-center bg-gray-300" style="height: 200px; width: 170px; margin: auto; ">
            </div>
            <?php if ($this->web_widget_model->get_setting('aparatur_desa', 'overlay') == true) : ?>
              <div class="space-y-1 text-sm text-center z-10">
                <span class="text-h6"><?= $data['nama'] ?></span>
                <span class="block"><?= $data['jabatan'] ?></span>
                <?php if ($data['pamong_niap']) : ?>
                  <span class="block"><?= $this->setting->sebutan_nip_desa ?> : <?= $data['pamong_niap'] ?></span>
                <?php endif ?>
                <?php if ($data['kehadiran'] == 1) : ?>
                  <?php if ($data['status_kehadiran'] == 'hadir') : ?>
                    <span class="btn btn-primary w-auto mx-auto inline-block">Hadir</span>
                  <?php endif ?>
                  <?php if ($data['tanggal'] == date('Y-m-d') && $data['status_kehadiran'] != 'hadir') : ?>
                    <span class="btn btn-danger w-auto mx-auto inline-block"><?= ucwords($data['status_kehadiran']); ?></span>
                  <?php endif ?>  
                  <?php if ($data['tanggal'] != date('Y-m-d')) : ?>
                    <span class="btn btn-danger w-auto mx-auto inline-block">Belum Rekam Kehadiran</span>
                  <?php endif ?>
                <?php endif ?>
              </div>
            <?php endif ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $("#aparatur-carousel").owlCarousel({
      items: 4,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      loop: true,
      margin: 5,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
    });
  });
</script>