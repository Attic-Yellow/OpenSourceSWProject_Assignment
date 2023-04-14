<?php
// 데이터베이스 연결
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "member_signup";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 폼 데이터 수집 및 쿼리 작성
$username = $_POST['userID'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE userID='$username' AND password='$password'";

// 쿼리 실행 및 결과 처리
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // 로그인 성공
  echo "로그인에 성공하였습니다.";
} else {
  // 로그인 실패
  echo "로그인에 실패하였습니다. ID 또는 비밀번호가 틀렸습니다. <a href='login.html'>로그인 다시 하기</a>";
}

// 데이터베이스 연결 종료
$conn->close();
?>