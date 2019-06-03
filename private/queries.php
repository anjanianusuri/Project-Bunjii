CREATE TABLE users(
signupid int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
name TINYTEXT NOT NULL,
email TINYTEXT NOT NULL,
password LONGTEXT NOT NULL,
type TINYTEXT NOT NULL);

CREATE TABLE venue(
venue_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
signupid int(11) REFERENCES user(signupid),
venue_name TINYTEXT,
venue_desc LONGTEXT,
venue_phone int(12),
venue_type TINYTEXT);

CREATE TABLE customer(
customer_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
signupid int(11) REFERENCES users(signupid),
customer_name TINYTEXT REFERENCES users(name),
customer_age int(2),
customer_gender TINYTEXT,
customer_phone int(11),
customer_address LONGTEXT,
customer_email TINYTEXT,
customer_interests LONGTEXT,
customer_desc LONGTEXT
);

CREATE TABLE courts(
venue_id int(11) REFERENCES venue(venue_id),
court_id int(11) PRIMARY KEY,
court_name TINYTEXT
);

CREATE TABLE timings(
court_id int(11) REFERENCES court(court_id),
timing_id int(11) PRIMARY KEY,
time_range TIME
);

CREATE TABLE coaches(
venue_id int(11) REFERENCES venue(venue_id),
coach_id int(11) PRIMARY KEY,
coach_name TINYTEXT,
coach_desc LONGTEXT
);

INSERT INTO `venue`(`venue_id`, `signupid`, `venue_name`, `venue_desc`, `venue_phone`, `venue_type`) VALUES (1,1,'UQ Rugby','The UQ Rugby Football Club (UQRFC) is widely regarded as one of Australia’s premier rugby union clubs. Since its foundation in 1911, UQRFC has produced 60 Wallabies players (eight as captain) and over 200 Queensland representatives. This decorated club – Brisbane’s most successful – provides playing pathways for male and female of all standards. If you’re a lover of ‘The Greatest Game of All’, check out the UQ Rugby League Club! Known as the Hounds, the club fields a successful men’s team in the University Rugby League Queensland competition. There’s also the option to join the UQ Touch Football Club, with the club competing in an array of junior and senior competitions across Brisbane!',0435661027, 'football');
INSERT INTO `venue`(`venue_id`, `signupid`, `venue_name`, `venue_desc`, `venue_phone`, `venue_type`) VALUES (2,2,'Scorpion Tennis','Scorpion Tennis of Queensland is Australia’s leading builder and supplier of tennis courts as well as a full range of leisure and sports surfaces including netball and basketball courts, aged care sporting facilities, bowling greens, mini courts, cricket pitches, pickle ball courts and an extensive range of surfaces for driveways, airstrips, wharves and industrial spaces. Whatever your sporting or commercial surfaces’ needs, we can offer the best advice on which surface to choose and the most efficient method of installation. As tennis players and professionals, we offer superior advice in terms of where to position your court in relation to the rest of your property, ensuring a seamless playing experience and a good looking solution for your home and lifestyle. You can try our tennis court surfaces at our Carseldine headquarters where we also offer a full range of coaching services.',415796265, 'tennis');
INSERT INTO `venue`(`venue_id`, `signupid`, `venue_name`, `venue_desc`, `venue_phone`, `venue_type`) VALUES (3,3,'The Gabba','The Gabba is an icon of the Brisbane landscape and is the home ground for the Brisbane Lions, Brisbane Heat and Queensland Bulls. It is regarded as an impenetrable fortress for the Australian cricket team, with one of the best cricket wickets in the world. First established in 1895, the Gabba has hosted many major events including cricket, AFL, baseball, rugby league, rugby union, Olympic soccer and most recently two sell-out Adele concerts. The venue has 42,000 capacity and a range of function and meeting spaces that are used extensively throughout the year. The stadium boasts unrestricted views of the oval playing surface from all areas making it ideal to host international sporting and entertainment events. The Gabba is one of nine major sporting and entertainment facilities owned and operated by Stadiums Queensland.', 0414529654, 'cricket');
INSERT INTO `venue`(`venue_id`, `signupid`, `venue_name`, `venue_desc`, `venue_phone`, `venue_type`) VALUES (4,4,'Jordyn Sports','As experienced basketball court construction experts for over thirty years, the team at Jordin Sports are able to create highly functional outdoor basketball courts for your property. Whether you require a court for your school or sports centre, we are able to efficiently build a high-quality basketball court to suit your needs. In addition to handling the entire planning and construction process, we are also able to add the finishing touches such as any necessary outdoor lighting.',456284795, 'tennis');
INSERT INTO `venue`(`venue_id`, `signupid`, `venue_name`, `venue_desc`, `venue_phone`, `venue_type`) VALUES (5,5,'Logan Sports Center','Sky Badminton Centre was founded in February 2017 by champion coaches, Ricky Yu and Rosy Tang. They have dedicated their careers to badminton competition and coaching. Ricky and Rosy provide nine of the highest quality badminton courts in Brisbane – all of which meet international standards for international competition. The Sky Badminton Centre is available to the public for training, court hire and badminton promotions. Players of all ages are welcome to join Rick and Rosy for their badminton training programmes, or you can simply book a court for a badminton session.',411785236, 'badminton');
INSERT INTO `venue`(`venue_id`, `signupid`, `venue_name`, `venue_desc`, `venue_phone`, `venue_type`) VALUES (6,6,'Morning Side Tennis','The Morningside Tennis Centre is committed to providing professional programs and personalised service for the Brisbane tennis community. The organisation also aims to be a socially-responsible leader through its delivery of and participation in community events. We want to be the number one place to go for tennis in Brisbane and welcome players of all ages and playing standards whether it be for a social hit or for something more serious.',425678812, 'tennis');

INSERT INTO `courts`(`venue_id`, `court_id`, `court_name`) VALUES (1,1, 'Green Court');
INSERT INTO `courts`(`venue_id`, `court_id`, `court_name`) VALUES (1,2, 'Red Court');

INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,1,'9.00 - 10.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,2,'10.00 - 11.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,3,'12.00 - 1.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,4,'1.00 - 2.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,5,'2.00 - 3.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,6,'3.00 - 4.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,7,'4.00 - 5.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,8,'5.00 - 6.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,9,'6.00 - 7.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (1,10,'7.00 - 8.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,11,'9.00 - 10.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,12,'10.00 - 11.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,13,'12.00 - 1.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,14,'1.00 - 2.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,15,'2.00 - 3.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,16,'3.00 - 4.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,17,'4.00 - 5.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,18,'5.00 - 6.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,19,'6.00 - 7.00');
INSERT INTO `timings`(`court_id`, `timing_id`, `time_range`) VALUES (2,20,'7.00 - 8.00');

INSERT INTO `coaches`(`venue_id`, `coach_id`, `coach_name`, `coach_desc`) VALUES (1, 1, 'Frank Calabaria', 'Director of our Performance Program, an RSTA Business Director. Frank is a career coach and has been operating a professional tennis coaching business since 1998. He is a qualified Club Professional coach will Tennis Australia as well as an Mentor for the ANZ Tennis Hot Shots program at Tennis Australia. and also Coach Developer for Tennis Australia Franks passion and gifts lay in the love he has for the game of tennis and his desire to show share this with students of the game, both the young and young at heart. His passion for the game and the desire to make the tennis experience fun has seen Frank has twice been rewarded with State Coach of the Year honours and well as a nominee for Excellence in Hot Shots Coach of the Year at Tennis Australia’s Newcombe Medal annual awards in 2012 and also again in 2017 for coaching excellence in the club coach category.');
