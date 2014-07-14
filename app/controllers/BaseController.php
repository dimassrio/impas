<?php

class BaseController extends Controller {
	protected $data;

	protected function __construct(){
		$this->data['no'] = 1;

	}
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}