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
$t0202_siswaiuran_list = new t0202_siswaiuran_list();

// Run the page
$t0202_siswaiuran_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0202_siswaiuran_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0202_siswaiuran->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0202_siswaiuranlist = currentForm = new ew.Form("ft0202_siswaiuranlist", "list");
ft0202_siswaiuranlist.formKeyCountName = '<?php echo $t0202_siswaiuran_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0202_siswaiuranlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0202_siswaiuranlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0202_siswaiuranlist.lists["x_tahunajaran_id"] = <?php echo $t0202_siswaiuran_list->tahunajaran_id->Lookup->toClientList() ?>;
ft0202_siswaiuranlist.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_list->tahunajaran_id->lookupOptions()) ?>;
ft0202_siswaiuranlist.lists["x_iuran_id"] = <?php echo $t0202_siswaiuran_list->iuran_id->Lookup->toClientList() ?>;
ft0202_siswaiuranlist.lists["x_iuran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_list->iuran_id->lookupOptions()) ?>;

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
<?php if (!$t0202_siswaiuran->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0202_siswaiuran_list->TotalRecs > 0 && $t0202_siswaiuran_list->ExportOptions->visible()) { ?>
<?php $t0202_siswaiuran_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0202_siswaiuran_list->ImportOptions->visible()) { ?>
<?php $t0202_siswaiuran_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t0202_siswaiuran->isExport() || EXPORT_MASTER_RECORD && $t0202_siswaiuran->isExport("print")) { ?>
<?php
if ($t0202_siswaiuran_list->DbMasterFilter <> "" && $t0202_siswaiuran->getCurrentMasterTable() == "t0201_siswa") {
	if ($t0202_siswaiuran_list->MasterRecordExists) {
		include_once "t0201_siswamaster.php";
	}
}
?>
<?php } ?>
<?php
$t0202_siswaiuran_list->renderOtherOptions();
?>
<?php $t0202_siswaiuran_list->showPageHeader(); ?>
<?php
$t0202_siswaiuran_list->showMessage();
?>
<?php if ($t0202_siswaiuran_list->TotalRecs > 0 || $t0202_siswaiuran->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0202_siswaiuran_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0202_siswaiuran">
<form name="ft0202_siswaiuranlist" id="ft0202_siswaiuranlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0202_siswaiuran_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0202_siswaiuran_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0202_siswaiuran">
<?php if ($t0202_siswaiuran->getCurrentMasterTable() == "t0201_siswa" && $t0202_siswaiuran->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t0201_siswa">
<input type="hidden" name="fk_id" value="<?php echo $t0202_siswaiuran->siswa_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_t0202_siswaiuran" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0202_siswaiuran_list->TotalRecs > 0 || $t0202_siswaiuran->isGridEdit()) { ?>
<table id="tbl_t0202_siswaiuranlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0202_siswaiuran_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0202_siswaiuran_list->renderListOptions();

// Render list options (header, left)
$t0202_siswaiuran_list->ListOptions->render("header", "left");
?>
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<?php if ($t0202_siswaiuran->sortUrl($t0202_siswaiuran->tahunajaran_id) == "") { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t0202_siswaiuran->tahunajaran_id->headerCellClass() ?>"><div id="elh_t0202_siswaiuran_tahunajaran_id" class="t0202_siswaiuran_tahunajaran_id"><div class="ew-table-header-caption"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t0202_siswaiuran->tahunajaran_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0202_siswaiuran->SortUrl($t0202_siswaiuran->tahunajaran_id) ?>',2);"><div id="elh_t0202_siswaiuran_tahunajaran_id" class="t0202_siswaiuran_tahunajaran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0202_siswaiuran->tahunajaran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0202_siswaiuran->tahunajaran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
	<?php if ($t0202_siswaiuran->sortUrl($t0202_siswaiuran->iuran_id) == "") { ?>
		<th data-name="iuran_id" class="<?php echo $t0202_siswaiuran->iuran_id->headerCellClass() ?>"><div id="elh_t0202_siswaiuran_iuran_id" class="t0202_siswaiuran_iuran_id"><div class="ew-table-header-caption"><?php echo $t0202_siswaiuran->iuran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iuran_id" class="<?php echo $t0202_siswaiuran->iuran_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0202_siswaiuran->SortUrl($t0202_siswaiuran->iuran_id) ?>',2);"><div id="elh_t0202_siswaiuran_iuran_id" class="t0202_siswaiuran_iuran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->iuran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0202_siswaiuran->iuran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0202_siswaiuran->iuran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
	<?php if ($t0202_siswaiuran->sortUrl($t0202_siswaiuran->Nilai) == "") { ?>
		<th data-name="Nilai" class="<?php echo $t0202_siswaiuran->Nilai->headerCellClass() ?>"><div id="elh_t0202_siswaiuran_Nilai" class="t0202_siswaiuran_Nilai"><div class="ew-table-header-caption"><?php echo $t0202_siswaiuran->Nilai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nilai" class="<?php echo $t0202_siswaiuran->Nilai->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0202_siswaiuran->SortUrl($t0202_siswaiuran->Nilai) ?>',2);"><div id="elh_t0202_siswaiuran_Nilai" class="t0202_siswaiuran_Nilai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->Nilai->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0202_siswaiuran->Nilai->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0202_siswaiuran->Nilai->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0202_siswaiuran_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0202_siswaiuran->ExportAll && $t0202_siswaiuran->isExport()) {
	$t0202_siswaiuran_list->StopRec = $t0202_siswaiuran_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0202_siswaiuran_list->TotalRecs > $t0202_siswaiuran_list->StartRec + $t0202_siswaiuran_list->DisplayRecs - 1)
		$t0202_siswaiuran_list->StopRec = $t0202_siswaiuran_list->StartRec + $t0202_siswaiuran_list->DisplayRecs - 1;
	else
		$t0202_siswaiuran_list->StopRec = $t0202_siswaiuran_list->TotalRecs;
}
$t0202_siswaiuran_list->RecCnt = $t0202_siswaiuran_list->StartRec - 1;
if ($t0202_siswaiuran_list->Recordset && !$t0202_siswaiuran_list->Recordset->EOF) {
	$t0202_siswaiuran_list->Recordset->moveFirst();
	$selectLimit = $t0202_siswaiuran_list->UseSelectLimit;
	if (!$selectLimit && $t0202_siswaiuran_list->StartRec > 1)
		$t0202_siswaiuran_list->Recordset->move($t0202_siswaiuran_list->StartRec - 1);
} elseif (!$t0202_siswaiuran->AllowAddDeleteRow && $t0202_siswaiuran_list->StopRec == 0) {
	$t0202_siswaiuran_list->StopRec = $t0202_siswaiuran->GridAddRowCount;
}

// Initialize aggregate
$t0202_siswaiuran->RowType = ROWTYPE_AGGREGATEINIT;
$t0202_siswaiuran->resetAttributes();
$t0202_siswaiuran_list->renderRow();
while ($t0202_siswaiuran_list->RecCnt < $t0202_siswaiuran_list->StopRec) {
	$t0202_siswaiuran_list->RecCnt++;
	if ($t0202_siswaiuran_list->RecCnt >= $t0202_siswaiuran_list->StartRec) {
		$t0202_siswaiuran_list->RowCnt++;

		// Set up key count
		$t0202_siswaiuran_list->KeyCount = $t0202_siswaiuran_list->RowIndex;

		// Init row class and style
		$t0202_siswaiuran->resetAttributes();
		$t0202_siswaiuran->CssClass = "";
		if ($t0202_siswaiuran->isGridAdd()) {
		} else {
			$t0202_siswaiuran_list->loadRowValues($t0202_siswaiuran_list->Recordset); // Load row values
		}
		$t0202_siswaiuran->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0202_siswaiuran->RowAttrs = array_merge($t0202_siswaiuran->RowAttrs, array('data-rowindex'=>$t0202_siswaiuran_list->RowCnt, 'id'=>'r' . $t0202_siswaiuran_list->RowCnt . '_t0202_siswaiuran', 'data-rowtype'=>$t0202_siswaiuran->RowType));

		// Render row
		$t0202_siswaiuran_list->renderRow();

		// Render list options
		$t0202_siswaiuran_list->renderListOptions();
?>
	<tr<?php echo $t0202_siswaiuran->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0202_siswaiuran_list->ListOptions->render("body", "left", $t0202_siswaiuran_list->RowCnt);
?>
	<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td data-name="tahunajaran_id"<?php echo $t0202_siswaiuran->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $t0202_siswaiuran_list->RowCnt ?>_t0202_siswaiuran_tahunajaran_id" class="t0202_siswaiuran_tahunajaran_id">
<span<?php echo $t0202_siswaiuran->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
		<td data-name="iuran_id"<?php echo $t0202_siswaiuran->iuran_id->cellAttributes() ?>>
<span id="el<?php echo $t0202_siswaiuran_list->RowCnt ?>_t0202_siswaiuran_iuran_id" class="t0202_siswaiuran_iuran_id">
<span<?php echo $t0202_siswaiuran->iuran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->iuran_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
		<td data-name="Nilai"<?php echo $t0202_siswaiuran->Nilai->cellAttributes() ?>>
<span id="el<?php echo $t0202_siswaiuran_list->RowCnt ?>_t0202_siswaiuran_Nilai" class="t0202_siswaiuran_Nilai">
<span<?php echo $t0202_siswaiuran->Nilai->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->Nilai->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0202_siswaiuran_list->ListOptions->render("body", "right", $t0202_siswaiuran_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0202_siswaiuran->isGridAdd())
		$t0202_siswaiuran_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0202_siswaiuran->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0202_siswaiuran_list->Recordset)
	$t0202_siswaiuran_list->Recordset->Close();
?>
<?php if (!$t0202_siswaiuran->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0202_siswaiuran->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0202_siswaiuran_list->Pager)) $t0202_siswaiuran_list->Pager = new PrevNextPager($t0202_siswaiuran_list->StartRec, $t0202_siswaiuran_list->DisplayRecs, $t0202_siswaiuran_list->TotalRecs, $t0202_siswaiuran_list->AutoHidePager) ?>
<?php if ($t0202_siswaiuran_list->Pager->RecordCount > 0 && $t0202_siswaiuran_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0202_siswaiuran_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0202_siswaiuran_list->pageUrl() ?>start=<?php echo $t0202_siswaiuran_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0202_siswaiuran_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0202_siswaiuran_list->pageUrl() ?>start=<?php echo $t0202_siswaiuran_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0202_siswaiuran_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0202_siswaiuran_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0202_siswaiuran_list->pageUrl() ?>start=<?php echo $t0202_siswaiuran_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0202_siswaiuran_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0202_siswaiuran_list->pageUrl() ?>start=<?php echo $t0202_siswaiuran_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0202_siswaiuran_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0202_siswaiuran_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0202_siswaiuran_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0202_siswaiuran_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0202_siswaiuran_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0202_siswaiuran_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0202_siswaiuran_list->TotalRecs == 0 && !$t0202_siswaiuran->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0202_siswaiuran_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0202_siswaiuran_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0202_siswaiuran->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0202_siswaiuran_list->terminate();
?>