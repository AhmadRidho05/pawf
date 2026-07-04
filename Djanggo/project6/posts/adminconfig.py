# =====================================================================
# [KUSTOM] FILE BARU. Nyambungin admin site custom ke Django.
#   Didaftarkan di settings.py INSTALLED_APPS (ganti "django.contrib.admin").
# =====================================================================
from django.contrib.admin.apps import AdminConfig


class MessageBoardAdminConfig(AdminConfig):
	# Pakai admin site custom kita (dashboard + statistik)
	default_site = "posts.adminsite.MessageBoardAdminSite"
