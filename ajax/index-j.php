<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>House Price Index Calculator</title>
<link rel="stylesheet" media="screen" href="css/test_styles.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />

<script src="http://getbootstrap.com/dist/js/bootstrap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=xxxxxxxxxxxxxx"></script>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="js/heat_maps_all.js"></script>
<script src="js/my_functions.js"></script>
<!--Setting up for Google Chart of County Averages-->
<script>
var avg_2010_1=0;
var avg_2011_1=0;
var avg_2012_1=0;
var avg_2013_1=0;
var avg_2014_1=0;
var avg_2010_2=0;
var avg_2011_2=0;
var avg_2012_2=0;
var avg_2013_2=0;
var avg_2014_2=0;
var avg_2010_3=0;
var avg_2011_3=0;
var avg_2012_3=0;
var avg_2013_3=0;
var avg_2014_3=0;
var towns_bool=false;
var county_1="";
var county_2="";
var county_n="National";
/*
var county_avgs=[
  {county:"Carlow",avg_10:177838,avg_11:147348,avg_12:122890,avg_13:136006,avg_14:122641},
  {county:"Cavan",avg_10:147922,avg_11:143978,avg_12:124349,avg_13:116850,avg_14:112507},
  {county:"Clare",avg_10:183542,avg_11:167742,avg_12:144043,avg_13:131850,avg_14:134714},
  {county:"Cork",avg_10:235632,avg_11:207447,avg_12:183664,avg_13:179696,avg_14:182303},
  {county:"Donegal",avg_10:161079,avg_11:141410,avg_12:124009,avg_13:112869,avg_14:113345},
  {county:"Dublin",avg_10:327069,avg_11:304528,avg_12:276843,avg_13:300644,avg_14:333411},
  {county:"Galway",avg_10:229131,avg_11:206241,avg_12:177260,avg_13:177008,avg_14:173090},
  {county:"Kerry",avg_10:195397,avg_11:174412,avg_12:158498,avg_13:147097,avg_14:137042},
  {county:"Kildare",avg_10:242653,avg_11:228354,avg_12:194872,avg_13:200816,avg_14:228306},
  {county:"Kilkenny",avg_10:201855,avg_11:176629,avg_12:149884,avg_13:148109,avg_14:145972},
  {county:"Laois",avg_10:170953,avg_11:134542,avg_12:115579,avg_13:126033,avg_14:111036},
  {county:"Leitrim",avg_10:135172,avg_11:122240,avg_12:116017,avg_13:95556,avg_14:103720},
  {county:"Limerick",avg_10:197607,avg_11:178925,avg_12:167659,avg_13:160267,avg_14:144204},
  {county:"Longford",avg_10:144905,avg_11:120190,avg_12:108544,avg_13:95726,avg_14:96457},
  {county:"Louth",avg_10:194125,avg_11:161942,avg_12:145329,avg_13:143820,avg_14:136846},
  {county:"Mayo",avg_10:168786,avg_11:160994,avg_12:129150,avg_13:136206,avg_14:120375},
  {county:"Meath",avg_10:230117,avg_11:202266,avg_12:184670,avg_13:178055,avg_14:194092},
  {county:"Monaghan",avg_10:162852,avg_11:141114,avg_12:129188,avg_13:111327,avg_14:113435},
  {county:"National",avg_10:245951,avg_11:221979,avg_12:205010,avg_13:212745,avg_14:222264},
  {county:"Offaly",avg_10:165861,avg_11:141400,avg_12:133740,avg_13:121328,avg_14:137275},
  {county:"Roscommon",avg_10:149685,avg_11:124231,avg_12:107066,avg_13:103778,avg_14:99007},
  {county:"Sligo",avg_10:169947,avg_11:146956,avg_12:130302,avg_13:133240,avg_14:142252},
  {county:"Tipperary",avg_10:170360,avg_11:153299,avg_12:150543,avg_13:130733,avg_14:133496},
  {county:"Waterford",avg_10:187500,avg_11:161551,avg_12:151322,avg_13:139157,avg_14:143144},
  {county:"Westmeath",avg_10:163641,avg_11:146751,avg_12:128807,avg_13:122871,avg_14:119723},
  {county:"Wexford",avg_10:184385,avg_11:149850,avg_12:136448,avg_13:131173,avg_14:132033},
  {county:"Wicklow",avg_10:297418,avg_11:251340,avg_12:234888,avg_13:248998,avg_14:259219}];
*/
var county_avg_month=[
{avg_jan_10:178334,avg_feb_10:177205,avg_mar_10:180738,avg_apr_10:161593,avg_may_10:205699,avg_jun_10:197105,avg_jul_10:152172,avg_aug_10:212958,avg_sep_10:178012,avg_oct_10:178776,avg_nov_10:164553,avg_dec_10:175520,avg_jan_11:170443,avg_feb_11:168266,avg_mar_11:164053,avg_apr_11:138751,avg_may_11:150340,avg_jun_11:163069,avg_jul_11:155786,avg_aug_11:121476,avg_sep_11:112158,avg_oct_11:169011,avg_nov_11:161437,avg_dec_11:110458,avg_jan_12:122723,avg_feb_12:146179,avg_mar_12:120783,avg_apr_12:112611,avg_may_12:126289,avg_jun_12:99837,avg_jul_12:140391,avg_aug_12:141007,avg_sep_12:114699,avg_oct_12:102852,avg_nov_12:122555,avg_dec_12:118956,avg_jan_13:134729,avg_feb_13:125030,avg_mar_13:293358,avg_apr_13:112191,avg_may_13:135779,avg_jun_13:152414,avg_jul_13:106901,avg_aug_13:150097,avg_sep_13:117202,avg_oct_13:131210,avg_nov_13:131928,avg_dec_13:126417,avg_jan_14:121375,avg_feb_14:93369,avg_mar_14:134649,avg_apr_14:116234,avg_may_14:101121,avg_jun_14:100157,avg_jul_14:139352,avg_aug_14:128382,avg_sep_14:138982,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Carlow"},
{avg_jan_10:148355,avg_feb_10:162855,avg_mar_10:151600,avg_apr_10:145414,avg_may_10:156890,avg_jun_10:148076,avg_jul_10:139634,avg_aug_10:137890,avg_sep_10:131605,avg_oct_10:162417,avg_nov_10:141059,avg_dec_10:159674,avg_jan_11:141362,avg_feb_11:199020,avg_mar_11:192678,avg_apr_11:165085,avg_may_11:131604,avg_jun_11:141610,avg_jul_11:137893,avg_aug_11:127291,avg_sep_11:126587,avg_oct_11:107232,avg_nov_11:125664,avg_dec_11:142235,avg_jan_12:121510,avg_feb_12:138752,avg_mar_12:143675,avg_apr_12:117612,avg_may_12:98365,avg_jun_12:108207,avg_jul_12:157809,avg_aug_12:105161,avg_sep_12:130841,avg_oct_12:135875,avg_nov_12:119005,avg_dec_12:118145,avg_jan_13:106079,avg_feb_13:108885,avg_mar_13:127231,avg_apr_13:151483,avg_may_13:99871,avg_jun_13:101427,avg_jul_13:139778,avg_aug_13:111294,avg_sep_13:106486,avg_oct_13:118390,avg_nov_13:115057,avg_dec_13:113486,avg_jan_14:95449,avg_feb_14:112777,avg_mar_14:97589,avg_apr_14:119415,avg_may_14:112940,avg_jun_14:106841,avg_jul_14:126252,avg_aug_14:104736,avg_sep_14:120587,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Cavan"},
{avg_jan_10:221210,avg_feb_10:208201,avg_mar_10:168460,avg_apr_10:185467,avg_may_10:166248,avg_jun_10:195759,avg_jul_10:181030,avg_aug_10:177500,avg_sep_10:175953,avg_oct_10:170901,avg_nov_10:155871,avg_dec_10:216764,avg_jan_11:170823,avg_feb_11:173907,avg_mar_11:189702,avg_apr_11:157061,avg_may_11:152320,avg_jun_11:170764,avg_jul_11:170029,avg_aug_11:163921,avg_sep_11:161040,avg_oct_11:173863,avg_nov_11:138160,avg_dec_11:191711,avg_jan_12:138188,avg_feb_12:150930,avg_mar_12:140148,avg_apr_12:151607,avg_may_12:146197,avg_jun_12:144810,avg_jul_12:121983,avg_aug_12:151987,avg_sep_12:196972,avg_oct_12:137522,avg_nov_12:123080,avg_dec_12:140533,avg_jan_13:159415,avg_feb_13:131031,avg_mar_13:123331,avg_apr_13:133586,avg_may_13:129729,avg_jun_13:125101,avg_jul_13:144028,avg_aug_13:122413,avg_sep_13:137140,avg_oct_13:115075,avg_nov_13:120146,avg_dec_13:131672,avg_jan_14:145758,avg_feb_14:193576,avg_mar_14:125719,avg_apr_14:152587,avg_may_14:122242,avg_jun_14:123899,avg_jul_14:116013,avg_aug_14:127408,avg_sep_14:134675,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Clare"},
{avg_jan_10:260695,avg_feb_10:257874,avg_mar_10:250945,avg_apr_10:249828,avg_may_10:219309,avg_jun_10:253279,avg_jul_10:230111,avg_aug_10:214568,avg_sep_10:216204,avg_oct_10:237918,avg_nov_10:226079,avg_dec_10:230526,avg_jan_11:219538,avg_feb_11:222912,avg_mar_11:234398,avg_apr_11:207972,avg_may_11:218904,avg_jun_11:207999,avg_jul_11:196512,avg_aug_11:236461,avg_sep_11:190348,avg_oct_11:204886,avg_nov_11:198741,avg_dec_11:185295,avg_jan_12:189256,avg_feb_12:168852,avg_mar_12:182812,avg_apr_12:214112,avg_may_12:178451,avg_jun_12:189722,avg_jul_12:199357,avg_aug_12:183696,avg_sep_12:178683,avg_oct_12:175860,avg_nov_12:172879,avg_dec_12:185125,avg_jan_13:182357,avg_feb_13:197371,avg_mar_13:168189,avg_apr_13:173559,avg_may_13:156894,avg_jun_13:180119,avg_jul_13:196428,avg_aug_13:183953,avg_sep_13:179489,avg_oct_13:171324,avg_nov_13:199381,avg_dec_13:170258,avg_jan_14:164291,avg_feb_14:169595,avg_mar_14:163499,avg_apr_14:177453,avg_may_14:180724,avg_jun_14:186492,avg_jul_14:193231,avg_aug_14:187147,avg_sep_14:199199,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Cork"},
{avg_jan_10:185279,avg_feb_10:166362,avg_mar_10:161816,avg_apr_10:159838,avg_may_10:152950,avg_jun_10:171366,avg_jul_10:162655,avg_aug_10:207025,avg_sep_10:142868,avg_oct_10:152240,avg_nov_10:144869,avg_dec_10:145826,avg_jan_11:140177,avg_feb_11:136994,avg_mar_11:156660,avg_apr_11:140759,avg_may_11:147354,avg_jun_11:146560,avg_jul_11:135083,avg_aug_11:122339,avg_sep_11:136122,avg_oct_11:114288,avg_nov_11:163851,avg_dec_11:139346,avg_jan_12:121746,avg_feb_12:124139,avg_mar_12:125367,avg_apr_12:119956,avg_may_12:121271,avg_jun_12:139127,avg_jul_12:122701,avg_aug_12:125299,avg_sep_12:118133,avg_oct_12:120502,avg_nov_12:126316,avg_dec_12:116935,avg_jan_13:93216,avg_feb_13:122696,avg_mar_13:120057,avg_apr_13:107238,avg_may_13:103329,avg_jun_13:126164,avg_jul_13:127191,avg_aug_13:124853,avg_sep_13:119121,avg_oct_13:102718,avg_nov_13:113103,avg_dec_13:101230,avg_jan_14:124893,avg_feb_14:110060,avg_mar_14:128725,avg_apr_14:107861,avg_may_14:118132,avg_jun_14:118812,avg_jul_14:98538,avg_aug_14:112079,avg_sep_14:117065,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Donegal"},
{avg_jan_10:353799,avg_feb_10:342738,avg_mar_10:339403,avg_apr_10:328950,avg_may_10:321375,avg_jun_10:324290,avg_jul_10:322419,avg_aug_10:340954,avg_sep_10:334261,avg_oct_10:309249,avg_nov_10:295365,avg_dec_10:317903,avg_jan_11:325141,avg_feb_11:316533,avg_mar_11:329832,avg_apr_11:315888,avg_may_11:308177,avg_jun_11:309219,avg_jul_11:312095,avg_aug_11:330200,avg_sep_11:310518,avg_oct_11:281327,avg_nov_11:291557,avg_dec_11:262911,avg_jan_12:292640,avg_feb_12:284600,avg_mar_12:269253,avg_apr_12:265065,avg_may_12:285495,avg_jun_12:244834,avg_jul_12:286994,avg_aug_12:301770,avg_sep_12:291538,avg_oct_12:264616,avg_nov_12:271257,avg_dec_12:274489,avg_jan_13:272829,avg_feb_13:272569,avg_mar_13:265848,avg_apr_13:289017,avg_may_13:279709,avg_jun_13:307429,avg_jul_13:304273,avg_aug_13:318828,avg_sep_13:293653,avg_oct_13:314339,avg_nov_13:328255,avg_dec_13:305466,avg_jan_14:304531,avg_feb_14:292577,avg_mar_14:298522,avg_apr_14:327208,avg_may_14:337615,avg_jun_14:328603,avg_jul_14:336072,avg_aug_14:369531,avg_sep_14:361288,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Dublin"},
{avg_jan_10:291560,avg_feb_10:218554,avg_mar_10:232917,avg_apr_10:245768,avg_may_10:205625,avg_jun_10:229533,avg_jul_10:231727,avg_aug_10:240834,avg_sep_10:224928,avg_oct_10:226685,avg_nov_10:214512,avg_dec_10:208517,avg_jan_11:207427,avg_feb_11:245131,avg_mar_11:281678,avg_apr_11:201701,avg_may_11:214946,avg_jun_11:228599,avg_jul_11:203493,avg_aug_11:175592,avg_sep_11:194528,avg_oct_11:179494,avg_nov_11:204186,avg_dec_11:192426,avg_jan_12:158348,avg_feb_12:188833,avg_mar_12:162773,avg_apr_12:165718,avg_may_12:183137,avg_jun_12:163492,avg_jul_12:173404,avg_aug_12:198621,avg_sep_12:198568,avg_oct_12:187888,avg_nov_12:162842,avg_dec_12:180725,avg_jan_13:147570,avg_feb_13:205188,avg_mar_13:186454,avg_apr_13:164086,avg_may_13:168261,avg_jun_13:184003,avg_jul_13:183738,avg_aug_13:182780,avg_sep_13:164285,avg_oct_13:179296,avg_nov_13:162329,avg_dec_13:188109,avg_jan_14:161191,avg_feb_14:167549,avg_mar_14:151429,avg_apr_14:154312,avg_may_14:186975,avg_jun_14:177645,avg_jul_14:173412,avg_aug_14:180243,avg_sep_14:193000,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Galway"},
{avg_jan_10:204495,avg_feb_10:181706,avg_mar_10:213720,avg_apr_10:194261,avg_may_10:181152,avg_jun_10:240975,avg_jul_10:187647,avg_aug_10:201866,avg_sep_10:175072,avg_oct_10:181598,avg_nov_10:181570,avg_dec_10:192478,avg_jan_11:173948,avg_feb_11:181515,avg_mar_11:165845,avg_apr_11:173254,avg_may_11:228863,avg_jun_11:180919,avg_jul_11:173067,avg_aug_11:161972,avg_sep_11:182244,avg_oct_11:169994,avg_nov_11:141285,avg_dec_11:169243,avg_jan_12:201752,avg_feb_12:163210,avg_mar_12:166237,avg_apr_12:147512,avg_may_12:142163,avg_jun_12:145512,avg_jul_12:156590,avg_aug_12:147353,avg_sep_12:127538,avg_oct_12:164853,avg_nov_12:181264,avg_dec_12:153067,avg_jan_13:147706,avg_feb_13:209995,avg_mar_13:132021,avg_apr_13:150610,avg_may_13:148629,avg_jun_13:147673,avg_jul_13:139874,avg_aug_13:147026,avg_sep_13:134793,avg_oct_13:137411,avg_nov_13:149674,avg_dec_13:149523,avg_jan_14:157860,avg_feb_14:123502,avg_mar_14:136742,avg_apr_14:129214,avg_may_14:146565,avg_jun_14:140119,avg_jul_14:135558,avg_aug_14:143640,avg_sep_14:124124,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Kerry"},
{avg_jan_10:276422,avg_feb_10:279012,avg_mar_10:254200,avg_apr_10:229059,avg_may_10:232166,avg_jun_10:255157,avg_jul_10:232919,avg_aug_10:236864,avg_sep_10:227036,avg_oct_10:259540,avg_nov_10:226852,avg_dec_10:227732,avg_jan_11:281050,avg_feb_11:256322,avg_mar_11:185309,avg_apr_11:243901,avg_may_11:218691,avg_jun_11:256383,avg_jul_11:270802,avg_aug_11:224885,avg_sep_11:210389,avg_oct_11:211031,avg_nov_11:215588,avg_dec_11:214850,avg_jan_12:201650,avg_feb_12:178087,avg_mar_12:189134,avg_apr_12:166588,avg_may_12:194728,avg_jun_12:210415,avg_jul_12:175726,avg_aug_12:225990,avg_sep_12:180170,avg_oct_12:178508,avg_nov_12:196712,avg_dec_12:207882,avg_jan_13:185293,avg_feb_13:190659,avg_mar_13:172703,avg_apr_13:191138,avg_may_13:207060,avg_jun_13:216547,avg_jul_13:231771,avg_aug_13:195717,avg_sep_13:180625,avg_oct_13:208353,avg_nov_13:211419,avg_dec_13:199283,avg_jan_14:215186,avg_feb_14:207455,avg_mar_14:182969,avg_apr_14:242242,avg_may_14:240527,avg_jun_14:252270,avg_jul_14:214514,avg_aug_14:236202,avg_sep_14:245413,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Kildare"},
{avg_jan_10:204751,avg_feb_10:190546,avg_mar_10:206541,avg_apr_10:187851,avg_may_10:210999,avg_jun_10:213760,avg_jul_10:181828,avg_aug_10:272414,avg_sep_10:198977,avg_oct_10:171087,avg_nov_10:164387,avg_dec_10:215810,avg_jan_11:173588,avg_feb_11:183644,avg_mar_11:173250,avg_apr_11:203623,avg_may_11:202961,avg_jun_11:165437,avg_jul_11:220341,avg_aug_11:138640,avg_sep_11:177214,avg_oct_11:151105,avg_nov_11:131837,avg_dec_11:195922,avg_jan_12:147991,avg_feb_12:190470,avg_mar_12:137692,avg_apr_12:162581,avg_may_12:137053,avg_jun_12:120617,avg_jul_12:137654,avg_aug_12:149286,avg_sep_12:155617,avg_oct_12:132059,avg_nov_12:171273,avg_dec_12:155005,avg_jan_13:162131,avg_feb_13:134333,avg_mar_13:130251,avg_apr_13:152162,avg_may_13:133521,avg_jun_13:134993,avg_jul_13:173008,avg_aug_13:171332,avg_sep_13:144261,avg_oct_13:174583,avg_nov_13:130436,avg_dec_13:130263,avg_jan_14:113501,avg_feb_14:125215,avg_mar_14:137621,avg_apr_14:118852,avg_may_14:129065,avg_jun_14:154340,avg_jul_14:178877,avg_aug_14:166604,avg_sep_14:165465,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Kilkenny"},
{avg_jan_10:188318,avg_feb_10:161927,avg_mar_10:184190,avg_apr_10:190752,avg_may_10:159218,avg_jun_10:190813,avg_jul_10:158702,avg_aug_10:170121,avg_sep_10:182539,avg_oct_10:171243,avg_nov_10:135057,avg_dec_10:161891,avg_jan_11:186041,avg_feb_11:129416,avg_mar_11:139138,avg_apr_11:151612,avg_may_11:119056,avg_jun_11:145227,avg_jul_11:117128,avg_aug_11:135603,avg_sep_11:123137,avg_oct_11:155844,avg_nov_11:120375,avg_dec_11:130209,avg_jan_12:147519,avg_feb_12:103093,avg_mar_12:136838,avg_apr_12:103808,avg_may_12:119522,avg_jun_12:113921,avg_jul_12:124815,avg_aug_12:129006,avg_sep_12:112976,avg_oct_12:104266,avg_nov_12:100003,avg_dec_12:119995,avg_jan_13:104894,avg_feb_13:177056,avg_mar_13:131558,avg_apr_13:116472,avg_may_13:119246,avg_jun_13:106848,avg_jul_13:100589,avg_aug_13:249164,avg_sep_13:100708,avg_oct_13:102573,avg_nov_13:104368,avg_dec_13:123015,avg_jan_14:117479,avg_feb_14:106111,avg_mar_14:86448,avg_apr_14:106131,avg_may_14:115362,avg_jun_14:111050,avg_jul_14:102366,avg_aug_14:132855,avg_sep_14:126957,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Laois"},
{avg_jan_10:150367,avg_feb_10:124957,avg_mar_10:120798,avg_apr_10:153463,avg_may_10:137078,avg_jun_10:114797,avg_jul_10:117194,avg_aug_10:146203,avg_sep_10:124639,avg_oct_10:141280,avg_nov_10:145829,avg_dec_10:146651,avg_jan_11:117037,avg_feb_11:98680,avg_mar_11:129316,avg_apr_11:214215,avg_may_11:152144,avg_jun_11:115514,avg_jul_11:109338,avg_aug_11:138562,avg_sep_11:108207,avg_oct_11:118915,avg_nov_11:108957,avg_dec_11:113742,avg_jan_12:98852,avg_feb_12:104150,avg_mar_12:120014,avg_apr_12:152433,avg_may_12:140777,avg_jun_12:148960,avg_jul_12:118378,avg_aug_12:142200,avg_sep_12:98558,avg_oct_12:87682,avg_nov_12:99338,avg_dec_12:97397,avg_jan_13:99106,avg_feb_13:96747,avg_mar_13:91950,avg_apr_13:106691,avg_may_13:80540,avg_jun_13:104131,avg_jul_13:86714,avg_aug_13:99267,avg_sep_13:117510,avg_oct_13:86962,avg_nov_13:91376,avg_dec_13:100179,avg_jan_14:96172,avg_feb_14:102321,avg_mar_14:81163,avg_apr_14:96412,avg_may_14:127416,avg_jun_14:94417,avg_jul_14:121317,avg_aug_14:110852,avg_sep_14:93459,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Leitrim"},
{avg_jan_10:194558,avg_feb_10:245369,avg_mar_10:196844,avg_apr_10:169313,avg_may_10:214548,avg_jun_10:185623,avg_jul_10:188617,avg_aug_10:216578,avg_sep_10:191521,avg_oct_10:214177,avg_nov_10:173404,avg_dec_10:185102,avg_jan_11:203423,avg_feb_11:177802,avg_mar_11:198378,avg_apr_11:183050,avg_may_11:161322,avg_jun_11:172202,avg_jul_11:172003,avg_aug_11:211356,avg_sep_11:178303,avg_oct_11:159960,avg_nov_11:162428,avg_dec_11:175908,avg_jan_12:183171,avg_feb_12:143361,avg_mar_12:164247,avg_apr_12:145563,avg_may_12:186979,avg_jun_12:180463,avg_jul_12:157187,avg_aug_12:187025,avg_sep_12:181744,avg_oct_12:158369,avg_nov_12:158556,avg_dec_12:165973,avg_jan_13:143151,avg_feb_13:215096,avg_mar_13:132615,avg_apr_13:159004,avg_may_13:157673,avg_jun_13:154229,avg_jul_13:161358,avg_aug_13:195846,avg_sep_13:134959,avg_oct_13:164398,avg_nov_13:163014,avg_dec_13:149927,avg_jan_14:147438,avg_feb_14:145276,avg_mar_14:133003,avg_apr_14:124728,avg_may_14:145743,avg_jun_14:147641,avg_jul_14:142765,avg_aug_14:137373,avg_sep_14:165229,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Limerick"},
{avg_jan_10:122020,avg_feb_10:167789,avg_mar_10:146703,avg_apr_10:159733,avg_may_10:115726,avg_jun_10:171381,avg_jul_10:159578,avg_aug_10:139352,avg_sep_10:158850,avg_oct_10:140724,avg_nov_10:83375,avg_dec_10:139082,avg_jan_11:140437,avg_feb_11:109131,avg_mar_11:103026,avg_apr_11:121100,avg_may_11:92167,avg_jun_11:158084,avg_jul_11:117741,avg_aug_11:87666,avg_sep_11:151300,avg_oct_11:135428,avg_nov_11:108979,avg_dec_11:107688,avg_jan_12:90875,avg_feb_12:80744,avg_mar_12:121330,avg_apr_12:89333,avg_may_12:118589,avg_jun_12:120381,avg_jul_12:85273,avg_aug_12:189862,avg_sep_12:103913,avg_oct_12:109957,avg_nov_12:106732,avg_dec_12:93496,avg_jan_13:81450,avg_feb_13:92937,avg_mar_13:103905,avg_apr_13:105333,avg_may_13:86672,avg_jun_13:95820,avg_jul_13:91581,avg_aug_13:96093,avg_sep_13:101095,avg_oct_13:98667,avg_nov_13:101844,avg_dec_13:93613,avg_jan_14:57955,avg_feb_14:111312,avg_mar_14:79587,avg_apr_14:98838,avg_may_14:114064,avg_jun_14:91605,avg_jul_14:118802,avg_aug_14:84237,avg_sep_14:89906,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Longford"},
{avg_jan_10:205492,avg_feb_10:274793,avg_mar_10:196276,avg_apr_10:204330,avg_may_10:182363,avg_jun_10:190949,avg_jul_10:202028,avg_aug_10:222405,avg_sep_10:174998,avg_oct_10:155676,avg_nov_10:196454,avg_dec_10:155251,avg_jan_11:201954,avg_feb_11:178334,avg_mar_11:163083,avg_apr_11:142077,avg_may_11:171590,avg_jun_11:156265,avg_jul_11:170314,avg_aug_11:167186,avg_sep_11:152919,avg_oct_11:143844,avg_nov_11:195257,avg_dec_11:157048,avg_jan_12:140605,avg_feb_12:155362,avg_mar_12:150921,avg_apr_12:121905,avg_may_12:145485,avg_jun_12:144064,avg_jul_12:153795,avg_aug_12:161161,avg_sep_12:153205,avg_oct_12:141678,avg_nov_12:168275,avg_dec_12:131642,avg_jan_13:131801,avg_feb_13:125594,avg_mar_13:145735,avg_apr_13:152511,avg_may_13:151216,avg_jun_13:148216,avg_jul_13:135842,avg_aug_13:143280,avg_sep_13:137000,avg_oct_13:184102,avg_nov_13:147731,avg_dec_13:131445,avg_jan_14:138582,avg_feb_14:124103,avg_mar_14:120969,avg_apr_14:127000,avg_may_14:139328,avg_jun_14:140760,avg_jul_14:138495,avg_aug_14:196536,avg_sep_14:152633,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Louth"},
{avg_jan_10:144859,avg_feb_10:171928,avg_mar_10:181378,avg_apr_10:176879,avg_may_10:165119,avg_jun_10:157242,avg_jul_10:174490,avg_aug_10:194147,avg_sep_10:162097,avg_oct_10:152352,avg_nov_10:156794,avg_dec_10:179565,avg_jan_11:169134,avg_feb_11:152440,avg_mar_11:162025,avg_apr_11:166750,avg_may_11:159341,avg_jun_11:142720,avg_jul_11:172342,avg_aug_11:163232,avg_sep_11:126590,avg_oct_11:135905,avg_nov_11:182410,avg_dec_11:180061,avg_jan_12:127666,avg_feb_12:142085,avg_mar_12:144379,avg_apr_12:125248,avg_may_12:138030,avg_jun_12:116400,avg_jul_12:123895,avg_aug_12:130719,avg_sep_12:124147,avg_oct_12:133622,avg_nov_12:132266,avg_dec_12:119124,avg_jan_13:100537,avg_feb_13:168464,avg_mar_13:141449,avg_apr_13:132467,avg_may_13:117574,avg_jun_13:136924,avg_jul_13:130970,avg_aug_13:145798,avg_sep_13:112135,avg_oct_13:155544,avg_nov_13:158951,avg_dec_13:129902,avg_jan_14:110630,avg_feb_14:107939,avg_mar_14:120945,avg_apr_14:125797,avg_may_14:127446,avg_jun_14:121147,avg_jul_14:129607,avg_aug_14:108748,avg_sep_14:121372,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Mayo"},
{avg_jan_10:215692,avg_feb_10:218058,avg_mar_10:239548,avg_apr_10:269479,avg_may_10:247526,avg_jun_10:231781,avg_jul_10:258224,avg_aug_10:206531,avg_sep_10:214317,avg_oct_10:228617,avg_nov_10:194328,avg_dec_10:245575,avg_jan_11:229528,avg_feb_11:210127,avg_mar_11:217265,avg_apr_11:203909,avg_may_11:196382,avg_jun_11:173481,avg_jul_11:196729,avg_aug_11:226108,avg_sep_11:182243,avg_oct_11:200426,avg_nov_11:227659,avg_dec_11:180656,avg_jan_12:165529,avg_feb_12:169687,avg_mar_12:188994,avg_apr_12:199615,avg_may_12:210849,avg_jun_12:187429,avg_jul_12:180292,avg_aug_12:189232,avg_sep_12:188746,avg_oct_12:162745,avg_nov_12:187028,avg_dec_12:184193,avg_jan_13:179049,avg_feb_13:153537,avg_mar_13:132472,avg_apr_13:158692,avg_may_13:177155,avg_jun_13:168505,avg_jul_13:181886,avg_aug_13:194720,avg_sep_13:172953,avg_oct_13:199344,avg_nov_13:191713,avg_dec_13:183508,avg_jan_14:182680,avg_feb_14:183260,avg_mar_14:189180,avg_apr_14:178482,avg_may_14:197408,avg_jun_14:198196,avg_jul_14:199977,avg_aug_14:187884,avg_sep_14:212044,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Meath"},
{avg_jan_10:181410,avg_feb_10:302568,avg_mar_10:156795,avg_apr_10:145453,avg_may_10:156186,avg_jun_10:143636,avg_jul_10:119020,avg_aug_10:167511,avg_sep_10:147107,avg_oct_10:156872,avg_nov_10:157842,avg_dec_10:141687,avg_jan_11:160141,avg_feb_11:129259,avg_mar_11:169864,avg_apr_11:131220,avg_may_11:125243,avg_jun_11:173246,avg_jul_11:151234,avg_aug_11:159666,avg_sep_11:148295,avg_oct_11:139782,avg_nov_11:124298,avg_dec_11:123551,avg_jan_12:134824,avg_feb_12:103481,avg_mar_12:89362,avg_apr_12:101284,avg_may_12:127492,avg_jun_12:132546,avg_jul_12:147513,avg_aug_12:162625,avg_sep_12:127895,avg_oct_12:110261,avg_nov_12:122985,avg_dec_12:154102,avg_jan_13:91881,avg_feb_13:94241,avg_mar_13:117785,avg_apr_13:98516,avg_may_13:87437,avg_jun_13:100600,avg_jul_13:104258,avg_aug_13:144629,avg_sep_13:123668,avg_oct_13:147652,avg_nov_13:102508,avg_dec_13:103223,avg_jan_14:141673,avg_feb_14:106094,avg_mar_14:120398,avg_apr_14:107097,avg_may_14:109088,avg_jun_14:101121,avg_jul_14:126368,avg_aug_14:122813,avg_sep_14:109976,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Monaghan"},
{avg_jan_10:162030,avg_feb_10:189550,avg_mar_10:131758,avg_apr_10:202566,avg_may_10:175493,avg_jun_10:155333,avg_jul_10:175875,avg_aug_10:184450,avg_sep_10:194349,avg_oct_10:147863,avg_nov_10:143855,avg_dec_10:159210,avg_jan_11:150107,avg_feb_11:144315,avg_mar_11:140117,avg_apr_11:132937,avg_may_11:128962,avg_jun_11:137960,avg_jul_11:162679,avg_aug_11:136519,avg_sep_11:130324,avg_oct_11:130079,avg_nov_11:146497,avg_dec_11:148237,avg_jan_12:128910,avg_feb_12:180045,avg_mar_12:125598,avg_apr_12:133663,avg_may_12:121817,avg_jun_12:154863,avg_jul_12:118375,avg_aug_12:157902,avg_sep_12:129474,avg_oct_12:135334,avg_nov_12:112051,avg_dec_12:129901,avg_jan_13:106500,avg_feb_13:131102,avg_mar_13:100521,avg_apr_13:137639,avg_may_13:127187,avg_jun_13:138303,avg_jul_13:121661,avg_aug_13:127026,avg_sep_13:123510,avg_oct_13:106615,avg_nov_13:128120,avg_dec_13:112655,avg_jan_14:123669,avg_feb_14:133944,avg_mar_14:131944,avg_apr_14:142512,avg_may_14:138160,avg_jun_14:119684,avg_jul_14:145901,avg_aug_14:149628,avg_sep_14:144399,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Offaly"},
{avg_jan_10:148601,avg_feb_10:163142,avg_mar_10:152291,avg_apr_10:135920,avg_may_10:141610,avg_jun_10:148581,avg_jul_10:167271,avg_aug_10:147224,avg_sep_10:142403,avg_oct_10:148331,avg_nov_10:143379,avg_dec_10:151927,avg_jan_11:161648,avg_feb_11:127750,avg_mar_11:145775,avg_apr_11:112409,avg_may_11:117375,avg_jun_11:136101,avg_jul_11:125174,avg_aug_11:144907,avg_sep_11:130843,avg_oct_11:94140,avg_nov_11:109684,avg_dec_11:106086,avg_jan_12:110395,avg_feb_12:91914,avg_mar_12:183056,avg_apr_12:85181,avg_may_12:97197,avg_jun_12:117647,avg_jul_12:112128,avg_aug_12:89251,avg_sep_12:99790,avg_oct_12:100711,avg_nov_12:103722,avg_dec_12:110035,avg_jan_13:97154,avg_feb_13:119924,avg_mar_13:108000,avg_apr_13:119517,avg_may_13:99024,avg_jun_13:131760,avg_jul_13:101189,avg_aug_13:103223,avg_sep_13:104225,avg_oct_13:88590,avg_nov_13:75055,avg_dec_13:102617,avg_jan_14:91607,avg_feb_14:108233,avg_mar_14:89070,avg_apr_14:102889,avg_may_14:97738,avg_jun_14:103306,avg_jul_14:98911,avg_aug_14:115800,avg_sep_14:94957,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Roscommon"},
{avg_jan_10:170974,avg_feb_10:187846,avg_mar_10:197718,avg_apr_10:155461,avg_may_10:149928,avg_jun_10:175939,avg_jul_10:156223,avg_aug_10:203167,avg_sep_10:169087,avg_oct_10:183453,avg_nov_10:165779,avg_dec_10:164382,avg_jan_11:227256,avg_feb_11:183780,avg_mar_11:129859,avg_apr_11:149166,avg_may_11:120333,avg_jun_11:141820,avg_jul_11:144679,avg_aug_11:157459,avg_sep_11:140714,avg_oct_11:134112,avg_nov_11:135397,avg_dec_11:144774,avg_jan_12:113500,avg_feb_12:107308,avg_mar_12:153635,avg_apr_12:118036,avg_may_12:105068,avg_jun_12:121216,avg_jul_12:152440,avg_aug_12:102288,avg_sep_12:174891,avg_oct_12:154572,avg_nov_12:132133,avg_dec_12:136451,avg_jan_13:123350,avg_feb_13:97475,avg_mar_13:96700,avg_apr_13:181750,avg_may_13:125088,avg_jun_13:129757,avg_jul_13:153273,avg_aug_13:125051,avg_sep_13:128619,avg_oct_13:126273,avg_nov_13:128866,avg_dec_13:152122,avg_jan_14:137520,avg_feb_14:141645,avg_mar_14:189159,avg_apr_14:124013,avg_may_14:126041,avg_jun_14:136802,avg_jul_14:139326,avg_aug_14:146510,avg_sep_14:116901,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Sligo"},
{avg_jan_10:167745,avg_feb_10:166451,avg_mar_10:188547,avg_apr_10:167006,avg_may_10:151102,avg_jun_10:185394,avg_jul_10:159175,avg_aug_10:157771,avg_sep_10:202819,avg_oct_10:167626,avg_nov_10:161122,avg_dec_10:168795,avg_jan_11:174637,avg_feb_11:166508,avg_mar_11:159231,avg_apr_11:143668,avg_may_11:147333,avg_jun_11:185292,avg_jul_11:141990,avg_aug_11:154305,avg_sep_11:137560,avg_oct_11:145545,avg_nov_11:125035,avg_dec_11:148761,avg_jan_12:208508,avg_feb_12:133670,avg_mar_12:137940,avg_apr_12:122598,avg_may_12:137898,avg_jun_12:110158,avg_jul_12:138115,avg_aug_12:167343,avg_sep_12:152630,avg_oct_12:179819,avg_nov_12:178034,avg_dec_12:131227,avg_jan_13:138578,avg_feb_13:103796,avg_mar_13:136410,avg_apr_13:129356,avg_may_13:131538,avg_jun_13:119190,avg_jul_13:114113,avg_aug_13:127984,avg_sep_13:135990,avg_oct_13:115767,avg_nov_13:140787,avg_dec_13:151852,avg_jan_14:122432,avg_feb_14:137361,avg_mar_14:134588,avg_apr_14:135737,avg_may_14:116773,avg_jun_14:118658,avg_jul_14:144633,avg_aug_14:145586,avg_sep_14:144066,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Tipperary"},
{avg_jan_10:170245,avg_feb_10:230896,avg_mar_10:189979,avg_apr_10:205587,avg_may_10:170094,avg_jun_10:179192,avg_jul_10:215997,avg_aug_10:180162,avg_sep_10:189506,avg_oct_10:175055,avg_nov_10:184648,avg_dec_10:174093,avg_jan_11:163892,avg_feb_11:213577,avg_mar_11:174955,avg_apr_11:158068,avg_may_11:159487,avg_jun_11:172377,avg_jul_11:140125,avg_aug_11:158303,avg_sep_11:161918,avg_oct_11:170189,avg_nov_11:115192,avg_dec_11:180228,avg_jan_12:158586,avg_feb_12:132449,avg_mar_12:117274,avg_apr_12:136255,avg_may_12:145044,avg_jun_12:126273,avg_jul_12:174991,avg_aug_12:130429,avg_sep_12:216193,avg_oct_12:173842,avg_nov_12:136285,avg_dec_12:167660,avg_jan_13:111800,avg_feb_13:129428,avg_mar_13:145565,avg_apr_13:211962,avg_may_13:126527,avg_jun_13:148660,avg_jul_13:133008,avg_aug_13:128800,avg_sep_13:122545,avg_oct_13:148783,avg_nov_13:132409,avg_dec_13:139580,avg_jan_14:138744,avg_feb_14:143614,avg_mar_14:154394,avg_apr_14:115238,avg_may_14:156239,avg_jun_14:124013,avg_jul_14:138863,avg_aug_14:148135,avg_sep_14:169884,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Waterford"},
{avg_jan_10:221649,avg_feb_10:163367,avg_mar_10:154322,avg_apr_10:147625,avg_may_10:164884,avg_jun_10:176517,avg_jul_10:165576,avg_aug_10:149631,avg_sep_10:172983,avg_oct_10:144034,avg_nov_10:172357,avg_dec_10:151963,avg_jan_11:158603,avg_feb_11:139093,avg_mar_11:156159,avg_apr_11:145147,avg_may_11:125224,avg_jun_11:183571,avg_jul_11:150845,avg_aug_11:165660,avg_sep_11:145816,avg_oct_11:128460,avg_nov_11:133336,avg_dec_11:135031,avg_jan_12:141000,avg_feb_12:126089,avg_mar_12:110097,avg_apr_12:142173,avg_may_12:131105,avg_jun_12:142810,avg_jul_12:127684,avg_aug_12:125276,avg_sep_12:153926,avg_oct_12:112038,avg_nov_12:133333,avg_dec_12:127623,avg_jan_13:118717,avg_feb_13:119132,avg_mar_13:138408,avg_apr_13:130180,avg_may_13:159337,avg_jun_13:120592,avg_jul_13:125395,avg_aug_13:110832,avg_sep_13:105654,avg_oct_13:113825,avg_nov_13:115095,avg_dec_13:125392,avg_jan_14:92880,avg_feb_14:106351,avg_mar_14:111335,avg_apr_14:112501,avg_may_14:115236,avg_jun_14:139745,avg_jul_14:110200,avg_aug_14:135892,avg_sep_14:138008,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Westmeath"},
{avg_jan_10:191346,avg_feb_10:239835,avg_mar_10:173023,avg_apr_10:202049,avg_may_10:182083,avg_jun_10:162366,avg_jul_10:194480,avg_aug_10:173517,avg_sep_10:167494,avg_oct_10:178381,avg_nov_10:190294,avg_dec_10:174384,avg_jan_11:159834,avg_feb_11:165834,avg_mar_11:163423,avg_apr_11:166243,avg_may_11:160546,avg_jun_11:150457,avg_jul_11:147646,avg_aug_11:148295,avg_sep_11:131413,avg_oct_11:140589,avg_nov_11:156825,avg_dec_11:135650,avg_jan_12:136856,avg_feb_12:142767,avg_mar_12:134884,avg_apr_12:121129,avg_may_12:130135,avg_jun_12:151918,avg_jul_12:130046,avg_aug_12:133201,avg_sep_12:116859,avg_oct_12:147057,avg_nov_12:137750,avg_dec_12:149140,avg_jan_13:124420,avg_feb_13:130883,avg_mar_13:132292,avg_apr_13:136975,avg_may_13:140089,avg_jun_13:137578,avg_jul_13:113784,avg_aug_13:129611,avg_sep_13:130693,avg_oct_13:148909,avg_nov_13:124868,avg_dec_13:129657,avg_jan_14:133561,avg_feb_14:130867,avg_mar_14:130568,avg_apr_14:123579,avg_may_14:129363,avg_jun_14:146062,avg_jul_14:121655,avg_aug_14:130741,avg_sep_14:146859,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Wexford"},
{avg_jan_10:352839,avg_feb_10:283355,avg_mar_10:309570,avg_apr_10:331343,avg_may_10:283880,avg_jun_10:247132,avg_jul_10:324902,avg_aug_10:283767,avg_sep_10:307780,avg_oct_10:292943,avg_nov_10:296542,avg_dec_10:283857,avg_jan_11:262885,avg_feb_11:316435,avg_mar_11:246443,avg_apr_11:283725,avg_may_11:257201,avg_jun_11:231727,avg_jul_11:245837,avg_aug_11:243115,avg_sep_11:248067,avg_oct_11:256347,avg_nov_11:250040,avg_dec_11:219373,avg_jan_12:203435,avg_feb_12:178665,avg_mar_12:237138,avg_apr_12:233098,avg_may_12:222121,avg_jun_12:202111,avg_jul_12:267725,avg_aug_12:282434,avg_sep_12:240891,avg_oct_12:216400,avg_nov_12:237119,avg_dec_12:243374,avg_jan_13:237023,avg_feb_13:274814,avg_mar_13:212290,avg_apr_13:260911,avg_may_13:246250,avg_jun_13:262253,avg_jul_13:231698,avg_aug_13:228894,avg_sep_13:233915,avg_oct_13:251059,avg_nov_13:229748,avg_dec_13:299779,avg_jan_14:285385,avg_feb_14:271670,avg_mar_14:274715,avg_apr_14:215047,avg_may_14:240158,avg_jun_14:233399,avg_jul_14:255212,avg_aug_14:299283,avg_sep_14:267732,avg_oct_14:null,avg_nov_14:null,avg_dec_14:null,county:"Wicklow"},
{avg_jan_10:268076,avg_feb_10:265297,avg_mar_10:253934,avg_apr_10:251756,avg_may_10:241365,avg_jun_10:249532,avg_jul_10:245033,avg_aug_10:252071,avg_sep_10:245794,avg_oct_10:237146,avg_nov_10:221570,avg_dec_10:233607,avg_jan_11:236828,avg_feb_11:235407,avg_mar_11:232521,avg_apr_11:226239,avg_may_11:225506,avg_jun_11:220321,avg_jul_11:222503,avg_aug_11:236819,avg_sep_11:220846,avg_oct_11:208934,avg_nov_11:213073,avg_dec_11:205299,avg_jan_12:211022,avg_feb_12:198549,avg_mar_12:200082,avg_apr_12:194231,avg_may_12:205419,avg_jun_12:196649,avg_jul_12:213312,avg_aug_12:220408,avg_sep_12:212758,avg_oct_12:195647,avg_nov_12:198777,avg_dec_12:208645,avg_jan_13:189322,avg_feb_13:203190,avg_mar_13:194149,avg_apr_13:209844,avg_may_13:196624,avg_jun_13:216013,avg_jul_13:215170,avg_aug_13:226029,avg_sep_13:209852,avg_oct_13:220311,avg_nov_13:226248,avg_dec_13:217053,avg_jan_14:209751,avg_feb_14:207622,avg_mar_14:200928,avg_apr_14:208267,avg_may_14:219856,avg_jun_14:227113,avg_jul_14:224122,avg_aug_14:240302,avg_sep_14:242309,avg_oct_14:236726,avg_nov_14:null,avg_dec_14:null,county:"National"}];



google.load("visualization","1.0",{packages:["corechart"]});
$(document).ready(county_avg_chart);

function county_avg_chart(){
  county_1=document.getElementById("dd1_c").value;
  county_2=document.getElementById("dd2_c").value;
  var c;
  /*
  for(c=0;c<county_avgs.length;c+=1){
    var a=county_avgs[c];
    if(a.county==county_1){avg_2010_1=a.avg_10;
      avg_2011_1=a.avg_11;
      avg_2012_1=a.avg_12;
      avg_2013_1=a.avg_13;
      avg_2014_1=a.avg_14;
    }
    if(a.county==county_2){avg_2010_2=a.avg_10;
      avg_2011_2=a.avg_11;
      avg_2012_2=a.avg_12;
      avg_2013_2=a.avg_13;
      avg_2014_2=a.avg_14;
    }
    if(a.county=="National"){avg_2010_3=a.avg_10;
      avg_2011_3=a.avg_11;
      avg_2012_3=a.avg_12;
      avg_2013_3=a.avg_13;
      avg_2014_3=a.avg_14
    }
  }
  
  var e=new google.visualization.arrayToDataTable([
    ["Year",county_1,county_2,"National"],
    ["2010",avg_2010_1,avg_2010_2,avg_2010_3],
    ["2011",avg_2011_1,avg_2011_2,avg_2011_3],
    ["2012",avg_2012_1,avg_2012_2,avg_2012_3],
    ["2013",avg_2013_1,avg_2013_2,avg_2013_3],
    ["2014",avg_2014_1,avg_2014_2,avg_2014_3],]);
  */

for(c=0;c<county_avg_month.length;c+=1){
    var a=county_avg_month[c];
    if(a.county==county_1){
      avg_jan_10_1=a.avg_jan_10;
      avg_feb_10_1=a.avg_feb_10;
      avg_mar_10_1=a.avg_mar_10;
      avg_apr_10_1=a.avg_apr_10;
      avg_may_10_1=a.avg_may_10;
      avg_jun_10_1=a.avg_jun_10;
      avg_jul_10_1=a.avg_jul_10;
      avg_aug_10_1=a.avg_aug_10;
      avg_sep_10_1=a.avg_sep_10;
      avg_oct_10_1=a.avg_oct_10;
      avg_nov_10_1=a.avg_nov_10;
      avg_dec_10_1=a.avg_dec_10;
    avg_jan_11_1=a.avg_jan_11;
      avg_feb_11_1=a.avg_feb_11;
      avg_mar_11_1=a.avg_mar_11;
      avg_apr_11_1=a.avg_apr_11;
      avg_may_11_1=a.avg_may_11;
      avg_jun_11_1=a.avg_jun_11;
      avg_jul_11_1=a.avg_jul_11;
      avg_aug_11_1=a.avg_aug_11;
      avg_sep_11_1=a.avg_sep_11;
      avg_oct_11_1=a.avg_oct_11;
      avg_nov_11_1=a.avg_nov_11;
      avg_dec_11_1=a.avg_dec_11;
      avg_jan_12_1=a.avg_jan_12;
      avg_feb_12_1=a.avg_feb_12;
      avg_mar_12_1=a.avg_mar_12;
      avg_apr_12_1=a.avg_apr_12;
      avg_may_12_1=a.avg_may_12;
      avg_jun_12_1=a.avg_jun_12;
      avg_jul_12_1=a.avg_jul_12;
      avg_aug_12_1=a.avg_aug_12;
      avg_sep_12_1=a.avg_sep_12;
      avg_oct_12_1=a.avg_oct_12;
      avg_nov_12_1=a.avg_nov_12;
      avg_dec_12_1=a.avg_dec_12;
      avg_jan_13_1=a.avg_jan_13;
      avg_feb_13_1=a.avg_feb_13;
      avg_mar_13_1=a.avg_mar_13;
      avg_apr_13_1=a.avg_apr_13;
      avg_may_13_1=a.avg_may_13;
      avg_jun_13_1=a.avg_jun_13;
      avg_jul_13_1=a.avg_jul_13;
      avg_aug_13_1=a.avg_aug_13;
      avg_sep_13_1=a.avg_sep_13;
      avg_oct_13_1=a.avg_oct_13;
      avg_nov_13_1=a.avg_nov_13;
      avg_dec_13_1=a.avg_dec_13;
    avg_jan_14_1=a.avg_jan_14;
      avg_feb_14_1=a.avg_feb_14;
      avg_mar_14_1=a.avg_mar_14;
      avg_apr_14_1=a.avg_apr_14;
      avg_may_14_1=a.avg_may_14;
      avg_jun_14_1=a.avg_jun_14;
      avg_jul_14_1=a.avg_jul_14;
      avg_aug_14_1=a.avg_aug_14;
      avg_sep_14_1=a.avg_sep_14;
    }
    if(a.county==county_2){avg_jan_10_2=a.avg_jan_10;
      avg_feb_10_2=a.avg_feb_10;
      avg_mar_10_2=a.avg_mar_10;
      avg_apr_10_2=a.avg_apr_10;
      avg_may_10_2=a.avg_may_10;
      avg_jun_10_2=a.avg_jun_10;
      avg_jul_10_2=a.avg_jul_10;
      avg_aug_10_2=a.avg_aug_10;
      avg_sep_10_2=a.avg_sep_10;
      avg_oct_10_2=a.avg_oct_10;
      avg_nov_10_2=a.avg_nov_10;
      avg_dec_10_2=a.avg_dec_10;
        avg_jan_11_2=a.avg_jan_11;
      avg_feb_11_2=a.avg_feb_11;
      avg_mar_11_2=a.avg_mar_11;
      avg_apr_11_2=a.avg_apr_11;
      avg_may_11_2=a.avg_may_11;
      avg_jun_11_2=a.avg_jun_11;
      avg_jul_11_2=a.avg_jul_11;
      avg_aug_11_2=a.avg_aug_11;
      avg_sep_11_2=a.avg_sep_11;
      avg_oct_11_2=a.avg_oct_11;
      avg_nov_11_2=a.avg_nov_11;
      avg_dec_11_2=a.avg_dec_11;
      avg_jan_12_2=a.avg_jan_12;
      avg_feb_12_2=a.avg_feb_12;
      avg_mar_12_2=a.avg_mar_12;
      avg_apr_12_2=a.avg_apr_12;
      avg_may_12_2=a.avg_may_12;
      avg_jun_12_2=a.avg_jun_12;
      avg_jul_12_2=a.avg_jul_12;
      avg_aug_12_2=a.avg_aug_12;
      avg_sep_12_2=a.avg_sep_12;
      avg_oct_12_2=a.avg_oct_12;
      avg_nov_12_2=a.avg_nov_12;
      avg_dec_12_2=a.avg_dec_12;
      avg_jan_13_2=a.avg_jan_13;
      avg_feb_13_2=a.avg_feb_13;
      avg_mar_13_2=a.avg_mar_13;
      avg_apr_13_2=a.avg_apr_13;
      avg_may_13_2=a.avg_may_13;
      avg_jun_13_2=a.avg_jun_13;
      avg_jul_13_2=a.avg_jul_13;
      avg_aug_13_2=a.avg_aug_13;
      avg_sep_13_2=a.avg_sep_13;
      avg_oct_13_2=a.avg_oct_13;
      avg_nov_13_2=a.avg_nov_13;
      avg_dec_13_2=a.avg_dec_13;
      avg_jan_14_2=a.avg_jan_14;
      avg_feb_14_2=a.avg_feb_14;
      avg_mar_14_2=a.avg_mar_14;
      avg_apr_14_2=a.avg_apr_14;
      avg_may_14_2=a.avg_may_14;
      avg_jun_14_2=a.avg_jun_14;
      avg_jul_14_2=a.avg_jul_14;
      avg_aug_14_2=a.avg_aug_14;
      avg_sep_14_2=a.avg_sep_14;
    }
    if(a.county=="National"){avg_2010_3=a.avg_10;
      avg_jan_10_3=a.avg_jan_10;
      avg_feb_10_3=a.avg_feb_10;
      avg_mar_10_3=a.avg_mar_10;
      avg_apr_10_3=a.avg_apr_10;
      avg_may_10_3=a.avg_may_10;
      avg_jun_10_3=a.avg_jun_10;
      avg_jul_10_3=a.avg_jul_10;
      avg_aug_10_3=a.avg_aug_10;
      avg_sep_10_3=a.avg_sep_10;
      avg_oct_10_3=a.avg_oct_10;
      avg_nov_10_3=a.avg_nov_10;
      avg_dec_10_3=a.avg_dec_10;
        avg_jan_11_3=a.avg_jan_11;
      avg_feb_11_3=a.avg_feb_11;
      avg_mar_11_3=a.avg_mar_11;
      avg_apr_11_3=a.avg_apr_11;
      avg_may_11_3=a.avg_may_11;
      avg_jun_11_3=a.avg_jun_11;
      avg_jul_11_3=a.avg_jul_11;
      avg_aug_11_3=a.avg_aug_11;
      avg_sep_11_3=a.avg_sep_11;
      avg_oct_11_3=a.avg_oct_11;
      avg_nov_11_3=a.avg_nov_11;
      avg_dec_11_3=a.avg_dec_11;
      avg_jan_12_3=a.avg_jan_12;
      avg_feb_12_3=a.avg_feb_12;
      avg_mar_12_3=a.avg_mar_12;
      avg_apr_12_3=a.avg_apr_12;
      avg_may_12_3=a.avg_may_12;
      avg_jun_12_3=a.avg_jun_12;
      avg_jul_12_3=a.avg_jul_12;
      avg_aug_12_3=a.avg_aug_12;
      avg_sep_12_3=a.avg_sep_12;
      avg_oct_12_3=a.avg_oct_12;
      avg_nov_12_3=a.avg_nov_12;
      avg_dec_12_3=a.avg_dec_12;
      avg_jan_13_3=a.avg_jan_13;
      avg_feb_13_3=a.avg_feb_13;
      avg_mar_13_3=a.avg_mar_13;
      avg_apr_13_3=a.avg_apr_13;
      avg_may_13_3=a.avg_may_13;
      avg_jun_13_3=a.avg_jun_13;
      avg_jul_13_3=a.avg_jul_13;
      avg_aug_13_3=a.avg_aug_13;
      avg_sep_13_3=a.avg_sep_13;
      avg_oct_13_3=a.avg_oct_13;
      avg_nov_13_3=a.avg_nov_13;
      avg_dec_13_3=a.avg_dec_13;
      avg_jan_14_3=a.avg_jan_14;
      avg_feb_14_3=a.avg_feb_14;
      avg_mar_14_3=a.avg_mar_14;
      avg_apr_14_3=a.avg_apr_14;
      avg_may_14_3=a.avg_may_14;
      avg_jun_14_3=a.avg_jun_14;
      avg_jul_14_3=a.avg_jul_14;
      avg_aug_14_3=a.avg_aug_14;
      avg_sep_14_3=a.avg_sep_14;
    }
  }

var e=new google.visualization.arrayToDataTable([
["Year",county_1,county_2,"National"],
["Jan-10",avg_jan_10_1,avg_jan_10_2,avg_jan_10_3],
["Feb-10",avg_feb_10_1,avg_feb_10_2,avg_feb_10_3],
["Mar-10",avg_mar_10_1,avg_mar_10_2,avg_mar_10_3],
["Apr-10",avg_apr_10_1,avg_apr_10_2,avg_apr_10_3],
["May-10",avg_may_10_1,avg_may_10_2,avg_may_10_3],
["Jun-10",avg_jun_10_1,avg_jun_10_2,avg_jun_10_3],
["Jul-10",avg_jul_10_1,avg_jul_10_2,avg_jul_10_3],
["Aug-10",avg_aug_10_1,avg_aug_10_2,avg_aug_10_3],
["Sept-10",avg_sep_10_1,avg_sep_10_2,avg_sep_10_3],
["Oct-10",avg_oct_10_1,avg_oct_10_2,avg_oct_10_3],
["Nov-10",avg_nov_10_1,avg_nov_10_2,avg_nov_10_3],
["Dec-10",avg_dec_10_1,avg_dec_10_2,avg_dec_10_3],

["Jan-11",avg_jan_11_1,avg_jan_11_2,avg_jan_11_3],
["Feb-11",avg_feb_11_1,avg_feb_11_2,avg_feb_11_3],
["Mar-11",avg_mar_11_1,avg_mar_11_2,avg_mar_11_3],
["Apr-11",avg_apr_11_1,avg_apr_11_2,avg_apr_11_3],
["May-11",avg_may_11_1,avg_may_11_2,avg_may_11_3],
["Jun-11",avg_jun_11_1,avg_jun_11_2,avg_jun_11_3],
["Jul-11",avg_jul_11_1,avg_jul_11_2,avg_jul_11_3],
["Aug-11",avg_aug_11_1,avg_aug_11_2,avg_aug_11_3],
["Sept-11",avg_sep_11_1,avg_sep_11_2,avg_sep_11_3],
["Oct-11",avg_oct_11_1,avg_oct_11_2,avg_oct_11_3],
["Nov-11",avg_nov_11_1,avg_nov_11_2,avg_nov_11_3],
["Dec-11",avg_dec_11_1,avg_dec_11_2,avg_dec_11_3],

["Jan-12",avg_jan_12_1,avg_jan_12_2,avg_jan_12_3],
["Feb-12",avg_feb_12_1,avg_feb_12_2,avg_feb_12_3],
["Mar-12",avg_mar_12_1,avg_mar_12_2,avg_mar_12_3],
["Apr-12",avg_apr_12_1,avg_apr_12_2,avg_apr_12_3],
["May-12",avg_may_12_1,avg_may_12_2,avg_may_12_3],
["Jun-12",avg_jun_12_1,avg_jun_12_2,avg_jun_12_3],
["Jul-12",avg_jul_12_1,avg_jul_12_2,avg_jul_12_3],
["Aug-12",avg_aug_12_1,avg_aug_12_2,avg_aug_12_3],
["Sept-12",avg_sep_12_1,avg_sep_12_2,avg_sep_12_3],
["Oct-12",avg_oct_12_1,avg_oct_12_2,avg_oct_12_3],
["Nov-12",avg_nov_12_1,avg_nov_12_2,avg_nov_12_3],
["Dec-12",avg_dec_12_1,avg_dec_12_2,avg_dec_12_3],

["Jan-13",avg_jan_13_1,avg_jan_13_2,avg_jan_13_3],
["Feb-13",avg_feb_13_1,avg_feb_13_2,avg_feb_13_3],
["Mar-13",avg_mar_13_1,avg_mar_13_2,avg_mar_13_3],
["Apr-13",avg_apr_13_1,avg_apr_13_2,avg_apr_13_3],
["May-13",avg_may_13_1,avg_may_13_2,avg_may_13_3],
["Jun-13",avg_jun_13_1,avg_jun_13_2,avg_jun_13_3],
["Jul-13",avg_jul_13_1,avg_jul_13_2,avg_jul_13_3],
["Aug-13",avg_aug_13_1,avg_aug_13_2,avg_aug_13_3],
["Sept-13",avg_sep_13_1,avg_sep_13_2,avg_sep_13_3],
["Oct-13",avg_oct_13_1,avg_oct_13_2,avg_oct_13_3],
["Nov-13",avg_nov_13_1,avg_nov_13_2,avg_nov_13_3],
["Dec-13",avg_dec_13_1,avg_dec_13_2,avg_dec_13_3],

["Jan-14",avg_jan_14_1,avg_jan_14_2,avg_jan_14_3],
["Feb-14",avg_feb_14_1,avg_feb_14_2,avg_feb_14_3],
["Mar-14",avg_mar_14_1,avg_mar_14_2,avg_mar_14_3],
["Apr-14",avg_apr_14_1,avg_apr_14_2,avg_apr_14_3],
["May-14",avg_may_14_1,avg_may_14_2,avg_may_14_3],
["Jun-14",avg_jun_14_1,avg_jun_14_2,avg_jun_14_3],
["Jul-14",avg_jul_14_1,avg_jul_14_2,avg_jul_14_3],
["Aug-14",avg_aug_14_1,avg_aug_14_2,avg_aug_14_3],
["Sept-14",avg_sep_14_1,avg_sep_14_2,avg_sep_14_3],
]);

  var b={
    title:"House Price Averages by County:",
    curveType:"function",
    is3D:true,
    legend:"top",
    width:650,
    height:280,
    hAxis: { textPosition: 'none' }};
  var d=new google.visualization.LineChart(document.getElementById("chart_div"));
  d.draw(e,b)
}
</script>
<!--Script to call PHP to calculate and return county averages-->
<script>
function county_avg_data(b,a){
  xmlhttp.open("GET","ajax/county_averages.php?county_1="+b+"&county_2="+a,false);
  xmlhttp.send()
}
</script>
<!--Script for showing/hiding of county/town buttons and dropdowns-->
<script>
$(document).ready(function(){
  $(".c_btn").click(function(){
    $("#drop_downs_town").hide();
    $("#dd1_t").hide();
    $("#dd2_t").hide();
    $("#compare_button_county").show();
    towns_bool=false;
    county_avg_chart();
  });
  $(".t_btn").click(function(){
  	$("#drop_downs_town").show();
  	$("#dd1_t").show();
  	$("#dd2_t").show();
  	$("#compare_button_county").hide();
  	$("#compare_button_town").show();
    towns_bool=true;
    towns_ddls(str);
  });
});
</script>
<script>
//Debugging related
function print_to_screen(){
  window.alert("You changed the drop-down!");
}
</script>
<!--Script for drawing the circle on the map-->
<script>
function drawCircle(l,k,d){
  var g=Math.PI/180;
  var a=180/Math.PI;
  var f=3963;
  var m=1024;
  var n=(k/f)*a;
  var o=n/Math.cos(l.lat()*g);
  var j=new Array();

  if(d==1){
    var b=0;
    var e=m+1}
  else{
    var b=m+1;
    var e=0}
  for(var h=b;(d==1?h<e:h>e);h=h+d){
    var c=Math.PI*(h/(m/2));
    ey=l.lng()+(o*Math.cos(c));
    ex=l.lat()+(n*Math.sin(c));
    j.push(new google.maps.LatLng(ex,ey));
    bounds.extend(j[j.length-1])}
  return j
}
</script>
<!---->
<script>
var map=null;
var pointArray_10=null;
var pointArray_11=null;
var pointArray_12=null;
var pointArray_13=null;
var pointArray_14=null;
var heatmap=null;
var data_10=true;
var data_11=false;
var bounds=null;
var selector_circle;
function initialize(){
  var a={
    zoom:7,
    center:new google.maps.LatLng(53.4427,-4.5),
    mapTypeId:google.maps.MapTypeId.TERRAIN
  };
  map=new google.maps.Map(document.getElementById("map_canvas"),a);

    var circleOptions = {
      strokeColor: '#555555',
      strokeOpacity: 0.75,
      strokeWeight: 1.5,
      fillColor: '#555555',
      fillOpacity: 0.25,
      map: map,
      draggable: true,
      editable: true,
      center: new google.maps.LatLng(53.09024, -6.712891),
      radius: 25000
    };
    /*
    pointArray_10=new google.maps.MVCArray(heat_map_10);
    pointArray_11=new google.maps.MVCArray(heat_map_11);
    pointArray_12=new google.maps.MVCArray(heat_map_12);
    pointArray_13=new google.maps.MVCArray(heat_map_13);
    heatmap=new google.maps.visualization.HeatmapLayer({
      data:pointArray_10});
    heatmap.setMap(map);
    */
      // Add the circle for this city to the map.
    selector_circle = new google.maps.Circle(circleOptions);
    //We hide the circle until the user selects to view the detailed map section
    remove_circle();
}
/*
function changeGradient(){
  var a=["rgba(0, 255, 255, 0)",
          "rgba(0, 255, 255, 1)",
          "rgba(0, 191, 255, 1)",
          "rgba(0, 127, 255, 1)",
          "rgba(0, 63, 255, 1)",
          "rgba(0, 0, 255, 1)",
          "rgba(0, 0, 223, 1)",
          "rgba(0, 0, 191, 1)",
          "rgba(0, 0, 159, 1)",
          "rgba(0, 0, 127, 1)",
          "rgba(63, 0, 91, 1)",
          "rgba(127, 0, 63, 1)",
          "rgba(191, 0, 31, 1)",
          "rgba(255, 0, 0, 1)"];
  heatmap.set("gradient",heatmap.get("gradient")?null:a)}
function changeRadius(){
  heatmap.set("radius",heatmap.get("radius")?15:30)}
function changeOpacity(){heatmap.set("opacity",heatmap.get("opacity")?null:0.2)}
*/
google.maps.event.addDomListener(window,"load",initialize);
</script>
<script>
/*
function toggle_10(){
  heatmap.setData(pointArray_10);
}
function toggle_11(){
  heatmap.setData(pointArray_11);
}
function toggle_12(){
  heatmap.setData(pointArray_12);
}
function toggle_13(){
  heatmap.setData(pointArray_13);
}
*/
function toggle_Overview(){
  /*if(heatmap.getMap()==null){
    heatmap.setMap(map);
  }*/
  remove_circle();
}
function toggle_Detail(){
  /*if(heatmap.getMap()==map){
    heatmap.setMap(null);
  }*/
  add_circle();
}
//Adds circle to the map
function add_circle(){
  if(selector_circle.getMap()==null){
    selector_circle.setMap(map);
  }
}
//Remove circle from the map
function remove_circle(){
  if(selector_circle.getMap()==map){
    selector_circle.setMap(null);
  }
}
</script>
<!---->
<script>
  $(document).ready(function(){
    $(".part1").click(function(){
      $("#btn1click").show();
      $("#btn2click").hide()});
    $(".part2").click(function(){
      $("#btn1click").hide();
      $("#btn2click").show()});
    $(".part3").click(function(){
      $("#btn1click").hide();
      $("#btn2click").hide();
      $("#btn3click").show()});
  });
</script>
<!--Script for changing the towns drop-downs-->
<script>
  function towns_ddls(str) {
    if(towns_bool==true){
      if (str=="") {
          document.getElementById("drop_down_towns").innerHTML="";
          return;
        } 
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("drop_down_towns").innerHTML=xmlhttp.responseText;
          }
        }
        str1=document.getElementById("dd1_c").value;
        str2=document.getElementById("dd2_c").value;
        xmlhttp.open("GET","ajax/town_ddl_echo_test.php?c1="+str1+"&c2="+str2,true);
        xmlhttp.send();
      }
    else if(towns_bool==false){
        county_avg_chart();
      }
    }
</script>
<!--Script to show selected for Detailed Section-->
 <script>
    $(function() {
      $("#price_slider").slider({
        range: true,
        min: 50000,
        max: 1000000,
        values: [350000, 700000 ],
        slide: function( event, ui ) {
          $( "#amount" ).val( "€" + ui.values[0 ] + " - €" + ui.values[1 ] );
          current_min_price: ui.values[0 ];
          current_max_price: ui.values[1 ]; 
        }
      });
      $( "#amount" ).val( "€" + $( "#price_slider" ).slider( "values", 0) +
        " - €" + $( "#price_slider" ).slider( "values", 1) );
    });
    $(function() {
      $("#timeframe_slider").slider({
        range: true,
        min: 2010,
        max: 2015,
        values: [2012, 2013 ],
        slide: function( event, ui ) {
          $( "#timerange" ).val( "" + ui.values[0 ] + " - " + ui.values[1 ] );
          current_min_year: ui.values[0 ];
          current_max_year: ui.values[1 ]; 
        }
      });
      $( "#timerange" ).val( "" + $( "#timeframe_slider" ).slider( "values", 0 ) +
        " - " + $( "#timeframe_slider" ).slider( "values", 1 ) );
    });
</script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="S. Brennan-Kelly">
<meta name="robots" content="all">
</head>
<body>
	<div id="wrapper">
		<div id="map_canvas"></div>
		<div id="over_map">
			<div id="buttons">
				<input id="bigbutton" class="part1" readonly="readonly" onclick="toggle_Overview()"value="Overview"/>
				<input id="bigbutton" class="part2" readonly="readonly" onclick="toggle_Detail()"value="Detailed Maps"/>
			</div>
			<div id="btn1click">
			<div id="panel">
				<button onclick="toggle_10()">2010</button>
				<button onclick="toggle_11()">2011</button>
				<button onclick="toggle_12()">2012</button>
				<button onclick="toggle_13()">2013</button>
			</div>
			<div id="drop_downs_div">
        <!--
			<input id="tc_buttons" class="c_btn" readonly="readonly" value="Counties"/>
			<input id="tc_buttons" class="t_btn" readonly="readonly" value="Towns" onclick="towns_ddls(this.value)"/>
			-->
      <div id="drop_downs_county">
				<!--<select id="dd1_c" onchange="towns_ddls()">-->
        <form>
        <select id="dd1_c" onchange="towns_ddls(this.value)">
					<option value="Carlow">Carlow</option>
					<option value="Cavan">Cavan</option>
					<option value="Clare">Clare</option>
					<option value="Cork">Cork</option>
					<option value="Donegal">Donegal</option>
					<option value="Dublin">Dublin</option>
					<option value="Galway">Galway</option>
					<option value="Kerry">Kerry</option>
					<option value="Kildare">Kildare</option>
					<option value="Kilkenny">Kilkenny</option>
					<option value="Laois">Laois</option>
					<option value="Leitrim">Leitrim</option>
					<option value="Limerick">Limerick</option>
					<option value="Longford">Longford</option>
					<option value="Louth">Louth</option>
					<option value="Mayo">Mayo</option>
					<option value="Meath">Meath</option>
					<option value="Monaghan">Monaghan</option>
					<option value="Offaly">Offaly</option>
					<option value="Roscommon">Roscommon</option>
					<option value="Sligo">Sligo</option>
					<option value="Tipperary">Tipperary</option>
					<option value="Waterford">Waterford</option>
					<option value="Westmeath">Westmeath</option>
					<option value="Wexford">Wexford</option>
					<option value="Wicklow">Wicklow</option>
				</select>
			</br>
        <!--<select id="dd2_c" onchange="towns_ddls()">-->
				<select id="dd2_c" onchange="towns_ddls(this.value)">
					<option value="Carlow">Carlow</option>
					<option value="Cavan">Cavan</option>
					<option value="Clare">Clare</option>
					<option value="Cork">Cork</option>
					<option value="Donegal">Donegal</option>
					<option value="Dublin">Dublin</option>
					<option value="Galway">Galway</option>
					<option value="Kerry">Kerry</option>
					<option value="Kildare">Kildare</option>
					<option value="Kilkenny">Kilkenny</option>
					<option value="Laois">Laois</option>
					<option value="Leitrim">Leitrim</option>
					<option value="Limerick">Limerick</option>
					<option value="Longford">Longford</option>
					<option value="Louth">Louth</option>
					<option value="Mayo">Mayo</option>
					<option value="Meath">Meath</option>
					<option value="Monaghan">Monaghan</option>
					<option value="Offaly">Offaly</option>
					<option value="Roscommon">Roscommon</option>
					<option value="Sligo">Sligo</option>
					<option value="Tipperary">Tipperary</option>
					<option value="Waterford">Waterford</option>
					<option value="Westmeath">Westmeath</option>
					<option value="Wexford">Wexford</option>
					<option value="Wicklow">Wicklow</option>
				</select>
      </form>
			<!--<input type=button onclick="county_avg_chart()" id="compare_button_county" value="Compare">-->
			</div>
  <br>
  <div id="drop_down_towns"><b>  </b></div>
			<div id="info_txt_1_tab_1">
				<p>To compare two counties against the National Averages, select them from the drop-downs and hit "Compare".
				</p>
			</div>
	</div>
			<div id="chart_div">
			</div>
			<div id="info_txt_2_tab_1">
				<p style="margin-left:1%;">The map on the left shows where was most -> least expensive (red->green) to buy a house in each year. Click the buttons at the top to change years.</p>
			</div>
			</div>
      <div id="btn2click" style="display:none">
      <div id="in_tab">
        <p>Test for div 2</p>
        <p>
          Select an area on the map to see the average prices of a house in that area.
        </p>
        <p>Will display a map with a “selector”, allowing the users 
          to select an area to zoom in on and calculate on. On the map 
          pin-drops for the properties in the selected-area displaying 
          information on the property will be displayed on the map. In 
          the data-box, I will display the average/calculated-statistic 
          for the selected area. I will also allow the user to show/hide 
          pin-drops on the map based on timeline and cost using sliders.</p>
      <div>
        <p> The average/calculated-statistic for the selected area will be displayed here. Default will be national figure, then update dynamically as user selected area.</p>
        <p id="calc_stat_tab2">Average/Stat for Selected Area: €XXX,XXX.XX</p>
        <p id="calc_stat_tab2_info">*Defaults to National figure before selecting area.</p>
      </div>
      <div id="sliders">
      <P><label for="amount">Price: </label></P>
      <input type="text" id="amount" readonly="readonly" style="border:0;color:#666;font-weight:bold">
      <div id="price_slider"></div>
      <p>
        Use the slider show the houses in your price-range.
      </p>
      <P><label for="timerange">Timeframe: </label></P>
      <input type="text" id="timerange" readonly="readonly" style="border:0;color:#666;font-weight:bold">
      <div id="timeframe_slider"></div>
      <p>
        Use the slider show the houses sold in a timeframe.
      </p>
      </div>
      </div>
      </div>
      <div id="btn3click" style="display:none">
      <div id="in_tab">
        <p>Test for div 3</p>
        <p>Function will be implemented if 1 and 2 are implemented successfully first</p>
      </div>
		</div>
	</div>
</body>