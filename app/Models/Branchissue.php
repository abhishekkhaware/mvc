<?php

namespace App\Models;


use Libs\BaseModel;

class Branchissue extends BaseModel
{
    static $table_name='branchissues';
    static $belongs_to = array(array('details',
            'primary_key'=>'id',
            'foreign_key' => 'branchdetail_id',
            'class_name'=>'Branchdetail'));
    public function findAll(){
        return Branchissue::all();
    }
    public function totalRecord()
    {
        return (int)(Branchissue::count());
    }
    public function branchIssueList($limit=10,$offset=0,array $param=array('sort'=>'issue_ticket_created_at','direction'=>'asc'))
    {
//        return Branchissue::all(array('limit'=>$limit,'offset'=>$offset,'conditions'=>array('status LIKE 0'),'order'=>"{$param['sort']} {$param['direction']}"));
        return Branchissue::all();
    }
    public function search_by_ticket($tkt){
        return (Branchissue::all());
    }
}