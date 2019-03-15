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
$t0302_bayardetail_list = new t0302_bayardetail_list();

// Run the page
$t0302_bayardetail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0302_bayardetail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0302_bayardetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0302_bayardetaillist = currentForm = new ew.Form("ft0302_bayardetaillist", "list");
ft0302_bayardetaillist.formKeyCountName = '<?php echo $t0302_bayardetail_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft0302_bayardetaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0302_bayardetaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0302_bayardetaillist.lists["x_iuran_id"] = <?php echo $t0302_bayardetail_list->iuran_id->Lookup->toClientList() ?>;
ft0302_bayardetaillist.lists["x_iuran_id"].options = <?php echo JsonEncode($t0302_bayardetail_list->iuran_id->lookupOptions()) ?>;
ft0302_bayardetaillist.autoSuggests["x_iuran_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
var ft0302_bayardetaillistsrch = currentSearchForm = new ew.Form("ft0302_bayardetaillistsrch");

// Filters
ft0302_bayardetaillistsrch.filterList = <?php echo $t0302_bayardetail_list->getFilterList() ?>;
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
<?php if (!$t0302_bayardetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0302_bayardetail_list->TotalRecs > 0 && $t0302_bayardetail_list->ExportOptions->visible()) { ?>
<?php $t0302_bayardetail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0302_bayardetail_list->ImportOptions->visible()) { ?>
<?php $t0302_bayardetail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t0302_bayardetail_list->SearchOptions->visible()) { ?>
<?php $t0302_bayardetail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t0302_bayardetail_list->FilterOptions->visible()) { ?>
<?php $t0302_bayardetail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t0302_bayardetail->isExport() || EXPORT_MASTER_RECORD && $t0302_bayardetail->isExport("print")) { ?>
<?php
if ($t0302_bayardetail_list->DbMasterFilter <> "" && $t0302_bayardetail->getCurrentMasterTable() == "t0301_bayarmaster") {
	if ($t0302_bayardetail_list->MasterRecordExists) {
		include_once "t0301_bayarmastermaster.php";
	}
}
?>
<?php } ?>
<?php
$t0302_bayardetail_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t0302_bayardetail->isExport() && !$t0302_bayardetail->CurrentAction) { ?>
<form name="ft0302_bayardetaillistsrch" id="ft0302_bayardetaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t0302_bayardetail_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft0302_bayardetaillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t0302_bayardetail">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t0302_bayardetail_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t0302_bayardetail_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t0302_bayardetail_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t0302_bayardetail_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t0302_bayardetail_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t0302_bayardetail_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t0302_bayardetail_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t0302_bayardetail_list->showPageHeader(); ?>
<?php
$t0302_bayardetail_list->showMessage();
?>
<?php if ($t0302_bayardetail_list->TotalRecs > 0 || $t0302_bayardetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0302_bayardetail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0302_bayardetail">
<form name="ft0302_bayardetaillist" id="ft0302_bayardetaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0302_bayardetail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0302_bayardetail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0302_bayardetail">
<?php if ($t0302_bayardetail->getCurrentMasterTable() == "t0301_bayarmaster" && $t0302_bayardetail->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t0301_bayarmaster">
<input type="hidden" name="fk_id" value="<?php echo $t0302_bayardetail->bayarmaster_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_t0302_bayardetail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0302_bayardetail_list->TotalRecs > 0 || $t0302_bayardetail->isGridEdit()) { ?>
<table id="tbl_t0302_bayardetaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0302_bayardetail_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0302_bayardetail_list->renderListOptions();

// Render list options (header, left)
$t0302_bayardetail_list->ListOptions->render("header", "left");
?>
<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->iuran_id) == "") { ?>
		<th data-name="iuran_id" class="<?php echo $t0302_bayardetail->iuran_id->headerCellClass() ?>"><div id="elh_t0302_bayardetail_iuran_id" class="t0302_bayardetail_iuran_id"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->iuran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iuran_id" class="<?php echo $t0302_bayardetail->iuran_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0302_bayardetail->SortUrl($t0302_bayardetail->iuran_id) ?>',2);"><div id="elh_t0302_bayardetail_iuran_id" class="t0302_bayardetail_iuran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->iuran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->iuran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->iuran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->Periode1) == "") { ?>
		<th data-name="Periode1" class="<?php echo $t0302_bayardetail->Periode1->headerCellClass() ?>"><div id="elh_t0302_bayardetail_Periode1" class="t0302_bayardetail_Periode1"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode1" class="<?php echo $t0302_bayardetail->Periode1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0302_bayardetail->SortUrl($t0302_bayardetail->Periode1) ?>',2);"><div id="elh_t0302_bayardetail_Periode1" class="t0302_bayardetail_Periode1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->Periode1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->Periode1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->Periode2) == "") { ?>
		<th data-name="Periode2" class="<?php echo $t0302_bayardetail->Periode2->headerCellClass() ?>"><div id="elh_t0302_bayardetail_Periode2" class="t0302_bayardetail_Periode2"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode2" class="<?php echo $t0302_bayardetail->Periode2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0302_bayardetail->SortUrl($t0302_bayardetail->Periode2) ?>',2);"><div id="elh_t0302_bayardetail_Periode2" class="t0302_bayardetail_Periode2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->Periode2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->Periode2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->Keterangan) == "") { ?>
		<th data-name="Keterangan" class="<?php echo $t0302_bayardetail->Keterangan->headerCellClass() ?>"><div id="elh_t0302_bayardetail_Keterangan" class="t0302_bayardetail_Keterangan"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->Keterangan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Keterangan" class="<?php echo $t0302_bayardetail->Keterangan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0302_bayardetail->SortUrl($t0302_bayardetail->Keterangan) ?>',2);"><div id="elh_t0302_bayardetail_Keterangan" class="t0302_bayardetail_Keterangan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Keterangan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->Keterangan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->Keterangan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->Jumlah) == "") { ?>
		<th data-name="Jumlah" class="<?php echo $t0302_bayardetail->Jumlah->headerCellClass() ?>"><div id="elh_t0302_bayardetail_Jumlah" class="t0302_bayardetail_Jumlah"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->Jumlah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah" class="<?php echo $t0302_bayardetail->Jumlah->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0302_bayardetail->SortUrl($t0302_bayardetail->Jumlah) ?>',2);"><div id="elh_t0302_bayardetail_Jumlah" class="t0302_bayardetail_Jumlah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Jumlah->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->Jumlah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->Jumlah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0302_bayardetail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t0302_bayardetail->ExportAll && $t0302_bayardetail->isExport()) {
	$t0302_bayardetail_list->StopRec = $t0302_bayardetail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0302_bayardetail_list->TotalRecs > $t0302_bayardetail_list->StartRec + $t0302_bayardetail_list->DisplayRecs - 1)
		$t0302_bayardetail_list->StopRec = $t0302_bayardetail_list->StartRec + $t0302_bayardetail_list->DisplayRecs - 1;
	else
		$t0302_bayardetail_list->StopRec = $t0302_bayardetail_list->TotalRecs;
}
$t0302_bayardetail_list->RecCnt = $t0302_bayardetail_list->StartRec - 1;
if ($t0302_bayardetail_list->Recordset && !$t0302_bayardetail_list->Recordset->EOF) {
	$t0302_bayardetail_list->Recordset->moveFirst();
	$selectLimit = $t0302_bayardetail_list->UseSelectLimit;
	if (!$selectLimit && $t0302_bayardetail_list->StartRec > 1)
		$t0302_bayardetail_list->Recordset->move($t0302_bayardetail_list->StartRec - 1);
} elseif (!$t0302_bayardetail->AllowAddDeleteRow && $t0302_bayardetail_list->StopRec == 0) {
	$t0302_bayardetail_list->StopRec = $t0302_bayardetail->GridAddRowCount;
}

// Initialize aggregate
$t0302_bayardetail->RowType = ROWTYPE_AGGREGATEINIT;
$t0302_bayardetail->resetAttributes();
$t0302_bayardetail_list->renderRow();
while ($t0302_bayardetail_list->RecCnt < $t0302_bayardetail_list->StopRec) {
	$t0302_bayardetail_list->RecCnt++;
	if ($t0302_bayardetail_list->RecCnt >= $t0302_bayardetail_list->StartRec) {
		$t0302_bayardetail_list->RowCnt++;

		// Set up key count
		$t0302_bayardetail_list->KeyCount = $t0302_bayardetail_list->RowIndex;

		// Init row class and style
		$t0302_bayardetail->resetAttributes();
		$t0302_bayardetail->CssClass = "";
		if ($t0302_bayardetail->isGridAdd()) {
		} else {
			$t0302_bayardetail_list->loadRowValues($t0302_bayardetail_list->Recordset); // Load row values
		}
		$t0302_bayardetail->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t0302_bayardetail->RowAttrs = array_merge($t0302_bayardetail->RowAttrs, array('data-rowindex'=>$t0302_bayardetail_list->RowCnt, 'id'=>'r' . $t0302_bayardetail_list->RowCnt . '_t0302_bayardetail', 'data-rowtype'=>$t0302_bayardetail->RowType));

		// Render row
		$t0302_bayardetail_list->renderRow();

		// Render list options
		$t0302_bayardetail_list->renderListOptions();
?>
	<tr<?php echo $t0302_bayardetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0302_bayardetail_list->ListOptions->render("body", "left", $t0302_bayardetail_list->RowCnt);
?>
	<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
		<td data-name="iuran_id"<?php echo $t0302_bayardetail->iuran_id->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_list->RowCnt ?>_t0302_bayardetail_iuran_id" class="t0302_bayardetail_iuran_id">
<span<?php echo $t0302_bayardetail->iuran_id->viewAttributes() ?>>
<?php echo $t0302_bayardetail->iuran_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
		<td data-name="Periode1"<?php echo $t0302_bayardetail->Periode1->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_list->RowCnt ?>_t0302_bayardetail_Periode1" class="t0302_bayardetail_Periode1">
<span<?php echo $t0302_bayardetail->Periode1->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
		<td data-name="Periode2"<?php echo $t0302_bayardetail->Periode2->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_list->RowCnt ?>_t0302_bayardetail_Periode2" class="t0302_bayardetail_Periode2">
<span<?php echo $t0302_bayardetail->Periode2->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
		<td data-name="Keterangan"<?php echo $t0302_bayardetail->Keterangan->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_list->RowCnt ?>_t0302_bayardetail_Keterangan" class="t0302_bayardetail_Keterangan">
<span<?php echo $t0302_bayardetail->Keterangan->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Keterangan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah"<?php echo $t0302_bayardetail->Jumlah->cellAttributes() ?>>
<span id="el<?php echo $t0302_bayardetail_list->RowCnt ?>_t0302_bayardetail_Jumlah" class="t0302_bayardetail_Jumlah">
<span<?php echo $t0302_bayardetail->Jumlah->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Jumlah->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0302_bayardetail_list->ListOptions->render("body", "right", $t0302_bayardetail_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t0302_bayardetail->isGridAdd())
		$t0302_bayardetail_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t0302_bayardetail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0302_bayardetail_list->Recordset)
	$t0302_bayardetail_list->Recordset->Close();
?>
<?php if (!$t0302_bayardetail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0302_bayardetail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0302_bayardetail_list->Pager)) $t0302_bayardetail_list->Pager = new PrevNextPager($t0302_bayardetail_list->StartRec, $t0302_bayardetail_list->DisplayRecs, $t0302_bayardetail_list->TotalRecs, $t0302_bayardetail_list->AutoHidePager) ?>
<?php if ($t0302_bayardetail_list->Pager->RecordCount > 0 && $t0302_bayardetail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0302_bayardetail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0302_bayardetail_list->pageUrl() ?>start=<?php echo $t0302_bayardetail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0302_bayardetail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0302_bayardetail_list->pageUrl() ?>start=<?php echo $t0302_bayardetail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0302_bayardetail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0302_bayardetail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0302_bayardetail_list->pageUrl() ?>start=<?php echo $t0302_bayardetail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0302_bayardetail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0302_bayardetail_list->pageUrl() ?>start=<?php echo $t0302_bayardetail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0302_bayardetail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0302_bayardetail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0302_bayardetail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0302_bayardetail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0302_bayardetail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0302_bayardetail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0302_bayardetail_list->TotalRecs == 0 && !$t0302_bayardetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0302_bayardetail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0302_bayardetail_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0302_bayardetail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0302_bayardetail_list->terminate();
?>