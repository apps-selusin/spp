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
if (!isset($r0302_potensi_summary))
	$r0302_potensi_summary = new r0302_potensi_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$r0302_potensi_summary;

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
<script>
currentPageID = ew.PAGE_ID = "summary"; // Page ID
</script>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var fr0302_potensisummary = currentForm = new ew.Form("fr0302_potensisummary");

// Validate method
fr0302_potensisummary.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fr0302_potensisummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fr0302_potensisummary.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fr0302_potensisummary.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
</script>
<?php } ?>
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
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
<div id="ew-center" class="<?php echo $r0302_potensi_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<div id="report_summary">
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="fr0302_potensisummary" id="fr0302_potensisummary" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fr0302_potensisummary-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_TahunAjaran" class="ew-cell form-group">
	<label for="x_TahunAjaran" class="ew-search-caption ew-label"><?php echo $Page->TahunAjaran->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("LIKE"); ?><input type="hidden" name="z_TahunAjaran" id="z_TahunAjaran" value="LIKE"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->TahunAjaran->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="r0302_potensi" data-field="x_TahunAjaran" id="x_TahunAjaran" name="x_TahunAjaran" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($Page->TahunAjaran->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->TahunAjaran->AdvancedSearch->SearchValue) ?>"<?php echo $Page->TahunAjaran->editAttributes() ?>>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_Sekolah" class="ew-cell form-group">
	<label for="x_Sekolah" class="ew-search-caption ew-label"><?php echo $Page->Sekolah->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("LIKE"); ?><input type="hidden" name="z_Sekolah" id="z_Sekolah" value="LIKE"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->Sekolah->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="r0302_potensi" data-field="x_Sekolah" id="x_Sekolah" name="x_Sekolah" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($Page->Sekolah->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->Sekolah->AdvancedSearch->SearchValue) ?>"<?php echo $Page->Sekolah->editAttributes() ?>>
</span>
</div>
</div>
<div id="r_3" class="ew-row d-sm-flex">
<div id="c_Kelas" class="ew-cell form-group">
	<label for="x_Kelas" class="ew-search-caption ew-label"><?php echo $Page->Kelas->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("LIKE"); ?><input type="hidden" name="z_Kelas" id="z_Kelas" value="LIKE"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->Kelas->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="r0302_potensi" data-field="x_Kelas" id="x_Kelas" name="x_Kelas" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($Page->Kelas->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->Kelas->AdvancedSearch->SearchValue) ?>"<?php echo $Page->Kelas->editAttributes() ?>>
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
fr0302_potensisummary.filterList = <?php echo $Page->getFilterList() ?>;
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
	$Page->loadGroupRowValues(TRUE);
	$Page->GroupCounter[0] = 1;
	$Page->GroupCounter[1] = 1;
	$Page->GroupCounter[2] = 1;
	$Page->GroupCounter[3] = 1;
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray($Page->StopGroup - $Page->StartGroup + 1, -1);
while ($Page->GroupRecordset && !$Page->GroupRecordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->GroupCount > 1) { ?>
</tbody>
</table>
</div>
<?php if (!($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "r0302_potensi_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<span data-class="tpb<?php echo $Page->GroupCount - 1 ?>_r0302_potensi"><?php echo $Page->PageBreakContent ?></span>
<?php } ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_r0302_potensi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->TahunAjaran->Visible) { ?>
	<?php if ($Page->TahunAjaran->ShowGroupHeaderAsRow) { ?>
	<td data-field="TahunAjaran">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="TahunAjaran"><div class="r0302_potensi_TahunAjaran"><span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="TahunAjaran">
<?php if ($Page->sortUrl($Page->TahunAjaran) == "") { ?>
		<div class="ew-table-header-btn r0302_potensi_TahunAjaran">
			<span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0302_potensi_TahunAjaran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->TahunAjaran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->TahunAjaran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->TahunAjaran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
	<?php if ($Page->Sekolah->ShowGroupHeaderAsRow) { ?>
	<td data-field="Sekolah">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Sekolah"><div class="r0302_potensi_Sekolah"><span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Sekolah">
<?php if ($Page->sortUrl($Page->Sekolah) == "") { ?>
		<div class="ew-table-header-btn r0302_potensi_Sekolah">
			<span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0302_potensi_Sekolah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Sekolah) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Sekolah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Sekolah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
	<?php if ($Page->Kelas->ShowGroupHeaderAsRow) { ?>
	<td data-field="Kelas">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Kelas"><div class="r0302_potensi_Kelas"><span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Kelas">
<?php if ($Page->sortUrl($Page->Kelas) == "") { ?>
		<div class="ew-table-header-btn r0302_potensi_Kelas">
			<span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0302_potensi_Kelas" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Kelas) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Kelas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Kelas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
	<?php if ($Page->NIS->ShowGroupHeaderAsRow) { ?>
	<td data-field="NIS">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="NIS"><div class="r0302_potensi_NIS"><span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="NIS">
<?php if ($Page->sortUrl($Page->NIS) == "") { ?>
		<div class="ew-table-header-btn r0302_potensi_NIS">
			<span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0302_potensi_NIS" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->NIS) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->NIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->NIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
	<?php if ($Page->Nama->ShowGroupHeaderAsRow) { ?>
	<td data-field="Nama">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Nama"><div class="r0302_potensi_Nama"><span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Nama">
<?php if ($Page->sortUrl($Page->Nama) == "") { ?>
		<div class="ew-table-header-btn r0302_potensi_Nama">
			<span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0302_potensi_Nama" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Nama) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Jumlah"><div class="r0302_potensi_Jumlah"><span class="ew-table-header-caption"><?php echo $Page->Jumlah->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Jumlah">
<?php if ($Page->sortUrl($Page->Jumlah) == "") { ?>
		<div class="ew-table-header-btn r0302_potensi_Jumlah">
			<span class="ew-table-header-caption"><?php echo $Page->Jumlah->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0302_potensi_Jumlah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Jumlah) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Jumlah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Jumlah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Jumlah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Terbayar->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Terbayar"><div class="r0302_potensi_Terbayar"><span class="ew-table-header-caption"><?php echo $Page->Terbayar->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Terbayar">
<?php if ($Page->sortUrl($Page->Terbayar) == "") { ?>
		<div class="ew-table-header-btn r0302_potensi_Terbayar">
			<span class="ew-table-header-caption"><?php echo $Page->Terbayar->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0302_potensi_Terbayar" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Terbayar) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Terbayar->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Terbayar->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Terbayar->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Sisa->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Sisa"><div class="r0302_potensi_Sisa"><span class="ew-table-header-caption"><?php echo $Page->Sisa->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Sisa">
<?php if ($Page->sortUrl($Page->Sisa) == "") { ?>
		<div class="ew-table-header-btn r0302_potensi_Sisa">
			<span class="ew-table-header-caption"><?php echo $Page->Sisa->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0302_potensi_Sisa" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Sisa) ?>',2);">
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

	// Build detail SQL
	$where = DetailFilterSql($Page->TahunAjaran, $Page->getSqlFirstGroupField(), $Page->TahunAjaran->groupValue(), $Page->Dbid);
	if ($Page->PageFirstGroupFilter <> "") $Page->PageFirstGroupFilter .= " OR ";
	$Page->PageFirstGroupFilter .= $where;
	if ($Page->Filter != "")
		$where = "($Page->Filter) AND ($where)";
	$sql = BuildReportSql($Page->getSqlSelect(), $Page->getSqlWhere(), $Page->getSqlGroupBy(), $Page->getSqlHaving(), $Page->getSqlOrderBy(), $where, $Page->Sort);
	$Page->DetailRecordCount = 0;
	if ($Page->Recordset = $Page->getRecordset($sql)) {
		$Page->DetailRecordCount = $Page->Recordset->recordCount();
		if (GetConnectionType($Page->Dbid) == "ORACLE") { // Oracle, cannot moveFirst, use another recordset
			$rswrk = $Page->getRecordset($sql);
			$Page->DetailRows = $rswrk ? $rswrk->getRows() : [];
			$rswrk->close();
		} else {
			$Page->DetailRows = $Page->Recordset ? $Page->Recordset->getRows() : [];
		}
	}
	if ($Page->DetailRecordCount > 0)
		$Page->loadRowValues(TRUE);
	$Page->GroupIndexes[$Page->GroupCount] = [-1];
	$Page->GroupIndexes[$Page->GroupCount][] = [-1];
	$Page->GroupIndexes[$Page->GroupCount][][] = [-1];
	$Page->GroupIndexes[$Page->GroupCount][][][] = [-1];
	while ($Page->Recordset && !$Page->Recordset->EOF) { // Loop detail records
		$Page->RecordCount++;
		$Page->RecordIndex++;
?>
<?php if ($Page->TahunAjaran->Visible && $Page->checkLevelBreak(1) && $Page->TahunAjaran->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 1;
		$Page->TahunAjaran->Count = $Page->getSummaryCount(1);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="TahunAjaran" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $Page->TahunAjaran->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption r0302_potensi_TahunAjaran"><span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->TahunAjaran) == "") { ?>
		<span class="ew-summary-caption r0302_potensi_TahunAjaran">
			<span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r0302_potensi_TahunAjaran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->TahunAjaran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->TahunAjaran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->TahunAjaran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_r0302_potensi_TahunAjaran"<?php echo $Page->TahunAjaran->viewAttributes() ?>><?php echo $Page->TahunAjaran->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TahunAjaran->Count,0,-2,-2,-2) ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php if ($Page->Sekolah->Visible && $Page->checkLevelBreak(2) && $Page->Sekolah->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 2;
		$Page->Sekolah->Count = $Page->getSummaryCount(2);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="Sekolah" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 2) ?>"<?php echo $Page->Sekolah->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption r0302_potensi_Sekolah"><span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->Sekolah) == "") { ?>
		<span class="ew-summary-caption r0302_potensi_Sekolah">
			<span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r0302_potensi_Sekolah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Sekolah) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Sekolah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Sekolah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_r0302_potensi_Sekolah"<?php echo $Page->Sekolah->viewAttributes() ?>><?php echo $Page->Sekolah->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Sekolah->Count,0,-2,-2,-2) ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php if ($Page->Kelas->Visible && $Page->checkLevelBreak(3) && $Page->Kelas->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 3;
		$Page->Kelas->Count = $Page->getSummaryCount(3);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="Kelas" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 3) ?>"<?php echo $Page->Kelas->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption r0302_potensi_Kelas"><span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->Kelas) == "") { ?>
		<span class="ew-summary-caption r0302_potensi_Kelas">
			<span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r0302_potensi_Kelas" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Kelas) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Kelas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Kelas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->GroupCounter[1] ?>_r0302_potensi_Kelas"<?php echo $Page->Kelas->viewAttributes() ?>><?php echo $Page->Kelas->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Kelas->Count,0,-2,-2,-2) ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php if ($Page->NIS->Visible && $Page->checkLevelBreak(4) && $Page->NIS->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 4;
		$Page->NIS->Count = $Page->getSummaryCount(4);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
		<td data-field="NIS"<?php echo $Page->NIS->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="NIS" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 4) ?>"<?php echo $Page->NIS->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption r0302_potensi_NIS"><span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->NIS) == "") { ?>
		<span class="ew-summary-caption r0302_potensi_NIS">
			<span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r0302_potensi_NIS" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->NIS) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->NIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->NIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->GroupCounter[1] ?>_<?php echo $Page->GroupCounter[2] ?>_r0302_potensi_NIS"<?php echo $Page->NIS->viewAttributes() ?>><?php echo $Page->NIS->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->NIS->Count,0,-2,-2,-2) ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php if ($Page->Nama->Visible && $Page->checkLevelBreak(5) && $Page->Nama->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 5;
		$Page->Nama->Count = $Page->getSummaryCount(5);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
		<td data-field="NIS"<?php echo $Page->NIS->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
		<td data-field="Nama"<?php echo $Page->Nama->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="Nama" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 5) ?>"<?php echo $Page->Nama->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption r0302_potensi_Nama"><span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->Nama) == "") { ?>
		<span class="ew-summary-caption r0302_potensi_Nama">
			<span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r0302_potensi_Nama" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Nama) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->GroupCounter[1] ?>_<?php echo $Page->GroupCounter[2] ?>_<?php echo $Page->GroupCounter[3] ?>_r0302_potensi_Nama"<?php echo $Page->Nama->viewAttributes() ?>><?php echo $Page->Nama->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Nama->Count,0,-2,-2,-2) ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->TahunAjaran->Visible) { ?>
	<?php if ($Page->TahunAjaran->ShowGroupHeaderAsRow) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_r0302_potensi_TahunAjaran"<?php echo $Page->TahunAjaran->viewAttributes() ?>><?php echo $Page->TahunAjaran->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
	<?php if ($Page->Sekolah->ShowGroupHeaderAsRow) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_r0302_potensi_Sekolah"<?php echo $Page->Sekolah->viewAttributes() ?>><?php echo $Page->Sekolah->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
	<?php if ($Page->Kelas->ShowGroupHeaderAsRow) { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->GroupCounter[1] ?>_r0302_potensi_Kelas"<?php echo $Page->Kelas->viewAttributes() ?>><?php echo $Page->Kelas->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
	<?php if ($Page->NIS->ShowGroupHeaderAsRow) { ?>
		<td data-field="NIS"<?php echo $Page->NIS->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="NIS"<?php echo $Page->NIS->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->GroupCounter[1] ?>_<?php echo $Page->GroupCounter[2] ?>_r0302_potensi_NIS"<?php echo $Page->NIS->viewAttributes() ?>><?php echo $Page->NIS->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
	<?php if ($Page->Nama->ShowGroupHeaderAsRow) { ?>
		<td data-field="Nama"<?php echo $Page->Nama->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="Nama"<?php echo $Page->Nama->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->GroupCounter[0] ?>_<?php echo $Page->GroupCounter[1] ?>_<?php echo $Page->GroupCounter[2] ?>_<?php echo $Page->GroupCounter[3] ?>_r0302_potensi_Nama"<?php echo $Page->Nama->viewAttributes() ?>><?php echo $Page->Nama->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Jumlah->cellAttributes() ?>>
<span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->getViewValue() ?></span></td>
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

		// Show Footers
?>
<?php
	} // End detail records loop
?>
<?php
		if ($Page->TahunAjaran->Visible) {
?>
<?php
			$Page->TahunAjaran->Count = $Page->getSummaryCount(1, FALSE);
			$Page->Sekolah->Count = $Page->getSummaryCount(2, FALSE);
			$Page->Kelas->Count = $Page->getSummaryCount(3, FALSE);
			$Page->NIS->Count = $Page->getSummaryCount(4, FALSE);
			$Page->Nama->Count = $Page->getSummaryCount(5, FALSE);
			$Page->Jumlah->Count = $Page->Counts[1][1];
			$Page->Jumlah->SumValue = $Page->Summaries[1][1]; // Load SUM
			$Page->Terbayar->Count = $Page->Counts[1][2];
			$Page->Terbayar->SumValue = $Page->Summaries[1][2]; // Load SUM
			$Page->Sisa->Count = $Page->Counts[1][3];
			$Page->Sisa->SumValue = $Page->Summaries[1][3]; // Load SUM
			$Page->resetAttributes();
			$Page->RowType = ROWTYPE_TOTAL;
			$Page->RowTotalType = ROWTOTAL_GROUP;
			$Page->RowTotalSubType = ROWTOTAL_FOOTER;
			$Page->RowGroupLevel = 1;
			$Page->renderRow();
?>
<?php if ($Page->TahunAjaran->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes() ?>>
	<?php if ($Page->TahunAjaran->ShowGroupHeaderAsRow) { ?>
		&nbsp;
	<?php } elseif ($Page->RowGroupLevel <> 1) { ?>
		&nbsp;
	<?php } else { ?>
		<span class="ew-summary-count"><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TahunAjaran->Count,0,-2,-2,-2) ?></span></span>
	<?php } ?>
		</td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->TahunAjaran->cellAttributes() ?>>
	<?php if ($Page->Sekolah->ShowGroupHeaderAsRow) { ?>
		&nbsp;
	<?php } elseif ($Page->RowGroupLevel <> 2) { ?>
		&nbsp;
	<?php } else { ?>
		<span class="ew-summary-count"><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Sekolah->Count,0,-2,-2,-2) ?></span></span>
	<?php } ?>
		</td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->TahunAjaran->cellAttributes() ?>>
	<?php if ($Page->Kelas->ShowGroupHeaderAsRow) { ?>
		&nbsp;
	<?php } elseif ($Page->RowGroupLevel <> 3) { ?>
		&nbsp;
	<?php } else { ?>
		<span class="ew-summary-count"><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Kelas->Count,0,-2,-2,-2) ?></span></span>
	<?php } ?>
		</td>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
		<td data-field="NIS"<?php echo $Page->TahunAjaran->cellAttributes() ?>>
	<?php if ($Page->NIS->ShowGroupHeaderAsRow) { ?>
		&nbsp;
	<?php } elseif ($Page->RowGroupLevel <> 4) { ?>
		&nbsp;
	<?php } else { ?>
		<span class="ew-summary-count"><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->NIS->Count,0,-2,-2,-2) ?></span></span>
	<?php } ?>
		</td>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
		<td data-field="Nama"<?php echo $Page->TahunAjaran->cellAttributes() ?>>
	<?php if ($Page->Nama->ShowGroupHeaderAsRow) { ?>
		&nbsp;
	<?php } elseif ($Page->RowGroupLevel <> 5) { ?>
		&nbsp;
	<?php } else { ?>
		<span class="ew-summary-count"><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Nama->Count,0,-2,-2,-2) ?></span></span>
	<?php } ?>
		</td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->TahunAjaran->cellAttributes() ?>><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->SumViewValue ?></span></span></td>
<?php } ?>
<?php if ($Page->Terbayar->Visible) { ?>
		<td data-field="Terbayar"<?php echo $Page->TahunAjaran->cellAttributes() ?>><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><span<?php echo $Page->Terbayar->viewAttributes() ?>><?php echo $Page->Terbayar->SumViewValue ?></span></span></td>
<?php } ?>
<?php if ($Page->Sisa->Visible) { ?>
		<td data-field="Sisa"<?php echo $Page->TahunAjaran->cellAttributes() ?>><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><span<?php echo $Page->Sisa->viewAttributes() ?>><?php echo $Page->Sisa->SumViewValue ?></span></span></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->GroupColumnCount + $Page->DetailColumnCount > 0) { ?>
		<td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"<?php echo $Page->Sisa->cellAttributes() ?>><?php echo str_replace(["%v", "%c"], [$Page->TahunAjaran->GroupViewValue, $Page->TahunAjaran->caption()], $ReportLanguage->phrase("RptSumHead")) ?> <span class="ew-dir-ltr">(<?php echo FormatNumber($Page->Counts[1][0],0,-2,-2,-2) ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td>
<?php } ?>
	</tr>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo ($Page->GroupColumnCount - 0) ?>"<?php echo $Page->TahunAjaran->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?></td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Sisa->cellAttributes() ?>>
<span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->Terbayar->Visible) { ?>
		<td data-field="Terbayar"<?php echo $Page->Sisa->cellAttributes() ?>>
<span<?php echo $Page->Terbayar->viewAttributes() ?>><?php echo $Page->Terbayar->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->Sisa->Visible) { ?>
		<td data-field="Sisa"<?php echo $Page->Sisa->cellAttributes() ?>>
<span<?php echo $Page->Sisa->viewAttributes() ?>><?php echo $Page->Sisa->SumViewValue ?></span></td>
<?php } ?>
	</tr>
<?php } ?>
<?php

			// Reset level 1 summary
			$Page->resetLevelSummary(1);
		} // End show footer check
?>
<?php

	// Next group
	$Page->loadGroupRowValues();

	// Show header if page break
	if ($Page->Export <> "")
		$Page->ShowHeader = ($Page->ExportPageBreakCount == 0) ? FALSE : ($Page->GroupCount % $Page->ExportPageBreakCount == 0);

	// Page_Breaking server event
	if ($Page->ShowHeader)
		$Page->Page_Breaking($Page->ShowHeader, $Page->PageBreakContent);
	$Page->GroupCount++;
	$Page->GroupCounter[3] = 1;
	$Page->GroupCounter[2] = 1;
	$Page->GroupCounter[1] = 1;
	$Page->GroupCounter[0] = 1;

	// Handle EOF
	if (!$Page->GroupRecordset || $Page->GroupRecordset->EOF)
		$Page->ShowHeader = FALSE;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$Page->Jumlah->Count = $Page->GrandCounts[1];
	$Page->Jumlah->SumValue = $Page->GrandSummaries[1]; // Load SUM
	$Page->Terbayar->Count = $Page->GrandCounts[2];
	$Page->Terbayar->SumValue = $Page->GrandSummaries[2]; // Load SUM
	$Page->Sisa->Count = $Page->GrandCounts[3];
	$Page->Sisa->SumValue = $Page->GrandSummaries[3]; // Load SUM
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->TahunAjaran->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2) ?></span>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate">&nbsp;</td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Jumlah->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->SumViewValue ?></span></td>
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
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Jumlah->cellAttributes() ?>>
<span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->Terbayar->Visible) { ?>
		<td data-field="Terbayar"<?php echo $Page->Terbayar->cellAttributes() ?>>
<span<?php echo $Page->Terbayar->viewAttributes() ?>><?php echo $Page->Terbayar->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->Sisa->Visible) { ?>
		<td data-field="Sisa"<?php echo $Page->Sisa->cellAttributes() ?>>
<span<?php echo $Page->Sisa->viewAttributes() ?>><?php echo $Page->Sisa->SumViewValue ?></span></td>
<?php } ?>
	</tr>
<?php } ?>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_r0302_potensi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
</div>
<?php if (!($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "r0302_potensi_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<?php } ?>
</div>
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
<?php if (!$Page->DrillDown && !$DashboardReport) { ?>
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