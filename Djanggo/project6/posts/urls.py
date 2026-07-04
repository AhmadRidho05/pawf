# =====================================================================
# [KUSTOM] File ini diubah:
#   - Balik ke function-based view `post_list` (dari ListView bawaan)
# =====================================================================
from django.urls import path

from .views import post_list

urlpatterns = [
	path("", post_list, name="home"),
]
