<?php
namespace PHPMaker2019\spp_prj;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t0302_bayardetail_grid))
	$t0302_bayardetail_grid = new t0302_bayardetail_grid();

// Run the page
$t0302_bayardetail_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0302_bayardetail_grid->Page_Render();
?>
<?php if (!$t0302_bayardetail->isExport()) { ?>
<script>

// Form object
var ft0302_bayardetailgrid = new ew.Form("ft0302_bayardetailgrid", "grid");
ft0302_bayardetailgrid.formKeyCountName = '<?php echo $t0302_bayardetail_grid->FormKeyCountName ?>';

// Validate form
ft0302_bayardetailgrid.validate = function() {
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
		<?php if ($t0302_bayardetail_grid->iuran_id->Required) { ?>
			elm = this.getElements("x" + infix + "_iuran_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->iuran_id->caption(), $t0302_bayardetail->iuran_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_iuran_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0302_bayardetail->iuran_id->errorMessage()) ?>");
		<?php if ($t0302_bayardetail_grid->Periode1->Required) { ?>
			elm = this.getElements("x" + infix + "_Periode1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->Periode1->caption(), $t0302_bayardetail->Periode1->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0302_bayardetail_grid->Periode2->Required) { ?>
			elm = this.getElements("x" + infix + "_Periode2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->Periode2->caption(), $t0302_bayardetail->Periode2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0302_bayardetail_grid->Keterangan->Required) { ?>
			elm = this.getElements("x" + infix + "_Keterangan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->Keterangan->caption(), $t0302_bayardetail->Keterangan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($t0302_bayardetail_grid->Jumlah->Required) { ?>
			elm = this.getElements("x" + infix + "_Jumlah");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t0302_bayardetail->Jumlah->caption(), $t0302_bayardetail->Jumlah->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Jumlah");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($t0302_bayardetail->Jumlah->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
ft0302_bayardetailgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "iuran_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "Periode1", false)) return false;
	if (ew.valueChanged(fobj, infix, "Periode2", false)) return false;
	if (ew.valueChanged(fobj, infix, "Keterangan", false)) return false;
	if (ew.valueChanged(fobj, infix, "Jumlah", false)) return false;
	return true;
}

// Form_CustomValidate event
ft0302_bayardetailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0302_bayardetailgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0302_bayardetailgrid.lists["x_iuran_id"] = <?php echo $t0302_bayardetail_grid->iuran_id->Lookup->toClientList() ?>;
ft0302_bayardetailgrid.lists["x_iuran_id"].options = <?php echo JsonEncode($t0302_bayardetail_grid->iuran_id->lookupOptions()) ?>;
ft0302_bayardetailgrid.autoSuggests["x_iuran_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$t0302_bayardetail_grid->renderOtherOptions();
?>
<?php $t0302_bayardetail_grid->showPageHeader(); ?>
<?php
$t0302_bayardetail_grid->showMessage();
?>
<?php if ($t0302_bayardetail_grid->TotalRecs > 0 || $t0302_bayardetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t0302_bayardetail_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t0302_bayardetail">
<div id="ft0302_bayardetailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t0302_bayardetail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_t0302_bayardetailgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t0302_bayardetail_grid->RowType = ROWTYPE_HEADER;

// Render list options
$t0302_bayardetail_grid->renderListOptions();

// Render list options (header, left)
$t0302_bayardetail_grid->ListOptions->render("header", "left");
?>
<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->iuran_id) == "") { ?>
		<th data-name="iuran_id" class="<?php echo $t0302_bayardetail->iuran_id->headerCellClass() ?>"><div id="elh_t0302_bayardetail_iuran_id" class="t0302_bayardetail_iuran_id"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->iuran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iuran_id" class="<?php echo $t0302_bayardetail->iuran_id->headerCellClass() ?>"><div><div id="elh_t0302_bayardetail_iuran_id" class="t0302_bayardetail_iuran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->iuran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->iuran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->iuran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->Periode1) == "") { ?>
		<th data-name="Periode1" class="<?php echo $t0302_bayardetail->Periode1->headerCellClass() ?>"><div id="elh_t0302_bayardetail_Periode1" class="t0302_bayardetail_Periode1"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode1" class="<?php echo $t0302_bayardetail->Periode1->headerCellClass() ?>"><div><div id="elh_t0302_bayardetail_Periode1" class="t0302_bayardetail_Periode1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->Periode1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->Periode1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->Periode2) == "") { ?>
		<th data-name="Periode2" class="<?php echo $t0302_bayardetail->Periode2->headerCellClass() ?>"><div id="elh_t0302_bayardetail_Periode2" class="t0302_bayardetail_Periode2"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode2" class="<?php echo $t0302_bayardetail->Periode2->headerCellClass() ?>"><div><div id="elh_t0302_bayardetail_Periode2" class="t0302_bayardetail_Periode2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->Periode2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->Periode2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->Keterangan) == "") { ?>
		<th data-name="Keterangan" class="<?php echo $t0302_bayardetail->Keterangan->headerCellClass() ?>"><div id="elh_t0302_bayardetail_Keterangan" class="t0302_bayardetail_Keterangan"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->Keterangan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Keterangan" class="<?php echo $t0302_bayardetail->Keterangan->headerCellClass() ?>"><div><div id="elh_t0302_bayardetail_Keterangan" class="t0302_bayardetail_Keterangan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Keterangan->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->Keterangan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->Keterangan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
	<?php if ($t0302_bayardetail->sortUrl($t0302_bayardetail->Jumlah) == "") { ?>
		<th data-name="Jumlah" class="<?php echo $t0302_bayardetail->Jumlah->headerCellClass() ?>"><div id="elh_t0302_bayardetail_Jumlah" class="t0302_bayardetail_Jumlah"><div class="ew-table-header-caption"><?php echo $t0302_bayardetail->Jumlah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah" class="<?php echo $t0302_bayardetail->Jumlah->headerCellClass() ?>"><div><div id="elh_t0302_bayardetail_Jumlah" class="t0302_bayardetail_Jumlah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Jumlah->caption() ?></span><span class="ew-table-header-sort"><?php if ($t0302_bayardetail->Jumlah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($t0302_bayardetail->Jumlah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0302_bayardetail_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t0302_bayardetail_grid->StartRec = 1;
$t0302_bayardetail_grid->StopRec = $t0302_bayardetail_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $t0302_bayardetail_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t0302_bayardetail_grid->FormKeyCountName) && ($t0302_bayardetail->isGridAdd() || $t0302_bayardetail->isGridEdit() || $t0302_bayardetail->isConfirm())) {
		$t0302_bayardetail_grid->KeyCount = $CurrentForm->getValue($t0302_bayardetail_grid->FormKeyCountName);
		$t0302_bayardetail_grid->StopRec = $t0302_bayardetail_grid->StartRec + $t0302_bayardetail_grid->KeyCount - 1;
	}
}
$t0302_bayardetail_grid->RecCnt = $t0302_bayardetail_grid->StartRec - 1;
if ($t0302_bayardetail_grid->Recordset && !$t0302_bayardetail_grid->Recordset->EOF) {
	$t0302_bayardetail_grid->Recordset->moveFirst();
	$selectLimit = $t0302_bayardetail_grid->UseSelectLimit;
	if (!$selectLimit && $t0302_bayardetail_grid->StartRec > 1)
		$t0302_bayardetail_grid->Recordset->move($t0302_bayardetail_grid->StartRec - 1);
} elseif (!$t0302_bayardetail->AllowAddDeleteRow && $t0302_bayardetail_grid->StopRec == 0) {
	$t0302_bayardetail_grid->StopRec = $t0302_bayardetail->GridAddRowCount;
}

// Initialize aggregate
$t0302_bayardetail->RowType = ROWTYPE_AGGREGATEINIT;
$t0302_bayardetail->resetAttributes();
$t0302_bayardetail_grid->renderRow();
if ($t0302_bayardetail->isGridAdd())
	$t0302_bayardetail_grid->RowIndex = 0;
if ($t0302_bayardetail->isGridEdit())
	$t0302_bayardetail_grid->RowIndex = 0;
while ($t0302_bayardetail_grid->RecCnt < $t0302_bayardetail_grid->StopRec) {
	$t0302_bayardetail_grid->RecCnt++;
	if ($t0302_bayardetail_grid->RecCnt >= $t0302_bayardetail_grid->StartRec) {
		$t0302_bayardetail_grid->RowCnt++;
		if ($t0302_bayardetail->isGridAdd() || $t0302_bayardetail->isGridEdit() || $t0302_bayardetail->isConfirm()) {
			$t0302_bayardetail_grid->RowIndex++;
			$CurrentForm->Index = $t0302_bayardetail_grid->RowIndex;
			if ($CurrentForm->hasValue($t0302_bayardetail_grid->FormActionName) && $t0302_bayardetail_grid->EventCancelled)
				$t0302_bayardetail_grid->RowAction = strval($CurrentForm->getValue($t0302_bayardetail_grid->FormActionName));
			elseif ($t0302_bayardetail->isGridAdd())
				$t0302_bayardetail_grid->RowAction = "insert";
			else
				$t0302_bayardetail_grid->RowAction = "";
		}

		// Set up key count
		$t0302_bayardetail_grid->KeyCount = $t0302_bayardetail_grid->RowIndex;

		// Init row class and style
		$t0302_bayardetail->resetAttributes();
		$t0302_bayardetail->CssClass = "";
		if ($t0302_bayardetail->isGridAdd()) {
			if ($t0302_bayardetail->CurrentMode == "copy") {
				$t0302_bayardetail_grid->loadRowValues($t0302_bayardetail_grid->Recordset); // Load row values
				$t0302_bayardetail_grid->setRecordKey($t0302_bayardetail_grid->RowOldKey, $t0302_bayardetail_grid->Recordset); // Set old record key
			} else {
				$t0302_bayardetail_grid->loadRowValues(); // Load default values
				$t0302_bayardetail_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t0302_bayardetail_grid->loadRowValues($t0302_bayardetail_grid->Recordset); // Load row values
		}
		$t0302_bayardetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t0302_bayardetail->isGridAdd()) // Grid add
			$t0302_bayardetail->RowType = ROWTYPE_ADD; // Render add
		if ($t0302_bayardetail->isGridAdd() && $t0302_bayardetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t0302_bayardetail_grid->restoreCurrentRowFormValues($t0302_bayardetail_grid->RowIndex); // Restore form values
		if ($t0302_bayardetail->isGridEdit()) { // Grid edit
			if ($t0302_bayardetail->EventCancelled)
				$t0302_bayardetail_grid->restoreCurrentRowFormValues($t0302_bayardetail_grid->RowIndex); // Restore form values
			if ($t0302_bayardetail_grid->RowAction == "insert")
				$t0302_bayardetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t0302_bayardetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t0302_bayardetail->isGridEdit() && ($t0302_bayardetail->RowType == ROWTYPE_EDIT || $t0302_bayardetail->RowType == ROWTYPE_ADD) && $t0302_bayardetail->EventCancelled) // Update failed
			$t0302_bayardetail_grid->restoreCurrentRowFormValues($t0302_bayardetail_grid->RowIndex); // Restore form values
		if ($t0302_bayardetail->RowType == ROWTYPE_EDIT) // Edit row
			$t0302_bayardetail_grid->EditRowCnt++;
		if ($t0302_bayardetail->isConfirm()) // Confirm row
			$t0302_bayardetail_grid->restoreCurrentRowFormValues($t0302_bayardetail_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t0302_bayardetail->RowAttrs = array_merge($t0302_bayardetail->RowAttrs, array('data-rowindex'=>$t0302_bayardetail_grid->RowCnt, 'id'=>'r' . $t0302_bayardetail_grid->RowCnt . '_t0302_bayardetail', 'data-rowtype'=>$t0302_bayardetail->RowType));

		// Render row
		$t0302_bayardetail_grid->renderRow();

		// Render list options
		$t0302_bayardetail_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t0302_bayardetail_grid->RowAction <> "delete" && $t0302_bayardetail_grid->RowAction <> "insertdelete" && !($t0302_bayardetail_grid->RowAction == "insert" && $t0302_bayardetail->isConfirm() && $t0302_bayardetail_grid->emptyRow())) {
?>
	<tr<?php echo $t0302_bayardetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0302_bayardetail_grid->ListOptions->render("body", "left", $t0302_bayardetail_grid->RowCnt);
?>
	<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
		<td data-name="iuran_id"<?php echo $t0302_bayardetail->iuran_id->cellAttributes() ?>>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_iuran_id" class="form-group t0302_bayardetail_iuran_id">
<?php
$wrkonchange = "" . trim(@$t0302_bayardetail->iuran_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$t0302_bayardetail->iuran_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" class="text-nowrap" style="z-index: <?php echo (9000 - $t0302_bayardetail_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="sv_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo RemoveHtml($t0302_bayardetail->iuran_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->getPlaceHolder()) ?>"<?php echo $t0302_bayardetail->iuran_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" data-value-separator="<?php echo $t0302_bayardetail->iuran_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ft0302_bayardetailgrid.createAutoSuggest({"id":"x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id","forceSelect":false});
</script>
<?php echo $t0302_bayardetail->iuran_id->Lookup->getParamTag("p_x" . $t0302_bayardetail_grid->RowIndex . "_iuran_id") ?>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->OldValue) ?>">
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_iuran_id" class="form-group t0302_bayardetail_iuran_id">
<?php
$wrkonchange = "" . trim(@$t0302_bayardetail->iuran_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$t0302_bayardetail->iuran_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" class="text-nowrap" style="z-index: <?php echo (9000 - $t0302_bayardetail_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="sv_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo RemoveHtml($t0302_bayardetail->iuran_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->getPlaceHolder()) ?>"<?php echo $t0302_bayardetail->iuran_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" data-value-separator="<?php echo $t0302_bayardetail->iuran_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ft0302_bayardetailgrid.createAutoSuggest({"id":"x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id","forceSelect":false});
</script>
<?php echo $t0302_bayardetail->iuran_id->Lookup->getParamTag("p_x" . $t0302_bayardetail_grid->RowIndex . "_iuran_id") ?>
</span>
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_iuran_id" class="t0302_bayardetail_iuran_id">
<span<?php echo $t0302_bayardetail->iuran_id->viewAttributes() ?>>
<?php echo $t0302_bayardetail->iuran_id->getViewValue() ?></span>
</span>
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" name="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" name="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_id" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_id" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0302_bayardetail->id->CurrentValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_id" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_id" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0302_bayardetail->id->OldValue) ?>">
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_EDIT || $t0302_bayardetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_id" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_id" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t0302_bayardetail->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
		<td data-name="Periode1"<?php echo $t0302_bayardetail->Periode1->cellAttributes() ?>>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Periode1" class="form-group t0302_bayardetail_Periode1">
<input type="text" data-table="t0302_bayardetail" data-field="x_Periode1" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Periode1->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Periode1->EditValue ?>"<?php echo $t0302_bayardetail->Periode1->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode1" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" value="<?php echo HtmlEncode($t0302_bayardetail->Periode1->OldValue) ?>">
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Periode1" class="form-group t0302_bayardetail_Periode1">
<input type="text" data-table="t0302_bayardetail" data-field="x_Periode1" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Periode1->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Periode1->EditValue ?>"<?php echo $t0302_bayardetail->Periode1->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Periode1" class="t0302_bayardetail_Periode1">
<span<?php echo $t0302_bayardetail->Periode1->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode1->getViewValue() ?></span>
</span>
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode1" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" value="<?php echo HtmlEncode($t0302_bayardetail->Periode1->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode1" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" value="<?php echo HtmlEncode($t0302_bayardetail->Periode1->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode1" name="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" value="<?php echo HtmlEncode($t0302_bayardetail->Periode1->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode1" name="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" value="<?php echo HtmlEncode($t0302_bayardetail->Periode1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
		<td data-name="Periode2"<?php echo $t0302_bayardetail->Periode2->cellAttributes() ?>>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Periode2" class="form-group t0302_bayardetail_Periode2">
<input type="text" data-table="t0302_bayardetail" data-field="x_Periode2" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Periode2->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Periode2->EditValue ?>"<?php echo $t0302_bayardetail->Periode2->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode2" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" value="<?php echo HtmlEncode($t0302_bayardetail->Periode2->OldValue) ?>">
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Periode2" class="form-group t0302_bayardetail_Periode2">
<input type="text" data-table="t0302_bayardetail" data-field="x_Periode2" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Periode2->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Periode2->EditValue ?>"<?php echo $t0302_bayardetail->Periode2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Periode2" class="t0302_bayardetail_Periode2">
<span<?php echo $t0302_bayardetail->Periode2->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode2->getViewValue() ?></span>
</span>
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode2" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" value="<?php echo HtmlEncode($t0302_bayardetail->Periode2->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode2" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" value="<?php echo HtmlEncode($t0302_bayardetail->Periode2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode2" name="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" value="<?php echo HtmlEncode($t0302_bayardetail->Periode2->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode2" name="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" value="<?php echo HtmlEncode($t0302_bayardetail->Periode2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
		<td data-name="Keterangan"<?php echo $t0302_bayardetail->Keterangan->cellAttributes() ?>>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Keterangan" class="form-group t0302_bayardetail_Keterangan">
<input type="text" data-table="t0302_bayardetail" data-field="x_Keterangan" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Keterangan->EditValue ?>"<?php echo $t0302_bayardetail->Keterangan->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Keterangan" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" value="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->OldValue) ?>">
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Keterangan" class="form-group t0302_bayardetail_Keterangan">
<input type="text" data-table="t0302_bayardetail" data-field="x_Keterangan" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Keterangan->EditValue ?>"<?php echo $t0302_bayardetail->Keterangan->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Keterangan" class="t0302_bayardetail_Keterangan">
<span<?php echo $t0302_bayardetail->Keterangan->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Keterangan->getViewValue() ?></span>
</span>
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Keterangan" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" value="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Keterangan" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" value="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Keterangan" name="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" value="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Keterangan" name="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" value="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah"<?php echo $t0302_bayardetail->Jumlah->cellAttributes() ?>>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Jumlah" class="form-group t0302_bayardetail_Jumlah">
<input type="text" data-table="t0302_bayardetail" data-field="x_Jumlah" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" size="30" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Jumlah->EditValue ?>"<?php echo $t0302_bayardetail->Jumlah->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Jumlah" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->OldValue) ?>">
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Jumlah" class="form-group t0302_bayardetail_Jumlah">
<input type="text" data-table="t0302_bayardetail" data-field="x_Jumlah" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" size="30" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Jumlah->EditValue ?>"<?php echo $t0302_bayardetail->Jumlah->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t0302_bayardetail_grid->RowCnt ?>_t0302_bayardetail_Jumlah" class="t0302_bayardetail_Jumlah">
<span<?php echo $t0302_bayardetail->Jumlah->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Jumlah->getViewValue() ?></span>
</span>
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Jumlah" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Jumlah" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Jumlah" name="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="ft0302_bayardetailgrid$x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->FormValue) ?>">
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Jumlah" name="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="ft0302_bayardetailgrid$o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0302_bayardetail_grid->ListOptions->render("body", "right", $t0302_bayardetail_grid->RowCnt);
?>
	</tr>
<?php if ($t0302_bayardetail->RowType == ROWTYPE_ADD || $t0302_bayardetail->RowType == ROWTYPE_EDIT) { ?>
<script>
ft0302_bayardetailgrid.updateLists(<?php echo $t0302_bayardetail_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t0302_bayardetail->isGridAdd() || $t0302_bayardetail->CurrentMode == "copy")
		if (!$t0302_bayardetail_grid->Recordset->EOF)
			$t0302_bayardetail_grid->Recordset->moveNext();
}
?>
<?php
	if ($t0302_bayardetail->CurrentMode == "add" || $t0302_bayardetail->CurrentMode == "copy" || $t0302_bayardetail->CurrentMode == "edit") {
		$t0302_bayardetail_grid->RowIndex = '$rowindex$';
		$t0302_bayardetail_grid->loadRowValues();

		// Set row properties
		$t0302_bayardetail->resetAttributes();
		$t0302_bayardetail->RowAttrs = array_merge($t0302_bayardetail->RowAttrs, array('data-rowindex'=>$t0302_bayardetail_grid->RowIndex, 'id'=>'r0_t0302_bayardetail', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($t0302_bayardetail->RowAttrs["class"], "ew-template");
		$t0302_bayardetail->RowType = ROWTYPE_ADD;

		// Render row
		$t0302_bayardetail_grid->renderRow();

		// Render list options
		$t0302_bayardetail_grid->renderListOptions();
		$t0302_bayardetail_grid->StartRowCnt = 0;
?>
	<tr<?php echo $t0302_bayardetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0302_bayardetail_grid->ListOptions->render("body", "left", $t0302_bayardetail_grid->RowIndex);
?>
	<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
		<td data-name="iuran_id">
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<span id="el$rowindex$_t0302_bayardetail_iuran_id" class="form-group t0302_bayardetail_iuran_id">
<?php
$wrkonchange = "" . trim(@$t0302_bayardetail->iuran_id->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$t0302_bayardetail->iuran_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" class="text-nowrap" style="z-index: <?php echo (9000 - $t0302_bayardetail_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="sv_x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo RemoveHtml($t0302_bayardetail->iuran_id->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->getPlaceHolder()) ?>"<?php echo $t0302_bayardetail->iuran_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" data-value-separator="<?php echo $t0302_bayardetail->iuran_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ft0302_bayardetailgrid.createAutoSuggest({"id":"x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id","forceSelect":false});
</script>
<?php echo $t0302_bayardetail->iuran_id->Lookup->getParamTag("p_x" . $t0302_bayardetail_grid->RowIndex . "_iuran_id") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0302_bayardetail_iuran_id" class="form-group t0302_bayardetail_iuran_id">
<span<?php echo $t0302_bayardetail->iuran_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0302_bayardetail->iuran_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_iuran_id" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_iuran_id" value="<?php echo HtmlEncode($t0302_bayardetail->iuran_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
		<td data-name="Periode1">
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<span id="el$rowindex$_t0302_bayardetail_Periode1" class="form-group t0302_bayardetail_Periode1">
<input type="text" data-table="t0302_bayardetail" data-field="x_Periode1" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Periode1->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Periode1->EditValue ?>"<?php echo $t0302_bayardetail->Periode1->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0302_bayardetail_Periode1" class="form-group t0302_bayardetail_Periode1">
<span<?php echo $t0302_bayardetail->Periode1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0302_bayardetail->Periode1->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode1" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" value="<?php echo HtmlEncode($t0302_bayardetail->Periode1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode1" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode1" value="<?php echo HtmlEncode($t0302_bayardetail->Periode1->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
		<td data-name="Periode2">
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<span id="el$rowindex$_t0302_bayardetail_Periode2" class="form-group t0302_bayardetail_Periode2">
<input type="text" data-table="t0302_bayardetail" data-field="x_Periode2" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Periode2->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Periode2->EditValue ?>"<?php echo $t0302_bayardetail->Periode2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0302_bayardetail_Periode2" class="form-group t0302_bayardetail_Periode2">
<span<?php echo $t0302_bayardetail->Periode2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0302_bayardetail->Periode2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode2" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" value="<?php echo HtmlEncode($t0302_bayardetail->Periode2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Periode2" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Periode2" value="<?php echo HtmlEncode($t0302_bayardetail->Periode2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
		<td data-name="Keterangan">
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<span id="el$rowindex$_t0302_bayardetail_Keterangan" class="form-group t0302_bayardetail_Keterangan">
<input type="text" data-table="t0302_bayardetail" data-field="x_Keterangan" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Keterangan->EditValue ?>"<?php echo $t0302_bayardetail->Keterangan->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0302_bayardetail_Keterangan" class="form-group t0302_bayardetail_Keterangan">
<span<?php echo $t0302_bayardetail->Keterangan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0302_bayardetail->Keterangan->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Keterangan" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" value="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Keterangan" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Keterangan" value="<?php echo HtmlEncode($t0302_bayardetail->Keterangan->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah">
<?php if (!$t0302_bayardetail->isConfirm()) { ?>
<span id="el$rowindex$_t0302_bayardetail_Jumlah" class="form-group t0302_bayardetail_Jumlah">
<input type="text" data-table="t0302_bayardetail" data-field="x_Jumlah" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" size="30" placeholder="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->getPlaceHolder()) ?>" value="<?php echo $t0302_bayardetail->Jumlah->EditValue ?>"<?php echo $t0302_bayardetail->Jumlah->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t0302_bayardetail_Jumlah" class="form-group t0302_bayardetail_Jumlah">
<span<?php echo $t0302_bayardetail->Jumlah->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($t0302_bayardetail->Jumlah->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Jumlah" name="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="x<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t0302_bayardetail" data-field="x_Jumlah" name="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" id="o<?php echo $t0302_bayardetail_grid->RowIndex ?>_Jumlah" value="<?php echo HtmlEncode($t0302_bayardetail->Jumlah->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t0302_bayardetail_grid->ListOptions->render("body", "right", $t0302_bayardetail_grid->RowIndex);
?>
<script>
ft0302_bayardetailgrid.updateLists(<?php echo $t0302_bayardetail_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($t0302_bayardetail->CurrentMode == "add" || $t0302_bayardetail->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t0302_bayardetail_grid->FormKeyCountName ?>" id="<?php echo $t0302_bayardetail_grid->FormKeyCountName ?>" value="<?php echo $t0302_bayardetail_grid->KeyCount ?>">
<?php echo $t0302_bayardetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t0302_bayardetail->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t0302_bayardetail_grid->FormKeyCountName ?>" id="<?php echo $t0302_bayardetail_grid->FormKeyCountName ?>" value="<?php echo $t0302_bayardetail_grid->KeyCount ?>">
<?php echo $t0302_bayardetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t0302_bayardetail->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft0302_bayardetailgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($t0302_bayardetail_grid->Recordset)
	$t0302_bayardetail_grid->Recordset->Close();
?>
</div>
<?php if ($t0302_bayardetail_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t0302_bayardetail_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t0302_bayardetail_grid->TotalRecs == 0 && !$t0302_bayardetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t0302_bayardetail_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t0302_bayardetail_grid->terminate();
?>