<?php $this->load->view('header'); ?>

	<h1><?=$title?></h1>
	<h2>Hai, <?php echo $this->session->userdata("access"); ?> <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>


<?php $this->load->view('menu'); ?>



<?php if(isset($get_api)): ?>
    <div class="box">
        <div class="wrap-box title">
            <div class="list-box">Alias</div>
            <div class="list-box">Location</div>
            <div class="list-box">Uptime</div>
            <div class="list-box">Status</div>
        </div>
        <?php
            $no = 0;

            foreach ( $get_api as $row ) : ?>
                <div class="wrap-box">
                    <div class="list-box"><?=$row['alias']?></div>
                    <div class="list-box"><?=$row['location']?></div>
                    <div class="list-box"><?=$row['uptime']?></div>
                    <div class="list-box"><?=$row['status']?></div>
                </div>
            <?php endforeach; ?>
    </div>
<?php endif; ?>

</body>
</html>
