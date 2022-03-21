<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'core/BaseModel.php'; 

class CurrencyExchange_model extends Base_Model {

	private $table = 'currency_exchange';

	public function __construct()
	{
		parent::__construct($this->table);
	}

	public function get($date= null, $currency = null){
		if($date != null)
			$this->db->where('currency_exchange_date', $date);

		if($date != null)
			$this->db->where('currency', $currency);

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getRow($date, $currency){
		if($date != null)
			$this->db->where('currency_exchange_date', $date);

		if($date != null)
			$this->db->where('currency', $currency);

		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function getRatesByDate($date){
		if($date != null)
			$this->db->where('currency_exchange_date', $date);

		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function delete($date, $currency){
		$this->db->where('currency_exchange_date', $date);
		$this->db->where('currency', $currency);
		$this->db->delete($this->table);
	}

	public function add($data){
		$this->db->insert($this->table, $data);
	}

	public function edit($date, $currency, $data){
		$this->db->where('currency_exchange_date', $date);
		$this->db->where('currency', $currency);
		$this->db->update($this->table, $data);
	}

	public function get_rows($search_date_from = null, $search_date_to = null, $currency = null){
		if($search_date_from){
			$this->db->where('currency_exchange_date >=', $search_date_from);
		}

		if($search_date_to){
			$this->db->where('currency_exchange_date <=', $search_date_to);
		}

		// if($currency && $currency != 0){
		// 	$this->db->where('currency', $currency);
		// }
		$this->db->distinct('currency_exchange_date');
		$this->db->select('currency_exchange_date');
		$this->db->order_by('currency_exchange_date DESC');

		return $this->db->count_all_results($this->table);
	}

	public function get_data($start, $limit, $search_date_from = null, $search_date_to = null, $currency = null){
		if($search_date_from){
			$this->db->where('currency_exchange_date >=', $search_date_from);
		}

		if($search_date_to){
			$this->db->where('currency_exchange_date <=', $search_date_to);
		}

		// if(!($currency == null || $currency == '0')){
		// 	$this->db->where('currency', $currency);
		// }

		$this->db->order_by('currency_exchange_date DESC');

		if($limit){
			$this->db->limit($limit,$start);
		}

		$query = $this->db->get($this->table);

		return $query->result();
	}

	public function getAverage($start, $end, $currency){
		$this->db->select('AVG(currency_exchange_rate) as currency_average');
		$this->db->where('currency', $currency);
		$this->db->where('currency_exchange_date >=', $start);
		$this->db->where('currency_exchange_date <=', $end);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function get_unrecorded_date(){
		$query = "select * from 
			(select DATE_FORMAT(adddate('".CURRENCY_EXCHANGE_START_DATE."',t3.i*1000 + t2.i*100 + t1.i*10 + t0.i), '%Y%m%d') selected_date from
			 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
			 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
			 (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
			 (select 0 i union select 1 union select 2 union select 3) t3) v
			  WHERE selected_date <= CURDATE() AND selected_date NOT IN (SELECT CAST(currency_exchange_date AS char) FROM currency_exchange)
			  AND WEEKDAY(selected_date) < 5";

		$res = $this->db->query($query);
		
		return $res->result();
	}
}

/* End of file  */
/* Location: ./application/models/ */