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
$t0301_bayarmaster_list = new t0301_bayarmaster_list();

// Run the page
$t0301_bayarmaster_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0301_bayarmaster_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0301_bayarmaster->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0301_bayarmasterlist = currentForm = new ew.Form("ft0301_bayarmasterlist", "list");
ft0301_bayarmasterlist.formKeyCountName = '<?php echo $t0301_bayarmaster_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0301_bayarmasterlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0301_bayarmasterlist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0301_bayarmasterlist.lists["x_siswa_id"] = <?php echo $t0301_bayarmaster_list->siswa_id->Lookup->toClientList() ?>;
ft0301_bayarmasterlist.lists["x_siswa_id"].options = <?php echo JsonEncode($t0301_bayarmaster_list->siswa_id->lookupOptions()) ?>;
ft0301_bayarmasterlist.autoSuggests["x_siswa_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var ft0301_bayarmasterlistsrch = currentSearchForm = new ew.Form("ft0301_bayarmasterlistsrch");

// Filters
ft0301_bayarmasterlistsrch.filterList = <?php echo $t0301_bayarmaster_list->getFilterList() ?>;
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
<?php if (!$t0301_bayarmaster->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0301_bayarmaster_list->TotalRecs > 0 && $t0301_bayarmaster_list->ExportOptions->visible()) { ?>
<?php $t0301_bayarmaster_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0301_bayarmaster_list->ImportOptions->visible()) { ?>
<?php $t0301_bayarmaster_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0301_bayarmaster_list->SearchOptions->visible()) { ?>
<?php $t0301_bayarmaster_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0301_bayarmaster_list->FilterOptions->visible()) { ?>
<?php $t0301_bayarmaster_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t0301_bayarmaster_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t0301_bayarmaster->isExport() && !$t0301_bayarmaster->CurrentAction) { ?>
<form name="ft0301_bayarmasterlistsrch" id="ft0301_bayarmasterlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0301_bayarmaster_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0301_bayarmasterlistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0301_bayarmaster">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0301_bayarmaster_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0301_bayarmaster_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0301_bayarmaster_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0301_bayarmaster_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0301_bayarmaster_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0301_bayarmaster_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0301_bayarmaster_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t0301_bayarmaster_list->showPageHeader(); ?>
<?php
$t0301_bayarmaster_list->showMessage();
?>
<?php if ($t0301_bayarmaster_list->TotalRecs > 0 || $t0301_bayarmaster->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0301_bayarmaster_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0301_bayarmaster">
<form name="ft0301_bayarmasterlist" id="ft0301_bayarmasterlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0301_bayarmaster_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0301_bayarmaster_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0301_bayarmaster">
<div id="gmp_t0301_bayarmaster" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0301_bayarmaster_list->TotalRecs > 0 || $t0301_bayarmaster->isGridEdit()) { ?>
<table id="tbl_t0301_bayarmasterlist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0301_bayarmaster_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0301_bayarmaster_list->renderListOptions();

// Render list options (header, left)
$t0301_bayarmaster_list->ListOptions->render("header", "left");
?>
<?php if ($t0301_bayarmaster->Nomor->Visible) { // Nomor ?>
	<?php if ($t0301_bayarmaster->sortUrl($t0301_bayarmaster->Nomor) == "") { ?>
		<th data-name="Nomor" class="<?php echo $t0301_bayarmaster->Nomor->headerCellClass() ?>"><div id="elh_t0301_bayarmaster_Nomor" class="t0301_bayarmaster_Nomor"><div class="ew-table-header-caption"><?php echo $t0301_bayarmaster->Nomor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor" class="<?php echo $t0301_bayarmaster->Nomor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0301_bayarmaster->SortUrl($t0301_bayarmaster->Nomor) ?>',2);"><div id="elh_t0301_bayarmaster_Nomor" class="t0301_bayarmaster_Nomor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0301_bayarmaster->Nomor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0301_bayarmaster->Nomor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0301_bayarmaster->Nomor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0301_bayarmaster->Tanggal->Visible) { // Tanggal ?>
	<?php if ($t0301_bayarmaster->sortUrl($t0301_bayarmaster->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $t0301_bayarmaster->Tanggal->headerCellClass() ?>"><div id="elh_t0301_bayarmaster_Tanggal" class="t0301_bayarmaster_Tanggal"><div class="ew-table-header-caption"><?php echo $t0301_bayarmaster->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $t0301_bayarmaster->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0301_bayarmaster->SortUrl($t0301_bayarmaster->Tanggal) ?>',2);"><div id="elh_t0301_bayarmaster_Tanggal" class="t0301_bayarmaster_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0301_bayarmaster->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0301_bayarmaster->Tanggal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0301_bayarmaster->Tanggal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0301_bayarmaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<?php if ($t0301_bayarmaster->sortUrl($t0301_bayarmaster->tahunajaran_id) == "") { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t0301_bayarmaster->tahunajaran_id->headerCellClass() ?>"><div id="elh_t0301_bayarmaster_tahunajaran_id" class="t0301_bayarmaster_tahunajaran_id"><div class="ew-table-header-caption"><?php echo $t0301_bayarmaster->tahunajaran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t0301_bayarmaster->tahunajaran_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0301_bayarmaster->SortUrl($t0301_bayarmaster->tahunajaran_id) ?>',2);"><div id="elh_t0301_bayarmaster_tahunajaran_id" class="t0301_bayarmaster_tahunajaran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0301_bayarmaster->tahunajaran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0301_bayarmaster->tahunajaran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0301_bayarmaster->tahunajaran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0301_bayarmaster->siswa_id->Visible) { // siswa_id ?>
	<?php if ($t0301_bayarmaster->sortUrl($t0301_bayarmaster->siswa_id) == "") { ?>
		<th data-name="siswa_id" class="<?php echo $t0301_bayarmaster->siswa_id->headerCellClass() ?>"><div id="elh_t0301_bayarmaster_siswa_id" class="t0301_bayarmaster_siswa_id"><div class="ew-table-header-caption"><?php echo $t0301_bayarmaster->siswa_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="siswa_id" class="<?php echo $t0301_bayarmaster->siswa_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0301_bayarmaster->SortUrl($t0301_bayarmaster->siswa_id) ?>',2);"><div id="elh_t0301_bayarmaster_siswa_id" class="t0301_bayarmaster_siswa_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0301_bayarmaster->siswa_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0301_bayarmaster->siswa_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0301_bayarmaster->siswa_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0301_bayarmaster->Total->Visible) { // Total ?>
	<?php if ($t0301_bayarmaster->sortUrl($t0301_bayarmaster->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $t0301_bayarmaster->Total->headerCellClass() ?>"><div id="elh_t0301_bayarmaster_Total" class="t0301_bayarmaster_Total"><div class="ew-table-header-caption"><?php echo $t0301_bayarmaster->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $t0301_bayarmaster->Total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0301_bayarmaster->SortUrl($t0301_bayarmaster->Total) ?>',2);"><div id="elh_t0301_bayarmaster_Total" class="t0301_bayarmaster_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0301_bayarmaster->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0301_bayarmaster->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0301_bayarmaster->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0301_bayarmaster_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0301_bayarmaster->ExportAll && $t0301_bayarmaster->isExport()) {
	$t0301_bayarmaster_list->StopRec = $t0301_bayarmaster_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0301_bayarmaster_list->TotalRecs > $t0301_bayarmaster_list->StartRec + $t0301_bayarmaster_list->DisplayRecs - 1)
		$t0301_bayarmaster_list->StopRec = $t0301_bayarmaster_list->StartRec + $t0301_bayarmaster_list->DisplayRecs - 1;
	else
		$t0301_bayarmaster_list->StopRec = $t0301_bayarmaster_list->TotalRecs;
}
$t0301_bayarmaster_list->RecCnt = $t0301_bayarmaster_list->StartRec - 1;
if ($t0301_bayarmaster_list->Recordset && !$t0301_bayarmaster_list->Recordset->EOF) {
	$t0301_bayarmaster_list->Recordset->moveFirst();
	$selectLimit = $t0301_bayarmaster_list->UseSelectLimit;
	if (!$selectLimit && $t0301_bayarmaster_list->StartRec > 1)
		$t0301_bayarmaster_list->Recordset->move($t0301_bayarmaster_list->StartRec - 1);
} elseif (!$t0301_bayarmaster->AllowAddDeleteRow && $t0301_bayarmaster_list->StopRec == 0) {
	$t0301_bayarmaster_list->StopRec = $t0301_bayarmaster->GridAddRowCount;
}

// Initialize aggregate
$t0301_bayarmaster->RowType = ROWTYPE_AGGREGATEINIT;
$t0301_bayarmaster->resetAttributes();
$t0301_bayarmaster_list->renderRow();
while ($t0301_bayarmaster_list->RecCnt < $t0301_bayarmaster_list->StopRec) {
	$t0301_bayarmaster_list->RecCnt++;
	if ($t0301_bayarmaster_list->RecCnt >= $t0301_bayarmaster_list->StartRec) {
		$t0301_bayarmaster_list->RowCnt++;

		// Set up key count
		$t0301_bayarmaster_list->KeyCount = $t0301_bayarmaster_list->RowIndex;

		// Init row class and style
		$t0301_bayarmaster->resetAttributes();
		$t0301_bayarmaster->CssClass = "";
		if ($t0301_bayarmaster->isGridAdd()) {
		} else {
			$t0301_bayarmaster_list->loadRowValues($t0301_bayarmaster_list->Recordset); // Load row values
		}
		$t0301_bayarmaster->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0301_bayarmaster->RowAttrs = array_merge($t0301_bayarmaster->RowAttrs, array('data-rowindex'=>$t0301_bayarmaster_list->RowCnt, 'id'=>'r' . $t0301_bayarmaster_list->RowCnt . '_t0301_bayarmaster', 'data-rowtype'=>$t0301_bayarmaster->RowType));

		// Render row
		$t0301_bayarmaster_list->renderRow();

		// Render list options
		$t0301_bayarmaster_list->renderListOptions();
?>
	<tr<?php echo $t0301_bayarmaster->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0301_bayarmaster_list->ListOptions->render("body", "left", $t0301_bayarmaster_list->RowCnt);
?>
	<?php if ($t0301_bayarmaster->Nomor->Visible) { // Nomor ?>
		<td data-name="Nomor"<?php echo $t0301_bayarmaster->Nomor->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_list->RowCnt ?>_t0301_bayarmaster_Nomor" class="t0301_bayarmaster_Nomor">
<span<?php echo $t0301_bayarmaster->Nomor->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Nomor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0301_bayarmaster->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal"<?php echo $t0301_bayarmaster->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_list->RowCnt ?>_t0301_bayarmaster_Tanggal" class="t0301_bayarmaster_Tanggal">
<span<?php echo $t0301_bayarmaster->Tanggal->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Tanggal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0301_bayarmaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td data-name="tahunajaran_id"<?php echo $t0301_bayarmaster->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_list->RowCnt ?>_t0301_bayarmaster_tahunajaran_id" class="t0301_bayarmaster_tahunajaran_id">
<span<?php echo $t0301_bayarmaster->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0301_bayarmaster->siswa_id->Visible) { // siswa_id ?>
		<td data-name="siswa_id"<?php echo $t0301_bayarmaster->siswa_id->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_list->RowCnt ?>_t0301_bayarmaster_siswa_id" class="t0301_bayarmaster_siswa_id">
<span<?php echo $t0301_bayarmaster->siswa_id->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->siswa_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0301_bayarmaster->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $t0301_bayarmaster->Total->cellAttributes() ?>>
<span id="el<?php echo $t0301_bayarmaster_list->RowCnt ?>_t0301_bayarmaster_Total" class="t0301_bayarmaster_Total">
<span<?php echo $t0301_bayarmaster->Total->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0301_bayarmaster_list->ListOptions->render("body", "right", $t0301_bayarmaster_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0301_bayarmaster->isGridAdd())
		$t0301_bayarmaster_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0301_bayarmaster->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0301_bayarmaster_list->Recordset)
	$t0301_bayarmaster_list->Recordset->Close();
?>
<?php if (!$t0301_bayarmaster->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0301_bayarmaster->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0301_bayarmaster_list->Pager)) $t0301_bayarmaster_list->Pager = new PrevNextPager($t0301_bayarmaster_list->StartRec, $t0301_bayarmaster_list->DisplayRecs, $t0301_bayarmaster_list->TotalRecs, $t0301_bayarmaster_list->AutoHidePager) ?>
<?php if ($t0301_bayarmaster_list->Pager->RecordCount > 0 && $t0301_bayarmaster_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0301_bayarmaster_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0301_bayarmaster_list->pageUrl() ?>start=<?php echo $t0301_bayarmaster_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0301_bayarmaster_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0301_bayarmaster_list->pageUrl() ?>start=<?php echo $t0301_bayarmaster_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0301_bayarmaster_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0301_bayarmaster_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0301_bayarmaster_list->pageUrl() ?>start=<?php echo $t0301_bayarmaster_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0301_bayarmaster_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0301_bayarmaster_list->pageUrl() ?>start=<?php echo $t0301_bayarmaster_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0301_bayarmaster_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0301_bayarmaster_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0301_bayarmaster_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0301_bayarmaster_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0301_bayarmaster_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0301_bayarmaster_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0301_bayarmaster_list->TotalRecs == 0 && !$t0301_bayarmaster->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0301_bayarmaster_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0301_bayarmaster_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0301_bayarmaster->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0301_bayarmaster_list->terminate();
?>