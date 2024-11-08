<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
  #map_canvas, #map_wilayah {
    height: 250px !important; 
  }
</style>

<div class="container">
    <?php if($transparansi) $this->load->view($folder_themes .'/partials/apbdesa', $transparansi) ?>
</div>

<?php $this->load->view($folder_themes .'/commons/back_to_top') ?>

<footer class="max-w-screen-xl md:px-8 lg:px-10 mx-auto bg-neutral-700">

  <!-- Container Grid untuk Maps dan Detail -->
  <div class="container mx-auto p-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 container px-3 lg:px-5 bg-neutral-700 rounded-sm overflow-hidden">
      <!-- Peta Lokasi Kantor -->
      <div class="bg-gray-200 p-6 mb-3 order-2 z-10">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 bg-gray-700 rounded-sm overflow-hidden">
      <h3 class="text-xl font-bold text-center text-white">Lokasi Kantor</h3>
        </div>
        <div id="map_canvas" class="w-full h-48 bg-gray-300 rounded"></div>
      </div>

        <!-- Detail desa -->
      <div class="text-white p-6 order-1 lg:order-2">
        <div class="space-y-0.2 flex flex-col items-center">
          <div class="flex items-center gap-2 justify-center">
            <img src="<?= base_url()?>desa/logo/<?= $desa['logo'] ?>" 
                alt="<?= $desa['nama_desa'] ?>" 
                class="w-50 h-50 mx-auto">
          </div>
          <div class="flex items-center gap-2 justify-center w-full">
            <i class="fas fa-map-marker-alt w-6 text-center"></i>
            <span><?=$desa['alamat_kantor']?></span>
          </div>
          <div class="flex items-center gap-2 justify-center w-full">
            <i class="fas fa-home w-6 text-center"></i>
            <span><?=ucwords($this->setting->sebutan_desa)?>: <?=$desa['nama_desa']?></span>
          </div>
          <div class="flex items-center gap-2 justify-center w-full">
            <i class="fas fa-building w-6 text-center"></i>
            <span><?=ucwords($this->setting->sebutan_kecamatan)?>: <?=$desa['nama_kecamatan']?></span>
          </div>
          <div class="flex items-center gap-2 justify-center w-full">
            <i class="fas fa-city w-6 text-center"></i>
            <span><?=ucwords($this->setting->sebutan_kabupaten)?>: <?=$desa['nama_kabupaten']?></span>
          </div>
          <div class="flex items-center gap-2 justify-center w-full">
            <i class="fas fa-mailbox w-6 text-center"></i>
            <span>Kodepos: <?=$desa['kode_pos']?></span>
          </div>
          <div class="flex items-center gap-2 justify-center w-full">
            <i class="fas fa-phone w-6 text-center"></i>
            <span>Telepon: <?=$desa['telepon']?></span>
          </div>
          <div class="flex items-center gap-2 justify-center w-full">
            <i class="fas fa-envelope w-6 text-center"></i>
            <span>Email: <?=$desa['email_desa']?></span>
          </div>

          <!-- Social Media Section -->
          <div class="flex justify-center gap-4 mt-1">
            <?php 
              $social_media = [
                'facebook' => ['color' => 'bg-blue-600', 'icon' => 'fa-facebook-f'],
                'twitter' => ['color' => 'bg-blue-400', 'icon' => 'fa-twitter'],
                'instagram' => ['color' => 'bg-pink-500', 'icon' => 'fa-instagram'],
                'telegram' => ['color' => 'bg-blue-500', 'icon' => 'fa-telegram'],
                'whatsapp' => ['color' => 'bg-green-500', 'icon' => 'fa-whatsapp'],
                'youtube' => ['color' => 'bg-red-500', 'icon' => 'fa-youtube']
              ];
            ?>

            <?php foreach($sosmed as $social) : ?>
              <?php if($social['link']) : ?>
                <?php $info = $social_media[strtolower($social['nama'])]; ?>
                <a href="<?= $social['link'] ?>" 
                   target="_blank" 
                   class="<?= $info['color'] ?> p-2 rounded-full hover:opacity-80 transition-opacity">
                  <i class="fab <?= $info['icon'] ?> text-white"></i>
                </a>
              <?php endif ?>
            <?php endforeach ?>
          </div>
        </div>
      </div>

      <!-- Peta Wilayah -->
      <div class="bg-gray-200 p-6">
        <div class="box-header flex items-center justify-center rounded-sm gap-2 z-10">
          <h3 class="text-xl font-bold text-white">Peta Wilayah</h3>
        </div>
        <div id="map_wilayah" class="w-full h-48 bg-gray-300 "></div>
      </div>
    </div>
  </div>

  <!-- Social Media Section -->
  <?php 
    $social_media = [
      'facebook' => ['color' => 'bg-blue-600', 'icon' => 'fa-facebook-f'],
      'twitter' => ['color' => 'bg-blue-400', 'icon' => 'fa-twitter'],
      'instagram' => ['color' => 'bg-pink-500', 'icon' => 'fa-instagram'],
      'telegram' => ['color' => 'bg-blue-500', 'icon' => 'fa-telegram'],
      'whatsapp' => ['color' => 'bg-green-500', 'icon' => 'fa-whatsapp'],
      'youtube' => ['color' => 'bg-red-500', 'icon' => 'fa-youtube']
    ];
  ?>

  <?php foreach($sosmed as $social) : ?>
    <?php if($social['link']) : ?>  
      <?php $social_media[strtolower($social['nama'])]['link'] = $social['link']; ?>
    <?php endif ?>
  <?php endforeach ?>

  <div class="bg-zinc-700 text-white py-5 px-5 rounded-t-xl text-sm flex flex-col gap-3 lg:flex-row justify-center items-center text-center lg:text-left">
    <span class="space-y-2">
        <p>Hak cipta situs &copy; <?= date('Y') ?> - <?= NAMA_DESA ?></p>
        <p><a href="https://www.trivusi.web.id" class="underline decoration-pink-500 underline-offset-1 decoration-2" target="_blank" rel="noopener">Esensi <?= THEME_VERSION ?></a> - <a href="https://opensid.my.id" class="underline decoration-green-500 underline-offset-1 decoration-2" target="_blank" rel="noopener">OpenSID <?= ambilVersi() ?></a> -
        <?php if (file_exists('mitra')): ?>
            Hosting didukung <a href="https://my.idcloudhost.com/aff.php?aff=3172" rel="noopener noreferrer" target="_blank">
            <img src="<?= base_url('/assets/images/Logo-IDcloudhost.png')?>" class="h-4 inline-block" alt="Logo-IDCloudHost" title="Logo-IDCloudHost"></a>
        <?php endif; ?>
        </p>
    </span>
    <?php if (setting('tte')): ?>
        <div class="space-x-1">
            <img src="<?=asset('assets/images/bsre.png?v', false); ?>" alt="Bsre" class="img-responsive" style="width: 185px;" />
        </div>
    <?php endif ?>
  </div>
</footer>

<script>
  // Common map configuration
  <?php if (!empty($data_config['lat']) && !empty($data_config['lng'])): ?>
    var posisi = [<?=$data_config['lat'].",".$data_config['lng']?>];
    var zoom = <?=$data_config['zoom'] ?: 10?>;
  <?php else: ?>
    var posisi = [-1.0546279422758742,116.71875000000001];
    var zoom = 10;
  <?php endif; ?>

  var options = {
    maxZoom: <?= setting('max_zoom_peta') ?>,
    minZoom: <?= setting('min_zoom_peta') ?>,
  };

  // Office location map
  var lokasi_kantor = L.map('map_canvas', options).setView(posisi, zoom);
  var baseLayers = getBaseLayers(lokasi_kantor, "<?= setting('mapbox_key') ?>", "<?= setting('jenis_peta') ?>");
  L.control.layers(baseLayers, null, {position: 'topright', collapsed: true}).addTo(lokasi_kantor);

  <?php if (!empty($data_config['lat']) && !empty($data_config['lng'])): ?>
    var kantor_desa = L.marker(posisi).addTo(lokasi_kantor);
  <?php endif; ?>

  // Region map
  var style_polygon = {
    stroke: true,
    color: '#FF0000',
    opacity: 1,
    weight: 2,
    fillColor: '#8888dd',
    fillOpacity: 0.5
  };

  var wilayah_desa = L.map('map_wilayah', options).setView(posisi, zoom);
  var baseLayers = getBaseLayers(wilayah_desa, "<?= setting('mapbox_key') ?>", "<?= setting('jenis_peta') ?>");
  L.control.layers(baseLayers, null, {position: 'topright', collapsed: true}).addTo(wilayah_desa);

  <?php if (!empty($data_config['path'])): ?>
    var polygon_desa = <?= $data_config['path']; ?>;
    var kantor_desa = L.polygon(polygon_desa, style_polygon).bindTooltip("Wilayah Desa").addTo(wilayah_desa);
    wilayah_desa.fitBounds(kantor_desa.getBounds());
  <?php endif; ?>
</script>