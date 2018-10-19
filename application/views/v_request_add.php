<?php $this->load->view('header'); ?>

	<h1><?=$title?></h1>
	<h2>Hai, <?php echo $this->session->userdata("access"); ?> <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>


<?php $this->load->view('menu'); ?>

    <form action="<?php echo base_url(). 'request/add_data'; ?>" method="post">
        <table style="margin:20px auto;">
            <tr>
              <td>Kode</td>
              <td><input type="text" name="kode"></td>
            </tr>
            <tr>
              <td>Perangkat IT</td>
              <td><input type="text" name="perangkat"></td>
            </tr>
            <tr>
              <td>Kerusakan</td>
              <td><input type="text" name="kerusakan"></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" value="Request"></td>
            </tr>
        </table>
    </form>
</body>
</html>
