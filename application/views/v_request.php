<?php $this->load->view('header'); ?>

	<h1><?=$title?></h1>
	<h2>Hai, <?php echo $this->session->userdata("access"); ?> <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>


<?php $this->load->view('menu'); ?>

<div class="menu_crud">
    <a href="<?=$link_url?>"><?=$link_text?></a>
</div>



    <div class="box">
        <div class="wrap-box title">
            <div class="list-box-request">Kode</div>
            <div class="list-box-request">Perangkat IT</div>
            <div class="list-box-request">Kerusakan</div>
            <div class="list-box-request">Create Date</div>
            <div class="list-box-request">Status</div>
        </div>
        <?php
            $no = 0;

            foreach ( $get_data->result() as $row ) { ?>
                <div class="wrap-box">
                    <div class="list-box-request"><?=$row->kode;?></div>
                    <div class="list-box-request"><?=$row->perangkat;?></div>
                    <div class="list-box-request"><?=$row->kerusakan;?></div>
                    <div class="list-box-request"><?=$row->create_date;?></div>
                    <div class="list-box-request"><?=$row->status;?></div> 
                </div>
            <?php } ?>
    </div>

</body>
</html>
