<?php

    class Personel extends CI_Controller{

        public function index(){
            $rows = $this->db->get("personel")->result();

            $viewData = array("rows" => $rows);

            //Veritabanındaki verileri "viewData"ya çekmenin başka bir yolu:
            //$viewData = new stdClass();
            //$viewData->rows = $rows;

            $this->load->view("organize", $viewData);
        }
        public function insertPage(){
            $this->load->view("add");
        }
        public function insert(){
            $title = $this->input->post("title");
            $detail = $this->input->post("detail");

            $data = array("title" => $title, "detail" => $detail);
            $insert = $this->db->insert("personel", $data);

            if($insert){
                redirect(base_url("personel"));
            }else{
                echo "Kayıt başarısız oldu...";
            }
        }
        public function updatePage(){
            $id = $this->uri->segment("3");
            $row = $this
                ->db
                ->where("id", $id)
                ->get("personel")
                ->row();

            $viewData = new stdClass();
            $viewData->row = $row;

            $this->load->view("update", $viewData);
        }
        public function update($id){
            $title = $this->input->post("title");
            $detail = $this->input->post("detail");

            $data = array("title" => $title, "detail" => $detail);
            $update = $this->db->where("id", $id)->update("personel", $data);

            if($update){
                redirect(base_url("personel"));
            }else{
                echo "Güncelleme başarısız oldu...";
            }
        }
        public function delete(){
            $id = $this->uri->segment("3");

            $delete = $this->db->where("id", $id)->delete("personel");

            if($delete){
                redirect(base_url("personel"));
            }else{
                echo "Silme işlemi başarısız oldu...";
            }
        }
        public function sort(){

            $selection = $this->input->post("lists");
            echo $selection;

            if($selection){

                if($selection == "id_list"){
                    $rows = $this->db->order_by("id","asc")->get("personel")->result();
                }else if($selection == "id_list_reverse"){
                    $rows = $this->db->order_by("id","desc")->get("personel")->result();
                }else if($selection == "title_list"){
                    $rows = $this->db->order_by("title","asc")->get("personel")->result();
                }else if($selection == "title_list_reverse"){
                    $rows = $this->db->order_by("title","desc")->get("personel")->result();
                }else if($selection == "detail_list"){
                    $rows = $this->db->order_by("detail","asc")->get("personel")->result();
                }else if($selection == "detail_list_reverse"){
                    $rows = $this->db->order_by("detail","desc")->get("personel")->result();
                }

            }else{
                $rows = $this->db->get("personel")->result();
            }

            $data = new stdClass();
            $data->rows = $rows;

            $this->load->view("organize", $data);

        }
        public function model_usage(){

            //Personel_model 'in metotlarına erişmek için başta load işlemi yapıyoruz.
            $this->load->model("personel_model");

            /*
            //Veri ekleme:
            $data = array("title" => "Dilşah Güngör", "detail" => "Bir Dost");

            $insert = $this->personel_model->insert($data);
            echo $insert;
            */

            /*
            //Veri silme:
            $where = array("id" => 17);

            $delete = $this->personel_model->delete($where);
            echo $delete;
            */
        }
    }