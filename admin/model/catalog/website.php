<?php
class ModelCatalogWebsite extends Model {
    
 public function getWebsite() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "website");
       	foreach ($query->rows as $key=>$result) {
			$website[$key] = array(
				'id'             => $result['id'],
				'website_url'      => $result['site'],
				'status'       => $result['status']
			);
		}
		return $website;
	}
 
    
    
    
 public function getWebid($id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "website where id=".$id);
		return $query->row;
	}    
    

    
 public function addWebsite($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "website SET site = '" . $data['site'] . "', status = '" . $data['status'] . "'");
     	$website_id = $this->db->getLastId();
		return $website_id;
	}       
    
  
    
 public function editWebsite($data) {
        $this->db->query("UPDATE " . DB_PREFIX . "website SET site = '" . $data['site'] . "', status = '" . $data['status'] . "' WHERE id='".$data['id']."'");    
		return $id;
	}       
 
    
    
public function deleteWebsite($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "website WHERE id = '" . (int)$id . "'");
		$this->cache->delete('website');
	}    
    
    
    
    
    
    
    
    
}

