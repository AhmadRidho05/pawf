# =====================================================================
# [KUSTOM] FILE BARU. Ini "otak" dashboard admin custom:
#   - Branding admin (judul + subtitle)
#   - FITUR 3: STATISTIK dashboard (total, hari ini, 7 hari, terakhir)
#   - Kirim data statistik + pesan terbaru ke templates/admin/index.html
# =====================================================================
from datetime import timedelta

from django.contrib import admin
from django.utils import timezone

from .models import Post


class MessageBoardAdminSite(admin.AdminSite):
	site_header = "💬 Message Board Admin"
	site_title = "Message Board Admin"
	index_title = "Panel Kontrol"

	def each_context(self, request):
		"""Suntik data statistik + pesan terbaru ke dashboard."""
		context = super().each_context(request)

		if request.user.is_authenticated:
			now = timezone.now()
			today = now.replace(hour=0, minute=0, second=0, microsecond=0)
			week_ago = now - timedelta(days=7)

			qs = Post.objects.all()
			last = qs.order_by("-created_at").first()

			context["dashboard_stats"] = {
				"total": qs.count(),
				"today": qs.filter(created_at__gte=today).count(),
				"week": qs.filter(created_at__gte=week_ago).count(),
				"last_at": last.created_at if last else None,
			}
			context["recent_posts"] = list(qs.order_by("-created_at")[:5])

		return context
