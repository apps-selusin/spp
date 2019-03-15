<?php
namespace PHPMaker2019\spp_prj;
?>
<?php if ($t0201_siswa->Visible) { ?>
<div class="ew-master-div">
<table id="tbl_t0201_siswamaster" class="table ew-view-table ew-master-table ew-vertical">
	<tbody>
<?php if ($t0201_siswa->NIS->Visible) { // NIS ?>
		<tr id="r_NIS">
			<td class="<?php echo $t0201_siswa->TableLeftColumnClass ?>"><?php echo $t0201_siswa->NIS->caption() ?></td>
			<td<?php echo $t0201_siswa->NIS->cellAttributes() ?>>
<span id="el_t0201_siswa_NIS">
<span<?php echo $t0201_siswa->NIS->viewAttributes() ?>>
<?php echo $t0201_siswa->NIS->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($t0201_siswa->Nama->Visible) { // Nama ?>
		<tr id="r_Nama">
			<td class="<?php echo $t0201_siswa->TableLeftColumnClass ?>"><?php echo $t0201_siswa->Nama->caption() ?></td>
			<td<?php echo $t0201_siswa->Nama->cellAttributes() ?>>
<span id="el_t0201_siswa_Nama">
<span<?php echo $t0201_siswa->Nama->viewAttributes() ?>>
<?php echo $t0201_siswa->Nama->getViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
</div>
<?php } ?>