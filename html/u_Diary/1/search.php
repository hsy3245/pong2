<html>
	<head>
		<meta charset="utf-8"/>
		<title>Pong</title>
		<style>
			body.dark {
				font-family: sans-serif;
				background-image: linear-gradient(0, #4A4A4A, #2B2B2B);
				color: white;
			}
			div.title {
				margin-top: 50px;
				margin-bottom: 45px;
				text-align: center;
			}
			div.line {
				margin-top: 10px;
				border-bottom: 1px solid gray;
			}
			nav {
				margin-right: 10px;
				font-size: 15px;
				text-align: left;
				line-height: 150%;
				border: 1px solid gray;
				float: left;
				width: 19%;
				height: 100%;
			}
			a {
				color: white;
				text-decoration: none;
			}
			table {
				border: 1px solid gray;
				padding: 5px;
				margin: 70px;
				table-layout: fixed;
				width: 600px;
			}
			tr.line2{
				background-color: #2B2B2B;
			}
			td {
				overflow-x: hidden;
				padding: 4px;
			}
			div.search2 {
				padding: 5px;
			}
			button.button2{
				border: 0px;
				background-color: transparent;
			}
			li.li {
                                padding-top: 3px;
                        }
		</style>
		</head>
		<body class="dark" id="a">
			<h1>
			<div class="title">
				<a href="file:///C:/Users/pong/Desktop/Aptana/pongPHP/pongPHP.html">
				Pong
				</a>
			</div>
			<div class="line">
			</div></h1>
			<nav>
				<ol>
					<li class="li">
                                        <a href="http://www.pong.or.kr/01"> Profile </a>
                                </li>
                                <li class="li">
                                        <a href="http://www.pong.or.kr/02"> Academic Background </a>
                                </li>
                                <li class="li">
                                        <a href="http://www.pong.or.kr/03">Career</a>
                                </li>
                                <li class="li">
                                        <a href="http://www.pong.or.kr/04">Technique &amp; Expertise</a>
                                </li>
                                <li class="li">
                                        <a href="http://www.pong.or.kr/05">Interests</a>
                                </li>
                        </ol>
                        <ul>
                                <li>
                                        <a href="http://www.pong.or.kr/u_Certification">Certification</a>
                                </li>
                                <li>
                                        <a href="http://www.pong.or.kr/u_Lecture">Lecture</a>
                                </li>
                                <li>
                                        <a href="http://www.pong.or.kr/u_Volunteer">Volunteer &amp; Social Activities</a>
                                </li>
                                <li>
                                        <a href="http://www.pong.or.kr/u_Project">Project &amp; Award</a>
                                </li>
                                <li>
                                        <a href="http://www.pong.or.kr/u_Diary"> Diary </a>
                                </li>
				<li>Visitor's Book (<span style="font-style:italic;">Later..</span>)</li>
			</ul>
		</nav>
		<article>
			<h2>Diary</h2>
			<div align="center" style="height:400; overflow-y:hidden;">
				<table class="table">
					<colgroup>
						<col width="25px"/>
						<col width="340px"/>
						<col width="60px"/>
						<col width="175px"/>						
					</colgroup>
					<tr class="line2">
						<td>#</td>
						<td align="center">Title</td>
						<td align="center">Name</td>
						<td align="center">Date</td>
					</tr>
        <?php
        mysql_connect('localhost','root','qwe123!!##'); 
        mysql_select_db('pongDB');

	$page = isset($_GET['page']) && $_GET['page'] && is_numeric($_GET['page'])?$_GET['page']:1;
        $scale = 10;
	$search = $_GET["search"];
	if(empty($search)){
		$sql = "select * from diary order by id desc";
	}
	else{
		$sql = "select * from diary where title like '%$search%' order by id desc";
	}
        $result = mysql_query($sql);
        $total = mysql_affected_rows();
        if($total % $scale == 0){
                $page_cnt = floor($total/$scale);
        }else{
                $page_cnt = floor($total/$scale)+1;
        }
        $start = ($page-1)*$scale;
        for($i=$start; $i<$start+$scale && $i<$total; $i++){
                mysql_data_seek($result, $i);
                $row = mysql_fetch_array($result);
                echo '<tr><td>'.$row['id'].'</td><td>'.$row['title'].'</td><td align="center">'.$row['name'].
'</td><td align="center">'.$row['date'].'</td></tr>';
        }
?>
				</table>
			</div>
			<div align="center" "page">
			<?php
                                for($j=1; $j<=$page_cnt; $j++){
                                        if($page == $j){
                                                echo "<b>$j </b>";
                                        }else{
                                                echo "<a href=?select=s_title&search=$search&page=$j>$j </a>";
                                        }
                                }
                        ?>
 			</div><div align="center" class="search2">
                                <form action="search.php" method="get">
                                        <select name="select">
                                                <option value="s_title">Title</option>
                                        </select>
                                        <input type="text" name="search" size="60px"/>
                                        <button class="button2" value="button" type="submit">
                                                <input type="image" src="http://www.google.com/uds/css/v2/search_box_icon.png" width="18px" height="18px">
                                        </button> 
                                <input type="button" style="font-size:15px;" value=" Write "/>
                                </form>
                        </div>
		</article>
	</body>
</html>
