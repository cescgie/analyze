<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
require_once '../includes/db.php'; // The mysql database connection script

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/Berlin');

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once '../PHPExcel/Classes/PHPExcel.php';
require_once '../PHPExcel/Classes/PHPExcel/IOFactory.php';


// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("Yoggi")
							 ->setLastModifiedBy("Yoggi")
							 ->setTitle("PHPExcel Test Document")
							 ->setSubject("PHPExcel Test Document")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");
$menuStyle = array(
	'font'  => array(
			'bold'  => false,
			'color' => array('rgb' => 'FFFFFF')
	),
	'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => '000000')
			),
	'borders' => array(
					'allborders' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
							)
			)
);

$greyCellBackroundStyle = array(
	'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('rgb' => 'E8E8E8')
			),
	'borders' => array(
					'allborders' => array(
							'style' => PHPExcel_Style_Border::BORDER_THIN,
							'color' => array('rgb' => 'FFFFFF')
							)
	)
);

// Add some data
echo date('H:i:s') , " Add some data" , EOL;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('B6', 'WebsiteName')
            ->setCellValue('C6', 'Uhrzeit')
            ->setCellValue('D6', 'IpAddress')
            ->setCellValue('E6', 'CityName')
            ->setCellValue('F6', 'OsId')
            ->setCellValue('G6', 'BrowserId')
            ->setCellValue('H6', 'Impressions');
$objPHPExcel->getActiveSheet()->getStyle('B6:H6')->applyFromArray($menuStyle);


if(isset($_GET['datum']) && isset($_GET['webid']) && isset($_GET['userid'])  ){
  	$datum = $_GET['datum'];
  	$webid = $_GET['webid'];
  	$userid = $_GET['userid'];

  	$objPHPExcel->getActiveSheet()->mergeCells('B2:D4');
    $objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setWrapText(true);

	// Miscellaneous glyphs, UTF-

	//$query="SELECT Date(DateEntered) as DateEntered,UserId,CampaignId,SUM(Summe) as Sum FROM uid_webid WHERE Date(DateEntered) = '$datum' AND CampaignId = '$cmpgnid' GROUP BY UserId ORDER BY Sum DESC";
  $query="SELECT Date(DateEntered) as DateEntered,WebsiteId,IpAddress,Hour,CityId,OsId,BrowserId,SUM(Summe) as Sum,adtech_webseiten.name WebsiteName,adtech_city.name CityName FROM yoggi.uid_webid,absolutebusy.adtech_webseiten,absolutebusy.adtech_city WHERE UserId = '$userid' AND Date(DateEntered) = '$datum' AND WebsiteId = '$webid' AND adtech_webseiten.id = uid_webid.WebsiteId AND adtech_city.id = uid_webid.CityId GROUP BY Hour,WebsiteId,OsId,BrowserId ORDER BY Hour ASC";

	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	print_r($result);
	$r = 6;
	$counter = 0;
	foreach ($result as $key => $value) {
		# code...
		$r++;
		$objPHPExcel->getActiveSheet()->getCell('B'.$r)->setValue($value['WebsiteName']);
		$objPHPExcel->getActiveSheet()->getCell('C'.$r)->setValue($value['Hour']);
    $objPHPExcel->getActiveSheet()->getCell('D'.$r)->setValue($value['IpAddress']);
    $objPHPExcel->getActiveSheet()->getCell('E'.$r)->setValue($value['CityName']);
    $objPHPExcel->getActiveSheet()->getCell('F'.$r)->setValue($value['OsId']);
    $objPHPExcel->getActiveSheet()->getCell('G'.$r)->setValue($value['BrowserId']);
    $objPHPExcel->getActiveSheet()->getCell('H'.$r)->setValue($value['Sum']);

    $objPHPExcel->setActiveSheetIndex(0)
  	            ->setCellValue('B2', "WebsiteName : ".$value['WebsiteName']."\nDatum : ".$datum."\nUserId : ".$userid);

    $counter++;
	}
	$maxrow = $counter + 6;
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
  $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
  $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);

	$objPHPExcel->getActiveSheet()->getStyle("B7:H".$maxrow)->applyFromArray($greyCellBackroundStyle);
}
//$objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);

// Rename worksheet
echo date('H:i:s') , " Rename worksheet" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('Liste der UserId nach Web&Datum');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007 file
echo date('H:i:s') , " Write to Excel2007 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xlsx', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// Save Excel 95 file
echo date('H:i:s') , " Write to Excel5 format" , EOL;
$callStartTime = microtime(true);

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;

echo date('H:i:s') , " File written to " , str_replace('.php', '.xls', pathinfo(__FILE__, PATHINFO_BASENAME)) , EOL;
echo 'Call time to write Workbook was ' , sprintf('%.4f',$callTime) , " seconds" , EOL;
// Echo memory usage
echo date('H:i:s') , ' Current memory usage: ' , (memory_get_usage(true) / 1024 / 1024) , " MB" , EOL;


// Echo memory peak usage
echo date('H:i:s') , " Peak memory usage: " , (memory_get_peak_usage(true) / 1024 / 1024) , " MB" , EOL;

// Echo done
echo date('H:i:s') , " Done writing files" , EOL;
echo 'Files have been created in ' , getcwd() , EOL;
