<ul class="sidebar-menu">
    <li class="menu-header">MENU</li>
    <!-- area menu dinamis -->
    <?php
    $setting = $this->db->get_where('t_setting', array('id_setting' => 1))->row_array();
    if ($setting['value'] == 'ya') {
    	# cari level user
    	$id_role = $this->session->userdata('id_role');
    	$sql_menu = "SELECT *
    				FROM t_menu
    				WHERE id_menu in(SELECT id_menu FROM t_hak_akses WHERE id_role = $id_role) AND is_main_menu = 0 AND is_aktif ='y'";
    }else{
    	$sql_menu = "SELECT * FROM t_menu WHERE is_aktif = 'y' AND is_main_menu = 0";
    }
    $main_menu = $this->db->query($sql_menu)->result();
    foreach ($main_menu as $menu) {
    	# cek sub menu
    	$this->db->where('is_main_menu', $menu->id_menu);
    	$this->db->where('is_aktif','y');
    	$submenu = $this->db->get('t_menu');
    	if ($submenu->num_rows()>0) {
    		# tampilkan menu
    		echo "<li>
    				<a href='javascript:void(0)' class='has-dropdown'>
    				<i class='$menu->icon'></i><span>".$menu->title."</span>
    					
    				</a>
    				<ul class='menu-dropdown'>";
			foreach ($submenu->result() as $sub) {
				echo "<li>".anchor($sub->url,"<i class='$sub->icon'></i><span>".$sub->title)."</span></li>";
			}
			echo "</ul>
				</li>";
    	}else{
    		echo "<li>";
    		echo anchor($menu->url,"<i class='$menu->icon'></i><span>".$menu->title)."</span>";
    		echo "</li>";
    	}
    }
    ?>

    <li>
      <a href="<?php echo base_url().'logout';?>"><i class="ion ion-log-out"></i>Logout</a>
    </li>
  </ul>