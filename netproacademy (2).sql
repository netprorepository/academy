-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 04:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netproacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(56) NOT NULL DEFAULT 'active',
  `phone` varchar(16) NOT NULL,
  `last_active_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `lname`, `user_id`, `status`, `phone`, `last_active_date`) VALUES
(1, 'Aniegboka', 'Chukwudi', 1, 'active', '08122260140', '2019-03-04 15:15:42'),
(2, 'Olive', 'oguike', 19, 'deactivated', '686784463', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `surname` varchar(156) NOT NULL,
  `firstname` varchar(156) NOT NULL,
  `address` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `registeredon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `age` int(11) NOT NULL,
  `parent` varchar(256) NOT NULL,
  `parent_phone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `surname`, `firstname`, `address`, `user_id`, `phone`, `registeredon`, `age`, `parent`, `parent_phone`) VALUES
(1, 'Chukwudi', 'Aniegboka', 'No .8 Boms avenue Elekahia, Trans Amadi industrial layout', 2, '08122260140', '2018-11-27 13:52:28', 0, '', ''),
(2, 'EBUKA', 'OBI', 'NO. 7 SALOEZEAKAIBEYA CRESCENT, MMAKWUM OBOSI', 3, '080348269370', '2018-11-28 13:38:56', 0, '', ''),
(35, 'Ani', 'stev', 'NO. 7 SALOEZEAKAIBEYA CRESCENT, MMAKWUM OBOSI', 38, '09876534528', '2019-01-23 22:12:22', 0, '', ''),
(36, 'JAMES', 'AGBAKOBA', 'Abuja', 39, '08060407160', '2019-02-04 10:45:31', 0, '', ''),
(37, 'Azaiki', 'stev', 'No .8 Boms avenue Elekahia', 40, '+2348122260140', '2019-02-08 07:30:57', 0, '', ''),
(38, 'Azaiki', 'stev', 'No .8 Boms avenue Elekahia', 41, '+2348122260140', '2019-02-08 15:14:54', 0, '', ''),
(39, 'Nzewi', 'Uchechukwu', 'Abuja, Off Gado Nasco road', 44, '8060407160', '2019-02-22 07:54:10', 0, '', ''),
(41, 'Chukwudi', 'Aniegboka', 'No .8 Boms avenue Elekahia, Trans Amadi industrial layout', 46, '8122260140', '2019-03-08 13:43:06', 15, 'Aniegboka Chukwudi', '8122260140');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_courses`
--

CREATE TABLE `candidate_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(168) NOT NULL,
  `description` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Leadership Development', 'Building and Developing Productive Workforce, Essential Management Skills,Sustainable Entrepreneurship and Business Development, Proposal Writing etc'),
(2, 'Web/App Development', 'Certified Full stack web developer(Html,CSS,Graphics Design, Javascript, IQuery), Backend Developer (PHP,Database Design etc) '),
(3, 'Accounting/Management', 'Peach Tree Accounting, Sage Accounting, Digital Marketing, Basic Financial Modeling and Forecasting etc'),
(4, 'Systems/Networking', 'CCNA, CCNP,Comptia, N/A+ etc'),
(5, 'Microsoft Office Productivity', 'MS word, Excel, PowerPoint Microsoft Office Outlook etc'),
(6, 'Project/Program/IT Service Management', 'IT Services Management, ITIL Foundation, Project Management Professional(PMP) etc'),
(7, 'Database Management', 'Oracle 12c, Advanced MS Excel,RDBMS etc');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(11) NOT NULL,
  `name` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `name`) VALUES
(1, 'Owerri'),
(2, 'Enugu'),
(3, 'Imo State Poly Owerri');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistrations`
--

CREATE TABLE `courseregistrations` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `registeredon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseregistrations`
--

INSERT INTO `courseregistrations` (`id`, `course_id`, `candidate_id`, `center_id`, `registeredon`) VALUES
(1, 2, 20, 3, '2018-12-20 10:47:23'),
(2, 4, 20, 1, '2018-12-20 10:50:48'),
(3, 34, 41, 1, '2019-03-08 13:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(156) NOT NULL,
  `description` text NOT NULL,
  `admin_id` int(11) NOT NULL,
  `start_date` varchar(32) NOT NULL,
  `end_date` varchar(32) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `viewcount` int(11) DEFAULT NULL,
  `duration` varchar(160) NOT NULL,
  `weekendclass` varchar(80) NOT NULL,
  `executiveclass` varchar(80) NOT NULL,
  `immersiveclass` varchar(80) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT 'live',
  `courseimage` varchar(156) DEFAULT NULL,
  `postdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `admin_id`, `start_date`, `end_date`, `cost`, `viewcount`, `duration`, `weekendclass`, `executiveclass`, `immersiveclass`, `category_id`, `status`, `courseimage`, `postdate`) VALUES
(1, 'Entrepreneurship And Business Development', '<p>The summary goes here</p>\r\n', 1, '12/12/2018', '12/12/2018', '45000', 6, '12 hours', '60000', '95000', '75000', 1, 'offline', NULL, '2019-03-05 14:08:21'),
(2, 'Sustainable Entrepreneurship', '<p>The Course summary should go in here</p>\r\n', 1, '12/12/2018', '12/12/2018', '50000', 1, '12 hours', '60000', '95000', '75000', 1, 'offline', NULL, '2019-03-05 14:08:21'),
(3, 'Essential Management Skills', 'A summary of the course goes here\r\n', 1, '2018-11-29', '2019-01-31', '75000', 58, '12 hours', '60000', '95000', '75000', 1, 'offline', NULL, '2019-03-05 14:08:21'),
(4, 'Building And Developing Productive Workforce', '<p>Goals/Objectives</p>\r\n\r\n<ul>\r\n	<li>Fully understand the architecture behind an Angular 7 application and how to use it.</li>\r\n	<li>Create single-page applications with on of the most modern JavaScript frameworks out there .</li>\r\n	<li>Use their gained, deep understanding of the Angular 7 fundamentals to quickly establish themselves as frontend developers Develop modern, complex, responsive and scalable web applications with Angular 7\r\n	<p>&nbsp;</p>\r\n\r\n	<p><strong>Course Content</strong></p>\r\n\r\n	<p>Course Contents goes here</p>\r\n\r\n	<p><strong>Requirements</strong></p>\r\n\r\n	<ul>\r\n		<li>NO Angular 1 or Angular 2 knowledge is required!</li>\r\n		<li>Basic HTML and CSS knowledge helps, but isn&#39;t a must-have</li>\r\n		<li>Prior TypeScript knowledge also helps but isn&#39;t necessary to benefit from this course</li>\r\n		<li>Basic JavaScript knowledge is required</li>\r\n	</ul>\r\n\r\n	<p>&nbsp;</p>\r\n\r\n	<p>Description</p>\r\n\r\n	<p><strong>This course starts from scratch, you neither need to know Angular 1 nor Angular 2!&nbsp;</strong>(Angular 7 simply is the latest version of Angular 2)</p>\r\n\r\n	<p><strong>Join the most comprehensive and popular Angular course on Udemy, because now is the time to get started!&nbsp;</strong></p>\r\n\r\n	<p>From&nbsp;<strong>Setup</strong>&nbsp;to&nbsp;<strong>Deployment</strong>, this course covers it all! You&#39;ll learn all about&nbsp;<strong>Components</strong>,&nbsp;<strong>Directives</strong>,&nbsp;<strong>Services</strong>,&nbsp;<strong>Forms</strong>,&nbsp;<strong>Http</strong>&nbsp;Access,&nbsp;<strong>Authentication, Optimizing an Angular&nbsp;App with Modules and Offline Compilation</strong>&nbsp;and&nbsp;<strong>much more&nbsp;</strong>- and in the end:&nbsp;You&#39;ll learn how to&nbsp;<strong>deploy</strong>&nbsp;<strong>an application</strong>!</p>\r\n\r\n	<p><strong>But that&#39;s not all!</strong>&nbsp;This course will also show you how to use the&nbsp;<strong>Angular&nbsp;CLI</strong>&nbsp;and feature a&nbsp;<strong>complete project</strong>, which allows you to practice the things learned throughout the course!</p>\r\n\r\n	<p>And if you do get stuck, you&nbsp;<strong>benefit from an extremely fast and friendly support</strong>&nbsp;- both via direct messaging or discussion. You have my word!&nbsp;;-)</p>\r\n\r\n	<p>Angular is one of the most modern, performance-efficient and powerful frontend frameworks you can learn as of today. It allows you to build great web apps which offer awesome user experiences!<strong>&nbsp;Learn all the fundamentals you need to know to get started developing Angular&nbsp;applications right away.</strong></p>\r\n\r\n	<p><strong>Hear what my students have to say</strong></p>\r\n\r\n	<p><em>Absolutely fantastic tutorial series. I cannot thank you enough. The quality is first class and your presentational skills are second to none. Keep up this excellent work. You really rock!? - Paul Whitehouse</em></p>\r\n\r\n	<p><em>The instructor, Max, is very enthusiastic and engaging. He does a great job of explaining what he&#39;s doing and why rather than having students just mimic his coding. Max was also very responsive to questions. I would recommend this course and any others that he offers. Thanks, Max!</em></p>\r\n\r\n	<p><em>As a person new to both JavaScript and Angular 2 I found this course extremely helpful because Max does a great job of explaining all the important concepts behind the code. Max has a great teaching ability to focus on what his audience needs to understand.</em></p>\r\n\r\n	<p><strong>This Course uses TypeScript</strong></p>\r\n\r\n	<p>TypeScript is the main language used by the official Angular&nbsp;team and the language you&#39;ll mostly see in Angular tutorials. It&#39;s a superset to JavaScript and makes writing Angular&nbsp;apps really easy. Using it ensures, that you will have the best possible preparation for creating Angular&nbsp;apps. Check out the free videos for more information.</p>\r\n\r\n	<p>TypeScript knowledge is, however, not required - basic JavaScript knowledge is enough.</p>\r\n\r\n	<p><strong>Why Angular?</strong></p>\r\n\r\n	<p>Angular&nbsp;is the next big deal. Being the successor of the overwhelmingly successful Angular.js framework it&rsquo;s bound to shape the future of frontend development in a similar way. The powerful features and capabilities of Angular&nbsp;allow you to create complex, customizable, modern, responsive and user friendly web applications.</p>\r\n\r\n	<p>Angular 7&nbsp;simply is the latest version of the Angular framework and simply an update to Angular 2.</p>\r\n\r\n	<p>Angular is faster than Angular 1 and offers a much more flexible and modular development approach. After taking this course you&rsquo;ll be able to fully take advantage of all those features and start developing awesome applications immediately.</p>\r\n\r\n	<p>Due to the drastic differences between Angular 1 and Angular&nbsp;(=Angular 7)&nbsp;you don&rsquo;t need to know anything about Angular.js to be able to benefit from this course and build your futures projects with Angular.</p>\r\n\r\n	<p><strong>Get a very deep understanding of how to create Angular&nbsp;applications</strong></p>\r\n\r\n	<p>This course will teach you all the fundamentals about modules, directives, components, databinding, routing, HTTP access and much more! We will take a lot of deep dives and each section is backed up with a real project. All examples showcase the features Angular&nbsp;offers and how to apply them correctly.</p>\r\n\r\n	<p>Specifically you will learn:</p>\r\n\r\n	<ul>\r\n		<li>\r\n		<ul>\r\n			<li>\r\n			<p>Which architecture Angular&nbsp;uses</p>\r\n			</li>\r\n			<li>\r\n			<p>How to use TypeScript to write Angular&nbsp;applications</p>\r\n			</li>\r\n			<li>\r\n			<p>All about directives and components, including the creation of custom directives/ components</p>\r\n			</li>\r\n			<li>\r\n			<p>How databinding works</p>\r\n			</li>\r\n			<li>\r\n			<p>All about routing and handling navigation</p>\r\n			</li>\r\n			<li>\r\n			<p>What Pipes are and how to use them</p>\r\n			</li>\r\n			<li>\r\n			<p>How to access the Web (e.g. RESTful servers)</p>\r\n			</li>\r\n			<li>\r\n			<p>What dependency injection is and how to use it</p>\r\n			</li>\r\n			<li>\r\n			<p>How to use Modules in Angular</p>\r\n			</li>\r\n			<li>\r\n			<p>How to optimize your (bigger) Angular&nbsp;Application</p>\r\n			</li>\r\n			<li>\r\n			<p>We will build a major project in this course</p>\r\n			</li>\r\n			<li>\r\n			<p>and much more!</p>\r\n			</li>\r\n		</ul>\r\n		</li>\r\n	</ul>\r\n\r\n	<p><strong>Pay once, benefit a lifetime!</strong></p>\r\n\r\n	<p>Don&rsquo;t lose any time, gain an edge and start developing now!</p>\r\n\r\n	<p>Who this course is for:</p>\r\n\r\n	<ul>\r\n		<li>Newcomer as well as experienced frontend developers interested in learning a modern JavaScript framework</li>\r\n		<li>This course is for everyone interested in learning a state-of-the-art frontend JavaScript framework</li>\r\n		<li>Taking this course will enable you to be amongst the first to gain a very solid understanding of Angular</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', 1, '2019-01-10', '2019-05-15', '55000', 9, '12 hours', '60000', '95000', '75000', 1, 'offline', NULL, '2019-03-05 14:08:21'),
(5, 'Developing Leadership Competencies', '<p>The course summary or content should go here</p>\r\n', 1, '', '', '', NULL, '12 hours', '60000', '95000', '75000', 1, 'offline', NULL, '2019-03-05 14:08:21'),
(6, 'Proposal Writing', '<p>The course summary shuold go here</p>\r\n', 1, '', '', '', NULL, '12 hours', '60000', '95000', '75000', 1, 'offline', NULL, '2019-03-05 14:08:21'),
(7, 'Certified Full Stack Web Development(Html,CSS,Graphics,Javascript, Database Design,PHP/Mysql/Ajax)', '<p>Our core curriculum is designed to take you from a beginner&nbsp;to an employable full-stack engineer.&nbsp; The course is broken down into the 3&nbsp;key sections shown below:</p>\r\n\r\n<ol>\r\n	<li><strong>Databases,</strong></li>\r\n	<li><strong>Back End</strong>,</li>\r\n	<li><strong>Front End </strong></li>\r\n</ol>\r\n\r\n<p>&nbsp;To be truly full-stack, we expect that you will be employable as either a front-end developer or a back-end developer and our course&nbsp;prepares you accordingly. This why our program covers more ground than any other.</p>\r\n\r\n<p><strong>1. Databases</strong></p>\r\n\r\n<p>Data is the core of every major web application and you have to be fluent in its modeling, storage and retrieval in order to be an eective engineer. During the Databases portion of the course, you will learn everything you need in order to break down a website into its core data model and then implement that model yourself.</p>\r\n\r\n<p><strong>Data Modeling:</strong></p>\r\n\r\n<ul>\r\n	<li>&nbsp;Data Relationships</li>\r\n	<li>Designing a Data Model</li>\r\n	<li>&nbsp;Relational Databases</li>\r\n	<li>Alternative Databases</li>\r\n	<li>&nbsp;Data Normalization</li>\r\n	<li>Entity Relationship Modeling (ERM) SQL</li>\r\n	<li>&nbsp;Working with Database Schemas</li>\r\n	<li>&nbsp;Create-Read-Update-Destroy (CRUD)</li>\r\n	<li>Joins ? Aggregate Functions and Groups</li>\r\n	<li>&nbsp;Sub Queries NoSQL</li>\r\n	<li>&nbsp;Serialization</li>\r\n	<li>Modeling NoSQL data</li>\r\n</ul>\r\n\r\n<p><strong>2. Back End Engineering with JavaScript/Node</strong></p>\r\n\r\n<p>The Back End Engineering portion of our curriculum uses JavaScript as your window into the underlying structure of programming and the systems of the web. You learn how to interact with everything from les to web requests while also developing an appreciation for the strategy of developing robust web frameworks.</p>\r\n\r\n<ul>\r\n	<li>NodeJS</li>\r\n	<li>&nbsp;Server-Side JavaScript</li>\r\n	<li>&nbsp;NPM</li>\r\n	<li>&nbsp;JavaScript Build Processes</li>\r\n	<li>&nbsp;Event Loop and Emitters</li>\r\n	<li>&nbsp;File System Interaction</li>\r\n	<li>&nbsp;Modules Express + APIs</li>\r\n	<li>&nbsp;HTTP in Depth</li>\r\n	<li>&nbsp;Calling APIs</li>\r\n	<li>&nbsp;Reading API documentation</li>\r\n	<li>Basic API Authentication</li>\r\n	<li>&nbsp;OAuth 2.0</li>\r\n	<li>&nbsp;API-Based Sign-In with SDKs</li>\r\n	<li>API-Based Sign-In with Omniauth</li>\r\n	<li>&nbsp;Uploading to Amazon S3</li>\r\n	<li>&nbsp;ExpressJS</li>\r\n	<li>&nbsp;Cookie and Session Persistence</li>\r\n	<li>Deploying JavaScript Applications Authentication and Security</li>\r\n	<li>Intro to Security and Authentication</li>\r\n	<li>Basic and Digest Authentication</li>\r\n	<li>&nbsp;Session-Based Authentication</li>\r\n	<li>Cookie-Based Authentication</li>\r\n	<li>JSON Web Tokens</li>\r\n	<li>&nbsp;Hacking Attack Vectors</li>\r\n</ul>\r\n\r\n<p><strong>Testing </strong></p>\r\n\r\n<ul>\r\n	<li>&nbsp;Overview of Software Testing</li>\r\n	<li>&nbsp;Unit Testing</li>\r\n	<li>Integration Testing</li>\r\n	<li>&nbsp;Factories</li>\r\n	<li>&nbsp;JavaScript Testing Frameworks</li>\r\n</ul>\r\n\r\n<p><strong>3. Front End Engineering </strong></p>\r\n\r\n<p>The Front End Engineering portion of the course uses the JavaScript language to carry you through designing modern dynamic web applications. You will learn everything from how to retrieve data using lightweight AJAX requests to constructing production-scale single-page apps using the ReactJS framework.</p>\r\n\r\n<p>The JavaScript Programming Fundamentals prep course is a prerequisite for this section.</p>\r\n\r\n<ul>\r\n	<li>React + Redux</li>\r\n	<li>&nbsp;AJAX</li>\r\n	<li>&nbsp;Overview of Frontend Frameworks</li>\r\n	<li>&nbsp;Frontend Data Modeling</li>\r\n	<li>&nbsp;Templating Frameworks</li>\r\n	<li>&nbsp;JSX</li>\r\n	<li>&nbsp;The React Environment</li>\r\n	<li>&nbsp;Components and State</li>\r\n	<li>&nbsp;Props</li>\r\n	<li>Routing</li>\r\n	<li>Redux</li>\r\n	<li>&nbsp;Webpack</li>\r\n</ul>\r\n\r\n<p><strong>Frontend Design</strong></p>\r\n\r\n<ul>\r\n	<li>Frontend Data Modeling</li>\r\n	<li>Best Practices</li>\r\n	<li>Build Tools and Workows Frontend Testing</li>\r\n	<li>&nbsp;Jest</li>\r\n	<li>&nbsp;Snapshot Testing</li>\r\n	<li>DOM Testing</li>\r\n</ul>\r\n\r\n<p>Classes and Costs (All in Naira):&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Weekend Class : 60000</li>\r\n	<li>Executive Class : 95000</li>\r\n	<li>Immersive Class : 75000</li>\r\n</ul>\r\n', 1, '', '', '', 33, '120 hours', '60000', '95000', '75000', 2, 'live', '839431d12946aaa85e8926010d07aa3b1549634755.jpg', '2019-03-05 14:08:21'),
(8, 'Frontend Web Development(Html,CSS,Graphics,Javascript,Jquery )', '<p>The course summary here</p>\r\n', 1, '', '', '', NULL, '60 hours', '30000', '65000', '40000', 2, 'offline', NULL, '2019-03-05 14:08:21'),
(9, 'Backend Web Development', '<p>The course summary here</p>\r\n', 1, '', '', '', NULL, '60 hours', '35000', '70000', '45000', 2, 'offline', NULL, '2019-03-05 14:08:21'),
(10, 'Information Security And Forensics', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, 'On Schedule', '60000', '95000', '40000', 2, 'offline', NULL, '2019-03-05 14:08:21'),
(11, 'Mobile App Development', '<p>Summary here&nbsp;</p>\r\n', 1, '', '', '', NULL, 'On Schedule', '60000', '95000', '75000', 2, 'offline', NULL, '2019-03-05 14:08:21'),
(12, 'Graphics/Multimedia', '<p>Summary here</p>\r\n', 1, '', '', '', 13, '12 hours', '60000', '95000', '75000', 2, 'offline', NULL, '2019-03-05 14:08:21'),
(13, 'Peach Tree Accounting', '<p>Course summary and expectations here</p>\r\n', 1, '', '', '', NULL, '6 weeks', '45000', '40000', '45000', 3, 'offline', NULL, '2019-03-05 14:08:21'),
(14, 'Sage 50 Accounting', '<p>Course summary and expectations</p>\r\n', 1, '', '', '', NULL, '6 weeks', '45000', '40000', '40000', 3, 'offline', NULL, '2019-03-05 14:08:21'),
(15, 'Digital Marketing', '<p>course summary</p>\r\n', 1, '', '', '', NULL, '4 weeks', '40000', '40000', '40000', 3, 'offline', NULL, '2019-03-05 14:08:21'),
(16, 'UX Master Class', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, '4 weeks', '30000', '40000', '40000', 3, 'offline', NULL, '2019-03-05 14:08:21'),
(17, 'Finance & Accounting for non-financial Professionals', '<p>Course summary here</p>\r\n', 1, '', '', '', NULL, '4 weeks', '45000', '40000', '40000', 3, 'offline', NULL, '2019-03-05 14:08:21'),
(18, 'Designing Budgets & Control For Strategy Execution', '<p>Summar goes here</p>\r\n', 1, '', '', '', NULL, '6 weeks', '45000', '40000', '40000', 3, 'offline', NULL, '2019-03-05 14:08:21'),
(19, 'Basic Financial Modeling and Forecasting', '<p>Course summary&nbsp; here</p>\r\n', 1, '', '', '', NULL, '6 weeks', '45000', '40000', '40000', 3, 'offline', NULL, '2019-03-05 14:08:21'),
(20, 'Cisco Certified Network Associate/Professional(CCNA/CCNP)', '<p><strong>CCNA </strong>(Cisco Certified Network Associate) is an information technology (IT) certification from Cisco. An associate-level Cisco Career certification.</p>\r\n\r\n<p>The CCNA certification (Cisco Certified Network Associate) indicates a foundation in and apprentice knowledge of networking. CCNA certified professionals can install, configure and operate LAN, WAN, and dial access services.</p>\r\n\r\n<p>To achieve CCNA Routing and Switching certification, one must earn a passing score on Cisco exam #200-125, or combined passing scores on both the &quot;Interconnecting Cisco Network Devices&quot; ICND1 #100-105 and ICND2 #200-105 exams.</p>\r\n\r\n<p><strong>To receive the CCNA certification, one must pass :</strong></p>\r\n\r\n<ul>\r\n	<li>The ICND1 Exam (100-105) and the ICND2 Exam (200-105)</li>\r\n	<li>The combined CCNA Exam (200-125)</li>\r\n</ul>\r\n\r\n<h3><strong>Course Outline</strong></h3>\r\n\r\n<ul>\r\n	<li>Describe how a network works</li>\r\n	<li>Configure, verify and troubleshoot a switch with VLANs and interswitch communications</li>\r\n	<li>Implement an IP addressing scheme and IP Services to meet network requirements in a medium-size Enterprise branch office network</li>\r\n	<li>Configure, verify, and troubleshoot basic router operation and routing on Cisco device</li>\r\n	<li>Explain and select the appropriate administrative tasks required for a WLA</li>\r\n	<li>Identify security threats to a network and describe general methods to mitigate those threats</li>\r\n	<li>Implement, verify, and troubleshoot NAT and ACLs in a medium-size Enterprise branch office network</li>\r\n	<li>Implement and verify WAN links</li>\r\n</ul>\r\n\r\n<p><strong>Classes and Costs (All in Naira):&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Weekend Classes : 60,000</li>\r\n	<li>Executive Class : 95000</li>\r\n	<li>Immersive Class : 75000</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '', '', '', 9, '12 weeks', '60000', '95000', '75000', 4, 'live', 'a137cbbd3a73e4515214c2ba6b5e202a1549635699.jpg', '2019-03-05 14:08:21'),
(21, 'Comptia N/A+', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, '12 weeks', '60000', '95000', '75000', 4, 'offline', NULL, '2019-03-05 14:08:21'),
(22, 'Microsoft Office(Word)', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, '20 hours', '30000', '40000', '40000', 5, 'offline', NULL, '2019-03-05 14:08:21'),
(23, 'Microsoft Office(Excel)', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, '20 hours', '30000', '40000', '40000', 5, 'offline', NULL, '2019-03-05 14:08:21'),
(24, 'Microsoft Office(PowerPoint)', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, '20 hours', '30000', '40000', '40000', 5, 'offline', NULL, '2019-03-05 14:08:21'),
(25, 'Microsoft (Outlook)', '<p>summary here</p>\r\n', 1, '', '', '', NULL, '20 hours', '30000', '40000', '40000', 5, 'offline', NULL, '2019-03-05 14:08:21'),
(26, 'IT Service Management', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, 'On Schedule', '60000', '95000', '75000', 6, 'offline', NULL, '2019-03-05 14:08:21'),
(27, 'ITIL Foundation', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, 'On Schedule', '60000', '40000', '40000', 6, 'offline', NULL, '2019-03-05 14:08:21'),
(28, 'Project Management Professional(PMP)', '<p>summary here</p>\r\n', 1, '', '', '', NULL, 'On Schedule', '60000', '65000', '75000', 6, 'offline', NULL, '2019-03-05 14:08:21'),
(29, 'Oracle 12c', '<p>Summary here</p>\r\n', 1, '', '', '', NULL, 'On Schedule', '60000', '95000', '75000', 7, 'offline', NULL, '2019-03-05 14:08:21'),
(30, 'Advanced Microsoft Excel', '<p>Summary here</p>\r\n', 1, '03/02/2019', '', '', NULL, 'On Schedule', '30000', '40000', '40000', 7, 'offline', NULL, '2019-03-05 14:08:21'),
(31, 'RDBMS', '<p>Summary here</p>\r\n', 1, '02/17/2019', '', '', 24, 'On Schedule', '60000', '65000', '75000', 7, 'offline', NULL, '2019-03-05 14:08:21'),
(32, 'CodeCamp (Computer & Technology Summer Camps for Kids)', '<p><strong>Launching in South-East Nigeria for the first time in July 2019. </strong></p>\r\n\r\n<p>Learn to code at one of Africa&rsquo;s top Coding Camps for kids - the NetPro Academy <strong>CodeCamp!</strong></p>\r\n\r\n<p>Open to students aged 8-19, tutors and facilitators at the NetPro Academy offers courses which blends fun games and puzzles with serious programming coursework. Students are divided by age and coding experience. Depending on age, dates&nbsp;and location they will have&nbsp;a chance to try their hands at some or all of the following:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Scratch </strong>&ndash; a fantastic introductory language, and the main teaching language for our younger students.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Processing</strong> &ndash; a Java-based graphical language. The primary teaching language for most of our courses, and a fantastic introduction to coding (students who have studied at the NetPro Academy previously will get the chance to work on advanced Processing projects)</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>HTML/CSS</strong> &ndash; learn to build and edit websites using HTML and CSS</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>LEGO&reg; MINDSTORMS&reg;</strong> Education EV3&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>BBC Microbits, Python, Arduino </strong>and more&hellip;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The NetPro Academy&rsquo;s mission is <em>to take the pressure away from learning by opening the world of coding and technology to our students in a fun and entertaining way.</em></p>\r\n\r\n<p>We love the proverb that says, <em>make hay while the sun shines</em> and our mantra is, <strong>Let&rsquo;s Start Early!</strong></p>\r\n\r\n<p><br />\r\n<img src=\"https://lh3.googleusercontent.com/OnVnBBGmqD7WOdHrDiSRWY7J4sHGPzxqylPRxcA9R3o7eqV0MvVCRvitcXop4G6erm0tG95cS-nW-ERVGBDjZfQLIjv9F9953SNFmhT-_RUPRSfTf_Xq4lEKMTUzjRqaewWFoTSLnvv3x6WkNw\" style=\"height:257px; width:293px\" /><img src=\"https://lh3.googleusercontent.com/RbAx6APcYcPUqDvhoKAOYpirQs2Phh7SrTYSoxck37yspDu0a9a4yw-NwSfMMJKhWps_nLc6MBHnkbJdnIjTMQO07rL77wRDmyAsIJ96Pc1RY16a72PmeZPfFI6pYsENfkT6wtd6XCbxYB8Vxg\" style=\"height:221px; width:282px\" /><br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p>We are proud of our commitment to ensuring that every student has plenty of runway at the CodeCamp &ndash; no matter their experience level, if they want to learn more, we will have classes to teach them more. Emphasising fun and exploration at every stage, we also take our coding very seriously. These classes are much more than just a fun and educational way to spend an hour a week &ndash; it&rsquo;s an opportunity to kick-start a passion for technology that could last a lifetime!</p>\r\n\r\n<p><strong>Students of all experience levels are catered for and computers are provided (so there&rsquo;s no need to bring a laptop).</strong></p>\r\n\r\n<p><strong>If you are a patent, you MUST DO THIS FOR THE LOVE OF YOUR KIDS. This is probably one of the best investments you can make into their future. </strong></p>\r\n\r\n<p><strong>Spaces are Limited! &nbsp;Hurry now and take advantage of the discount!</strong><em> </em></p>\r\n\r\n<p><em>(N15, 000. for Primary School Pupils and N20, 000 for Secondary Schools)</em></p>\r\n\r\n<p><br />\r\n<br />\r\n<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Available Dates and Venues:</strong></p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:rgb(128, 128, 128); vertical-align:top\">\r\n			<p><strong>DATE</strong></p>\r\n			</td>\r\n			<td style=\"background-color:rgb(128, 128, 128); vertical-align:top\">\r\n			<p><strong>OWERRI</strong></p>\r\n			</td>\r\n			<td style=\"background-color:rgb(128, 128, 128); vertical-align:top\">\r\n			<p><strong>ENUGU</strong></p>\r\n			</td>\r\n			<td style=\"background-color:rgb(128, 128, 128); vertical-align:top\">\r\n			<p><strong>ABUJA</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>1</strong><strong>st</strong><strong> to 5</strong><strong>th</strong><strong> of July, 2019</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Imo State Polytechnic, Umuagwo</strong></p>\r\n			&nbsp;\r\n\r\n			<p><strong>Living Temple Academy, World Bank Housing Estate </strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Rocana Institute of Technology, Enugu</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Venue to be confirmed</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>8</strong><strong>th</strong><strong> to 12</strong><strong>th</strong><strong> of July, 2019</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Imo State Polytechnic, Umuagwo</strong></p>\r\n			&nbsp;\r\n\r\n			<p><strong>Living Temple Academy, World Bank Housing Estate </strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Rocana Institute of Technology, Enugu</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Venue to be confirmed</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>15</strong><strong>th</strong><strong> to 19</strong><strong>th</strong><strong> of July, 2019</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Imo State Polytechnic, Umuagwo</strong></p>\r\n			&nbsp;\r\n\r\n			<p><strong>Living Temple Academy, World Bank Housing Estate </strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Rocana Institute of Technology, Enugu</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Venue to be confirmed</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>22</strong><strong>nd</strong><strong> to 26</strong><strong>th</strong><strong> of July, 2019</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Imo State Polytechnic, Umuagwo</strong></p>\r\n			&nbsp;\r\n\r\n			<p><strong>Living Temple Academy, World Bank Housing Estate </strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Rocana Institute of Technology, Enugu</strong></p>\r\n			</td>\r\n			<td style=\"vertical-align:top\">\r\n			<p><strong>Venue to be confirmed</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Visit our website at&nbsp;</strong><a href=\"http://www.netproacademy.net/\"><strong>www.netproacademy.net</strong></a><strong>&nbsp;for full details and to register today!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Phone:&nbsp;</strong></p>\r\n\r\n<p><strong>Facebook:&nbsp; </strong></p>\r\n\r\n<p><strong>Twitter:&nbsp; </strong></p>\r\n\r\n<p><strong>Email:&nbsp;</strong><a href=\"mailto:codecamp@netproacademy.net\"><strong>codecamp@netproacademy.net</strong></a></p>\r\n\r\n<p><strong>Special Features:&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Computers provided for Training</p>\r\n	</li>\r\n	<li>\r\n	<p>Free Wi-Fi</p>\r\n	</li>\r\n	<li>\r\n	<p>Free CodeCamp T-Shirt, Bags etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>Snacks provided each day</p>\r\n	</li>\r\n	<li>\r\n	<p>Security provided for kids</p>\r\n	</li>\r\n	<li>\r\n	<p>Much more!</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '01/01/2019', '', '', 58, '4 weeks', '15000', '20000', '25000', 2, 'live', 'ba38d1bbc3cfcaa01ef154327f8b90e61549635740.jpeg', '2019-03-05 14:08:21'),
(33, 'After School Coding Clubs for Primary and Secondary Schools', '<p>Our research has confirmed that most primary and secondary schools would be interested in offering computer programming (coding) classes to their pupils and students, but many do not have the time or ongoing resources to setup maintain a manage these training programmes. Computer programming skills has been identified as a critical skill for the future and we must start early to impart these skills or we will create a major disadvantage for our Children.</p>\r\n\r\n<p>In response to this problem, we have designed an In-school Programme which will offer schools an easier and more cost-effective solution. Our programme offers a complete package including equipment, qualified and experienced technology instructors and a technology curriculum designed specifically for primary and school children, which is based on global standards and best-practice. The Programme consists of the delivery of a 8/10/12 week coding/technology course for your students each school year.</p>\r\n\r\n<p>Participants age range is from 8 &ndash; 19 years and each lesson lasts one hour and we can deliver a number of sessions each week to accommodate multiple classes. The course would be delivered in your school using a mobile suite of laptops provided by NetPro Academuy. There will be one laptop per child we can cater for 25 - 30 students in any one class.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>The course will N15, 000. for Primary School Pupils and N20, 000 for Secondary Schools per term. &nbsp;Contact us if you would like these classes to run in your school. Parents can also enroll their school in any available venue.</p>\r\n\r\n<p>If you are a Primary or Secondary School and would like to register, please click here:</p>\r\n\r\n<p>If you are a Parent and would like to register your child to attend any of the existing Clubs, please click here:</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '12/12/2019', '', '', 37, '4 weeks', '15000', '20000', '25000', 2, 'live', 'f6af9a7b66e724ebe31ee3f0e568ff121549635776.jpeg', '2019-03-06 14:08:21'),
(34, 'Data Analytics Online', '<p><strong>Data Analytics Curriculum</strong></p>\r\n\r\n<p>&nbsp;The intensive program will give you the analytical skills to help you further your personal and professional goals.</p>\r\n\r\n<p><strong>Unit 1:</strong></p>\r\n\r\n<p>&nbsp;Intro to Data Analytics 1.1 Introduction to Big Data and Analytics: Fundamental Concepts, Industry Practice and Applications, Technical Domains and Roles</p>\r\n\r\n<p>&nbsp;<strong>Unit 2:</strong></p>\r\n\r\n<p>Probability Theory and Statistics Review with Excel 2.1 Probability Theory Fundamentals 2.2 Statistics <strong>Review</strong>: Descriptive Statistics 2.3 Introduction to Excel 2.4 Statistics</p>\r\n\r\n<p><strong>Review</strong> : Inferential Statistics 2.5 Prob/Stats and Data Problem Solving with Advanced Excel</p>\r\n\r\n<p><strong>&nbsp;&nbsp;Unit 3:</strong> Introduction to R and R Analytics 3.1 Introduction: RStudio, Syntax and File I/O 3.2 R Data Types and Data Objects, Basic Data Operations and Manipulation Utilities 3.3 Effective Use of Conditional Arguments, Loops and Functions 3.4 Statistical Analysis and Regression in R 3.5 Basic R Plotting and Parameter Setting 3.6 Stattleship XCase</p>\r\n\r\n<p><strong>Unit 4</strong>: Predictive Analytics and Case Studies 4.1 Introduction to End-to-end Predictive Modeling Method 4.2 Introduction to Logistic Regression and Case Study I: Dental Visit 4.3 Data Exploration and Pre-processing Demonstration with Case Study II: Fraud Detection 4.4 Problem-solving Approach and Classification Model Evaluation Criteria in Case Study II: Fraud Detection Unit 5: Introduction to Tableau 5.1 Introduction to Tableau: Applications, Architecture and Working Elements 5.2 Building Data Views and Effective Data Manipulation in Tableau 5.3 Effective Use of Analytics Functions and Calculations in Tableau 5.4 Tableau Case Studies</p>\r\n\r\n<p><strong>Real Projects</strong> : Each student is paired with an industry-leading employer partner on a 1:1 capstone project, where students apply data skills to real world cases and give final presentations to employers.</p>\r\n\r\n<p><strong>Unit 6:</strong> Introduction: Relational Database and SQL 6.1 Relational Database, SQL Working Environment and MySQL Workbench 6.2 Relational Data Modeling - EntityRelationship Modeling (ERM) 6.3 MySQL Fundamentals: Basic Database Management Operations, Data Types, Basic Table Operation Commands and Functions 6.4 Essentials of MySQL Queries and Data Problem Solving 6.5 Burning Glass XCase</p>\r\n\r\n<p><strong>Unit 7:</strong> Introduction to Machine Learning: Concepts, Algorithms and Applications 7.1 Introduction to Machine Learning 7.2 Unsupervised learning 7.3 Supervised learning 7.4 End-to-end ML in practice</p>\r\n\r\n<p><strong>Unit 7:</strong> Introduction to Machine Learning: Concepts, Algorithms and Applications 7.1 Introduction to Machine Learning 7.2 Unsupervised learning 7.3 Supervised learning 7.4 End-to-end ML in practice</p>\r\n\r\n<p><strong>Unit 8:</strong> Data Visualization in R 8.1 Advanced R plotting</p>\r\n\r\n<p><strong>Optional Topics</strong> : &nbsp;Basics of NoSQL, Applications and Fundamentals Introduction: Use of RStudio Shiny, File Structure, Share On Web Input, Output and Render functions in Shiny Reactivity in Shiny Format and layout of Shiny apps Experiential: Capstone Project One-on-one Project with Employer Partner Use Data Sets to help Solve Business Problem Present to Class &amp; Employer</p>\r\n\r\n<p>Professional Development &amp; Career Advancement (Throughout Course) Hiring Tests &amp; Informational Interviews with Employers Resume and Interview Workshops Industry Speakers and Site Visits</p>\r\n', 1, '2019-03-29', '2019-12-07', '', 66, '120000', '120000', '120000', '120000', 6, 'live', '903ab1c9c67fabb1e2b625fcb17008751550561762.jpg', '2019-03-05 14:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `course` varchar(250) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `facebookid` varchar(256) DEFAULT NULL,
  `twitterid` varchar(256) DEFAULT NULL,
  `passport` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `name`, `course`, `address`, `phone`, `facebookid`, `twitterid`, `passport`) VALUES
(1, 42, 'Vincent Otti', 'Basic Web Development', 'Pape Abuja', '09000000000', 'nothing here', 'nothing', 'c53f0f3157027e5d03cea77539ba18bc1550656774.jpeg'),
(2, 43, 'Eneh Afam Samuel', 'Full Stack Web Development', 'Enugu', '0900000000', 'nothing here', 'nothing', '03a09baba6790ffc8ccb2f991b4616841550657114.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `transdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` varchar(20) NOT NULL,
  `paystatus` varchar(126) NOT NULL,
  `response` varchar(126) NOT NULL,
  `course_id` int(11) NOT NULL,
  `payref` varchar(198) NOT NULL,
  `center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `candidate_id`, `transdate`, `amount`, `paystatus`, `response`, `course_id`, `payref`, `center_id`) VALUES
(1, 8, NULL, '75000', 'awaiting', 'initialized', 3, 'NetProacademy5c10e9b0c11e0', 0),
(2, 9, '2018-12-12 10:59:39', '75000', 'awaiting', 'initialized', 3, 'NetProacademy5c10ea1b2b92e', 0),
(3, 1, '2018-12-12 11:01:38', '75000', 'awaiting', 'initialized', 3, 'NetProacademy5c10ea92ba8c6', 2),
(12, 20, '2018-12-20 10:33:03', '50000', 'awaiting', 'initialized', 2, 'NetProacademy5c1b6fdf78a77', 1),
(13, 20, '2018-12-20 10:44:45', '50000', 'completed', 'success', 2, 'NetProacademy5c1b729da4331', 1),
(14, 20, '2018-12-20 10:50:06', '55000', 'completed', 'success', 4, 'NetProacademy5c1b73deb2895', 2),
(15, 36, '2019-02-04 10:45:51', '15000', 'awaiting', 'initialized', 33, 'NetProacademy5c5817df2ac6a', 1),
(16, 37, '2019-02-08 07:30:58', '60000', 'awaiting', 'initialized', 7, 'NetProacademy5c5d3031d0538', 1),
(17, 38, '2019-02-08 15:17:04', '15000', 'awaiting', 'initialized', 33, 'NetProacademy5c5d9d7053b6c', 2),
(18, 39, '2019-02-22 07:54:10', '120000', 'awaiting', 'initialized', 34, 'NetProacademy5c6faaa270639', 1),
(19, 40, '2019-03-08 13:40:51', '120000', 'awaiting', 'initialized', 34, 'NetProacademy5c8270e17079e', 1),
(20, 41, '2019-03-08 13:43:06', '120000', 'completed', 'success', 34, 'NetProacademy5c82716ac909b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `signupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usertype` varchar(44) NOT NULL DEFAULT 'candidate',
  `verificationkey` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `signupdate`, `usertype`, `verificationkey`) VALUES
(1, 'chukwudi@netpro.com.ng', '$2y$10$0r.BCRCbpmCTFtTtl/ioJ.1zcUvIgRO8B4EcU.QOHlHSR37/t1uoW', '2018-11-27 13:11:05', 'Admin', NULL),
(2, 'pretychuks@yahoo.co.uk', '$2y$10$F1F1tiV7XszdDwI6q1EjheGkLe0VW9z3i0wGCf8NCY9Pkq84NQNba', '2018-11-27 13:52:28', 'candidate', NULL),
(3, 'EBUKA@MAIL.COM', '$2y$10$yzHBLUQYlklvEQTG7Mfrp.Q5qJ6PotcDU0LV1zyrmq8ly.fOhA/zO', '2018-11-28 13:38:56', 'candidate', NULL),
(41, 'chukd12@mail.com', '$2y$10$5trOP86EW49GboQMkZrp8O2YZe6qGTBGyyJdZgaAHwgDUpmCCzBqO', '2019-02-08 15:05:11', 'candidate', NULL),
(42, 'vincent@netpro.com.ng', '$2y$10$Pst/2eKlIHktgQQCgnpIOOSl07uusu.bZio5f2ddxnhQoR/Wg8ccO', '2019-02-20 09:55:46', 'candidate', NULL),
(43, 'sam@netpro.com.ng', '$2y$10$jYqiAvIffLHiCEZwOLPRjuHFZJfITpDzQHrU0i0SJF99kDz3Lfcti', '2019-02-20 09:56:52', 'candidate', NULL),
(44, 'chukd@outlook.com', '$2y$10$enqA9OW2KGiSyL6a5DL1TeoKMcn1uza7ksPWPiDEx59al/l/dzHDa', '2019-02-22 07:54:09', 'candidate', NULL),
(46, 'pharmacist@demo.com', '$2y$10$znXPAExAWRgzNFz29QjYsOqtEN8n7.rfJ3oLxPpA8rP46bv4IQR.C', '2019-03-08 13:43:06', 'candidate', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_courses`
--
ALTER TABLE `candidate_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courseregistrations`
--
ALTER TABLE `courseregistrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `candidate_courses`
--
ALTER TABLE `candidate_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courseregistrations`
--
ALTER TABLE `courseregistrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
