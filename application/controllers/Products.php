<?php
 class Products extends CI_Controller{
  public function index()
  {
    $data['title'] = 'Latest Products';
    
    $data['products'] = $this->product_model->get_products();
    

    $this->load->view('templates/header');
    $this->load->view('products/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($slug = NULL)
  {
    $data['product'] = $this->product_model->get_products($slug);

    if (empty($data['product'])) {
      show_404();
    }

    $data['title'] = $data['product']['name'];

    $this->load->view('templates/header');
    $this->load->view('products/view', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $data['title'] = 'Create Product';

    $data['categories'] = $this->product_model->get_categories();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('disc', 'Disc', 'required');

    if($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header');
      $this->load->view('products/create', $data);
      $this->load->view('templates/footer');
    } else {

      //Upload Image
      $config['allowed_types'] = 'gif\jpeg\png';
      $config['upload_path'] = './assets/images/products';
      $config['max_size'] = '2048';
      $config['max_width'] = '500';
      $config['max_height'] = '500';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload()) {
        $errors = array('error'=>$this->upload->display_errors());
        $prod_image = 'noimage.jpg';
      }
      else {
        $data = array('upload_data'=>$this->upload ->data());
        $prod_image = $_FILES['prodimage']['name'];
      }

      $this->product_model->create_product($prod_image);
      redirect('products');
    }

  }

  public function delete($id)
  {
    $this->product_model->delete_product($id);
    redirect('products');

  }

  public function edit($slug)
  {
    $data['product'] = $this->product_model->get_products($slug);

    $data['categories'] = $this->product_model->get_categories();

    if (empty($data['product'])) {
      show_404();
    }

    $data['title'] = 'Edit Product';

    $this->load->view('templates/header');
    $this->load->view('products/edit', $data);
    $this->load->view('templates/footer');
  }

  public function update()
  {
    $this->product_model->update_prod();  
    redirect('products');
  }
}