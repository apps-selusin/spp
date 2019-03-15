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
$t0201_siswa_list = new t0201_siswa_list();

// Run the page
$t0201_siswa_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0201_siswa_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0201_siswa->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0201_siswalist = currentForm = new ew.Form("ft0201_siswalist", "list");
ft0201_siswalist.formKeyCountName = '<?php echo $t0201_siswa_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0201_siswalist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0201_siswalist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft0201_siswalistsrch = currentSearchForm = new ew.Form("ft0201_siswalistsrch");

// Filters
ft0201_siswalistsrch.filterList = <?php echo $t0201_siswa_list->getFilterList() ?>;
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
<?php if (!$t0201_siswa->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0201_siswa_list->TotalRecs > 0 && $t0201_siswa_list->ExportOptions->visible()) { ?>
<?php $t0201_siswa_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0201_siswa_list->ImportOptions->visible()) { ?>
<?php $t0201_siswa_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0201_siswa_list->SearchOptions->visible()) { ?>
<?php $t0201_siswa_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0201_siswa_list->FilterOptions->visible()) { ?>
<?php $t0201_siswa_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0201_siswa_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t0201_siswa->isExport() && !$t0201_siswa->CurrentAction) { ?>
<form name="ft0201_siswalistsrch" id="ft0201_siswalistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0201_siswa_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0201_siswalistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0201_siswa">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0201_siswa_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0201_siswa_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0201_siswa_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0201_siswa_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0201_siswa_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0201_siswa_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0201_siswa_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t0201_siswa_list->showPageHeader(); ?>
<?php
$t0201_siswa_list->showMessage();
?>
<?php if ($t0201_siswa_list->TotalRecs > 0 || $t0201_siswa->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0201_siswa_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0201_siswa">
<form name="ft0201_siswalist" id="ft0201_siswalist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0201_siswa_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0201_siswa_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0201_siswa">
<div id="gmp_t0201_siswa" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0201_siswa_list->TotalRecs > 0 || $t0201_siswa->isGridEdit()) { ?>
<table id="tbl_t0201_siswalist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0201_siswa_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0201_siswa_list->renderListOptions();

// Render list options (header, left)
$t0201_siswa_list->ListOptions->render("header", "left");
?>
<?php if ($t0201_siswa->NIS->Visible) { // NIS ?>
	<?php if ($t0201_siswa->sortUrl($t0201_siswa->NIS) == "") { ?>
		<th data-name="NIS" class="<?php echo $t0201_siswa->NIS->headerCellClass() ?>"><div id="elh_t0201_siswa_NIS" class="t0201_siswa_NIS"><div class="ew-table-header-caption"><?php echo $t0201_siswa->NIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NIS" class="<?php echo $t0201_siswa->NIS->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0201_siswa->SortUrl($t0201_siswa->NIS) ?>',2);"><div id="elh_t0201_siswa_NIS" class="t0201_siswa_NIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0201_siswa->NIS->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0201_siswa->NIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0201_siswa->NIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0201_siswa->Nama->Visible) { // Nama ?>
	<?php if ($t0201_siswa->sortUrl($t0201_siswa->Nama) == "") { ?>
		<th data-name="Nama" class="<?php echo $t0201_siswa->Nama->headerCellClass() ?>"><div id="elh_t0201_siswa_Nama" class="t0201_siswa_Nama"><div class="ew-table-header-caption"><?php echo $t0201_siswa->Nama->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nama" class="<?php echo $t0201_siswa->Nama->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0201_siswa->SortUrl($t0201_siswa->Nama) ?>',2);"><div id="elh_t0201_siswa_Nama" class="t0201_siswa_Nama">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0201_siswa->Nama->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0201_siswa->Nama->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0201_siswa->Nama->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0201_siswa_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0201_siswa->ExportAll && $t0201_siswa->isExport()) {
	$t0201_siswa_list->StopRec = $t0201_siswa_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0201_siswa_list->TotalRecs > $t0201_siswa_list->StartRec + $t0201_siswa_list->DisplayRecs - 1)
		$t0201_siswa_list->StopRec = $t0201_siswa_list->StartRec + $t0201_siswa_list->DisplayRecs - 1;
	else
		$t0201_siswa_list->StopRec = $t0201_siswa_list->TotalRecs;
}
$t0201_siswa_list->RecCnt = $t0201_siswa_list->StartRec - 1;
if ($t0201_siswa_list->Recordset && !$t0201_siswa_list->Recordset->EOF) {
	$t0201_siswa_list->Recordset->moveFirst();
	$selectLimit = $t0201_siswa_list->UseSelectLimit;
	if (!$selectLimit && $t0201_siswa_list->StartRec > 1)
		$t0201_siswa_list->Recordset->move($t0201_siswa_list->StartRec - 1);
} elseif (!$t0201_siswa->AllowAddDeleteRow && $t0201_siswa_list->StopRec == 0) {
	$t0201_siswa_list->StopRec = $t0201_siswa->GridAddRowCount;
}

// Initialize aggregate
$t0201_siswa->RowType = ROWTYPE_AGGREGATEINIT;
$t0201_siswa->resetAttributes();
$t0201_siswa_list->renderRow();
while ($t0201_siswa_list->RecCnt < $t0201_siswa_list->StopRec) {
	$t0201_siswa_list->RecCnt++;
	if ($t0201_siswa_list->RecCnt >= $t0201_siswa_list->StartRec) {
		$t0201_siswa_list->RowCnt++;

		// Set up key count
		$t0201_siswa_list->KeyCount = $t0201_siswa_list->RowIndex;

		// Init row class and style
		$t0201_siswa->resetAttributes();
		$t0201_siswa->CssClass = "";
		if ($t0201_siswa->isGridAdd()) {
		} else {
			$t0201_siswa_list->loadRowValues($t0201_siswa_list->Recordset); // Load row values
		}
		$t0201_siswa->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0201_siswa->RowAttrs = array_merge($t0201_siswa->RowAttrs, array('data-rowindex'=>$t0201_siswa_list->RowCnt, 'id'=>'r' . $t0201_siswa_list->RowCnt . '_t0201_siswa', 'data-rowtype'=>$t0201_siswa->RowType));

		// Render row
		$t0201_siswa_list->renderRow();

		// Render list options
		$t0201_siswa_list->renderListOptions();
?>
	<tr<?php echo $t0201_siswa->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0201_siswa_list->ListOptions->render("body", "left", $t0201_siswa_list->RowCnt);
?>
	<?php if ($t0201_siswa->NIS->Visible) { // NIS ?>
		<td data-name="NIS"<?php echo $t0201_siswa->NIS->cellAttributes() ?>>
<span id="el<?php echo $t0201_siswa_list->RowCnt ?>_t0201_siswa_NIS" class="t0201_siswa_NIS">
<span<?php echo $t0201_siswa->NIS->viewAttributes() ?>>
<?php echo $t0201_siswa->NIS->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0201_siswa->Nama->Visible) { // Nama ?>
		<td data-name="Nama"<?php echo $t0201_siswa->Nama->cellAttributes() ?>>
<span id="el<?php echo $t0201_siswa_list->RowCnt ?>_t0201_siswa_Nama" class="t0201_siswa_Nama">
<span<?php echo $t0201_siswa->Nama->viewAttributes() ?>>
<?php echo $t0201_siswa->Nama->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0201_siswa_list->ListOptions->render("body", "right", $t0201_siswa_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0201_siswa->isGridAdd())
		$t0201_siswa_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0201_siswa->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0201_siswa_list->Recordset)
	$t0201_siswa_list->Recordset->Close();
?>
<?php if (!$t0201_siswa->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0201_siswa->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0201_siswa_list->Pager)) $t0201_siswa_list->Pager = new PrevNextPager($t0201_siswa_list->StartRec, $t0201_siswa_list->DisplayRecs, $t0201_siswa_list->TotalRecs, $t0201_siswa_list->AutoHidePager) ?>
<?php if ($t0201_siswa_list->Pager->RecordCount > 0 && $t0201_siswa_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0201_siswa_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0201_siswa_list->pageUrl() ?>start=<?php echo $t0201_siswa_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0201_siswa_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0201_siswa_list->pageUrl() ?>start=<?php echo $t0201_siswa_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0201_siswa_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0201_siswa_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0201_siswa_list->pageUrl() ?>start=<?php echo $t0201_siswa_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0201_siswa_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0201_siswa_list->pageUrl() ?>start=<?php echo $t0201_siswa_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0201_siswa_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0201_siswa_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0201_siswa_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0201_siswa_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0201_siswa_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0201_siswa_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0201_siswa_list->TotalRecs == 0 && !$t0201_siswa->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0201_siswa_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0201_siswa_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0201_siswa->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0201_siswa_list->terminate();
?>