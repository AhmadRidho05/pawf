<style>
  .navbar {
    background: rgba(10, 10, 15, 0.85) !important;
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-bottom: 0.5px solid rgba(255, 255, 255, 0.08);
    padding: 0;
    height: 64px;
    font-family: 'DM Sans', sans-serif;
  }

  .navbar-brand {
    font-size: 17px;
    font-weight: 600;
    color: #fff !important;
    letter-spacing: -0.3px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .navbar-brand::before {
    content: '✦';
    font-size: 12px;
    color: #7c6af7;
  }

  .nav-link {
    font-size: 13.5px !important;
    font-weight: 500 !important;
    color: rgba(255, 255, 255, 0.55) !important;
    padding: 7px 14px !important;
    border-radius: 8px;
    transition: all 0.18s ease;
    position: relative;
    letter-spacing: 0.1px;
  }

  .nav-link:hover {
    color: #fff !important;
    background: rgba(255, 255, 255, 0.08);
  }

  .nav-link.active {
    color: #fff !important;
    background: rgba(124, 106, 247, 0.18);
  }

  .nav-link.active::after {
    content: '';
    position: absolute;
    bottom: 4px;
    left: 50%;
    transform: translateX(-50%);
    width: 16px;
    height: 2px;
    background: #7c6af7;
    border-radius: 999px;
  }

  .navbar-search-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 255, 255, 0.07) !important;
    border: 0.5px solid rgba(255, 255, 255, 0.12) !important;
    border-radius: 8px !important;
    padding: 7px 14px !important;
    color: rgba(255, 255, 255, 0.4) !important;
    font-size: 13px;
    transition: all 0.18s;
    font-family: 'DM Sans', sans-serif;
  }

  .navbar-search-btn:hover {
    background: rgba(255, 255, 255, 0.11) !important;
    border-color: rgba(255, 255, 255, 0.22) !important;
    color: rgba(255, 255, 255, 0.7) !important;
  }

  .search-kbd {
    font-size: 10px;
    background: rgba(124, 106, 247, 0.2);
    color: #a99df5;
    border: 0.5px solid rgba(124, 106, 247, 0.3);
    border-radius: 5px;
    padding: 2px 7px;
    font-weight: 600;
    letter-spacing: 0.5px;
  }

  .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.2) !important;
    padding: 5px 8px;
  }

  .navbar-toggler:focus {
    box-shadow: none !important;
  }
</style>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<nav class="navbar navbar-expand-md navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">MyBlog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('post') ?>">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contact') ?>">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('faqs') ?>">FAQ</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <button class="navbar-search-btn" type="submit">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
          Search
          <span class="search-kbd">⌘K</span>
        </button>
      </form>
    </div>
  </div>
</nav>