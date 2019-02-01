<?php
  class Product_model extends CI_Model{

    public function _construct()
    {
      $this->load->database();
    }

    public function get_products($slug = FALSE)
    {
      if ($slug === FALSE) {
        $this->db->order_by('products.id', 'DESC');
        //$q = "SELECT * FROM `products` JOIN categories ON categories.id = products.category_id"; 
         $this->db->join('categories', 'categories.id = products.category_id' );
        $query = $this->db->get('products');
        return $query->result_array();
      }

      $query = $this->db->get_where('products', array('slug' => $slug));
      return $query->row_array();
    }

    public function create_product($post_image)
    {
      $slug = url_title($this->input->post('name'));

      $data = array(
        'name' => $this->input->post('name'),
        'slug' => $slug,
        'disc' => $this->input->post('disc'),
        'category_id' => $this->input->post('category_id'),
        'post_image' => $prod_image 
        
      );

      return $this->db->insert('products', $data);
    }

    public function delete_product($id)
    {
      $this->db->where('id', $id);
      $this->db->delete('products');
      return true;
    }

    public function update_prod()
    {
      $slug = url_title($this->input->post('name'));

      $data = array(
        'name' => $this->input->post('name'),
        'slug' => $slug,
        'disc' => $this->input->post('disc'),
        'category_id' => $this->input->post('category_id')

      );

      $this->db->where('id', $this->input->post('id'));
      return $this->db->update('products', $data);
      
    }

    public function get_categories()
    {
      $this->db->order_by('cat_name');
      $query = $this->db->get('categories');
      return $query->result_array();
    }
  }