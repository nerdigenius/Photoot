<?php

    class Category_model extends CI_Model{
        public function show(){
            
        }
        
        public function pre_add(){
            
        }
        
        public function post_add($data){
            $this->db->insert('table_name', $data);
        }
        
        public function category_add($category_name){
            $data = $this->db->insert('categories', $category_name);
            if($data){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        public function category_list(){
            $this->db->select('*');
            $this->db->from('categories');
            $this->db->order_by('category_id', 'DESC');
            $query = $this->db->get();
            return $query->result();
        }

        public function fetch_category($category_id){
            $this->db->select('*');
            $this->db->where('category_id', $category_id);
            $this->db->from('categories');
            $query = $this->db->get();
            return $query->result();
        }

        public function category_update($id, $category_name){
            $this->db->where('category_id', $id);
            $this->db->update('categories', $category_name);
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
        }

        public function delete_category($category_id){
            $this->db->where('category_id', $category_id);
            $this->db->delete('categories');
            if($this->db->affected_rows()>0){
                return true;
            } else{
                return false;
            }
        }

        public function sub_category_lists(){
            $this->db->select('*');
            $this->db->from('sub_categories');
            $this->db->order_by('sub_category_id', 'DESC');
            $query = $this->db->get();
            return $query->result();
        }

        public function sub_category_add($sub_category_info){
            $data = $this->db->insert('sub_categories', $sub_category_info);
            if($data){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function fetch_sub_category($sub_category_id){
            $this->db->select('*');
            $this->db->where('sub_category_id', $sub_category_id);
            $this->db->from('sub_categories');
            $query = $this->db->get();
            return $query->result();
        }

        public function sub_category_update($id, $sub_category_info){
            $this->db->where('sub_category_id', $id);
            $this->db->update('sub_categories', $sub_category_info);
            if($this->db->affected_rows() > 0){
                return true;
            } else{
                return false;
            }
        }

        public function delete_sub_category($sub_category_id){
            $this->db->where('sub_category_id', $sub_category_id);
            $this->db->delete('sub_categories');
            if($this->db->affected_rows()>0){
                return true;
            } else{
                return false;
            }
        }
        
        public function pre_edit(){
            
        }
        
        public function post_edit(){
            
        }
        
        public function destroy($id){
            $this->db->where('id', $id);
            $this->db->delete('table_name');
            if($this->db->affected_rows()>0){
                return true;
            } else{
                return false;
            }
        }
    }

?>