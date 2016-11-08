<?php
$conn = @mysql_connect ( "localhost", "root", "123" );
mysql_select_db ( "test", $conn );
?>
<!-- 
향상된 게시판을 만들어보자
기본기능
1. 글목록 보기 / list.php
2. 글내용 보기 / read.php
3. 글입력 / write.php,	insert.php
4. 글수정 / edit.php,	update.php
5. 글삭제 / del.php,	predel.php

그외 : db_info.php
 -->
 
 <!-- 테이블 준비
 create table board (
 id int(11) unsigned not null auto_increment,
 name varchar(20) not null,
 email varchar(30) null,
 pass varchar(12) not null,
 title varchar(70) not null,
 content text not null,
 wdate datetime not null,
 ip varchar(15) not null,
 view int(11) not null default 0,
 primary key (id)
 );
  -->
  