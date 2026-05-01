<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">MyBlog</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">

            <!-- LEFT MENU -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/post') ?>">Blog</a>
                </li>
            </ul>

            <!-- RIGHT MENU -->
            <ul class="navbar-nav align-items-center">

                <li class="nav-item me-2">
                    <a href="<?= base_url('admin/post/new') ?>"
                       class="btn btn-primary btn-sm">New Post</a>
                </li>

                <li class="nav-item">
                    <?php if (logged_in()) : ?>
                        <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                    <?php else: ?>
                        <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                    <?php endif; ?>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- HEADER -->
<div class="p-5 mb-4 bg-light rounded-3 mt-5">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Blog Admin</h1>
    </div>
</div>

<!-- CONTENT -->
<div class="container">

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th width="250">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['id'] ?></td>

                <td>
                    <strong><?= $post['title'] ?></strong><br>
                    <small class="text-muted"><?= $post['created_at'] ?></small>
                </td>

                <td>
                    <?php if ($post['status'] === 'published'): ?>
                        <span class="badge bg-success">Published</span>
                    <?php else: ?>
                        <span class="badge bg-secondary"><?= $post['status'] ?></span>
                    <?php endif; ?>
                </td>

                <td>
                    <a href="<?= base_url('admin/post/'.$post['id'].'/preview') ?>"
                       class="btn btn-sm btn-outline-secondary" target="_blank">
                        Preview
                    </a>

                    <a href="<?= base_url('admin/post/'.$post['id'].'/edit') ?>"
                       class="btn btn-sm btn-outline-primary">
                        Edit
                    </a>

                    <a href="#"
                       data-href="<?= base_url('admin/post/'.$post['id'].'/delete') ?>"
                       onclick="confirmToDelete(this)"
                       class="btn btn-sm btn-outline-danger">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

</div>

<!-- MODAL DELETE -->
<div id="confirm-dialog" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h5>Are you sure?</h5>
                <p>Data akan dihapus permanen.</p>
            </div>

            <div class="modal-footer">
                <a href="#" id="delete-button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>

<!-- SCRIPT -->
<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

<script>
function confirmToDelete(el) {
    document.getElementById("delete-button")
        .setAttribute("href", el.dataset.href);

    const modal = new bootstrap.Modal(
        document.getElementById('confirm-dialog')
    );

    modal.show();
}
</script>

<!-- FOOTER -->
<div class="container py-4">
    <footer class="text-muted border-top pt-3 mt-4">
        &copy; <?= date('Y') ?>
    </footer>
</div>

</body>
</html>