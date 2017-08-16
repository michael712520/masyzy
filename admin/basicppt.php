<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . "includes/fckeditor/fckeditor.php");
require_once(ROOT_PATH . 'includes/cls_image.php');
require_once(ROOT_PATH . 'includes/inc_constant.php');
require_once(ROOT_PATH . 'includes/cls_ecshop.php');
require_once(ROOT_PATH . 'includes/cls_error.php');
require_once(ROOT_PATH . 'includes/lib_time.php');
require_once(ROOT_PATH . 'includes/lib_base.php');
require_once(ROOT_PATH . 'includes/lib_common.php');
require_once(ROOT_PATH . 'includes/lib_main.php');
require_once(ROOT_PATH . 'includes/lib_insert.php');
require_once(ROOT_PATH . 'includes/lib_goods.php');
require_once(ROOT_PATH . 'includes/lib_article.php');

set_include_path(ROOT_PATH . 'admin/PHPPowerpoint/Classes/');
$exc = new exchange($ecs->table('goods'), $db, 'goods_id', 'goods_name');
/** PHPPowerPoint */
include 'PHPPowerPoint.php';

/** PHPPowerPoint_IOFactory */
include 'PHPPowerPoint/IOFactory.php';

$path='PHPPowerpoint/image';
$exc   = new exchange($ecs->table("program"), $db, 'programId', 'name');
function getFile($dir) {
	$fileArray[]=NULL;
	$imageurl=$_COOKIE['pptimageurl'];
	if (false != ($handle = opendir ( $dir ))) {
		$i=0;
		while ( false !== ($file = readdir ( $handle )) ) {
			//去掉"“.”、“..”以及带“.xxx”后缀的文件
			if ($file != "." && $file != ".."&&strpos($file,".")) {
				$fileArray[$i]="PHPPowerpoint/image/".$file;
				if($i==0&&$imageurl==null){
					setcookie("pptimageurl",$fileArray[$i]);
				}
					
				if($i==100){
					break;
				}
				$i++;
			}
		}
		//关闭句柄
		closedir ($handle);
	}
	return $fileArray;
}
$arraylist=getFile($path);
$smarty->assign('arraylist', $arraylist);
if ($_REQUEST['act']=="left")
{
	$imageurl=$_COOKIE['pptimageurl'];

	$arrbt = array();
	$arrjw = array();
	$arr = array();
	if($_GET['listsp']=='addsp'){
		//$goodslist=$_COOKIE['goodslist'];
		$goodslist=$_SESSION['goodslist'];
		$goodslist=unserialize(stripslashes($goodslist));
		$arrbt=$_COOKIE['arrbt'];
		$arrjw=$_COOKIE['arrjw'];
		$arrbt=unserialize(stripslashes($arrbt));
		$arrjw=unserialize(stripslashes($arrjw));
		$goods_id=$_GET['goods_id'];
		if($_GET['goods_id']!=null){
			unset($goodslist[$goods_id]);
		}
		$smarty->assign('programlist',$goodslist);
		$smarty->assign('pptimageurl',$imageurl);
		$smarty->assign('programbt',$arrbt);
		$smarty->assign('programjw',$arrjw);
		$smarty->display('basicppt_left.htm');

	}elseif($_GET['view']=='addsp'){
		$goods_id=$_GET['goods_id'];
		//更具商品ID获取商品信息
		$row=get_goodsppt($db,$goods_id,$imageurl);
		//$goodslist=$_COOKIE['goodslist'];
	 $goodslist=$_SESSION['goodslist'];
	 $goodslist=unserialize(stripslashes($goodslist));
		$goodslist[$row['goods_id']]['goods_id']=$row['goods_id'];
		$goodslist[$row['goods_id']]['imageurl']=$imageurl;
		$goodslist[$row['goods_id']]['name']      = $row['name'];
		$goodslist[$row['goods_id']]['pinpai']    = $row['pinpai'];
		$goodslist[$row['goods_id']]['imagesp']   = $row['imagesp'];
		$goodslist[$row['goods_id']]['xinghao']   = $row['xinghao'];
		$goodslist[$row['goods_id']]['scj']       =  $row['scj'] ;
		$goodslist[$row['goods_id']]['yhj']       =  $row['yhj'] ;
		$goodslist[$row['goods_id']]['spms']      = $row['spms'];
		$message=$goodslist;
		$_SESSION['goodslist']=serialize($goodslist);
 
		$arrbt=$_COOKIE['arrbt'];
		$arrjw=$_COOKIE['arrjw'];
		$arrbt=unserialize(stripslashes($arrbt));
		$arrjw=unserialize(stripslashes($arrjw));

 
		$smarty->assign('pptimageurl',$imageurl);
		$smarty->assign('programbt',$arrbt);
		$smarty->assign('programjw',$arrjw);
		$smarty->assign('programlist',$goodslist);
		$smarty->display('basicppt_left.htm');

	}else{
		$programId=$_GET['programId'];
		if($programId!=null){
			if($_GET['view']=="fa"){
				setcookie("goodslist",null);
			}
			setcookie("programId",$programId);
			$sql="select p.name,p.add_time,p.remark,pl.* from ".$GLOBALS['ecs']->table('programlist')."  as pl left   join ".$GLOBALS['ecs']->table('program')."  as p on p.programId=pl.programId where p.programId=$programId order by sort asc";
			$res = $GLOBALS['db']->selectLimit($sql, 1000, 0);
			$message=$sql;
			$i=0;
			while ($rows = $GLOBALS['db']->fetchRow($res))
			{
				$i++;
				if($rows['sort']==1){
					$arrbt['programlistid']=$rows['programlistid'];
					$arrbt['imageurl']=$imageurl;
					$arrbt['btname'] =$rows['btname'];
					$arrbt['btms'] =$rows['btms'];
					setcookie("arrbt",serialize($arrbt));

				}elseif ($rows['sort']==1000){
					$arrjw['programlistid']=$rows['programlistid'];
					$arrjw['imageurl']=$imageurl;
					$arrjw['jwname'] = $rows['jwname'];
					$arrjw['jwms']=$rows['jwms'];
					setcookie("arrjw",serialize($arrjw));
				}else{

					$goodslist[$rows['goods_id']]['goods_id']=$rows['goods_id'];
					$goodslist[$rows['goods_id']]['imageurl']=$imageurl;
					$goodslist[$rows['goods_id']]['name']      = $rows['name'];
					$goodslist[$rows['goods_id']]['pinpai']    = $rows['pinpai'];
					$goodslist[$rows['goods_id']]['imagesp']   = $rows['imagesp'];
					$goodslist[$rows['goods_id']]['xinghao']   = $rows['xinghao'];
					$goodslist[$rows['goods_id']]['scj']       =  $rows['scj'];
					$goodslist[$rows['goods_id']]['yhj']       =  $rows['yhj'];
					$goodslist[$rows['goods_id']]['spms']      = $rows['pptms'];

				}
			}
			if($goodslist!=null){
				//setcookie("goodslist",serialize($goodslist));
				$_SESSION['goodslist']=serialize($goodslist);
			}else{
			}
		}
		//$smarty->assign('message',var_dump($goodslist));
		$smarty->assign('pptimageurl',$imageurl);
		$smarty->assign('programbt',$arrbt);
		$smarty->assign('programjw',$arrjw);
		$smarty->assign('programlist',$goodslist);
		$smarty->display('basicppt_left.htm');

	}



}else if($_REQUEST['act']=="main"){
	$article_list = get_articleslist();
	$smarty->assign('full_page',    1);
	$smarty->assign('article_list',    $article_list['arr']);
	$smarty->assign('filter',          $article_list['filter']);
	$smarty->assign('record_count',    $article_list['record_count']);
	$smarty->assign('page_count',      $article_list['page_count']);
	$sort_flag  = sort_flag($article_list['filter']);
	$smarty->assign($sort_flag['tag'], $sort_flag['img']);
	$smarty->display('basicppt_listfa.htm');
}else if($_REQUEST['act']=="listshopedit"){
	//$goodslist=$_COOKIE['goodslist'];
	$goodslist=$_SESSION['goodslist'];
	$goodslist=unserialize(stripslashes($goodslist));
	foreach ($goodslist as $key=>$value){
		$goodslist[$key]['scj']=$_GET['scj_'.$key];
		$goodslist[$key]['yhj']=$_GET['yhj_'.$key];
	}


	//setcookie("goodslist",serialize($goodslist));
	$_SESSION['goodslist']=serialize($goodslist);
	$smarty->assign("message", "添加成功");
	$smarty->display('basicppt_main.htm');
}else if($_REQUEST['act']=="bt"){

	if($_GET['btControl']=="view"){
		$imageurl=$_COOKIE['pptimageurl'];
		$arrbt=$_COOKIE['arrbt'];
		$arrbt=unserialize(stripslashes($arrbt));
		$smarty->assign('pptimageurl',$imageurl);
		$smarty->assign('programbt',$arrbt);;
		$smarty->display('basicppt_pptbt.htm');
	}else if($_GET['btcontrol']=="update"){
		$imageurl=$_COOKIE['pptimageurl'];
		$btname=$_GET['btname'];
		$btms=$_GET['btms'];
		$arrbt=$_COOKIE['arrbt'];
		$arrbt=unserialize(stripslashes($arrbt));
		$programId=$_COOKIE['programId'];
		$arrbt['btname'] =$btname;
		$arrbt['btms'] =$btms;
		setcookie("arrbt",serialize($arrbt));
		$sql="UPDATE ".$ecs->table('programlist')." SET btname = '$btname',btms='$btms' WHERE programId = $programId and sort=1";
		$db->query($sql);
		$smarty->assign('message',"方案标题保存成功");
		$smarty->assign('programbt',$arrbt);
		$smarty->assign('pptimageurl',$imageurl);
		$smarty->display('basicppt_pptbt.htm');
	}
}else if($_GET['act']=="jw"){
	$imageurl=$_COOKIE['pptimageurl'];
	if($_GET['jwcontrol']=="view"){
		$arrjw=$_COOKIE['arrjw'];
		$arrjw=unserialize(stripslashes($arrjw));
		$smarty->assign('pptimageurl',$imageurl);
		$smarty->assign('programjw',$arrjw);
		$smarty->assign('message',"ffff");
		$smarty->display('basicppt_pptjw.htm');
		
	}else if($_GET['jwcontrol']=="update"){
		$imageurl=$_COOKIE['pptimageurl'];
		$jwname=$_GET['jwname'];
		$jwms=$_GET['jwms'];
		$arrjw=$_COOKIE['arrjw'];
		$arrjw=unserialize(stripslashes($arrjw));
		$programId=$_COOKIE['programId'];
		$arrjw['jwname'] =$jwname;
		$arrjw['jwms'] =$jwms;
		setcookie("arrjw",serialize($arrjw));
		$sql="UPDATE ".$ecs->table('programlist')." SET jwname = '$jwname',jwms='$jwms' WHERE programId = $programId and sort=1000";
		$db->query($sql);
		$smarty->assign('message',"方案标结尾存成功");
		$smarty->assign('programjw',$arrjw);
		$smarty->assign('pptimageurl',$imageurl);
		$smarty->display('basicppt_pptjw.htm');
	}


}else if($_REQUEST['act']=="edit"){
	if($_GET['update']=='update'){
		$name=$_GET['name'];
		$remark=$_GET['remark'];
		$programId=$_GET['programid'];
		$sql = "update " .$GLOBALS['ecs']->table('program'). " SET name = '$name', remark='$remark' where programId=$programId";
		$db->query($sql);
		$smarty->assign('message',"保存成功");
		$smarty->display('basicppt_main.htm');
	}else{
	$programId=$_GET['id'];
	$sql = "SELECT * FROM " .$GLOBALS['ecs']->table('program'). " WHERE programId=$programId";
    $program = $db->GetRow($sql);
    $smarty->assign('programid',$programId);
    $smarty->assign('program',$program);
	$smarty->display('basicppt_editfa.htm');
	}

	
}else if($_REQUEST['act']=="removegood"){
	$goods_id=$_GET['goods_id'];
	//$goodslist=$_COOKIE['goodslist'];
	$goodslist=$_SESSION['goodslist'];
	$goodslist=unserialize(stripslashes($goodslist));
	unset($goodslist[$goods_id]);
	//setcookie("goodslist",serialize($goodslist));
	$_SESSION['goodslist']=serialize($goodslist);
	$smarty->assign('goods_list',$goodslist);
	$smarty->display('basicppt_editsp.htm');

}else if($_REQUEST['act']=="bjgh"){
	$imageurl=$_GET['pptimageurl'];
	setcookie("pptimageurl",$imageurl);
}else if($_REQUEST['act']=="fadelete"){
	$programId=$_GET['programId'];
	$sql="DELETE FROM ".$ecs->table('program')."  WHERE programId=$programId";
	$db->query($sql);
	$sql="DELETE FROM ".$ecs->table('programlist')."  WHERE programId=$programId";
	$db->query($sql);
	$smarty->assign('message',"删除方案成功");
	$smarty->display('basicppt_main.htm');
}else if($_REQUEST['act']=="yl"){
	$imageurl=$_COOKIE['pptimageurl'];
	$goods_id=$_COOKIE['goods_id'];
	$pptsplist=$_COOKIE['pptsplist'];
	$programId=$_COOKIE['programId'];
	if($programId!=null&&$goods_id!=null){
		$sql="select p.name,p.add_time,p.remark,pl.* from ".$GLOBALS['ecs']->table('programlist')."  as pl left   join ".$GLOBALS['ecs']->table('program')."  as p on p.programId=pl.programId where p.goods_id=$goods_id and pl.programId=$programId order by sort asc";
		$res = $GLOBALS['db']->selectLimit($sql, 1000,0);
		$i=0;
		while ($rows = $GLOBALS['db']->fetchRow($res))
		{
			if($i==0){

				$i++;
			}
			if($rows['sort']==1){
					
				$arrbt['programlistid']=$rows['programlistid'];
				$arrbt['imageurl']=$imageurl;
				$arrbt['btname'] =$rows['btname'];
				$arrbt['btms'] =$rows['btms'];

			}elseif ($rows['sort']==1000){
				$arrjw['programlistid']=$rows['programlistid'];
				$arrjw['imageurl']=$imageurl;
				$arrjw['jwname'] = $rows['jwname'];
				$arrjw['jwms']=$rows['jwms'];
			}else{
				$rows['imageurl']=$imageurl;
				$rows['date'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);
				$arr[] = $rows;
			}

		}




	}
	if($pptsplist==null){
		$goodslist=$arr;
	}else{
		$arrbt['imageurl']=$imageurl;
		$arrbt['btname'] = "请输入方案名称";
		$arrbt['btms']="请输入方案描述";

		$arrjw['imageurl']=$imageurl;
		$arrjw['jwname'] = "请输入结尾名称";
		$arrjw['jwms']="请输入结尾描述";
		$goodslist=category_get_goodsppt($pptsplist,$imageurl);
	}
	$smarty->assign('pptimageurl',$imageurl);
	$smarty->assign('programbt',$arrbt);
	$smarty->assign('programjw',$arrjw);
	$smarty->assign('programlist',$goodslist);

	//setcookie("goodslist",serialize($goodslist));
	$_SESSION['goodslist']=serialize($goodslist);
	$smarty->display('basicppt_left.htm');

}else if($_REQUEST['act']=="faxz"){
	$imageurl=$_COOKIE['pptimageurl'];
	//创建ppt标题
	$objPHPPowerPoint = new PHPPowerPoint();
	$objPHPPowerPoint->getProperties()->setCreator("Maarten Balliauw");
	$objPHPPowerPoint->getProperties()->setLastModifiedBy("Maarten Balliauw");
	$objPHPPowerPoint->getProperties()->setTitle("Office 2007 PPTX Test Document");
	$objPHPPowerPoint->getProperties()->setSubject("Office 2007 PPTX Test Document");
	$objPHPPowerPoint->getProperties()->setDescription("Test document for Office 2007 PPTX, generated using PHP classes.");
	$objPHPPowerPoint->getProperties()->setKeywords("office 2007 openxml php");
	$objPHPPowerPoint->getProperties()->setCategory("Test result file");

	$objPHPPowerPoint->removeSlideByIndex(0);


	$goods_id=$_COOKIE['goods_id'];//商品ID
	$programId=$_COOKIE['programId'];//pptid

	$sql="select p.name,p.add_time,p.remark,pl.* from ".$GLOBALS['ecs']->table('programlist')."  as pl left   join ".$GLOBALS['ecs']->table('program')."  as p on p.programId=pl.programId where  pl.programId=$programId order by sort asc";
	$res = $GLOBALS['db']->selectLimit($sql, 1000,0);
	$i=0;
	while ($rows = $GLOBALS['db']->fetchRow($res))
	{
		if($i==0){

			$i++;
		}
		$currentSlide = createTemplatedSlide($objPHPPowerPoint); // local function
		if($rows['sort']==1){
			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(60);
			$shape->setWidth(800);
			$shape->setOffsetX(100);
			$shape->setOffsetY(100);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::VERTICAL_CENTER );

			$textRun = $shape->createTextRun($rows['btname']);
			$textRun->getFont()->setBold(true);
			$textRun->getFont()->setSize(28);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			$shape->createBreak();

			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(200);
			$shape->setWidth(900);
			$shape->setOffsetX(10);
			$shape->setOffsetY(200);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::VERTICAL_CENTER );

			$textRun = $shape->createTextRun($rows['btms']);
			$textRun->getFont()->setBold(true);
			$textRun->getFont()->setSize(28);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			$shape->createBreak();


		}elseif ($rows['sort']==1000){
			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(60);
			$shape->setWidth(800);
			$shape->setOffsetX(100);
			$shape->setOffsetY(100);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::VERTICAL_CENTER );

			$textRun = $shape->createTextRun($rows['jwname']);
			$textRun->getFont()->setBold(true);
			$textRun->getFont()->setSize(28);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			$shape->createBreak();

			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(200);
			$shape->setWidth(600);
			$shape->setOffsetX(100);
			$shape->setOffsetY(200);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::VERTICAL_CENTER );

			$textRun = $shape->createTextRun($rows['jwms']);
			$textRun->getFont()->setBold(true);
			$textRun->getFont()->setSize(28);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			$shape->createBreak();
		}else{

			//			$rows['imageurl']=$imageurl;
			//			$rows['date'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);
			//			$arr[] = $rows;

			$shape = $currentSlide->createDrawingShape();
			$shape->setName('PHPPowerPoint logo');
			$shape->setDescription('PHPPowerPoint logo');
			$shape->setPath("../".$rows['imagesp']);//
			$shape->setHeight(280);
			$shape->setWidth(280);
			$shape->setOffsetX(80);
			$shape->setOffsetY(100);
			$shape->getShadow()->setVisible(true);
			$shape->getShadow()->setDirection(45);
			$shape->getShadow()->setDistance(10);


			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(30);
			$shape->setWidth(500);
			$shape->setOffsetX(400);
			$shape->setOffsetY(100);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );


			$textRun = $shape->createTextRun($rows['name']);
			$textRun->getFont()->setBold(true);
			$textRun->getFont()->setSize(18);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			//$shape->createBreak();

			$shape = $currentSlide->createRichTextShape();
			
			
			$shape->setHeight(40);
			$shape->setWidth(480);
			$shape->setOffsetX(400);
			$shape->setOffsetY(165);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );
            $shape->getFill()->setFillType(PHPPowerPoint_Style_Fill::FILL_SOLID);
			$shape->getFill()->getStartColor()->setRGB('f2f2f2');
			$textRun = $shape->createTextRun("商品品牌：".$rows['pinpai']);
			$textRun->getFont()->setBold(false);
			$textRun->getFont()->setSize(14);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
		    

			//$shape->createBreak();

			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(40);
			$shape->setWidth(480);
			$shape->setOffsetX(400);
			$shape->setOffsetY(205);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );
			$shape->getFill()->setFillType(PHPPowerPoint_Style_Fill::FILL_SOLID);
			$shape->getFill()->getStartColor()->setRGB('ffffff');
			$textRun = $shape->createTextRun("商品型号：".$rows['xinghao']);
			$textRun->getFont()->setBold(false);
			$textRun->getFont()->setSize(14);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
				
			//$shape->createBreak();

			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(40);
			$shape->setWidth(480);
			$shape->setOffsetX(400);
			$shape->setOffsetY(245);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );
			$shape->getFill()->setFillType(PHPPowerPoint_Style_Fill::FILL_SOLID);
			$shape->getFill()->getStartColor()->setRGB('f2f2f2');
			$textRun = $shape->createTextRun("市场价：".$rows['scj']);
			$textRun->getFont()->setBold(false);
			$textRun->getFont()->setSize(14);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			//$shape->createBreak();

			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(40);
			$shape->setWidth(480);
			$shape->setOffsetX(400);
			$shape->setOffsetY(285);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );
			$shape->getFill()->setFillType(PHPPowerPoint_Style_Fill::FILL_SOLID);
			$shape->getFill()->getStartColor()->setRGB('ffffff');
			$textRun = $shape->createTextRun("优惠价：".$rows['yhj']);
			$textRun->getFont()->setBold(false);
			$textRun->getFont()->setSize(14);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			//$shape->createBreak();

			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(40);
			$shape->setWidth(900);
			$shape->setOffsetX(30);
			$shape->setOffsetY(400);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );
			$shape->getFill()->setFillType(PHPPowerPoint_Style_Fill::FILL_SOLID);
			$shape->getFill()->getStartColor()->setRGB('a6a6a6');
			$textRun = $shape->createTextRun("商品描述");
			$textRun->getFont()->setBold(false);
			$textRun->getFont()->setSize(18);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			//$shape->createBreak();

			$shape = $currentSlide->createRichTextShape();
			$shape->setHeight(200);
			$shape->setWidth(900);
			$shape->setOffsetX(30);
			$shape->setOffsetY(440);
			$shape->getAlignment()->setHorizontal( PHPPowerPoint_Style_Alignment::HORIZONTAL_LEFT );
			$shape->getFill()->setFillType(PHPPowerPoint_Style_Fill::FILL_SOLID);
			$shape->getFill()->getStartColor()->setRGB('ffffff');
			$textRun = $shape->createTextRun($rows['spms']);
			$textRun->getFont()->setBold(false);
			$textRun->getFont()->setSize(14);
			$textRun->getFont()->setColor( new PHPPowerPoint_Style_Color( '00000000' ) );
			$shape->createBreak();

		}

	}


	// Save PowerPoint 2007 file

	$objWriter = PHPPowerPoint_IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');

	$fileppt=str_replace('.php', '.pptx', __FILE__);
	$objWriter->save($fileppt);

	if (!file_exists($fileppt)){
		header("Content-type: text/html; charset=utf-8");
		echo "File not found!";
		exit;
	} else {
		$file = fopen($fileppt,"r");
		Header("Content-type: application/octet-stream");
		Header("Accept-Ranges: bytes");
		Header("Accept-Length: ".filesize($fileppt));
		Header("Content-Disposition: attachment; filename=pp.pptx");
		echo fread($file, filesize($fileppt));
		fclose($file);
	}

	$smarty->assign('message', $fileppt);
	$smarty->display('basicppt_main.htm');
}else if($_REQUEST['act']=="addfa"){
	$smarty->display('basicppt_addfa.htm');
}else if($_REQUEST['act']=="dgppt"){
	$goods_id=$_GET['goods_id'];
	$programId =$_COOKIE['programId'];
	//$goodslist=$_COOKIE['goodslist'];
	$goodslist=$_SESSION['goodslist'];
	$imageurl=$_COOKIE['pptimageurl'];
	$goodslist=unserialize(stripslashes($goodslist));

	$programlistinfo=$goodslist[$goods_id];
	if($programlistinfo==null){
		$sql = "SELECT * FROM " .$GLOBALS['ecs']->table('programlist'). " WHERE programId=$programId and goods_id=$goods_id";
		$programlistinfo = $db->GetRow($sql);
	}
	//$smarty->assign('message',var_dump($goodslist));
	$smarty->assign('pptimageurl',$imageurl);
	$smarty->assign('programlistinfo', $programlistinfo);
	$smarty->display('basicppt_dgppt.htm');
}else if($_REQUEST['act']=="fabc"){
	
	$programId=$_COOKIE['programId'];
	$goodslist=$_SESSION['goodslist'];
	$imageurl=$_COOKIE['pptimageurl'];
	$goodslist=unserialize(stripslashes($goodslist));
	if($goodslist!=null){
		$sql="DELETE FROM ".$ecs->table('programlist')."  WHERE programId=$programId and sort not in (1,1000)";
		$db->query($sql);
		$i=1;
		foreach ($goodslist as $k=>$goods){
			$i++;
			$name=$goods['name'];
			$pinpai=$goods['pinpai'];
			$imagesp=$goods['imagesp'];
			$xinghao=$goods['xinghao'];
			$scj=$goods['scj'];
			$yhj=$goods['yhj'];
			$spms=$goods['spms'];
			$goods_id=$goods['goods_id'];
			$sort=$i;
			$ms=$goods['spms'];
			$sql="insert into ".$ecs->table('programlist')."
			 (programId,goods_id,imageurl,name,pinpai,imagesp,xinghao,scj,yhj,spms,sort)VALUES
			 ($programId,$goods_id,'$imageurl','$name','$pinpai','$imagesp','$xinghao',$scj,$yhj,'$spms',$sort)";
			$db->query($sql);
		}
	}

	$smarty->assign('message', "保存成功");
	$smarty->display('basicppt_main.htm');
}else if($_REQUEST['act']=="listfa"){
	$smarty->display('basicppt_listfa.htm');
}else if($_REQUEST['act']=="addsp"){
	$programId=$_COOKIE['programId'];
	if($programId==null){
		$smarty->assign('message', "请选择选择方案");
		$smarty->display('basicppt_main.htm');
	}else{


		/* 获得请求的分类 ID */
		if (isset($_REQUEST['id']))
		{
			$cat_id = intval($_REQUEST['id']);
		}
		elseif (isset($_REQUEST['category']))
		{
			$cat_id = intval($_REQUEST['category']);
		}
		else
		{
			/* 如果分类ID为0，则返回首页 */
			ecs_header("Location: ./\n");

			exit;
		}


		/* 初始化分页信息 */
		$page = isset($_REQUEST['page'])   && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
		$size = isset($_CFG['page_size'])  && intval($_CFG['page_size']) > 0 ? intval($_CFG['page_size']) : 10;
		$brand = isset($_REQUEST['brand']) && intval($_REQUEST['brand']) > 0 ? intval($_REQUEST['brand']) : 0;
		$price_max = isset($_REQUEST['price_max']) && intval($_REQUEST['price_max']) > 0 ? intval($_REQUEST['price_max']) : 0;
		$price_min = isset($_REQUEST['price_min']) && intval($_REQUEST['price_min']) > 0 ? intval($_REQUEST['price_min']) : 0;
		$filter_attr_str = isset($_REQUEST['filter_attr']) ? htmlspecialchars(trim($_REQUEST['filter_attr'])) : '0';

		$filter_attr_str = trim(urldecode($filter_attr_str));
		$filter_attr_str = preg_match('/^[\d\.]+$/',$filter_attr_str) ? $filter_attr_str : '';
		$filter_attr = empty($filter_attr_str) ? '' : explode('.', $filter_attr_str);


		/* 排序、显示方式以及类型 */
		$default_display_type = $_CFG['show_order_type'] == '0' ? 'list' : ($_CFG['show_order_type'] == '1' ? 'grid' : 'text');
		$default_sort_order_method = $_CFG['sort_order_method'] == '0' ? 'DESC' : 'ASC';
		$default_sort_order_type   = $_CFG['sort_order_type'] == '0' ? 'goods_id' : ($_CFG['sort_order_type'] == '1' ? 'shop_price' : 'last_update');

		$sort  = (isset($_REQUEST['sort'])  && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'shop_price', 'last_update'))) ? trim($_REQUEST['sort'])  : $default_sort_order_type;
		$order = (isset($_REQUEST['order']) && in_array(trim(strtoupper($_REQUEST['order'])), array('ASC', 'DESC')))                              ? trim($_REQUEST['order']) : $default_sort_order_method;
		$display  = (isset($_REQUEST['display']) && in_array(trim(strtolower($_REQUEST['display'])), array('list', 'grid', 'text'))) ? trim($_REQUEST['display'])  : (isset($_COOKIE['ECS']['display']) ? $_COOKIE['ECS']['display'] : $default_display_type);
		$display  = in_array($display, array('list', 'grid', 'text')) ? $display : 'text';
		setcookie('ECS[display]', $display, gmtime() + 86400 * 7);
		/*------------------------------------------------------ */
		//-- PROCESSOR
		/*------------------------------------------------------ */

		/* 页面的缓存ID */
		$cache_id = sprintf('%X', crc32($cat_id . '-' . $display . '-' . $sort  .'-' . $order  .'-' . $page . '-' . $size . '-' . $_SESSION['user_rank'] . '-' .
		$_CFG['lang'] .'-'. $brand. '-' . $price_max . '-' .$price_min . '-' . $filter_attr_str));


		/* 如果页面没有被缓存则重新获取页面的内容 */

		$children = get_children($cat_id);

		$cat = get_cat_info($cat_id);   // 获得分类的相关信息

		if (!empty($cat))
		{
			$smarty->assign('keywords',    htmlspecialchars($cat['keywords']));
			$smarty->assign('description', htmlspecialchars($cat['cat_desc']));
			$smarty->assign('cat_style',   htmlspecialchars($cat['style']));
		}
		else
		{
			//        /* 如果分类不存在则返回首页 */
			//        ecs_header("Location: ./\n");
			//
			//        exit;
		}

		/* links */
		$links = index_get_links();
		$smarty->assign('img_links',       $links['img']);
		$smarty->assign('txt_links',       $links['txt']);
		$smarty->assign('data_dir',        DATA_DIR);       // 数据目录

		/* 赋值固定内容 */
		if ($brand > 0)
		{
			$sql = "SELECT brand_name FROM " .$GLOBALS['ecs']->table('brand'). " WHERE brand_id = '$brand'";
			$brand_name = $db->getOne($sql);
		}
		else
		{
			$brand_name = '';
		}

		/* 获取价格分级 */
		if ($cat['grade'] == 0  && $cat['parent_id'] != 0)
		{
			$cat['grade'] = get_parent_grade($cat_id); //如果当前分类级别为空，取最近的上级分类
		}

		if ($cat['grade'] > 1||$cat_id==0)
		{
			/* 需要价格分级 */

			/*
			 算法思路：
			 1、当分级大于1时，进行价格分级
			 2、取出该类下商品价格的最大值、最小值
			 3、根据商品价格的最大值来计算商品价格的分级数量级：
			 价格范围(不含最大值)    分级数量级
			 0-0.1                   0.001
			 0.1-1                   0.01
			 1-10                    0.1
			 10-100                  1
			 100-1000                10
			 1000-10000              100
			 4、计算价格跨度：
			 取整((最大值-最小值) / (价格分级数) / 数量级) * 数量级
			 5、根据价格跨度计算价格范围区间
			 6、查询数据库

			 可能存在问题：
			 1、
			 由于价格跨度是由最大值、最小值计算出来的
			 然后再通过价格跨度来确定显示时的价格范围区间
			 所以可能会存在价格分级数量不正确的问题
			 该问题没有证明
			 2、
			 当价格=最大值时，分级会多出来，已被证明存在
			 */

			$sql = "SELECT min(g.shop_price) AS min, max(g.shop_price) as max ".
               " FROM " . $ecs->table('goods'). " AS g ".
               " WHERE ($children OR " . get_extension_goods($children) . ') AND g.is_delete = 0 AND g.is_on_sale = 1 AND g.is_alone_sale = 1  ';
			//获得当前分类下商品价格的最大值、最小值

			$row = $db->getRow($sql);

			// 取得价格分级最小单位级数，比如，千元商品最小以100为级数
			$price_grade = 0.0001;
			for($i=-2; $i<= log10($row['max']); $i++)
			{
				$price_grade *= 10;
			}
			if($cat['grade']<1){
				$cat['grade']=10;
			}
			//跨度
			$dx = ceil(($row['max'] - $row['min']) / ($cat['grade']) / $price_grade) * $price_grade;
			if($dx == 0)
			{
				$dx = $price_grade;
			}

			for($i = 1; $row['min'] > $dx * $i; $i ++);

			for($j = 1; $row['min'] > $dx * ($i-1) + $price_grade * $j; $j++);
			$row['min'] = $dx * ($i-1) + $price_grade * ($j - 1);

			for(; $row['max'] >= $dx * $i; $i ++);
			$row['max'] = $dx * ($i) + $price_grade * ($j - 1);

			$sql = "SELECT (FLOOR((g.shop_price - $row[min]) / $dx)) AS sn, COUNT(*) AS goods_num  ".
               " FROM " . $ecs->table('goods') . " AS g ".
               " WHERE ($children OR " . get_extension_goods($children) . ') AND g.is_delete = 0 AND g.is_on_sale = 1 AND g.is_alone_sale = 1 '.
               " GROUP BY sn ";

			$price_grade = $db->getAll($sql);

			foreach ($price_grade as $key=>$val)
			{
				$temp_key = $key + 1;
				$price_grade[$temp_key]['goods_num'] = $val['goods_num'];
				$price_grade[$temp_key]['start'] = $row['min'] + round($dx * $val['sn']);
				$price_grade[$temp_key]['end'] = $row['min'] + round($dx * ($val['sn'] + 1));
				$price_grade[$temp_key]['price_range'] = $price_grade[$temp_key]['start'] . '-' . $price_grade[$temp_key]['end'];
				$price_grade[$temp_key]['formated_start'] = price_format($price_grade[$temp_key]['start']);
				$price_grade[$temp_key]['formated_end'] = price_format($price_grade[$temp_key]['end']);
				$price_grade[$temp_key]['url'] = build_urippt('category', array('cid'=>$cat_id, 'bid'=>$brand, 'price_min'=>$price_grade[$temp_key]['start'], 'price_max'=> $price_grade[$temp_key]['end'], 'filter_attr'=>$filter_attr_str), $cat['cat_name']);

				/* 判断价格区间是否被选中 */
				if (isset($_REQUEST['price_min']) && $price_grade[$temp_key]['start'] == $price_min && $price_grade[$temp_key]['end'] == $price_max)
				{
					$price_grade[$temp_key]['selected'] = 1;
				}
				else
				{
					$price_grade[$temp_key]['selected'] = 0;
				}
			}

			$price_grade[0]['start'] = 0;
			$price_grade[0]['end'] = 0;
			$price_grade[0]['price_range'] = $_LANG['all_attribute'];
			$price_grade[0]['url'] = build_urippt('category', array('cid'=>$cat_id, 'bid'=>$brand, 'price_min'=>0, 'price_max'=> 0, 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
			$price_grade[0]['selected'] = empty($price_max) ? 1 : 0;

			$smarty->assign('price_grade',     $price_grade);

		}


		/* 品牌筛选 */

		$sql = "SELECT b.brand_id, b.brand_name, COUNT(*) AS goods_num ".
            "FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
		$GLOBALS['ecs']->table('goods') . " AS g LEFT JOIN ". $GLOBALS['ecs']->table('goods_cat') . " AS gc ON g.goods_id = gc.goods_id " .
            "WHERE g.brand_id = b.brand_id AND ($children OR " . 'gc.cat_id ' . db_create_in(array_unique(array_merge(array($cat_id), array_keys(cat_list($cat_id, 0, false))))) . ") AND b.is_show = 1 " .
            " AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY b.sort_order, b.brand_id ASC";

		$brands = $GLOBALS['db']->getAll($sql);

		foreach ($brands AS $key => $val)
		{
			$temp_key = $key + 1;
			$brands[$temp_key]['brand_name'] = $val['brand_name'];
			$brands[$temp_key]['url'] = build_urippt('category', array('cid' =>$cat_id, 'bid' => $val['brand_id'], 'price_min'=>$price_min, 'price_max'=> $price_max, 'filter_attr'=>$filter_attr_str), "全部分类");

			/* 判断品牌是否被选中 */
			if ($brand == $brands[$key]['brand_id'])
			{
				$brands[$temp_key]['selected'] = 1;
			}
			else
			{
				$brands[$temp_key]['selected'] = 0;
			}
		}

		$brands[0]['brand_name'] = $_LANG['all_attribute'];
		$brands[0]['url'] = build_urippt('category', array('cid' => $cat_id, 'bid' => 0, 'price_min'=>$price_min, 'price_max'=> $price_max, 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
		$brands[0]['selected'] = empty($brand) ? 1 : 0;

		$smarty->assign('brands', $brands);


		/* 属性筛选 */
		$ext = ''; //商品查询条件扩展
		if ($cat['filter_attr'] > 0)
		{
			$cat_filter_attr = explode(',', $cat['filter_attr']);       //提取出此分类的筛选属性
			$all_attr_list = array();

			foreach ($cat_filter_attr AS $key => $value)
			{
				$sql = "SELECT a.attr_name FROM " . $ecs->table('attribute') . " AS a, " . $ecs->table('goods_attr') . " AS ga, " . $ecs->table('goods') . " AS g WHERE ($children OR " . get_extension_goods($children) . ") AND a.attr_id = ga.attr_id AND g.goods_id = ga.goods_id AND g.is_delete = 0 AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND a.attr_id='$value'";
				if($temp_name = $db->getOne($sql))
				{
					$all_attr_list[$key]['filter_attr_name'] = $temp_name;

					$sql = "SELECT a.attr_id, MIN(a.goods_attr_id ) AS goods_id, a.attr_value AS attr_value FROM " . $ecs->table('goods_attr') . " AS a, " . $ecs->table('goods') .
                       " AS g" .
                       " WHERE ($children OR " . get_extension_goods($children) . ') AND g.goods_id = a.goods_id AND g.is_delete = 0 AND g.is_on_sale = 1 AND g.is_alone_sale = 1 '.
                       " AND a.attr_id='$value' ".
                       " GROUP BY a.attr_value";

					$attr_list = $db->getAll($sql);

					$temp_arrt_url_arr = array();

					for ($i = 0; $i < count($cat_filter_attr); $i++)        //获取当前url中已选择属性的值，并保留在数组中
					{
						$temp_arrt_url_arr[$i] = !empty($filter_attr[$i]) ? $filter_attr[$i] : 0;
					}

					$temp_arrt_url_arr[$key] = 0;                           //“全部”的信息生成
					$temp_arrt_url = implode('.', $temp_arrt_url_arr);
					$all_attr_list[$key]['attr_list'][0]['attr_value'] = $_LANG['all_attribute'];
					$all_attr_list[$key]['attr_list'][0]['url'] = build_urippt('category', array('cid'=>$cat_id, 'bid'=>$brand, 'price_min'=>$price_min, 'price_max'=>$price_max, 'filter_attr'=>$temp_arrt_url), $cat['cat_name']);
					$all_attr_list[$key]['attr_list'][0]['selected'] = empty($filter_attr[$key]) ? 1 : 0;

					foreach ($attr_list as $k => $v)
					{
						$temp_key = $k + 1;
						$temp_arrt_url_arr[$key] = $v['goods_id'];       //为url中代表当前筛选属性的位置变量赋值,并生成以‘.’分隔的筛选属性字符串
						$temp_arrt_url = implode('.', $temp_arrt_url_arr);

						$all_attr_list[$key]['attr_list'][$temp_key]['attr_value'] = $v['attr_value'];
						$all_attr_list[$key]['attr_list'][$temp_key]['url'] = build_urippt('category', array('cid'=>$cat_id, 'bid'=>$brand, 'price_min'=>$price_min, 'price_max'=>$price_max, 'filter_attr'=>$temp_arrt_url), $cat['cat_name']);

						if (!empty($filter_attr[$key]) AND $filter_attr[$key] == $v['goods_id'])
						{
							$all_attr_list[$key]['attr_list'][$temp_key]['selected'] = 1;
						}
						else
						{
							$all_attr_list[$key]['attr_list'][$temp_key]['selected'] = 0;
						}
					}
				}

			}

			$smarty->assign('filter_attr_list',  $all_attr_list);
			/* 扩展商品查询条件 */
			if (!empty($filter_attr))
			{
				$ext_sql = "SELECT DISTINCT(b.goods_id) FROM " . $ecs->table('goods_attr') . " AS a, " . $ecs->table('goods_attr') . " AS b " .  "WHERE ";
				$ext_group_goods = array();

				foreach ($filter_attr AS $k => $v)                      // 查出符合所有筛选属性条件的商品id */
				{
					if (is_numeric($v) && $v !=0 &&isset($cat_filter_attr[$k]))
					{
						$sql = $ext_sql . "b.attr_value = a.attr_value AND b.attr_id = " . $cat_filter_attr[$k] ." AND a.goods_attr_id = " . $v;
						$ext_group_goods = $db->getColCached($sql);
						$ext .= ' AND ' . db_create_in($ext_group_goods, 'g.goods_id');
					}
				}
			}
		}

		assign_template('c', array($cat_id));

		$position = assign_ur_here($cat_id, $brand_name);
		$smarty->assign('page_title',       $position['title']);    // 页面标题
		$smarty->assign('ur_here',          $position['ur_here']);  // 当前位置

		$smarty->assign('categories',       get_categories_tree()); // 分类树
		$smarty->assign('topcategories',    get_categories_treeActiveppt($cat_id,$cat_id));
		$smarty->assign('helps',            get_shop_help());              // 网店帮助
		$smarty->assign('top_goods',        get_top10());                  // 销售排行
		$smarty->assign('show_marketprice', $_CFG['show_marketprice']);
		$smarty->assign('category',         $cat_id);
		$smarty->assign('brand_id',         $brand);
		$smarty->assign('price_max',        $price_max);
		$smarty->assign('price_min',        $price_min);
		$smarty->assign('filter_attr',      $filter_attr_str);
		$smarty->assign('feed_url',         ($_CFG['rewrite'] == 1) ? "feed-c$cat_id.xml" : 'feed.php?cat=' . $cat_id); // RSS URL

		if ($brand > 0)
		{
			$arr['all'] = array('brand_id'  => 0,
                        'brand_name'    => $GLOBALS['_LANG']['all_goods'],
                        'brand_logo'    => '',
                        'goods_num'     => '',
                        'url'           => build_urippt('category', array('cid'=>$cat_id), $cat['cat_name'])
			);
		}
		else
		{
			$arr = array();
		}

		$brand_list = array_merge($arr, get_brands($cat_id, 'category'));

		$smarty->assign('data_dir',    DATA_DIR);
		$smarty->assign('brand_list',      $brand_list);
		$smarty->assign('promotion_info', get_promotion_info());


		/* 调查 */
		$vote = get_vote();
		if (!empty($vote))
		{
			$smarty->assign('vote_id',     $vote['id']);
			$smarty->assign('vote',        $vote['content']);
		}

		$smarty->assign('best_goods',      get_category_recommend_goods('best', $children, $brand, $price_min, $price_max, $ext));
		$smarty->assign('promotion_goods', get_category_recommend_goods('promote', $children, $brand, $price_min, $price_max, $ext));
		$smarty->assign('hot_goods',       get_category_recommend_goods('hot', $children, $brand, $price_min, $price_max, $ext));

		$count = get_cagtegory_goods_count($children, $brand, $price_min, $price_max, $ext);
		$max_page = ($count> 0) ? ceil($count / $size) : 1;
		if ($page > $max_page)
		{
			$page = $max_page;
		}
		$goodslist = category_get_goods($children, $brand, $price_min, $price_max, $ext, $size, $page, $sort, $order);
		if($display == 'grid')
		{
			if(count($goodslist) % 2 != 0)
			{
				$goodslist[] = array();
			}
		}
		$smarty->assign('goods_list',       $goodslist);
		$smarty->assign('category',         $cat_id);
		$smarty->assign('script_name', 'category');

		assign_pagerallppt('category',            $cat_id, $count, $size, $sort, $order, $page, '', $brand, $price_min, $price_max, $display, $filter_attr_str); // 分页
		assign_dynamic('category'); // 动态内容

		$smarty->display('basicppt_addsp.htm');
	}
}else if($_REQUEST['act']=="editsp"){
	$imageurl=$_COOKIE['pptimageurl'];
	$goods_id=$_COOKIE['goods_id'];
	$pptsplist=$_COOKIE['pptsplist'];
	$programId=$_COOKIE['programId'];

	//$goodslist=$_COOKIE['goodslist'];
	$goodslist=$_SESSION['goodslist'];
	$goodslist=unserialize(stripslashes($goodslist));
	//$smarty->assign('message',var_dump($goodslist));
	$smarty->assign('goods_list',$goodslist);
	$smarty->display('basicppt_editsp.htm');
}else if($_REQUEST['fa']=="cj"){
	$name=$_REQUEST['name'];
	$Remark=$_REQUEST['remark'];
	$is_only=$exc->is_only("name", $name);

	if($is_only){
		$imageurl=$_COOKIE['pptimageurl'];
		$add_time = gmtime();
		$sql="insert into ".$ecs->table('program')." (name,add_time,Remark)VALUES('$name','$add_time','$Remark')";
		$db->query($sql);
		$programId = $db->insert_id();
		$sql="insert into ".$ecs->table('programlist')." (imageUrl,btname,btms,sort,programId)VALUES('$imageurl','请输入方案标题','请输入方案描述',1,$programId)";
		$db->query($sql);
		$sql="insert into ".$ecs->table('programlist')." (imageUrl,jwname,jwms,sort,programId)VALUES('$imageurl','接输入方案结尾','请输入结尾描述',1000,$programId)";
		$db->query($sql);
			
			
		$smarty->assign('full_page',    1);
		$article_list = get_articleslist();
		$smarty->assign('article_list',    $article_list['arr']);
		$smarty->assign('filter',          $article_list['filter']);
		$smarty->assign('record_count',    $article_list['record_count']);
		$smarty->assign('page_count',      $article_list['page_count']);
		$sort_flag  = sort_flag($article_list['filter']);
		$smarty->assign($sort_flag['tag'], $sort_flag['img']);
		$smarty->display('basicppt_listfa.htm');
	}else{
		$smarty->assign('message', "该方案名称已存在");
		$smarty->display('basicppt_addfa.htm');
	}
	$smarty->display('basicppt_editsp.htm');
}
elseif ($_REQUEST['act'] == 'query')
{
	check_authz_json('article_manage');

	$article_list = get_articleslist();

	$smarty->assign('article_list',    $article_list['arr']);
	$smarty->assign('filter',          $article_list['filter']);
	$smarty->assign('record_count',    $article_list['record_count']);
	$smarty->assign('page_count',      $article_list['page_count']);

	$sort_flag  = sort_flag($article_list['filter']);
	$smarty->assign($sort_flag['tag'], $sort_flag['img']);

	make_json_result($smarty->fetch('basicppt_listfa.htm'), '',
	array('filter' => $article_list['filter'], 'page_count' => $article_list['page_count']));
}
elseif ($_REQUEST['act'] == 'remove')
{
	check_authz_json('article_manage');

	$id = intval($_GET['id']);

	$name = $exc->get_name($id);
	if ($exc->drop($id))
	{
		$db->query("DELETE FROM " . $ecs->table('program') . " WHERE " . " programId = $id");
		admin_log(addslashes($name),'remove','program');
		clear_cache_files();
	}

	$url = 'basicppt.php?act=query&' . str_replace('act=remove', '', $_SERVER['QUERY_STRING']);

	ecs_header("Location: $url\n");
	exit;
}

else{

	$smarty->display('basicppt.htm');
}
function get_articleslist(){
	if (isset($_COOKIE['ECSCP']['page_size']) && intval($_COOKIE['ECSCP']['page_size']) > 0)
	{
	}
	else
	{
		$_COOKIE['ECSCP']['page_size']=12;
	}

	$filter = array();
	$sql="select COUNT(*) from ".$GLOBALS['ecs']->table('program')."";
	$filter['record_count'] = $GLOBALS['db']->getOne($sql);
	$filter = page_and_size($filter);
	$sql="select * from ".$GLOBALS['ecs']->table('program')."";
	$arr = array();
	$res = $GLOBALS['db']->selectLimit($sql, $filter['page_size'], $filter['start']);
	while ($rows = $GLOBALS['db']->fetchRow($res))
	{
		$rows['date'] = local_date($GLOBALS['_CFG']['time_format'], $rows['add_time']);
		$arr[] = $rows;
	}
	return array('arr' => $arr, 'filter' => $filter, 'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
}

/*------------------------------------------------------ */
//-- PRIVATE FUNCTION
/*------------------------------------------------------ */

/* links */
//    $links =index_get_links();
//    $smarty->assign('img_links',       $links['img']);
//    $smarty->assign('txt_links',       $links['txt']);
//    $smarty->assign('data_dir',        DATA_DIR);       // 数据

/**
 * 获得分类的信息
 *
 * @param   integer $cat_id
 *
 * @return  void
 */
function get_cat_info($cat_id)
{
	return $GLOBALS['db']->getRow('SELECT cat_name, keywords, cat_desc, style, grade, filter_attr, parent_id FROM ' . $GLOBALS['ecs']->table('category') .
        " WHERE cat_id = '$cat_id'");
}

/**
 * 获得分类下的商品
 *
 * @access  public
 * @param   string  $children
 * @return  array
 */
function category_get_goods($children, $brand, $min, $max, $ext, $size, $page, $sort, $order)
{
	$display = $GLOBALS['display'];
	$where = "g.is_on_sale = 1 AND g.is_alone_sale = 1 AND ".
            "g.is_delete = 0 AND ($children OR " . get_extension_goods($children) . ')';

	if ($brand > 0)
	{
		$where .=  "AND g.brand_id=$brand ";
	}

	if ($min > 0)
	{
		$where .= " AND g.shop_price >= $min ";
	}

	if ($max > 0)
	{
		$where .= " AND g.shop_price <= $max ";
	}

	/* 获得商品列表 */
	$sql = 'SELECT g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.is_new, g.is_best, g.is_hot, g.shop_price AS org_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, g.promote_price, g.goods_type, " .
                'g.promote_start_date, g.promote_end_date, g.goods_brief, g.goods_thumb , g.goods_img ' .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('member_price') . ' AS mp ' .
                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' " .
            "WHERE $where $ext ORDER BY $sort $order";
	$res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);

	$arr = array();
	while ($row = $GLOBALS['db']->fetchRow($res))
	{
		if ($row['promote_price'] > 0)
		{
			$promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
		}
		else
		{
			$promote_price = 0;
		}

		/* 处理商品水印图片 */
		$watermark_img = '';

		if ($promote_price != 0)
		{
			$watermark_img = "watermark_promote_small";
		}
		elseif ($row['is_new'] != 0)
		{
			$watermark_img = "watermark_new_small";
		}
		elseif ($row['is_best'] != 0)
		{
			$watermark_img = "watermark_best_small";
		}
		elseif ($row['is_hot'] != 0)
		{
			$watermark_img = 'watermark_hot_small';
		}

		if ($watermark_img != '')
		{
			$arr[$row['goods_id']]['watermark_img'] =  $watermark_img;
		}

		$arr[$row['goods_id']]['goods_id']         = $row['goods_id'];
		if($display == 'grid')
		{
			$arr[$row['goods_id']]['goods_name']       = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
		}
		else
		{
			$arr[$row['goods_id']]['goods_name']       = $row['goods_name'];
		}
		$arr[$row['goods_id']]['name']             = $row['goods_name'];
		$arr[$row['goods_id']]['goods_brief']      = $row['goods_brief'];
		$arr[$row['goods_id']]['goods_style_name'] = add_style($row['goods_name'],$row['goods_name_style']);
		$arr[$row['goods_id']]['market_price']     = price_format($row['market_price']);
		$arr[$row['goods_id']]['shop_price']       = price_format($row['shop_price']);
		$arr[$row['goods_id']]['type']             = $row['goods_type'];
		$arr[$row['goods_id']]['promote_price']    = ($promote_price > 0) ? price_format($promote_price) : '';
		$arr[$row['goods_id']]['goods_thumb']      = get_image_path($row['goods_id'], $row['goods_thumb'], true);
		$arr[$row['goods_id']]['goods_img']        = get_image_path($row['goods_id'], $row['goods_img']);
		$arr[$row['goods_id']]['url']              = build_urippt('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
		$arr[$row['goods_id']]['is_new']          = $row['is_new'];
		$arr[$row['goods_id']]['is_best']         = $row['is_best'];
		$arr[$row['goods_id']]['is_hot']           = $row['is_hot'];
	}

	return $arr;
}
/**
 * ppt获得分类下的商品
 *
 * @access  public
 * @param   string  $children
 * @return  array
 */
function category_get_goodsppt($pptsplist,$imageurl)
{
	$where = "goods_id in($pptsplist)";
	/* 获得商品列表 */
	$sql="select g.goods_id, g.goods_name,g.market_price,g.shop_price,g.goods_thumb,g.pptms,b.brand_name,t.cat_name
	from ".$GLOBALS['ecs']->table('goods')." as g 
	left join ".$GLOBALS['ecs']->table('brand')." as b on g.brand_id=b.brand_id 
	left join ".$GLOBALS['ecs']->table('goods_type')." as t on g.goods_type=t.cat_id  " .
            "WHERE $where ";
	$res = $GLOBALS['db']->selectLimit($sql,1000,0);

	$arr = array();
	while ($row = $GLOBALS['db']->fetchRow($res))
	{
		$arr[$row['goods_id']]['goods_id']=$row['goods_id'];
		$arr[$row['goods_id']]['imageurl']=$imageurl;
		$arr[$row['goods_id']]['name']      = $row['goods_name'];
		$arr[$row['goods_id']]['pinpai']    = $row['brand_name'];
		$arr[$row['goods_id']]['imagesp']   = get_image_path($row['goods_id'], $row['goods_thumb'], true);
		$arr[$row['goods_id']]['xinghao']   = $row['cat_name'];
		$arr[$row['goods_id']]['shop_price']=  $row['shop_price'] ;
		$arr[$row['goods_id']]['scj']       =  $row['market_price'] ;
		$arr[$row['goods_id']]['yhj']       =  $row['shop_price'] ;
		$arr[$row['goods_id']]['spms']      = $row['pptms'];//get_image_path($row['goods_id'], $row['goods_img']);
	}
	return $arr;
}
/**
 * ppt获得分类下的商品
 *
 * @access  public
 * @param   string  $children
 * @return  array
 */
function  get_goodsppt($db,$goods_id,$imageurl)
{
	$where = "goods_id=$goods_id";
	/* 获得商品列表 */
	$sql="select g.goods_id, g.goods_name,g.market_price,g.shop_price,g.goods_thumb,g.pptms,b.brand_name,t.cat_name
	from ".$GLOBALS['ecs']->table('goods')." as g 
	left join ".$GLOBALS['ecs']->table('brand')." as b on g.brand_id=b.brand_id 
	left join ".$GLOBALS['ecs']->table('goods_type')." as t on g.goods_type=t.cat_id  " .
            "WHERE $where ";

	$res = $GLOBALS['db']->selectLimit($sql,1000,0);

	$arr = array();
	while ($row = $GLOBALS['db']->fetchRow($res))
	{
		$arr['goods_id']=$row['goods_id'];
		$arr['imageurl']=$imageurl;
		$arr['name']      = $row['goods_name'];
		$arr['pinpai']    = $row['brand_name'];
		$arr['imagesp']   = get_image_path($row['goods_id'], $row['goods_thumb'], true);
		$arr['xinghao']   = $row['cat_name'];
		$arr['shop_price']=  $row['shop_price'] ;
		$arr['scj']       =  $row['market_price'] ;
		$arr['yhj']       =  $row['shop_price'] ;
		$arr['spms']      = $row['pptms'];//get_image_path($row['goods_id'], $row['goods_img']);
		
		return $arr;
	}
	return null;
}

/**
 * 获得分类下的商品总数
 *
 * @access  public
 * @param   string     $cat_id
 * @return  integer
 */
function get_cagtegory_goods_count($children, $brand = 0, $min = 0, $max = 0, $ext='')
{
	$where  = "g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 AND ($children OR " . get_extension_goods($children) . ')';

	if ($brand > 0)
	{
		$where .=  " AND g.brand_id = $brand ";
	}

	if ($min > 0)
	{
		$where .= " AND g.shop_price >= $min ";
	}

	if ($max > 0)
	{
		$where .= " AND g.shop_price <= $max ";
	}

	/* 返回商品总数 */
	return $GLOBALS['db']->getOne('SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('goods') . " AS g WHERE $where $ext");
}

/**
 * 取得最近的上级分类的grade值
 *
 * @access  public
 * @param   int     $cat_id    //当前的cat_id
 *
 * @return int
 */
function get_parent_grade($cat_id)
{
	static $res = NULL;

	if ($res === NULL)
	{
		$data = read_static_cache('cat_parent_grade');
		if ($data === false)
		{
			$sql = "SELECT parent_id, cat_id, grade ".
                   " FROM " . $GLOBALS['ecs']->table('category');
			$res = $GLOBALS['db']->getAll($sql);
			write_static_cache('cat_parent_grade', $res);
		}
		else
		{
			$res = $data;
		}
	}

	if (!$res)
	{
		return 0;
	}

	$parent_arr = array();
	$grade_arr = array();

	foreach ($res as $val)
	{
		$parent_arr[$val['cat_id']] = $val['parent_id'];
		$grade_arr[$val['cat_id']] = $val['grade'];
	}

	while ($parent_arr[$cat_id] >0 && $grade_arr[$cat_id] == 0)
	{
		$cat_id = $parent_arr[$cat_id];
	}

	return $grade_arr[$cat_id];

}


/**
 * Creates a templated slide
 *
 * @param PHPPowerPoint $objPHPPowerPoint
 * @return PHPPowerPoint_Slide
 */
function createTemplatedSlide(PHPPowerPoint $objPHPPowerPoint)
{	$imageurl=$_COOKIE['pptimageurl'];
// Create slide
$slide = $objPHPPowerPoint->createSlide();

// Add background image
$shape = $slide->createDrawingShape();
$shape->setName('Background');
$shape->setDescription('Background');
$shape->setPath($imageurl);
$shape->setWidth(950);
$shape->setHeight(720);
$shape->setOffsetX(0);
$shape->setOffsetY(0);

// Add logo
$shape = $slide->createDrawingShape();
$shape->setName('PHPPowerPoint logo');
$shape->setDescription('PHPPowerPoint logo');
$shape->setPath($imageurl);
$shape->setHeight(40);
$shape->setOffsetX(10);
$shape->setOffsetY(720 - 10 - 40);

// Return slide
return $slide;
}




?>
