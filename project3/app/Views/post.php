<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyBlog</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; }

    body {
      background: #f7f5f0;
      font-family: 'DM Sans', sans-serif;
      color: #1a1a18;
    }

    /* ── HERO ── */
    .blog-hero {
      max-width: 760px;
      margin: 0 auto;
      padding: 72px 32px 48px;
    }

    .blog-hero-eyebrow {
      font-size: 11px;
      font-weight: 500;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: #9b8f7a;
      margin-bottom: 14px;
    }

    .blog-hero-title {
      font-family: 'Lora', serif;
      font-size: clamp(38px, 6vw, 58px);
      font-weight: 600;
      line-height: 1.1;
      color: #111;
      margin-bottom: 12px;
    }

    .blog-hero-title em {
      font-style: italic;
      color: #7c6af7;
    }

    .blog-hero-sub {
      font-size: 15px;
      color: #6b6456;
      line-height: 1.7;
      max-width: 480px;
      margin-bottom: 0;
    }

    .blog-hero-divider {
      width: 40px;
      height: 3px;
      background: #7c6af7;
      border-radius: 99px;
      margin: 28px 0;
    }

    /* ── POST LIST ── */
    .blog-posts {
      max-width: 760px;
      margin: 0 auto;
      padding: 0 32px 80px;
    }

    .post-card {
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 20px;
      align-items: start;
      padding: 28px 0;
      border-top: 1px solid #e8e3db;
      text-decoration: none;
      color: inherit;
    }

    .post-card:hover .post-card-title { color: #7c6af7; }
    .post-card:hover .post-card-arrow { opacity: 1; transform: translateX(0); }

    .post-card-num {
      font-family: 'Lora', serif;
      font-size: 11px;
      color: #cdc7bc;
      margin-bottom: 8px;
    }

    .post-card-meta {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
    }

    .post-card-cat {
      font-size: 11px;
      font-weight: 500;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: #7c6af7;
      background: rgba(124, 106, 247, 0.1);
      padding: 3px 10px;
      border-radius: 4px;
    }

    .post-card-title {
      font-family: 'Lora', serif;
      font-size: 22px;
      font-weight: 600;
      line-height: 1.3;
      color: #111;
      margin-bottom: 10px;
      display: block;
      text-decoration: none;
      transition: color 0.2s;
    }

    .post-card-excerpt {
      font-size: 14px;
      color: #6b6456;
      line-height: 1.7;
      margin: 0;
    }

    .post-card-arrow {
      opacity: 0;
      transform: translateX(-4px);
      transition: all 0.2s;
      color: #7c6af7;
      font-size: 22px;
      margin-top: 6px;
    }

    /* ── FOOTER ── */
    .blog-footer {
      border-top: 1px solid #e8e3db;
      max-width: 760px;
      margin: 0 auto;
      padding: 28px 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .blog-footer-copy {
      font-size: 13px;
      color: #9b8f7a;
    }

    .blog-footer-brand {
      font-family: 'Lora', serif;
      font-size: 14px;
      font-weight: 600;
      color: #1a1a18;
    }

    .blog-footer-brand span { color: #7c6af7; }
  </style>
</head>

<body>

  <?= $this->include('layouts/navbar'); ?>

  <!-- HERO -->
  <div class="blog-hero">
    <p class="blog-hero-eyebrow">MyBlog &nbsp;·&nbsp; Writing &amp; Ideas</p>
    <h1 class="blog-hero-title">All <em>Posts</em></h1>
    <p class="blog-hero-sub">A collection of articles, thoughts, and stories.</p>
    <div class="blog-hero-divider"></div>
  </div>

  <!-- POST LIST -->
  <div class="blog-posts">
    <?php foreach ($posts as $i => $post) : ?>
      <div class="post-card">
        <div>
          <p class="post-card-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></p>
          <div class="post-card-meta">
            <span class="post-card-cat">
              <?= $post['category_name'] ?? 'Uncategorized' ?>
            </span>
          </div>
          <a class="post-card-title" href="/post/<?= $post['slug'] ?>">
            <?= $post['title'] ?>
          </a>
          <p class="post-card-excerpt">
            <?= substr($post['content'], 0, 120) ?>...
          </p>
        </div>
        <div class="post-card-arrow">→</div>
      </div>
    <?php endforeach ?>
  </div>

  <!-- FOOTER -->
  <div class="blog-footer">
    <span class="blog-footer-copy">&copy; <?= Date('Y') ?> — All rights reserved</span>
    <span class="blog-footer-brand">My<span>Blog</span></span>
  </div>

  <!-- JS -->
  <script src="<?= base_url('js/jquery.min.js') ?>"></script>
  <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>
</html>