<?php
    class Ad extends ConnectionBuilder{

        public $adInserted = null;

        public function selectAdCategory(){
            $sql = "select * 
                    from sf_ad_category c
                    order by c.ad_category_id ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdCountry(){
            $sql = "select * 
                    from sf_country c
                    order by c.country_id ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdCurrency(){
            $sql = "select * 
                    from sf_currency c
                    order by c.currency_id ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdTag(){
            $sql = "select * 
                    from sf_tag t
                    order by t.tag_id ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAds(){
            $sql = "select a.*,c.name as currency
                    from ads a
                    inner join sf_currency c on c.currency_id = a.currency_id
                    where a.ad_status_id = ?
                    order by a.date_created desc ";
            $query = $this->conn->prepare($sql);
            $query->execute([1]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdFirstImage($ad_id){
            $sql = "select * 
                    from ad_image ai
                    where ai.ad_id = ?
                    limit 1";
            $query = $this->conn->prepare($sql);
            $query->execute([$ad_id]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function insertAd($title,$text,$countryId,$city,$categoryId,$price,$currencyId,$userId){
            $sql = "insert into ads values(null,?,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP(),?,?) ";
            $query = $this->conn->prepare($sql);
            $check = $query->execute([$title,$text,$countryId,$city,$categoryId,1,$price,$currencyId,0,$userId,1]);
            $last_id = $this->conn->lastInsertId();

            if($check){
                $this->adInserted = true;

            }else{
                $this->adInserted = false;
            }

            return $last_id;
        }
    }
?>