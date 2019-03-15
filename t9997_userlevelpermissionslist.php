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
$t9997_userlevelpermissions_list = new t9997_userlevelpermissions_list();

// Run the page
$t9997_userlevelpermissions_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9997_userlevelpermissions_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9997_userlevelpermissions->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft9997_userlevelpermissionslist = currentForm = new ew.Form("ft9997_userlevelpermissionslist", "list");
ft9997_userlevelpermissionslist.formKeyCountName = '<?php echo $t9997_userlevelpermissions_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft9997_userlevelpermissionslist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9997_userlevelpermissionslist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft9997_userlevelpermissionslistsrch = currentSearchForm = new ew.Form("ft9997_userlevelpermissionslistsrch");

// Filters
ft9997_userlevelpermissionslistsrch.filterList = <?php echo $t9997_userlevelpermissions_list->getFilterList() ?>;
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
<?php if (!$t9997_userlevelpermissions->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t9997_userlevelpermissions_list->TotalRecs > 0 && $t9997_userlevelpermissions_list->ExportOptions->visible()) { ?>
<?php $t9997_userlevelpermissions_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t9997_userlevelpermissions_list->ImportOptions->visible()) { ?>
<?php $t9997_userlevelpermissions_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t9997_userlevelpermissions_list->SearchOptions->visible()) { ?>
<?php $t9997_userlevelpermissions_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t9997_userlevelpermissions_list->FilterOptions->visible()) { ?>
<?php $t9997_userlevelpermissions_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t9997_userlevelpermissions_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t9997_userlevelpermissions->isExport() && !$t9997_userlevelpermissions->CurrentAction) { ?>
<form name="ft9997_userlevelpermissionslistsrch" id="ft9997_userlevelpermissionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t9997_userlevelpermissions_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft9997_userlevelpermissionslistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t9997_userlevelpermissions">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t9997_userlevelpermissions_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t9997_userlevelpermissions_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t9997_userlevelpermissions_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t9997_userlevelpermissions_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t9997_userlevelpermissions_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t9997_userlevelpermissions_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t9997_userlevelpermissions_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t9997_userlevelpermissions_list->showPageHeader(); ?>
<?php
$t9997_userlevelpermissions_list->showMessage();
?>
<?php if ($t9997_userlevelpermissions_list->TotalRecs > 0 || $t9997_userlevelpermissions->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t9997_userlevelpermissions_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t9997_userlevelpermissions">
<form name="ft9997_userlevelpermissionslist" id="ft9997_userlevelpermissionslist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9997_userlevelpermissions_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9997_userlevelpermissions_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9997_userlevelpermissions">
<div id="gmp_t9997_userlevelpermissions" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t9997_userlevelpermissions_list->TotalRecs > 0 || $t9997_userlevelpermissions->isGridEdit()) { ?>
<table id="tbl_t9997_userlevelpermissionslist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t9997_userlevelpermissions_list->RowType = ROWTYPE_HEADER;

// Render list options
$t9997_userlevelpermissions_list->renderListOptions();

// Render list options (header, left)
$t9997_userlevelpermissions_list->ListOptions->render("header", "left");
?>
<?php if ($t9997_userlevelpermissions->userlevelid->Visible) { // userlevelid ?>
	<?php if ($t9997_userlevelpermissions->sortUrl($t9997_userlevelpermissions->userlevelid) == "") { ?>
		<th data-name="userlevelid" class="<?php echo $t9997_userlevelpermissions->userlevelid->headerCellClass() ?>"><div id="elh_t9997_userlevelpermissions_userlevelid" class="t9997_userlevelpermissions_userlevelid"><div class="ew-table-header-caption"><?php echo $t9997_userlevelpermissions->userlevelid->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="userlevelid" class="<?php echo $t9997_userlevelpermissions->userlevelid->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9997_userlevelpermissions->SortUrl($t9997_userlevelpermissions->userlevelid) ?>',2);"><div id="elh_t9997_userlevelpermissions_userlevelid" class="t9997_userlevelpermissions_userlevelid">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9997_userlevelpermissions->userlevelid->caption() ?></span><span class="ew-table-header-sort"><?php if ($t9997_userlevelpermissions->userlevelid->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9997_userlevelpermissions->userlevelid->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9997_userlevelpermissions->_tablename->Visible) { // tablename ?>
	<?php if ($t9997_userlevelpermissions->sortUrl($t9997_userlevelpermissions->_tablename) == "") { ?>
		<th data-name="_tablename" class="<?php echo $t9997_userlevelpermissions->_tablename->headerCellClass() ?>"><div id="elh_t9997_userlevelpermissions__tablename" class="t9997_userlevelpermissions__tablename"><div class="ew-table-header-caption"><?php echo $t9997_userlevelpermissions->_tablename->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_tablename" class="<?php echo $t9997_userlevelpermissions->_tablename->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9997_userlevelpermissions->SortUrl($t9997_userlevelpermissions->_tablename) ?>',2);"><div id="elh_t9997_userlevelpermissions__tablename" class="t9997_userlevelpermissions__tablename">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9997_userlevelpermissions->_tablename->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9997_userlevelpermissions->_tablename->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9997_userlevelpermissions->_tablename->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9997_userlevelpermissions->permission->Visible) { // permission ?>
	<?php if ($t9997_userlevelpermissions->sortUrl($t9997_userlevelpermissions->permission) == "") { ?>
		<th data-name="permission" class="<?php echo $t9997_userlevelpermissions->permission->headerCellClass() ?>"><div id="elh_t9997_userlevelpermissions_permission" class="t9997_userlevelpermissions_permission"><div class="ew-table-header-caption"><?php echo $t9997_userlevelpermissions->permission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="permission" class="<?php echo $t9997_userlevelpermissions->permission->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9997_userlevelpermissions->SortUrl($t9997_userlevelpermissions->permission) ?>',2);"><div id="elh_t9997_userlevelpermissions_permission" class="t9997_userlevelpermissions_permission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9997_userlevelpermissions->permission->caption() ?></span><span class="ew-table-header-sort"><?php if ($t9997_userlevelpermissions->permission->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9997_userlevelpermissions->permission->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t9997_userlevelpermissions_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t9997_userlevelpermissions->ExportAll && $t9997_userlevelpermissions->isExport()) {
	$t9997_userlevelpermissions_list->StopRec = $t9997_userlevelpermissions_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t9997_userlevelpermissions_list->TotalRecs > $t9997_userlevelpermissions_list->StartRec + $t9997_userlevelpermissions_list->DisplayRecs - 1)
		$t9997_userlevelpermissions_list->StopRec = $t9997_userlevelpermissions_list->StartRec + $t9997_userlevelpermissions_list->DisplayRecs - 1;
	else
		$t9997_userlevelpermissions_list->StopRec = $t9997_userlevelpermissions_list->TotalRecs;
}
$t9997_userlevelpermissions_list->RecCnt = $t9997_userlevelpermissions_list->StartRec - 1;
if ($t9997_userlevelpermissions_list->Recordset && !$t9997_userlevelpermissions_list->Recordset->EOF) {
	$t9997_userlevelpermissions_list->Recordset->moveFirst();
	$selectLimit = $t9997_userlevelpermissions_list->UseSelectLimit;
	if (!$selectLimit && $t9997_userlevelpermissions_list->StartRec > 1)
		$t9997_userlevelpermissions_list->Recordset->move($t9997_userlevelpermissions_list->StartRec - 1);
} elseif (!$t9997_userlevelpermissions->AllowAddDeleteRow && $t9997_userlevelpermissions_list->StopRec == 0) {
	$t9997_userlevelpermissions_list->StopRec = $t9997_userlevelpermissions->GridAddRowCount;
}

// Initialize aggregate
$t9997_userlevelpermissions->RowType = ROWTYPE_AGGREGATEINIT;
$t9997_userlevelpermissions->resetAttributes();
$t9997_userlevelpermissions_list->renderRow();
while ($t9997_userlevelpermissions_list->RecCnt < $t9997_userlevelpermissions_list->StopRec) {
	$t9997_userlevelpermissions_list->RecCnt++;
	if ($t9997_userlevelpermissions_list->RecCnt >= $t9997_userlevelpermissions_list->StartRec) {
		$t9997_userlevelpermissions_list->RowCnt++;

		// Set up key count
		$t9997_userlevelpermissions_list->KeyCount = $t9997_userlevelpermissions_list->RowIndex;

		// Init row class and style
		$t9997_userlevelpermissions->resetAttributes();
		$t9997_userlevelpermissions->CssClass = "";
		if ($t9997_userlevelpermissions->isGridAdd()) {
		} else {
			$t9997_userlevelpermissions_list->loadRowValues($t9997_userlevelpermissions_list->Recordset); // Load row values
		}
		$t9997_userlevelpermissions->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t9997_userlevelpermissions->RowAttrs = array_merge($t9997_userlevelpermissions->RowAttrs, array('data-rowindex'=>$t9997_userlevelpermissions_list->RowCnt, 'id'=>'r' . $t9997_userlevelpermissions_list->RowCnt . '_t9997_userlevelpermissions', 'data-rowtype'=>$t9997_userlevelpermissions->RowType));

		// Render row
		$t9997_userlevelpermissions_list->renderRow();

		// Render list options
		$t9997_userlevelpermissions_list->renderListOptions();
?>
	<tr<?php echo $t9997_userlevelpermissions->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t9997_userlevelpermissions_list->ListOptions->render("body", "left", $t9997_userlevelpermissions_list->RowCnt);
?>
	<?php if ($t9997_userlevelpermissions->userlevelid->Visible) { // userlevelid ?>
		<td data-name="userlevelid"<?php echo $t9997_userlevelpermissions->userlevelid->cellAttributes() ?>>
<span id="el<?php echo $t9997_userlevelpermissions_list->RowCnt ?>_t9997_userlevelpermissions_userlevelid" class="t9997_userlevelpermissions_userlevelid">
<span<?php echo $t9997_userlevelpermissions->userlevelid->viewAttributes() ?>>
<?php echo $t9997_userlevelpermissions->userlevelid->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9997_userlevelpermissions->_tablename->Visible) { // tablename ?>
		<td data-name="_tablename"<?php echo $t9997_userlevelpermissions->_tablename->cellAttributes() ?>>
<span id="el<?php echo $t9997_userlevelpermissions_list->RowCnt ?>_t9997_userlevelpermissions__tablename" class="t9997_userlevelpermissions__tablename">
<span<?php echo $t9997_userlevelpermissions->_tablename->viewAttributes() ?>>
<?php echo $t9997_userlevelpermissions->_tablename->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9997_userlevelpermissions->permission->Visible) { // permission ?>
		<td data-name="permission"<?php echo $t9997_userlevelpermissions->permission->cellAttributes() ?>>
<span id="el<?php echo $t9997_userlevelpermissions_list->RowCnt ?>_t9997_userlevelpermissions_permission" class="t9997_userlevelpermissions_permission">
<span<?php echo $t9997_userlevelpermissions->permission->viewAttributes() ?>>
<?php echo $t9997_userlevelpermissions->permission->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t9997_userlevelpermissions_list->ListOptions->render("body", "right", $t9997_userlevelpermissions_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t9997_userlevelpermissions->isGridAdd())
		$t9997_userlevelpermissions_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t9997_userlevelpermissions->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t9997_userlevelpermissions_list->Recordset)
	$t9997_userlevelpermissions_list->Recordset->Close();
?>
<?php if (!$t9997_userlevelpermissions->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t9997_userlevelpermissions->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t9997_userlevelpermissions_list->Pager)) $t9997_userlevelpermissions_list->Pager = new PrevNextPager($t9997_userlevelpermissions_list->StartRec, $t9997_userlevelpermissions_list->DisplayRecs, $t9997_userlevelpermissions_list->TotalRecs, $t9997_userlevelpermissions_list->AutoHidePager) ?>
<?php if ($t9997_userlevelpermissions_list->Pager->RecordCount > 0 && $t9997_userlevelpermissions_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t9997_userlevelpermissions_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t9997_userlevelpermissions_list->pageUrl() ?>start=<?php echo $t9997_userlevelpermissions_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t9997_userlevelpermissions_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t9997_userlevelpermissions_list->pageUrl() ?>start=<?php echo $t9997_userlevelpermissions_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t9997_userlevelpermissions_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t9997_userlevelpermissions_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t9997_userlevelpermissions_list->pageUrl() ?>start=<?php echo $t9997_userlevelpermissions_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t9997_userlevelpermissions_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t9997_userlevelpermissions_list->pageUrl() ?>start=<?php echo $t9997_userlevelpermissions_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t9997_userlevelpermissions_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t9997_userlevelpermissions_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t9997_userlevelpermissions_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t9997_userlevelpermissions_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t9997_userlevelpermissions_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t9997_userlevelpermissions_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t9997_userlevelpermissions_list->TotalRecs == 0 && !$t9997_userlevelpermissions->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t9997_userlevelpermissions_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t9997_userlevelpermissions_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9997_userlevelpermissions->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9997_userlevelpermissions_list->terminate();
?>