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
$t0103_kelas_list = new t0103_kelas_list();

// Run the page
$t0103_kelas_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0103_kelas_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0103_kelas->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0103_kelaslist = currentForm = new ew.Form("ft0103_kelaslist", "list");
ft0103_kelaslist.formKeyCountName = '<?php echo $t0103_kelas_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0103_kelaslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0103_kelaslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

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
<?php if (!$t0103_kelas->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0103_kelas_list->TotalRecs > 0 && $t0103_kelas_list->ExportOptions->visible()) { ?>
<?php $t0103_kelas_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0103_kelas_list->ImportOptions->visible()) { ?>
<?php $t0103_kelas_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0103_kelas_list->renderOtherOptions();
?>
<?php $t0103_kelas_list->showPageHeader(); ?>
<?php
$t0103_kelas_list->showMessage();
?>
<?php if ($t0103_kelas_list->TotalRecs > 0 || $t0103_kelas->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0103_kelas_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0103_kelas">
<form name="ft0103_kelaslist" id="ft0103_kelaslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0103_kelas_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0103_kelas_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0103_kelas">
<div id="gmp_t0103_kelas" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0103_kelas_list->TotalRecs > 0 || $t0103_kelas->isGridEdit()) { ?>
<table id="tbl_t0103_kelaslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0103_kelas_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0103_kelas_list->renderListOptions();

// Render list options (header, left)
$t0103_kelas_list->ListOptions->render("header", "left");
?>
<?php if ($t0103_kelas->Kelas->Visible) { // Kelas ?>
	<?php if ($t0103_kelas->sortUrl($t0103_kelas->Kelas) == "") { ?>
		<th data-name="Kelas" class="<?php echo $t0103_kelas->Kelas->headerCellClass() ?>"><div id="elh_t0103_kelas_Kelas" class="t0103_kelas_Kelas"><div class="ew-table-header-caption"><?php echo $t0103_kelas->Kelas->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Kelas" class="<?php echo $t0103_kelas->Kelas->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0103_kelas->SortUrl($t0103_kelas->Kelas) ?>',2);"><div id="elh_t0103_kelas_Kelas" class="t0103_kelas_Kelas">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0103_kelas->Kelas->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0103_kelas->Kelas->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0103_kelas->Kelas->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0103_kelas_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0103_kelas->ExportAll && $t0103_kelas->isExport()) {
	$t0103_kelas_list->StopRec = $t0103_kelas_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0103_kelas_list->TotalRecs > $t0103_kelas_list->StartRec + $t0103_kelas_list->DisplayRecs - 1)
		$t0103_kelas_list->StopRec = $t0103_kelas_list->StartRec + $t0103_kelas_list->DisplayRecs - 1;
	else
		$t0103_kelas_list->StopRec = $t0103_kelas_list->TotalRecs;
}
$t0103_kelas_list->RecCnt = $t0103_kelas_list->StartRec - 1;
if ($t0103_kelas_list->Recordset && !$t0103_kelas_list->Recordset->EOF) {
	$t0103_kelas_list->Recordset->moveFirst();
	$selectLimit = $t0103_kelas_list->UseSelectLimit;
	if (!$selectLimit && $t0103_kelas_list->StartRec > 1)
		$t0103_kelas_list->Recordset->move($t0103_kelas_list->StartRec - 1);
} elseif (!$t0103_kelas->AllowAddDeleteRow && $t0103_kelas_list->StopRec == 0) {
	$t0103_kelas_list->StopRec = $t0103_kelas->GridAddRowCount;
}

// Initialize aggregate
$t0103_kelas->RowType = ROWTYPE_AGGREGATEINIT;
$t0103_kelas->resetAttributes();
$t0103_kelas_list->renderRow();
while ($t0103_kelas_list->RecCnt < $t0103_kelas_list->StopRec) {
	$t0103_kelas_list->RecCnt++;
	if ($t0103_kelas_list->RecCnt >= $t0103_kelas_list->StartRec) {
		$t0103_kelas_list->RowCnt++;

		// Set up key count
		$t0103_kelas_list->KeyCount = $t0103_kelas_list->RowIndex;

		// Init row class and style
		$t0103_kelas->resetAttributes();
		$t0103_kelas->CssClass = "";
		if ($t0103_kelas->isGridAdd()) {
		} else {
			$t0103_kelas_list->loadRowValues($t0103_kelas_list->Recordset); // Load row values
		}
		$t0103_kelas->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0103_kelas->RowAttrs = array_merge($t0103_kelas->RowAttrs, array('data-rowindex'=>$t0103_kelas_list->RowCnt, 'id'=>'r' . $t0103_kelas_list->RowCnt . '_t0103_kelas', 'data-rowtype'=>$t0103_kelas->RowType));

		// Render row
		$t0103_kelas_list->renderRow();

		// Render list options
		$t0103_kelas_list->renderListOptions();
?>
	<tr<?php echo $t0103_kelas->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0103_kelas_list->ListOptions->render("body", "left", $t0103_kelas_list->RowCnt);
?>
	<?php if ($t0103_kelas->Kelas->Visible) { // Kelas ?>
		<td data-name="Kelas"<?php echo $t0103_kelas->Kelas->cellAttributes() ?>>
<span id="el<?php echo $t0103_kelas_list->RowCnt ?>_t0103_kelas_Kelas" class="t0103_kelas_Kelas">
<span<?php echo $t0103_kelas->Kelas->viewAttributes() ?>>
<?php echo $t0103_kelas->Kelas->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0103_kelas_list->ListOptions->render("body", "right", $t0103_kelas_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0103_kelas->isGridAdd())
		$t0103_kelas_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0103_kelas->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0103_kelas_list->Recordset)
	$t0103_kelas_list->Recordset->Close();
?>
<?php if (!$t0103_kelas->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0103_kelas->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0103_kelas_list->Pager)) $t0103_kelas_list->Pager = new PrevNextPager($t0103_kelas_list->StartRec, $t0103_kelas_list->DisplayRecs, $t0103_kelas_list->TotalRecs, $t0103_kelas_list->AutoHidePager) ?>
<?php if ($t0103_kelas_list->Pager->RecordCount > 0 && $t0103_kelas_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0103_kelas_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0103_kelas_list->pageUrl() ?>start=<?php echo $t0103_kelas_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0103_kelas_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0103_kelas_list->pageUrl() ?>start=<?php echo $t0103_kelas_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0103_kelas_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0103_kelas_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0103_kelas_list->pageUrl() ?>start=<?php echo $t0103_kelas_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0103_kelas_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0103_kelas_list->pageUrl() ?>start=<?php echo $t0103_kelas_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0103_kelas_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0103_kelas_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0103_kelas_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0103_kelas_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0103_kelas_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0103_kelas_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0103_kelas_list->TotalRecs == 0 && !$t0103_kelas->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0103_kelas_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0103_kelas_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0103_kelas->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0103_kelas_list->terminate();
?>