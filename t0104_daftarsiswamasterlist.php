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
$t0104_daftarsiswamaster_list = new t0104_daftarsiswamaster_list();

// Run the page
$t0104_daftarsiswamaster_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0104_daftarsiswamaster_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0104_daftarsiswamaster->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0104_daftarsiswamasterlist = currentForm = new ew.Form("ft0104_daftarsiswamasterlist", "list");
ft0104_daftarsiswamasterlist.formKeyCountName = '<?php echo $t0104_daftarsiswamaster_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0104_daftarsiswamasterlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0104_daftarsiswamasterlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0104_daftarsiswamasterlist.lists["x_tahunajaran_id"] = <?php echo $t0104_daftarsiswamaster_list->tahunajaran_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterlist.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_list->tahunajaran_id->lookupOptions()) ?>;
ft0104_daftarsiswamasterlist.lists["x_sekolah_id"] = <?php echo $t0104_daftarsiswamaster_list->sekolah_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterlist.lists["x_sekolah_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_list->sekolah_id->lookupOptions()) ?>;
ft0104_daftarsiswamasterlist.lists["x_kelas_id"] = <?php echo $t0104_daftarsiswamaster_list->kelas_id->Lookup->toClientList() ?>;
ft0104_daftarsiswamasterlist.lists["x_kelas_id"].options = <?php echo JsonEncode($t0104_daftarsiswamaster_list->kelas_id->lookupOptions()) ?>;

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
<?php if (!$t0104_daftarsiswamaster->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0104_daftarsiswamaster_list->TotalRecs > 0 && $t0104_daftarsiswamaster_list->ExportOptions->visible()) { ?>
<?php $t0104_daftarsiswamaster_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0104_daftarsiswamaster_list->ImportOptions->visible()) { ?>
<?php $t0104_daftarsiswamaster_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0104_daftarsiswamaster_list->renderOtherOptions();
?>
<?php $t0104_daftarsiswamaster_list->showPageHeader(); ?>
<?php
$t0104_daftarsiswamaster_list->showMessage();
?>
<?php if ($t0104_daftarsiswamaster_list->TotalRecs > 0 || $t0104_daftarsiswamaster->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0104_daftarsiswamaster_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0104_daftarsiswamaster">
<form name="ft0104_daftarsiswamasterlist" id="ft0104_daftarsiswamasterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0104_daftarsiswamaster_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0104_daftarsiswamaster_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0104_daftarsiswamaster">
<div id="gmp_t0104_daftarsiswamaster" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0104_daftarsiswamaster_list->TotalRecs > 0 || $t0104_daftarsiswamaster->isGridEdit()) { ?>
<table id="tbl_t0104_daftarsiswamasterlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0104_daftarsiswamaster_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0104_daftarsiswamaster_list->renderListOptions();

// Render list options (header, left)
$t0104_daftarsiswamaster_list->ListOptions->render("header", "left");
?>
<?php if ($t0104_daftarsiswamaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<?php if ($t0104_daftarsiswamaster->sortUrl($t0104_daftarsiswamaster->tahunajaran_id) == "") { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t0104_daftarsiswamaster->tahunajaran_id->headerCellClass() ?>"><div id="elh_t0104_daftarsiswamaster_tahunajaran_id" class="t0104_daftarsiswamaster_tahunajaran_id"><div class="ew-table-header-caption"><?php echo $t0104_daftarsiswamaster->tahunajaran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t0104_daftarsiswamaster->tahunajaran_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0104_daftarsiswamaster->SortUrl($t0104_daftarsiswamaster->tahunajaran_id) ?>',2);"><div id="elh_t0104_daftarsiswamaster_tahunajaran_id" class="t0104_daftarsiswamaster_tahunajaran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0104_daftarsiswamaster->tahunajaran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0104_daftarsiswamaster->tahunajaran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0104_daftarsiswamaster->tahunajaran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->sekolah_id->Visible) { // sekolah_id ?>
	<?php if ($t0104_daftarsiswamaster->sortUrl($t0104_daftarsiswamaster->sekolah_id) == "") { ?>
		<th data-name="sekolah_id" class="<?php echo $t0104_daftarsiswamaster->sekolah_id->headerCellClass() ?>"><div id="elh_t0104_daftarsiswamaster_sekolah_id" class="t0104_daftarsiswamaster_sekolah_id"><div class="ew-table-header-caption"><?php echo $t0104_daftarsiswamaster->sekolah_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sekolah_id" class="<?php echo $t0104_daftarsiswamaster->sekolah_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0104_daftarsiswamaster->SortUrl($t0104_daftarsiswamaster->sekolah_id) ?>',2);"><div id="elh_t0104_daftarsiswamaster_sekolah_id" class="t0104_daftarsiswamaster_sekolah_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0104_daftarsiswamaster->sekolah_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0104_daftarsiswamaster->sekolah_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0104_daftarsiswamaster->sekolah_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0104_daftarsiswamaster->kelas_id->Visible) { // kelas_id ?>
	<?php if ($t0104_daftarsiswamaster->sortUrl($t0104_daftarsiswamaster->kelas_id) == "") { ?>
		<th data-name="kelas_id" class="<?php echo $t0104_daftarsiswamaster->kelas_id->headerCellClass() ?>"><div id="elh_t0104_daftarsiswamaster_kelas_id" class="t0104_daftarsiswamaster_kelas_id"><div class="ew-table-header-caption"><?php echo $t0104_daftarsiswamaster->kelas_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="kelas_id" class="<?php echo $t0104_daftarsiswamaster->kelas_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0104_daftarsiswamaster->SortUrl($t0104_daftarsiswamaster->kelas_id) ?>',2);"><div id="elh_t0104_daftarsiswamaster_kelas_id" class="t0104_daftarsiswamaster_kelas_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0104_daftarsiswamaster->kelas_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0104_daftarsiswamaster->kelas_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0104_daftarsiswamaster->kelas_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0104_daftarsiswamaster_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0104_daftarsiswamaster->ExportAll && $t0104_daftarsiswamaster->isExport()) {
	$t0104_daftarsiswamaster_list->StopRec = $t0104_daftarsiswamaster_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0104_daftarsiswamaster_list->TotalRecs > $t0104_daftarsiswamaster_list->StartRec + $t0104_daftarsiswamaster_list->DisplayRecs - 1)
		$t0104_daftarsiswamaster_list->StopRec = $t0104_daftarsiswamaster_list->StartRec + $t0104_daftarsiswamaster_list->DisplayRecs - 1;
	else
		$t0104_daftarsiswamaster_list->StopRec = $t0104_daftarsiswamaster_list->TotalRecs;
}
$t0104_daftarsiswamaster_list->RecCnt = $t0104_daftarsiswamaster_list->StartRec - 1;
if ($t0104_daftarsiswamaster_list->Recordset && !$t0104_daftarsiswamaster_list->Recordset->EOF) {
	$t0104_daftarsiswamaster_list->Recordset->moveFirst();
	$selectLimit = $t0104_daftarsiswamaster_list->UseSelectLimit;
	if (!$selectLimit && $t0104_daftarsiswamaster_list->StartRec > 1)
		$t0104_daftarsiswamaster_list->Recordset->move($t0104_daftarsiswamaster_list->StartRec - 1);
} elseif (!$t0104_daftarsiswamaster->AllowAddDeleteRow && $t0104_daftarsiswamaster_list->StopRec == 0) {
	$t0104_daftarsiswamaster_list->StopRec = $t0104_daftarsiswamaster->GridAddRowCount;
}

// Initialize aggregate
$t0104_daftarsiswamaster->RowType = ROWTYPE_AGGREGATEINIT;
$t0104_daftarsiswamaster->resetAttributes();
$t0104_daftarsiswamaster_list->renderRow();
while ($t0104_daftarsiswamaster_list->RecCnt < $t0104_daftarsiswamaster_list->StopRec) {
	$t0104_daftarsiswamaster_list->RecCnt++;
	if ($t0104_daftarsiswamaster_list->RecCnt >= $t0104_daftarsiswamaster_list->StartRec) {
		$t0104_daftarsiswamaster_list->RowCnt++;

		// Set up key count
		$t0104_daftarsiswamaster_list->KeyCount = $t0104_daftarsiswamaster_list->RowIndex;

		// Init row class and style
		$t0104_daftarsiswamaster->resetAttributes();
		$t0104_daftarsiswamaster->CssClass = "";
		if ($t0104_daftarsiswamaster->isGridAdd()) {
		} else {
			$t0104_daftarsiswamaster_list->loadRowValues($t0104_daftarsiswamaster_list->Recordset); // Load row values
		}
		$t0104_daftarsiswamaster->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0104_daftarsiswamaster->RowAttrs = array_merge($t0104_daftarsiswamaster->RowAttrs, array('data-rowindex'=>$t0104_daftarsiswamaster_list->RowCnt, 'id'=>'r' . $t0104_daftarsiswamaster_list->RowCnt . '_t0104_daftarsiswamaster', 'data-rowtype'=>$t0104_daftarsiswamaster->RowType));

		// Render row
		$t0104_daftarsiswamaster_list->renderRow();

		// Render list options
		$t0104_daftarsiswamaster_list->renderListOptions();
?>
	<tr<?php echo $t0104_daftarsiswamaster->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0104_daftarsiswamaster_list->ListOptions->render("body", "left", $t0104_daftarsiswamaster_list->RowCnt);
?>
	<?php if ($t0104_daftarsiswamaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td data-name="tahunajaran_id"<?php echo $t0104_daftarsiswamaster->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $t0104_daftarsiswamaster_list->RowCnt ?>_t0104_daftarsiswamaster_tahunajaran_id" class="t0104_daftarsiswamaster_tahunajaran_id">
<span<?php echo $t0104_daftarsiswamaster->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0104_daftarsiswamaster->sekolah_id->Visible) { // sekolah_id ?>
		<td data-name="sekolah_id"<?php echo $t0104_daftarsiswamaster->sekolah_id->cellAttributes() ?>>
<span id="el<?php echo $t0104_daftarsiswamaster_list->RowCnt ?>_t0104_daftarsiswamaster_sekolah_id" class="t0104_daftarsiswamaster_sekolah_id">
<span<?php echo $t0104_daftarsiswamaster->sekolah_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->sekolah_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0104_daftarsiswamaster->kelas_id->Visible) { // kelas_id ?>
		<td data-name="kelas_id"<?php echo $t0104_daftarsiswamaster->kelas_id->cellAttributes() ?>>
<span id="el<?php echo $t0104_daftarsiswamaster_list->RowCnt ?>_t0104_daftarsiswamaster_kelas_id" class="t0104_daftarsiswamaster_kelas_id">
<span<?php echo $t0104_daftarsiswamaster->kelas_id->viewAttributes() ?>>
<?php echo $t0104_daftarsiswamaster->kelas_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0104_daftarsiswamaster_list->ListOptions->render("body", "right", $t0104_daftarsiswamaster_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0104_daftarsiswamaster->isGridAdd())
		$t0104_daftarsiswamaster_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0104_daftarsiswamaster->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0104_daftarsiswamaster_list->Recordset)
	$t0104_daftarsiswamaster_list->Recordset->Close();
?>
<?php if (!$t0104_daftarsiswamaster->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0104_daftarsiswamaster->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0104_daftarsiswamaster_list->Pager)) $t0104_daftarsiswamaster_list->Pager = new PrevNextPager($t0104_daftarsiswamaster_list->StartRec, $t0104_daftarsiswamaster_list->DisplayRecs, $t0104_daftarsiswamaster_list->TotalRecs, $t0104_daftarsiswamaster_list->AutoHidePager) ?>
<?php if ($t0104_daftarsiswamaster_list->Pager->RecordCount > 0 && $t0104_daftarsiswamaster_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0104_daftarsiswamaster_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0104_daftarsiswamaster_list->pageUrl() ?>start=<?php echo $t0104_daftarsiswamaster_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0104_daftarsiswamaster_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0104_daftarsiswamaster_list->pageUrl() ?>start=<?php echo $t0104_daftarsiswamaster_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0104_daftarsiswamaster_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0104_daftarsiswamaster_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0104_daftarsiswamaster_list->pageUrl() ?>start=<?php echo $t0104_daftarsiswamaster_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0104_daftarsiswamaster_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0104_daftarsiswamaster_list->pageUrl() ?>start=<?php echo $t0104_daftarsiswamaster_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0104_daftarsiswamaster_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0104_daftarsiswamaster_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0104_daftarsiswamaster_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0104_daftarsiswamaster_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0104_daftarsiswamaster_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0104_daftarsiswamaster_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0104_daftarsiswamaster_list->TotalRecs == 0 && !$t0104_daftarsiswamaster->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0104_daftarsiswamaster_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0104_daftarsiswamaster_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0104_daftarsiswamaster->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0104_daftarsiswamaster_list->terminate();
?>