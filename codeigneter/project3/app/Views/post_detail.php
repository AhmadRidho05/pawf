<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $post['title'] ?> – MyBlog</title>

  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; }

    body {
      background: #f7f5f0;
      font-family: 'DM Sans', sans-serif;
      color: #1a1a18;
    }

    /* ── HERO ── */
    .post-hero {
      max-width: 700px;
      margin: 0 auto;
      padding: 64px 28px 40px;
    }

    .post-back {
      font-size: 13px;
      color: #7c6af7;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 20px;
      transition: opacity .15s;
    }

    .post-back:hover { opacity: .7; }

    .post-cat-badge {
      display: inline-block;
      font-size: 11px;
      font-weight: 500;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: #534AB7;
      background: #EEEDFE;
      padding: 4px 12px;
      border-radius: 5px;
      margin-bottom: 16px;
    }

    .post-title {
      font-family: 'Lora', serif;
      font-size: clamp(28px, 5vw, 42px);
      font-weight: 600;
      line-height: 1.15;
      color: #111;
      margin-bottom: 24px;
    }

    .post-meta {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 16px 0;
      border-top: 1px solid #e8e3db;
      border-bottom: 1px solid #e8e3db;
      margin-bottom: 40px;
    }

    .post-meta-avatar {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: #EEEDFE;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 600;
      color: #534AB7;
      flex-shrink: 0;
    }

    .post-meta-author {
      font-size: 14px;
      font-weight: 500;
      color: #1a1a18;
      margin: 0;
    }

    .post-meta-date {
      font-size: 13px;
      color: #9b8f7a;
      margin: 0;
    }

    /* ── CONTENT ── */
    .post-wrap {
      max-width: 700px;
      margin: 0 auto;
      padding: 0 28px 80px;
    }

    .post-content {
      font-size: 16px;
      line-height: 1.85;
      color: #3a3830;
      margin-bottom: 56px;
    }

    /* ── COMMENTS ── */
    .section-divider {
      border: none;
      border-top: 1px solid #e8e3db;
      margin: 0 0 32px;
    }

    .section-title {
      font-family: 'Lora', serif;
      font-size: 20px;
      font-weight: 600;
      color: #111;
      margin-bottom: 20px;
    }

    .comment-card {
      background: #fff;
      border: 1px solid #e8e3db;
      border-radius: 12px;
      padding: 18px 20px;
      margin-bottom: 12px;
    }

    .comment-header {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
    }

    .comment-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: #EEEDFE;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 11px;
      font-weight: 600;
      color: #534AB7;
      flex-shrink: 0;
      text-transform: uppercase;
    }

    .comment-name {
      font-size: 14px;
      font-weight: 500;
      color: #1a1a18;
    }

    .comment-text {
      font-size: 14px;
      color: #6b6456;
      line-height: 1.7;
      margin: 0;
    }

    .no-comment {
      font-size: 14px;
      color: #9b8f7a;
      padding: 12px 0;
    }

    /* ── FORM ── */
    .comment-form { margin-top: 36px; }

    .form-label-custom {
      font-size: 13px;
      font-weight: 500;
      color: #6b6456;
      display: block;
      margin-bottom: 6px;
    }

    .form-control-custom {
      width: 100%;
      background: #fff;
      border: 1px solid #ddd8d0;
      border-radius: 8px;
      padding: 10px 14px;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
      color: #1a1a18;
      outline: none;
      transition: border-color .15s;
      margin-bottom: 14px;
    }

    .form-control-custom:focus { border-color: #7c6af7; }

    textarea.form-control-custom {
      min-height: 100px;
      resize: vertical;
    }

    .btn-submit {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #7c6af7;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 10px 22px;
      font-size: 14px;
      font-weight: 500;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      transition: background .15s;
    }

    .btn-submit:hover { background: #634fd4; }

    /* ── FOOTER ── */
    .blog-footer {
      border-top: 1px solid #e8e3db;
      max-width: 700px;
      margin: 0 auto;
      padding: 24px 28px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .footer-copy { font-size: 13px; color: #9b8f7a; }

    .footer-brand {
      font-family: 'Lora', serif;
      font-size: 14px;
      font-weight: 600;
      color: #1a1a18;
    }

    .footer-brand span { color: #7c6af7; }
  </style>
</head>

<body>

<?= $this->include('layouts/navbar'); ?>

<!-- HERO: JUDUL POST -->
<div class="post-hero">
  <a class="post-back" href="<?= base_url('post') ?>">← Kembali ke Blog</a>

  <div class="post-cat-badge">
    <?= $post['category_name'] ?? 'Uncategorized' ?>
  </div>

  <h1 class="post-title"><?= $post['title'] ?></h1>

  <div class="post-meta">
    <div class="post-meta-avatar">
      <?= strtoupper(substr($post['author'], 0, 2)) ?>
    </div>
    <div>
      <p class="post-meta-author"><?= $post['author'] ?></p>
      <p class="post-meta-date"><?= $post['created_at'] ?></p>
    </div>
  </div>
</div>

<!-- KONTEN POST -->
<div class="post-wrap">
  <div class="post-content">
    <?= $post['content'] ?>
  </div>

  <hr class="section-divider">

  <!-- KOMENTAR -->
  <h2 class="section-title">Komentar</h2>

  <?php if (!empty($comments)): ?>
    <?php foreach ($comments as $c): ?>
      <div class="comment-card">
        <div class="comment-header">
          <div class="comment-avatar">
            <?= strtoupper(substr($c['username'], 0, 2)) ?>
          </div>
          <span class="comment-name"><?= $c['username'] ?></span>
        </div>
        <p class="comment-text"><?= $c['content'] ?></p>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p class="no-comment">Belum ada komentar. Jadilah yang pertama!</p>
  <?php endif; ?>

  <!-- FORM KOMENTAR -->
  <div class="comment-form">
    <h3 class="section-title" style="font-size: 16px; margin-bottom: 18px;">Tambah Komentar</h3>

    <form method="post" action="/post/comment">
      <input type="hidden" name="post_id" value="<?= $post['id'] ?>">

      <label class="form-label-custom">Nama</label>
      <input type="text" name="username" class="form-control-custom" placeholder="Nama kamu" required>

      <label class="form-label-custom">Komentar</label>
      <textarea name="content" class="form-control-custom" placeholder="Tulis komentarmu di sini..." required></textarea>

      <button type="submit" class="btn-submit">
        ✦ Kirim Komentar
      </button>
    </form>
  </div>
</div>

<!-- FOOTER -->
<div class="blog-footer">
  <span class="footer-copy">&copy; <?= Date('Y') ?> — All rights reserved</span>
  <span class="footer-brand">My<span>Blog</span></span>
</div>

<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>
</html>