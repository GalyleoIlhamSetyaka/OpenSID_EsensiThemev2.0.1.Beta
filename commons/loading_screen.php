<?php
  defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div 
  x-data="{loading: true, onLoading() {setTimeout(() => {this.loading = false}, 1500)}}"
  x-init="onLoading()">
  <div
    class="fixed bg-primary-100 left-0 top-0 w-screen h-screen z-[9999] flex-col justify-center flex  items-center"
    x-show="loading">
    <!-- Logo -->
    <div class="mb-8">
      <img src="<?= base_url()?>desa/logo/<?= $desa['logo'] ?>" alt="<?= $desa['nama_desa'] ?>" class="w-50 h-50">
    </div>

    <!-- Text Content -->
    <div class="text-center text-white mb-8">
      <h1 class="text-xl font-bold uppercase mb-10">DESA <?= $desa['nama_desa'] ?></h1>
      <p class="text-lg">
        Kec. <?= $desa['nama_kecamatan'] ?>, Kab. <?= $desa['nama_kabupaten'] ?><br>
        Prov. <?= $desa['nama_propinsi'] ?>
      </p>
    </div>

        <!-- Loading Text -->
        <div class="text-white text-lg tracking-[0.2em] mb-4">L O A D I N G</div>

    <!-- Original Loading Animation -->
    <l-tail-chase size="100" speed="1.75" color="white"></l-tail-chase>

  </div>
</div>

<script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/tailChase.js"></script>

