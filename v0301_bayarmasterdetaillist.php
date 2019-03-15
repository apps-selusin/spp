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
$v0301_bayarmasterdetail_list = new v0301_bayarmasterdetail_list();

// Run the page
$v0301_bayarmasterdetail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v0301_bayarmasterdetail_list->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$v0301_bayarmasterdetail->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "list";
var fv0301_bayarmasterdetaillist = currentForm = new ew.Form("fv0301_bayarmasterdetaillist", "list");
fv0301_bayarmasterdetaillist.formKeyCountName = '<?php echo $v0301_bayarmasterdetail_list->FormKeyCountName ?>';

// Form_CustomValidate event
fv0301_bayarmasterdetaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fv0301_bayarmasterdetaillist.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

var fv0301_bayarmasterdetaillistsrch = currentSearchForm = new ew.Form("fv0301_bayarmasterdetaillistsrch");

// Filters
fv0301_bayarmasterdetaillistsrch.filterList = <?php echo $v0301_bayarmasterdetail_list->getFilterList() ?>;
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
<?php if (!$v0301_bayarmasterdetail->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v0301_bayarmasterdetail_list->TotalRecs > 0 && $v0301_bayarmasterdetail_list->ExportOptions->visible()) { ?>
<?php $v0301_bayarmasterdetail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail_list->ImportOptions->visible()) { ?>
<?php $v0301_bayarmasterdetail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail_list->SearchOptions->visible()) { ?>
<?php $v0301_bayarmasterdetail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail_list->FilterOptions->visible()) { ?>
<?php $v0301_bayarmasterdetail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v0301_bayarmasterdetail_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v0301_bayarmasterdetail->isExport() && !$v0301_bayarmasterdetail->CurrentAction) { ?>
<form name="fv0301_bayarmasterdetaillistsrch" id="fv0301_bayarmasterdetaillistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($v0301_bayarmasterdetail_list->SearchWhere <> "") ? " show" : " show"; ?>
<div id="fv0301_bayarmasterdetaillistsrch-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v0301_bayarmasterdetail">
	<div class="ew-basic-search">
<div id="xsr_1" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo TABLE_BASIC_SEARCH ?>" id="<?php echo TABLE_BASIC_SEARCH ?>" class="form-control" value="<?php echo HtmlEncode($v0301_bayarmasterdetail_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo TABLE_BASIC_SEARCH_TYPE ?>" value="<?php echo HtmlEncode($v0301_bayarmasterdetail_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v0301_bayarmasterdetail_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v0301_bayarmasterdetail_list->BasicSearch->getType() == "") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this)"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v0301_bayarmasterdetail_list->BasicSearch->getType() == "=") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'=')"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v0301_bayarmasterdetail_list->BasicSearch->getType() == "AND") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'AND')"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v0301_bayarmasterdetail_list->BasicSearch->getType() == "OR") echo " active"; ?>" href="javascript:void(0);" onclick="ew.setSearchType(this,'OR')"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
</form>
<?php } ?>
<?php } ?>
<?php $v0301_bayarmasterdetail_list->showPageHeader(); ?>
<?php
$v0301_bayarmasterdetail_list->showMessage();
?>
<?php if ($v0301_bayarmasterdetail_list->TotalRecs > 0 || $v0301_bayarmasterdetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v0301_bayarmasterdetail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v0301_bayarmasterdetail">
<form name="fv0301_bayarmasterdetaillist" id="fv0301_bayarmasterdetaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($v0301_bayarmasterdetail_list->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $v0301_bayarmasterdetail_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v0301_bayarmasterdetail">
<div id="gmp_v0301_bayarmasterdetail" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<?php if ($v0301_bayarmasterdetail_list->TotalRecs > 0 || $v0301_bayarmasterdetail->isGridEdit()) { ?>
<table id="tbl_v0301_bayarmasterdetaillist" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v0301_bayarmasterdetail_list->RowType = ROWTYPE_HEADER;

// Render list options
$v0301_bayarmasterdetail_list->renderListOptions();

// Render list options (header, left)
$v0301_bayarmasterdetail_list->ListOptions->render("header", "left");
?>
<?php if ($v0301_bayarmasterdetail->bayarmaster_id->Visible) { // bayarmaster_id ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->bayarmaster_id) == "") { ?>
		<th data-name="bayarmaster_id" class="<?php echo $v0301_bayarmasterdetail->bayarmaster_id->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_bayarmaster_id" class="v0301_bayarmasterdetail_bayarmaster_id"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->bayarmaster_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bayarmaster_id" class="<?php echo $v0301_bayarmasterdetail->bayarmaster_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->bayarmaster_id) ?>',2);"><div id="elh_v0301_bayarmasterdetail_bayarmaster_id" class="v0301_bayarmasterdetail_bayarmaster_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->bayarmaster_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->bayarmaster_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->bayarmaster_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->tahunajaran_id->Visible) { // tahunajaran_id ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->tahunajaran_id) == "") { ?>
		<th data-name="tahunajaran_id" class="<?php echo $v0301_bayarmasterdetail->tahunajaran_id->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_tahunajaran_id" class="v0301_bayarmasterdetail_tahunajaran_id"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->tahunajaran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="tahunajaran_id" class="<?php echo $v0301_bayarmasterdetail->tahunajaran_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->tahunajaran_id) ?>',2);"><div id="elh_v0301_bayarmasterdetail_tahunajaran_id" class="v0301_bayarmasterdetail_tahunajaran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->tahunajaran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->tahunajaran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->tahunajaran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->siswa_id->Visible) { // siswa_id ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->siswa_id) == "") { ?>
		<th data-name="siswa_id" class="<?php echo $v0301_bayarmasterdetail->siswa_id->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_siswa_id" class="v0301_bayarmasterdetail_siswa_id"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->siswa_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="siswa_id" class="<?php echo $v0301_bayarmasterdetail->siswa_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->siswa_id) ?>',2);"><div id="elh_v0301_bayarmasterdetail_siswa_id" class="v0301_bayarmasterdetail_siswa_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->siswa_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->siswa_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->siswa_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->Nomor->Visible) { // Nomor ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->Nomor) == "") { ?>
		<th data-name="Nomor" class="<?php echo $v0301_bayarmasterdetail->Nomor->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_Nomor" class="v0301_bayarmasterdetail_Nomor"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Nomor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nomor" class="<?php echo $v0301_bayarmasterdetail->Nomor->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->Nomor) ?>',2);"><div id="elh_v0301_bayarmasterdetail_Nomor" class="v0301_bayarmasterdetail_Nomor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Nomor->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->Nomor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->Nomor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->Tanggal->Visible) { // Tanggal ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->Tanggal) == "") { ?>
		<th data-name="Tanggal" class="<?php echo $v0301_bayarmasterdetail->Tanggal->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_Tanggal" class="v0301_bayarmasterdetail_Tanggal"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Tanggal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal" class="<?php echo $v0301_bayarmasterdetail->Tanggal->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->Tanggal) ?>',2);"><div id="elh_v0301_bayarmasterdetail_Tanggal" class="v0301_bayarmasterdetail_Tanggal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Tanggal->caption() ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->Tanggal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->Tanggal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->Total->Visible) { // Total ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->Total) == "") { ?>
		<th data-name="Total" class="<?php echo $v0301_bayarmasterdetail->Total->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_Total" class="v0301_bayarmasterdetail_Total"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Total->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Total" class="<?php echo $v0301_bayarmasterdetail->Total->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->Total) ?>',2);"><div id="elh_v0301_bayarmasterdetail_Total" class="v0301_bayarmasterdetail_Total">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->Total->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->Total->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->bayardetail_id->Visible) { // bayardetail_id ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->bayardetail_id) == "") { ?>
		<th data-name="bayardetail_id" class="<?php echo $v0301_bayarmasterdetail->bayardetail_id->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_bayardetail_id" class="v0301_bayarmasterdetail_bayardetail_id"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->bayardetail_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bayardetail_id" class="<?php echo $v0301_bayarmasterdetail->bayardetail_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->bayardetail_id) ?>',2);"><div id="elh_v0301_bayarmasterdetail_bayardetail_id" class="v0301_bayarmasterdetail_bayardetail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->bayardetail_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->bayardetail_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->bayardetail_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->iuran_id->Visible) { // iuran_id ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->iuran_id) == "") { ?>
		<th data-name="iuran_id" class="<?php echo $v0301_bayarmasterdetail->iuran_id->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_iuran_id" class="v0301_bayarmasterdetail_iuran_id"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->iuran_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="iuran_id" class="<?php echo $v0301_bayarmasterdetail->iuran_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->iuran_id) ?>',2);"><div id="elh_v0301_bayarmasterdetail_iuran_id" class="v0301_bayarmasterdetail_iuran_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->iuran_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->iuran_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->iuran_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->Periode1->Visible) { // Periode1 ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->Periode1) == "") { ?>
		<th data-name="Periode1" class="<?php echo $v0301_bayarmasterdetail->Periode1->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_Periode1" class="v0301_bayarmasterdetail_Periode1"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Periode1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode1" class="<?php echo $v0301_bayarmasterdetail->Periode1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->Periode1) ?>',2);"><div id="elh_v0301_bayarmasterdetail_Periode1" class="v0301_bayarmasterdetail_Periode1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Periode1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->Periode1->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->Periode1->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->Periode2->Visible) { // Periode2 ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->Periode2) == "") { ?>
		<th data-name="Periode2" class="<?php echo $v0301_bayarmasterdetail->Periode2->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_Periode2" class="v0301_bayarmasterdetail_Periode2"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Periode2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode2" class="<?php echo $v0301_bayarmasterdetail->Periode2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->Periode2) ?>',2);"><div id="elh_v0301_bayarmasterdetail_Periode2" class="v0301_bayarmasterdetail_Periode2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Periode2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->Periode2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->Periode2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->Keterangan->Visible) { // Keterangan ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->Keterangan) == "") { ?>
		<th data-name="Keterangan" class="<?php echo $v0301_bayarmasterdetail->Keterangan->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_Keterangan" class="v0301_bayarmasterdetail_Keterangan"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Keterangan->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Keterangan" class="<?php echo $v0301_bayarmasterdetail->Keterangan->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->Keterangan) ?>',2);"><div id="elh_v0301_bayarmasterdetail_Keterangan" class="v0301_bayarmasterdetail_Keterangan">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Keterangan->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->Keterangan->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->Keterangan->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v0301_bayarmasterdetail->Jumlah->Visible) { // Jumlah ?>
	<?php if ($v0301_bayarmasterdetail->sortUrl($v0301_bayarmasterdetail->Jumlah) == "") { ?>
		<th data-name="Jumlah" class="<?php echo $v0301_bayarmasterdetail->Jumlah->headerCellClass() ?>"><div id="elh_v0301_bayarmasterdetail_Jumlah" class="v0301_bayarmasterdetail_Jumlah"><div class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Jumlah->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Jumlah" class="<?php echo $v0301_bayarmasterdetail->Jumlah->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event,'<?php echo $v0301_bayarmasterdetail->SortUrl($v0301_bayarmasterdetail->Jumlah) ?>',2);"><div id="elh_v0301_bayarmasterdetail_Jumlah" class="v0301_bayarmasterdetail_Jumlah">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v0301_bayarmasterdetail->Jumlah->caption() ?></span><span class="ew-table-header-sort"><?php if ($v0301_bayarmasterdetail->Jumlah->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($v0301_bayarmasterdetail->Jumlah->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v0301_bayarmasterdetail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v0301_bayarmasterdetail->ExportAll && $v0301_bayarmasterdetail->isExport()) {
	$v0301_bayarmasterdetail_list->StopRec = $v0301_bayarmasterdetail_list->TotalRecs;
} else {

	// Set the last record to display
	if ($v0301_bayarmasterdetail_list->TotalRecs > $v0301_bayarmasterdetail_list->StartRec + $v0301_bayarmasterdetail_list->DisplayRecs - 1)
		$v0301_bayarmasterdetail_list->StopRec = $v0301_bayarmasterdetail_list->StartRec + $v0301_bayarmasterdetail_list->DisplayRecs - 1;
	else
		$v0301_bayarmasterdetail_list->StopRec = $v0301_bayarmasterdetail_list->TotalRecs;
}
$v0301_bayarmasterdetail_list->RecCnt = $v0301_bayarmasterdetail_list->StartRec - 1;
if ($v0301_bayarmasterdetail_list->Recordset && !$v0301_bayarmasterdetail_list->Recordset->EOF) {
	$v0301_bayarmasterdetail_list->Recordset->moveFirst();
	$selectLimit = $v0301_bayarmasterdetail_list->UseSelectLimit;
	if (!$selectLimit && $v0301_bayarmasterdetail_list->StartRec > 1)
		$v0301_bayarmasterdetail_list->Recordset->move($v0301_bayarmasterdetail_list->StartRec - 1);
} elseif (!$v0301_bayarmasterdetail->AllowAddDeleteRow && $v0301_bayarmasterdetail_list->StopRec == 0) {
	$v0301_bayarmasterdetail_list->StopRec = $v0301_bayarmasterdetail->GridAddRowCount;
}

// Initialize aggregate
$v0301_bayarmasterdetail->RowType = ROWTYPE_AGGREGATEINIT;
$v0301_bayarmasterdetail->resetAttributes();
$v0301_bayarmasterdetail_list->renderRow();
while ($v0301_bayarmasterdetail_list->RecCnt < $v0301_bayarmasterdetail_list->StopRec) {
	$v0301_bayarmasterdetail_list->RecCnt++;
	if ($v0301_bayarmasterdetail_list->RecCnt >= $v0301_bayarmasterdetail_list->StartRec) {
		$v0301_bayarmasterdetail_list->RowCnt++;

		// Set up key count
		$v0301_bayarmasterdetail_list->KeyCount = $v0301_bayarmasterdetail_list->RowIndex;

		// Init row class and style
		$v0301_bayarmasterdetail->resetAttributes();
		$v0301_bayarmasterdetail->CssClass = "";
		if ($v0301_bayarmasterdetail->isGridAdd()) {
		} else {
			$v0301_bayarmasterdetail_list->loadRowValues($v0301_bayarmasterdetail_list->Recordset); // Load row values
		}
		$v0301_bayarmasterdetail->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v0301_bayarmasterdetail->RowAttrs = array_merge($v0301_bayarmasterdetail->RowAttrs, array('data-rowindex'=>$v0301_bayarmasterdetail_list->RowCnt, 'id'=>'r' . $v0301_bayarmasterdetail_list->RowCnt . '_v0301_bayarmasterdetail', 'data-rowtype'=>$v0301_bayarmasterdetail->RowType));

		// Render row
		$v0301_bayarmasterdetail_list->renderRow();

		// Render list options
		$v0301_bayarmasterdetail_list->renderListOptions();
?>
	<tr<?php echo $v0301_bayarmasterdetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v0301_bayarmasterdetail_list->ListOptions->render("body", "left", $v0301_bayarmasterdetail_list->RowCnt);
?>
	<?php if ($v0301_bayarmasterdetail->bayarmaster_id->Visible) { // bayarmaster_id ?>
		<td data-name="bayarmaster_id"<?php echo $v0301_bayarmasterdetail->bayarmaster_id->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_bayarmaster_id" class="v0301_bayarmasterdetail_bayarmaster_id">
<span<?php echo $v0301_bayarmasterdetail->bayarmaster_id->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->bayarmaster_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<td data-name="tahunajaran_id"<?php echo $v0301_bayarmasterdetail->tahunajaran_id->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_tahunajaran_id" class="v0301_bayarmasterdetail_tahunajaran_id">
<span<?php echo $v0301_bayarmasterdetail->tahunajaran_id->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->siswa_id->Visible) { // siswa_id ?>
		<td data-name="siswa_id"<?php echo $v0301_bayarmasterdetail->siswa_id->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_siswa_id" class="v0301_bayarmasterdetail_siswa_id">
<span<?php echo $v0301_bayarmasterdetail->siswa_id->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->siswa_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->Nomor->Visible) { // Nomor ?>
		<td data-name="Nomor"<?php echo $v0301_bayarmasterdetail->Nomor->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_Nomor" class="v0301_bayarmasterdetail_Nomor">
<span<?php echo $v0301_bayarmasterdetail->Nomor->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->Nomor->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->Tanggal->Visible) { // Tanggal ?>
		<td data-name="Tanggal"<?php echo $v0301_bayarmasterdetail->Tanggal->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_Tanggal" class="v0301_bayarmasterdetail_Tanggal">
<span<?php echo $v0301_bayarmasterdetail->Tanggal->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->Tanggal->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->Total->Visible) { // Total ?>
		<td data-name="Total"<?php echo $v0301_bayarmasterdetail->Total->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_Total" class="v0301_bayarmasterdetail_Total">
<span<?php echo $v0301_bayarmasterdetail->Total->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->Total->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->bayardetail_id->Visible) { // bayardetail_id ?>
		<td data-name="bayardetail_id"<?php echo $v0301_bayarmasterdetail->bayardetail_id->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_bayardetail_id" class="v0301_bayarmasterdetail_bayardetail_id">
<span<?php echo $v0301_bayarmasterdetail->bayardetail_id->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->bayardetail_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->iuran_id->Visible) { // iuran_id ?>
		<td data-name="iuran_id"<?php echo $v0301_bayarmasterdetail->iuran_id->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_iuran_id" class="v0301_bayarmasterdetail_iuran_id">
<span<?php echo $v0301_bayarmasterdetail->iuran_id->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->iuran_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->Periode1->Visible) { // Periode1 ?>
		<td data-name="Periode1"<?php echo $v0301_bayarmasterdetail->Periode1->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_Periode1" class="v0301_bayarmasterdetail_Periode1">
<span<?php echo $v0301_bayarmasterdetail->Periode1->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->Periode1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->Periode2->Visible) { // Periode2 ?>
		<td data-name="Periode2"<?php echo $v0301_bayarmasterdetail->Periode2->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_Periode2" class="v0301_bayarmasterdetail_Periode2">
<span<?php echo $v0301_bayarmasterdetail->Periode2->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->Periode2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->Keterangan->Visible) { // Keterangan ?>
		<td data-name="Keterangan"<?php echo $v0301_bayarmasterdetail->Keterangan->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_Keterangan" class="v0301_bayarmasterdetail_Keterangan">
<span<?php echo $v0301_bayarmasterdetail->Keterangan->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->Keterangan->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v0301_bayarmasterdetail->Jumlah->Visible) { // Jumlah ?>
		<td data-name="Jumlah"<?php echo $v0301_bayarmasterdetail->Jumlah->cellAttributes() ?>>
<span id="el<?php echo $v0301_bayarmasterdetail_list->RowCnt ?>_v0301_bayarmasterdetail_Jumlah" class="v0301_bayarmasterdetail_Jumlah">
<span<?php echo $v0301_bayarmasterdetail->Jumlah->viewAttributes() ?>>
<?php echo $v0301_bayarmasterdetail->Jumlah->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v0301_bayarmasterdetail_list->ListOptions->render("body", "right", $v0301_bayarmasterdetail_list->RowCnt);
?>
	</tr>
<?php
	}
	if (!$v0301_bayarmasterdetail->isGridAdd())
		$v0301_bayarmasterdetail_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<?php if (!$v0301_bayarmasterdetail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v0301_bayarmasterdetail_list->Recordset)
	$v0301_bayarmasterdetail_list->Recordset->Close();
?>
<?php if (!$v0301_bayarmasterdetail->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v0301_bayarmasterdetail->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php if (!isset($v0301_bayarmasterdetail_list->Pager)) $v0301_bayarmasterdetail_list->Pager = new PrevNextPager($v0301_bayarmasterdetail_list->StartRec, $v0301_bayarmasterdetail_list->DisplayRecs, $v0301_bayarmasterdetail_list->TotalRecs, $v0301_bayarmasterdetail_list->AutoHidePager) ?>
<?php if ($v0301_bayarmasterdetail_list->Pager->RecordCount > 0 && $v0301_bayarmasterdetail_list->Pager->Visible) { ?>
<div class="ew-pager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ew-prev-next"><div class="input-group input-group-sm">
<div class="input-group-prepend">
<!-- first page button -->
	<?php if ($v0301_bayarmasterdetail_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerFirst") ?>" href="<?php echo $v0301_bayarmasterdetail_list->pageUrl() ?>start=<?php echo $v0301_bayarmasterdetail_list->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!-- previous page button -->
	<?php if ($v0301_bayarmasterdetail_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerPrevious") ?>" href="<?php echo $v0301_bayarmasterdetail_list->pageUrl() ?>start=<?php echo $v0301_bayarmasterdetail_list->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
</div>
<!-- current page number -->
	<input class="form-control" type="text" name="<?php echo TABLE_PAGE_NO ?>" value="<?php echo $v0301_bayarmasterdetail_list->Pager->CurrentPage ?>">
<div class="input-group-append">
<!-- next page button -->
	<?php if ($v0301_bayarmasterdetail_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerNext") ?>" href="<?php echo $v0301_bayarmasterdetail_list->pageUrl() ?>start=<?php echo $v0301_bayarmasterdetail_list->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!-- last page button -->
	<?php if ($v0301_bayarmasterdetail_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->phrase("PagerLast") ?>" href="<?php echo $v0301_bayarmasterdetail_list->pageUrl() ?>start=<?php echo $v0301_bayarmasterdetail_list->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $v0301_bayarmasterdetail_list->Pager->PageCount ?></span>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($v0301_bayarmasterdetail_list->Pager->RecordCount > 0) { ?>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $v0301_bayarmasterdetail_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $v0301_bayarmasterdetail_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $v0301_bayarmasterdetail_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v0301_bayarmasterdetail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v0301_bayarmasterdetail_list->TotalRecs == 0 && !$v0301_bayarmasterdetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v0301_bayarmasterdetail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v0301_bayarmasterdetail_list->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$v0301_bayarmasterdetail->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$v0301_bayarmasterdetail_list->terminate();
?>