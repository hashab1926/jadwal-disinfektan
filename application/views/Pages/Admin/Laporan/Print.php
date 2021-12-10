<table width=100% cellpadding=5 border=1 style="border-collapse:collapse">
	<thead>
		<tr style="background:#222; color:white">
			<th width=2%>NO</th>
			<th width="40%">Nama Petugas</th>
			<th width="30%">Jadwal</th>
			<th>Total Penyemprotan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$total = 0;
		foreach ($data as $key => $item) :
			$total += $item["total_disinfektan"];
		?>
			<tr>
				<td style="text-align:center"><?= $key + 1 ?></td>
				<td><?= $item['nama_petugas'] ?></td>
				<td><?= $item['jadwal'] . " jam " . $item['jam_range'] ?></td>
				<td style="text-align:center"><?= number_format($item["total_disinfektan"], 0) ?> kali</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan=3 style="text-align:center"> <b>TOTAL KESELURUHAN PENYEMPROTAN</b></td>
			<td style="text-align:center"><b><?= number_format($total, 0) ?> kali</b></td>
		</tr>
	</tfoot>
</table>
