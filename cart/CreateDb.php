<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "Productdb",
        $tablename = "Producttd",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             name VARCHAR (255) NOT NULL,
                             price FLOAT,
                             product_image VARCHAR (255)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
        
// $sql="INSERT INTO $tablename (id,name,price, product_image) VALUES
//(1,'Arabic calligraphy art mural', 700,'../Images/pic 19.jpg');";   
// $sql.="INSERT INTO $tablename (id,name,price, product_image) VALUES
//(2,'Arabic calligraphy art mural', 200,'../Images/pic 28.jpg');";
// $sql.="INSERT INTO $tablename (id,name,price,product_image) VALUES
//(3,'Arabic calligraphy art mural', 90,'../Images/pic 30.jpg');";
//        
// $sql.="INSERT INTO $tablename (id,name,price, product_image) VALUES
// (4,'Arabic calligraphy art mural', 200,'../Images/pic 27.png');";
// $sql.="INSERT INTO $tablename (id,name,price, product_image) VALUE
// (5,'Arabic calligraphy art mural',2000,'../Images/pic 32.jpg');";        
//$sql.="INSERT INTO $tablename (id,name,price, product_image) VALUE
//(6,'Arabic calligraphy art mural', 2500,'../Images/pic 2.jpg');"; 
//$sql.="INSERT INTO $tablename (id,name,price, product_image) VALUE
//(7,'Arabic calligraphy art mural' ,90,'../Images/pic 22.jpg');";       
//$sql.="INSERT INTO $tablename (id,name,price, product_image) VALUE
//(8,'A five-piece Arabic calligraphy art mural',2800,'../Images/pic 26.jpg');";        
//$sql.="INSERT INTO $tablename (id,name,price, product_image) VALUE
//(9,'A modern art wall panel consisting of three pieces',2000,'../Images/images 5.jpg');";        
//$sql.="INSERT INTO $tablename (id,name,price, product_image) VALUE
//(10,'A modern artistic wall panel consisting of five pieces', 3100,'../Images/images 6.jpg');";
//
// $sql.="INSERT INTO $tablename (id,name,price, product_image) VALUES
//(11,'A modern art wall panel consisting of three pieces' ,2500,'../Images/images 7.jpg');".
//        
// $sql.="INSERT INTO $tablename (id,name,price, product_image) VALUES
//(12,'A modern art wall panel consisting of three pieces',2800,'../Images/images 4.jpg');";
//        
// $sql.="INSERT INTO $tablename (id,name,price, product_image) VALUES
//(13,'An Old style panel mural',400,'../Images/images 11.jpg');";
//        
// $sql.="INSERT INTO $tablename (id,name,price, product_image) VALUES
//(14,'An Old style panel mural', 700,'../Images/images 12.jpg');";
//
//$sql.="INSERT INTO $tablename (id,name,price, product_image) VALUES
//(15,'An Old style panel mural' ,3000,'../Images/images 13.jpg');";
//$sql.="INSERT INTO $tablename (id,name,price, product_image) VALUES
//(16'An Old style panel mural',3100,'../Images/images 14.jpg');"; 
//
//    $result=mysqli_multi_query($this->con, $sql);
//          if (!$result){
//                echo "Error : " . mysqli_error($this->con);
//            }
        
}

    // get product from the database
    public function getData(){
        $sql="SELECT * FROM $this->tablename";
        $result=mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result)>0){
            return $result;
        }
    }
}






