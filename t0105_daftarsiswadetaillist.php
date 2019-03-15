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
$t0105_daftarsiswadetail_list = new t0105_daftarsiswadetail_list();

// Run the page
$t0105_daftarsiswadetail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0105_daftarsiswadetail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0105_daftarsiswadetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var ft0105_daftarsiswadetaillist = currentForm = new ew.Form("ft0105_daftarsiswadetaillist", "list");
ft0105_daftarsiswadetaillist.formKeyCountName = '<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>';

// Validate form
ft0105_daftarsiswadetaillist.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
		<?php if ($t0105_daftarsiswadetail_list->siswa_id->Required) { ?>
			elm = this.getElements("x" + infix + "_siswa_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0105_daftarsiswadetail->siswa_id->caption(), $t0105_daftarsiswadetail->siswa_id->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	if (gridinsert && addcnt == 0) { // No row added
		ew.alert(ew.language.phrase("NoAddRecord"));
		return false;
	}
	return true;
}

// Check empty row
ft0105_daftarsiswadetaillist.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "siswa_id", false)) return false;
	return true;
}

// Form_CustomValidate event
ft0105_daftarsiswadetaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0105_daftarsiswadetaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0105_daftarsiswadetaillist.lists["x_siswa_id"] = <?php echo $t0105_daftarsiswadetail_list->siswa_id->Lookup->toClientList() ?>;
ft0105_daftarsiswadetaillist.lists["x_siswa_id"].options = <?php echo JsonEncode($t0105_daftarsiswadetail_list->siswa_id->lookupOptions()) ?>;

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
<?php if (!$t0105_daftarsiswadetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t0105_daftarsiswadetail_list->TotalRecs > 0 && $t0105_daftarsiswadetail_list->ExportOptions->visible()) { ?>
<?php $t0105_daftarsiswadetail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t0105_daftarsiswadetail_list->ImportOptions->visible()) { ?>
<?php $t0105_daftarsiswadetail_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t0105_daftarsiswadetail->isExport() || EXPORT_MASTER_RECORD && $t0105_daftarsiswadetail->isExport("print")) { ?>
<?php
if ($t0105_daftarsiswadetail_list->DbMasterFilter <> "" && $t0105_daftarsiswadetail->getCurrentMasterTable() == "t0104_daftarsiswamaster") {
	if ($t0105_daftarsiswadetail_list->MasterRecordExists) {
		include_once "t0104_daftarsiswamastermaster.php";
	}
}
?>
<?php } ?>
<?php
$t0105_daftarsiswadetail_list->renderOtherOptions();
?>
<?php $t0105_daftarsiswadetail_list->showPageHeader(); ?>
<?php
$t0105_daftarsiswadetail_list->showMessage();
?>
<?php if ($t0105_daftarsiswadetail_list->TotalRecs > 0 || $t0105_daftarsiswadetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0105_daftarsiswadetail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0105_daftarsiswadetail">
<form name="ft0105_daftarsiswadetaillist" id="ft0105_daftarsiswadetaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0105_daftarsiswadetail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0105_daftarsiswadetail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0105_daftarsiswadetail">
<?php if ($t0105_daftarsiswadetail->getCurrentMasterTable() == "t0104_daftarsiswamaster" && $t0105_daftarsiswadetail->CurrentAction) { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="t0104_daftarsiswamaster">
<input type="hidden" name="fk_id" value="<?php echo $t0105_daftarsiswadetail->daftarsiswamaster_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_t0105_daftarsiswadetail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($t0105_daftarsiswadetail_list->TotalRecs > 0 || $t0105_daftarsiswadetail->isAdd() || $t0105_daftarsiswadetail->isCopy() || $t0105_daftarsiswadetail->isGridEdit()) { ?>
<table id="tbl_t0105_daftarsiswadetaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0105_daftarsiswadetail_list->RowType = ROWTYPE_HEADER;

// Render list options
$t0105_daftarsiswadetail_list->renderListOptions();

// Render list options (header, left)
$t0105_daftarsiswadetail_list->ListOptions->render("header", "left");
?>
<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
	<?php if ($t0105_daftarsiswadetail->sortUrl($t0105_daftarsiswadetail->siswa_id) == "") { ?>
		<th data-name="siswa_id" class="<?php echo $t0105_daftarsiswadetail->siswa_id->headerCellClass() ?>"><div id="elh_t0105_daftarsiswadetail_siswa_id" class="t0105_daftarsiswadetail_siswa_id"><div class="ew-table-header-caption"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="siswa_id" class="<?php echo $t0105_daftarsiswadetail->siswa_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $t0105_daftarsiswadetail->SortUrl($t0105_daftarsiswadetail->siswa_id) ?>',2);"><div id="elh_t0105_daftarsiswadetail_siswa_id" class="t0105_daftarsiswadetail_siswa_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0105_daftarsiswadetail->siswa_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0105_daftarsiswadetail->siswa_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0105_daftarsiswadetail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t0105_daftarsiswadetail->isAdd() || $t0105_daftarsiswadetail->isCopy()) {
		$t0105_daftarsiswadetail_list->RowIndex = 0;
		$t0105_daftarsiswadetail_list->KeyCount = $t0105_daftarsiswadetail_list->RowIndex;
		if ($t0105_daftarsiswadetail->isCopy() && !$t0105_daftarsiswadetail_list->loadRow())
			$t0105_daftarsiswadetail->CurrentAction = "add";
		if ($t0105_daftarsiswadetail->isAdd())
			$t0105_daftarsiswadetail_list->loadRowValues();
		if ($t0105_daftarsiswadetail->EventCancelled) // Insert failed
			$t0105_daftarsiswadetail_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t0105_daftarsiswadetail->resetAttributes();
		$t0105_daftarsiswadetail->RowAttrs = array_merge($t0105_daftarsiswadetail->RowAttrs, array('data-rowindex'=>0, 'id'=>'r0_t0105_daftarsiswadetail', 'data-rowtype'=>ROWTYPE_ADD));
		$t0105_daftarsiswadetail->RowType = ROWTYPE_ADD;

		// Render row
		$t0105_daftarsiswadetail_list->renderRow();

		// Render list options
		$t0105_daftarsiswadetail_list->renderListOptions();
		$t0105_daftarsiswadetail_list->StartRowCnt = 0;
?>
	<tr<?php echo $t0105_daftarsiswadetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0105_daftarsiswadetail_list->ListOptions->render("body", "left", $t0105_daftarsiswadetail_list->RowCnt);
?>
	<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
		<td data-name="siswa_id">
<span id="el<?php echo $t0105_daftarsiswadetail_list->RowCnt ?>_t0105_daftarsiswadetail_siswa_id" class="form-group t0105_daftarsiswadetail_siswa_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" data-value-separator="<?php echo $t0105_daftarsiswadetail->siswa_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->editAttributes() ?>>
		<?php echo $t0105_daftarsiswadetail->siswa_id->selectOptionListHtml("x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id") ?>
	</select>
</div>
<?php echo $t0105_daftarsiswadetail->siswa_id->Lookup->getParamTag("p_x" . $t0105_daftarsiswadetail_list->RowIndex . "_siswa_id") ?>
</span>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="o<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" id="o<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0105_daftarsiswadetail_list->ListOptions->render("body", "right", $t0105_daftarsiswadetail_list->RowCnt);
?>
<script>
ft0105_daftarsiswadetaillist.updateLists(<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
<?php
if ($t0105_daftarsiswadetail->ExportAll && $t0105_daftarsiswadetail->isExport()) {
	$t0105_daftarsiswadetail_list->StopRec = $t0105_daftarsiswadetail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($t0105_daftarsiswadetail_list->TotalRecs > $t0105_daftarsiswadetail_list->StartRec + $t0105_daftarsiswadetail_list->DisplayRecs - 1)
		$t0105_daftarsiswadetail_list->StopRec = $t0105_daftarsiswadetail_list->StartRec + $t0105_daftarsiswadetail_list->DisplayRecs - 1;
	else
		$t0105_daftarsiswadetail_list->StopRec = $t0105_daftarsiswadetail_list->TotalRecs;
}

// Restore number of post back records
if ($CurrentForm && $t0105_daftarsiswadetail_list->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t0105_daftarsiswadetail_list->FormKeyCountName) && ($t0105_daftarsiswadetail->isGridAdd() || $t0105_daftarsiswadetail->isGridEdit() || $t0105_daftarsiswadetail->isConfirm())) {
		$t0105_daftarsiswadetail_list->KeyCount = $CurrentForm->getValue($t0105_daftarsiswadetail_list->FormKeyCountName);
		$t0105_daftarsiswadetail_list->StopRec = $t0105_daftarsiswadetail_list->StartRec + $t0105_daftarsiswadetail_list->KeyCount - 1;
	}
}
$t0105_daftarsiswadetail_list->RecCnt = $t0105_daftarsiswadetail_list->StartRec - 1;
if ($t0105_daftarsiswadetail_list->Recordset && !$t0105_daftarsiswadetail_list->Recordset->EOF) {
	$t0105_daftarsiswadetail_list->Recordset->moveFirst();
	$selectLimit = $t0105_daftarsiswadetail_list->UseSelectLimit;
	if (!$selectLimit && $t0105_daftarsiswadetail_list->StartRec > 1)
		$t0105_daftarsiswadetail_list->Recordset->move($t0105_daftarsiswadetail_list->StartRec - 1);
} elseif (!$t0105_daftarsiswadetail->AllowAddDeleteRow && $t0105_daftarsiswadetail_list->StopRec == 0) {
	$t0105_daftarsiswadetail_list->StopRec = $t0105_daftarsiswadetail->GridAddRowCount;
}

// Initialize aggregate
$t0105_daftarsiswadetail->RowType = ROWTYPE_AGGREGATEINIT;
$t0105_daftarsiswadetail->resetAttributes();
$t0105_daftarsiswadetail_list->renderRow();
$t0105_daftarsiswadetail_list->EditRowCnt = 0;
if ($t0105_daftarsiswadetail->isEdit())
	$t0105_daftarsiswadetail_list->RowIndex = 1;
if ($t0105_daftarsiswadetail->isGridAdd())
	$t0105_daftarsiswadetail_list->RowIndex = 0;
if ($t0105_daftarsiswadetail->isGridEdit())
	$t0105_daftarsiswadetail_list->RowIndex = 0;
while ($t0105_daftarsiswadetail_list->RecCnt < $t0105_daftarsiswadetail_list->StopRec) {
	$t0105_daftarsiswadetail_list->RecCnt++;
	if ($t0105_daftarsiswadetail_list->RecCnt >= $t0105_daftarsiswadetail_list->StartRec) {
		$t0105_daftarsiswadetail_list->RowCnt++;
		if ($t0105_daftarsiswadetail->isGridAdd() || $t0105_daftarsiswadetail->isGridEdit() || $t0105_daftarsiswadetail->isConfirm()) {
			$t0105_daftarsiswadetail_list->RowIndex++;
			$CurrentForm->Index = $t0105_daftarsiswadetail_list->RowIndex;
			if ($CurrentForm->hasValue($t0105_daftarsiswadetail_list->FormActionName) && $t0105_daftarsiswadetail_list->EventCancelled)
				$t0105_daftarsiswadetail_list->RowAction = strval($CurrentForm->getValue($t0105_daftarsiswadetail_list->FormActionName));
			elseif ($t0105_daftarsiswadetail->isGridAdd())
				$t0105_daftarsiswadetail_list->RowAction = "insert";
			else
				$t0105_daftarsiswadetail_list->RowAction = "";
		}

		// Set up key count
		$t0105_daftarsiswadetail_list->KeyCount = $t0105_daftarsiswadetail_list->RowIndex;

		// Init row class and style
		$t0105_daftarsiswadetail->resetAttributes();
		$t0105_daftarsiswadetail->CssClass = "";
		if ($t0105_daftarsiswadetail->isGridAdd()) {
			$t0105_daftarsiswadetail_list->loadRowValues(); // Load default values
		} else {
			$t0105_daftarsiswadetail_list->loadRowValues($t0105_daftarsiswadetail_list->Recordset); // Load row values
		}
		$t0105_daftarsiswadetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t0105_daftarsiswadetail->isGridAdd()) // Grid add
			$t0105_daftarsiswadetail->RowType = ROWTYPE_ADD; // Render add
		if ($t0105_daftarsiswadetail->isGridAdd() && $t0105_daftarsiswadetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t0105_daftarsiswadetail_list->restoreCurrentRowFormValues($t0105_daftarsiswadetail_list->RowIndex); // Restore form values
		if ($t0105_daftarsiswadetail->isEdit()) {
			if ($t0105_daftarsiswadetail_list->checkInlineEditKey() && $t0105_daftarsiswadetail_list->EditRowCnt == 0) { // Inline edit
				$t0105_daftarsiswadetail->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t0105_daftarsiswadetail->isGridEdit()) { // Grid edit
			if ($t0105_daftarsiswadetail->EventCancelled)
				$t0105_daftarsiswadetail_list->restoreCurrentRowFormValues($t0105_daftarsiswadetail_list->RowIndex); // Restore form values
			if ($t0105_daftarsiswadetail_list->RowAction == "insert")
				$t0105_daftarsiswadetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t0105_daftarsiswadetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t0105_daftarsiswadetail->isEdit() && $t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT && $t0105_daftarsiswadetail->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t0105_daftarsiswadetail_list->restoreFormValues(); // Restore form values
		}
		if ($t0105_daftarsiswadetail->isGridEdit() && ($t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT || $t0105_daftarsiswadetail->RowType == ROWTYPE_ADD) && $t0105_daftarsiswadetail->EventCancelled) // Update failed
			$t0105_daftarsiswadetail_list->restoreCurrentRowFormValues($t0105_daftarsiswadetail_list->RowIndex); // Restore form values
		if ($t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT) // Edit row
			$t0105_daftarsiswadetail_list->EditRowCnt++;

		// Set up row id / data-rowindex
		$t0105_daftarsiswadetail->RowAttrs = array_merge($t0105_daftarsiswadetail->RowAttrs, array('data-rowindex'=>$t0105_daftarsiswadetail_list->RowCnt, 'id'=>'r' . $t0105_daftarsiswadetail_list->RowCnt . '_t0105_daftarsiswadetail', 'data-rowtype'=>$t0105_daftarsiswadetail->RowType));

		// Render row
		$t0105_daftarsiswadetail_list->renderRow();

		// Render list options
		$t0105_daftarsiswadetail_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t0105_daftarsiswadetail_list->RowAction <> "delete" && $t0105_daftarsiswadetail_list->RowAction <> "insertdelete" && !($t0105_daftarsiswadetail_list->RowAction == "insert" && $t0105_daftarsiswadetail->isConfirm() && $t0105_daftarsiswadetail_list->emptyRow())) {
?>
	<tr<?php echo $t0105_daftarsiswadetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0105_daftarsiswadetail_list->ListOptions->render("body", "left", $t0105_daftarsiswadetail_list->RowCnt);
?>
	<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
		<td data-name="siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->cellAttributes() ?>>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0105_daftarsiswadetail_list->RowCnt ?>_t0105_daftarsiswadetail_siswa_id" class="form-group t0105_daftarsiswadetail_siswa_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" data-value-separator="<?php echo $t0105_daftarsiswadetail->siswa_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->editAttributes() ?>>
		<?php echo $t0105_daftarsiswadetail->siswa_id->selectOptionListHtml("x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id") ?>
	</select>
</div>
<?php echo $t0105_daftarsiswadetail->siswa_id->Lookup->getParamTag("p_x" . $t0105_daftarsiswadetail_list->RowIndex . "_siswa_id") ?>
</span>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="o<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" id="o<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->OldValue) ?>">
<?php } ?>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0105_daftarsiswadetail_list->RowCnt ?>_t0105_daftarsiswadetail_siswa_id" class="form-group t0105_daftarsiswadetail_siswa_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" data-value-separator="<?php echo $t0105_daftarsiswadetail->siswa_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->editAttributes() ?>>
		<?php echo $t0105_daftarsiswadetail->siswa_id->selectOptionListHtml("x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id") ?>
	</select>
</div>
<?php echo $t0105_daftarsiswadetail->siswa_id->Lookup->getParamTag("p_x" . $t0105_daftarsiswadetail_list->RowIndex . "_siswa_id") ?>
</span>
<?php } ?>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0105_daftarsiswadetail_list->RowCnt ?>_t0105_daftarsiswadetail_siswa_id" class="t0105_daftarsiswadetail_siswa_id">
<span<?php echo $t0105_daftarsiswadetail->siswa_id->viewAttributes() ?>>
<?php echo $t0105_daftarsiswadetail->siswa_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_id" name="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_id" id="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->id->CurrentValue) ?>">
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_id" name="o<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_id" id="o<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->id->OldValue) ?>">
<?php } ?>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT || $t0105_daftarsiswadetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_id" name="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_id" id="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t0105_daftarsiswadetail_list->ListOptions->render("body", "right", $t0105_daftarsiswadetail_list->RowCnt);
?>
	</tr>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_ADD || $t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT) { ?>
<script>
ft0105_daftarsiswadetaillist.updateLists(<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t0105_daftarsiswadetail->isGridAdd())
		if (!$t0105_daftarsiswadetail_list->Recordset->EOF)
			$t0105_daftarsiswadetail_list->Recordset->moveNext();
}
?>
<?php
	if ($t0105_daftarsiswadetail->isGridAdd() || $t0105_daftarsiswadetail->isGridEdit()) {
		$t0105_daftarsiswadetail_list->RowIndex = '$rowindex$';
		$t0105_daftarsiswadetail_list->loadRowValues();

		// Set row properties
		$t0105_daftarsiswadetail->resetAttributes();
		$t0105_daftarsiswadetail->RowAttrs = array_merge($t0105_daftarsiswadetail->RowAttrs, array('data-rowindex'=>$t0105_daftarsiswadetail_list->RowIndex, 'id'=>'r0_t0105_daftarsiswadetail', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t0105_daftarsiswadetail->RowAttrs["class"], "ew-template");
		$t0105_daftarsiswadetail->RowType = ROWTYPE_ADD;

		// Render row
		$t0105_daftarsiswadetail_list->renderRow();

		// Render list options
		$t0105_daftarsiswadetail_list->renderListOptions();
		$t0105_daftarsiswadetail_list->StartRowCnt = 0;
?>
	<tr<?php echo $t0105_daftarsiswadetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0105_daftarsiswadetail_list->ListOptions->render("body", "left", $t0105_daftarsiswadetail_list->RowIndex);
?>
	<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
		<td data-name="siswa_id">
<span id="el$rowindex$_t0105_daftarsiswadetail_siswa_id" class="form-group t0105_daftarsiswadetail_siswa_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" data-value-separator="<?php echo $t0105_daftarsiswadetail->siswa_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->editAttributes() ?>>
		<?php echo $t0105_daftarsiswadetail->siswa_id->selectOptionListHtml("x<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id") ?>
	</select>
</div>
<?php echo $t0105_daftarsiswadetail->siswa_id->Lookup->getParamTag("p_x" . $t0105_daftarsiswadetail_list->RowIndex . "_siswa_id") ?>
</span>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="o<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" id="o<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0105_daftarsiswadetail_list->ListOptions->render("body", "right", $t0105_daftarsiswadetail_list->RowIndex);
?>
<script>
ft0105_daftarsiswadetaillist.updateLists(<?php echo $t0105_daftarsiswadetail_list->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if ($t0105_daftarsiswadetail->isAdd() || $t0105_daftarsiswadetail->isCopy()) { ?>
<input type="hidden" name="<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>" id="<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>" value="<?php echo $t0105_daftarsiswadetail_list->KeyCount ?>">
<?php } ?>
<?php if ($t0105_daftarsiswadetail->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>" id="<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>" value="<?php echo $t0105_daftarsiswadetail_list->KeyCount ?>">
<?php echo $t0105_daftarsiswadetail_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t0105_daftarsiswadetail->isEdit()) { ?>
<input type="hidden" name="<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>" id="<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>" value="<?php echo $t0105_daftarsiswadetail_list->KeyCount ?>">
<?php } ?>
<?php if ($t0105_daftarsiswadetail->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>" id="<?php echo $t0105_daftarsiswadetail_list->FormKeyCountName ?>" value="<?php echo $t0105_daftarsiswadetail_list->KeyCount ?>">
<?php echo $t0105_daftarsiswadetail_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t0105_daftarsiswadetail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t0105_daftarsiswadetail_list->Recordset)
	$t0105_daftarsiswadetail_list->Recordset->Close();
?>
<?php if (!$t0105_daftarsiswadetail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t0105_daftarsiswadetail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($t0105_daftarsiswadetail_list->Pager)) $t0105_daftarsiswadetail_list->Pager = new PrevNextPager($t0105_daftarsiswadetail_list->StartRec, $t0105_daftarsiswadetail_list->DisplayRecs, $t0105_daftarsiswadetail_list->TotalRecs, $t0105_daftarsiswadetail_list->AutoHidePager) ?>
<?php if ($t0105_daftarsiswadetail_list->Pager->RecordCount > 0 && $t0105_daftarsiswadetail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($t0105_daftarsiswadetail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $t0105_daftarsiswadetail_list->pageUrl() ?>start=<?php echo $t0105_daftarsiswadetail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($t0105_daftarsiswadetail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $t0105_daftarsiswadetail_list->pageUrl() ?>start=<?php echo $t0105_daftarsiswadetail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $t0105_daftarsiswadetail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($t0105_daftarsiswadetail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $t0105_daftarsiswadetail_list->pageUrl() ?>start=<?php echo $t0105_daftarsiswadetail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($t0105_daftarsiswadetail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $t0105_daftarsiswadetail_list->pageUrl() ?>start=<?php echo $t0105_daftarsiswadetail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $t0105_daftarsiswadetail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($t0105_daftarsiswadetail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0105_daftarsiswadetail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0105_daftarsiswadetail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0105_daftarsiswadetail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t0105_daftarsiswadetail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0105_daftarsiswadetail_list->TotalRecs == 0 && !$t0105_daftarsiswadetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0105_daftarsiswadetail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0105_daftarsiswadetail_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0105_daftarsiswadetail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0105_daftarsiswadetail_list->terminate();
?>