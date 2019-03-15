<?php
namespace PHPMaker2019\spp_prj;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t0202_siswaiuran_grid))
	$t0202_siswaiuran_grid = new t0202_siswaiuran_grid();

// Run the page
$t0202_siswaiuran_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0202_siswaiuran_grid->Page_Render();
?>
<?php if (!$t0202_siswaiuran->isExport()) { ?>
<script>

// Form object
var ft0202_siswaiurangrid = new ew.Form("ft0202_siswaiurangrid", "grid");
ft0202_siswaiurangrid.formKeyCountName = '<?php echo $t0202_siswaiuran_grid->FormKeyCountName ?>';

// Validate form
ft0202_siswaiurangrid.validate = function() {
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
		<?php if ($t0202_siswaiuran_grid->tahunajaran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_tahunajaran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->tahunajaran_id->caption(), $t0202_siswaiuran->tahunajaran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_grid->iuran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_iuran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->iuran_id->caption(), $t0202_siswaiuran->iuran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0202_siswaiuran_grid->Nilai->Required) { ?>
			elm = this.getElements("x" + infix + "_Nilai");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0202_siswaiuran->Nilai->caption(), $t0202_siswaiuran->Nilai->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Nilai");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0202_siswaiuran->Nilai->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
ft0202_siswaiurangrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "tahunajaran_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "iuran_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "Nilai", false)) return false;
	return true;
}

// Form_CustomValidate event
ft0202_siswaiurangrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0202_siswaiurangrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0202_siswaiurangrid.lists["x_tahunajaran_id"] = <?php echo $t0202_siswaiuran_grid->tahunajaran_id->Lookup->toClientList() ?>;
ft0202_siswaiurangrid.lists["x_tahunajaran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_grid->tahunajaran_id->lookupOptions()) ?>;
ft0202_siswaiurangrid.lists["x_iuran_id"] = <?php echo $t0202_siswaiuran_grid->iuran_id->Lookup->toClientList() ?>;
ft0202_siswaiurangrid.lists["x_iuran_id"].options = <?php echo JsonEncode($t0202_siswaiuran_grid->iuran_id->lookupOptions()) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$t0202_siswaiuran_grid->renderOtherOptions();
?>
<?php $t0202_siswaiuran_grid->showPageHeader(); ?>
<?php
$t0202_siswaiuran_grid->showMessage();
?>
<?php if ($t0202_siswaiuran_grid->TotalRecs > 0 || $t0202_siswaiuran->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0202_siswaiuran_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0202_siswaiuran">
<div id="ft0202_siswaiurangrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t0202_siswaiuran" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_t0202_siswaiurangrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0202_siswaiuran_grid->RowType = ROWTYPE_HEADER;

// Render list options
$t0202_siswaiuran_grid->renderListOptions();

// Render list options (header, left)
$t0202_siswaiuran_grid->ListOptions->render("header", "left");
?>
<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<?php if ($t0202_siswaiuran->sortUrl($t0202_siswaiuran->tahunajaran_id) == "") { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t0202_siswaiuran->tahunajaran_id->headerCellClass() ?>"><div id="elh_t0202_siswaiuran_tahunajaran_id" class="t0202_siswaiuran_tahunajaran_id"><div class="ew-table-header-caption"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahunajaran_id" class="<?php echo $t0202_siswaiuran->tahunajaran_id->headerCellClass() ?>"><div><div id="elh_t0202_siswaiuran_tahunajaran_id" class="t0202_siswaiuran_tahunajaran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->tahunajaran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0202_siswaiuran->tahunajaran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0202_siswaiuran->tahunajaran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
	<?php if ($t0202_siswaiuran->sortUrl($t0202_siswaiuran->iuran_id) == "") { ?>
		<th data-name="iuran_id" class="<?php echo $t0202_siswaiuran->iuran_id->headerCellClass() ?>"><div id="elh_t0202_siswaiuran_iuran_id" class="t0202_siswaiuran_iuran_id"><div class="ew-table-header-caption"><?php echo $t0202_siswaiuran->iuran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iuran_id" class="<?php echo $t0202_siswaiuran->iuran_id->headerCellClass() ?>"><div><div id="elh_t0202_siswaiuran_iuran_id" class="t0202_siswaiuran_iuran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->iuran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0202_siswaiuran->iuran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0202_siswaiuran->iuran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
	<?php if ($t0202_siswaiuran->sortUrl($t0202_siswaiuran->Nilai) == "") { ?>
		<th data-name="Nilai" class="<?php echo $t0202_siswaiuran->Nilai->headerCellClass() ?>"><div id="elh_t0202_siswaiuran_Nilai" class="t0202_siswaiuran_Nilai"><div class="ew-table-header-caption"><?php echo $t0202_siswaiuran->Nilai->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nilai" class="<?php echo $t0202_siswaiuran->Nilai->headerCellClass() ?>"><div><div id="elh_t0202_siswaiuran_Nilai" class="t0202_siswaiuran_Nilai">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0202_siswaiuran->Nilai->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0202_siswaiuran->Nilai->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0202_siswaiuran->Nilai->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0202_siswaiuran_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t0202_siswaiuran_grid->StartRec = 1;
$t0202_siswaiuran_grid->StopRec = $t0202_siswaiuran_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $t0202_siswaiuran_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t0202_siswaiuran_grid->FormKeyCountName) && ($t0202_siswaiuran->isGridAdd() || $t0202_siswaiuran->isGridEdit() || $t0202_siswaiuran->isConfirm())) {
		$t0202_siswaiuran_grid->KeyCount = $CurrentForm->getValue($t0202_siswaiuran_grid->FormKeyCountName);
		$t0202_siswaiuran_grid->StopRec = $t0202_siswaiuran_grid->StartRec + $t0202_siswaiuran_grid->KeyCount - 1;
	}
}
$t0202_siswaiuran_grid->RecCnt = $t0202_siswaiuran_grid->StartRec - 1;
if ($t0202_siswaiuran_grid->Recordset && !$t0202_siswaiuran_grid->Recordset->EOF) {
	$t0202_siswaiuran_grid->Recordset->moveFirst();
	$selectLimit = $t0202_siswaiuran_grid->UseSelectLimit;
	if (!$selectLimit && $t0202_siswaiuran_grid->StartRec > 1)
		$t0202_siswaiuran_grid->Recordset->move($t0202_siswaiuran_grid->StartRec - 1);
} elseif (!$t0202_siswaiuran->AllowAddDeleteRow && $t0202_siswaiuran_grid->StopRec == 0) {
	$t0202_siswaiuran_grid->StopRec = $t0202_siswaiuran->GridAddRowCount;
}

// Initialize aggregate
$t0202_siswaiuran->RowType = ROWTYPE_AGGREGATEINIT;
$t0202_siswaiuran->resetAttributes();
$t0202_siswaiuran_grid->renderRow();
if ($t0202_siswaiuran->isGridAdd())
	$t0202_siswaiuran_grid->RowIndex = 0;
if ($t0202_siswaiuran->isGridEdit())
	$t0202_siswaiuran_grid->RowIndex = 0;
while ($t0202_siswaiuran_grid->RecCnt < $t0202_siswaiuran_grid->StopRec) {
	$t0202_siswaiuran_grid->RecCnt++;
	if ($t0202_siswaiuran_grid->RecCnt >= $t0202_siswaiuran_grid->StartRec) {
		$t0202_siswaiuran_grid->RowCnt++;
		if ($t0202_siswaiuran->isGridAdd() || $t0202_siswaiuran->isGridEdit() || $t0202_siswaiuran->isConfirm()) {
			$t0202_siswaiuran_grid->RowIndex++;
			$CurrentForm->Index = $t0202_siswaiuran_grid->RowIndex;
			if ($CurrentForm->hasValue($t0202_siswaiuran_grid->FormActionName) && $t0202_siswaiuran_grid->EventCancelled)
				$t0202_siswaiuran_grid->RowAction = strval($CurrentForm->getValue($t0202_siswaiuran_grid->FormActionName));
			elseif ($t0202_siswaiuran->isGridAdd())
				$t0202_siswaiuran_grid->RowAction = "insert";
			else
				$t0202_siswaiuran_grid->RowAction = "";
		}

		// Set up key count
		$t0202_siswaiuran_grid->KeyCount = $t0202_siswaiuran_grid->RowIndex;

		// Init row class and style
		$t0202_siswaiuran->resetAttributes();
		$t0202_siswaiuran->CssClass = "";
		if ($t0202_siswaiuran->isGridAdd()) {
			if ($t0202_siswaiuran->CurrentMode == "copy") {
				$t0202_siswaiuran_grid->loadRowValues($t0202_siswaiuran_grid->Recordset); // Load row values
				$t0202_siswaiuran_grid->setRecordKey($t0202_siswaiuran_grid->RowOldKey, $t0202_siswaiuran_grid->Recordset); // Set old record key
			} else {
				$t0202_siswaiuran_grid->loadRowValues(); // Load default values
				$t0202_siswaiuran_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t0202_siswaiuran_grid->loadRowValues($t0202_siswaiuran_grid->Recordset); // Load row values
		}
		$t0202_siswaiuran->RowType = ROWTYPE_VIEW; // Render view
		if ($t0202_siswaiuran->isGridAdd()) // Grid add
			$t0202_siswaiuran->RowType = ROWTYPE_ADD; // Render add
		if ($t0202_siswaiuran->isGridAdd() && $t0202_siswaiuran->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t0202_siswaiuran_grid->restoreCurrentRowFormValues($t0202_siswaiuran_grid->RowIndex); // Restore form values
		if ($t0202_siswaiuran->isGridEdit()) { // Grid edit
			if ($t0202_siswaiuran->EventCancelled)
				$t0202_siswaiuran_grid->restoreCurrentRowFormValues($t0202_siswaiuran_grid->RowIndex); // Restore form values
			if ($t0202_siswaiuran_grid->RowAction == "insert")
				$t0202_siswaiuran->RowType = ROWTYPE_ADD; // Render add
			else
				$t0202_siswaiuran->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t0202_siswaiuran->isGridEdit() && ($t0202_siswaiuran->RowType == ROWTYPE_EDIT || $t0202_siswaiuran->RowType == ROWTYPE_ADD) && $t0202_siswaiuran->EventCancelled) // Update failed
			$t0202_siswaiuran_grid->restoreCurrentRowFormValues($t0202_siswaiuran_grid->RowIndex); // Restore form values
		if ($t0202_siswaiuran->RowType == ROWTYPE_EDIT) // Edit row
			$t0202_siswaiuran_grid->EditRowCnt++;
		if ($t0202_siswaiuran->isConfirm()) // Confirm row
			$t0202_siswaiuran_grid->restoreCurrentRowFormValues($t0202_siswaiuran_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t0202_siswaiuran->RowAttrs = array_merge($t0202_siswaiuran->RowAttrs, array('data-rowindex'=>$t0202_siswaiuran_grid->RowCnt, 'id'=>'r' . $t0202_siswaiuran_grid->RowCnt . '_t0202_siswaiuran', 'data-rowtype'=>$t0202_siswaiuran->RowType));

		// Render row
		$t0202_siswaiuran_grid->renderRow();

		// Render list options
		$t0202_siswaiuran_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t0202_siswaiuran_grid->RowAction <> "delete" && $t0202_siswaiuran_grid->RowAction <> "insertdelete" && !($t0202_siswaiuran_grid->RowAction == "insert" && $t0202_siswaiuran->isConfirm() && $t0202_siswaiuran_grid->emptyRow())) {
?>
	<tr<?php echo $t0202_siswaiuran->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0202_siswaiuran_grid->ListOptions->render("body", "left", $t0202_siswaiuran_grid->RowCnt);
?>
	<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td data-name="tahunajaran_id"<?php echo $t0202_siswaiuran->tahunajaran_id->cellAttributes() ?>>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_tahunajaran_id" class="form-group t0202_siswaiuran_tahunajaran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" data-value-separator="<?php echo $t0202_siswaiuran->tahunajaran_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id"<?php echo $t0202_siswaiuran->tahunajaran_id->editAttributes() ?>>
		<?php echo $t0202_siswaiuran->tahunajaran_id->selectOptionListHtml("x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id") ?>
	</select>
</div>
<?php echo $t0202_siswaiuran->tahunajaran_id->Lookup->getParamTag("p_x" . $t0202_siswaiuran_grid->RowIndex . "_tahunajaran_id") ?>
</span>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->tahunajaran_id->OldValue) ?>">
<?php } ?>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_tahunajaran_id" class="form-group t0202_siswaiuran_tahunajaran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" data-value-separator="<?php echo $t0202_siswaiuran->tahunajaran_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id"<?php echo $t0202_siswaiuran->tahunajaran_id->editAttributes() ?>>
		<?php echo $t0202_siswaiuran->tahunajaran_id->selectOptionListHtml("x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id") ?>
	</select>
</div>
<?php echo $t0202_siswaiuran->tahunajaran_id->Lookup->getParamTag("p_x" . $t0202_siswaiuran_grid->RowIndex . "_tahunajaran_id") ?>
</span>
<?php } ?>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_tahunajaran_id" class="t0202_siswaiuran_tahunajaran_id">
<span<?php echo $t0202_siswaiuran->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->tahunajaran_id->getViewValue() ?></span>
</span>
<?php if (!$t0202_siswaiuran->isConfirm()) { ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->tahunajaran_id->FormValue) ?>">
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->tahunajaran_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" name="ft0202_siswaiurangrid$x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" id="ft0202_siswaiurangrid$x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->tahunajaran_id->FormValue) ?>">
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" name="ft0202_siswaiurangrid$o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" id="ft0202_siswaiurangrid$o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->tahunajaran_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_id" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0202_siswaiuran->id->CurrentValue) ?>">
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_id" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_id" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0202_siswaiuran->id->OldValue) ?>">
<?php } ?>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_EDIT || $t0202_siswaiuran->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_id" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0202_siswaiuran->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
		<td data-name="iuran_id"<?php echo $t0202_siswaiuran->iuran_id->cellAttributes() ?>>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_iuran_id" class="form-group t0202_siswaiuran_iuran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0202_siswaiuran" data-field="x_iuran_id" data-value-separator="<?php echo $t0202_siswaiuran->iuran_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id"<?php echo $t0202_siswaiuran->iuran_id->editAttributes() ?>>
		<?php echo $t0202_siswaiuran->iuran_id->selectOptionListHtml("x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id") ?>
	</select>
</div>
<?php echo $t0202_siswaiuran->iuran_id->Lookup->getParamTag("p_x" . $t0202_siswaiuran_grid->RowIndex . "_iuran_id") ?>
</span>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_iuran_id" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->iuran_id->OldValue) ?>">
<?php } ?>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_iuran_id" class="form-group t0202_siswaiuran_iuran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0202_siswaiuran" data-field="x_iuran_id" data-value-separator="<?php echo $t0202_siswaiuran->iuran_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id"<?php echo $t0202_siswaiuran->iuran_id->editAttributes() ?>>
		<?php echo $t0202_siswaiuran->iuran_id->selectOptionListHtml("x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id") ?>
	</select>
</div>
<?php echo $t0202_siswaiuran->iuran_id->Lookup->getParamTag("p_x" . $t0202_siswaiuran_grid->RowIndex . "_iuran_id") ?>
</span>
<?php } ?>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_iuran_id" class="t0202_siswaiuran_iuran_id">
<span<?php echo $t0202_siswaiuran->iuran_id->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->iuran_id->getViewValue() ?></span>
</span>
<?php if (!$t0202_siswaiuran->isConfirm()) { ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_iuran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->iuran_id->FormValue) ?>">
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_iuran_id" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->iuran_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_iuran_id" name="ft0202_siswaiurangrid$x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" id="ft0202_siswaiurangrid$x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->iuran_id->FormValue) ?>">
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_iuran_id" name="ft0202_siswaiurangrid$o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" id="ft0202_siswaiurangrid$o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->iuran_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
		<td data-name="Nilai"<?php echo $t0202_siswaiuran->Nilai->cellAttributes() ?>>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_Nilai" class="form-group t0202_siswaiuran_Nilai">
<input type="text" data-table="t0202_siswaiuran" data-field="x_Nilai" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" size="30" placeholder="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->getPlaceHolder()) ?>" value="<?php echo $t0202_siswaiuran->Nilai->EditValue ?>"<?php echo $t0202_siswaiuran->Nilai->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_Nilai" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->OldValue) ?>">
<?php } ?>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_Nilai" class="form-group t0202_siswaiuran_Nilai">
<input type="text" data-table="t0202_siswaiuran" data-field="x_Nilai" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" size="30" placeholder="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->getPlaceHolder()) ?>" value="<?php echo $t0202_siswaiuran->Nilai->EditValue ?>"<?php echo $t0202_siswaiuran->Nilai->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0202_siswaiuran_grid->RowCnt ?>_t0202_siswaiuran_Nilai" class="t0202_siswaiuran_Nilai">
<span<?php echo $t0202_siswaiuran->Nilai->viewAttributes() ?>>
<?php echo $t0202_siswaiuran->Nilai->getViewValue() ?></span>
</span>
<?php if (!$t0202_siswaiuran->isConfirm()) { ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_Nilai" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->FormValue) ?>">
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_Nilai" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_Nilai" name="ft0202_siswaiurangrid$x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="ft0202_siswaiurangrid$x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->FormValue) ?>">
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_Nilai" name="ft0202_siswaiurangrid$o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="ft0202_siswaiurangrid$o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0202_siswaiuran_grid->ListOptions->render("body", "right", $t0202_siswaiuran_grid->RowCnt);
?>
	</tr>
<?php if ($t0202_siswaiuran->RowType == ROWTYPE_ADD || $t0202_siswaiuran->RowType == ROWTYPE_EDIT) { ?>
<script>
ft0202_siswaiurangrid.updateLists(<?php echo $t0202_siswaiuran_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t0202_siswaiuran->isGridAdd() || $t0202_siswaiuran->CurrentMode == "copy")
		if (!$t0202_siswaiuran_grid->Recordset->EOF)
			$t0202_siswaiuran_grid->Recordset->moveNext();
}
?>
<?php
	if ($t0202_siswaiuran->CurrentMode == "add" || $t0202_siswaiuran->CurrentMode == "copy" || $t0202_siswaiuran->CurrentMode == "edit") {
		$t0202_siswaiuran_grid->RowIndex = '$rowindex$';
		$t0202_siswaiuran_grid->loadRowValues();

		// Set row properties
		$t0202_siswaiuran->resetAttributes();
		$t0202_siswaiuran->RowAttrs = array_merge($t0202_siswaiuran->RowAttrs, array('data-rowindex'=>$t0202_siswaiuran_grid->RowIndex, 'id'=>'r0_t0202_siswaiuran', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t0202_siswaiuran->RowAttrs["class"], "ew-template");
		$t0202_siswaiuran->RowType = ROWTYPE_ADD;

		// Render row
		$t0202_siswaiuran_grid->renderRow();

		// Render list options
		$t0202_siswaiuran_grid->renderListOptions();
		$t0202_siswaiuran_grid->StartRowCnt = 0;
?>
	<tr<?php echo $t0202_siswaiuran->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0202_siswaiuran_grid->ListOptions->render("body", "left", $t0202_siswaiuran_grid->RowIndex);
?>
	<?php if ($t0202_siswaiuran->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td data-name="tahunajaran_id">
<?php if (!$t0202_siswaiuran->isConfirm()) { ?>
<span id="el$rowindex$_t0202_siswaiuran_tahunajaran_id" class="form-group t0202_siswaiuran_tahunajaran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" data-value-separator="<?php echo $t0202_siswaiuran->tahunajaran_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id"<?php echo $t0202_siswaiuran->tahunajaran_id->editAttributes() ?>>
		<?php echo $t0202_siswaiuran->tahunajaran_id->selectOptionListHtml("x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id") ?>
	</select>
</div>
<?php echo $t0202_siswaiuran->tahunajaran_id->Lookup->getParamTag("p_x" . $t0202_siswaiuran_grid->RowIndex . "_tahunajaran_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0202_siswaiuran_tahunajaran_id" class="form-group t0202_siswaiuran_tahunajaran_id">
<span<?php echo $t0202_siswaiuran->tahunajaran_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0202_siswaiuran->tahunajaran_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->tahunajaran_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_tahunajaran_id" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_tahunajaran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->tahunajaran_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t0202_siswaiuran->iuran_id->Visible) { // iuran_id ?>
		<td data-name="iuran_id">
<?php if (!$t0202_siswaiuran->isConfirm()) { ?>
<span id="el$rowindex$_t0202_siswaiuran_iuran_id" class="form-group t0202_siswaiuran_iuran_id">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t0202_siswaiuran" data-field="x_iuran_id" data-value-separator="<?php echo $t0202_siswaiuran->iuran_id->displayValueSeparatorAttribute() ?>" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id"<?php echo $t0202_siswaiuran->iuran_id->editAttributes() ?>>
		<?php echo $t0202_siswaiuran->iuran_id->selectOptionListHtml("x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id") ?>
	</select>
</div>
<?php echo $t0202_siswaiuran->iuran_id->Lookup->getParamTag("p_x" . $t0202_siswaiuran_grid->RowIndex . "_iuran_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0202_siswaiuran_iuran_id" class="form-group t0202_siswaiuran_iuran_id">
<span<?php echo $t0202_siswaiuran->iuran_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0202_siswaiuran->iuran_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_iuran_id" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->iuran_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_iuran_id" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0202_siswaiuran->iuran_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t0202_siswaiuran->Nilai->Visible) { // Nilai ?>
		<td data-name="Nilai">
<?php if (!$t0202_siswaiuran->isConfirm()) { ?>
<span id="el$rowindex$_t0202_siswaiuran_Nilai" class="form-group t0202_siswaiuran_Nilai">
<input type="text" data-table="t0202_siswaiuran" data-field="x_Nilai" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" size="30" placeholder="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->getPlaceHolder()) ?>" value="<?php echo $t0202_siswaiuran->Nilai->EditValue ?>"<?php echo $t0202_siswaiuran->Nilai->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0202_siswaiuran_Nilai" class="form-group t0202_siswaiuran_Nilai">
<span<?php echo $t0202_siswaiuran->Nilai->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0202_siswaiuran->Nilai->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_Nilai" name="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="x<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0202_siswaiuran" data-field="x_Nilai" name="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" id="o<?php echo $t0202_siswaiuran_grid->RowIndex ?>_Nilai" value="<?php echo HtmlEncode($t0202_siswaiuran->Nilai->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0202_siswaiuran_grid->ListOptions->render("body", "right", $t0202_siswaiuran_grid->RowIndex);
?>
<script>
ft0202_siswaiurangrid.updateLists(<?php echo $t0202_siswaiuran_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($t0202_siswaiuran->CurrentMode == "add" || $t0202_siswaiuran->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t0202_siswaiuran_grid->FormKeyCountName ?>" id="<?php echo $t0202_siswaiuran_grid->FormKeyCountName ?>" value="<?php echo $t0202_siswaiuran_grid->KeyCount ?>">
<?php echo $t0202_siswaiuran_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t0202_siswaiuran->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t0202_siswaiuran_grid->FormKeyCountName ?>" id="<?php echo $t0202_siswaiuran_grid->FormKeyCountName ?>" value="<?php echo $t0202_siswaiuran_grid->KeyCount ?>">
<?php echo $t0202_siswaiuran_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t0202_siswaiuran->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft0202_siswaiurangrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($t0202_siswaiuran_grid->Recordset)
	$t0202_siswaiuran_grid->Recordset->Close();
?>
</div>
<?php if ($t0202_siswaiuran_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t0202_siswaiuran_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0202_siswaiuran_grid->TotalRecs == 0 && !$t0202_siswaiuran->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0202_siswaiuran_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0202_siswaiuran_grid->terminate();
?>