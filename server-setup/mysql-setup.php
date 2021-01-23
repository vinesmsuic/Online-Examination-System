<?php
$server = "localhost";
$user = "root";
if (!empty($_POST['rootPW']))
	$pw = $_POST['rootPW'];
elseif ($_POST['server'] =="mamp")
	$pw = "root";
else 
	$pw = ""; // by default xammp root user has no password

$db = "examsystem";

$connect=mysqli_connect($server, $user, $pw, $db);

if(!$connect) {
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$createAccount="GRANT ALL PRIVILEGES ON examsystem.* TO 'systemadmin'@'localhost' IDENTIFIED BY 'university' WITH GRANT OPTION";

// need this at start of the create table scripts? SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

$dropTable1 = "DROP TABLE IF EXISTS users";

$createTable1 = "CREATE TABLE users (
  ID varchar(64) NOT NULL,
  userType varchar(64) NOT NULL,
  PW varchar(255),
  nickName varchar(64),
  email varchar(64),
  profileImage varchar(255),
  course varchar(64),
  gender varchar(1),
  birthday date,
  sQType int,
  sQAnswer varchar(64),
  PRIMARY KEY (ID),
  UNIQUE KEY ID (ID)
 )";
$adminpassword = password_hash('admin4432', PASSWORD_DEFAULT);
$addRecords1 ="REPLACE INTO users (ID, userType, PW, nickName, email, profileImage, course, gender, birthday, sQType, sQAnswer) VALUES
('admin', 'admin', '$adminpassword', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL);";

$dropTable2 = "DROP TABLE IF EXISTS exams";

$createTable2 = "CREATE TABLE exams (
	course varchar(64) NOT NULL,
	examNum INT NOT NULL,
	examDate varchar(64) NOT NULL,
	startTime varchar(64) NOT NULL,
	expireTime varchar(64) NOT NULL,
	creator varchar(64) NOT NULL,
	graded INT(1) DEFAULT 0 NOT NULL,
	remarks varchar(64),
	maxScore double(10,2),
	minScore double(10,2),
	median double(10,2),
	average double(10,2),
	PRIMARY KEY (course, examNum)
   )";

$dropTable3 = "DROP TABLE IF EXISTS exam_questions";

$createTable3 = "CREATE TABLE exam_questions 
(course varchar(64) NOT NULL, 
examNum INT NOT NULL, 
QID INT NOT NULL, 
QType INT NOT NULL, 
score INT NOT NULL, 
question varchar(512) NOT NULL, 
answer INT, 
mc1 varchar(64), mc2 varchar(64), mc3 varchar(64), mc4 varchar(64), 
percent DOUBLE(5,2), average DOUBLE(5,2), 
PRIMARY KEY (course, examNum, QID))";

$dropTable4 = "DROP TABLE IF EXISTS exam_answers";

$createTable4 = "CREATE TABLE exam_answers
(course varchar(64) NOT NULL, 
examNum INT NOT NULL, 
studentID varchar(64) NOT NULL,
QID INT NOT NULL, 
answer varchar(512), 
score DOUBLE(10,2),
submitTime varchar(64),
PRIMARY KEY (course, examNum, studentID, QID))";

$result = mysqli_query($connect, $createAccount);

if (!$result) 
{
	die("Could not successfully run query ($createAccount) from $db: " .	
		mysqli_error($connect) );
}
else{
	$result = mysqli_query($connect, $dropTable1);
	if (!$result){
		die("Could not successfully run query ($dropTable1) from $db: " . mysqli_error($connect) );
	}else  {
		$result = mysqli_query($connect, $createTable1);
		if (!$result) {
			die("Could not successfully run query ($createTable1) from $db: " .mysqli_error($connect) );
		}
		else{
			$result = mysqli_query($connect, $addRecords1);
		
			if (!$result) {
				die("Could not successfully run query ($addRecords1) from $db: " .mysqli_error($connect) );
			}else {
				$result = mysqli_query($connect, $dropTable2);
				if (!$result) {
					die("Could not successfully run query ($dropTable2) from $db: " .mysqli_error($connect) );
				}else {
					$result = mysqli_query($connect, $createTable2);
					if (!$result) {
						die("Could not successfully run query ($createTable2) from $db: " .mysqli_error($connect) );
					}else {
						/*$result = mysqli_query($connect, $addRecords2);
						if (!$result) {
							die("Could not successfully run query ($addRecords2) from $db: " .mysqli_error($connect) );
						}else {*/
							$result = mysqli_query($connect, $dropTable3);
							if (!$result) {
								die("Could not successfully run query ($dropTable3) from $db: " .mysqli_error($connect) );
							}else {
								$result = mysqli_query($connect, $createTable3);
								if (!$result) {
									die("Could not successfully run query ($createTable3) from $db: " .mysqli_error($connect) );
								}else {
									/*$result = mysqli_query($connect, $addRecords3);
									if (!$result) {
										die("Could not successfully run query ($addRecords3) from $db: " .mysqli_error($connect) );
									}else {*/
									$result = mysqli_query($connect, $dropTable4);
									if (!$result) {
										die("Could not successfully run query ($dropTable4) from $db: " .mysqli_error($connect) );
									}else {
										$result = mysqli_query($connect, $createTable4);
										if (!$result) {
											die("Could not successfully run query ($createTable4) from $db: " .mysqli_error($connect) );
										}else {
											/*$result = mysqli_query($connect, $addRecords4);
											if (!$result) {
												die("Could not successfully run query ($addRecords4) from $db: " .mysqli_error($connect) );
											}else {*/
										print("<html><head><title>MySQL Setup</title></head>
										<body><h1>MySQL Setup: SUCCESS!</h1><p>Created MySQL user <strong>systemadmin</strong> with 
										password <strong>university</strong>, with all privileges on the 
										<strong>examsystem</strong> database.</p><p>Created tables <strong>users</strong>,
										<strong>exams</strong>, <strong>exam_questions</strong>
										and <strong>exam_answers</strong> in the 
										<strong>examsystem</strong> database.</p>
										</body></html>");
									} } } } } 
								}
/*							}
						}
					}
				}*/
			}
		}
	}
}

mysqli_close($connect);   // close the connection
 
?>

