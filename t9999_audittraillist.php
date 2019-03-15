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
$t9999_audittrail_list = new t9999_audittrail_list();

// Run the page
$t9999_audittrail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t9999_audittrail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t9999_audittrail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft9999_audittraillist = currentForm = new ew.Form("ft9999_audittraillist", "list");
ft9999_audittraillist.formKeyCountName = '<?php echo $t9999_audittrail_list->FormKeyCountName ?>';

// Form_CustomValidate event
ft9999_audittraillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft9999_audittraillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var ft9999_audittraillistsrch = currentSearchForm = new ew.Form("ft9999_audittraillistsrch");

// Filters
ft9999_audittraillistsrch.filterList = <?php echo $t9999_audittrail_list->getFilterList() ?>;
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
<?php if (!$t9999_audittrail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t9999_audittrail_list->TotalRecs > 0 && $t9999_audittrail_list->ExportOptions->visible()) { ?>
<?php $t9999_audittrail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t9999_audittrail_list->ImportOptions->visible()) { ?>
<?php $t9999_audittrail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t9999_audittrail_list->SearchOptions->visible()) { ?>
<?php $t9999_audittrail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t9999_audittrail_list->FilterOptions->visible()) { ?>
<?php $t9999_audittrail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t9999_audittrail_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t9999_audittrail->isExport() && !$t9999_audittrail->CurrentAction) { ?>
<form name="ft9999_audittraillistsrch" id="ft9999_audittraillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($t9999_audittrail_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="ft9999_audittraillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t9999_audittrail">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($t9999_audittrail_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($t9999_audittrail_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t9999_audittrail_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t9999_audittrail_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t9999_audittrail_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t9999_audittrail_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t9999_audittrail_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $t9999_audittrail_list->showPageHeader(); ?>
<?php
$t9999_audittrail_list->showMessage();
?>
<?php if ($t9999_audittrail_list->TotalRecs > 0 || $t9999_audittrail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t9999_audittrail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t9999_audittrail">
<form name="ft9999_audittraillist" id="ft9999_audittraillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t9999_audittrail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t9999_audittrail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t9999_audittrail">
<div id="gmp_t9999_audittrail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t9999_audittrail_list->TotalRecs > 0 || $t9999_audittrail->isGridEdit()) { ?>
<table id="tbl_t9999_audittraillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t9999_audittrail_list->RowType = ROWTYPE_HEADER;

// Render list options
$t9999_audittrail_list->renderListOptions();

// Render list options (header, left)
$t9999_audittrail_list->ListOptions->render("header", "left");
?>
<?php if ($t9999_audittrail->id->Visible) { // id ?>
	<?php if ($t9999_audittrail->sortUrl($t9999_audittrail->id) == "") { ?>
		<th data-name="id" class="<?php echo $t9999_audittrail->id->headerCellClass() ?>"><div id="elh_t9999_audittrail_id" class="t9999_audittrail_id"><div class="ew-table-header-caption"><?php echo $t9999_audittrail->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t9999_audittrail->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9999_audittrail->SortUrl($t9999_audittrail->id) ?>',2);"><div id="elh_t9999_audittrail_id" class="t9999_audittrail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9999_audittrail->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t9999_audittrail->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9999_audittrail->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9999_audittrail->datetime->Visible) { // datetime ?>
	<?php if ($t9999_audittrail->sortUrl($t9999_audittrail->datetime) == "") { ?>
		<th data-name="datetime" class="<?php echo $t9999_audittrail->datetime->headerCellClass() ?>"><div id="elh_t9999_audittrail_datetime" class="t9999_audittrail_datetime"><div class="ew-table-header-caption"><?php echo $t9999_audittrail->datetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="datetime" class="<?php echo $t9999_audittrail->datetime->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9999_audittrail->SortUrl($t9999_audittrail->datetime) ?>',2);"><div id="elh_t9999_audittrail_datetime" class="t9999_audittrail_datetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9999_audittrail->datetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($t9999_audittrail->datetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9999_audittrail->datetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9999_audittrail->script->Visible) { // script ?>
	<?php if ($t9999_audittrail->sortUrl($t9999_audittrail->script) == "") { ?>
		<th data-name="script" class="<?php echo $t9999_audittrail->script->headerCellClass() ?>"><div id="elh_t9999_audittrail_script" class="t9999_audittrail_script"><div class="ew-table-header-caption"><?php echo $t9999_audittrail->script->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="script" class="<?php echo $t9999_audittrail->script->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9999_audittrail->SortUrl($t9999_audittrail->script) ?>',2);"><div id="elh_t9999_audittrail_script" class="t9999_audittrail_script">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9999_audittrail->script->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9999_audittrail->script->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9999_audittrail->script->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9999_audittrail->user->Visible) { // user ?>
	<?php if ($t9999_audittrail->sortUrl($t9999_audittrail->user) == "") { ?>
		<th data-name="user" class="<?php echo $t9999_audittrail->user->headerCellClass() ?>"><div id="elh_t9999_audittrail_user" class="t9999_audittrail_user"><div class="ew-table-header-caption"><?php echo $t9999_audittrail->user->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="user" class="<?php echo $t9999_audittrail->user->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9999_audittrail->SortUrl($t9999_audittrail->user) ?>',2);"><div id="elh_t9999_audittrail_user" class="t9999_audittrail_user">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9999_audittrail->user->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9999_audittrail->user->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9999_audittrail->user->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9999_audittrail->_action->Visible) { // action ?>
	<?php if ($t9999_audittrail->sortUrl($t9999_audittrail->_action) == "") { ?>
		<th data-name="_action" class="<?php echo $t9999_audittrail->_action->headerCellClass() ?>"><div id="elh_t9999_audittrail__action" class="t9999_audittrail__action"><div class="ew-table-header-caption"><?php echo $t9999_audittrail->_action->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_action" class="<?php echo $t9999_audittrail->_action->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9999_audittrail->SortUrl($t9999_audittrail->_action) ?>',2);"><div id="elh_t9999_audittrail__action" class="t9999_audittrail__action">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9999_audittrail->_action->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9999_audittrail->_action->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9999_audittrail->_action->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9999_audittrail->_table->Visible) { // table ?>
	<?php if ($t9999_audittrail->sortUrl($t9999_audittrail->_table) == "") { ?>
		<th data-name="_table" class="<?php echo $t9999_audittrail->_table->headerCellClass() ?>"><div id="elh_t9999_audittrail__table" class="t9999_audittrail__table"><div class="ew-table-header-caption"><?php echo $t9999_audittrail->_table->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_table" class="<?php echo $t9999_audittrail->_table->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9999_audittrail->SortUrl($t9999_audittrail->_table) ?>',2);"><div id="elh_t9999_audittrail__table" class="t9999_audittrail__table">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9999_audittrail->_table->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9999_audittrail->_table->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9999_audittrail->_table->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t9999_audittrail->field->Visible) { // field ?>
	<?php if ($t9999_audittrail->sortUrl($t9999_audittrail->field) == "") { ?>
		<th data-name="field" class="<?php echo $t9999_audittrail->field->headerCellClass() ?>"><div id="elh_t9999_audittrail_field" class="t9999_audittrail_field"><div class="ew-table-header-caption"><?php echo $t9999_audittrail->field->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="field" class="<?php echo $t9999_audittrail->field->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t9999_audittrail->SortUrl($t9999_audittrail->field) ?>',2);"><div id="elh_t9999_audittrail_field" class="t9999_audittrail_field">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t9999_audittrail->field->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t9999_audittrail->field->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t9999_audittrail->field->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t9999_audittrail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t9999_audittrail->ExportAll && $t9999_audittrail->isExport()) {
	$t9999_audittrail_list->StopRec = $t9999_audittrail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t9999_audittrail_list->TotalRecs > $t9999_audittrail_list->StartRec + $t9999_audittrail_list->DisplayRecs - 1)
		$t9999_audittrail_list->StopRec = $t9999_audittrail_list->StartRec + $t9999_audittrail_list->DisplayRecs - 1;
	else
		$t9999_audittrail_list->StopRec = $t9999_audittrail_list->TotalRecs;
}
$t9999_audittrail_list->RecCnt = $t9999_audittrail_list->StartRec - 1;
if ($t9999_audittrail_list->Recordset && !$t9999_audittrail_list->Recordset->EOF) {
	$t9999_audittrail_list->Recordset->moveFirst();
	$selectLimit = $t9999_audittrail_list->UseSelectLimit;
	if (!$selectLimit && $t9999_audittrail_list->StartRec > 1)
		$t9999_audittrail_list->Recordset->move($t9999_audittrail_list->StartRec - 1);
} elseif (!$t9999_audittrail->AllowAddDeleteRow && $t9999_audittrail_list->StopRec == 0) {
	$t9999_audittrail_list->StopRec = $t9999_audittrail->GridAddRowCount;
}

// Initialize aggregate
$t9999_audittrail->RowType = ROWTYPE_AGGREGATEINIT;
$t9999_audittrail->resetAttributes();
$t9999_audittrail_list->renderRow();
while ($t9999_audittrail_list->RecCnt < $t9999_audittrail_list->StopRec) {
	$t9999_audittrail_list->RecCnt++;
	if ($t9999_audittrail_list->RecCnt >= $t9999_audittrail_list->StartRec) {
		$t9999_audittrail_list->RowCnt++;

		// Set up key count
		$t9999_audittrail_list->KeyCount = $t9999_audittrail_list->RowIndex;

		// Init row class and style
		$t9999_audittrail->resetAttributes();
		$t9999_audittrail->CssClass = "";
		if ($t9999_audittrail->isGridAdd()) {
		} else {
			$t9999_audittrail_list->loadRowValues($t9999_audittrail_list->Recordset); // Load row values
		}
		$t9999_audittrail->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t9999_audittrail->RowAttrs = array_merge($t9999_audittrail->RowAttrs, array('data-rowindex'=>$t9999_audittrail_list->RowCnt, 'id'=>'r' . $t9999_audittrail_list->RowCnt . '_t9999_audittrail', 'data-rowtype'=>$t9999_audittrail->RowType));

		// Render row
		$t9999_audittrail_list->renderRow();

		// Render list options
		$t9999_audittrail_list->renderListOptions();
?>
	<tr<?php echo $t9999_audittrail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t9999_audittrail_list->ListOptions->render("body", "left", $t9999_audittrail_list->RowCnt);
?>
	<?php if ($t9999_audittrail->id->Visible) { // id ?>
		<td data-name="id"<?php echo $t9999_audittrail->id->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_list->RowCnt ?>_t9999_audittrail_id" class="t9999_audittrail_id">
<span<?php echo $t9999_audittrail->id->viewAttributes() ?>>
<?php echo $t9999_audittrail->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9999_audittrail->datetime->Visible) { // datetime ?>
		<td data-name="datetime"<?php echo $t9999_audittrail->datetime->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_list->RowCnt ?>_t9999_audittrail_datetime" class="t9999_audittrail_datetime">
<span<?php echo $t9999_audittrail->datetime->viewAttributes() ?>>
<?php echo $t9999_audittrail->datetime->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9999_audittrail->script->Visible) { // script ?>
		<td data-name="script"<?php echo $t9999_audittrail->script->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_list->RowCnt ?>_t9999_audittrail_script" class="t9999_audittrail_script">
<span<?php echo $t9999_audittrail->script->viewAttributes() ?>>
<?php echo $t9999_audittrail->script->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9999_audittrail->user->Visible) { // user ?>
		<td data-name="user"<?php echo $t9999_audittrail->user->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_list->RowCnt ?>_t9999_audittrail_user" class="t9999_audittrail_user">
<span<?php echo $t9999_audittrail->user->viewAttributes() ?>>
<?php echo $t9999_audittrail->user->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9999_audittrail->_action->Visible) { // action ?>
		<td data-name="_action"<?php echo $t9999_audittrail->_action->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_list->RowCnt ?>_t9999_audittrail__action" class="t9999_audittrail__action">
<span<?php echo $t9999_audittrail->_action->viewAttributes() ?>>
<?php echo $t9999_audittrail->_action->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9999_audittrail->_table->Visible) { // table ?>
		<td data-name="_table"<?php echo $t9999_audittrail->_table->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_list->RowCnt ?>_t9999_audittrail__table" class="t9999_audittrail__table">
<span<?php echo $t9999_audittrail->_table->viewAttributes() ?>>
<?php echo $t9999_audittrail->_table->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t9999_audittrail->field->Visible) { // field ?>
		<td data-name="field"<?php echo $t9999_audittrail->field->cellAttributes() ?>>
<span id="el<?php echo $t9999_audittrail_list->RowCnt ?>_t9999_audittrail_field" class="t9999_audittrail_field">
<span<?php echo $t9999_audittrail->field->viewAttributes() ?>>
<?php echo $t9999_audittrail->field->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t9999_audittrail_list->ListOptions->render("body", "right", $t9999_audittrail_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$t9999_audittrail->isGridAdd())
		$t9999_audittrail_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$t9999_audittrail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t9999_audittrail_list->Recordset)
	$t9999_audittrail_list->Recordset->Close();
?>
<?php if (!$t9999_audittrail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t9999_audittrail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t9999_audittrail_list->Pager)) $t9999_audittrail_list->Pager = new PrevNextPager($t9999_audittrail_list->StartRec, $t9999_audittrail_list->DisplayRecs, $t9999_audittrail_list->TotalRecs, $t9999_audittrail_list->AutoHidePager) ?>
<?php if ($t9999_audittrail_list->Pager->RecordCount > 0 && $t9999_audittrail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t9999_audittrail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t9999_audittrail_list->pageUrl() ?>start=<?php echo $t9999_audittrail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t9999_audittrail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t9999_audittrail_list->pageUrl() ?>start=<?php echo $t9999_audittrail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t9999_audittrail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t9999_audittrail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t9999_audittrail_list->pageUrl() ?>start=<?php echo $t9999_audittrail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t9999_audittrail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t9999_audittrail_list->pageUrl() ?>start=<?php echo $t9999_audittrail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t9999_audittrail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t9999_audittrail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t9999_audittrail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t9999_audittrail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t9999_audittrail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t9999_audittrail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t9999_audittrail_list->TotalRecs == 0 && !$t9999_audittrail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t9999_audittrail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t9999_audittrail_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t9999_audittrail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t9999_audittrail_list->terminate();
?>