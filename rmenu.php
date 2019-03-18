<?php
namespace PHPMaker2019\spp_prj;
?>
<?php
namespace PHPMaker2019\spp_prj;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(29, "mi_r0308_kwitansi", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("29", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "r0308_kwitansismry.php", -1, "", AllowListMenu('{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0308_kwitansi'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(28, "mi_r0307_pembayaran", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("28", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "r0307_pembayaransmry.php", -1, "", AllowListMenu('{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0307_pembayaran'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(25, "mi_r0306_uangmasuk", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("25", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "r0306_uangmasuksmry.php", -1, "", AllowListMenu('{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0306_uangmasuk'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(24, "mi_r0305_potensi", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("24", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "r0305_potensismry.php", -1, "", AllowListMenu('{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0305_potensi'), FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>