<?php

/**
*  Created By Intive Studio
*/
class Kendaraan
{

	public function admLogin($user, $pass)
	{
		global $db;
			
		function antiinjection($data)
		{
			$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		  	return $filter_sql;
		}

		$username = antiinjection($user);
		$password = antiinjection($pass);

		$login = mysqli_query($db, "SELECT * FROM admin WHERE username='$username' AND password='$password' ");
		$ketemu = mysqli_num_rows($login);
		$exec = mysqli_fetch_array($login);

		if ($ketemu > 0) {
			# code...
			session_start();

			$_SESSION['tipeuser'] = $exec['username'];
			$_SESSION['nama'] = $exec['nama'];
			$_SESSION['email'] = $exec['email'];
			$_SESSION['passuser'] = $exec['password'];

			$sid_lama = session_id();

			session_regenerate_id();

			$sid_baru = session_id();

			echo "<script>alert('Selamat Datang $_SESSION[nama]'); window.location = 'media.php?mod=home'</script>";
		}
		else
		{
			echo "<script>alert('Gagal Login'); window.location.href = 'index.php' </script>";
		}
	}

	public function showBlog()
	{
		global $db;

		$q = "SELECT * FROM news ORDER BY id DESC";
		$exec = $db->query($q);

		return $exec;
	}

	public function Seo()
	{
		global $db;

		$q = "SELECT * FROM seo";
		$sql = $db->query($q);

		return $sql;
	}

	public function Navbar()
	{
		global $db;

		$c = "SELECT * FROM navbar";
		$sql = $db->query($c);

		return $sql;
	}

	public function Subscribe()
	{
		global $db;

		$q = "SELECT * FROM subscribe";
		$sql = $db->query($q);

		return $sql;
	}

	public function Acceskey(){
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

	public function CallApiPrice($uri)
	{
		$PriceApiURL = "http://idapiv2.ubig.co.id/ws/price.asmx/";
		try {
			$apiurl =  str_replace('', '%20', $PriceApiURL.$uri);
			$ch = curl_init($apiurl);
			curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
			$data = curl_exec($ch);
			curl_close($ch);

			if (substr($data, 0, 5) !="<?xml") {
				# code...
				return false;
			}

			$xml_snippet = simplexml_load_string($data);
			$result_array = (json_encode($xml_snippet, JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_APOS));

			$result_json = json_decode($result_array, true);
			return $result_array;
		} catch (Exception $e) {
			return false;
		}
	}

	public function UBIGAppLoginPrice()
	{
		$LoginResult = $this->CallApiPrice("App_Login?AppKey=8Tj4Dt82m73P16Mdl01R&AppSecret=64510fd9cd38da52a1ac7d234d24e3f9");

		if ($LoginResult["IsError"]=="false") {
			# code...
			$AccessKey = (String)$LoginResult["AccessKey"];
			return $AccessKey;
		} else {
			error_log("Error Gagal Login API UBIG. Error Code[".$LoginResult->Status."] Message [".$LoginResult->ErrMessage."]");
				exit();
		}

		if ($result_json["IsError"]=="true") {
			# code...
			if ($result_json["Status"]=="106") {
				# code...
				$AccessKey = $this->UBIGAppLoginPrice();
				$uri = preg_replace("/AccessKey=([^\&]*)\&/", "AccessKey=".$AccessKey."&", $uri);
				$uri = preg_replace("/AccessKey_App=([^\&]*)\&/", "AccessKey_App=".$AccessKey."&", $uri);
				$uri = preg_replace("/AccessKey_Memb=([^\&]*)\&/", "AccessKey_Memb=".$AccessKey."&", $uri);
			}
		} else {
			return false;
		}
	}

	// function __construct()
	// {
	// 	$configcache = array(
	// 		"storage" => "sqlite",
	// 		"path" => "/cache");
	// 	CacheManager::setup($configcache);
	// }

	function CacheSet($key, $value, $time=O)
	{
		return CacheManager::set($key, $value, 600);
	}

	function CacheGet($key)
	{
		return CacheManager::get($key);
	}

	function CacheExists($key)
	{
		$CachedString = CacheManager::get($key);
		return (is_null($CachedString)?false:true);
	}

	public function GetAccessKeyPrice()
	{
		if ($this->CacheExist("AccessKeyPrice")) {
			# code...
			return $this->CacheGet("AccessKeyPrice");
		} else {
			$AccessKey = $this->UBIGAppLoginPrice();
			$this->CacheSet("AccessKeyPrice", $AccessKey);
		}
	}

	public function GetListProdukTerbaru()
	{
		$URI = "Iklan_Search?AccessKey_App=".$this->GetAccessKeyPrice."&Ngr=id"."&i_sts=xxxIDSITUSxxx&kywd="."&seo_kat="."&seo_skat="."&seo_jns="."&hrg_start="."&hrg_end="."&kond="."&i_prop="."&i_kot="."&i_smbr="."&t_psg_start="."&t_psg_end="."&Sort=t_psg:desc"."&Limit=10"."&Page="."&Atribut=&Bhs=";
		return $this->CallApiPrice(($URI));
	}

	public function GetListKategori()
	{
		if ($this->CacheExist("ListKategori")) {
			# code...
			return $this->CacheGet("ListKategori");
		} else {
			$Kategori = $this->CallApiPrice("Kategori_ShowAllActive?AccessKey_App=".$this->GetAccessKeyPrice()."&Bhs=idn");
			$this->CacheSet("ListKategori".$Kategori);
			return $Kategori;
		}
	}

	public function GetListProvinsi()
	{
		if ($this->CacheExist("ListProvinsi")) {
			# code...
			return $this->CacheGet("ListProvinsi");
		} else {
			$Provinsi = $this->CallApiPrice("lntPropinsi_ShowAllActive?AccessKey_App=".$this->GetAccessKeyPrice()."&ngr=id");
			$this->CacheSet("ListProvinsi".$Provinsi);
			return $Provinsi;
		}
	}

	public function GetListSumber()
	{
		if ($this->CacheExist("ListSumber")) {
			# code...
			return $this->CacheGet("ListSumber");
		} else {
			$Sumber = $this->CallApiPrice("Situs_ShowSumberData?AccessKey_App=".$this->GetAccessKeyPrice()."&Ngr=id"."&i_sts=http://carikendaraan.id/");
			$this->CacheSet("ListSumber", $Sumber);
			return $Sumber;
		}
	}

	public function SearchAdvance()
	{
		$URI = "Iklan_Search?AccessKey_App="."&Ngr=id"."&i_sts=xxxIDSITUSxxx&kywd="."&seo_kat="."&seo_skat="."&seo_jns="."&hrg_start="."&hrg_end="."&kond="."&i_prop="."&i_kot="."&i_smbr="."&t_psg_start="."&t_psg_end="."&Sort=t_psg:desc"."&Limit=10"."&Page="."&Atribut=&Bhs=";
		return $this->CallApiPrice(($URI));
	}

	public function GetDetailHarga($IDHarga)
	{
		$ApiURL = "Iklan_Detail?AccessKey_App=".$this->GetAccessKeyPrice().'&Ngr=id'.'&_id'.$IDHarga.'&i_sts=http://carikendaraan.id/'.'&Bhs=idn';

		if ($this->app->CacheExist("Iklan-".$IDHarga)) {
			# code...
			return $this->CacheGet("Iklan-".$IDHarga);
		} else {
			$Result = $this->CallApiPrice($ApiURL);
			if ($check["IsError"]=="false") {
				# code...
				$this->app->CacheSet("Iklan-".$IDHarga, $Result);
				return $Result;
			} else {
				return $Result;
			}
		}
		return $this->CallApiPrice($ApiURL);
	}
}

?>