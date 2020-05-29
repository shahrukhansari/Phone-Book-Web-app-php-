create database addressBook;
use addressBook;

CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` text,
  `contact_no1` varchar(255) NOT NULL,
  `contact_no2` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

INSERT INTO `tbl_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `address`, `contact_no1`, `contact_no2`, `email_address`, `profile_pic`) VALUES
(13, 'Rafael ', '', 'Nadal', '', '8567825855', '', 'nadal@gmail.in', 'raf.jpg'),
(14, 'Shahrukh ', '', 'Khan', '', '8965742658', 'Bollywood', 'kingKhan@hotmail.com', 'shah.jpg'),
(15, 'Shivaji', 'Rao', 'Rajnikanth', '', '6854789658', '', 'rajnikanth@taliva.in', 'raj.jpg'),
(11, 'Amir', '', 'Khan', 'Mumbai', '9865752654', '', 'amir@gmail.com', 'amir.jpg'),
(12, 'Lionel', '', 'Messi', '', '9856325745', '', 'messi@gmail.com', 'messi.jpg'),
(16, 'Amitabh', '', 'Bachchan', '', '9528425687', '', 'amitabh@gmail.com', 'Amit.jpg'),
(17, 'Arnold', '', 'Schwarzenegger', '', '6854925486', '', 'arnold@gmail.com', 'arnold.jpg'),
(18, 'Gareth', 'Frank', 'Bale', '', '7893691204', '', 'bale@madridfc.com', '1398010649_bale.jpg'),
(19, 'Cristiano', '', 'Ronaldo', 'Manchester', '7854962548', '', 'ronaldocr7@gmail.com', 'ronaldo.jpg'),
(20, 'David', '', 'Beckham', '', '8563259875', '', 'beckham@gmail.com', 'beckham.jpg'),
(21, 'Roger', '', 'Federer', '', '4455669988', '', 'roger@federer.com', '1398011285_Federer-cincy-100x100.jpg'),
(22, 'Eldrick Tont', 'Tiger', 'Woods', 'tetdasd'' /dasdasd asdaskdj as', '7733115522', '', 'tiger@woods.com', '1398011427_fp__tiger-woods-shh.jpg'),
(23, 'Rahul', '', 'Dravid', '', '5588446699', '', 'rahul@india.com', '1398011525_image.jpg'),
(24, 'Jessica', 'Marie', 'Alba', '', '7418529603', '', 'jessica@alba.com', '1398011590_jessica_alba_photo.jpg'),
(25, 'William Henry', 'Bill', 'Gates', '', '4488997700', '', 'gates@microsoft.com', '1398011667_list-of-bill-gates-interviews.jpg'),
(26, 'Sachin', 'Ramesh', 'Tendulkar', '', '4658632102', '', 'sachin@india.com', '1398011707_main-thumb-t-9860-100-Gi5OwtApwPMJd1keZSAvlDhnUqGstrPm.jpeg'),
(27, 'Shahid', '', 'Afridi', '', '1388651400', '', 'boomboom@afridi.com', '1398011790_main-thumb-t-278364-100-Mfi8KGMof5QfphmrzSvGQLpmPKFEoDQ0.jpeg'),
(28, 'Vin', '', 'Diesel', '', '7418524560', '', 'vin@diesel.com', '1398011842_NEf8wL5JppkMik_1_zzb.jpg'),
(29, 'Jason', '', 'Statham', '', '4751236502', '', 'jason@hollywood.com', '1398011894_NExpXFk2QjRUBB_1_zzb.jpg'),
(30, 'Daniel', '', 'radcliffe', '', '4848481250', '', 'harrypotter@hogwards.com', 'daniel.jpg'),
(31, 'Dwayne', 'Douglas', 'Johnson', '', '9875632589', '', 'dwane@hotmail.com', 'rock.jpg'),
(32, 'Zinedine', 'Yazid', 'Zidane', '', '7777777707', '', 'zidane@zizou.com', '1398012060_photo.jpg'),
(33, 'Robert', 'John', 'Downey Jr', '', '7413215920', '', 'robert@hollywood.com', 'robert.png'),
(35, 'Salman', '', 'Khan', '', '8595754862', '', 'bhai@bollywood.com', 'salman.jpg'),
(36, 'Yami', '', 'Gautam', '', '7465321245', '', 'yummy@yami.com', '1398012259_yami-gautam-practices-qidance-in-bangkok.jpg'),
(37, 'Sylvester', 'Gardenzio', 'Stallone', '', '4499775566', '', 'stallone@rocky.com', '1398012379_Sylvester_Stallone2010.jpg'),
(38, 'Adam', '', 'Levine', '', '6527258454', 'calafornia', 'maroon5.co.in', 'adam.jpg'),
(39, 'Brad', '', 'Pitt', '', '6582687459', 'calafornia', 'brad@yahoo.com', 'brad.jpg');
