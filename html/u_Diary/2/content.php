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
			tr.line2 {
				background-color: #2B2B2B;
			}
			td {
				overflow-x: hidden;
				padding: 4px;
			}
			div.search {
				padding: 5px;
			}
			button.button2 {
				border: 0px;
				background-color: transparent;
			}
			li.li {
                                padding-top: 3px;
                        }
			.content01{
				background-image: linear-gradient(0, #1D77EF, #81F3FD);
			}
			.content02{
				background-image: linear-gradient(0, #2B2B2B, #4A4A4A);
			}
		</style>
	</head>
	<body class="dark" id="a">
	<?php
	mysql_connect('localhost','root','qwe123!!##');
        mysql_select_db('pongDB');
	$id = $_GET["id"];	
	$sql = "select content, title from diary d, value v where d.id=v.id and d.id='$id'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$sub = $row['title'];
	$content = $row['content'];
	?>	
		<h1>
		<div class="title">
			<a href="http://www.pong.or.kr"> Pong </a>
		</div><div class="line"></div></h1>
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
					Visitor's Book (<span style="font-style:italic;">Later..</span>)
				</li>
			</ul>
		</nav>
		<article>
			<h2>Diary</h2>
			<div align="center" style="height:400; overflow-y:hidden;">
				<table align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td class="content01" height="4" colspan="2">
						</td>
					</tr>
					<tr>
						<td class="content02" height="25" colspan="2">
						<p align="left" style="line-height: 17pt;">
						<span style="font-size: 11pt;"> Title :
						<?php echo "&nbsp$sub";
						?>
						</span>
						</p></td>
					</tr>
					<tr>
						<td class="content01" height="4" colspan="2"></td>
					</tr>
					<tr valign="top">
						<td height="230" valign="top" colspan="2" style="padding-top: 10;">
						<span style="font-size: 9pt;">
						<?php echo "$content";
						?>
						</span></td>
					</tr>
					<tr>
						<td class="content01" height="4" colspan="2"></td>
					</tr>
					<tr valign="top">
						<td class="content02" height="30" valign="middle" bordercolor="white" colspan="2" align="center">
						<p><span style="font-size: 9pt;"> &nbsp;</span>
							<a href="..">
							<input type="submit" name="formbutton1" value="Index" style="font-size: 9pt">
							</a>
						</p></td>
					</tr>
				</table>
			</div>
		</article>
	</body>
</html>
