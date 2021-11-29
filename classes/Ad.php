<?php
    class Ad extends ConnectionBuilder{

        public $adInserted = null;
        public $adDeleted = null;

        public $results_per_page = 3;

        public function selectAdCategory(){
            $sql = "select * 
                    from sf_ad_category c
                    order by c.ad_category_id ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdSuperCategory(){
            $sql = "select * 
                    from sf_super_category sc
                    order by sc.super_category_id ";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdCountry(){
            $sql = "select * 
                    from sf_country c
                    where c.name <> 'nepoznato'
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

        //funckija koja se koristi za paginaciju
        public function numberOfAds($search,$city,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8,$tag9,$categoryId){
            $sql = "select count(*) as number_of_ads
                    from ads a
                    inner join sf_currency c on c.currency_id = a.currency_id
                    inner join users s on s.user_id = a.user_id
                    inner join sf_country con on con.country_id = a.country_id
                    where a.ad_status_id = ?
                        and a.super_category_id = 2
                        and (a.title like '%{$search}%' or a.text like '%{$search}%' or con.name like '%{$search}%' or '{$search}' = '')
                            and (a.city like '%{$city}%' or '{$city}' = '')
                            and (a.ad_category_id = '{$categoryId}' or '{$categoryId}' = '')
                                and (a.ad_id in (
                                        select at.ad_id
                                        from ad_tag at
                                        where at.ad_id = a.ad_id
                                            and at.tag_id in ( '{$tag1}','{$tag2}','{$tag3}','{$tag4}','{$tag5}','{$tag6}','{$tag7}','{$tag8}','{$tag9}' )
                                        ) or ('{$tag1}' = '' and '{$tag2}' = '' and '{$tag3}' = '' and '{$tag4}' = '' and '{$tag5}' = '' and '{$tag6}' = '' and '{$tag7}' = '' and '{$tag8}' = '' and '{$tag9}' = '')  )
                    order by a.ad_type_id desc, a.date_created desc ";
            $query = $this->conn->prepare($sql);
            $query->execute([1]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        //funckija koja se koristi za paginaciju
        public function numberOfAdsMusicians($search,$city,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8,$tag9,$categoryId){
            $sql = "select count(*) as number_of_ads
                    from ads a
                    inner join sf_currency c on c.currency_id = a.currency_id
                    inner join users s on s.user_id = a.user_id
                    inner join sf_country con on con.country_id = a.country_id
                    where a.ad_status_id = ?
                        and a.super_category_id = 1
                        and (a.title like '%{$search}%' or a.text like '%{$search}%' or con.name like '%{$search}%' or '{$search}' = '')
                            and (a.city like '%{$city}%' or '{$city}' = '')
                            and (a.ad_category_id = '{$categoryId}' or '{$categoryId}' = '')
                                and (a.ad_id in (
                                        select at.ad_id
                                        from ad_tag at
                                        where at.ad_id = a.ad_id
                                            and at.tag_id in ( '{$tag1}','{$tag2}','{$tag3}','{$tag4}','{$tag5}','{$tag6}','{$tag7}','{$tag8}','{$tag9}' )
                                        ) or ('{$tag1}' = '' and '{$tag2}' = '' and '{$tag3}' = '' and '{$tag4}' = '' and '{$tag5}' = '' and '{$tag6}' = '' and '{$tag7}' = '' and '{$tag8}' = '' and '{$tag9}' = '')  )
                    order by a.ad_type_id desc, a.date_created desc ";
            $query = $this->conn->prepare($sql);
            $query->execute([1]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAds($search,$city,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8,$tag9,$categoryId,$this_page_first_result,$results_per_page){
            $sql = "select a.*,c.name as currency, s.name as korisnik, DATE_FORMAT(a.date_created, '%d.%m.%Y') as postavljeno
                    from ads a
                    inner join sf_currency c on c.currency_id = a.currency_id
                    inner join users s on s.user_id = a.user_id
                    inner join sf_country con on con.country_id = a.country_id
                    where a.ad_status_id = ?
                        and a.super_category_id = 2
                        and (a.title like '%{$search}%' or a.text like '%{$search}%' or con.name like '%{$search}%' or '{$search}' = '')
                            and (a.city like '%{$city}%' or '{$city}' = '')
                            and (a.ad_category_id = '{$categoryId}' or '{$categoryId}' = '')
                                and (a.ad_id in (
                                        select at.ad_id
                                        from ad_tag at
                                        where at.ad_id = a.ad_id
                                            and at.tag_id in ( '{$tag1}','{$tag2}','{$tag3}','{$tag4}','{$tag5}','{$tag6}','{$tag7}','{$tag8}','{$tag9}' )
                                        ) or ('{$tag1}' = '' and '{$tag2}' = '' and '{$tag3}' = '' and '{$tag4}' = '' and '{$tag5}' = '' and '{$tag6}' = '' and '{$tag7}' = '' and '{$tag8}' = '' and '{$tag9}' = '')  )
                    order by a.ad_type_id desc, a.date_created desc 
                    limit {$this_page_first_result},{$results_per_page}";
            $query = $this->conn->prepare($sql);
            $query->execute([1]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdsMusicians($search,$city,$tag1,$tag2,$tag3,$tag4,$tag5,$tag6,$tag7,$tag8,$tag9,$categoryId,$this_page_first_result,$results_per_page){
            $sql = "select a.*,c.name as currency, s.name as korisnik, DATE_FORMAT(a.date_created, '%d.%m.%Y') as postavljeno
                    from ads a
                    inner join sf_currency c on c.currency_id = a.currency_id
                    inner join users s on s.user_id = a.user_id
                    inner join sf_country con on con.country_id = a.country_id
                    where a.ad_status_id = ?
                        and a.super_category_id = 1
                        and (a.title like '%{$search}%' or a.text like '%{$search}%' or con.name like '%{$search}%' or '{$search}' = '')
                            and (a.city like '%{$city}%' or '{$city}' = '')
                            and (a.ad_category_id = '{$categoryId}' or '{$categoryId}' = '')
                                and (a.ad_id in (
                                        select at.ad_id
                                        from ad_tag at
                                        where at.ad_id = a.ad_id
                                            and at.tag_id in ( '{$tag1}','{$tag2}','{$tag3}','{$tag4}','{$tag5}','{$tag6}','{$tag7}','{$tag8}','{$tag9}' )
                                        ) or ('{$tag1}' = '' and '{$tag2}' = '' and '{$tag3}' = '' and '{$tag4}' = '' and '{$tag5}' = '' and '{$tag6}' = '' and '{$tag7}' = '' and '{$tag8}' = '' and '{$tag9}' = '')  )
                    order by a.ad_type_id desc, a.date_created desc 
                    limit {$this_page_first_result},{$results_per_page}";
            $query = $this->conn->prepare($sql);
            $query->execute([1]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAd($adId){
            $sql = "select a.*,c.name as currency, s.name as korisnik, DATE_FORMAT(a.date_created, '%d.%m.%Y') as postavljeno
                    from ads a
                    inner join sf_currency c on c.currency_id = a.currency_id
                    inner join users s on s.user_id = a.user_id
                    inner join sf_country con on con.country_id = a.country_id
                    where a.ad_status_id = ?
                            and a.ad_id = {$adId}
                    order by a.ad_type_id desc, a.date_created desc ";
            $query = $this->conn->prepare($sql);
            $query->execute([1]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdFirstImage($ad_id){
            $sql = "select * 
                    from ad_image ai
                    where ai.ad_id = ?
                    order by ai.ad_image_id desc
                    limit 1";
            $query = $this->conn->prepare($sql);
            $query->execute([$ad_id]);
            
            $result = $query->fetch(PDO::FETCH_OBJ);

            return $result;
        }

        public function selectAdImages($ad_id){
            $sql = "select * 
                    from ad_image ai
                    where ai.ad_id = ?";
            $query = $this->conn->prepare($sql);
            $query->execute([$ad_id]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            //return json_encode($result);
            return $result;
        }

        public function selectAdTags($ad_id){
            $sql = "select * 
                    from ad_tag at
                    inner join sf_tag t on t.tag_id = at.tag_id
                    where at.ad_id = ?";
            $query = $this->conn->prepare($sql);
            $query->execute([$ad_id]);
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }

        public function insertAd($title,$text,$countryId,$city,$categoryId,$price,$currencyId,$userId,$telephone,$superCategoryId){
            $sql = "insert into ads values(null,?,?,?,?,?,?,?,?,?,CURRENT_TIMESTAMP(),?,?,?,?) ";
            $query = $this->conn->prepare($sql);
            $check = $query->execute([$title,$text,$countryId,$city,$categoryId,1,$price,$currencyId,0,$userId,1,$telephone,$superCategoryId]);
            $last_id = $this->conn->lastInsertId();

            if($check){
                $this->adInserted = true;

            }else{
                $this->adInserted = false;
            }

            return $last_id;
        }

        public function incrementSeen($adId){
            $sql = "update ads 
            set seen = seen + 1
            where ad_id = {$adId};";
            $query = $this->conn->prepare($sql);
            $query->execute();
        }

        public function deleteAd($adId){
            $sql1 = "delete from ad_tag where ad_id = {$adId};";
            $query1 = $this->conn->prepare($sql1);
            $check1 = $query1->execute();

            $sql2 = "delete from ad_image where ad_id = {$adId};";
            $query2 = $this->conn->prepare($sql2);
            $check2 = $query2->execute();

            $sql3 = "delete from ads where ad_id = {$adId};";
            $query3 = $this->conn->prepare($sql3);
            $check3 = $query3->execute();
            
            if($check3==true and $query3->rowCount()>0){
                $this->adDeleted = true;
            }else{
                $this->adDeleted = false;
            }
        }

        public function selectUserAd($adId){
            $sql = "select a.ad_id, a.title, a.text, a.country_id, a.city, a.super_category_id, a.ad_category_id, a.price, a.currency_id, a.telephone 
                    from ads a
                    where a.ad_id = {$adId};";
            $query = $this->conn->prepare($sql);
            $query->execute();
            
            $result = $query->fetchAll(PDO::FETCH_OBJ);

            return $result;
        }
    }
?>