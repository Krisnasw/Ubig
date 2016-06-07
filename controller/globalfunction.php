<?php
    $isajax = isset($_POST['ajax']) ? $_POST['ajax'] : false;
    if($isajax == true){
        $action = $_POST['action'];
        $accesskey = $_POST['accesskey'];
        $param = $_POST['param'];
        $param2 = isset($_POST['param2']) ? $_POST['param2'] : "";

        switch($action){
            case "GetPropinsi":
                echo GetPropinsiSelect($accesskey);
                break;
            case "GetSitus":
                echo GetSitusSelect($accesskey);
                break;
            case "GetKat":
                echo GetKatSelect($accesskey);
                break;
            case "GetSubKat":
                if($param == ""){
                    echo "";
                    break;
                }

                echo GetSKatSelect($accesskey, $param);
                break;
            case "GetJenis":
                if($param == ""){
                    echo "";
                    break;
                }

                echo GetJenisSelect($accesskey, $param);
                break;
            case "GetKatList":
                echo GetKatList($accesskey);
                break;
            case "GetSubKatList":
                echo GetSKatList($accesskey, $param);
                break;
            case "GetJenisList":
                echo GetJenisList($accesskey, $param, $param2);
                break;
            case "GetKota":
                if($param == ""){
                    echo "";
                    break;
                }

                echo GetKotaSelect($accesskey, $param);
                break;
            case "GetUrl":
                if($param == ""){
                    echo "";
                    break;
                }

                echo GetRedirectLink($accesskey, $param);
                break;
        }
    }

    function ReqWS($accessws){
    functStart:
        // setup curl to make a call to the web service
        $session = curl_init($accessws);

        // indicates that we want the response back
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // exec curl and get the data back
        $data = curl_exec($session);

        // cek jika terjadi error
        //if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // remember to close the curl session once we are finished retrieving the data
        curl_close($session);

        // represents an element in an XML document
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');
        if($results->IsError == "true"){
            GetError($results->Status);
            if($results->Status == "106"){
                goto functStart;
            }
        }

        return $results;
    }

    function GetError($errorcode){
        switch($errorcode){
            case "106":
                AppLogin();
                break;
        }
    }

    function GetAccessKey(){
        if (!xcache_isset("demo.ubig.co.id-bronze-App_Login")) {
            AppLogin();
        }

        //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
        $results = simplexml_load_string(xcache_get("demo.ubig.co.id-bronze-App_Login"));
        return $results->AccessKey;
    };

    function AppLogin(){
        //set appkey and appsecret
        $appkey = '8Tj4Dt82m73P16Mdl01R';
        $appsecret = '64510fd9cd38da52a1ac7d234d24e3f9';

        // construct the query with our appkey ands the appsecret we have
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/App_Login?AppKey='. $appkey .'&AppSecret=' . $appsecret;

        $results = ReqWS($accessws);
        xcache_set("demo.ubig.co.id-bronze-App_Login", $results->asXML());
    }

    function GetCategory($accesskey){
        if (!xcache_isset("demo.ubig.co.id-bronze-dkategori")) {
            // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
            $bhs = "idn";

            // buat query dengan acceskey dan keyword yang kita punya
            $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Kategori_ShowAllActive?AccessKey_App='. $accesskey .'&Bhs='.$bhs;

            // ambil data
            $results = ReqWS($accessws);

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-dkategori", $results->asXML());
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $results = simplexml_load_string(xcache_get("demo.ubig.co.id-bronze-dkategori"));
        }

        return $results;
    };

    function GetCategorySub($accesskey, $seo_kat){
        if (!xcache_isset("demo.ubig.co.id-bronze-dkategorisub-".$seo_kat)) {
            $i_kat = "";
            $bhs = "idn";

            // buat query dengan acceskey dan keyword yang kita punya
            $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/KategoriSub_ShowAllActive?AccessKey_App='. $accesskey .'&i_kat='.$i_kat.'&seo_kat='.$seo_kat.'&Bhs='.$bhs;

            // ambil data
            $results = ReqWS($accessws);

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-dkategorisub-".$seo_kat, $results->asXML());
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $results = simplexml_load_string(xcache_get("demo.ubig.co.id-bronze-dkategorisub-".$seo_kat));
        }

        return $results;
    };

    function GetCategoryType($accesskey, $seo_skat){
        if (!xcache_isset("demo.ubig.co.id-bronze-dkategoritype-".$seo_skat)) {
            $bhs = "idn";

            // buat query dengan acceskey dan keyword yang kita punya
            $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/KategoriJenis_ShowAllActive?AccessKey_App='. $accesskey .'&i_skat=&seo_skat='.$seo_skat.'&Bhs='.$bhs;

            // ambil data
            $results = ReqWS($accessws);

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-dkategoritype-".$seo_skat, $results->asXML());
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $results = simplexml_load_string(xcache_get("demo.ubig.co.id-bronze-dkategoritype-".$seo_skat));
        }

        return $results;
    }

    function GetKatSelect($accesskey){
        if (!xcache_isset("demo.ubig.co.id-bronze-select-kategori")) {
            $results = GetCategory($accesskey);

            $opt="";
            foreach($results->lstdt->DtKategori as $kategori){
                $opt = $opt."<option value='".$kategori->seo."'>".$kategori->n."</option>";
            }

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-select-kategori", $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-select-kategori");
        }

        return $opt;
    }

    function GetSKatSelect($accesskey, $seo_kat){
        if (!xcache_isset("demo.ubig.co.id-bronze-select-subkategori-".$seo_kat)) {
            $results = GetCategorySub($accesskey, $seo_kat);

            $opt="";
            foreach($results->lstdt->DtKategoriSub as $skategori){
                $opt = $opt."<option value='".$skategori->seo."'>".$skategori->n."</option>";
            }

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-select-subkategori-".$seo_kat, $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-select-subkategori-".$seo_kat);
        }

        return $opt;
    }

    function GetJenisSelect($accesskey, $seo_skat){
        if (!xcache_isset("demo.ubig.co.id-bronze-select-jenis-".$seo_skat)) {
            $results = GetCategoryType($accesskey, $seo_skat);

            $opt="";
            foreach($results->lstdt->DtKategoriJenis as $jkategori){
                $opt = $opt."<option value='".$jkategori->seo."'>".$jkategori->n."</option>";
            }
            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-select-jenis-".$seo_skat, $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-select-jenis-".$seo_skat);
        }

        return $opt;
    }

    function GetKatList($accesskey){
        if (!xcache_isset("demo.ubig.co.id-bronze-list-kategori")) {
            $results = GetCategory($accesskey);

            $opt="";
            foreach($results->lstdt->DtKategori as $kategori){
                //$opt = $opt."<option value='".$kategori->seo."'>".$kategori->n."</option>";
                //$opt = $opt."<tr class='cursor-pointer item-kat' seo-kat='".$kategori->seo."'><td>".$kategori->n."</td></tr>";
                $opt = $opt."<tr><td><a href='pencarian/".$kategori->seo."' target='_blank'>".$kategori->n."</a></td><td class='vertical-middle item-kat cursor-pointer' seo-kat='".$kategori->seo."' style='width: 25px'><span class='glyphicon glyphicon-chevron-right'></span></td></tr>";
            }

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-list-kategori", $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-list-kategori");
        }

        return $opt;
    }

    function GetSKatList($accesskey, $seo_kat){
        if (!xcache_isset("demo.ubig.co.id-bronze-list-subkategori-".$seo_kat)) {
            $results = GetCategorySub($accesskey, $seo_kat);

            $opt="";
            foreach($results->lstdt->DtKategoriSub as $skategori){
                //$opt = $opt."<tr class='cursor-pointer item-skat' seo-skat='".$skategori->seo."'><td>".$skategori->n."</td></tr>";
                $opt = $opt."<tr><td><a href='pencarian/".$seo_kat."/".$skategori->seo."' target='_blank'>".$skategori->n."</a></td><td class='vertical-middle item-skat cursor-pointer' seo-skat='".$skategori->seo."' style='width: 25px'><span class='glyphicon glyphicon-chevron-right'></span></td></tr>";
            }

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-list-subkategori-".$seo_kat, $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-list-subkategori-".$seo_kat);
        }

        return $opt;
    }

    function GetJenisList($accesskey, $seo_kat, $seo_skat){
        if (!xcache_isset("demo.ubig.co.id-bronze-list-jenis-".$seo_skat)) {
            $results = GetCategoryType($accesskey, $seo_skat);

            $opt="";
            foreach($results->lstdt->DtKategoriJenis as $jkategori){
                //$opt = $opt."<tr class='cursor-pointer item-jns' seo-jns='".$jkategori->seo."'><td>".$jkategori->n."</td></tr>";
                $opt = $opt."<tr><td><a href='pencarian/".$seo_kat."/".$seo_skat."/".$jkategori->seo."' target='_blank'>".$jkategori->n."</a></td></tr>";
            }
            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-list-jenis-".$seo_skat, $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-list-jenis-".$seo_skat);
        }

        return $opt;
    }

    function GetPropinsi($accesskey){
        if (!xcache_isset("demo.ubig.co.id-bronze-dpropinsi")) {
            $Ngr = "id";

            // buat query dengan acceskey dan keyword yang kita punya
            $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/IntPropinsi_ShowAllActive?AccessKey_App='. $accesskey .'&ngr='.$Ngr;

            // ambil data
            $results = ReqWS($accessws);

            xcache_set("demo.ubig.co.id-bronze-dpropinsi", $results->asXML());
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $results = simplexml_load_string(xcache_get("demo.ubig.co.id-bronze-dpropinsi"));
        }

        return $results;
    };

    function GetKota($accesskey, $i_prop){
        if (!xcache_isset("demo.ubig.co.id-bronze-dkota-".$i_prop)) {
            $ngr = "id";

            // buat query dengan acceskey dan keyword yang kita punya
            $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/IntKota_ShowAllActive?AccessKey='.$accesskey.'&ngr='.$ngr.'&i_prop='.$i_prop;

            // ambil data
            $results = ReqWS($accessws);
            xcache_set("demo.ubig.co.id-bronze-dkota-".$i_prop, $results->asXML());
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $results = simplexml_load_string(xcache_get("demo.ubig.co.id-bronze-dkota-".$i_prop));
        }

        return $results;
    }

    function GetPropinsiSelect($accesskey){
        if (!xcache_isset("demo.ubig.co.id-bronze-select-propinsi")) {
            $results = GetPropinsi($accesskey);

            $opt="";
            foreach($results->lstdt->DtIntPropinsi as $prop){
                $opt = $opt."<option value='".$prop->_id."'>".$prop->n."</option>";
            }

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-select-propinsi", $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-select-propinsi");
        }

        return $opt;
    }

    function GetKotaSelect($accesskey, $i_prop){
        if (!xcache_isset("demo.ubig.co.id-bronze-select-kota-".$i_prop)) {
            $results = GetKota($accesskey, $i_prop);

            $opt="";
            foreach($results->lstdt->DtIntKota as $kota){
                $opt = $opt."<option value='".$kota->_id."'>".$kota->n."</option>";
            }

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-select-kota-".$i_prop, $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-select-kota-".$i_prop);
        }

        return $opt;
    }

    function GetSitus($accesskey){
        if (!xcache_isset("demo.ubig.co.id-bronze-dsitus")) {
            $ngr = "id";

            // buat query dengan acceskey dan keyword yang kita punya
            $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/SumberData_ShowAllActive?AccessKey_App='. $accesskey .'&Ngr='.$ngr;

            // ambil data
            $results = ReqWS($accessws);

            xcache_set("demo.ubig.co.id-bronze-dsitus", $results->asXML());
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $results = simplexml_load_string(xcache_get("demo.ubig.co.id-bronze-dsitus"));
        }

        return $results;
    }

    function GetSitusSelect($accesskey){
        if (!xcache_isset("demo.ubig.co.id-bronze-select-situs")) {
            $results = GetSitus($accesskey);

            $opt="";
            foreach($results->lstdt->DtSumberData as $sumber){
                $opt = $opt."<option value='".$sumber->_id."'>".$sumber->n."</option>";
            }

            //convert hasil xml menjadi string untuk disimpan di cache
            xcache_set("demo.ubig.co.id-bronze-select-situs", $opt);
        }else{
            //string yang tersimpan di cache di convert kembali menjadi xml untuk dijadikan return
            $opt = xcache_get("demo.ubig.co.id-bronze-select-situs");
        }

        return $opt;
    }

    function GetFirstAdsId($accesskey){
        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $kywd = "komputer";
        $sort = "t_psg:desc";
        $limit = "1";
        $page = "1";
        $bhs = "idn";

        // buat query dengan acceskey dan parameter lain yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Iklan_Search?AccessKey_App='. $accesskey .
            '&Ngr='.$ngr.
            '&i_sts='.$i_sts.
            '&kywd='.$kywd.
            '&seo_kat='.
            '&seo_skat='.
            '&seo_jns='.
            '&hrg_start='.
            '&hrg_end='.
            '&kond='.
            '&i_prop='.
            '&i_kot='.
            '&i_smbr='.
            '&t_psg_start='.
            '&t_psg_end='.
            '&Sort='.$sort.
            '&Limit='.$limit.
            '&Page='.$page.
            '&Atribut='.
            '&Bhs='.$bhs;

        // ambil data
        $results = ReqWS($accessws);

        return $results->lstdt->DtIklan->_id;
    }

    function GetFirstAdvId($accesskey){
        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $kywd = "komputer";
        $sort = "t_psg:desc";
        $limit = "1";
        $page = "1";
        $bhs = "idn";

        // buat query dengan acceskey dan parameter lain yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Iklan_Search?AccessKey_App='. $accesskey .
            '&Ngr='.$ngr.
            '&i_sts='.$i_sts.
            '&kywd='.$kywd.
            '&seo_kat='.
            '&seo_skat='.
            '&seo_jns='.
            '&hrg_start='.
            '&hrg_end='.
            '&kond='.
            '&i_prop='.
            '&i_kot='.
            '&i_smbr='.
            '&t_psg_start='.
            '&t_psg_end='.
            '&Sort='.$sort.
            '&Limit='.$limit.
            '&Page='.$page.
            '&Atribut='.
            '&Bhs='.$bhs;

        // ambil data
        $results = ReqWS($accessws);

        return $results->lstdt->DtIklan->i_pmsg;
    }

    function GetRedirectLink($accesskey, $i_iklan){
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $bhs = "idn";

        // buat query dengan acceskey dan parameter lain yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Iklan_Detail?AccessKey_App='. $accesskey .
            '&Ngr='.$ngr.
            '&i_sts='.$i_sts.
            '&_id='.$i_iklan.
            '&Bhs='.$bhs;

        // ambil data
        $results = ReqWS($accessws);

        $url = (string)$results->url;

        return $url;
    }

    function CreatePagging($pagging, $cur_page, $limit, $url){
        $prev_link = "";
        $next_link = "";
        $prev_rel = "";
        $next_rel = "";

        if($pagging->IsPrev =="false"){
            $prev_rel = "";
            $prev_disabled = "disabled";
        }else{
            $prev_rel = "rel='prev'";
            $prev_disabled = "";
            $prev_link = PaggingReplaceURL($url,$cur_page-1);
        }

        if($pagging->IsNext =="false"){
            $next_rel = "";
            $next_disabled = "disabled";
        }else{
            $next_rel = "rel='next'";
            $next_disabled = "";
            $next_link = PaggingReplaceURL($url,$cur_page+1);
        };

        $prev_button = "<li class='".$prev_disabled."'><a $prev_rel href='".$prev_link."'><span class='glyphicon glyphicon-chevron-left' style='line-height: 20px;'></span></a></li>";
        $next_button = "<li class='".$next_disabled."'><a $next_rel href='".$next_link."'><span class='glyphicon glyphicon-chevron-right' style='line-height: 20px;'></span></a></li>";

        $pengurang = 0;
        $page_button = "";
        $page_active = "";
        $total_data = (double)$pagging->Total;
        $total_page = ceil($total_data / $limit);
        if($cur_page>$total_page){$cur_page=1;}

        if($cur_page > 1){
            if($cur_page >= ($total_page-1)){
                $mulai = $total_page - 4;

                if($mulai <= 0){
                    $mulai = 1;
                }

                //echo "m2=".$mulai;
                for($j = $mulai; $j <= $total_page; $j++) {
                    if($j == $cur_page){$page_active = "class='active'";}else{$page_active = "";}
                    $page_button = $page_button."<li ".$page_active."><a ".PaggingSetRel($cur_page,$j)." href='".PaggingReplaceURL($url,$j)."'>".$j."</a></li>";

                    $pengurang += 1;
                }
            }else{
                $mulai = $cur_page - 2;
                $sampai = $cur_page - 1;

                if($mulai <= 0){
                    $mulai = 1;
                }

                for($j = $mulai; $j <= $sampai; $j++) {
                    if($j == $cur_page){$page_active = "class='active'";}else{$page_active = "";}
                    $page_button = $page_button."<li ".$page_active."><a ".PaggingSetRel($cur_page,$j)." href='".PaggingReplaceURL($url,$j)."'>".$j."</a></li>";

                    $pengurang += 1;
                }
            }
        }

        if($total_page < 5){
            for($i = 1; $i <= $total_page - $pengurang; $i++){
                if($i == 1){
                    $pagenum = $cur_page-($i-1);
                    $page_button = $page_button."<li class='active'><a ".PaggingSetRel($cur_page,$pagenum)." href='".PaggingReplaceURL($url,$pagenum)."'>".$pagenum."</a></li>";
                }else{
                    $page_button = $page_button."<li><a ".PaggingSetRel($cur_page,$i)." href='".PaggingReplaceURL($url,$i)."'>".$i."</a></li>";
                }
            }
        }else{
            $page_num = $cur_page;
            for($i = 1; $i <= 5 - $pengurang; $i++){
                if($page_num == $cur_page){
                    $page_button = $page_button."<li class='active'><a ".PaggingSetRel($cur_page,$page_num)." href='".PaggingReplaceURL($url,$page_num)."'>".$page_num."</a></li>";
                }else{
                    $page_button = $page_button."<li><a ".PaggingSetRel($cur_page,$page_num)." href='".PaggingReplaceURL($url,$page_num)."'>".$page_num."</a></li>";
                }

                $page_num += 1;
            }
        }

        $pagging_res = "<span style='text-align: center;'>Data ".$pagging->InfoPage."</span><br><ul class='pagination'>".$prev_button.$page_button.$next_button."</ul>";

        return $pagging_res;
    }


    function PaggingReplaceURL($url, $page){
        //return $page;
        $pattern = '/\?page=(\d+)/';
        $replace =  '?page='.$page;

        if(preg_match($pattern, $url) == 0){
            return $url."?page=".$page;
            //return preg_replace($pattern, $replace, $url);
        }else{
            return preg_replace($pattern, $replace, $url);
        }
    }

    function PaggingSetRel($page_cur, $set_page){
        if($set_page < $page_cur){
            return "rel='prev'";
        }elseif($set_page > $page_cur){
            return "rel='next'";
        }else{
            return "";
        }
    }

    function UrlSeo($string){
        if(!is_null($string)){
            if(strlen($string)>170){
                $string=substr($string,0,170);
            }
        }
        $result=preg_replace("(\(|\~|\!|\@|\#|\$|\%|\^|\&|\*|\-|\+|\=|\{|\}|\[|\]|\||\"\|\;|\:|\|\'|\<|\>|\,|\.|\?|\/|\s|\))", "-", $string);
        $result=preg_replace("(-+)", "-", $result);
        return trim(strtolower($result),"-");
    }
?>