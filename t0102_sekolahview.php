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
$t0102_sekolah_view = new t0102_sekolah_view();

// Run the page
$t0102_sekolah_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0102_sekolah_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$t0102_sekolah->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ft0102_sekolahview = currentForm = new ew.Form("ft0102_sekolahview", "view");

// Form_CustomValidate event
ft0102_sekolahview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ft0102_sekolahview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$t0102_sekolah->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t0102_sekolah_view->ExportOptions->render("body") ?>
<?php $t0102_sekolah_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t0102_sekolah_view->showPageHeader(); ?>
<?php
$t0102_sekolah_view->showMessage();
?>
<form name="ft0102_sekolahview" id="ft0102_sekolahview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($t0102_sekolah_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $t0102_sekolah_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t0102_sekolah">
<input type="hidden" name="modal" value="<?php echo (int)$t0102_sekolah_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t0102_sekolah->Sekolah->Visible) { // Sekolah ?>
	<tr id="r_Sekolah">
		<td class="<?php echo $t0102_sekolah_view->TableLeftColumnClass ?>"><span id="elh_t0102_sekolah_Sekolah"><?php echo $t0102_sekolah->Sekolah->caption() ?></span></td>
		<td data-name="Sekolah"<?php echo $t0102_sekolah->Sekolah->cellAttributes() ?>>
<span id="el_t0102_sekolah_Sekolah">
<span<?php echo $t0102_sekolah->Sekolah->viewAttributes() ?>>
<?php echo $t0102_sekolah->Sekolah->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t0102_sekolah_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$t0102_sekolah->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$t0102_sekolah_view->terminate();
?>