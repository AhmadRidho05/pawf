# =====================================================================
# [KUSTOM] File ini diubah. Ringkasan perubahan:
#   - Tampilan admin model Post dipercantik: kolom waktu, filter tanggal,
#     kotak search, dan date hierarchy.
#   - Dashboard + statistik ada di file terpisah: posts/adminsite.py
# =====================================================================
from django.contrib import admin

from .models import Post


@admin.register(Post)
class PostAdmin(admin.ModelAdmin):
	# [KUSTOM] konfigurasi tampilan tabel admin Post
	list_display = ("text", "created_at")
	list_filter = ("created_at",)
	search_fields = ("text",)
	date_hierarchy = "created_at"
	ordering = ("-created_at",)
