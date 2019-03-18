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
if (!isset($r0305_potensi_summary))
	$r0305_potensi_summary = new r0305_potensi_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$r0305_potensi_summary;

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
var fr0305_potensisummary = currentForm = new ew.Form("fr0305_potensisummary");

// Validate method
fr0305_potensisummary.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fr0305_potensisummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fr0305_potensisummary.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fr0305_potensisummary.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fr0305_potensisummary.lists["x_iuran"] = <?php echo $r0305_potensi_summary->iuran->Lookup->toClientList() ?>;
fr0305_potensisummary.lists["x_iuran"].options = <?php echo JsonEncode($r0305_potensi_summary->iuran->lookupOptions()) ?>;
fr0305_potensisummary.lists["x_tahunajaran"] = <?php echo $r0305_potensi_summary->tahunajaran->Lookup->toClientList() ?>;
fr0305_potensisummary.lists["x_tahunajaran"].options = <?php echo JsonEncode($r0305_potensi_summary->tahunajaran->lookupOptions()) ?>;
fr0305_potensisummary.lists["x_sekolah"] = <?php echo $r0305_potensi_summary->sekolah->Lookup->toClientList() ?>;
fr0305_potensisummary.lists["x_sekolah"].options = <?php echo JsonEncode($r0305_potensi_summary->sekolah->lookupOptions()) ?>;
fr0305_potensisummary.lists["x_kelas"] = <?php echo $r0305_potensi_summary->kelas->Lookup->toClientList() ?>;
fr0305_potensisummary.lists["x_kelas"].options = <?php echo JsonEncode($r0305_potensi_summary->kelas->lookupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $r0305_potensi_summary->CenterContentClass ?>">
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
<form name="fr0305_potensisummary" id="fr0305_potensisummary" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fr0305_potensisummary-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_iuran" class="ew-cell form-group">
	<label for="x_iuran" class="ew-search-caption ew-label"><?php echo $Page->iuran->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="r0305_potensi" data-field="x_iuran" data-value-separator="<?php echo $Page->iuran->displayValueSeparatorAttribute() ?>" id="x_iuran" name="x_iuran"<?php echo $Page->iuran->editAttributes() ?>>
		<?php echo $Page->iuran->selectOptionListHtml("x_iuran") ?>
	</select>
</div>
<?php echo $Page->iuran->Lookup->getParamTag("p_x_iuran") ?>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_tahunajaran" class="ew-cell form-group">
	<label for="x_tahunajaran" class="ew-search-caption ew-label"><?php echo $Page->tahunajaran->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="r0305_potensi" data-field="x_tahunajaran" data-value-separator="<?php echo $Page->tahunajaran->displayValueSeparatorAttribute() ?>" id="x_tahunajaran" name="x_tahunajaran"<?php echo $Page->tahunajaran->editAttributes() ?>>
		<?php echo $Page->tahunajaran->selectOptionListHtml("x_tahunajaran") ?>
	</select>
</div>
<?php echo $Page->tahunajaran->Lookup->getParamTag("p_x_tahunajaran") ?>
</span>
</div>
</div>
<div id="r_3" class="ew-row d-sm-flex">
<div id="c_sekolah" class="ew-cell form-group">
	<label for="x_sekolah" class="ew-search-caption ew-label"><?php echo $Page->sekolah->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="r0305_potensi" data-field="x_sekolah" data-value-separator="<?php echo $Page->sekolah->displayValueSeparatorAttribute() ?>" id="x_sekolah" name="x_sekolah"<?php echo $Page->sekolah->editAttributes() ?>>
		<?php echo $Page->sekolah->selectOptionListHtml("x_sekolah") ?>
	</select>
</div>
<?php echo $Page->sekolah->Lookup->getParamTag("p_x_sekolah") ?>
</span>
</div>
</div>
<div id="r_4" class="ew-row d-sm-flex">
<div id="c_kelas" class="ew-cell form-group">
	<label for="x_kelas" class="ew-search-caption ew-label"><?php echo $Page->kelas->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="r0305_potensi" data-field="x_kelas" data-value-separator="<?php echo $Page->kelas->displayValueSeparatorAttribute() ?>" id="x_kelas" name="x_kelas"<?php echo $Page->kelas->editAttributes() ?>>
		<?php echo $Page->kelas->selectOptionListHtml("x_kelas") ?>
	</select>
</div>
<?php echo $Page->kelas->Lookup->getParamTag("p_x_kelas") ?>
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
fr0305_potensisummary.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_r0305_potensi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->iuran->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="iuran"><div class="r0305_potensi_iuran"><span class="ew-table-header-caption"><?php echo $Page->iuran->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="iuran">
<?php if ($Page->sortUrl($Page->iuran) == "") { ?>
		<div class="ew-table-header-btn r0305_potensi_iuran">
			<span class="ew-table-header-caption"><?php echo $Page->iuran->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0305_potensi_iuran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->iuran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->iuran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->iuran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->iuran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->jenis->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="jenis"><div class="r0305_potensi_jenis"><span class="ew-table-header-caption"><?php echo $Page->jenis->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="jenis">
<?php if ($Page->sortUrl($Page->jenis) == "") { ?>
		<div class="ew-table-header-btn r0305_potensi_jenis">
			<span class="ew-table-header-caption"><?php echo $Page->jenis->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0305_potensi_jenis" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->jenis) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->jenis->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->jenis->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->jenis->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->tahunajaran->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="tahunajaran"><div class="r0305_potensi_tahunajaran"><span class="ew-table-header-caption"><?php echo $Page->tahunajaran->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="tahunajaran">
<?php if ($Page->sortUrl($Page->tahunajaran) == "") { ?>
		<div class="ew-table-header-btn r0305_potensi_tahunajaran">
			<span class="ew-table-header-caption"><?php echo $Page->tahunajaran->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0305_potensi_tahunajaran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->tahunajaran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->tahunajaran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->tahunajaran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->tahunajaran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->sekolah->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="sekolah"><div class="r0305_potensi_sekolah"><span class="ew-table-header-caption"><?php echo $Page->sekolah->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="sekolah">
<?php if ($Page->sortUrl($Page->sekolah) == "") { ?>
		<div class="ew-table-header-btn r0305_potensi_sekolah">
			<span class="ew-table-header-caption"><?php echo $Page->sekolah->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0305_potensi_sekolah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->sekolah) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->sekolah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->sekolah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->sekolah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->kelas->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="kelas"><div class="r0305_potensi_kelas"><span class="ew-table-header-caption"><?php echo $Page->kelas->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="kelas">
<?php if ($Page->sortUrl($Page->kelas) == "") { ?>
		<div class="ew-table-header-btn r0305_potensi_kelas">
			<span class="ew-table-header-caption"><?php echo $Page->kelas->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0305_potensi_kelas" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->kelas) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->kelas->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->kelas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->kelas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->sisa->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="sisa"><div class="r0305_potensi_sisa" style="text-align: right;"><span class="ew-table-header-caption"><?php echo $Page->sisa->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="sisa">
<?php if ($Page->sortUrl($Page->sisa) == "") { ?>
		<div class="ew-table-header-btn r0305_potensi_sisa" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->sisa->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0305_potensi_sisa" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->sisa) ?>',2);" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->sisa->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->sisa->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->sisa->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->iuran->Visible) { ?>
		<td data-field="iuran"<?php echo $Page->iuran->cellAttributes() ?>>
<span<?php echo $Page->iuran->viewAttributes() ?>><?php echo $Page->iuran->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->jenis->Visible) { ?>
		<td data-field="jenis"<?php echo $Page->jenis->cellAttributes() ?>>
<span<?php echo $Page->jenis->viewAttributes() ?>><?php echo $Page->jenis->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->tahunajaran->Visible) { ?>
		<td data-field="tahunajaran"<?php echo $Page->tahunajaran->cellAttributes() ?>>
<span<?php echo $Page->tahunajaran->viewAttributes() ?>><?php echo $Page->tahunajaran->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->sekolah->Visible) { ?>
		<td data-field="sekolah"<?php echo $Page->sekolah->cellAttributes() ?>>
<span<?php echo $Page->sekolah->viewAttributes() ?>><?php echo $Page->sekolah->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->kelas->Visible) { ?>
		<td data-field="kelas"<?php echo $Page->kelas->cellAttributes() ?>>
<span<?php echo $Page->kelas->viewAttributes() ?>><?php echo $Page->kelas->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->sisa->Visible) { ?>
		<td data-field="sisa"<?php echo $Page->sisa->cellAttributes() ?>>
<span<?php echo $Page->sisa->viewAttributes() ?>><?php echo $Page->sisa->getViewValue() ?></span></td>
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
	$Page->sisa->Count = $Page->GrandCounts[6];
	$Page->sisa->SumValue = $Page->GrandSummaries[6]; // Load SUM
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
<?php if ($Page->iuran->Visible) { ?>
		<td data-field="iuran"<?php echo $Page->iuran->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->jenis->Visible) { ?>
		<td data-field="jenis"<?php echo $Page->jenis->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->tahunajaran->Visible) { ?>
		<td data-field="tahunajaran"<?php echo $Page->tahunajaran->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->sekolah->Visible) { ?>
		<td data-field="sekolah"<?php echo $Page->sekolah->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->kelas->Visible) { ?>
		<td data-field="kelas"<?php echo $Page->kelas->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->sisa->Visible) { ?>
		<td data-field="sisa"<?php echo $Page->sisa->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->sisa->viewAttributes() ?>><?php echo $Page->sisa->SumViewValue ?></span></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->iuran->Visible) { ?>
		<td data-field="iuran"<?php echo $Page->iuran->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->jenis->Visible) { ?>
		<td data-field="jenis"<?php echo $Page->jenis->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->tahunajaran->Visible) { ?>
		<td data-field="tahunajaran"<?php echo $Page->tahunajaran->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->sekolah->Visible) { ?>
		<td data-field="sekolah"<?php echo $Page->sekolah->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->kelas->Visible) { ?>
		<td data-field="kelas"<?php echo $Page->kelas->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->sisa->Visible) { ?>
		<td data-field="sisa"<?php echo $Page->sisa->cellAttributes() ?>><span class="ew-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateColon") ?>
<span<?php echo $Page->sisa->viewAttributes() ?>><?php echo $Page->sisa->SumViewValue ?></span></td>
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
<div id="gmp_r0305_potensi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "r0305_potensi_pager.php" ?>
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