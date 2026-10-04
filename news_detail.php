<?php
require_once 'config/database.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    http_response_code(400);
    exit('ID berita tidak valid.');
}

$stmt = $conn->prepare(
    "SELECT judul, isi, tanggal_publish
     FROM berita
     WHERE id = ?"
);

$stmt->bind_param('i', $id);
$stmt->execute();

$result = $stmt->get_result();
$news = $result->fetch_assoc();

if (!$news) {
    http_response_code(404);
    exit('Berita tidak ditemukan.');
}

$pageTitle = $news['judul'];

require 'includes/header.php';
?>

<section class="section">
  <div class="container">

    <div class="section-heading">
      <span class="eyebrow">Berita</span>

      <p class="meta">
        <?= date('d M Y', strtotime($news['tanggal_publish'])) ?>
      </p>

      <h1><?= htmlspecialchars($news['judul']) ?></h1>
    </div>

    <article class="card">
      <p><?= nl2br(htmlspecialchars($news['isi'])) ?></p>
    </article>

    <div class="actions">
      <a class="btn btn-outline" href="news.php">
        Kembali ke Berita
      </a>
    </div>

  </div>
</section>

<?php require 'includes/footer.php'; ?>