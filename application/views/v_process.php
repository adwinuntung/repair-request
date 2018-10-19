<?php $this->load->view('header'); ?>

	<h1><?=$title?></h1>
	<h2>Hai, <?php echo $this->session->userdata("access"); ?> <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>


<?php $this->load->view('menu'); ?>


    <div class="box">
        <div class="wrap-box title">
            <div class="list-box-process">Kode</div>
            <div class="list-box-process">Perangkat IT</div>
            <div class="list-box-process">Kerusakan</div>
            <div class="list-box-process">Status</div>
            <div class="list-box-process">Process Date</div>
            <div class="list-box-process">Action</div>
        </div>
        <?php
            $no = 0;

            foreach ( $get_data->result() as $row ) { ?>
                <div class="wrap-box">
                    <div class="list-box-process"><?=$row->kode;?></div>
                    <div class="list-box-process"><?=$row->perangkat;?></div>
                    <div class="list-box-process"><?=$row->kerusakan;?></div>
                    <div class="list-box-process"><?=$row->status;?></div>
                    <div class="list-box-process"><?=$row->process_date;?></div>
                    <div class="list-box-process">
                      <?php
                          if($row->status == 'Menunggu Antrian'):
                      ?>
                              <a href="<?php echo base_url('process/process_edit/'.$row->id); ?>">Proses</a>
                      <?php
                          elseif($row->status == 'Proses Perbaikan'):
                      ?>
                              <a href="<?php echo base_url('process/process_done/'.$row->id); ?>">Done</a>
                      <?php
                    endif;
                      ?>
                    </div>
                </div>
            <?php } ?>
    </div>

</body>
</html>
