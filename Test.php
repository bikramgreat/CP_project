<?php

class Test extends CI_Controller{

	public function testInUser(){
		$this->load->model('modeluser');
		$res = $this->modeluser->insertUser('dawa','sherpa','dawa1','sherpa','1997/02/02','male');
		
		$exp_res = 1;
		$test_name = 'Insert User Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testUser(){
		$this->load->model('modeluser');
		$res = $this->modeluser->selectData('sushant1');
		
		$exp_res = 1;
		$test_name = 'login User Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testId(){
		$this->load->model('modelid');
		$res = $this->modelid-> Pulldetail('92','furwa','tsering','sherpa','1992-10-12','bagmati','bhaktapur','3','pasang','pasi','33','female','slc graduate','yes','profile');
		
		$exp_res = 1;
		$test_name = 'Insert id detail Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	
	public function testIdUpdate(){
		$this->load->model('modelid');
		$res = $this->modelid-> Updatedetail('92','furwa','','sherpa','1992-10-12','bagmati','bhaktapur','3','pasang','pasi','33','female','slc graduate','yes','profile');
		
		$exp_res = 1;
		$test_name = 'Update id detail  Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testIdSelect(){
		$this->load->model('modelid');
		$res = $this->modelid-> SelectValues();
		
		$exp_res = 1;
		$test_name = 'SelectValues id detail Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testIdSelectSpecificValues(){
		$this->load->model('modelid');
		$res = $this->modelid-> selectSpecificValues('2');
		
		$exp_res = 1;
		$test_name = 'SelectSpecificValues id detail Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	
	public function testIdcensusData(){
		$this->load->model('modelid');
		$res = $this->modelid-> censusData();
		
		$exp_res = 1;
		$test_name = 'Selectcensus detail Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testEducationCount(){
		$this->load->model('modelid');
		$res = $this->modelid-> educationCount();
		
		$exp_res = 1;
		$test_name = 'Select educated peopel Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testJobCount(){
		$this->load->model('modelid');
		$res = $this->modelid->jobCount();
		
		$exp_res = 1;
		$test_name = 'Select no. of working people Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testTeenCount(){
		$this->load->model('modelid');
		$res = $this->modelid->teenCount();
		
		$exp_res = 1;
		$test_name = 'Select no. of teen people Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testYoungCount(){
		$this->load->model('modelid');
		$res = $this->modelid->youngCount();
		
		$exp_res = 1;
		$test_name = 'Select no. of young people Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testOldCount(){
		$this->load->model('modelid');
		$res = $this->modelid->oldCount();
		
		$exp_res = 1;
		$test_name = 'Select no. of old people Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testDeleteData(){
		$this->load->model('modelid');
		$res = $this->modelid->delete('2');
		
		$exp_res = 1;
		$test_name = 'Delete data Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}
	public function testSearchValue(){
		$this->load->model('modelid');
		$res = $this->modelid->searchValue('dawa');
		
		$exp_res = 1;
		$test_name = 'Search detail Test';
		$ans = $this->unit->run($res,$exp_res,$test_name);
		echo $ans;
	}



}