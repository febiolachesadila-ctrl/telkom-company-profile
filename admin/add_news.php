<?php
$pageTitle = 'Tambah Berita';
require '../includes/header.php';
?>

<section class="section">
  <div class="container">

    <div class="section-heading">
      <span class="eyebrow">Admin</span>
      <h1>Tambah Berita</h1>
      <p class="lead">
        Form sederhana untuk menambahkan berita ke database.
      </p>
    </div>

    <form class="card" action="save_news.php" method="post">

      <div class="form-group">
        <label for="judul">Judul</label>
        <input id="judul" name="judul" required>
      </div>

      <div class="form-group">
        <label for="ringkasan">Ringkasan</label>
        <textarea id="ringkasan" name="ringkasan" required></textarea>
      </div>

      <div class="form-group">
        <label for="isi">Isi Berita</label>
        <textarea id="isi" name="isi" required></textarea>
      </div>

      <button class="btn btn-primary" type="submit">
        Simpan Berita
      </button>

    </form>

  </div>
</section>

<?php require '../includes/footer.php'; ?>