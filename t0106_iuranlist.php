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
$t0106_iuran_list = new t0106_iuran_list();

// Run the page
$t0106_iuran_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0106_iuran_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0106_iuran->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0106_iuranlist = currentForm = new ew.Form("ft0106_iuranlist", "list");
ft0106_iuranlist.formKeyCountName = '<?php echo $t0106_iuran_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0106_iuranlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0106_iuranlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0106_iuranlist.lists["x_Jenis"] = <?php echo $t0106_iuran_list->Jenis->Lookup->toClientList() ?>;
ft0106_iuranlist.lists["x_Jenis"].options = <?php echo JsonEncode($t0106_iuran_list->Jenis->options(FALSE, TRUE)) ?>;

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
<?php if (!$t0106_iuran->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0106_iuran_list->TotalRecs > 0 && $t0106_iuran_list->ExportOptions->visible()) { ?>
<?php $t0106_iuran_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0106_iuran_list->ImportOptions->visible()) { ?>
<?php $t0106_iuran_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0106_iuran_list->renderOtherOptions();
?>
<?php $t0106_iuran_list->showPageHeader(); ?>
<?php
$t0106_iuran_list->showMessage();
?>
<?php if ($t0106_iuran_list->TotalRecs > 0 || $t0106_iuran->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0106_iuran_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0106_iuran">
<form name="ft0106_iuranlist" id="ft0106_iuranlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0106_iuran_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0106_iuran_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0106_iuran">
<div id="gmp_t0106_iuran" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0106_iuran_list->TotalRecs > 0 || $t0106_iuran->isGridEdit()) { ?>
<table id="tbl_t0106_iuranlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0106_iuran_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0106_iuran_list->renderListOptions();

// Render list options (header, left)
$t0106_iuran_list->ListOptions->render("header", "left");
?>
<?php if ($t0106_iuran->Iuran->Visible) { // Iuran ?>
	<?php if ($t0106_iuran->sortUrl($t0106_iuran->Iuran) == "") { ?>
		<th data-name="Iuran" class="<?php echo $t0106_iuran->Iuran->headerCellClass() ?>"><div id="elh_t0106_iuran_Iuran" class="t0106_iuran_Iuran"><div class="ew-table-header-caption"><?php echo $t0106_iuran->Iuran->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Iuran" class="<?php echo $t0106_iuran->Iuran->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0106_iuran->SortUrl($t0106_iuran->Iuran) ?>',2);"><div id="elh_t0106_iuran_Iuran" class="t0106_iuran_Iuran">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0106_iuran->Iuran->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0106_iuran->Iuran->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0106_iuran->Iuran->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0106_iuran->Jenis->Visible) { // Jenis ?>
	<?php if ($t0106_iuran->sortUrl($t0106_iuran->Jenis) == "") { ?>
		<th data-name="Jenis" class="<?php echo $t0106_iuran->Jenis->headerCellClass() ?>"><div id="elh_t0106_iuran_Jenis" class="t0106_iuran_Jenis"><div class="ew-table-header-caption"><?php echo $t0106_iuran->Jenis->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jenis" class="<?php echo $t0106_iuran->Jenis->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0106_iuran->SortUrl($t0106_iuran->Jenis) ?>',2);"><div id="elh_t0106_iuran_Jenis" class="t0106_iuran_Jenis">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0106_iuran->Jenis->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0106_iuran->Jenis->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0106_iuran->Jenis->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0106_iuran_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0106_iuran->ExportAll && $t0106_iuran->isExport()) {
	$t0106_iuran_list->StopRec = $t0106_iuran_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0106_iuran_list->TotalRecs > $t0106_iuran_list->StartRec + $t0106_iuran_list->DisplayRecs - 1)
		$t0106_iuran_list->StopRec = $t0106_iuran_list->StartRec + $t0106_iuran_list->DisplayRecs - 1;
	else
		$t0106_iuran_list->StopRec = $t0106_iuran_list->TotalRecs;
}
$t0106_iuran_list->RecCnt = $t0106_iuran_list->StartRec - 1;
if ($t0106_iuran_list->Recordset && !$t0106_iuran_list->Recordset->EOF) {
	$t0106_iuran_list->Recordset->moveFirst();
	$selectLimit = $t0106_iuran_list->UseSelectLimit;
	if (!$selectLimit && $t0106_iuran_list->StartRec > 1)
		$t0106_iuran_list->Recordset->move($t0106_iuran_list->StartRec - 1);
} elseif (!$t0106_iuran->AllowAddDeleteRow && $t0106_iuran_list->StopRec == 0) {
	$t0106_iuran_list->StopRec = $t0106_iuran->GridAddRowCount;
}

// Initialize aggregate
$t0106_iuran->RowType = ROWTYPE_AGGREGATEINIT;
$t0106_iuran->resetAttributes();
$t0106_iuran_list->renderRow();
while ($t0106_iuran_list->RecCnt < $t0106_iuran_list->StopRec) {
	$t0106_iuran_list->RecCnt++;
	if ($t0106_iuran_list->RecCnt >= $t0106_iuran_list->StartRec) {
		$t0106_iuran_list->RowCnt++;

		// Set up key count
		$t0106_iuran_list->KeyCount = $t0106_iuran_list->RowIndex;

		// Init row class and style
		$t0106_iuran->resetAttributes();
		$t0106_iuran->CssClass = "";
		if ($t0106_iuran->isGridAdd()) {
		} else {
			$t0106_iuran_list->loadRowValues($t0106_iuran_list->Recordset); // Load row values
		}
		$t0106_iuran->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0106_iuran->RowAttrs = array_merge($t0106_iuran->RowAttrs, array('data-rowindex'=>$t0106_iuran_list->RowCnt, 'id'=>'r' . $t0106_iuran_list->RowCnt . '_t0106_iuran', 'data-rowtype'=>$t0106_iuran->RowType));

		// Render row
		$t0106_iuran_list->renderRow();

		// Render list options
		$t0106_iuran_list->renderListOptions();
?>
	<tr<?php echo $t0106_iuran->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0106_iuran_list->ListOptions->render("body", "left", $t0106_iuran_list->RowCnt);
?>
	<?php if ($t0106_iuran->Iuran->Visible) { // Iuran ?>
		<td data-name="Iuran"<?php echo $t0106_iuran->Iuran->cellAttributes() ?>>
<span id="el<?php echo $t0106_iuran_list->RowCnt ?>_t0106_iuran_Iuran" class="t0106_iuran_Iuran">
<span<?php echo $t0106_iuran->Iuran->viewAttributes() ?>>
<?php echo $t0106_iuran->Iuran->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0106_iuran->Jenis->Visible) { // Jenis ?>
		<td data-name="Jenis"<?php echo $t0106_iuran->Jenis->cellAttributes() ?>>
<span id="el<?php echo $t0106_iuran_list->RowCnt ?>_t0106_iuran_Jenis" class="t0106_iuran_Jenis">
<span<?php echo $t0106_iuran->Jenis->viewAttributes() ?>>
<?php echo $t0106_iuran->Jenis->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0106_iuran_list->ListOptions->render("body", "right", $t0106_iuran_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0106_iuran->isGridAdd())
		$t0106_iuran_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0106_iuran->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0106_iuran_list->Recordset)
	$t0106_iuran_list->Recordset->Close();
?>
<?php if (!$t0106_iuran->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0106_iuran->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0106_iuran_list->Pager)) $t0106_iuran_list->Pager = new PrevNextPager($t0106_iuran_list->StartRec, $t0106_iuran_list->DisplayRecs, $t0106_iuran_list->TotalRecs, $t0106_iuran_list->AutoHidePager) ?>
<?php if ($t0106_iuran_list->Pager->RecordCount > 0 && $t0106_iuran_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0106_iuran_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0106_iuran_list->pageUrl() ?>start=<?php echo $t0106_iuran_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0106_iuran_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0106_iuran_list->pageUrl() ?>start=<?php echo $t0106_iuran_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0106_iuran_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0106_iuran_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0106_iuran_list->pageUrl() ?>start=<?php echo $t0106_iuran_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0106_iuran_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0106_iuran_list->pageUrl() ?>start=<?php echo $t0106_iuran_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0106_iuran_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0106_iuran_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0106_iuran_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0106_iuran_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0106_iuran_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0106_iuran_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0106_iuran_list->TotalRecs == 0 && !$t0106_iuran->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0106_iuran_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0106_iuran_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0106_iuran->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0106_iuran_list->terminate();
?>