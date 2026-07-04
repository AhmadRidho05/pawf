# =====================================================================
# [KUSTOM] File ini diubah. Ringkasan perubahan:
#   - Homepage tetap "view-only" (pengguna cuma lihat, tidak posting)
#   - FITUR 1: cari pesan (search by keyword)
#   - FITUR 2: urutkan pesan (terbaru / terlama)
# =====================================================================
from django.db.models import Q
from django.shortcuts import render

from .models import Post


def post_list(request):
	posts = Post.objects.all()

	# [KUSTOM] FITUR 1 — cari pesan berdasarkan keyword (?q=...)
	query = request.GET.get("q", "").strip()
	if query:
		posts = posts.filter(Q(text__icontains=query))

	# [KUSTOM] FITUR 2 — urutkan (terbaru / terlama) (?sort=baru|lama)
	sort = request.GET.get("sort", "baru")
	order = "created_at" if sort == "lama" else "-created_at"
	posts = posts.order_by(order)

	context = {
		"post_list": posts,
		"query": query,
		"sort": sort,
		"total": Post.objects.count(),
	}
	return render(request, "post_list.html", context)
