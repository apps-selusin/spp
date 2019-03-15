<?php
namespace PHPMaker2019\spp_prj;
?>
<?php if ($t0301_bayarmaster->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t0301_bayarmastermaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t0301_bayarmaster->Nomor->Visible) { // Nomor ?>
		<tr id="r_Nomor">
			<td class="<?php echo $t0301_bayarmaster->TableLeftColumnClass ?>"><?php echo $t0301_bayarmaster->Nomor->caption() ?></td>
			<td<?php echo $t0301_bayarmaster->Nomor->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Nomor">
<span<?php echo $t0301_bayarmaster->Nomor->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Nomor->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t0301_bayarmaster->Tanggal->Visible) { // Tanggal ?>
		<tr id="r_Tanggal">
			<td class="<?php echo $t0301_bayarmaster->TableLeftColumnClass ?>"><?php echo $t0301_bayarmaster->Tanggal->caption() ?></td>
			<td<?php echo $t0301_bayarmaster->Tanggal->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Tanggal">
<span<?php echo $t0301_bayarmaster->Tanggal->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Tanggal->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t0301_bayarmaster->tahunajaran_id->Visible) { // tahunajaran_id ?>
		<tr id="r_tahunajaran_id">
			<td class="<?php echo $t0301_bayarmaster->TableLeftColumnClass ?>"><?php echo $t0301_bayarmaster->tahunajaran_id->caption() ?></td>
			<td<?php echo $t0301_bayarmaster->tahunajaran_id->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_tahunajaran_id">
<span<?php echo $t0301_bayarmaster->tahunajaran_id->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->tahunajaran_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t0301_bayarmaster->siswa_id->Visible) { // siswa_id ?>
		<tr id="r_siswa_id">
			<td class="<?php echo $t0301_bayarmaster->TableLeftColumnClass ?>"><?php echo $t0301_bayarmaster->siswa_id->caption() ?></td>
			<td<?php echo $t0301_bayarmaster->siswa_id->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_siswa_id">
<span<?php echo $t0301_bayarmaster->siswa_id->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->siswa_id->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t0301_bayarmaster->Total->Visible) { // Total ?>
		<tr id="r_Total">
			<td class="<?php echo $t0301_bayarmaster->TableLeftColumnClass ?>"><?php echo $t0301_bayarmaster->Total->caption() ?></td>
			<td<?php echo $t0301_bayarmaster->Total->cellAttributes() ?>>
<span id="el_t0301_bayarmaster_Total">
<span<?php echo $t0301_bayarmaster->Total->viewAttributes() ?>>
<?php echo $t0301_bayarmaster->Total->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>