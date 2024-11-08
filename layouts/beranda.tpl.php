<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
  $title = (!empty($judul_kategori)) ? $judul_kategori : 'Artikel Terkini';
  $slug = 'terkini';
  if (is_array($title)) {
    $slug = $title['slug'];
    $title = $title['kategori'];
  }
?>
<div class="container mx-auto my-8 lg:px-5 px-3 text-gray-600">
  <main class="w-full space-y-5 mt-5">
    
    <!-- Slider Section (only on the homepage) -->
    <?php if (empty($cari AND count($slider_gambar ?? []) > 0) AND $this->uri->segment(2) != 'kategori' AND ($this->uri->segment(2) !== 'index' AND $this->uri->segment(1) !== 'index')) : ?>
      <div class="flex flex-col">
        <div class="lg:w-full w-full h-full lg:h-[680px] mx-1">
          <?php $this->load->view($folder_themes . '/partials/slider') ?>
        </div>
      </div>
    <?php endif; ?>
      
    <!-- Menu Box -->
    <?php $this->load->view($folder_themes . '/layouts/flexmenu'); ?>

    <!-- Category Title / Latest Articles -->
    <div class="card p-4 rounded-lg text-slate-500">
      <div class="w-full my-5 text-center text-primary-100">
        <h3 class="text-h3 font-semibold cursor-pointer" onclick="window.location.href='<?= site_url('arsip') ?>'"><?= $title ?></h3>
      </div>

      <!-- Articles List -->
      <div class="my-1 relative">
        <?php if ($artikel) : ?>
          <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach ($artikel as $post) : ?>
              <?php $data['post'] = $post ?>
              <div>  
                <?php $this->load->view($folder_themes . '/partials/article_list', $data) ?>
              </div>
            <?php endforeach ?>
          </div>
        <?php else : ?>
          <?php $data['title'] = $title ?>
          <?php $this->load->view($folder_themes . '/partials/empty_article', $data) ?>
        <?php endif ?>

      
        <!-- Pagination -->
        <div class="pagination flex flex-wrap justify-center space-y-1 mt-4">
          <?php $this->load->view($folder_themes . '/commons/paging', $data) ?>
        </div>
      </div>
    </div>

    <!-- Gallery Section -->
    <div class="galleri mt-5 bg-white shadow rounded-lg overflow-hidden h-[500px]">
      <h3 class="text-xl font-bold text-white text-center bg-primary-100 py-3 ">Galeri Foto</h3>

      <!-- Owl Carousel for the gallery -->
      <div class="galleri owl-carousel owl-theme h-[500px]">
        <?php foreach ($w_gal as $data): ?>
          <?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
            <div class="item">
              <a href='<?= site_url("first/sub_gallery/$data[id]"); ?>' title="<?= "Album : $data[nama]" ?>" class="flex-shrink-0 w-full h-full overflow-hidden">
                <img src="<?= AmbilGaleri($data['gambar'],'kecil') ?>" alt="<?= "Album : $data[nama]" ?>" class="object-cover w-full h-full">
              </a>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Widgets Carousel Section -->
    <div class="mt-5 relative group h-[400px]"> <!-- Added fixed height -->
      <!-- Navigation Arrows -->
      <div class="slider-nav">
        <span class="slider-nav-prev px-1 py-2 cursor-pointer transition-all duration-300 bg-primary-100 shadow absolute top-1/2 left-0 transform -translate-y-1/2 z-[99]" title="Sebelumnya">
          <i class="fas fa-chevron-left text-lg text-white px-3"></i>
        </span>
        <span class="slider-nav-next px-1 py-2 cursor-pointer transition-all duration-300 bg-primary-100 shadow absolute top-1/2 right-0 transform -translate-y-1/2 z-[99]" title="Selanjutnya">
          <i class="fas fa-chevron-right text-lg text-white px-3"></i>
        </span>
      </div>

      <!-- Widgets Container -->
      <div class="owl-carousel widget-carousel h-full z-1"> <!-- Added full height -->
        <?php if ($w_cos): ?>
          <?php foreach($w_cos as $widget) : ?>
            <?php
              $judul_widget = [
                'judul_widget' => str_replace('Desa', ucwords($this->setting->sebutan_desa), strip_tags($widget['judul']))
              ];
            ?>
            <div class="item h-full"> <!-- Added full height -->
              <div class="shadow rounded-lg bg-white p-4 h-full flex flex-col"> <!-- Added flex column -->
                <?php if ($widget["jenis_widget"] == 1): ?>
                  <div class="h-full flex flex-col"> <!-- Added flex container -->
                    <?php $this->load->view("{$folder_themes}/widgets/{$widget['isi']}", $judul_widget) ?>
                  </div>
                <?php elseif($widget['jenis_widget'] == 2) : ?>
                  <div class="h-full flex flex-col"> <!-- Added flex container -->
                    <?php $this->load->view("../../{$widget['isi']}", $judul_widget) ?>
                  </div>
                <?php else : ?>
                  <div class="box-header">
                    <h3 class="text-lg font-bold mb-3">
                      <?php if(isset($widget['icon'])): ?>
                        <i class="<?= $widget['icon'] ?> mr-5"></i>
                      <?php endif; ?>
                      <?= strip_tags($widget['judul']) ?>
                    </h3>
                  </div>
                  <div class="box-body flex-grow overflow-auto"> <!-- Added flex-grow and overflow -->
                    <?= htmlspecialchars_decode(html_entity_decode($widget['isi']), ENT_QUOTES) ?>
                  </div>
                <?php endif ?>
              </div>
            </div>
            <?php if ($w_cos): ?>
            <?php endif; ?>
          <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
      
    <!-- Village Staff Section -->
    <div class="mt-5 bg-white shadow rounded-lg overflow-hidden">
      <h3 class="text-xl font-bold text-white text-center bg-primary-100 py-3 ">Aparatur Desa</h3>
      <?php $this->load->view($folder_themes . '/widgets/aparatur_desa', ['judul_widget' => 'Aparatur Desa']) ?>
    </div>

  </main>
</div>

<style type="text/css">
  .widget-carousel .owl-stage-outer {
  padding: 10px 0;
}

.widget-carousel .item {
  height: 100%;
}

.widget-carousel .shadow {
  height: 100%;
  transition: all 0.3s ease;
}

.widget-carousel .shadow:hover {
  transform: translateY(-5px);
}
</style>

<script>
  $(document).ready(function() {
  $(".galleri .owl-carousel").owlCarousel({
    loop: true,
    margin: 16,
    nav: false,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      640: {
        items: 3
      },
      1024: {
        items: 3
      }
    }
    });
  });

  $(document).ready(function() {
    $(".widget-carousel").owlCarousel({
      loop: true,
      margin: 16,
      nav: false,
      dots: false,
      responsive: {
        0: {
          items: 1
        },
        640: {
          items: 2
        },
        1024: {
          items: 3
        }
      }
    });

    // Custom Navigation
    $(".slider-nav-prev").click(function() {
      $(".widget-carousel").trigger('prev.owl.carousel');
    });

    $(".slider-nav-next").click(function() {
      $(".widget-carousel").trigger('next.owl.carousel');
    });
  });
</script>