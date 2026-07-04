"""
=======================================================================
 jelaskan_perubahan.py
-----------------------------------------------------------------------
 Script buat NGEJELASIN semua perubahan yang dibuat di project5.

 Cara jalanin (dari folder project5):
     python jelaskan_perubahan.py

 Script ini:
   1. Nampilin ringkasan fitur + file yang diubah/ditambah.
   2. Nge-scan seluruh proyek, nyari tag "[KUSTOM]", lalu nampilin
      lokasinya (file : baris) beserta penjelasan tiap perubahan.

 Tips: buka file mana pun, search kata "KUSTOM" -> ketemu semua ubahan.
=======================================================================
"""

import sys
from pathlib import Path

# Biar emoji & teks Indonesia gak error di terminal Windows
try:
	sys.stdout.reconfigure(encoding="utf-8")
except Exception:
	pass

BASE_DIR = Path(__file__).resolve().parent
TAG = "[KUSTOM]"

# Folder & ekstensi yang discan
SKIP_DIRS = {".venv", "__pycache__", ".git", "node_modules"}
SCAN_EXT = {".py", ".html", ".css", ".txt", ".md"}


# ---------------------------------------------------------------------
# 1. RINGKASAN STATIS
# ---------------------------------------------------------------------
FITUR = [
	("FITUR 1", "Cari pesan", "Homepage — filter pesan berdasarkan keyword (?q=...)"),
	("FITUR 2", "Urutkan pesan", "Homepage — chip Terbaru / Terlama (?sort=...)"),
	("FITUR 3", "Statistik dashboard", "Admin — total, hari ini, 7 hari, pesan terakhir"),
]

FILES = [
	# (status, path, keterangan)
	("UBAH ", "posts/models.py", "+ field created_at & urutan terbaru"),
	("UBAH ", "posts/views.py", "search + sort (view-only)"),
	("UBAH ", "posts/admin.py", "tabel admin Post dipercantik"),
	("UBAH ", "posts/urls.py", "balik ke function view"),
	("UBAH ", "django_project/settings.py", "static dir + admin site custom"),
	("UBAH ", "templates/post_list.html", "redesign homepage total"),
	("BARU ", "posts/adminsite.py", "admin site custom + statistik dashboard"),
	("BARU ", "posts/adminconfig.py", "nyambungin admin custom ke Django"),
	("BARU ", "templates/admin/base_site.html", "inject CSS + branding admin"),
	("BARU ", "templates/admin/index.html", "layout dashboard admin"),
	("BARU ", "static/css/style.css", "tema tampilan homepage"),
	("BARU ", "static/admin/css/custom_admin.css", "tema tampilan admin (indigo)"),
	("BARU ", "posts/migrations/0002_*.py", "migrasi field created_at"),
	("HAPUS", "posts/forms.py", "bekas form kirim pesan (tak dipakai lagi)"),
]


def garis(char="=", n=71):
	print(char * n)


def judul(teks):
	print()
	garis()
	print(f"  {teks}")
	garis()


def ringkasan():
	judul("RINGKASAN PERUBAHAN PROJECT5 (Message Board)")

	print("\n  FITUR YANG DITAMBAHKAN:")
	for kode, nama, ket in FITUR:
		print(f"    - {kode}: {nama}")
		print(f"        {ket}")

	print("\n  FILE YANG DIUBAH / DITAMBAH / DIHAPUS:")
	for status, path, ket in FILES:
		print(f"    [{status}] {path}")
		print(f"            -> {ket}")


# ---------------------------------------------------------------------
# 2. SCAN TAG [KUSTOM]
# ---------------------------------------------------------------------
def bersihin(baris):
	"""Buang simbol komentar biar penjelasan enak dibaca."""
	s = baris.strip()
	for pembuka in ("#", "{#", "/*", "*", "<!--"):
		if s.startswith(pembuka):
			s = s[len(pembuka):].strip()
	for penutup in ("#}", "*/", "-->"):
		if s.endswith(penutup):
			s = s[: -len(penutup)].strip()
	return s


def scan_tag():
	judul(f'LOKASI SEMUA TAG "{TAG}" DI DALAM KODE')
	total = 0
	files_kena = 0

	for path in sorted(BASE_DIR.rglob("*")):
		if path.is_dir():
			continue
		if any(bagian in SKIP_DIRS for bagian in path.parts):
			continue
		if path.suffix not in SCAN_EXT:
			continue
		if path.name == Path(__file__).name:
			continue  # jangan scan diri sendiri

		try:
			lines = path.read_text(encoding="utf-8").splitlines()
		except Exception:
			continue

		hits = [(i + 1, ln) for i, ln in enumerate(lines) if TAG in ln]
		if not hits:
			continue

		files_kena += 1
		rel = path.relative_to(BASE_DIR)
		print(f"\n  📄 {rel}")
		for no, ln in hits:
			total += 1
			print(f"      baris {no:>3}: {bersihin(ln)}")

	print()
	garis("-")
	print(f"  Total: {total} tag di {files_kena} file.")
	print(f'  (Buka file & search "{TAG}" untuk lompat ke tiap perubahan.)')


# ---------------------------------------------------------------------
def main():
	ringkasan()
	scan_tag()
	print()


if __name__ == "__main__":
	main()
