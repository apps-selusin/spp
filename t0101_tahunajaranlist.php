<?php
namespace PHPMaker2019\spp_prj;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$t0101_tahunajaran_list = new t0101_tahunajaran_list();

// Run the page
$t0101_tahunajaran_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0101_tahunajaran_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0101_tahunajaran->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0101_tahunajaranlist = currentForm = new ew.Form("ft0101_tahunajaranlist", "list");
ft0101_tahunajaranlist.formKeyCountName = '<?php echo $t0101_tahunajaran_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0101_tahunajaranlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0101_tahunajaranlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0101_tahunajaranlist.lists["x_Aktif"] = <?php echo $t0101_tahunajaran_list->Aktif->Lookup->toClientList() ?>;
ft0101_tahunajaranlist.lists["x_Aktif"].options = <?php echo JsonEncode($t0101_tahunajaran_list->Aktif->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
	background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
	display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
	<div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
		<ul class="nav nav-tabs"></ul>
		<div class="tab-content"><!-- .tab-content -->
			<div class="tab-pane fade active show"></div>
		</div><!-- /.tab-content -->
	</div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script src="phpjs/ewpreview.js"></script>
<script>
ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "right" : "left";
ew.PREVIEW_SINGLE_ROW = false;
ew.PREVIEW_OVERLAY = false;
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0101_tahunajaran->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0101_tahunajaran_list->TotalRecs > 0 && $t0101_tahunajaran_list->ExportOptions->visible()) { ?>
<?php $t0101_tahunajaran_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0101_tahunajaran_list->ImportOptions->visible()) { ?>
<?php $t0101_tahunajaran_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0101_tahunajaran_list->renderOtherOptions();
?>
<?php $t0101_tahunajaran_list->showPageHeader(); ?>
<?php
$t0101_tahunajaran_list->showMessage();
?>
<?php if ($t0101_tahunajaran_list->TotalRecs > 0 || $t0101_tahunajaran->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0101_tahunajaran_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0101_tahunajaran">
<form name="ft0101_tahunajaranlist" id="ft0101_tahunajaranlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0101_tahunajaran_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0101_tahunajaran_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0101_tahunajaran">
<div id="gmp_t0101_tahunajaran" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0101_tahunajaran_list->TotalRecs > 0 || $t0101_tahunajaran->isGridEdit()) { ?>
<table id="tbl_t0101_tahunajaranlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0101_tahunajaran_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0101_tahunajaran_list->renderListOptions();

// Render list options (header, left)
$t0101_tahunajaran_list->ListOptions->render("header", "left");
?>
<?php if ($t0101_tahunajaran->AwalBulan->Visible) { // AwalBulan ?>
	<?php if ($t0101_tahunajaran->sortUrl($t0101_tahunajaran->AwalBulan) == "") { ?>
		<th data-name="AwalBulan" class="<?php echo $t0101_tahunajaran->AwalBulan->headerCellClass() ?>"><div id="elh_t0101_tahunajaran_AwalBulan" class="t0101_tahunajaran_AwalBulan"><div class="ew-table-header-caption"><?php echo $t0101_tahunajaran->AwalBulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AwalBulan" class="<?php echo $t0101_tahunajaran->AwalBulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0101_tahunajaran->SortUrl($t0101_tahunajaran->AwalBulan) ?>',2);"><div id="elh_t0101_tahunajaran_AwalBulan" class="t0101_tahunajaran_AwalBulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0101_tahunajaran->AwalBulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0101_tahunajaran->AwalBulan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0101_tahunajaran->AwalBulan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0101_tahunajaran->AwalTahun->Visible) { // AwalTahun ?>
	<?php if ($t0101_tahunajaran->sortUrl($t0101_tahunajaran->AwalTahun) == "") { ?>
		<th data-name="AwalTahun" class="<?php echo $t0101_tahunajaran->AwalTahun->headerCellClass() ?>"><div id="elh_t0101_tahunajaran_AwalTahun" class="t0101_tahunajaran_AwalTahun"><div class="ew-table-header-caption"><?php echo $t0101_tahunajaran->AwalTahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AwalTahun" class="<?php echo $t0101_tahunajaran->AwalTahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0101_tahunajaran->SortUrl($t0101_tahunajaran->AwalTahun) ?>',2);"><div id="elh_t0101_tahunajaran_AwalTahun" class="t0101_tahunajaran_AwalTahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0101_tahunajaran->AwalTahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0101_tahunajaran->AwalTahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0101_tahunajaran->AwalTahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirBulan->Visible) { // AkhirBulan ?>
	<?php if ($t0101_tahunajaran->sortUrl($t0101_tahunajaran->AkhirBulan) == "") { ?>
		<th data-name="AkhirBulan" class="<?php echo $t0101_tahunajaran->AkhirBulan->headerCellClass() ?>"><div id="elh_t0101_tahunajaran_AkhirBulan" class="t0101_tahunajaran_AkhirBulan"><div class="ew-table-header-caption"><?php echo $t0101_tahunajaran->AkhirBulan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AkhirBulan" class="<?php echo $t0101_tahunajaran->AkhirBulan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0101_tahunajaran->SortUrl($t0101_tahunajaran->AkhirBulan) ?>',2);"><div id="elh_t0101_tahunajaran_AkhirBulan" class="t0101_tahunajaran_AkhirBulan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0101_tahunajaran->AkhirBulan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0101_tahunajaran->AkhirBulan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0101_tahunajaran->AkhirBulan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0101_tahunajaran->AkhirTahun->Visible) { // AkhirTahun ?>
	<?php if ($t0101_tahunajaran->sortUrl($t0101_tahunajaran->AkhirTahun) == "") { ?>
		<th data-name="AkhirTahun" class="<?php echo $t0101_tahunajaran->AkhirTahun->headerCellClass() ?>"><div id="elh_t0101_tahunajaran_AkhirTahun" class="t0101_tahunajaran_AkhirTahun"><div class="ew-table-header-caption"><?php echo $t0101_tahunajaran->AkhirTahun->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AkhirTahun" class="<?php echo $t0101_tahunajaran->AkhirTahun->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0101_tahunajaran->SortUrl($t0101_tahunajaran->AkhirTahun) ?>',2);"><div id="elh_t0101_tahunajaran_AkhirTahun" class="t0101_tahunajaran_AkhirTahun">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0101_tahunajaran->AkhirTahun->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0101_tahunajaran->AkhirTahun->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0101_tahunajaran->AkhirTahun->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0101_tahunajaran->TahunAjaran->Visible) { // TahunAjaran ?>
	<?php if ($t0101_tahunajaran->sortUrl($t0101_tahunajaran->TahunAjaran) == "") { ?>
		<th data-name="TahunAjaran" class="<?php echo $t0101_tahunajaran->TahunAjaran->headerCellClass() ?>"><div id="elh_t0101_tahunajaran_TahunAjaran" class="t0101_tahunajaran_TahunAjaran"><div class="ew-table-header-caption"><?php echo $t0101_tahunajaran->TahunAjaran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TahunAjaran" class="<?php echo $t0101_tahunajaran->TahunAjaran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0101_tahunajaran->SortUrl($t0101_tahunajaran->TahunAjaran) ?>',2);"><div id="elh_t0101_tahunajaran_TahunAjaran" class="t0101_tahunajaran_TahunAjaran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0101_tahunajaran->TahunAjaran->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0101_tahunajaran->TahunAjaran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0101_tahunajaran->TahunAjaran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0101_tahunajaran->Aktif->Visible) { // Aktif ?>
	<?php if ($t0101_tahunajaran->sortUrl($t0101_tahunajaran->Aktif) == "") { ?>
		<th data-name="Aktif" class="<?php echo $t0101_tahunajaran->Aktif->headerCellClass() ?>"><div id="elh_t0101_tahunajaran_Aktif" class="t0101_tahunajaran_Aktif"><div class="ew-table-header-caption"><?php echo $t0101_tahunajaran->Aktif->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Aktif" class="<?php echo $t0101_tahunajaran->Aktif->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0101_tahunajaran->SortUrl($t0101_tahunajaran->Aktif) ?>',2);"><div id="elh_t0101_tahunajaran_Aktif" class="t0101_tahunajaran_Aktif">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0101_tahunajaran->Aktif->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0101_tahunajaran->Aktif->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0101_tahunajaran->Aktif->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0101_tahunajaran_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0101_tahunajaran->ExportAll && $t0101_tahunajaran->isExport()) {
	$t0101_tahunajaran_list->StopRec = $t0101_tahunajaran_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0101_tahunajaran_list->TotalRecs > $t0101_tahunajaran_list->StartRec + $t0101_tahunajaran_list->DisplayRecs - 1)
		$t0101_tahunajaran_list->StopRec = $t0101_tahunajaran_list->StartRec + $t0101_tahunajaran_list->DisplayRecs - 1;
	else
		$t0101_tahunajaran_list->StopRec = $t0101_tahunajaran_list->TotalRecs;
}
$t0101_tahunajaran_list->RecCnt = $t0101_tahunajaran_list->StartRec - 1;
if ($t0101_tahunajaran_list->Recordset && !$t0101_tahunajaran_list->Recordset->EOF) {
	$t0101_tahunajaran_list->Recordset->moveFirst();
	$selectLimit = $t0101_tahunajaran_list->UseSelectLimit;
	if (!$selectLimit && $t0101_tahunajaran_list->StartRec > 1)
		$t0101_tahunajaran_list->Recordset->move($t0101_tahunajaran_list->StartRec - 1);
} elseif (!$t0101_tahunajaran->AllowAddDeleteRow && $t0101_tahunajaran_list->StopRec == 0) {
	$t0101_tahunajaran_list->StopRec = $t0101_tahunajaran->GridAddRowCount;
}

// Initialize aggregate
$t0101_tahunajaran->RowType = ROWTYPE_AGGREGATEINIT;
$t0101_tahunajaran->resetAttributes();
$t0101_tahunajaran_list->renderRow();
while ($t0101_tahunajaran_list->RecCnt < $t0101_tahunajaran_list->StopRec) {
	$t0101_tahunajaran_list->RecCnt++;
	if ($t0101_tahunajaran_list->RecCnt >= $t0101_tahunajaran_list->StartRec) {
		$t0101_tahunajaran_list->RowCnt++;

		// Set up key count
		$t0101_tahunajaran_list->KeyCount = $t0101_tahunajaran_list->RowIndex;

		// Init row class and style
		$t0101_tahunajaran->resetAttributes();
		$t0101_tahunajaran->CssClass = "";
		if ($t0101_tahunajaran->isGridAdd()) {
		} else {
			$t0101_tahunajaran_list->loadRowValues($t0101_tahunajaran_list->Recordset); // Load row values
		}
		$t0101_tahunajaran->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0101_tahunajaran->RowAttrs = array_merge($t0101_tahunajaran->RowAttrs, array('data-rowindex'=>$t0101_tahunajaran_list->RowCnt, 'id'=>'r' . $t0101_tahunajaran_list->RowCnt . '_t0101_tahunajaran', 'data-rowtype'=>$t0101_tahunajaran->RowType));

		// Render row
		$t0101_tahunajaran_list->renderRow();

		// Render list options
		$t0101_tahunajaran_list->renderListOptions();
?>
	<tr<?php echo $t0101_tahunajaran->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0101_tahunajaran_list->ListOptions->render("body", "left", $t0101_tahunajaran_list->RowCnt);
?>
	<?php if ($t0101_tahunajaran->AwalBulan->Visible) { // AwalBulan ?>
		<td data-name="AwalBulan"<?php echo $t0101_tahunajaran->AwalBulan->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_list->RowCnt ?>_t0101_tahunajaran_AwalBulan" class="t0101_tahunajaran_AwalBulan">
<span<?php echo $t0101_tahunajaran->AwalBulan->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AwalBulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0101_tahunajaran->AwalTahun->Visible) { // AwalTahun ?>
		<td data-name="AwalTahun"<?php echo $t0101_tahunajaran->AwalTahun->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_list->RowCnt ?>_t0101_tahunajaran_AwalTahun" class="t0101_tahunajaran_AwalTahun">
<span<?php echo $t0101_tahunajaran->AwalTahun->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AwalTahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0101_tahunajaran->AkhirBulan->Visible) { // AkhirBulan ?>
		<td data-name="AkhirBulan"<?php echo $t0101_tahunajaran->AkhirBulan->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_list->RowCnt ?>_t0101_tahunajaran_AkhirBulan" class="t0101_tahunajaran_AkhirBulan">
<span<?php echo $t0101_tahunajaran->AkhirBulan->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AkhirBulan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0101_tahunajaran->AkhirTahun->Visible) { // AkhirTahun ?>
		<td data-name="AkhirTahun"<?php echo $t0101_tahunajaran->AkhirTahun->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_list->RowCnt ?>_t0101_tahunajaran_AkhirTahun" class="t0101_tahunajaran_AkhirTahun">
<span<?php echo $t0101_tahunajaran->AkhirTahun->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->AkhirTahun->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0101_tahunajaran->TahunAjaran->Visible) { // TahunAjaran ?>
		<td data-name="TahunAjaran"<?php echo $t0101_tahunajaran->TahunAjaran->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_list->RowCnt ?>_t0101_tahunajaran_TahunAjaran" class="t0101_tahunajaran_TahunAjaran">
<span<?php echo $t0101_tahunajaran->TahunAjaran->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->TahunAjaran->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0101_tahunajaran->Aktif->Visible) { // Aktif ?>
		<td data-name="Aktif"<?php echo $t0101_tahunajaran->Aktif->cellAttributes() ?>>
<span id="el<?php echo $t0101_tahunajaran_list->RowCnt ?>_t0101_tahunajaran_Aktif" class="t0101_tahunajaran_Aktif">
<span<?php echo $t0101_tahunajaran->Aktif->viewAttributes() ?>>
<?php echo $t0101_tahunajaran->Aktif->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0101_tahunajaran_list->ListOptions->render("body", "right", $t0101_tahunajaran_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0101_tahunajaran->isGridAdd())
		$t0101_tahunajaran_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0101_tahunajaran->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0101_tahunajaran_list->Recordset)
	$t0101_tahunajaran_list->Recordset->Close();
?>
<?php if (!$t0101_tahunajaran->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0101_tahunajaran->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0101_tahunajaran_list->Pager)) $t0101_tahunajaran_list->Pager = new PrevNextPager($t0101_tahunajaran_list->StartRec, $t0101_tahunajaran_list->DisplayRecs, $t0101_tahunajaran_list->TotalRecs, $t0101_tahunajaran_list->AutoHidePager) ?>
<?php if ($t0101_tahunajaran_list->Pager->RecordCount > 0 && $t0101_tahunajaran_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0101_tahunajaran_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0101_tahunajaran_list->pageUrl() ?>start=<?php echo $t0101_tahunajaran_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0101_tahunajaran_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0101_tahunajaran_list->pageUrl() ?>start=<?php echo $t0101_tahunajaran_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0101_tahunajaran_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0101_tahunajaran_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0101_tahunajaran_list->pageUrl() ?>start=<?php echo $t0101_tahunajaran_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0101_tahunajaran_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0101_tahunajaran_list->pageUrl() ?>start=<?php echo $t0101_tahunajaran_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0101_tahunajaran_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0101_tahunajaran_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0101_tahunajaran_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0101_tahunajaran_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0101_tahunajaran_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0101_tahunajaran_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0101_tahunajaran_list->TotalRecs == 0 && !$t0101_tahunajaran->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0101_tahunajaran_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0101_tahunajaran_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0101_tahunajaran->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0101_tahunajaran_list->terminate();
?>