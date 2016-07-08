<?php

namespace App\Models;

use Libs\BaseModel;

class Branchdetail extends BaseModel
{
    static $table_name='branchdetails';
    static $has_many = array(
        array(
            'issues',
            'primary_key'=>'id',
            'class_name' => 'Branchissue'
        )
    );
    public function findAll(){
        return Branchdetail::all();
    }
    public function totalRecord()
    {
        return (int)count(Branchdetail::all());
    }
    public function branchList($limit=10,$offset=0,array $param=array('sort'=>'id','direction'=>'asc'))
    {
        return Branchdetail::all();
    }
    public function totalSearch($data){
        return (int)count(Branchdetail::all(array('conditions'=>"{$data['searchBy']} LIKE '%{$data['search_query']}%'")));
    }
    public function search($data,$limit=10,$offset=0,array $param=array('sort'=>'id','direction'=>'asc')){
        return Branchdetail::all(array('limit'=>$limit,'offset'=>$offset,
                                        'order'=>"{$param['sort']} {$param['direction']}",
                                        'conditions'=>"{$data['searchBy']} LIKE '%{$data['search_query']}%'",
                                        'include' => array('issues')));

    }
    public function showBranchIssues($branch_id){
//        dd($branch_id);
        return Branchdetail::all($branch_id,array('include' => array('issues')));
    }
}