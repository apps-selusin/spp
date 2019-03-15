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
WriteHeader(FALSE, "utf-8");

// Create page object
$t0302_bayardetail_preview = new t0302_bayardetail_preview();

// Run the page
$t0302_bayardetail_preview->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t0302_bayardetail_preview->Page_Render();
?>
<?php $t0302_bayardetail_preview->showPageHeader(); ?>
<div class="card ew-grid t0302_bayardetail"><!-- .card -->
<?php if ($t0302_bayardetail_preview->TotalRecs > 0) { ?>
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
	<thead><!-- Table header -->
		<tr class="ew-table-header">
<?php

// Render list options
$t0302_bayardetail_preview->renderListOptions();

// Render list options (header, left)
$t0302_bayardetail_preview->ListOptions->render("header", "left");
?>
<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
	<?php if ($t0302_bayardetail->SortUrl($t0302_bayardetail->iuran_id) == "") { ?>
		<th class="<?php echo $t0302_bayardetail->iuran_id->headerCellClass() ?>"><?php echo $t0302_bayardetail->iuran_id->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0302_bayardetail->iuran_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0302_bayardetail->iuran_id->Name ?>" data-sort-order="<?php echo $t0302_bayardetail_preview->SortField == $t0302_bayardetail->iuran_id->Name && $t0302_bayardetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0302_bayardetail->iuran_id->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0302_bayardetail_preview->SortField == $t0302_bayardetail->iuran_id->Name) { ?><?php if ($t0302_bayardetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0302_bayardetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
	<?php if ($t0302_bayardetail->SortUrl($t0302_bayardetail->Periode1) == "") { ?>
		<th class="<?php echo $t0302_bayardetail->Periode1->headerCellClass() ?>"><?php echo $t0302_bayardetail->Periode1->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0302_bayardetail->Periode1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0302_bayardetail->Periode1->Name ?>" data-sort-order="<?php echo $t0302_bayardetail_preview->SortField == $t0302_bayardetail->Periode1->Name && $t0302_bayardetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode1->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0302_bayardetail_preview->SortField == $t0302_bayardetail->Periode1->Name) { ?><?php if ($t0302_bayardetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0302_bayardetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
	<?php if ($t0302_bayardetail->SortUrl($t0302_bayardetail->Periode2) == "") { ?>
		<th class="<?php echo $t0302_bayardetail->Periode2->headerCellClass() ?>"><?php echo $t0302_bayardetail->Periode2->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0302_bayardetail->Periode2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0302_bayardetail->Periode2->Name ?>" data-sort-order="<?php echo $t0302_bayardetail_preview->SortField == $t0302_bayardetail->Periode2->Name && $t0302_bayardetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Periode2->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0302_bayardetail_preview->SortField == $t0302_bayardetail->Periode2->Name) { ?><?php if ($t0302_bayardetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0302_bayardetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
	<?php if ($t0302_bayardetail->SortUrl($t0302_bayardetail->Keterangan) == "") { ?>
		<th class="<?php echo $t0302_bayardetail->Keterangan->headerCellClass() ?>"><?php echo $t0302_bayardetail->Keterangan->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0302_bayardetail->Keterangan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0302_bayardetail->Keterangan->Name ?>" data-sort-order="<?php echo $t0302_bayardetail_preview->SortField == $t0302_bayardetail->Keterangan->Name && $t0302_bayardetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Keterangan->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0302_bayardetail_preview->SortField == $t0302_bayardetail->Keterangan->Name) { ?><?php if ($t0302_bayardetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0302_bayardetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
	<?php if ($t0302_bayardetail->SortUrl($t0302_bayardetail->Jumlah) == "") { ?>
		<th class="<?php echo $t0302_bayardetail->Jumlah->headerCellClass() ?>"><?php echo $t0302_bayardetail->Jumlah->caption() ?></th>
	<?php } else { ?>
		<th class="<?php echo $t0302_bayardetail->Jumlah->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?php echo $t0302_bayardetail->Jumlah->Name ?>" data-sort-order="<?php echo $t0302_bayardetail_preview->SortField == $t0302_bayardetail->Jumlah->Name && $t0302_bayardetail_preview->SortOrder == "ASC" ? "DESC" : "ASC" ?>"><div class="ew-table-header-btn">
		<span class="ew-table-header-caption"><?php echo $t0302_bayardetail->Jumlah->caption() ?></span>
		<span class="ew-table-header-sort"><?php if ($t0302_bayardetail_preview->SortField == $t0302_bayardetail->Jumlah->Name) { ?><?php if ($t0302_bayardetail_preview->SortOrder == "ASC") { ?><i class="fa fa-sort-up ew-sort-up"></span><?php } elseif ($t0302_bayardetail_preview->SortOrder == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?><?php } ?></span>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t0302_bayardetail_preview->ListOptions->render("header", "right");
?>
		</tr>
	</thead>
	<tbody><!-- Table body -->
<?php
$t0302_bayardetail_preview->RecCount = 0;
$t0302_bayardetail_preview->RowCnt = 0;
while ($t0302_bayardetail_preview->Recordset && !$t0302_bayardetail_preview->Recordset->EOF) {

	// Init row class and style
	$t0302_bayardetail_preview->RecCount++;
	$t0302_bayardetail_preview->RowCnt++;
	$t0302_bayardetail_preview->CssStyle = "";
	$t0302_bayardetail_preview->loadListRowValues($t0302_bayardetail_preview->Recordset);

	// Render row
	$t0302_bayardetail_preview->RowType = ROWTYPE_PREVIEW; // Preview record
	$t0302_bayardetail_preview->resetAttributes();
	$t0302_bayardetail_preview->renderListRow();

	// Render list options
	$t0302_bayardetail_preview->renderListOptions();
?>
	<tr<?php echo $t0302_bayardetail_preview->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t0302_bayardetail_preview->ListOptions->render("body", "left", $t0302_bayardetail_preview->RowCnt);
?>
<?php if ($t0302_bayardetail->iuran_id->Visible) { // iuran_id ?>
		<!-- iuran_id -->
		<td<?php echo $t0302_bayardetail->iuran_id->cellAttributes() ?>>
<span<?php echo $t0302_bayardetail->iuran_id->viewAttributes() ?>>
<?php echo $t0302_bayardetail->iuran_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t0302_bayardetail->Periode1->Visible) { // Periode1 ?>
		<!-- Periode1 -->
		<td<?php echo $t0302_bayardetail->Periode1->cellAttributes() ?>>
<span<?php echo $t0302_bayardetail->Periode1->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t0302_bayardetail->Periode2->Visible) { // Periode2 ?>
		<!-- Periode2 -->
		<td<?php echo $t0302_bayardetail->Periode2->cellAttributes() ?>>
<span<?php echo $t0302_bayardetail->Periode2->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Periode2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t0302_bayardetail->Keterangan->Visible) { // Keterangan ?>
		<!-- Keterangan -->
		<td<?php echo $t0302_bayardetail->Keterangan->cellAttributes() ?>>
<span<?php echo $t0302_bayardetail->Keterangan->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Keterangan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($t0302_bayardetail->Jumlah->Visible) { // Jumlah ?>
		<!-- Jumlah -->
		<td<?php echo $t0302_bayardetail->Jumlah->cellAttributes() ?>>
<span<?php echo $t0302_bayardetail->Jumlah->viewAttributes() ?>>
<?php echo $t0302_bayardetail->Jumlah->getViewValue() ?></span>
</td>
<?php } ?>
<?php

// Render list options (body, right)
$t0302_bayardetail_preview->ListOptions->render("body", "right", $t0302_bayardetail_preview->RowCnt);
?>
	</tr>
<?php
	$t0302_bayardetail_preview->Recordset->MoveNext();
}
?>
	</tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<?php } ?>
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?php if ($t0302_bayardetail_preview->TotalRecs > 0) { ?>
<?php if (!isset($t0302_bayardetail_preview->Pager)) $t0302_bayardetail_preview->Pager = new PrevNextPager($t0302_bayardetail_preview->StartRec, $t0302_bayardetail_preview->DisplayRecs, $t0302_bayardetail_preview->TotalRecs) ?>
<?php if ($t0302_bayardetail_preview->Pager->RecordCount > 0 && $t0302_bayardetail_preview->Pager->Visible) { ?>
<div class="ew-pager"><div class="ew-prev-next"><div class="btn-group btn-group-sm ew-btn-group">
<!--first page button-->
	<?php if ($t0302_bayardetail_preview->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerFirst") ?>" data-start="<?php echo $t0302_bayardetail_preview->Pager->FirstButton->Start ?>"><i class="icon-first ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><i class="icon-first ew-icon"></i></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($t0302_bayardetail_preview->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerPrevious") ?>" data-start="<?php echo $t0302_bayardetail_preview->Pager->PrevButton->Start ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><i class="icon-prev ew-icon"></i></a>
	<?php } ?>
<!--next page button-->
	<?php if ($t0302_bayardetail_preview->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerNext") ?>" data-start="<?php echo $t0302_bayardetail_preview->Pager->NextButton->Start ?>"><i class="icon-next ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><i class="icon-next ew-icon"></i></a>
	<?php } ?>
<!--last page button-->
	<?php if ($t0302_bayardetail_preview->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default" title="<?php echo $Language->Phrase("PagerLast") ?>" data-start="<?php echo $t0302_bayardetail_preview->Pager->LastButton->Start ?>"><i class="icon-last ew-icon"></i></a>
	<?php } else { ?>
	<a class="btn btn-default disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><i class="icon-last ew-icon"></i></a>
	<?php } ?>
</div></div></div>
<div class="ew-pager ew-rec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $t0302_bayardetail_preview->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $t0302_bayardetail_preview->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $t0302_bayardetail_preview->Pager->RecordCount ?></span>
</div>
<?php } ?>
<?php } else { ?>
<div class="ew-detail-count"><?php echo $Language->Phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
	foreach ($t0302_bayardetail_preview->OtherOptions as &$option)
		$option->render("body");
?>
</div>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
</div><!-- /.card -->
<?php
$t0302_bayardetail_preview->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php
if ($t0302_bayardetail_preview->Recordset)
	$t0302_bayardetail_preview->Recordset->Close();

// Output
$content = ob_get_contents();
ob_end_clean();
echo ConvertToUtf8($content);
?>
<?php
$t0302_bayardetail_preview->terminate();
?>