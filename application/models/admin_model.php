<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_model{
    public function __construct()
    {
      $this->load->database();
      $this->load->library('Excel');

    }

    public function getUserAccount()
    {
      $where = array('privilleges' => 'user' );
      $query = $this->db->get_where('account',$where);
      return $query->result();
    }

    public function getSelectedAccount($id)
    {
      $where = array('id' => $id );
      $query = $this->db->get_where('account',$where);
      return $query->row();
    }

    public function updateAccount($id)
    {
      $where = array('id' => $id);
      $data = array(
        'pic_id' => $this->input->post('pic_id'),
        'username' => $this->input->post('username'),
        'fullname' => $this->input->post('fullname'),
        'email' => $this->input->post('email')
       );

       $this->db->where($where);
       $this->db->update('account',$data);
    }

    public function resetPasswordAccount($id)
    {
      $where = array('id' => $id);
      $random = rand(1000,9999);
      $data = array('password' => md5($random));
      $this->db->where($where);
      $this->db->update('account',$data);
      return $random;
    }

    public function deleteAccount($id)
    {
      $where = array('id' => $id );
      $this->db->delete('account',$where);
    }

    public function createSingleAccount()
    {
      $data = array(
        'pic_id' => $this->input->post('pic_id')
       );
       $this->db->insert('account',$data);
    }


    public function uploadAccount()
    {
      $objReader = PHPExcel_IOFactory::createReader('Excel5');
      $objReader->setLoadSheetsOnly('user');
      $objPHPExcel = $objReader->load($_FILES['files']['tmp_name']);
      foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $worksheetTitle     = $worksheet->getTitle();
        $highestRow         = $worksheet->getHighestRow();
        $highestColumn      = $worksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $nrColumns = ord($highestColumn) - 64;
        $i = array();
        $i['error_status'] = 0;
        $i['rows'] = 0;
        for ($row = 2; $row <= $highestRow; ++$row) {
          $val=array();
          for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val[] = ucwords(strtolower(preg_replace('/[^A-Za-z0-9\. :-]/', '', $cell->getValue())));
          }

          if (($val[1] == '') || ($val[1] == null)){
            $i['error_status']=-2;
            return $i;
            break;

          } elseif(($val[2] == '') || ($val[2] == null)){
            $i['error_status']=-2;
            return $i;
            break;
          }
          if($i['error_status']==0) {
            $data = array(
              'pic_id' => $val[1],
              'fullname' => $val[2],
              'privilleges' => 'user'
            );
            $this->db->insert('account',$data);
          } else {
            $i['error_status']=-1;
            return $i;
            break;
          }

          if ($i['error_status']==-1){
            return $i;
            //mysql_query('ROLLBACK');
            break;
          }else{
            $i['rows']++;
            //var_dump($i);
          }
        }
        $startPeriod = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1, 2)->getValue();
        $endPeriod = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2, $highestRow)->getValue();
        $i['start_period'] = $startPeriod;
        $i['end_period'] = $endPeriod;
      }
      return $i;
    }

    public function addPraktikum()
    {
      $data = array(
        'praktikum_name' => $this->input->post('praktikum_name'),
        'year' => $this->input->post('year'),
        'semester' => $this->input->post('semester'),
        'id_admin' => $this->session->userdata['id'],
        'id_koor' => $this->input->post('id_koor'),
       );
       $this->db->insert('praktikum',$data);
       return $this->db->insert_id();
    }

    public function getPraktikum()
    {
      $query = $this->db->get('view_praktikum');
      return $query->result();
    }

    public function getSelectedPraktikum($id)
    {
      $where = array('id' => $id );
      $query = $this->db->get_where('view_praktikum',$where);
      return $query->row();
    }

    public function updatePraktikum($id)
    {
      $where = array('id' => $id );
      $data = array(
        'praktikum_name' => $this->input->post('praktikum_name'),
        'year' => $this->input->post('year'),
        'semester' => $this->input->post('semester'),
        'id_koor' => $this->input->post('id_koor')
       );
       $this->db->where($where);
       $this->db->update('praktikum',$data);
    }

    public function deletePraktikum($id)
    {
      $where = array('id' => $id );
      $this->db->delete('praktikum',$where);
    }

    public function updateUserRole($id_praktikum, $id_user, $role)
    {
      $where = array(
        'id_praktikum' => $id_praktikum,
        'id_user' => $id_user,
      );
      $data = array('role' => $role);

      $this->db->where($where);
      $this->db->update($data);
    }

    public function createUserRole($id_praktikum, $id_user, $role)
    {
      $data = array(
        'id_praktikum' => $id_praktikum,
        'id_user' => $id_user,
        'role' => $role
        );

      $this->db->insert('praktikum_role',$data);
    }

}
?>
