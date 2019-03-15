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
$t0102_sekolah_list = new t0102_sekolah_list();

// Run the page
$t0102_sekolah_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0102_sekolah_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0102_sekolah->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0102_sekolahlist = currentForm = new ew.Form("ft0102_sekolahlist", "list");
ft0102_sekolahlist.formKeyCountName = '<?php echo $t0102_sekolah_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0102_sekolahlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0102_sekolahlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
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
<?php if (!$t0102_sekolah->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0102_sekolah_list->TotalRecs > 0 && $t0102_sekolah_list->ExportOptions->visible()) { ?>
<?php $t0102_sekolah_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0102_sekolah_list->ImportOptions->visible()) { ?>
<?php $t0102_sekolah_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0102_sekolah_list->renderOtherOptions();
?>
<?php $t0102_sekolah_list->showPageHeader(); ?>
<?php
$t0102_sekolah_list->showMessage();
?>
<?php if ($t0102_sekolah_list->TotalRecs > 0 || $t0102_sekolah->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0102_sekolah_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0102_sekolah">
<form name="ft0102_sekolahlist" id="ft0102_sekolahlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0102_sekolah_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0102_sekolah_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0102_sekolah">
<div id="gmp_t0102_sekolah" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0102_sekolah_list->TotalRecs > 0 || $t0102_sekolah->isGridEdit()) { ?>
<table id="tbl_t0102_sekolahlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0102_sekolah_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0102_sekolah_list->renderListOptions();

// Render list options (header, left)
$t0102_sekolah_list->ListOptions->render("header", "left");
?>
<?php if ($t0102_sekolah->Sekolah->Visible) { // Sekolah ?>
	<?php if ($t0102_sekolah->sortUrl($t0102_sekolah->Sekolah) == "") { ?>
		<th data-name="Sekolah" class="<?php echo $t0102_sekolah->Sekolah->headerCellClass() ?>"><div id="elh_t0102_sekolah_Sekolah" class="t0102_sekolah_Sekolah"><div class="ew-table-header-caption"><?php echo $t0102_sekolah->Sekolah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sekolah" class="<?php echo $t0102_sekolah->Sekolah->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0102_sekolah->SortUrl($t0102_sekolah->Sekolah) ?>',2);"><div id="elh_t0102_sekolah_Sekolah" class="t0102_sekolah_Sekolah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0102_sekolah->Sekolah->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0102_sekolah->Sekolah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0102_sekolah->Sekolah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0102_sekolah_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0102_sekolah->ExportAll && $t0102_sekolah->isExport()) {
	$t0102_sekolah_list->StopRec = $t0102_sekolah_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0102_sekolah_list->TotalRecs > $t0102_sekolah_list->StartRec + $t0102_sekolah_list->DisplayRecs - 1)
		$t0102_sekolah_list->StopRec = $t0102_sekolah_list->StartRec + $t0102_sekolah_list->DisplayRecs - 1;
	else
		$t0102_sekolah_list->StopRec = $t0102_sekolah_list->TotalRecs;
}
$t0102_sekolah_list->RecCnt = $t0102_sekolah_list->StartRec - 1;
if ($t0102_sekolah_list->Recordset && !$t0102_sekolah_list->Recordset->EOF) {
	$t0102_sekolah_list->Recordset->moveFirst();
	$selectLimit = $t0102_sekolah_list->UseSelectLimit;
	if (!$selectLimit && $t0102_sekolah_list->StartRec > 1)
		$t0102_sekolah_list->Recordset->move($t0102_sekolah_list->StartRec - 1);
} elseif (!$t0102_sekolah->AllowAddDeleteRow && $t0102_sekolah_list->StopRec == 0) {
	$t0102_sekolah_list->StopRec = $t0102_sekolah->GridAddRowCount;
}

// Initialize aggregate
$t0102_sekolah->RowType = ROWTYPE_AGGREGATEINIT;
$t0102_sekolah->resetAttributes();
$t0102_sekolah_list->renderRow();
while ($t0102_sekolah_list->RecCnt < $t0102_sekolah_list->StopRec) {
	$t0102_sekolah_list->RecCnt++;
	if ($t0102_sekolah_list->RecCnt >= $t0102_sekolah_list->StartRec) {
		$t0102_sekolah_list->RowCnt++;

		// Set up key count
		$t0102_sekolah_list->KeyCount = $t0102_sekolah_list->RowIndex;

		// Init row class and style
		$t0102_sekolah->resetAttributes();
		$t0102_sekolah->CssClass = "";
		if ($t0102_sekolah->isGridAdd()) {
		} else {
			$t0102_sekolah_list->loadRowValues($t0102_sekolah_list->Recordset); // Load row values
		}
		$t0102_sekolah->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0102_sekolah->RowAttrs = array_merge($t0102_sekolah->RowAttrs, array('data-rowindex'=>$t0102_sekolah_list->RowCnt, 'id'=>'r' . $t0102_sekolah_list->RowCnt . '_t0102_sekolah', 'data-rowtype'=>$t0102_sekolah->RowType));

		// Render row
		$t0102_sekolah_list->renderRow();

		// Render list options
		$t0102_sekolah_list->renderListOptions();
?>
	<tr<?php echo $t0102_sekolah->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0102_sekolah_list->ListOptions->render("body", "left", $t0102_sekolah_list->RowCnt);
?>
	<?php if ($t0102_sekolah->Sekolah->Visible) { // Sekolah ?>
		<td data-name="Sekolah"<?php echo $t0102_sekolah->Sekolah->cellAttributes() ?>>
<span id="el<?php echo $t0102_sekolah_list->RowCnt ?>_t0102_sekolah_Sekolah" class="t0102_sekolah_Sekolah">
<span<?php echo $t0102_sekolah->Sekolah->viewAttributes() ?>>
<?php echo $t0102_sekolah->Sekolah->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0102_sekolah_list->ListOptions->render("body", "right", $t0102_sekolah_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0102_sekolah->isGridAdd())
		$t0102_sekolah_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0102_sekolah->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0102_sekolah_list->Recordset)
	$t0102_sekolah_list->Recordset->Close();
?>
<?php if (!$t0102_sekolah->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0102_sekolah->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0102_sekolah_list->Pager)) $t0102_sekolah_list->Pager = new PrevNextPager($t0102_sekolah_list->StartRec, $t0102_sekolah_list->DisplayRecs, $t0102_sekolah_list->TotalRecs, $t0102_sekolah_list->AutoHidePager) ?>
<?php if ($t0102_sekolah_list->Pager->RecordCount > 0 && $t0102_sekolah_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0102_sekolah_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0102_sekolah_list->pageUrl() ?>start=<?php echo $t0102_sekolah_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0102_sekolah_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0102_sekolah_list->pageUrl() ?>start=<?php echo $t0102_sekolah_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0102_sekolah_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0102_sekolah_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0102_sekolah_list->pageUrl() ?>start=<?php echo $t0102_sekolah_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0102_sekolah_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0102_sekolah_list->pageUrl() ?>start=<?php echo $t0102_sekolah_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0102_sekolah_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0102_sekolah_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0102_sekolah_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0102_sekolah_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0102_sekolah_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0102_sekolah_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0102_sekolah_list->TotalRecs == 0 && !$t0102_sekolah->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0102_sekolah_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0102_sekolah_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0102_sekolah->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0102_sekolah_list->terminate();
?>