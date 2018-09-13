<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salaries extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_salaries'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_salaries'), 'admin/salaries');
    }

	public function getSalaries()
	{
		$response = Requests::get($this->data['apiurl'].'salary/', $this->data['authentication']);
		echo $response->body;
	}

	public function getSalary()
	{
		$id = $this->is_valid_get('id');
		$response = Requests::get($this->data['apiurl'].'salary/?id='.$id, $this->data['authentication']);
		echo $response->body;
	}

	public function index()
	{
		
        if ( false /*! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin()*/)
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            

            /* Load Template */
            $this->template->admin_render('admin/salaries/index', $this->data);
        }
    }

	public function create()
	{
		if (false)
        {
            redirect('auth/login', 'refresh');
        }
        elseif (true)
        {
			$position = $this->is_valid_post('position');
			$amount = $this->is_valid_post('amount');

			if( $position && $amount)
			{
				$data = array(
					'salary_type' => $position,
					'salary_amount' => $amount,
				);

				$response = Requests::post($this->data['apiurl'].'salary/', $this->data['authentication'], json_encode($data));
				$this->validateRequest($response->status_code);
			}
			else
			{
				$this->BadRequest();
			}
		}
	}

	public function delete()
	{
        if (false)
        {
            redirect('auth/login', 'refresh');
        }
        elseif (true)
		{
			$id = $this->is_valid_get('id');
			
			if($id)
			{
				$response = Requests::delete($this->data['apiurl'].'salary/?id='.$id, $this->data['authentication']);
				$this->validateRequest($response->status_code);
			}
			else
			{
				$this->BadRequest();
			}
        }
	}

	public function edit()
	{
		if (false)
        {
            redirect('auth/login', 'refresh');
        }
        elseif (true)
		{
			$id = $this->is_valid_post('salaries_modal_id');
			$position = $this->is_valid_post('salaries_modal_position');
			$amount = $this->is_valid_post('salaries_modal_amount');

			if($id && $position && $amount)
			{
				$data = array(
					'salary_type' => $position,
					'salary_amount' => $amount
				);

				$response = Requests::put($this->data['apiurl'].'salary/?id='.$id, $this->data['authentication'], json_encode($data));
				$this->validateRequest($response->status_code);
			}
			else
			{
				$this->BadRequest();
			}
        }
	}
}
