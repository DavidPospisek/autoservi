    <?php
   class autoserviscontroller extends CI_Controller {
  public function menu() {
  $data['polozky'] = $this->autoservismodel->get_menu_polozky();
  $this->load->view('layout/layout_main', $data);
         }
}

