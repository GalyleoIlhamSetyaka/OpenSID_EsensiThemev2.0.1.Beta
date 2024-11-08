<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style type="text/css">s
  .progress-bar span {
    position: absolute;
    right: 20px;
    color: #000000;
    font-weight: bold;
  }
  
  .scrollable-content {
    max-height: 300px; /* Set maximum height as needed */
    overflow-y: auto;
    scrollbar-width: thin;
  }
  
  /* Styling for scrollbar */
  .scrollable-content::-webkit-scrollbar {
    width: 6px;
  }
  .scrollable-content::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
  }
  .scrollable-content::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
  }
  .scrollable-content::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  .container {
    background: transparent;
    border-radius: 10px; /* Optional: Add border radius for rounded corners */
  }
</style>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 container px-3 lg:px-5 bg-stone-200 " style="margin-top: 20px; margin-bottom: 20px;">
  <?php foreach ($data_widget as $subdatas): ?>
    <div class="shadow bg-white rounded-lg overflow-hidden">
      <h3 class="bg-primary-100 text-white px-5 py-3 text-h5 sticky top-0">
        <div class="text-center"><?= ($subdatas['laporan'])?></div>
      </h3>
      
      <div class="text-center px-5 py-3 bg-white sticky top-[52px] ">
        <span class="text-sm">Realisasi | Anggaran</span>
        <hr class="mt-2"/>
      </div>

      <div class="scrollable-content px-5 pb-4">
        <?php if (is_array($subdatas)): ?>
          <?php foreach ($subdatas as $key => $subdata): ?>
            <?php if (is_array($subdata) && isset($subdata['judul'], $subdata['realisasi'], $subdata['anggaran'], $subdata['persen']) && $key !== 'laporan'): ?>
              <div class="space-y-1 mb-3">
                <span class="text-sm font-bold">
                  <?=
                  \Illuminate\Support\Str::of($subdata['judul'])
                      ->title()
                      ->whenContains('Desa', static function (Illuminate\Support\Stringable $string) {
                          if ($string != 'Dana Desa') {
                              return $string->replace('Desa', setting('sebutan_desa'));
                          }
                      }, static fn (Illuminate\Support\Stringable $string) => $string->append(' ' . setting('sebutan_desa')))
                      ->title();
                  ?>
                </span>
                <div class="text-sm flex justify-between">
                  <span class="text-red-600"><?= rupiah24($subdata['realisasi']); ?></span>
                  <span><?= rupiah24($subdata['anggaran'] + ($subdata['realisasi_jurnal'] ?? 0)); ?></span>
                </div>
                <div class="w-full bg-gray-200 rounded-full overflow-hidden">
                  <div class="bg-cyan-500 text-xs font-medium text-white text-center p-0.5 leading-none rounded-l-full relative" 
                       style="width: <?= $subdata['persen'] ?>%">
                    <span><?= $subdata['persen'] ?>%</span>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>