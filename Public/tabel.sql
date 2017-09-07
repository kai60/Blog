CREATE TABLE IF NOT EXISTS think_user(
   user_id INT UNSIGNED AUTO_INCREMENT,
   name VARCHAR(100) NOT NULL,
   password VARCHAR(40) NOT NULL,
   question varchar(100),
   anwser varchar(100),
   user_image varchar(100),
   regtime datetime,
   email varchar(40),
   tel varchar(40), 
   sex varchar(40),
   birth date,
   
   PRIMARY KEY ( user_id )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS think_blog(
   blog_id INT UNSIGNED AUTO_INCREMENT,
   user_id INT NOT NULL,
   title VARCHAR(100) NOT NULL,
   content text NOT NULL,
   author varchar(100),
   type int,
   loadURL varchar(100),
   create_time datetime,
   alter_time datetime,
   label varchar(40),
   decoration varchar(100), 
   sex varchar(40),
   birth date,
   state varchar(40),
   
   PRIMARY KEY ( blog_id ),
   FOREIGN KEY (user_id) REFERENCES think_user(user_id)
   
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS think_post(
   post_id INT UNSIGNED AUTO_INCREMENT,
   user_id INT NOT NULL,
   blog_id INT NOT NULL,
   title VARCHAR(100) NOT NULL,
   text text NOT NULL,
   author varchar(100),
   type int,
   loadURL varchar(100),
   create_time datetime,
   state varchar(40),
   
   PRIMARY KEY ( blog_id ),
   FOREIGN KEY (user_id) REFERENCES think_user(user_id),
   FOREIGN KEY (blog_id) REFERENCES think_blog(user_id)
   
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS think_message(
   message_id INT UNSIGNED AUTO_INCREMENT,
   fromuser_id INT NOT NULL,
   touser_id INT NOT NULL,
   blog_id INT NOT NULL,
   title VARCHAR(100) NOT NULL,
   message text NOT NULL,
   create_time datetime,
   state varchar(40),
   
   PRIMARY KEY ( message_id ),
   FOREIGN KEY (user_id) REFERENCES think_user(user_id),
   FOREIGN KEY (fromuser_id) REFERENCES think_blog(user_id),
   FOREIGN KEY (touser_id) REFERENCES think_blog(user_id)
   
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

