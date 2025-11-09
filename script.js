document.addEventListener("DOMContentLoaded", function () {
  const daftarProduk = document.getElementById("daftar-produk");
  const keranjangBody = document.getElementById("keranjang-body");
  const totalHargaElement = document.getElementById("total-harga");
  const filterContainer = document.getElementById("filter-kategori");
  const productColumns = document.querySelectorAll(
    "#daftar-produk .product-col"
  );

  let totalHarga = 0;
  let itemDiKeranjang = new Set();

  function formatRupiah(angka) {
    return "Rp " + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function updateTotal() {
    totalHargaElement.textContent = formatRupiah(totalHarga);
  }

  daftarProduk.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-tambah")) {
      e.preventDefault();

      const card = e.target.closest(".card");
      const namaProduk = card.dataset.nama;
      const hargaProduk = parseInt(card.dataset.harga);

      if (itemDiKeranjang.has(namaProduk)) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Produk yang kamu pilih sudah ada dalam keranjang!",
        });
        return;
      }

      itemDiKeranjang.add(namaProduk);

      const row = document.createElement("tr");
      row.dataset.nama = namaProduk;
      row.dataset.harga = hargaProduk;
      row.innerHTML = `
                <td>${namaProduk}</td>
                <td>${formatRupiah(hargaProduk)}</td>
                <td>
                    <a href="#" class="btn btn-danger btn-sm btn-batal">Batalkan</a>
                </td>
            `;
      keranjangBody.appendChild(row);

      totalHarga += hargaProduk;
      updateTotal();
    }
  });

  keranjangBody.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-batal")) {
      e.preventDefault();

      Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Anda akan menghapus produk ini dari keranjang.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Jangan Hapus",
      }).then((result) => {
        if (result.isConfirmed) {
          const row = e.target.closest("tr");
          const namaProduk = row.dataset.nama;
          const hargaProduk = parseInt(row.dataset.harga);

          itemDiKeranjang.delete(namaProduk);
          totalHarga -= hargaProduk;
          updateTotal();
          row.remove();

          Swal.fire("Terhapus!", "Produk telah dihapus.", "success");
        }
      });
    }
  });

  filterContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-filter")) {
      e.preventDefault();

      filterContainer.querySelectorAll(".btn-filter").forEach((btn) => {
        btn.classList.remove("btn-primary");
        btn.classList.add("btn-outline-primary");
      });

      e.target.classList.add("btn-primary");
      e.target.classList.remove("btn-outline-primary");

      const filter = e.target.dataset.filter;

      productColumns.forEach((col) => {
        const kategoriProduk = col.dataset.kategori;

        if (filter === "semua" || kategoriProduk === filter) {
          col.style.display = "block";
        } else {
          col.style.display = "none";
        }
      });
    }
  });
});
