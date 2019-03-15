<?php
namespace PHPMaker2019\spp_prj;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t0105_daftarsiswadetail_grid))
	$t0105_daftarsiswadetail_grid = new t0105_daftarsiswadetail_grid();

// Run the page
$t0105_daftarsiswadetail_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0105_daftarsiswadetail_grid->Page_Render();
?>
<?php if (!$t0105_daftarsiswadetail->isExport()) { ?>
<script>

// Form object
var ft0105_daftarsiswadetailgrid = new ew.Form("ft0105_daftarsiswadetailgrid", "grid");
ft0105_daftarsiswadetailgrid.formKeyCountName = '<?php echo $t0105_daftarsiswadetail_grid->FormKeyCountName ?>';

// Validate form
ft0105_daftarsiswadetailgrid.validate = function() {
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
		<?php if ($t0105_daftarsiswadetail_grid->siswa_id->Required) { ?>
			elm = this.getElements("x" + infix + "_siswa_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0105_daftarsiswadetail->siswa_id->caption(), $t0105_daftarsiswadetail->siswa_id->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
ft0105_daftarsiswadetailgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "siswa_id", false)) return false;
	return true;
}

// Form_CustomValidate event
ft0105_daftarsiswadetailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0105_daftarsiswadetailgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0105_daftarsiswadetailgrid.lists["x_siswa_id"] = <?php echo $t0105_daftarsiswadetail_grid->siswa_id->Lookup->toClientList() ?>;
ft0105_daftarsiswadetailgrid.lists["x_siswa_id"].options = <?php echo JsonEncode($t0105_daftarsiswadetail_grid->siswa_id->lookupOptions()) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$t0105_daftarsiswadetail_grid->renderOtherOptions();
?>
<?php $t0105_daftarsiswadetail_grid->showPageHeader(); ?>
<?php
$t0105_daftarsiswadetail_grid->showMessage();
?>
<?php if ($t0105_daftarsiswadetail_grid->TotalRecs > 0 || $t0105_daftarsiswadetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0105_daftarsiswadetail_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0105_daftarsiswadetail">
<div id="ft0105_daftarsiswadetailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t0105_daftarsiswadetail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_t0105_daftarsiswadetailgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0105_daftarsiswadetail_grid->RowType = ROWTYPE_HEADER;

// Render list options
$t0105_daftarsiswadetail_grid->renderListOptions();

// Render list options (header, left)
$t0105_daftarsiswadetail_grid->ListOptions->render("header", "left");
?>
<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
	<?php if ($t0105_daftarsiswadetail->sortUrl($t0105_daftarsiswadetail->siswa_id) == "") { ?>
		<th data-name="siswa_id" class="<?php echo $t0105_daftarsiswadetail->siswa_id->headerCellClass() ?>"><div id="elh_t0105_daftarsiswadetail_siswa_id" class="t0105_daftarsiswadetail_siswa_id"><div class="ew-table-header-caption"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="siswa_id" class="<?php echo $t0105_daftarsiswadetail->siswa_id->headerCellClass() ?>"><div><div id="elh_t0105_daftarsiswadetail_siswa_id" class="t0105_daftarsiswadetail_siswa_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0105_daftarsiswadetail->siswa_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0105_daftarsiswadetail->siswa_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0105_daftarsiswadetail->siswa_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0105_daftarsiswadetail_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t0105_daftarsiswadetail_grid->StartRec = 1;
$t0105_daftarsiswadetail_grid->StopRec = $t0105_daftarsiswadetail_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $t0105_daftarsiswadetail_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t0105_daftarsiswadetail_grid->FormKeyCountName) && ($t0105_daftarsiswadetail->isGridAdd() || $t0105_daftarsiswadetail->isGridEdit() || $t0105_daftarsiswadetail->isConfirm())) {
		$t0105_daftarsiswadetail_grid->KeyCount = $CurrentForm->getValue($t0105_daftarsiswadetail_grid->FormKeyCountName);
		$t0105_daftarsiswadetail_grid->StopRec = $t0105_daftarsiswadetail_grid->StartRec + $t0105_daftarsiswadetail_grid->KeyCount - 1;
	}
}
$t0105_daftarsiswadetail_grid->RecCnt = $t0105_daftarsiswadetail_grid->StartRec - 1;
if ($t0105_daftarsiswadetail_grid->Recordset && !$t0105_daftarsiswadetail_grid->Recordset->EOF) {
	$t0105_daftarsiswadetail_grid->Recordset->moveFirst();
	$selectLimit = $t0105_daftarsiswadetail_grid->UseSelectLimit;
	if (!$selectLimit && $t0105_daftarsiswadetail_grid->StartRec > 1)
		$t0105_daftarsiswadetail_grid->Recordset->move($t0105_daftarsiswadetail_grid->StartRec - 1);
} elseif (!$t0105_daftarsiswadetail->AllowAddDeleteRow && $t0105_daftarsiswadetail_grid->StopRec == 0) {
	$t0105_daftarsiswadetail_grid->StopRec = $t0105_daftarsiswadetail->GridAddRowCount;
}

// Initialize aggregate
$t0105_daftarsiswadetail->RowType = ROWTYPE_AGGREGATEINIT;
$t0105_daftarsiswadetail->resetAttributes();
$t0105_daftarsiswadetail_grid->renderRow();
if ($t0105_daftarsiswadetail->isGridAdd())
	$t0105_daftarsiswadetail_grid->RowIndex = 0;
if ($t0105_daftarsiswadetail->isGridEdit())
	$t0105_daftarsiswadetail_grid->RowIndex = 0;
while ($t0105_daftarsiswadetail_grid->RecCnt < $t0105_daftarsiswadetail_grid->StopRec) {
	$t0105_daftarsiswadetail_grid->RecCnt++;
	if ($t0105_daftarsiswadetail_grid->RecCnt >= $t0105_daftarsiswadetail_grid->StartRec) {
		$t0105_daftarsiswadetail_grid->RowCnt++;
		if ($t0105_daftarsiswadetail->isGridAdd() || $t0105_daftarsiswadetail->isGridEdit() || $t0105_daftarsiswadetail->isConfirm()) {
			$t0105_daftarsiswadetail_grid->RowIndex++;
			$CurrentForm->Index = $t0105_daftarsiswadetail_grid->RowIndex;
			if ($CurrentForm->hasValue($t0105_daftarsiswadetail_grid->FormActionName) && $t0105_daftarsiswadetail_grid->EventCancelled)
				$t0105_daftarsiswadetail_grid->RowAction = strval($CurrentForm->getValue($t0105_daftarsiswadetail_grid->FormActionName));
			elseif ($t0105_daftarsiswadetail->isGridAdd())
				$t0105_daftarsiswadetail_grid->RowAction = "insert";
			else
				$t0105_daftarsiswadetail_grid->RowAction = "";
		}

		// Set up key count
		$t0105_daftarsiswadetail_grid->KeyCount = $t0105_daftarsiswadetail_grid->RowIndex;

		// Init row class and style
		$t0105_daftarsiswadetail->resetAttributes();
		$t0105_daftarsiswadetail->CssClass = "";
		if ($t0105_daftarsiswadetail->isGridAdd()) {
			if ($t0105_daftarsiswadetail->CurrentMode == "copy") {
				$t0105_daftarsiswadetail_grid->loadRowValues($t0105_daftarsiswadetail_grid->Recordset); // Load row values
				$t0105_daftarsiswadetail_grid->setRecordKey($t0105_daftarsiswadetail_grid->RowOldKey, $t0105_daftarsiswadetail_grid->Recordset); // Set old record key
			} else {
				$t0105_daftarsiswadetail_grid->loadRowValues(); // Load default values
				$t0105_daftarsiswadetail_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t0105_daftarsiswadetail_grid->loadRowValues($t0105_daftarsiswadetail_grid->Recordset); // Load row values
		}
		$t0105_daftarsiswadetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t0105_daftarsiswadetail->isGridAdd()) // Grid add
			$t0105_daftarsiswadetail->RowType = ROWTYPE_ADD; // Render add
		if ($t0105_daftarsiswadetail->isGridAdd() && $t0105_daftarsiswadetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t0105_daftarsiswadetail_grid->restoreCurrentRowFormValues($t0105_daftarsiswadetail_grid->RowIndex); // Restore form values
		if ($t0105_daftarsiswadetail->isGridEdit()) { // Grid edit
			if ($t0105_daftarsiswadetail->EventCancelled)
				$t0105_daftarsiswadetail_grid->restoreCurrentRowFormValues($t0105_daftarsiswadetail_grid->RowIndex); // Restore form values
			if ($t0105_daftarsiswadetail_grid->RowAction == "insert")
				$t0105_daftarsiswadetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t0105_daftarsiswadetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t0105_daftarsiswadetail->isGridEdit() && ($t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT || $t0105_daftarsiswadetail->RowType == ROWTYPE_ADD) && $t0105_daftarsiswadetail->EventCancelled) // Update failed
			$t0105_daftarsiswadetail_grid->restoreCurrentRowFormValues($t0105_daftarsiswadetail_grid->RowIndex); // Restore form values
		if ($t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT) // Edit row
			$t0105_daftarsiswadetail_grid->EditRowCnt++;
		if ($t0105_daftarsiswadetail->isConfirm()) // Confirm row
			$t0105_daftarsiswadetail_grid->restoreCurrentRowFormValues($t0105_daftarsiswadetail_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t0105_daftarsiswadetail->RowAttrs = array_merge($t0105_daftarsiswadetail->RowAttrs, array('data-rowindex'=>$t0105_daftarsiswadetail_grid->RowCnt, 'id'=>'r' . $t0105_daftarsiswadetail_grid->RowCnt . '_t0105_daftarsiswadetail', 'data-rowtype'=>$t0105_daftarsiswadetail->RowType));

		// Render row
		$t0105_daftarsiswadetail_grid->renderRow();

		// Render list options
		$t0105_daftarsiswadetail_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t0105_daftarsiswadetail_grid->RowAction <> "delete" && $t0105_daftarsiswadetail_grid->RowAction <> "insertdelete" && !($t0105_daftarsiswadetail_grid->RowAction == "insert" && $t0105_daftarsiswadetail->isConfirm() && $t0105_daftarsiswadetail_grid->emptyRow())) {
?>
	<tr<?php echo $t0105_daftarsiswadetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0105_daftarsiswadetail_grid->ListOptions->render("body", "left", $t0105_daftarsiswadetail_grid->RowCnt);
?>
	<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
		<td data-name="siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->cellAttributes() ?>>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0105_daftarsiswadetail_grid->RowCnt ?>_t0105_daftarsiswadetail_siswa_id" class="form-group t0105_daftarsiswadetail_siswa_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" data-value-separator="<?php echo $t0105_daftarsiswadetail->siswa_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->editAttributes() ?>>
		<?php echo $t0105_daftarsiswadetail->siswa_id->selectOptionListHtml("x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id") ?>
	</select>
</div>
<?php echo $t0105_daftarsiswadetail->siswa_id->Lookup->getParamTag("p_x" . $t0105_daftarsiswadetail_grid->RowIndex . "_siswa_id") ?>
</span>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" id="o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->OldValue) ?>">
<?php } ?>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0105_daftarsiswadetail_grid->RowCnt ?>_t0105_daftarsiswadetail_siswa_id" class="form-group t0105_daftarsiswadetail_siswa_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" data-value-separator="<?php echo $t0105_daftarsiswadetail->siswa_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->editAttributes() ?>>
		<?php echo $t0105_daftarsiswadetail->siswa_id->selectOptionListHtml("x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id") ?>
	</select>
</div>
<?php echo $t0105_daftarsiswadetail->siswa_id->Lookup->getParamTag("p_x" . $t0105_daftarsiswadetail_grid->RowIndex . "_siswa_id") ?>
</span>
<?php } ?>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0105_daftarsiswadetail_grid->RowCnt ?>_t0105_daftarsiswadetail_siswa_id" class="t0105_daftarsiswadetail_siswa_id">
<span<?php echo $t0105_daftarsiswadetail->siswa_id->viewAttributes() ?>>
<?php echo $t0105_daftarsiswadetail->siswa_id->getViewValue() ?></span>
</span>
<?php if (!$t0105_daftarsiswadetail->isConfirm()) { ?>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" id="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->FormValue) ?>">
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" id="o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="ft0105_daftarsiswadetailgrid$x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" id="ft0105_daftarsiswadetailgrid$x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->FormValue) ?>">
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="ft0105_daftarsiswadetailgrid$o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" id="ft0105_daftarsiswadetailgrid$o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_id" name="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_id" id="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->id->CurrentValue) ?>">
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_id" name="o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_id" id="o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->id->OldValue) ?>">
<?php } ?>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT || $t0105_daftarsiswadetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_id" name="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_id" id="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t0105_daftarsiswadetail_grid->ListOptions->render("body", "right", $t0105_daftarsiswadetail_grid->RowCnt);
?>
	</tr>
<?php if ($t0105_daftarsiswadetail->RowType == ROWTYPE_ADD || $t0105_daftarsiswadetail->RowType == ROWTYPE_EDIT) { ?>
<script>
ft0105_daftarsiswadetailgrid.updateLists(<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t0105_daftarsiswadetail->isGridAdd() || $t0105_daftarsiswadetail->CurrentMode == "copy")
		if (!$t0105_daftarsiswadetail_grid->Recordset->EOF)
			$t0105_daftarsiswadetail_grid->Recordset->moveNext();
}
?>
<?php
	if ($t0105_daftarsiswadetail->CurrentMode == "add" || $t0105_daftarsiswadetail->CurrentMode == "copy" || $t0105_daftarsiswadetail->CurrentMode == "edit") {
		$t0105_daftarsiswadetail_grid->RowIndex = '$rowindex$';
		$t0105_daftarsiswadetail_grid->loadRowValues();

		// Set row properties
		$t0105_daftarsiswadetail->resetAttributes();
		$t0105_daftarsiswadetail->RowAttrs = array_merge($t0105_daftarsiswadetail->RowAttrs, array('data-rowindex'=>$t0105_daftarsiswadetail_grid->RowIndex, 'id'=>'r0_t0105_daftarsiswadetail', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t0105_daftarsiswadetail->RowAttrs["class"], "ew-template");
		$t0105_daftarsiswadetail->RowType = ROWTYPE_ADD;

		// Render row
		$t0105_daftarsiswadetail_grid->renderRow();

		// Render list options
		$t0105_daftarsiswadetail_grid->renderListOptions();
		$t0105_daftarsiswadetail_grid->StartRowCnt = 0;
?>
	<tr<?php echo $t0105_daftarsiswadetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0105_daftarsiswadetail_grid->ListOptions->render("body", "left", $t0105_daftarsiswadetail_grid->RowIndex);
?>
	<?php if ($t0105_daftarsiswadetail->siswa_id->Visible) { // siswa_id ?>
		<td data-name="siswa_id">
<?php if (!$t0105_daftarsiswadetail->isConfirm()) { ?>
<span id="el$rowindex$_t0105_daftarsiswadetail_siswa_id" class="form-group t0105_daftarsiswadetail_siswa_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" data-value-separator="<?php echo $t0105_daftarsiswadetail->siswa_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id"<?php echo $t0105_daftarsiswadetail->siswa_id->editAttributes() ?>>
		<?php echo $t0105_daftarsiswadetail->siswa_id->selectOptionListHtml("x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id") ?>
	</select>
</div>
<?php echo $t0105_daftarsiswadetail->siswa_id->Lookup->getParamTag("p_x" . $t0105_daftarsiswadetail_grid->RowIndex . "_siswa_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0105_daftarsiswadetail_siswa_id" class="form-group t0105_daftarsiswadetail_siswa_id">
<span<?php echo $t0105_daftarsiswadetail->siswa_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0105_daftarsiswadetail->siswa_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" id="x<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0105_daftarsiswadetail" data-field="x_siswa_id" name="o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" id="o<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>_siswa_id" value="<?php echo HtmlEncode($t0105_daftarsiswadetail->siswa_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0105_daftarsiswadetail_grid->ListOptions->render("body", "right", $t0105_daftarsiswadetail_grid->RowIndex);
?>
<script>
ft0105_daftarsiswadetailgrid.updateLists(<?php echo $t0105_daftarsiswadetail_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($t0105_daftarsiswadetail->CurrentMode == "add" || $t0105_daftarsiswadetail->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t0105_daftarsiswadetail_grid->FormKeyCountName ?>" id="<?php echo $t0105_daftarsiswadetail_grid->FormKeyCountName ?>" value="<?php echo $t0105_daftarsiswadetail_grid->KeyCount ?>">
<?php echo $t0105_daftarsiswadetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t0105_daftarsiswadetail->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t0105_daftarsiswadetail_grid->FormKeyCountName ?>" id="<?php echo $t0105_daftarsiswadetail_grid->FormKeyCountName ?>" value="<?php echo $t0105_daftarsiswadetail_grid->KeyCount ?>">
<?php echo $t0105_daftarsiswadetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t0105_daftarsiswadetail->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft0105_daftarsiswadetailgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($t0105_daftarsiswadetail_grid->Recordset)
	$t0105_daftarsiswadetail_grid->Recordset->Close();
?>
</div>
<?php if ($t0105_daftarsiswadetail_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t0105_daftarsiswadetail_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0105_daftarsiswadetail_grid->TotalRecs == 0 && !$t0105_daftarsiswadetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0105_daftarsiswadetail_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0105_daftarsiswadetail_grid->terminate();
?>