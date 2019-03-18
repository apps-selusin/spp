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
if (!isset($r0308_kwitansi_summary))
	$r0308_kwitansi_summary = new r0308_kwitansi_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$r0308_kwitansi_summary;

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
var fr0308_kwitansisummary = currentForm = new ew.Form("fr0308_kwitansisummary");

// Validate method
fr0308_kwitansisummary.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fr0308_kwitansisummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fr0308_kwitansisummary.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fr0308_kwitansisummary.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown || $Page->Export <> "" && $Page->CustomExport <> "") { ?>
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
<div id="ew-center" class="<?php echo $r0308_kwitansi_summary->CenterContentClass ?>">
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
<form name="fr0308_kwitansisummary" id="fr0308_kwitansisummary" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fr0308_kwitansisummary-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_Nomor" class="ew-cell form-group">
	<label for="x_Nomor" class="ew-search-caption ew-label"><?php echo $Page->Nomor->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("="); ?><input type="hidden" name="z_Nomor" id="z_Nomor" value="="></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->Nomor->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="r0308_kwitansi" data-field="x_Nomor" id="x_Nomor" name="x_Nomor" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($Page->Nomor->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->Nomor->AdvancedSearch->SearchValue) ?>"<?php echo $Page->Nomor->editAttributes() ?>>
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
fr0308_kwitansisummary.filterList = <?php echo $Page->getFilterList() ?>;
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
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "r0308_kwitansi_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<span data-class="tpb<?php echo $Page->GroupCount - 1 ?>_r0308_kwitansi"><?php echo $Page->PageBreakContent ?></span>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_r0308_kwitansi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->Nomor->Visible) { ?>
	<?php if ($Page->Nomor->ShowGroupHeaderAsRow) { ?>
	<td data-field="Nomor">&nbsp;</td>
	<?php } else { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Nomor"><div class="r0308_kwitansi_Nomor"><span class="ew-table-header-caption"><?php echo $Page->Nomor->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Nomor">
<?php if ($Page->sortUrl($Page->Nomor) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Nomor">
			<span class="ew-table-header-caption"><?php echo $Page->Nomor->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Nomor" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Nomor) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Nomor->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Nomor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Nomor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($Page->TahunAjaran->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="TahunAjaran"><div class="r0308_kwitansi_TahunAjaran"><span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="TahunAjaran">
<?php if ($Page->sortUrl($Page->TahunAjaran) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_TahunAjaran">
			<span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_TahunAjaran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->TahunAjaran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->TahunAjaran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->TahunAjaran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->TahunAjaran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Sekolah"><div class="r0308_kwitansi_Sekolah"><span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Sekolah">
<?php if ($Page->sortUrl($Page->Sekolah) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Sekolah">
			<span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Sekolah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Sekolah) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Sekolah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Sekolah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Sekolah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Kelas"><div class="r0308_kwitansi_Kelas"><span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Kelas">
<?php if ($Page->sortUrl($Page->Kelas) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Kelas">
			<span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Kelas" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Kelas) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Kelas->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Kelas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Kelas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="NIS"><div class="r0308_kwitansi_NIS"><span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="NIS">
<?php if ($Page->sortUrl($Page->NIS) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_NIS">
			<span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_NIS" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->NIS) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->NIS->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->NIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->NIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Nama"><div class="r0308_kwitansi_Nama"><span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Nama">
<?php if ($Page->sortUrl($Page->Nama) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Nama">
			<span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Nama" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Nama) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Nama->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Iuran->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Iuran"><div class="r0308_kwitansi_Iuran"><span class="ew-table-header-caption"><?php echo $Page->Iuran->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Iuran">
<?php if ($Page->sortUrl($Page->Iuran) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Iuran">
			<span class="ew-table-header-caption"><?php echo $Page->Iuran->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Iuran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Iuran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Iuran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Iuran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Iuran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Jenis->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Jenis"><div class="r0308_kwitansi_Jenis"><span class="ew-table-header-caption"><?php echo $Page->Jenis->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Jenis">
<?php if ($Page->sortUrl($Page->Jenis) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Jenis">
			<span class="ew-table-header-caption"><?php echo $Page->Jenis->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Jenis" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Jenis) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Jenis->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Jenis->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Jenis->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Tanggal->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Tanggal"><div class="r0308_kwitansi_Tanggal"><span class="ew-table-header-caption"><?php echo $Page->Tanggal->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Tanggal">
<?php if ($Page->sortUrl($Page->Tanggal) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Tanggal">
			<span class="ew-table-header-caption"><?php echo $Page->Tanggal->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Tanggal" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Tanggal) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Tanggal->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Tanggal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Tanggal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Periode1->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Periode1"><div class="r0308_kwitansi_Periode1"><span class="ew-table-header-caption"><?php echo $Page->Periode1->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Periode1">
<?php if ($Page->sortUrl($Page->Periode1) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Periode1">
			<span class="ew-table-header-caption"><?php echo $Page->Periode1->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Periode1" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Periode1) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Periode1->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Periode1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Periode1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Periode2->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Periode2"><div class="r0308_kwitansi_Periode2"><span class="ew-table-header-caption"><?php echo $Page->Periode2->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Periode2">
<?php if ($Page->sortUrl($Page->Periode2) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Periode2">
			<span class="ew-table-header-caption"><?php echo $Page->Periode2->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Periode2" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Periode2) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Periode2->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Periode2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Periode2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Jumlah"><div class="r0308_kwitansi_Jumlah"><span class="ew-table-header-caption"><?php echo $Page->Jumlah->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Jumlah">
<?php if ($Page->sortUrl($Page->Jumlah) == "") { ?>
		<div class="ew-table-header-btn r0308_kwitansi_Jumlah">
			<span class="ew-table-header-caption"><?php echo $Page->Jumlah->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0308_kwitansi_Jumlah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Jumlah) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Jumlah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Jumlah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Jumlah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
	$where = DetailFilterSql($Page->Nomor, $Page->getSqlFirstGroupField(), $Page->Nomor->groupValue(), $Page->Dbid);
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
	$Page->GroupIndexes[$Page->GroupCount] = $Page->DetailRecordCount;
	while ($Page->Recordset && !$Page->Recordset->EOF) { // Loop detail records
		$Page->RecordCount++;
		$Page->RecordIndex++;
?>
<?php if ($Page->Nomor->Visible && $Page->checkLevelBreak(1) && $Page->Nomor->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_TOTAL;
		$Page->RowTotalType = ROWTOTAL_GROUP;
		$Page->RowTotalSubType = ROWTOTAL_HEADER;
		$Page->RowGroupLevel = 1;
		$Page->Nomor->Count = $Page->getSummaryCount(1);
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->Nomor->Visible) { ?>
		<td data-field="Nomor"<?php echo $Page->Nomor->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="Nomor" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $Page->Nomor->cellAttributes() ?>>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
		<span class="ew-summary-caption r0308_kwitansi_Nomor"><span class="ew-table-header-caption"><?php echo $Page->Nomor->caption() ?></span></span>
<?php } else { ?>
	<?php if ($Page->sortUrl($Page->Nomor) == "") { ?>
		<span class="ew-summary-caption r0308_kwitansi_Nomor">
			<span class="ew-table-header-caption"><?php echo $Page->Nomor->caption() ?></span>
		</span>
	<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r0308_kwitansi_Nomor" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Nomor) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->Nomor->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Nomor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Nomor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</span>
	<?php } ?>
<?php } ?>
		<?php echo $ReportLanguage->phrase("SummaryColon") ?>
<span data-class="tpx<?php echo $Page->GroupCount ?>_r0308_kwitansi_Nomor"<?php echo $Page->Nomor->viewAttributes() ?>><?php echo $Page->Nomor->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Nomor->Count,0,-2,-2,-2) ?></span>)</span>
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
<?php if ($Page->Nomor->Visible) { ?>
	<?php if ($Page->Nomor->ShowGroupHeaderAsRow) { ?>
		<td data-field="Nomor"<?php echo $Page->Nomor->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="Nomor"<?php echo $Page->Nomor->cellAttributes(); ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_r0308_kwitansi_Nomor"<?php echo $Page->Nomor->viewAttributes() ?>><?php echo $Page->Nomor->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->TahunAjaran->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_TahunAjaran"><span<?php echo $Page->TahunAjaran->viewAttributes() ?>><?php echo $Page->TahunAjaran->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Sekolah->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Sekolah"><span<?php echo $Page->Sekolah->viewAttributes() ?>><?php echo $Page->Sekolah->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Kelas->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Kelas"><span<?php echo $Page->Kelas->viewAttributes() ?>><?php echo $Page->Kelas->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
		<td data-field="NIS"<?php echo $Page->NIS->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_NIS"><span<?php echo $Page->NIS->viewAttributes() ?>><?php echo $Page->NIS->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
		<td data-field="Nama"<?php echo $Page->Nama->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Nama"><span<?php echo $Page->Nama->viewAttributes() ?>><?php echo $Page->Nama->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Iuran->Visible) { ?>
		<td data-field="Iuran"<?php echo $Page->Iuran->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Iuran"><span<?php echo $Page->Iuran->viewAttributes() ?>><?php echo $Page->Iuran->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Jenis->Visible) { ?>
		<td data-field="Jenis"<?php echo $Page->Jenis->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Jenis"><span<?php echo $Page->Jenis->viewAttributes() ?>><?php echo $Page->Jenis->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Tanggal->Visible) { ?>
		<td data-field="Tanggal"<?php echo $Page->Tanggal->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Tanggal"><span<?php echo $Page->Tanggal->viewAttributes() ?>><?php echo $Page->Tanggal->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Periode1->Visible) { ?>
		<td data-field="Periode1"<?php echo $Page->Periode1->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Periode1"><span<?php echo $Page->Periode1->viewAttributes() ?>><?php echo $Page->Periode1->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Periode2->Visible) { ?>
		<td data-field="Periode2"<?php echo $Page->Periode2->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Periode2"><span<?php echo $Page->Periode2->viewAttributes() ?>><?php echo $Page->Periode2->getViewValue() ?></span></span></td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Jumlah->cellAttributes() ?>>
<span data-class="tpx<?php echo $Page->GroupCount ?>_<?php echo $Page->RecordCount ?>_r0308_kwitansi_Jumlah"><span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->getViewValue() ?></span></span></td>
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
		if ($Page->Nomor->Visible) {
?>
<?php
			$Page->Nomor->Count = $Page->getSummaryCount(1, FALSE);
			$Page->Jumlah->Count = $Page->Counts[1][11];
			$Page->Jumlah->SumValue = $Page->Summaries[1][11]; // Load SUM
			$Page->resetAttributes();
			$Page->RowType = ROWTYPE_TOTAL;
			$Page->RowTotalType = ROWTOTAL_GROUP;
			$Page->RowTotalSubType = ROWTOTAL_FOOTER;
			$Page->RowGroupLevel = 1;
			$Page->renderRow();
?>
<?php if ($Page->Nomor->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->Nomor->Visible) { ?>
		<td data-field="Nomor"<?php echo $Page->Nomor->cellAttributes() ?>>
	<?php if ($Page->Nomor->ShowGroupHeaderAsRow) { ?>
		&nbsp;
	<?php } elseif ($Page->RowGroupLevel <> 1) { ?>
		&nbsp;
	<?php } else { ?>
		<span class="ew-summary-count"><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->Nomor->Count,0,-2,-2,-2) ?></span></span>
	<?php } ?>
		</td>
<?php } ?>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
		<td data-field="NIS"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
		<td data-field="Nama"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Iuran->Visible) { ?>
		<td data-field="Iuran"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Jenis->Visible) { ?>
		<td data-field="Jenis"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Tanggal->Visible) { ?>
		<td data-field="Tanggal"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Periode1->Visible) { ?>
		<td data-field="Periode1"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Periode2->Visible) { ?>
		<td data-field="Periode2"<?php echo $Page->Nomor->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Nomor->cellAttributes() ?>><span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><span data-class="tpgs<?php echo $Page->GroupCount ?>_r0308_kwitansi_Jumlah"><span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->SumViewValue ?></span></span></span></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->GroupColumnCount + $Page->DetailColumnCount > 0) { ?>
		<td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"<?php echo $Page->Jumlah->cellAttributes() ?>><?php echo str_replace(["%v", "%c"], [$Page->Nomor->GroupViewValue, $Page->Nomor->caption()], $ReportLanguage->phrase("RptSumHead")) ?> <span class="ew-dir-ltr">(<?php echo FormatNumber($Page->Counts[1][0],0,-2,-2,-2) ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td>
<?php } ?>
	</tr>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo ($Page->GroupColumnCount - 0) ?>"<?php echo $Page->Nomor->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?></td>
<?php } ?>
<?php if ($Page->TahunAjaran->Visible) { ?>
		<td data-field="TahunAjaran"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Sekolah->Visible) { ?>
		<td data-field="Sekolah"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Kelas->Visible) { ?>
		<td data-field="Kelas"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->NIS->Visible) { ?>
		<td data-field="NIS"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
		<td data-field="Nama"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Iuran->Visible) { ?>
		<td data-field="Iuran"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Jenis->Visible) { ?>
		<td data-field="Jenis"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Tanggal->Visible) { ?>
		<td data-field="Tanggal"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Periode1->Visible) { ?>
		<td data-field="Periode1"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Periode2->Visible) { ?>
		<td data-field="Periode2"<?php echo $Page->Nomor->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Jumlah->cellAttributes() ?>>
<span data-class="tpgs<?php echo $Page->GroupCount ?>_r0308_kwitansi_Jumlah"><span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->SumViewValue ?></span></span></td>
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

	// Handle EOF
	if (!$Page->GroupRecordset || $Page->GroupRecordset->EOF)
		$Page->ShowHeader = FALSE;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
<?php
	$Page->Jumlah->Count = $Page->GrandCounts[11];
	$Page->Jumlah->SumValue = $Page->GrandSummaries[11]; // Load SUM
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_TOTAL;
	$Page->RowTotalType = ROWTOTAL_GRAND;
	$Page->RowTotalSubType = ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ew-rpt-grand-summary";
	$Page->renderRow();
?>
<?php if ($Page->Nomor->ShowCompactSummaryFooter) { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $ReportLanguage->phrase("RptCnt") ?></span><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2) ?></span>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate">&nbsp;</td>
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
<?php if ($Page->NIS->Visible) { ?>
		<td data-field="NIS"<?php echo $Page->NIS->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
		<td data-field="Nama"<?php echo $Page->Nama->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Iuran->Visible) { ?>
		<td data-field="Iuran"<?php echo $Page->Iuran->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Jenis->Visible) { ?>
		<td data-field="Jenis"<?php echo $Page->Jenis->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Tanggal->Visible) { ?>
		<td data-field="Tanggal"<?php echo $Page->Tanggal->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Periode1->Visible) { ?>
		<td data-field="Periode1"<?php echo $Page->Periode1->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Periode2->Visible) { ?>
		<td data-field="Periode2"<?php echo $Page->Periode2->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Jumlah->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span data-class="tpts_r0308_kwitansi_Jumlah"><span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->SumViewValue ?></span></span></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->GroupColumnCount > 0) { ?>
		<td colspan="<?php echo $Page->GroupColumnCount ?>" class="ew-rpt-grp-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></td>
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
<?php if ($Page->NIS->Visible) { ?>
		<td data-field="NIS"<?php echo $Page->NIS->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Nama->Visible) { ?>
		<td data-field="Nama"<?php echo $Page->Nama->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Iuran->Visible) { ?>
		<td data-field="Iuran"<?php echo $Page->Iuran->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Jenis->Visible) { ?>
		<td data-field="Jenis"<?php echo $Page->Jenis->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Tanggal->Visible) { ?>
		<td data-field="Tanggal"<?php echo $Page->Tanggal->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Periode1->Visible) { ?>
		<td data-field="Periode1"<?php echo $Page->Periode1->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Periode2->Visible) { ?>
		<td data-field="Periode2"<?php echo $Page->Periode2->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->Jumlah->Visible) { ?>
		<td data-field="Jumlah"<?php echo $Page->Jumlah->cellAttributes() ?>>
<span data-class="tpts_r0308_kwitansi_Jumlah"><span<?php echo $Page->Jumlah->viewAttributes() ?>><?php echo $Page->Jumlah->SumViewValue ?></span></span></td>
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
<div id="gmp_r0308_kwitansi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "r0308_kwitansi_pager.php" ?>
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
<?php if ($Page->Export <> "" || $Page->UseCustomTemplate) { ?>
<div id="tpd_r0308_kwitansisummary"></div>
<script id="tpm_r0308_kwitansisummary" type="text/html">
<div id="ct_r0308_kwitansi_summary"><?php
$cnt = count($Page->GroupIndexes) - 1;
for ($i = 1; $i <= $cnt; $i++) {
?>
<h5>{{:Sekolah}}</h5>
<table>
	<tr>
		<td>Tahun Ajaran</td><td>:</td><td>{{:TahunAjaran}}</td>
	</tr>
	<tr>
		<td>No. Pembayaran</td><td>:</td><td>{{:Nomor}}</td>
	</tr>
	<tr>
		<td>Tgl. Bayar</td><td>:</td><td>{{:Tanggal}}</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>NIS</td><td>:</td><td>{{:NIS}}</td>
	</tr>
	<tr>
		<td>Nama</td><td>:</td><td>{{:Nama}}</td>
	</tr>
	<tr>
		<td>Kelas</td><td>:</td><td>{{:Kelas}}</td>
	</tr>
</table>
</br>
<table class="ew-table ew-export-table">
	<tr>
		<th><?php echo $r0308_kwitansi->Iuran->caption() ?></th>
		<th colspan='2'>Periode</th>
		<th><?php echo $r0308_kwitansi->Jumlah->caption() ?></th>
	</tr>
<?php
for ($j = 1; $j <= @$Page->GroupIndexes[$i]; $j++) {
?>
	<tr>
		<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $j ?>_r0308_kwitansi_Iuran"/}}</td>
		<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $j ?>_r0308_kwitansi_Periode1"/}}</td>
		<td>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $j ?>_r0308_kwitansi_Periode2"/}}</td>
		<td align='right'>{{include tmpl="#tpx<?php echo $i ?>_<?php echo $j ?>_r0308_kwitansi_Jumlah"/}}</td>
	</tr>
<?php
}
?>
	<tr>
		<td colspan='3' align='right'>Total</td>
		<td align='right'><b>{{include tmpl="#tpgs<?php echo $i ?>_r0308_kwitansi_Jumlah"/}}</b></td>
	</tr>
</table>
</br>
<?php
if ($Page->ExportPageBreakCount > 0) {
if ($i % $Page->ExportPageBreakCount == 0 && $i < $cnt) {
?>
{{include tmpl="#tpb<?php echo $i ?>_r0308_kwitansi"/}}
<?php
}
}
}
?>
<table>
	<tr>
		<td>Administrasi,</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>(..............................)</td>
	</tr>
</table>
</div>
</script>
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
<?php if ($Page->Export == "" && !$Page->DrillDown || $Page->Export <> "" && $Page->CustomExport <> "") { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if ($Page->Export <> "" || $Page->UseCustomTemplate) { ?>
<script>
ew.applyTemplate("tpd_r0308_kwitansisummary", "tpm_r0308_kwitansisummary", "r0308_kwitansisummary", "<?php echo $Page->CustomExport ?>", <?php echo ArrayToJson([$Page->FirstRowData]) ?>);
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