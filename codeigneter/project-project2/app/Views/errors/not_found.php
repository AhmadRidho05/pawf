<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">
  <title>404 — Halaman Tidak Ditemukan</title>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg: #0a0a0f;
      --surface: #111118;
      --border: rgba(255,255,255,0.07);
      --red: #ff2d2d;
      --red-dim: rgba(255,45,45,0.12);
      --text: #e8e8f0;
      --muted: #5a5a6e;
      --mono: 'Space Mono', monospace;
      --display: 'Syne', sans-serif;
    }

    html, body {
      height: 100%;
      background: var(--bg);
      color: var(--text);
      font-family: var(--display);
      overflow: hidden;
    }

    .orb {
      position: fixed;
      width: 600px;
      height: 600px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255,45,45,0.08) 0%, transparent 70%);
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      pointer-events: none;
      animation: breathe 4s ease-in-out infinite;
    }

    @keyframes breathe {
      0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
      50% { transform: translate(-50%, -50%) scale(1.15); opacity: 0.6; }
    }

    .grid-bg {
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
      background-size: 60px 60px;
      pointer-events: none;
    }

    .wrapper {
      position: relative;
      z-index: 1;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .card-404 {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 3.5rem 3rem;
      max-width: 560px;
      width: 100%;
      position: relative;
      overflow: hidden;
      animation: fadeUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(32px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .card-404::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--red), transparent);
    }

    .card-404::after {
      content: '';
      position: absolute;
      bottom: -60px; right: -60px;
      width: 200px; height: 200px;
      border: 1px solid var(--border);
      border-radius: 50%;
    }

    .tag {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-family: var(--mono);
      font-size: 0.7rem;
      color: var(--red);
      background: var(--red-dim);
      border: 1px solid rgba(255,45,45,0.2);
      border-radius: 4px;
      padding: 4px 10px;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      margin-bottom: 2rem;
      animation: fadeUp 0.7s 0.1s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .tag::before {
      content: '';
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--red);
      animation: blink 1.2s ease-in-out infinite;
    }

    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.2; }
    }

    .error-num {
      font-family: var(--mono);
      font-size: clamp(5rem, 15vw, 8rem);
      font-weight: 700;
      line-height: 1;
      color: var(--red);
      letter-spacing: -4px;
      margin-bottom: 0.25rem;
      animation: fadeUp 0.7s 0.15s cubic-bezier(0.22, 1, 0.36, 1) both;
      text-shadow: 0 0 60px rgba(255,45,45,0.3);
      cursor: default;
    }

    .error-num:hover {
      animation: glitch 0.4s steps(2) forwards;
    }

    @keyframes glitch {
      0%   { text-shadow: 2px 0 var(--red), -2px 0 #00f0ff; }
      25%  { text-shadow: -2px 0 var(--red), 2px 0 #00f0ff; letter-spacing: -6px; }
      50%  { text-shadow: 2px 2px var(--red), -2px -2px #00f0ff; letter-spacing: -2px; }
      75%  { text-shadow: -1px 0 var(--red), 1px 0 #00f0ff; }
      100% { text-shadow: 0 0 60px rgba(255,45,45,0.3); letter-spacing: -4px; }
    }

    .error-label {
      font-size: 1.4rem;
      font-weight: 800;
      color: var(--text);
      margin-bottom: 0.75rem;
      letter-spacing: -0.5px;
      animation: fadeUp 0.7s 0.2s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .error-desc {
      font-family: var(--mono);
      font-size: 0.8rem;
      color: var(--muted);
      line-height: 1.8;
      margin-bottom: 2.5rem;
      animation: fadeUp 0.7s 0.25s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .divider {
      height: 1px;
      background: var(--border);
      margin-bottom: 2rem;
      animation: fadeUp 0.7s 0.28s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .path-box {
      font-family: var(--mono);
      font-size: 0.75rem;
      color: var(--muted);
      background: rgba(255,255,255,0.03);
      border: 1px solid var(--border);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      margin-bottom: 2rem;
      word-break: break-all;
      animation: fadeUp 0.7s 0.3s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .path-box span { color: rgba(255,255,255,0.25); }

    .btn-group-custom {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      animation: fadeUp 0.7s 0.35s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .btn-primary-custom {
      flex: 1;
      min-width: 140px;
      background: var(--red);
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0.75rem 1.5rem;
      font-family: var(--display);
      font-weight: 700;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.2s;
      text-decoration: none;
      text-align: center;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-primary-custom:hover {
      background: #ff4444;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(255,45,45,0.35);
      color: #fff;
    }

    .btn-secondary-custom {
      flex: 1;
      min-width: 140px;
      background: transparent;
      color: var(--muted);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0.75rem 1.5rem;
      font-family: var(--display);
      font-weight: 700;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.2s;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-secondary-custom:hover {
      background: rgba(255,255,255,0.05);
      color: var(--text);
      border-color: rgba(255,255,255,0.15);
    }

    .footer-meta {
      margin-top: 2.5rem;
      padding-top: 1.5rem;
      border-top: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 8px;
      animation: fadeUp 0.7s 0.4s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .meta-badge {
      font-family: var(--mono);
      font-size: 0.7rem;
      color: var(--muted);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .meta-badge .dot {
      width: 6px; height: 6px;
      border-radius: 50%;
      background: #22c55e;
      animation: blink 2s ease-in-out infinite;
    }

    .ci4-logo {
      font-family: var(--mono);
      font-size: 0.7rem;
      color: var(--muted);
      letter-spacing: 0.05em;
    }

    .ci4-logo strong { color: rgba(255,255,255,0.35); }
  </style>
</head>
<body>

  <div class="orb"></div>
  <div class="grid-bg"></div>

  <div class="wrapper">
    <div class="card-404">

      <div class="tag">error_code &middot; not_found</div>

      <div class="error-num">404</div>
      <div class="error-label">Halaman tidak ditemukan</div>

      <p class="error-desc">
        Halaman yang kamu minta tidak ada,<br>
        sudah dihapus, atau URL-nya salah ketik.
      </p>

      <div class="divider"></div>

      <div class="path-box">
        <span>GET &nbsp;</span><?= current_url() ?><br>
        <span>status: </span>404 Not Found
      </div>

      <div class="btn-group-custom">
        <a href="<?= base_url('/') ?>" class="btn-primary-custom">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          Beranda
        </a>
        <button onclick="history.back()" class="btn-secondary-custom">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
          Kembali
        </button>
      </div>

      <div class="footer-meta">
        <div class="meta-badge">
          <div class="dot"></div>
          sistem berjalan normal
        </div>
        <div class="ci4-logo">powered by <strong>CodeIgniter 4</strong></div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>