<?php

/* 
name (text) - название задачи
descr (text) - текст задания
need_for_report (text) - что должен предоставить исполнитель для отчёта по задаче
price (float) - стоимость одного выполнения задачи в рублях
tarif_id (int) - идентификатор тарифа
folder_id (int) - идентификатор папки, в которую нужно поместить задачу
need_screen (boolean) - если в задании исполнителю нужно прикерпить скриншот, нужно передать 1 (необязательный параметр)
time_for_work (int) - сколько часов дать исполнителю для работы, от 2 до 168 (необязательный параметр)
limit_per_day (int) - лимит выполнений в сутки (необязательный параметр)
limit_per_hour (int) - лимит выполнений в час (необязательный параметр)
limit_per_user (int) - лимит выполнений для одного исполнителя (необязательный параметр)
limit_per_user_folder (int) - лимит от исполнителя на папку (необязательный параметр)
delay_from (int) - задержка между выполнениями в минутах, от (необязательный параметр)
delay_to (int) - задержка между выполнениями в минутах, до (необязательный параметр)
targeting_gender (int) - параметр таргетинга: пол. 1 - женский, 2 - мужской (необязательный параметр)
targeting_age_from (int) - параметр таргетинга: возраст от (необязательный параметр)
targeting_age_to (int) - параметр таргетинга: возраст до (необязательный параметр)
targeting_geo_country_id (int) - параметр геотаргетинга: ID страны (необязательный параметр)
targeting_geo_region_id (int) - параметр геотаргетинга: ID региона (необязательный параметр)
targeting_geo_city_id (int) - параметр геотаргетинга: ID города (необязательный параметр)
 */

class Task{
    private $name;
    private $description;
    private $price;
    private $need_for_report;
    private $tarif_id;
    private $folder_id;
    private $time_for_work ; //(int) - сколько часов дать исполнителю для работы, от 2 до 168 (необязательный параметр)
    private $limit_per_day ; //(int) - лимит выполнений в сутки (необязательный параметр)
    private $limit_per_hour ; //(int) - лимит выполнений в час (необязательный параметр)
    private $limit_per_user; //(int) - лимит выполнений для одного исполнителя (необязательный параметр)
    private $limit_per_user_folder; //(int) - лимит от исполнителя на папку (необязательный параметр)
    private $delay_from ; //(int) - задержка между выполнениями в минутах, от (необязательный параметр)
    private $delay_to ; //(int) - задержка между выполнениями в минутах, до (необязательный параметр)
    private $targeting_gender; //(int) - параметр таргетинга: пол. 1 - женский, 2 - мужской (необязательный параметр)
    private $targeting_age_from; //(int) - параметр таргетинга: возраст от (необязательный параметр)
    private $targeting_age_to; //(int) - параметр таргетинга: возраст до (необязательный параметр)
    private $targeting_geo_country_id; //(int) - параметр геотаргетинга: ID страны (необязательный параметр)
    private $targeting_geo_region_id; //(int) - параметр геотаргетинга: ID региона (необязательный параметр)
    private $targeting_geo_city_id; //(int) 
    public  $id;
    public  $limit_per_exec;
    public  $executed;
    public  $status;

//The Class Task describes any task in UNU API. The constructor defines required
// params. Setters define some  or all not required params. The getter give an 
// array with all params that have defined
    
    public function Task($params){
        $this->name = $params["name"];
        $this->description = $params["description"];
        $this->price = $params["price"];
        $this->need_for_report = $params["need_for_report"];
        $this->tarif_id = $params["tarif_id"];
        $this->folder_id = $params["folder_id"];
    }
    
// Setters for not required params   
    
    public function set_time_to_work($time) {
        $this->time_for_work = $time;
    }
    
    public function limit_per_day($limit) {
        $this->limit_per_day = $limit;
    }
    
    public function limit_per_hour($limit) {
        $this->limit_per_hour = $limit;
    }
    
    public function limit_per_user($limit) {
        $this->limit_per_user = $limit;
    }
    
    public function limit_per_user_folder($limit) {
        $this->limit_per_user_folder = $limit;
    }
    
    public function delay_from($delay) {
        $this->delay_from = $delay;
    }
    
    public function delay_to($delay) {
        $this->delay_to = $delay;
    }
    
    public function targeting_gender($sex) {
        $this->targeting_gender=$sex;
    }
    
    public function targeting_age_from($age) {
        $this->targeting_age_from=$age;
    }
    
    public function targeting_age_to($age) {
        $this->targeting_age_to=$age;
    }
    
    public function targeting_geo_country_id($id) {
        $this->targeting_geo_country_id = $id;
    }
    
    public function targeting_geo_region_id($id) {
        $this->targeting_geo_region_id = $id;
    }
    
    public function targeting_geo_city_id($id) {
        $this->targeting_geo_city_id = $id;
    }
//The getter - if some not required param is definited - this param will present
// in param's array    
    public function get_task_params() {        
        $params = array(
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'need_for_report' => $this->need_for_report,
            'tarif_id' => $this->tarif_id,
            'folder_id' => $this->folder_id
        );
        if($this->time_for_work){
            $params["time_for_work"] = $this->time_for_work;
        }
        if($this->limit_per_day){
            $params["limit_per_day"] = $this->limit_per_day;
        }
        if($this->limit_per_hour){
            $params["limit_per_hour"] = $this->limit_per_hour;
        }
        if($this->limit_per_user){
            $params["limit_per_user"] = $this->limit_per_user;
        }
        if($this->limit_per_user_folder){
            $params["limit_per_user_folder"] = $this->limit_per_user_folder;
        }
        if($this->delay_from){
            $params["delay_from"] = $this->delay_from;
        }
        if($this->delay_to){
            $params["delay_to"] = $this->delay_to;
        }
        if($this->targeting_age_from){
            $params["targeting_age_from"] = $this->targeting_age_from;
        }
        if($this->targeting_age_to){
            $params["targeting_age_to"] = $this->targeting_age_to;
        }
        if($this->targeting_gender){
            $params["targeting_gender"] = $this->targeting_gender;
        }
        if($this->targeting_geo_city_id){
            $params["targeting_geo_city_id"] = $this->targeting_geo_city_id;
        }
        if($this->targeting_geo_country_id){
            $params["targeting_geo_country_id"] = $this->targeting_geo_country_id;
        }
        if($this->targeting_geo_region_id){
            $params["delay_to"] = $this->delay_to;
        }
        return $params;    
    }
}