<?php
namespace PHPMaker2019\spp_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($r0304_potensi_summary))
	$r0304_potensi_summary = new r0304_potensi_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$r0304_potensi_summary;

// Run the page
$Page->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "summary"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fr0304_potensisummary = currentForm = new ew.Form("fr0304_potensisummary");

// Validate method
fr0304_potensisummary.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fr0304_potensisummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fr0304_potensisummary.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fr0304_potensisummary.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $r0304_potensi_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fr0304_potensisummary" id="fr0304_potensisummary" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fr0304_potensisummary-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_Iuran" class="ew-cell form-group">
	<label for="x_Iuran" class="ew-search-caption ew-label"><?php echo $Page->Iuran->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("="); ?><input type="hidden" name="z_Iuran" id="z_Iuran" value="="></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->Iuran->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="r0304_potensi" data-field="x_Iuran" id="x_Iuran" name="x_Iuran" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($Page->Iuran->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->Iuran->AdvancedSearch->SearchValue) ?>"<?php echo $Page->Iuran->editAttributes() ?>>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_TahunAjaran" class="ew-cell form-group">
	<label for="x_TahunAjaran" class="ew-search-caption ew-label"><?php echo $Page->TahunAjaran->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("="); ?><input type="hidden" name="z_TahunAjaran" id="z_TahunAjaran" value="="></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->TahunAjaran->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="r0304_potensi" data-field="x_TahunAjaran" id="x_TahunAjaran" name="x_TahunAjaran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($Page->TahunAjaran->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->TahunAjaran->AdvancedSearch->SearchValue) ?>"<?php echo $Page->TahunAjaran->editAttributes() ?>>
</span>
</div>
</div>
<div id="r_3" class="ew-row d-sm-flex">
<div id="c_Sekolah" class="ew-cell form-group">
	<label for="x_Sekolah" class="ew-search-caption ew-label"><?php echo $Page->Sekolah->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("="); ?><input type="hidden" name="z_Sekolah" id="z_Sekolah" value="="></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->Sekolah->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="r0304_potensi" data-field="x_Sekolah" id="x_Sekolah" name="x_Sekolah" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($Page->Sekolah->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->Sekolah->AdvancedSearch->SearchValue) ?>"<?php echo $Page->Sekolah->editAttributes() ?>>
</span>
</div>
</div>
<div id="r_4" class="ew-row d-sm-flex">
<div id="c_Kelas" class="ew-cell form-group">
	<label for="x_Kelas" class="ew-search-caption ew-label"><?php echo $Page->Kelas->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("="); ?><input type="hidden" name="z_Kelas" id="z_Kelas" value="="></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->Kelas->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="r0304_potensi" data-field="x_Kelas" id="x_Kelas" name="x_Kelas" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($Page->Kelas->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->Kelas->AdvancedSearch->SearchValue) ?>"<?php echo $Page->Kelas->editAttributes() ?>>
</span>
</div>
</div>
<div class="ew-row d-sm-flex">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><?php echo $ReportLanguage->phrase("Search") ?></button>
<button type="reset" name="btn-reset" id="btn-reset" class="btn hide"><?php echo $ReportLanguage->phrase("Reset") ?></button>
</div>
</div>
</form>
<script>
fr0304_potensisummary.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_r0304_potensi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->Iuran->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Iuran"><div class="r0304_potensi_Iuran"><span class="ew-table-header-caption"><?php echo $Page->Iuran->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Iuran">
<?php if ($Page->sortUrl($Page->Iuran) == "") { ?>
		<div class="ew-table-header-btn r0304_potensi_Iuran">
			<span class="ew-table-header-caption"><?php echo $Page->Iuran->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0304_potensi_Iuran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Iuran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Iuran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Iuran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Iuran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->TahunAjaran->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="TahunAjaran"><div class="r0304_potensi_TahunAjaran"><span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="TahunAjaran">
<?php if ($Page->sortUrl($Page->TahunAjaran) == "") { ?>
		<div class="ew-table-header-btn r0304_potensi_TahunAjaran">
			<span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0304_potensi_TahunAjaran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->TahunAjaran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->TahunAjaran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->TahunAjaran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Sekolah"><div class="r0304_potensi_Sekolah"><span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Sekolah">
<?php if ($Page->sortUrl($Page->Sekolah) == "") { ?>
		<div class="ew-table-header-btn r0304_potensi_Sekolah">
			<span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0304_potensi_Sekolah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Sekolah) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Sekolah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Sekolah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Kelas"><div class="r0304_potensi_Kelas"><span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Kelas">
<?php if ($Page->sortUrl($Page->Kelas) == "") { ?>
		<div class="ew-table-header-btn r0304_potensi_Kelas">
			<span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0304_potensi_Kelas" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Kelas) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Kelas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Kelas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Potensi->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Potensi"><div class="r0304_potensi_Potensi" style="text-align: right;"><span class="ew-table-header-caption"><?php echo $Page->Potensi->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Potensi">
<?php if ($Page->sortUrl($Page->Potensi) == "") { ?>
		<div class="ew-table-header-btn r0304_potensi_Potensi" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->Potensi->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0304_potensi_Potensi" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Potensi) ?>',2);" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->Potensi->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Potensi->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Potensi->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Terbayar->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Terbayar"><div class="r0304_potensi_Terbayar" style="text-align: right;"><span class="ew-table-header-caption"><?php echo $Page->Terbayar->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Terbayar">
<?php if ($Page->sortUrl($Page->Terbayar) == "") { ?>
		<div class="ew-table-header-btn r0304_potensi_Terbayar" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->Terbayar->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0304_potensi_Terbayar" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Terbayar) ?>',2);" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->Terbayar->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Terbayar->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Terbayar->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Sisa->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Sisa"><div class="r0304_potensi_Sisa" style="text-align: right;"><span class="ew-table-header-caption"><?php echo $Page->Sisa->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Sisa">
<?php if ($Page->sortUrl($Page->Sisa) == "") { ?>
		<div class="ew-table-header-btn r0304_potensi_Sisa" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->Sisa->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0304_potensi_Sisa" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Sisa) ?>',2);" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->Sisa->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Sisa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Sisa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->Iuran->Visible) { ?>
		<td data-field="Iuran"<?php echo $Page->Iuran->cellAttributes() ?>>
<span<?php echo $Page->Iuran->viewAttributes() ?>><?php echo $Page->Iuran->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes() ?>>
<span<?php echo $Page->TahunAjaran->viewAttributes() ?>><?php echo $Page->TahunAjaran->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes() ?>>
<span<?php echo $Page->Sekolah->viewAttributes() ?>><?php echo $Page->Sekolah->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes() ?>>
<span<?php echo $Page->Kelas->viewAttributes() ?>><?php echo $Page->Kelas->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Potensi->Visible) { ?>
		<td data-field="Potensi"<?php echo $Page->Potensi->cellAttributes() ?>>
<span<?php echo $Page->Potensi->viewAttributes() ?>><?php echo $Page->Potensi->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Terbayar->Visible) { ?>
		<td data-field="Terbayar"<?php echo $Page->Terbayar->cellAttributes() ?>>
<span<?php echo $Page->Terbayar->viewAttributes() ?>><?php echo $Page->Terbayar->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Sisa->Visible) { ?>
		<td data-field="Sisa"<?php echo $Page->Sisa->cellAttributes() ?>>
<span<?php echo $Page->Sisa->viewAttributes() ?>><?php echo $Page->Sisa->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$Page->Potensi->Count = $Page->GrandCounts[5];
	$Page->Potensi->SumValue = $Page->GrandSummaries[5]; // Load SUM
	$Page->Terbayar->Count = $Page->GrandCounts[6];
	$Page->Terbayar->SumValue = $Page->GrandSummaries[6]; // Load SUM
	$Page->Sisa->Count = $Page->GrandCounts[7];
	$Page->Sisa->SumValue = $Page->GrandSummaries[7]; // Load SUM
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2) ?></span>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate">&nbsp;</td>
<?php } ?>
<?php if ($Page->Iuran->Visible) { ?>
		<td data-field="Iuran"<?php echo $Page->Iuran->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Potensi->Visible) { ?>
		<td data-field="Potensi"<?php echo $Page->Potensi->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->Potensi->viewAttributes() ?>><?php echo $Page->Potensi->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->Terbayar->Visible) { ?>
		<td data-field="Terbayar"<?php echo $Page->Terbayar->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->Terbayar->viewAttributes() ?>><?php echo $Page->Terbayar->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->Sisa->Visible) { ?>
		<td data-field="Sisa"<?php echo $Page->Sisa->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->Sisa->viewAttributes() ?>><?php echo $Page->Sisa->SumViewValue ?></span></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->Iuran->Visible) { ?>
		<td data-field="Iuran"<?php echo $Page->Iuran->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Potensi->Visible) { ?>
		<td data-field="Potensi"<?php echo $Page->Potensi->cellAttributes() ?>><span class="ew-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateColon") ?>
<span<?php echo $Page->Potensi->viewAttributes() ?>><?php echo $Page->Potensi->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->Terbayar->Visible) { ?>
		<td data-field="Terbayar"<?php echo $Page->Terbayar->cellAttributes() ?>><span class="ew-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateColon") ?>
<span<?php echo $Page->Terbayar->viewAttributes() ?>><?php echo $Page->Terbayar->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->Sisa->Visible) { ?>
		<td data-field="Sisa"<?php echo $Page->Sisa->cellAttributes() ?>><span class="ew-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateColon") ?>
<span<?php echo $Page->Sisa->viewAttributes() ?>><?php echo $Page->Sisa->SumViewValue ?></span></td>
<?php } ?>
	</tr>
<?php } ?>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_r0304_potensi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "r0304_potensi_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>