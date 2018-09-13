<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_time extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

       // $this->lang->load('admin/log_time');

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_log_time'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_log_time'), 'admin/log_time');
    }

	public function getLogTimes()
	{
		$response = Requests::get($this->data['apiurl'].'log_time/', $this->data['authentication']);
		echo $response->body;
	}

	// public function getGroup()
	// {
	// 	$id = $this->is_valid_get('id');
	// 	$response = Requests::get($this->data['apiurl'].'group/?id='.$id, $this->data['authentication']);
	// 	echo $response->body;
	// }

	public function index()
	{
        if (false)
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
			$this->data['breadcrumb'] = $this->breadcrumbs->show();
			
            /* Load Template */
            $this->template->admin_render('admin/log_time/index', $this->data);
        }
    }

	// public function create()
	// {
	// 	if (false)
    //     {
    //         redirect('auth/login', 'refresh');
    //     }
    //     elseif (true)
    //     {
	// 		$group_name = $this->is_valid_post('group_name');
	// 		$description = $this->is_valid_post('description');

	// 		if( $group_name && $description)
	// 		{
	// 			$data = array(
	// 				'name' => $group_name,
	// 				'description' => $description,
	// 				'bgcolor' => '#0000'
	// 			);

	// 			$response = Requests::post($this->data['apiurl'].'group/', $this->data['authentication'], json_encode($data));
	// 			$this->validateRequest($response->status_code);
	// 		}
	// 		else
	// 		{
	// 			$this->BadRequest();
	// 		}
	// 	}
	// }

	// public function delete()
	// {
    //     if (false)
    //     {
    //         redirect('auth/login', 'refresh');
    //     }
    //     elseif (true)
	// 	{
	// 		$id = $this->is_valid_get('id');
			
	// 		if($id)
	// 		{
	// 			$response = Requests::delete($this->data['apiurl'].'group/?id='.$id, $this->data['authentication']);
	// 			$this->validateRequest($response->status_code);
	// 		}
	// 		else
	// 		{
	// 			$this->BadRequest();
	// 		}
    //     }
	// }

	// public function edit()
	// {
	// 	if (false)
    //     {
    //         redirect('auth/login', 'refresh');
    //     }
    //     elseif (true)
	// 	{
	// 		$id = $this->is_valid_post('groups_modal_id');
	// 		$group_name = $this->is_valid_post('groups_modal_name');
	// 		$description = $this->is_valid_post('groups_modal_description');

	// 		if($id && $group_name && $description)
	// 		{
	// 			$data = array(
	// 				'name' => $group_name,
	// 				'description' => $description
	// 			);

	// 			$response = Requests::put($this->data['apiurl'].'group/?id='.$id, $this->data['authentication'], json_encode($data));
	// 			$this->validateRequest($response->status_code);
	// 		}
	// 		else
	// 		{
	// 			$this->BadRequest();
	// 		}
    //     }
	// }
}
