<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_model{
    public function __construct()
    {
      $this->load->database();
      $this->load->library('Excel');
    }

    public function uploadPraktikan($id)
    {
      $objReader = PHPExcel_IOFactory::createReader('Excel5');
//      $objReader->setLoadSheetsOnly('praktikan');
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

          if (($val[1] == '') || ($val[1] == null) || ($val[2] == '') || ($val[2] == null)){
            $i['error_status']=-2;
            return $i;
            break;
          }


          if($i['error_status']==0) {
            $where = array(
              'pic_id' => $val[1],
            );
            $query1 = $this->db->get_where('account',$where);
            $where2 = array(
              'id_user' => $query1->row('id'),
              'id_praktikum' => $id
            );

            $query2 = $this->db->get_where('praktikum_role',$where2);
            if (!$query2->num_rows()>0) {
              $data = array(
                'id_praktikum' => $id,
                'id_user' => $query1->row('id'),
                'role' => 2,
                'shift' => 0,
                'kelompok'=> 0
              );
              $this->db->insert('praktikum_role',$data);
            } else{
              continue;
            }

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

    public function getListPraktikan($id)
    {
      $where = array(
        'id_praktikum' => $id,
        'role' => 2
       );
      $query = $this->db->get_where('view_praktikan_role',$where);
      return $query->result();
    }

    public function getListAssisten($id)
    {
      $where = array(
        'id_praktikum' => $id,
        'role' => 3
       );
      $query = $this->db->get_where('view_praktikan_role',$where);
      return $query->result();
    }

    public function addModul($id)
    {
      $data = array(
        'id_praktikum' => $id,
        'modul' => $this->input->post('modul'),
        'nama_modul' => $this->input->post('nama_modul'),
        'id_asisten_1' => $this->input->post('id_asisten_1'),
        'id_asisten_2' => $this->input->post('id_asisten_2'),
        'tanggal' => $this->input->post('tanggal')
       );
       $this->db->insert('modul',$data);
    }

    public function getUserAccount()
    {
      $where = array('privilleges' => 'user' );
      $query = $this->db->get_where('account',$where);
      return $query->result();
    }

    public function deleteRole($id)
    {
      $where = array(
        'id_praktikum' => $id,
        'id_user' => $this->input->post('id_user'),
        'role' => 2
       );
       $this->db->delete('praktikum_role',$where);
    }

    public function addRole($id)
    {
      $data = array(
        'id_praktikum' => $id,
        'id_user' => $this->input->post('id_user'),
        'role' => $this->input->post('role')
       );
       $this->db->insert('praktikum_role',$data);
    }

    public function deleteSelectedRole($id)
    {
      $where = array('id' => $id );
      $this->db->delete('praktikum_role',$where);
    }

    public function getSelectedRole($id)
    {
      $where = array('id' => $id );
      $query = $this->db->get_where('praktikum_role',$where);
      return $query->row();
    }

    public function getModul($id)
    {
      $where = array('id_praktikum' => $id );
      $query = $this->db->get_where('view_modul',$where);
      return $query->result();
    }



}

 ?>
