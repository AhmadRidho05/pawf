# =====================================================================
# [KUSTOM] File ini diubah. Ringkasan perubahan:
#   - Tambah field `created_at` (waktu pesan dibuat, otomatis)
#   - Urutan default: pesan terbaru paling atas
# Cari tag "[KUSTOM]" di seluruh proyek untuk lihat semua perubahan.
# =====================================================================
from django.db import models


class Post(models.Model):
	text = models.TextField()
	created_at = models.DateTimeField(auto_now_add=True)  # [KUSTOM] field waktu baru

	class Meta:
		# [KUSTOM] pesan terbaru tampil paling atas
		ordering = ["-created_at"]

	def __str__(self):
		return self.text[:50]
