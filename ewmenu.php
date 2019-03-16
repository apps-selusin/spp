<?php
namespace PHPMaker2019\spp_prj;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(15, "mi_cf01_home", $MenuLanguage->MenuPhrase("15", "MenuText"), "cf01_home.php", -1, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}cf01_home.php'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(17, "mci_Data_Sekolah", $MenuLanguage->MenuPhrase("17", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t0101_tahunajaran", $MenuLanguage->MenuPhrase("1", "MenuText"), "t0101_tahunajaranlist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0101_tahunajaran'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t0102_sekolah", $MenuLanguage->MenuPhrase("2", "MenuText"), "t0102_sekolahlist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0102_sekolah'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t0103_kelas", $MenuLanguage->MenuPhrase("3", "MenuText"), "t0103_kelaslist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0103_kelas'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t0104_daftarsiswamaster", $MenuLanguage->MenuPhrase("4", "MenuText"), "t0104_daftarsiswamasterlist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0104_daftarsiswamaster'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(6, "mi_t0106_iuran", $MenuLanguage->MenuPhrase("6", "MenuText"), "t0106_iuranlist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0106_iuran'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(33, "mci_Data_Siswa", $MenuLanguage->MenuPhrase("33", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(7, "mi_t0201_siswa", $MenuLanguage->MenuPhrase("7", "MenuText"), "t0201_siswalist.php", 33, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0201_siswa'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(43, "mci_Data_Pembayaran", $MenuLanguage->MenuPhrase("43", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(51, "mci_Entry", $MenuLanguage->MenuPhrase("51", "MenuText"), "t0301_bayarmasteradd.php?showdetail=t0302_bayardetail", 43, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(9, "mi_t0301_bayarmaster", $MenuLanguage->MenuPhrase("9", "MenuText"), "t0301_bayarmasterlist.php", 43, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0301_bayarmaster'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(10039, "mci_Laporan", $MenuLanguage->MenuPhrase("10039", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(10022, "mri_r0304_potensi", $MenuLanguage->MenuPhrase("10022", "MenuText"), "r0304_potensismry.php", 10039, "{1E3116C6-C701-420A-A6D6-A123DF9E6EED}", AllowListMenu('{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0304_potensi'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(15, "mi_cf01_home", $MenuLanguage->MenuPhrase("15", "MenuText"), "cf01_home.php", -1, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}cf01_home.php'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(17, "mci_Data_Sekolah", $MenuLanguage->MenuPhrase("17", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t0101_tahunajaran", $MenuLanguage->MenuPhrase("1", "MenuText"), "t0101_tahunajaranlist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0101_tahunajaran'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t0102_sekolah", $MenuLanguage->MenuPhrase("2", "MenuText"), "t0102_sekolahlist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0102_sekolah'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t0103_kelas", $MenuLanguage->MenuPhrase("3", "MenuText"), "t0103_kelaslist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0103_kelas'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t0104_daftarsiswamaster", $MenuLanguage->MenuPhrase("4", "MenuText"), "t0104_daftarsiswamasterlist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0104_daftarsiswamaster'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(6, "mi_t0106_iuran", $MenuLanguage->MenuPhrase("6", "MenuText"), "t0106_iuranlist.php", 17, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0106_iuran'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(33, "mci_Data_Siswa", $MenuLanguage->MenuPhrase("33", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(7, "mi_t0201_siswa", $MenuLanguage->MenuPhrase("7", "MenuText"), "t0201_siswalist.php", 33, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0201_siswa'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(43, "mci_Data_Pembayaran", $MenuLanguage->MenuPhrase("43", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(51, "mci_Entry", $MenuLanguage->MenuPhrase("51", "MenuText"), "t0301_bayarmasteradd.php?showdetail=t0302_bayardetail", 43, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(9, "mi_t0301_bayarmaster", $MenuLanguage->MenuPhrase("9", "MenuText"), "t0301_bayarmasterlist.php", 43, "", AllowListMenu('{45A85772-754E-4F4B-A197-9291CE1FD3F9}t0301_bayarmaster'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(10039, "mci_Laporan", $MenuLanguage->MenuPhrase("10039", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(10022, "mri_r0304_potensi", $MenuLanguage->MenuPhrase("10022", "MenuText"), "r0304_potensismry.php", 10039, "{1E3116C6-C701-420A-A6D6-A123DF9E6EED}", AllowListMenu('{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0304_potensi'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>