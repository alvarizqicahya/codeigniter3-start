<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Model
{
	public function insert($table = '', $data = '')
	{
		return $this->db->insert($table, $data);
	}

	public function get_all($table)
	{
		$this->db->from($table);
		return $this->db->get();
	}

	public function get_all_join($table, $table_join = [], $order_by = '', $order = 'DESC')
	{
		$table_name = explode('_', $table);

		$this->db->from($table);

		for ($i = 0; $i < sizeof($table_join); $i++) {
			$id_name = explode('_', $table_join[$i]);
			$this->db->join($table_join[$i], "$table_join[$i].id_$id_name[1]=$table.id_$id_name[1]", 'left');
		}

		if ($order_by != '') {
			$this->db->order_by($table . '.' . $order_by, $order);
		} else {
			$this->db->order_by('id_' . $table_name[1], $order);
		}

		return $this->db->get();
	}

	public function get_all_join_where($table, $table_join, $where, $order_by = 'created_at', $order = 'DESC')
	{
		$table_name = explode('_', $table);

		$this->db->from($table);

		for ($i = 0; $i < sizeof($table_join); $i++) {
			$id_name = explode('_', $table_join[$i]);
			$this->db->join($table_join[$i], "$table_join[$i].id_$id_name[1]=$table.id_$id_name[1]", 'left');
		}

		$this->db->where($where);

		if ($order_by) {
			$this->db->order_by($order_by, $order);
		} else {
			$this->db->order_by('id_' . $table_name[1], $order);
		}

		return $this->db->get();
	}

	public function get_all_orderby($table, $field, $sort = "ASC")
	{
		$this->db->from($table);
		$this->db->order_by($field, $sort);
		return $this->db->get();
	}

	public function get_or_like($table, $query)
	{
		$this->db->or_like($query);

		return $this->db->get($table);
	}

	public function get_or_like_limit($table, $query, $limit = 10)
	{
		$this->db->or_like($query);

		$this->db->limit($limit);

		return $this->db->get($table);
	}

	public function get_or_like_limit_where($table, $query, $where, $limit = 10)
	{
		$this->db->or_like($query);
		$this->db->where($where);
		$this->db->limit($limit);

		return $this->db->get($table);
	}

	public function get_where($table, $where)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	public function get_where_orderby($table, $where, $field, $sort = "ASC")
	{
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($field, $sort);
		return $this->db->get();
	}

	public function update($table = null, $data = null, $where = null)
	{
		$this->db->set($data, null);
		$this->db->where($where);
		return $this->db->update($table);
	}

	public function delete($table = null, $where = null)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

	public function total_rows($table)
	{
		return $this->db->count_all_results($table);
	}

	public function total_rows_where($table, $where)
	{
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get()->num_rows();
	}

	//pastikan fieldnya id String
	public function GenerateId($table, $data = 'B')
	{
		$row = $this->db->select('*')->from($table)->count_all_results();
		if ($row != 0) {
			$rowNew = $row + 1;
			$nextId = $data . str_pad($rowNew, 4, '0', STR_PAD_LEFT);
		} else {
			$nextId = $data . '0001';
		} // For the first time
		return $nextId;
	}

	public function get_name($table, $where)
	{
		$this->db->from($table);
		$this->db->where(['id' => $where]);
		$result = $this->db->get()->row();
		return $result->nama;
	}
}
