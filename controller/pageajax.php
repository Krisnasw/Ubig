<?php
    include("globalfunction.php");
    $action = $_POST['action'];

    switch($action){
        case "Accesskey":
            echo Acceskey();
            break;
        case "PencarianIklan":
            echo PencarianIklan();
            break;
        case "JumlahIklan":
            echo JumlahIklan();
            break;
        case "DetailIklan":
            echo DetailIklan();
            break;
        case "IklanSejenis":
            echo IklanSejenis();
            break;
        case "DetailPemasang":
            echo DetailPemasang();
            break;
        case "DaftarIklanPemasang":
            echo DaftarIklanPemasang();
            break;
        case "DaftarSumberData":
            echo DaftarSumberData();
            break;
        case "DaftarKategori":
            echo DaftarKategori();
            break;
        case "DaftarKategoriSub":
            echo DaftarKategoriSub();
            break;
        case "DaftarKategoriJenis":
            echo DaftarKategoriJenis();
            break;
        case "DaftarPropinsi":
            echo DaftarPropinsi();
            break;
        case "DaftarKota":
            echo DaftarPropinsi();
            break;
        case "DaftarUang":
            echo DaftarUang();
            break;
        case "DetailKurs":
            echo DetailKurs();
            break;
    }

    function Acceskey(){
        $ajaxreturn = "";

        //set appkey and appsecret
        $appkey = '8Tj4Dt82m73P16Mdl01R';
        $appsecret = '64510fd9cd38da52a1ac7d234d24e3f9';

        // construct the query with our appkey ands the appsecret we have
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/App_Login?AppKey='. $appkey .'&AppSecret=' . $appsecret;
        //echo $accessws;

        // setup curl to make a call to the web service
        $session = curl_init($accessws);

        // indicates that we want the response back
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // exec curl and get the data back
        $data = curl_exec($session);

        // remember to close the curl session once we are finished retrieving the data
        curl_close($session);

        // represents an element in an XML document
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // use the data
        $IsError = $results->IsError;
        $Status = $results->Status;
        $AccessKey = $results->AccessKey;
        $AppId = $results->AppId;
        $AppNm = $results->AppNm;
        $AppLsNgr = $results->AppLsNgr;

        $penggunaandata = "<tr>".
                            "<td>".$IsError."</td>".
                            "<td>".$Status."</td>".
                            "<td>".$AccessKey."</td>".
                            "<td>".$AppId."</td>".
                            "<td>".$AppNm."</td>".
                            "<td>".$AppLsNgr."</td>".
                        "</tr>";

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function PencarianIklan(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $kywd = "komputer";
        $sort = "t_psg:desc";
        $limit = "10";
        $page = "45";
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

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtIklan sebagai iklan untuk diolah sesuai kebutuhan
        $cls_offset = "";
        $cnt_row = 1;
        $kond_iklan = "<span class='label label-success'>Baru</span>";
        foreach($results->lstdt->DtIklan as $iklan){
            $harga = (double)$iklan->hrg;
            if($cnt_row==1){$penggunaandata = $penggunaandata."<div class='clearfix'>";};
            if($iklan->kond==1){$kond_iklan = $penggunaandata."<span class='label label-warning'>Bekas</span>";};
            if($iklan->isdflt_pmsg==0){$n_smbr = "@".$iklan->n_smbr;}else{$n_smbr="";};
            if($iklan->n_prop!=""){$n_prop = ", ".$iklan->n_prop;}else{$n_prop="";};
            if($iklan->n_kot!=""){$n_kot = $iklan->n_kot;}else{$n_kot="Indonesia";};

            $penggunaandata = $penggunaandata.
            "<div class='col-md-5 clearfix ".$cls_offset."' style='padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #c0c0c0; '>".
                "<div class='col-lg-4 col-md-12 col-sm-12 text-center'>".
                    "<img alt='140x140' class='img-rounded' data-src='holder.js/140x140' style='width: 140px; height: 140px; margin-right: 10px;' src='".$iklan->gs1."' data-holder-rendered='true'>".
                "</div>".
                "<div class='col-lg-8 col-md-12 col-sm-12 list-detail clearfix'>".
                    "<h4 class='list-title'><a href='003-detail-iklan.html?id=".$iklan->_id."'>".$iklan->n."</a></h4>".
                    $kond_iklan."<br><br>".
                    "<a href='004-detail-pemasang.html?id=".$iklan->i_pmsg."'>".$iklan->n_pmsg."</a> ".$n_smbr."<br>".
                    $n_kot.$n_prop.
                    "<h3 class='pull-right'>Rp. ".number_format($harga,0,",",".")."</h3>".
                "</div>".
            "</div>";

            if($cnt_row==2){$penggunaandata = $penggunaandata."</div>"; $cnt_row=0;};

            $cnt_row = $cnt_row + 1;

            if($cls_offset != ""){
                $cls_offset = "";
            }else{
                $cls_offset = "col-md-offset-1";
            }
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function JumlahIklan(){
    functStart :
        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $kywd = "komputer";
        $bhs = "idn";

        // buat query dengan acceskey dan keyword yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Iklan_Total?AccessKey_App='. $accesskey .
            '&Ngr='.$ngr.
            '&i_sts='.$i_sts.
            '&kywd='.$kywd.
            '&seo_kat='.
            '&seo_skat='.
            '&seo_jns='.
            '&kond='.
            '&i_prop='.
            '&i_kot='.
            '&i_smbr='.
            '&Bhs='.$bhs;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');
        if($results->IsError == "true"){
            GetError($results->Status);
            if($results->Status){
                goto functStart;
            }
        }

        // gunakan data
        $IsError = $results->IsError;
        $Output = $results->Output;
        $Status = $results->Status;

        $penggunaandata = "<tr>".
                            "<td>".$IsError."</td>".
                            "<td>".$Output."</td>".
                            "<td>".$Status."</td>".
                        "</tr>";

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DetailIklan(){
        //buat pengambilan accesskey sebagai fungsi untuk mempermudah atau metode lain yang sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $_id = GetFirstAdsId($accesskey);
        $bhs = "idn";

        // buat query dengan acceskey dan parameter lain yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Iklan_Detail?AccessKey_App='. $accesskey .
            '&Ngr='.$ngr.
            '&i_sts='.$i_sts.
            '&_id='.$_id.
            '&Bhs='.$bhs;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // gunakan data
        $namaiklan = $results->n;
        $namapemasang = $results->n_pmsg;
        $idpemasang  = $results->i_pmsg;
        $namasumber = $results->n_smbr;
        $kota = $results->n_kot;
        $provinsi = $results->n_prop;
        $harga = (double)$results->hrg;
        $deskripsi = $results->desk;
        $gmb1 = $results->gs1;
        $gmb2 = $results->gs2;
        $gmb3 = $results->gs3;

        if($results->kond==1){
            $kond_iklan = "<span class='label label-warning'>Bekas</span>";
        }else{
            $kond_iklan = "<span class='label label-success'>Baru</span>";
        };

        $penggunaandata = "<div class='col-md-12' style='margin-bottom: 10px;'>".
                            "<img alt='140x140' class='img-rounded pull-left' data-src='holder.js/140x140' style='width: 140px; height: 140px; margin-right: 10px;' src='".$gmb1."' data-holder-rendered='true'>".
                            "<h4 style='margin-top: 0;'>".$kond_iklan." - ".$namaiklan."<a class='btn btn-danger pull-right' href='005-redirect.html?id=".$_id."'>Kunjungi Sumber</a></h4>".
                            "<a href='004-detail-pemasang.html?id=".$idpemasang."'>".$namapemasang."</a> @".$namasumber." - ".$kota.", ".$provinsi.
                            "<h3>Rp. ".number_format($harga,0,',','.')."</h3>".
                            "</div>".
                            "<div class='col-md-12' style='margin-bottom: 10px;'>".
                            "<hr>".
                            "<div>".$deskripsi."</div>".
                        "</div>";

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function IklanSejenis(){
        $penggunaandata = "";

        //buat pengambilan accesskey sebagai fungsi untuk mempermudah atau metode lain yang sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $kywd = "motor";
        $sort = "t_psg:desc";
        $limit = "3";
        $bhs = "idn";

        // construct the query with our $accesskey and the query we have
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Iklan_Similiar?AccessKey_App='. $accesskey .
            '&Ngr='.$ngr.
            '&i_sts='.$i_sts.
            '&kywd='.$kywd.
            '&seo_kat='.
            '&seo_skat='.
            '&seo_jns='.
            '&Sort='.$sort.
            '&Limit='.$limit.
            '&Bhs='.$bhs;

        // setup curl to make a call to the web service
        $session = curl_init($accessws);

        // indicates that we want the response back
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // exec curl and get the data back
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // remember to close the curl session once we are finished retrieving the data
        curl_close($session);

        // represents an element in an XML document
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');
        foreach($results->lstdt->DtIklan as $iklan){
            $harga = (double)$iklan->hrg;
            $penggunaandata = $penggunaandata."<div class='col-md-12' style='margin-bottom: 10px; '>".
                                "<h4 style='margin-top: 0;'><a href='003-detail-iklan.html?id=".$iklan->_id."'>".$iklan->n."</a><span class='pull-right'>Rp. ".number_format($harga,0,',','.')."</span></h4>".
                                "<a href='004-detail-pemasang.html?id=".$iklan->i_pmsg."'>".$iklan->n_pmsg."</a> @".$iklan->n_smbr." - ".$iklan->n_kot.", ".$iklan->n_prop.
                                "<hr>".
                            "</div>";
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DetailPemasang(){
        $penggunaandata = "";

        //buat pengambilan accesskey sebagai fungsi untuk mempermudah atau metode lain yang sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $_id = GetFirstAdvId($accesskey);

        // buat query dengan acceskey dan parameter lain yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Pemasang_Detail?AccessKey_App='. $accesskey .
            '&Ngr='.$ngr.
            '&i_sts='.$i_sts.
            '&_id='.$_id;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // gunakan data
        $namapemasang = $results->n;
        $namasumber = $results->n_smbr;
        $gmb = $results->g;
        $kota = $results->n_kot;
        $provinsi = $results->n_prop;
        $no_hp = $results->hp;

        $penggunaandata = $penggunaandata."<img alt='140x140' class='img-rounded pull-left' data-src='holder.js/140x140' style='width: 140px; height: 140px; margin-right: 10px;' src='data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTQweDE0MDwvdGV4dD48L2c+PC9zdmc+' data-holder-rendered='true'>".
                            "<h4 style='margin-top: 0;'>".$namapemasang."</h4>".
                            "@".$namasumber." - ".$provinsi.
                            "<br/>".$no_hp;

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DaftarIklanPemasang(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $ngr = "id";
        $i_sts = "555e8f32b05097100cb1741e";
        $i_pmsg = GetFirstAdvId($accesskey);
        $sort = "t_psg:desc";
        $limit = "6";
        $page = "1";

        // buat query dengan acceskey dan parameter lain yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Iklan_Pemasang?AccessKey_App='. $accesskey .
            '&Ngr='.$ngr.
            '&i_sts='.$i_sts.
            '&i_pmsg='.$i_pmsg.
            '&Sort='.$sort.
            '&Limit='.$limit.
            '&Page='.$page;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtIklan sebagai iklan untuk diolah sesuai kebutuhan
        $cls_offset = "";
        $cnt_row = 1;
        $kond_iklan = "<span class='label label-success'>Baru</span>";
        foreach($results->lstdt->DtIklan as $iklan){
            $harga = (double)$iklan->hrg;
            if($cnt_row==1){$penggunaandata = $penggunaandata."<div class='clearfix'>";};
            if($iklan->kond==1){$kond_iklan = "<span class='label label-warning'>Bekas</span>";};

            $penggunaandata = $penggunaandata.
                "<div class='col-md-5 clearfix ".$cls_offset."' style='padding-bottom: 10px; margin-bottom: 10px; border-bottom: 1px solid #c0c0c0; '>".
                "<div class='col-lg-4 col-md-12 col-sm-12 text-center'>".
                    "<img alt='140x140' class='img-rounded' data-src='holder.js/140x140' style='width: 140px; height: 140px; margin-right: 10px;' src='".$iklan->gs1."' data-holder-rendered='true'>".
                "</div>".
                "<div class='col-lg-8 col-md-12 col-sm-12 list-detail clearfix'>".
                    "<h4 class='list-title'><a href='003-detail-iklan.html?id=".$iklan->_id."'>".$iklan->n."</a></h4>".
                    $kond_iklan."<br><br>".
                    "<a href='004-detail-pemasang.html?id=".$iklan->i_pmsg."'>".$iklan->n_pmsg."</a> @".$iklan->n_smbr."<br>".
                    $iklan->n_kot.",".$iklan->n_prop.
                    "<h3 class='pull-right'>Rp. ".number_format($harga,0,",",".")."</h3>".
                    "</div>".
                "</div>";

            if($cnt_row==2){$penggunaandata = $penggunaandata."</div>"; $cnt_row=0;};

            $cnt_row = $cnt_row + 1;

            if($cls_offset != ""){
                $cls_offset = "";
            }else{
                $cls_offset = "col-md-offset-1";
            }
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DaftarSumberData(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $ngr = "id";

        // buat query dengan acceskey dan keyword yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/SumberData_ShowAllActive?AccessKey_App='. $accesskey .'&Ngr='.$ngr;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtSumberData sebagai sumber untuk diolah sesuai kebutuhan
        foreach($results->lstdt->DtSumberData as $sumber){
            $penggunaandata = $penggunaandata."<option value='".$sumber->_id."'>".$sumber->n."</option>";
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DaftarKategori(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $bhs = "idn";

        // buat query dengan acceskey dan keyword yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/Kategori_ShowAllActive?AccessKey_App='. $accesskey .'&Bhs='.$bhs;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtKategori sebagai kategori untuk diolah sesuai kebutuhan
        foreach($results->lstdt->DtKategori as $kategori){
            $penggunaandata = $penggunaandata."<option value='".$kategori->_id."'>".$kategori->n."</option>";
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DaftarKategoriSub(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $i_kat = "538bd41242bc9314cc1a42aa";
        $seo_kat = "";
        $bhs = "idn";

        // buat query dengan acceskey dan keyword yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/KategoriSub_ShowAllActive?AccessKey_App='. $accesskey .'&i_kat='.$i_kat.'&seo_kat='.$seo_kat.'&Bhs='.$bhs;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtKategoriSub sebagai kategorisub untuk diolah sesuai kebutuhan
        foreach($results->lstdt->DtKategoriSub as $kategorisub){
            $penggunaandata = $penggunaandata."<option value='".$kategorisub->_id."'>".$kategorisub->n."</option>";
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DaftarKategoriJenis(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $i_skat = "53950e8442bc9316701e7944";
        $seo_skat = "";
        $bhs = "idn";

        // buat query dengan acceskey dan keyword yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/KategoriJenis_ShowAllActive?AccessKey_App='. $accesskey .'&i_skat='.$i_skat.'&seo_skat='.$seo_skat.'&Bhs='.$bhs;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtKategoriJenis sebagai kategorijenis untuk diolah sesuai kebutuhan
        foreach($results->lstdt->DtKategoriJenis as $kategorijenis){
            $penggunaandata = $penggunaandata."<option value='".$kategorijenis->_id."'>".$kategorijenis->n."</option>";
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DaftarPropinsi(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $Ngr = "id";

        // buat query dengan acceskey dan keyword yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/IntPropinsi_ShowAllActive?AccessKey_App='. $accesskey .'&ngr='.$Ngr;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtIntPropinsi sebagai prop untuk diolah sesuai kebutuhan
        foreach($results->lstdt->DtIntPropinsi as $prop){
            $penggunaandata = $penggunaandata."<option value='".$prop->_id."'>".$prop->n."</option>";
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DaftarKota(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $i_prop = "52c6280b2af6b8454721b8d4";
        $ngr = "id";

        // buat query dengan acceskey dan keyword yang kita punya
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/IntKota_ShowAllActive?AccessKey='.$accesskey.'&ngr='.$ngr.'&i_prop='.$i_prop;

        // atur curl untuk membuat panggilan ke web service
        $session = curl_init($accessws);

        // menandakan kita menginginkan respon kembali
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // eksekusi curl dan ambil data kembali
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // ingat untuk menutup sesi curl setelah menerima data
        curl_close($session);

        // parsing data ke dokumen xml
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtIntKota sebagai kota untuk diolah sesuai kebutuhan
        foreach($results->lstdt->DtIntKota as $kota){
            $penggunaandata = $penggunaandata."<option value='".$kota->_id.">".$kota->n."</option>";
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DaftarUang(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();

        // construct the query with our appkey ands the appsecret we have
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/IntUang_ShowAllActive?AccessKey_App='. $accesskey;

        // setup curl to make a call to the web service
        $session = curl_init($accessws);

        // indicates that we want the response back
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // exec curl and get the data back
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // remember to close the curl session once we are finished retrieving the data
        curl_close($session);

        // represents an element in an XML document
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // lakukan looping untuk setiap elemen data DtIntPropinsi sebagai prop untuk diolah sesuai kebutuhan
        foreach($results->lstdt->DtIntUang as $uang){
            $penggunaandata = $penggunaandata."<option value='".$uang->_id."'>".$uang->k." - ".$uang->n."</option>";
        }

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }

    function DetailKurs(){
        $penggunaandata = "";

        // fungsi mengambil accesskey untuk mempermudah atau bisa menggunakan metode lain sesuai kebutuhan
        $accesskey = (string)GetAccessKey();
        $k_uang1 = "IDR";
        $k_uang2 = "USD";

        // construct the query with our appkey ands the appsecret we have
        $accessws = 'http://demoapi.ubig.co.id/api/price.asmx/IntCurs_Detail?AccessKey='. $accesskey .'&k_uang=' . $k_uang1 .'&k_uang2=' . $k_uang2;

        // setup curl to make a call to the web service
        $session = curl_init($accessws);

        // indicates that we want the response back
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        // exec curl and get the data back
        $data = curl_exec($session);

        // cek jika terjadi error
        if(curl_errno($session)){return 'CURL Error: ' . curl_error($session);}

        // remember to close the curl session once we are finished retrieving the data
        curl_close($session);

        // represents an element in an XML document
        $results = new SimpleXMLElement($data) or die('Error: Cannot create object');

        // use the data
        $IsError = $results->IsError;
        $Status = $results->Status;
        $id = $results->_id;
        $k_uang = $results->k_uang;
        $k_uang2 = $results->k_uang2;
        $curs = $results->curs;
        $tgl = $results->tgl;

        $penggunaandata = "<tr>".
                            "<td>".$IsError."</td>".
                            "<td>".$Status."</td>".
                            "<td>".$id."</td>".
                            "<td>".$k_uang."</td>".
                            "<td>".$k_uang2."</td>".
                            "<td>".$curs."</td>".
                            "<td>".$tgl."</td>".
                        "</tr>";

        $ajaxreturn['hasilxml'] = htmlentities($data);
        $ajaxreturn['penggunaandata'] = $penggunaandata;

        return json_encode($ajaxreturn);
    }
?>