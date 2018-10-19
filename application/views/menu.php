<div id="menu">
  <ul>
    <li><a href="<?php echo base_url() ?>admin">Dashboard</a></li>
    <li><a href="<?php echo base_url() ?>request">Repair Request</a></li>
    <?php if($this->session->userdata("access") != 'Employee'): ?>
    <li><a href="<?php echo base_url() ?>process">Repair Process</a></li>
    <li><a href="<?php echo base_url() ?>history">History</a></li>
    <?php endif; ?>
  </ul>
</div>
