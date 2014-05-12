<h3>..:: List Tamu::..</h3>
<?php echo anchor('tamu_client/form','add tamu')?><br />
<table border="1">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>#</th>
    </tr>
    <?php foreach($getTamu as $row){?>
    <tr>
        <td><?php echo $row->nama?></td>
        <td><?php echo $row->email?></td>
        <td><?php echo $row->pesan?></td>
        <td><?php echo anchor('tamu_client/edit/'.$row->id,'Edit')?> | <?php echo anchor('tamu_client/delete/'.$row->id,'Delete',array('onclick' => "return confirm('Yakin?')"))?></td>
    </tr>
    <?php } ?>
</table>