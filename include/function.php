<?php
    
    function clearValue($vl){
        global $mysqli;
        $value = mysqli_real_escape_string($mysqli, $vl);
        if($value != ''){
            $value = strip_tags($value);
            $value = str_replace("'","",$value);
            $value = str_replace('"','',$value);
        }
        return $value;
    }

function getlocation(){
        global $mysqli;
        $data = array();
        $query = "SELECT DISTINCT location_id FROM `job_openings`";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['getJoblocations'][] = array(

                'name'        =>  $row['location_id'],

            );
        }
        return $data;
    }

    function getJobCategories(){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `job_category`";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['getJobCategories'][] = array(
                'id'        => $row[id],
                'name'        =>  $row['name'],
                'img'       =>  "/images/".$row['img']
            );
        }
        return $data;
    }

    function getcount($name){
        global $mysqli;
        $data = array();
        $query = "SELECT COUNT(*) AS t_count FROM `job_openings` WHERE category_id  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['count'][] = array(
                'count'        => $row[t_count],

            );
        }
        return $data;

    }
function getProductCategories(){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `product_category`";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['ProductCategories'][] = array(
                'id'        => $row[id],
                'name'        =>  $row['name'],
                'slug'        =>  $row['slug'],
                'img'       =>  "/2021-22/perf_cms/storage/app/public/product_category/".$row['image']
            );
        }
        return $data;
    }

    function getJobs($id){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `job_openings` WHERE category=$id";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['Jobs'][] = array(
                'id'        => $row[id],
                'location_id'        =>  $row['location_id'],
                'title'       =>  $row['title'],
                'text'       =>  $row['text'],
                'category_id'       =>  $row['category_id'],

            );
        }
        return $data;
    }
    
    function get_years(){
        global $mysqli;
        $data = array();
        $query = "SELECT year FROM `year` ORDER BY id DESC";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['getyears'][] = array(

                'year'        =>  $row['year'],

            );
        }
        return $data;
    }
    
   
    
    function get_comp_csr($name){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `composition_of_csr_committee` WHERE year  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['comp_csr'][] = array(
                'title'        => $row['title'],
                'link'        => $row['link'],
                
            );
        }
        return $data;
                
    }
    function get_csr_policy($name){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `csr_policy` WHERE year  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['csr_policys'][] = array(
                'title'        => $row['title'],
                'link'        => $row['link'],
                
            );
        }
        return $data;
                
    }

    
    function vigil_policy($name){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `vigil_mechanism_policy` WHERE year  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['vigil_policy'][] = array(
                'title'        => $row['title'],
                'link'        => $row['link'],
                
            );
        }
        return $data;
                
    }

    function get_nrc_policy($name){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `nrc_policy` WHERE year  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['nrc'][] = array(
                'title'        => $row['title'],
                'link'        => $row['link'],
                
            );
        }
        return $data;
                
    }

function get_independent_dir($name){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `code_of_independent_director` WHERE year  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['independent_dir'][] = array(
                'title'        => $row['title'],
                'link'        => $row['link'],
                
            );
        }
        return $data;
                
    }

  function get_notice_agm($name){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `notice_of_agm` WHERE year  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['notice_of_agm'][] = array(
                'title'        => $row['title'],
                'link'        => $row['link'],
                
            );
        }
        return $data;
                
    }

    function get_annual_return($name){
        global $mysqli;
        $data = array();
        $query = "SELECT * FROM `annual_return` WHERE year  = '$name'";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $data['annual_return'][] = array(
                'title'        => $row['title'],
                'link'        => $row['link'],
                
            );
        }
        return $data;
                
    }

    
?>
