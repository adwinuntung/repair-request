<?php $this->load->view('header'); ?>

	<h1><?=$title?></h1>
	<h2>Hai, <?php echo $this->session->userdata("access"); ?> <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>


<?php $this->load->view('menu'); ?>

<div class="filter_history">
		<form action="<?php echo base_url(). 'history/filter_date'; ?>" method="post">
			<div class="separator">Filter Date</div>
			<input class="separator" type="date" name="filter_from">
			<div class="separator"> - </div>
			<input class="separator" type="date" name="filter_to">
			<input class="separator" type="submit" value="Filter">
		</form>
</div>
<br/>
<?php if($filter): echo '<h3>Filter : ' .$filter. '</h3>'; endif; ?>
<br/>

<div class="box">
		<div class="wrap-box title">
				<div class="list-box-history">Kode</div>
				<div class="list-box-history">Perangkat IT</div>
				<div class="list-box-history">Kerusakan</div>
				<div class="list-box-history">User Request</div>
				<div class="list-box-history">Request Date</div>
				<div class="list-box-history">Process Date</div>
				<div class="list-box-history">Clear Date</div>
				<div class="list-box-history">User Repair</div>
				<div class="list-box-history">Status</div>
		</div>
		<?php
				$no = 0;

				foreach ( $get_data->result() as $row ) { ?>
						<div class="wrap-box">
								<div class="list-box-history"><?=$row->kode;?></div>
								<div class="list-box-history"><?=$row->perangkat;?></div>
								<div class="list-box-history"><?=$row->kerusakan;?></div>
								<div class="list-box-history"><?=$row->user_create;?></div>
								<div class="list-box-history"><?=$row->create_date;?></div>
								<div class="list-box-history"><?=$row->process_date;?></div>
								<div class="list-box-history"><?=$row->done_date;?></div>
								<div class="list-box-history"><?=$row->user_repair;?></div>
								<div class="list-box-history"><?=$row->status;?></div>
						</div>
				<?php } ?>
</div>

</body>
</html>
