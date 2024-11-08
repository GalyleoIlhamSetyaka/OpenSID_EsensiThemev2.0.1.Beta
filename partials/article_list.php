<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $url = site_url('artikel/' . buat_slug($post)) ?>
<?php $abstract = potong_teks(strip_tags($post['isi']), 300) ?>
<?php $image = ($post['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'sedang_' . $post['gambar'])) ?
  AmbilFotoArtikel($post['gambar'], 'sedang') :
  gambar_desa($desa['logo']);
?>

<!-- Article Card -->
<div class="artikel-card bg-white shadow rounded-lg border overflow-hidden">
  <!-- Image Container -->
  <div class="artikel-card__image">
    <img src="<?= $image ?>" 
         alt="<?= $post['judul'] ?>" 
         class="w-full h-full object-cover object-center">
  </div>
  
  <!-- Content Container -->
  <div class="artikel-card__content p-3 lg:p-5">
    <!-- Title -->
    <a href="<?= $url ?>" 
       class="artikel-card__title text-h5 hover:text-primary-100 mb-2 font-semibold line-clamp-2">
      <?= $post['judul'] ?>
    </a>
    
    <!-- Abstract -->
    <p class="artikel-card__abstract text-gray-600 mb-4 line-clamp-3">
      <?= $abstract ?>
    </p>
    
    <!-- Meta Information -->
    <div class="artikel-card__meta">
      <ul class="flex flex-wrap gap-x-4 gap-y-2 text-xs lg:text-sm text-gray-500">
        <li class="flex items-center">
          <i class="fas fa-calendar-alt mr-1 text-primary-100"></i>
          <?= tgl_indo($post['tgl_upload']) ?>
        </li>
        <li class="flex items-center">
          <i class="fas fa-user mr-1 text-primary-100"></i>
          <?= $post['owner'] ?>
        </li>
        <?php if ($post['kategori']) : ?>
          <li class="flex items-center">
            <i class="fas fa-bookmark mr-1 text-primary-100"></i>
            <?= $post['kategori'] ?>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</div>

<style>
  .artikel-card {
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .artikel-card__image {
    height: 200px;
  }

  .artikel-card__content {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }

  .artikel-card__title {
    flex-grow: 1;
  }

  .artikel-card__meta {
    margin-top: auto;
  }

  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }

  .line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }
</style>