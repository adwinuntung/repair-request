<?php $this->load->view('header'); ?>

	<h1><?=$title?></h1>
	<h2>Hai, <?php echo $this->session->userdata("access"); ?> <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>


<?php $this->load->view('menu'); ?>

<?php foreach($get_data as $row): ?>
    <form action="<?php echo base_url(). 'process/process_edit'; ?>" method="post">
        <table style="margin:20px auto;">
            <tr>
              <td>Perangkat IT : </td>
              <td><?=$row->perangkat;?></td>
            </tr>
            <tr>
              <td>Kerusakan : </td>
              <td><?=$row->kerusakan;?></td>
            </tr>
            <tr>
              <td>Create Date : </td>
              <td><?=$row->create_date;?></td>
            </tr>
            <tr>
              <td>User Request : </td>
              <td><?=$row->user_create;?></td>
            </tr>
            <tr>
              <td>User Repair : </td>
              <td><input type="text" name="user_repair"></td>
            </tr>
            <tr>
              <td></td>
              <input type="hidden" name="id" value="<?php echo set_value('id',$row->id); ?>" />
              <td><input type="submit" value="Proccess"></td>
            </tr>
        </table>
    </form>
<?php endforeach; ?>
</body>
</html>
