<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="space-y-50 sidebar"> <!-- Changed from <aside> to <div> -->
  </form>
  <?php if ($w_cos): ?>
    <?php foreach($w_cos as $widget) : ?>
      <?php
        $judul_widget = [
          'judul_widget' => str_replace('Desa', ucwords($this->setting->sebutan_desa), strip_tags($widget['judul']))
        ];
      ?>
      <div class="shadow rounded-lg bg-white overflow-hidden mb-5">
      <?php if ($widget["jenis_widget"] == 1): ?>
        <?php $this->load->view("{$folder_themes}/widgets/{$widget['isi']}", $judul_widget) ?>
      <?php elseif($widget['jenis_widget'] == 2) : ?>
        <?php $this->load->view("../../{$widget['isi']}", $judul_widget) ?>
      <?php else : ?>
          <div class="box-header">
            <h3 class="box-title"><?= strip_tags($widget['judul']) ?></h3>
          </div>
          <div class="box-body">
              <?= htmlspecialchars_decode(html_entity_decode($widget['isi']), ENT_QUOTES) ?>
          </div>
      <?php endif ?>
      </div>
    <?php endforeach ?>
  <?php endif ?>
</div>