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
$sideMenu->addMenuItem(22, "mi_r0304_potensi", $ReportLanguage->phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->menuPhrase("22", "MenuText") . $ReportLanguage->phrase("DetailSummaryReportMenuItemSuffix"), "r0304_potensismry.php", -1, "", AllowListMenu('{1E3116C6-C701-420A-A6D6-A123DF9E6EED}r0304_potensi'), FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>