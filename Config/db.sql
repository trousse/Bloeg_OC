-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 26 jan. 2023 à 13:12
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Blog_oc`
--

-- --------------------------------------------------------

--
-- Structure de la table `Comment`
--

CREATE TABLE `Comment` (
  `id` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` text,
  `valided` tinyint(1) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Comment`
--

INSERT INTO `Comment` (`id`, `postId`, `userId`, `content`, `valided`, `date`) VALUES
(7, 8, 2, 'coment', 1, '2023-01-26');

-- --------------------------------------------------------

--
-- Structure de la table `Post`
--

CREATE TABLE `Post` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `header` varchar(2800) NOT NULL,
  `image` varchar(10240) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `last_edit_date` date NOT NULL,
  `title` varchar(1024) NOT NULL,
  `nbLike` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Post`
--

INSERT INTO `Post` (`id`, `content`, `header`, `image`, `userId`, `create_date`, `last_edit_date`, `title`, `nbLike`) VALUES
(7, 'What I\'ve learned from my experiences and my reading can be summed up by the title of this post.\r\n\r\nThe best comments are the ones we don\'t write.\r\nWhen you feel the need to write a comment, it\'s usually because your code isn\'t as clear and clean as it should be.\r\n\r\nCompare this :\r\n\r\nfunction main() {\r\n  let imageName = \'test.png\'\r\n\r\n  // Get the extension off the image filename  \r\n  let pieces = imageName.split(\'.\')\r\n  let extension = pieces.pop()\r\n}\r\nThe comment in itself isn\'t a bad thing. The developer may judge that we could need them later to understand the code better. He puts a comment, it\'s nice.\r\n\r\nBut it kind of looks like an excuse : \"My code is ugly/complicated but it\'s not that bad, I\'ll explain it in a comment\" instead of cleaning it.\r\n\r\nfunction main() {\r\n  let imageName = \'test.png\'\r\n  let extension = getFileExtension(imageName)\r\n}\r\nThe name of a function is already supposed to answer the question of what a code part does. Why not use this possibility?\r\n\r\nToo much comments suffocates the code\r\nAs indicated above, on my current project we have to document everything. Everything must be commented with jsdoc.\r\n\r\nThere\'s nothing bad about it. But in the end, most written comments are comments used solely to pass tests. They\'re redundant and useless.\r\n\r\n/**\r\n * Get the extension of the file\r\n * \r\n * @param {string} filename - The filename\r\n * @return {string} the extension of the file  \r\n */\r\nfunction getFileExtension(filename) {\r\n  let pieces = imageName.split(\'.\')\r\n  return pieces.pop()\r\n}\r\nTell me there\'s an info in that comment you didn\'t get while reading the code? There\'s none.\r\n\r\nOn the contrary, the fact that the function returns the extension of a file is repeated thrice : once in the name of the function, once in the function\'s description and once in the @return tag.\r\n\r\nWhat is the added value of this comment? There\'s none.\r\n\r\nWhen you keep seeing useless comments, your brain learns to ignore them. You\'ve probably experienced this before : on a project where there are many comments and a majority of comments like the one we\'ve seen above, you end up not seeing or reading the comments anymore.\r\n\r\nUnfortunately, the few interesting comments get lost in the sea of useless ones and aren\'t as useful as they should.\r\n\r\nCode coverage by documentation\r\nAs for unit tests, there are a bunch of tools that exist now to measure the code coverage for comments by documentation.\r\n\r\nAnd as for unit tests, you\'re quickly tempted to reach the 100% coverage.\r\n\r\nAnd as for unit tests, I\'m not sure this is something worth doing. For unit tests, a high coverage isn\'t reliable and isn\'t a proof of quality ; for documentations, a high percentage of coverage isn\'t counter-productive and suffocates the code.\r\n\r\nBy forcing developers to write documentation everywhere, we force them to write lame documentation.\r\n\r\nWhere the code is clean, the comment will be useless, and your brain will soon ignore it. Where the code is messy, the developer will use the comment as an excuse to not upgrade its code.\r\n\r\n', 'What I\'ve learned from my experiences and my reading can be summed up by the title of this post.\r\n\r\nThe best comments are the ones we don\'t write.\r\nWhen you feel the need to write a comment, it\'s usually because your code isn\'t as clear and clean as it should be.', 'https://mindsers.blog/content/images/size/w2000/2022/08/bestcomments_thumb.png', 2, '2023-01-22', '2023-01-22', 'The best comments are the ones we don\'t write', 0),
(8, '1/ Update your system\r\nThis may sound basic to you, but one of the primary reasons for finding flaws in web servers is system obsolescence. Not updating your systems regularly is a real danger for your business.\r\n\r\nEven if you have just requested the installation of your VPS from your host, you will benefit from updating your system before moving on to the rest of this article. Indeed, hosts often use backups or snapshots to create new servers. So, there is a good chance that the packages on your system need updates.\r\n\r\nRun the following commands:\r\n\r\n$ sudo apt update\r\n$ sudo apt upgrade -y\r\n2/ Change root password\r\nI\'m not sure it\'s worth explaining. Change your root password.\r\n\r\n$ sudo su\r\n$ passwd\r\nNew password: \r\nRetype new password: \r\npasswd: password updated successfully\r\n$ exit\r\nThe root account is the “super-administrator” account. He has all the rights. If there is an account that we refuse to leave in the hands of hackers, it is this one.\r\n\r\nBut changing the root account password is not enough. You will see that a little further in the rest of the article.\r\n\r\n3/ Create a new user\r\nAnother tip to avoid problems on your server: don\'t use root. I see at least two reasons for this:\r\n\r\neveryone has a root user on their machine by default. It\'s easy for a hacker to guess\r\nroot has all rights on the machine. If a person finds the root account password, he can do anything on the machine\r\n☝️\r\nSome hosts, to limit this problem, change the name of the root account. Don\'t think you\'re protected, though! As explained above, because of the automation of their process, they often give the same names to all customers. It is therefore enough to know who your host is to know how it works, and therefore to know how to attack your machine.\r\nThe best solution to prevent this problem is to use a different account to manage your machine. To do this, use the following command:\r\n\r\n$ adduser nameOfTheUser\r\nAdding user `nameOfTheUser\' ...\r\nAdding new group `nameOfTheUser\' (1001) ...\r\nAdding new user `nameOfTheUser\' (1001) with group `nameOfTheUser\' ...\r\nCreating home directory `/home/nameOfTheUser\' ...\r\nCopying files from `/etc/skel\' ...\r\nNew password: \r\nRetype new password: \r\npasswd: password updated successfully\r\nChanging the user information for nameOfTheUser\r\nEnter the new value, or press ENTER for the default\r\n        Full Name []:\r\n        Room Number []: \r\n        Work Phone []: \r\n        Home Phone []: \r\n        Other []:\r\nIs the information correct? [Y/n]\r\nAfter answering all the questions of the utility, let\'s tell the system that this new user will be able to perform actions usually dedicated to the superuser without being one.\r\n\r\nThe idea is to be able to say “I\'m not a superuser, give me no rights” but temporarily, when the situation requires it, tell the system “in fact, I\'m the superuser, let me do this one-time action”.\r\n\r\n$ adduser nameOfTheUser sudo\r\nsudo adduser nameOfTheUser sudo\r\nAdding user `nameOfTheUser\' to group `sudo\' ...\r\nAdding user nameOfTheUser to group sudo\r\nDone.\r\nNow you will be able to type the sudo command from your new user account without receiving a system denial. You can also connect in SSH directly with this user.\r\n\r\n4/ Change SSH access\r\nNow that only you know the password for the root account, and you no longer use it to connect to the server, it\'s time to go a little further.\r\n\r\nWhat are the problems we might encounter? Brute force attack. You no longer use the root account, but it is still usable. Using randomly generated passwords until one works is a method that still works today.\r\n\r\nThe method would also work on the second account that we created above.\r\n\r\nTo remedy this, we\'ll modify the SSH configuration somewhat to log in using an RSA key rather than a password. To be able to log in with a key, you first need... a key.\r\n\r\nSo let\'s generate ours on our local computer (not the server).\r\n\r\n$ ssh-keygen -t rsa -b 4096 -C \"your_email@example.com\"\r\n-t allows you to indicate the type of key you want to create. We want an RSA key.\r\n-b specifies the size of the key. I usually put 4096 so that it is twice as long, complex and solid as the default 2048 bites. But, you can put the size you want. Just tell yourself that depending on the power of your computer, the more you ask for a long key, the longer it will take to generate (and use?) it.\r\n-C allows you to add a comment to facilitate your organization.\r\nThe command will ask you for a passphrase. It is a sentence that must be indicated to use the key. A kind of password to protect the key. You can leave it out, but it is strongly recommended that you do put one.\r\n\r\nOnce the key is generated, you will find two new files on your local machine.\r\n\r\n$ ls ~/.ssh\r\nid_rsa    id_rsa.pub\r\nid_rsa is your private key. Not to be communicated under any circumstances. It must not leave your machine and allows you to decrypt the data that is sent to you.\r\nid_rsa.pub is the public version of your key. To communicate to those with whom you wish to communicate. It does not make it possible to decrypt the data, but only to encrypt them. In other words, it allows people to write messages that only your private key can decrypt.\r\nAs I just said, the private key will not move from your machine. However, to be able to communicate with the server, the server must have your public key. So, we have to send it to him.\r\n\r\nNo need to open the file and copy-paste anything, there\'s a command for that:\r\n\r\n$ ssh-copy-id -i ~/.ssh/id_rsa nameOfTheUser@ipOfTheServer\r\nThis command will create the ~/.ssh folder in your user\'s account on the server. Then, it will create the file ~/ssh/authorized_keys in which it will add the public key linked to the private key id_rsa.\r\n\r\nNormally, this command sends all public keys from your local machine to the server. To avoid this, we use -i to tell it which key to send.\r\n\r\nYou can now connect without passwords to the server by doing ssh nameOfTheUser@ipOfTheServer. Only the passphrase will be requested if you have specified one.\r\n\r\nSince it is possible to log in without passwords, all we have to do is disable the login with passwords. Thus, the risk of brute force will be eliminated. To do this, on the server, edit the following lines in the /etc/ssh/sshd_config file to have these values:\r\n\r\nPasswordAuthentication no\r\nPubkeyAuthentication yes\r\nPermitRootLogin no\r\nWith these settings, it will be impossible to log in with the root account whether you know the password or not. All other accounts will be inaccessible with a password, but accessible if you have the correct RSA key.\r\n\r\nLast detail, the standard port used by SSH is 22. It means that everyone knows this port. To make the access a little more complicated, a good practice is to change this port to a value between 1024 and 6665.\r\n\r\nIn the same /etc/ssh/sshd_config file, modify the following line with the value of your choice:\r\n\r\nPort 5489\r\nTo validate these changes, restart the SSH agent as follows:\r\n\r\n$ sudo systemctl restart ssh\r\nYour server now looks a bit more like a fortress.  ssh nameOfTheUser@ipOfTheServer will no longer work. You will need, in addition to the user and the IP, to indicate the port that you have chosen previously. The password will not be requested, you will need the RSA key to be able to connect.\r\n\r\n$ ssh nameOfTheUser@ipOfTheServer -p 2345 -i ~/.ssh/id_rsa \r\nEnter passphrase for key \'~/.ssh/id_rsa\':\r\n☝️\r\nI agree that for greater security, we have largely sacrificed the simplicity and usability of this command. But, it is possible to simplify it again thanks to the file ~/.ssh/config.\r\n5/ Enable a firewall\r\nThe firewall allows you to control who can connect to your server and how. The idea is to avoid leaving windows open in our fortress. We will therefore explicitly specify what we allow as a connection to our server.\r\n\r\nMost Linux distributions have iptables and ufw installed by default. I use UFW. I will therefore explain to you the basic rules that I apply for the security of my servers. To learn more about how this tool works, I recommend this article from DigitalOcean.\r\n\r\nWe start by disabling the firewall while we make our changes:\r\n\r\n$ sudo ufw disable\r\nNext, I change the default rules so that all incoming connections are denied, and all outgoing connections are allowed:\r\n\r\n$ sudo ufw default deny incoming\r\n$ sudo ufw default allow outgoing\r\nNext, we\'ll allow SSH connections. Otherwise, we will no longer have a way to connect to the server.\r\n\r\n$ sudo ufw allow 2345/tcp\r\nChange 2345 to the port you chose for SSH in the previous step.\r\n\r\n⚠️\r\nUFW knows the default ports for services and offers helpers like ufw allow ssh. But don\'t use it for SSH precisely, because you no longer use the default port 22. You risk blocking all SSH connections since SSH no longer listens to port 22.\r\nNow we can activate the firewall.\r\n\r\n$ sudo ufw enable\r\nCommand may disrupt existing ssh connections. Proceed with operation (y|n)? y\r\nFirewall is active and enabled on system startup\r\nAs we no longer use the default SSH port, if you still have connections using port 22 (on another terminal, for example), UFW warns you that you may lose your connection.\r\n\r\n☝️\r\nYou can verify that your rules are correct before activating the firewall using the ufw status verbose command.\r\nNow you have all the basics to secure your servers. There are of course many other things that one can implement to secure a server, but with the 5 steps in this article, you will have a server that is much less vulnerable to attacks.\r\n\r\nI have also prepared for those who wish it a print which includes all the commands of this article, a glossary and an explanation of the changes of the sshd_config file. Nothing more than what is in this article, but the idea is to have a cheat sheet to quickly secure your server.\r\n\r\nIf you are a premium member of the blog, download it below. Otherwise, you can find “VPS/server security cheatsheet” on the store.', 'This post is free for all to read thanks to the investment Mindsers Blog\'s subscribers have made in our independent publication. If this work is meaningful to you, I invite you to become a subscriber today.\r\n\r\nThere are several reasons why a developer would want to manage their own servers. Servers, especially VPS (Virtual Private Server), have become very affordable resources. They allow us to test, build, host our projects and do many other things.\r\n\r\nWhatever use you make of a server, it must be protected, because an intrusion could have serious repercussions. In this article, I explain how to secure a VPS simply in 5 simple steps.', 'https://mindsers.blog/content/images/size/w2000/2023/01/DALL-E-2023-01-11-16.59.37---a-guy-securing-web-servers-in-a-cyberpunk-world--digital-art-1.png', 2, '2023-01-22', '2023-01-22', 'Securing Your Web Server on a VPS: A Step-by-Step Guide', 4),
(9, 'h prestigious brands (AWS, Formula 1, Rapyd, BenQ, etc.).\r\n\r\nMindsers Blog\r\nWhat about the blog itself? The blog is the heart, the most important part, of this entrepreneurial project. Even though the amounts earned on the blog may seem very low compared to partnerships with brands on social networks, it was designed to bring in more stable and regular income. A solid foundation for any business.\r\n\r\nHas the blog progressed in the year 2022? Yes.\r\n\r\n\r\nNumber of page views in 2022 compared to 2021\r\nWe start with this beautiful chart of page views on the blog since January 1, 2022. I don\'t even know what to say, I\'m so impressed.\r\n\r\nThe blog absolutely did better than last year in terms of visits. On the other hand, the 140% increase is to be taken with a grain of salt because of this 1-month period when the blog was down with April 2021. Do you remember? OVH was set on fire.\r\n\r\nThese 148,000 views were made by 99,000 unique users.\r\n\r\n\r\nDistribution of traffic by source\r\nIf you were wondering where these views come from, the answer is unquestionably, search engines. I don\'t know if someone needed proof of the usefulness of SEO in a web project, but there is no photo.\r\n\r\nThe data shown in dark blue is from 2022 and in light blue is from 2021. This is very satisfying for me to watch, as it is the tangible result of the work I did on the blog SEO in 2022.\r\n\r\nI note, however, that the second and third places of the podium are held by those who saved the link of the blog somewhere (favorites, RSS reader, etc.) and those come from other sites/blog thanks to links to my site.\r\n\r\nTraffic from social networks was dead last this year.\r\n\r\nWe do not see them on this graph, but there are also all the views generated by members registered on the blog: the mailing list. I\'m talking about everyone who signed up to receive blog updates by email, enjoying private content and missing out on any new posts.\r\n\r\n\r\nEvolution of blog subscriptions over the last three months\r\nAs we see on the previous graph, there is a very regular supply of new entries. This is excellent news for the blog, as subscribers to the mailing list can be considered the blog\'s most engaged readers.\r\n\r\n\r\nEngagement of registered members of the blog\r\nIf you remember the figures quoted earlier, on social networks, we have an engagement rate deemed exceptional for the size of our audience: 5%. Regarding registered members of the blog, the engagement rate would be around 56%.\r\n\r\nIf the Mindsers Blog project is to succeed, I must grow this part of my community. Next year, more than the number of followers, the number of blog members could be decisive.\r\n\r\nHowever, there are only 169 members at the time of writing these lines. We should be on much larger numbers:\r\n\r\n\r\nMembers registered on the blog (percentage of evolution over the last 3 months)\r\nThere are several reasons for this. First, in 2022, I cleaned up the blog\'s membership list. I deleted a lot of inactive account created in the beginnings of the blog, when it was not yet the “Mindsers Blog”.\r\n\r\nExcept for paid accounts that should always have access to their unlocked content, I plan regularly to remove any that have been inactive for a long time. Already to respect the GDPR law, but also to have a healthy reader base on which I can build (make decisions) and communicate.\r\n\r\nA reader who no longer wishes to receive email from the Mindsers Blog and has not logged in to their account for over a year should not appear in the list of blog members. His account is no longer useful—neither to him nor to me—even though he continues to read the articles.\r\n\r\n', 'This post is free for all to read thanks to the investment Mindsers Blog\'s subscribers have made in our independent publication. If this work is meaningful to you, I invite you to become a subscriber today.\r\n\r\nThe year is coming to an end and it\'s time to take stock of all our hard work, to see what worked well or not before making decisions for next year. I am going in this article to comply with the exercise. Hope you learn as much as I do!\r\n\r\nDuring 2022, we tested a lot of new things including the store for merchandise and additional content, but also a new format for the newsletter, etc. We will focus on each of these different facets of Mindsers Blog to structure the article.', 'https://images.unsplash.com/photo-1672048357292-39b5b338922c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMTc3M3wwfDF8YWxsfDQ3fHx8fHx8Mnx8MTY3MjEzNjMzNQ&ixlib=rb-4.0.3&q=80&w=2000', 2, '2023-01-22', '2023-01-22', 'Great business review of 2022 for Mindsers Blog', 0),
(10, 'How does Express work?\r\nFor those who already knew Express before this article – and even those who are discovering it now – have you ever wondered how Express works?\r\n\r\nWhat if we code a small web framework to understand how our tools work? Don\'t misunderstand my intentions. The purpose of this article is not to code yet another framework in an ecosystem that is already saturated with them, and even less to produce production-ready code.\r\n\r\nBesides, I advise you in general not to “reinvent the wheel” in your projects. Node.js has a rich universe of open-source modules for all your needs, do not hesitate to dig into it.\r\n\r\nOn the other hand, even if in everyday life it is better to use an existing backend framework, that does not prevent you from coding one for purely educational purposes!\r\n\r\nLet\'s code a backend framework in Node.js\r\nAs I put the “Hello, World!” code of Node.js and Express, I will also put mine for you. This will serve as our goal.\r\n\r\nimport { createServer } from \'./lib/http/create-server.js\'\r\nimport { url, router } from \'./lib/http/middlewares/index.js\'\r\nimport { get } from \'./lib/http/methods/index.js\'\r\n\r\nconst server = createServer(\r\n  url(),\r\n  router(\r\n    get(\'/\', () => `Hello, World!`),\r\n  )\r\n)\r\n\r\nserver.listen(3000)\r\n\"Hello World!\" of our \"from scratch\" framework\r\nThis code does exactly the same thing as the one in Express. The syntax differs a lot — it is greatly inspired by RxJS\'s .pipe() — but it\'s still about displaying “Hello, World!” when the user goes to / and to return a 404 if going to an unknown route.\r\n\r\nIn the idea, we find the Express middlewares through which the request will pass to create a response to return to the client (the user\'s browser).\r\n\r\n\r\nIt\'s a very simplified diagram, but you get the idea.\r\n\r\nYou may have understood it, thanks to the syntax (and the reference to RxJS), I would like us to manage to have a rather functional approach with this project. When done well, I find it produces much more expressive code.\r\n\r\nThe HTTP server\r\nThe first function to implement is createServer. It is just a wrapper of the function of the same name in the http module of Node.js.\r\n\r\nimport http from \'http\'\r\n\r\nexport function createServer() {\r\n  return http.createServer(() => {\r\n    serverResponse.end()\r\n  })\r\n}\r\ncreateServer creates the server and returns it. We can then use .listen() to launch the server.\r\n\r\nThe http.createServer() callback function can take an IncommingMessage (the request made by the client) and a ServerResponse (the response that we want to return to it) as parameters.\r\n\r\nOne of our goals is to have a middleware system that will each in turn modify the request to gradually build the response to be returned to the client. For this, we need a list of middlewares to which we will pass the request and the response each time.\r\n\r\nimport http from \'http\'\r\n\r\nexport function createServer(middlewares = []) {\r\n  return http.createServer((incommingMessage, serverResponse) => {\r\n    for (const middleware of middlewares) {\r\n      middleware(incommingMessage, serverResponse)\r\n    }\r\n\r\n    serverResponse.end()\r\n  })\r\n}\r\nTo retrieve the middlewares and have the same syntax as the .pipe() of RxJS, I use the rest parameter that we saw in a previous article.\r\n\r\nimport http from \'http\'\r\n\r\nexport function createServer(...middlewares) {\r\n  return http.createServer((incommingMessage, serverResponse) => {\r\n    for (const middleware of middlewares) {\r\n      middleware(incommingMessage, serverResponse)\r\n    }\r\n\r\n    serverResponse.end()\r\n  })\r\n}\r\nThus middleware such as url and router can modify incommingMessage and/or serverResponse by reference. At the end of our modification pipe, we trigger the .end() event which will send the response to the client.\r\n\r\nA few things still bother me about this code:', 'This post is free for all to read thanks to the investment Mindsers Blog\'s subscribers have made in our independent publication. If this work is meaningful to you, I invite you to become a subscriber today.\r\n\r\nA good method to learn and progress in programming is to try to re-code existing projects. This is what I propose in this article to learn more about Node.js.\r\n\r\nThis article is aimed at beginners, without dwelling more than necessary on the basic notions of this environment. Feel free to visit the list of articles on Node.js and JavaScript to learn more.\r\n\r\nWhen I started learning Node.js, the HTTP server was the typical example that was quoted in all articles, blogs and other courses. The goal was to show how easy it is to create a web server with Node.js.', 'https://images.unsplash.com/photo-1629904853893-c2c8981a1dc5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMTc3M3wwfDF8c2VhcmNofDUxfHxzZXJ2ZXJ8ZW58MHx8fHwxNjY5NTcwMDYz&ixlib=rb-4.0.3&q=80&w=2000', 2, '2023-01-22', '2023-01-22', 'How to code a basic HTTP server using NodeJS', 0),
(11, 'article de soutenance', 'soutenance', 'https://mindsers.blog/content/images/size/w2000/2022/10/IMG_1463.jpg', 2, '2023-01-24', '2023-01-24', 'article soutenance', 0);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `sub_date` date NOT NULL,
  `last_connection_date` date DEFAULT NULL,
  `pseudo` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `sub_date`, `last_connection_date`, `pseudo`, `email`, `pass`, `status`) VALUES
(1, '2022-10-31', NULL, 'thomas', 'ths.rousse@gmail.com', '$2y$10$XqdeoUeIB9Lu8vGYErIp9uxlHwmOxWj.BgDyQXqnrgfZuhb6L0n.q', 'visitor'),
(2, '2022-12-16', NULL, 'thomas2', 'thomas.rousse@gmail.com', '$2y$10$j2jECOsqi7gGzJSr3pghxeLkfI5er7A6mzVttMfNSNyrfGn5D5NKG', 'admin'),
(3, '2023-01-20', NULL, 'ines', 'inesdgt4@gmail.com', '$2y$10$XS7h3IHzGmuHVLGikvABCOrFoIcfdTzZ4dqi4J.nK4AM9R0gN34h2', 'visitor');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_Comment_fk` (`userId`),
  ADD KEY `Post_Comment_fk` (`postId`);

--
-- Index pour la table `Post`
--
ALTER TABLE `Post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_Post_fk` (`userId`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `Post`
--
ALTER TABLE `Post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `Post_Comment_fk` FOREIGN KEY (`postId`) REFERENCES `Post` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `User_Comment_fk` FOREIGN KEY (`userId`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Post`
--
ALTER TABLE `Post`
  ADD CONSTRAINT `User_Post_fk` FOREIGN KEY (`userId`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
