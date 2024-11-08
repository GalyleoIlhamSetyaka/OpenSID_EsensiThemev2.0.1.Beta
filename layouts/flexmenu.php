<?php
// Definisikan base path untuk icons
$icon_path = base_url('vendor/themes/esensi/assets/icons/');
$siteman_url = site_url('siteman');

$flexItems = [
    [
        'icon' => 'presentation.gif',
        'text' => 'Data Wilayah',
        'subtext' => 'Populasi Per Wilayah',
        'href' => 'data-wilayah'
    ],
    [
        'icon' => 'stall.gif',
        'text' => 'Lapak Desa',
        'subtext' => 'Hasil Olahan Warga',
        'href' => 'lapak'
    ],
    [
        'icon' => 'blood-test.gif',
        'text' => 'Golongan Darah',
        'subtext' => 'Data Statistik',
        'href' => 'golongan_darah'
    ],
    [
        'icon' => 'clock.gif',
        'text' => 'Rekam Kehadiran',
        'subtext' => 'di Kantor Desa',
        'href' => $siteman_url
    ],
    [
        'icon' => 'hammer.gif',
        'text' => 'Dokumentasi',
        'subtext' => 'Kegiatan Desa',
        'href' => 'pembangunan'
    ],
    [
        'icon' => 'lawyer-day.gif',
        'text' => 'Produk Hukum',
        'subtext' => 'Peraturan di Desa',
        'href' => 'peraturan-desa'
    ],
    [
        'icon' => 'around-the-world.gif',
        'text' => 'Status SDGs',
        'subtext' => 'Sustainable Goals',
        'href' => 'status-sdgs'
    ],
    [
        'icon' => 'voting.gif',
        'text' => 'DPT',
        'subtext' => 'Calon Pemilih',
        'href' => 'first/dpt'
    ],
    [
        'icon' => 'speaker.gif',
        'text' => 'Lapor',
        'subtext' => 'Pengaduan Warga',
        'href' => 'pengaduan'
    ],
    [
        'icon' => 'handshake.gif',
        'text' => 'Bantuan',
        'subtext' => 'Penerima Manfaat',
        'href' => 'first/statistik/bantuan_penduduk'
    ],
    [
        'icon' => 'photo-gallery.gif',
        'text' => 'Galeri',
        'subtext' => 'Album Foto',
        'href' => 'galeri'
    ],
    [
        'icon' => 'map.gif',
        'text' => 'Peta',
        'subtext' => 'Wilayah Desa',
        'href' => 'peta'
    ]
];
?>

<div class="bg-white rounded-lg shadow-sm p-6 my-8">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php foreach ($flexItems as $item): ?>
            <?php 
            // Cek apakah ini menu Rekam Kehadiran untuk menambahkan atribut target
            $isLoginMenu = ($item['text'] === 'Rekam Kehadiran');
            // Generate URL yang benar untuk setiap item
            $href = $isLoginMenu ? $item['href'] : site_url($item['href']);
            ?>
            <a href="<?= $href ?>" 
               class="flex group bg-white hover:bg-gray-50 rounded-xl p-4 transition-all duration-300 relative overflow-hidden"
               <?= $isLoginMenu ? 'target="_blank"' : '' ?>>
                
                <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 shadow-lg"></div>
                
                <div class="relative flex items-center space-x-4 w-full">
                    <div class="flex-shrink-0 w-12 h-12 rounded-lg overflow-hidden">
                        <img src="<?= $icon_path . $item['icon'] ?>" 
                             alt="<?= $item['text'] ?>" 
                             class="w-full h-full object-cover gif-icon"
                             style="-webkit-filter: grayscale(100%); filter: grayscale(100%);">
                    </div>
                    
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-gray-900 group-hover:text-primary-100 line-clamp-1">
                            <?= $item['text'] ?>
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 group-hover:text-gray-600 line-clamp-1">
                            <?= $item['subtext'] ?>
                        </p>
                    </div>
                </div>

                <div class="absolute bottom-0 left-0 h-1 w-full bg-primary-100 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<style>
:root {
    --primary-50: #F0F7FF;
    --primary-100: #1e3a8a;
    --primary-200: #1e40af;
}

/* Icon Animation Styles */
.gif-icon {
    transition: all 0.3s ease;
}

/* When parent is hovered, remove grayscale from icon */
.group:hover .gif-icon {
    -webkit-filter: grayscale(0%) !important;
    filter: grayscale(0%) !important;
    transform: scale(1.1);
}

/* Card Styles */
.group {
    transition: all 0.3s ease;
}

.group:hover {
    box-shadow: 0 4px 6px -1px rgba(30, 58, 138, 0.1), 0 2px 4px -1px rgba(30, 58, 138, 0.06);
}

/* Line Clamp untuk text overflow */
.line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .grid {
        gap: 0.5rem;
    }
    .p-4 {
        padding: 0.75rem;
    }
    .w-12 {
        width: 2.5rem;
    }
    .h-12 {
        height: 2.5rem;
    }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preload GIFs
    const icons = document.querySelectorAll('.gif-icon');
    icons.forEach(icon => {
        const img = new Image();
        img.src = icon.src;
    });
});
</script>