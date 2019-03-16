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
$t0302_bayardetail_view = new t0302_bayardetail_view();

// Run the page
$t0302_bayardetail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0302_bayardetail_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0302_bayardetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0302_bayardetailview = currentForm = new ew.Form("ft0302_bayardetailview", "view");

// Form_CustomValidate event
ft0302_bayardetailview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0302_bayardetailview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ft0302_bayardetailview.lists["x_iuran_id"] = <?php echo $t0302_bayardetail_view->iuran_id->Lookup->toClientList() ?>;
ft0302_bayardetailview.lists["x_iuran_id"].options = <?php echo JsonEncode($t0302_bayardetail_view->iuran_id->lookupOptions()) ?>;
ft0302_bayardetailview.autoSuggests["x_iuran_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ft0302_bayardetailview.lists["x_Periode1"] = <?php echo $t0302_bayardetail_view->Periode1->Lookup->toClientList() ?>;
ft0302_bayardetailview.lists["x_Periode1"].options = <?php echo JsonEncode($t0302_bayardetail_view->Periode1->options(FALSE, TRUE)) ?>;
ft0302_bayardetailview.lists["x_Periode2"] = <?php echo $t0302_bayardetail_view->Periode2->Lookup->toClientList() ?>;
ft0302_bayardetailview.lists["x_Periode2"].options = <?php echo JsonEncode($t0302_bayardetail_view->Periode2->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0302_bayardetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0302_bayardetail_view->ExportOptions->render("body") ?>
<?php $t0302_bayardetail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0302_bayardetail_view->showPageHeader(); ?>
<?php
$t0302_bayardetail_view->showMessage();
?>
<form name="ft0302_bayardetailview" id="ft0302_bayardetailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0302_bayardetail_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0302_bayardetail_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0302_bayardetail">
<input type="hidden" name="modal" value="<?php echo (int)$t0302_bayardetail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
	<tr id="r_iuran_id">
		<td class="<?php echo $t0302_bayardetail_view->TableLeftColumnClass ?>"><span id="elh_t0302_bayardetail_iuran_id"><?php echo $t0302_bayardetail->iuran_id->caption() ?></span></td>
		<td data-name="iuran_id"<?php echo $t0302_bayardetail->iuran_id->cellAttributes() ?>>
<span id="el_t0302_bayardetail_iuran_id">
<span<?php echo $t0302_bayardetail->iuran_id->viewAttributes() ?>>
<?php echo $t0302_bayardetail->iuran_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
	<tr id="r_Periode1">
		<td class="<?php echo $t0302_bayardetail_view->TableLeftColumnClass ?>"><span id="elh_t0302_bayardetail_Periode1"><?php echo $t0302_bayardetail->Periode1->caption() ?></span></td>
		<td data-name="Periode1"<?php echo $t0302_bayardetail->Periode1->cellAttributes() ?>>
<span id="el_t0302_bayardetail_Periode1">
<span<?php echo $t0302_bayardetail->Periode1->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
	<tr id="r_Periode2">
		<td class="<?php echo $t0302_bayardetail_view->TableLeftColumnClass ?>"><span id="elh_t0302_bayardetail_Periode2"><?php echo $t0302_bayardetail->Periode2->caption() ?></span></td>
		<td data-name="Periode2"<?php echo $t0302_bayardetail->Periode2->cellAttributes() ?>>
<span id="el_t0302_bayardetail_Periode2">
<span<?php echo $t0302_bayardetail->Periode2->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
	<tr id="r_Keterangan">
		<td class="<?php echo $t0302_bayardetail_view->TableLeftColumnClass ?>"><span id="elh_t0302_bayardetail_Keterangan"><?php echo $t0302_bayardetail->Keterangan->caption() ?></span></td>
		<td data-name="Keterangan"<?php echo $t0302_bayardetail->Keterangan->cellAttributes() ?>>
<span id="el_t0302_bayardetail_Keterangan">
<span<?php echo $t0302_bayardetail->Keterangan->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Keterangan->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
	<tr id="r_Jumlah">
		<td class="<?php echo $t0302_bayardetail_view->TableLeftColumnClass ?>"><span id="elh_t0302_bayardetail_Jumlah"><?php echo $t0302_bayardetail->Jumlah->caption() ?></span></td>
		<td data-name="Jumlah"<?php echo $t0302_bayardetail->Jumlah->cellAttributes() ?>>
<span id="el_t0302_bayardetail_Jumlah">
<span<?php echo $t0302_bayardetail->Jumlah->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Jumlah->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0302_bayardetail_view->showPageFooter();
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
$t0302_bayardetail_view->terminate();
?>