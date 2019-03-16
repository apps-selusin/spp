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
if (!isset($r0303_potensi_summary))
	$r0303_potensi_summary = new r0303_potensi_summary();
if (isset($Page))
	$OldPage = $Page;
$Page = &$r0303_potensi_summary;

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
<div id="ew-center" class="<?php echo $r0303_potensi_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
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
<div id="gmp_r0303_potensi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->tahunajaran->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="tahunajaran"><div class="r0303_potensi_tahunajaran"><span class="ew-table-header-caption"><?php echo $Page->tahunajaran->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="tahunajaran">
<?php if ($Page->sortUrl($Page->tahunajaran) == "") { ?>
		<div class="ew-table-header-btn r0303_potensi_tahunajaran">
			<span class="ew-table-header-caption"><?php echo $Page->tahunajaran->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0303_potensi_tahunajaran" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->tahunajaran) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->tahunajaran->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->tahunajaran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->tahunajaran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->sekolah->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="sekolah"><div class="r0303_potensi_sekolah"><span class="ew-table-header-caption"><?php echo $Page->sekolah->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="sekolah">
<?php if ($Page->sortUrl($Page->sekolah) == "") { ?>
		<div class="ew-table-header-btn r0303_potensi_sekolah">
			<span class="ew-table-header-caption"><?php echo $Page->sekolah->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0303_potensi_sekolah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->sekolah) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->sekolah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->sekolah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->sekolah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->kelas->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="kelas"><div class="r0303_potensi_kelas"><span class="ew-table-header-caption"><?php echo $Page->kelas->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="kelas">
<?php if ($Page->sortUrl($Page->kelas) == "") { ?>
		<div class="ew-table-header-btn r0303_potensi_kelas">
			<span class="ew-table-header-caption"><?php echo $Page->kelas->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0303_potensi_kelas" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->kelas) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->kelas->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->kelas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->kelas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->nis->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="nis"><div class="r0303_potensi_nis"><span class="ew-table-header-caption"><?php echo $Page->nis->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="nis">
<?php if ($Page->sortUrl($Page->nis) == "") { ?>
		<div class="ew-table-header-btn r0303_potensi_nis">
			<span class="ew-table-header-caption"><?php echo $Page->nis->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0303_potensi_nis" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->nis) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->nis->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->nis->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->nis->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->nama->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="nama"><div class="r0303_potensi_nama"><span class="ew-table-header-caption"><?php echo $Page->nama->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="nama">
<?php if ($Page->sortUrl($Page->nama) == "") { ?>
		<div class="ew-table-header-btn r0303_potensi_nama">
			<span class="ew-table-header-caption"><?php echo $Page->nama->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0303_potensi_nama" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->nama) ?>',2);">
			<span class="ew-table-header-caption"><?php echo $Page->nama->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->jumlah->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="jumlah"><div class="r0303_potensi_jumlah" style="text-align: right;"><span class="ew-table-header-caption"><?php echo $Page->jumlah->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="jumlah">
<?php if ($Page->sortUrl($Page->jumlah) == "") { ?>
		<div class="ew-table-header-btn r0303_potensi_jumlah" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->jumlah->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0303_potensi_jumlah" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->jumlah) ?>',2);" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->jumlah->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->jumlah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->jumlah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->terbayar->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="terbayar"><div class="r0303_potensi_terbayar" style="text-align: right;"><span class="ew-table-header-caption"><?php echo $Page->terbayar->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="terbayar">
<?php if ($Page->sortUrl($Page->terbayar) == "") { ?>
		<div class="ew-table-header-btn r0303_potensi_terbayar" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->terbayar->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0303_potensi_terbayar" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->terbayar) ?>',2);" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->terbayar->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->terbayar->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->terbayar->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->sisa->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="sisa"><div class="r0303_potensi_sisa" style="text-align: right;"><span class="ew-table-header-caption"><?php echo $Page->sisa->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="sisa">
<?php if ($Page->sortUrl($Page->sisa) == "") { ?>
		<div class="ew-table-header-btn r0303_potensi_sisa" style="text-align: right;">
			<span class="ew-table-header-caption"><?php echo $Page->sisa->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer r0303_potensi_sisa" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->sisa) ?>',2);" style="text-align: right;">
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
<?php if ($Page->nis->Visible) { ?>
		<td data-field="nis"<?php echo $Page->nis->cellAttributes() ?>>
<span<?php echo $Page->nis->viewAttributes() ?>><?php echo $Page->nis->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->nama->Visible) { ?>
		<td data-field="nama"<?php echo $Page->nama->cellAttributes() ?>>
<span<?php echo $Page->nama->viewAttributes() ?>><?php echo $Page->nama->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->jumlah->Visible) { ?>
		<td data-field="jumlah"<?php echo $Page->jumlah->cellAttributes() ?>>
<span<?php echo $Page->jumlah->viewAttributes() ?>><?php echo $Page->jumlah->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->terbayar->Visible) { ?>
		<td data-field="terbayar"<?php echo $Page->terbayar->cellAttributes() ?>>
<span<?php echo $Page->terbayar->viewAttributes() ?>><?php echo $Page->terbayar->getViewValue() ?></span></td>
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
	$Page->jumlah->Count = $Page->GrandCounts[6];
	$Page->jumlah->SumValue = $Page->GrandSummaries[6]; // Load SUM
	$Page->terbayar->Count = $Page->GrandCounts[7];
	$Page->terbayar->SumValue = $Page->GrandSummaries[7]; // Load SUM
	$Page->sisa->Count = $Page->GrandCounts[8];
	$Page->sisa->SumValue = $Page->GrandSummaries[8]; // Load SUM
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
<?php if ($Page->tahunajaran->Visible) { ?>
		<td data-field="tahunajaran"<?php echo $Page->tahunajaran->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->sekolah->Visible) { ?>
		<td data-field="sekolah"<?php echo $Page->sekolah->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->kelas->Visible) { ?>
		<td data-field="kelas"<?php echo $Page->kelas->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->nis->Visible) { ?>
		<td data-field="nis"<?php echo $Page->nis->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->nama->Visible) { ?>
		<td data-field="nama"<?php echo $Page->nama->cellAttributes() ?>></td>
<?php } ?>
<?php if ($Page->jumlah->Visible) { ?>
		<td data-field="jumlah"<?php echo $Page->jumlah->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->jumlah->viewAttributes() ?>><?php echo $Page->jumlah->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->terbayar->Visible) { ?>
		<td data-field="terbayar"<?php echo $Page->terbayar->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->terbayar->viewAttributes() ?>><?php echo $Page->terbayar->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->sisa->Visible) { ?>
		<td data-field="sisa"<?php echo $Page->sisa->cellAttributes() ?>><?php echo $ReportLanguage->phrase("RptSum") ?><?php echo $ReportLanguage->phrase("AggregateEqual") ?><span<?php echo $Page->sisa->viewAttributes() ?>><?php echo $Page->sisa->SumViewValue ?></span></td>
<?php } ?>
	</tr>
<?php } else { ?>
	<tr<?php echo $Page->rowAttributes() ?>><td colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ew-summary-count">(<?php echo FormatNumber($Page->TotalCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
	<tr<?php echo $Page->rowAttributes() ?>>
<?php if ($Page->tahunajaran->Visible) { ?>
		<td data-field="tahunajaran"<?php echo $Page->tahunajaran->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->sekolah->Visible) { ?>
		<td data-field="sekolah"<?php echo $Page->sekolah->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->kelas->Visible) { ?>
		<td data-field="kelas"<?php echo $Page->kelas->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->nis->Visible) { ?>
		<td data-field="nis"<?php echo $Page->nis->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->nama->Visible) { ?>
		<td data-field="nama"<?php echo $Page->nama->cellAttributes() ?>>&nbsp;</td>
<?php } ?>
<?php if ($Page->jumlah->Visible) { ?>
		<td data-field="jumlah"<?php echo $Page->jumlah->cellAttributes() ?>><span class="ew-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateColon") ?>
<span<?php echo $Page->jumlah->viewAttributes() ?>><?php echo $Page->jumlah->SumViewValue ?></span></td>
<?php } ?>
<?php if ($Page->terbayar->Visible) { ?>
		<td data-field="terbayar"<?php echo $Page->terbayar->cellAttributes() ?>><span class="ew-aggregate"><?php echo $ReportLanguage->phrase("RptSum") ?></span><?php echo $ReportLanguage->phrase("AggregateColon") ?>
<span<?php echo $Page->terbayar->viewAttributes() ?>><?php echo $Page->terbayar->SumViewValue ?></span></td>
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
<div id="gmp_r0303_potensi" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "r0303_potensi_pager.php" ?>
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