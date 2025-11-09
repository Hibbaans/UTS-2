<?php
$produk = [
    [
        "id" => 1,
        "nama" => "Keyboard Berkabel",
        "gambar" => "img/Keyboard Kabel.png",  
        "harga" => 499000,
        "kategori" => "Keyboard" 
    ],  
    [
        "id" => 2,
        "nama" => "Keyboard Nirkabel",
        "gambar" => "img/Keyboard Nirkabel.png",  
        "harga" => 1899000,
        "kategori" => "Keyboard" 
    ],  
    [
        "id" => 3,
        "nama" => "Mouse Pad",
        "gambar" => "img/Mouse pad.png",  
        "harga" => 40000,
        "kategori" => "Mouse pad" 
    ], 
    [
        "id" => 4,
        "nama" => "Mouse Pad Gaming",
        "gambar" => "img/Mouse Pad Gaming.png",  
        "harga" => 199000,
        "kategori" => "Mouse pad" 
    ],  
    [
        "id" => 5,
        "nama" => "Mouse Kabel",
        "gambar" => "img/Mouse Kabel.png", 
        "harga" => 200000,
        "kategori" => "Mouse" 
    ],  
    [
        "id" => 6,
        "nama" => "Mouse Nirkabel",
        "gambar" => "img/Mouse Nirkabel.png", 
        "harga" => 599000,
        "kategori" => "Mouse" 
    ], 
    [
        "id" => 7,
        "nama" => "Headset Kabel",
        "gambar" => "img/Headset Kabel.png", 
        "harga" => 499000,
        "kategori" => "Headset" 
    ], 
    [
        "id" => 8,
        "nama" => "Headset Nirkabel", 
        "gambar" => "img/Headset Nirkabel.png", 
        "harga" => 2499000,
        "kategori" => "Headset"  
    ], 
    [
        "id" => 9,
        "nama" => "Laptop Gaming",
        "gambar" => "img/Laptop Gaming.png", 
        "harga" => 16999000,  
        "kategori" => "Laptop" 
    ], 
    [
        "id" => 10,
        "nama" => "Laptop Entry-level",
        "gambar" => "img/Laptop Entry-level.png", 
        "harga" => 6999000, 
        "kategori" => "Laptop"
    ], 
    [
        "id" => 11,
        "nama" => "Laptop Professional",
        "gambar" => "img/Laptop profesional.png",  
        "harga" => 30000000,  
        "kategori" => "Laptop"
    ], 
    [
        "id" => 12,
        "nama" => "Laptop 2-in-1",
        "gambar" => "img/Laptop.png", 
        "harga" => 8500000, 
        "kategori" => "Laptop"
    ] 
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANS COMPUTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">ANS COMPUTER</span>
        </div>
    </nav>

    <div class="container mt-4">
        
        <div class="text-center"> <h2 class="mb-3">Produk Kami</h2>
            
            <p class="text-muted small">Pilih produk elektronik favoritmu!</p>

            <div class="mb-3" id="filter-kategori">
                <a href="#" class="btn btn-primary btn-filter" data-filter="semua">Semua</a>
                <a href="#" class="btn btn-outline-primary btn-filter" data-filter="Laptop">Laptop</a>
                <a href="#" class="btn btn-outline-primary btn-filter" data-filter="Mouse">Mouse</a>
                <a href="#" class="btn btn-outline-primary btn-filter" data-filter="Headset">Headset</a>
                <a href="#" class="btn btn-outline-primary btn-filter" data-filter="Keyboard">Keyboard</a>
                <a href="#" class="btn btn-outline-primary btn-filter" data-filter="Mouse pad">Mouse-pad</a>
            </div>
        </div> <div class="row" id="daftar-produk"> 
            
            <?php foreach ($produk as $item) : ?>
            <div class="col-md-3 mb-4 product-col" data-kategori="<?php echo $item['kategori']; ?>">
                <div class="card" data-nama="<?php echo $item['nama']; ?>" data-harga="<?php echo $item['harga']; ?>">
                    <img src="<?php echo $item['gambar']; ?>" class="card-img-top" alt="<?php echo $item['nama']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['nama']; ?></h5>
                        <p class="card-text text-muted small"><?php echo $item['kategori']; ?></p> 
                        <p class="card-text">Rp <?php echo number_format($item['harga']); ?></p>
                        <a href="#" class="btn btn-primary btn-tambah">Tambah ke Keranjang</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        <hr>

        <h2 class="mb-3">Keranjang Belanja</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody id="keranjang-body"> 
                </tbody>
            <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <th id="total-harga">Rp 0</th> 
                </tr>
            </tfoot>
        </table>

    </div> <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>