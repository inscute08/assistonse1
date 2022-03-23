<?php
    require "connect.php";

    Class hello{
        public function insert(){
            $con = $this -> connect();
            if($con != null){
                $image_name = $_FILES['image']['name'];
                $title = mysqli_real_escape_string($con, $_POST['title']);
                $content = mysqli_real_escape_string($con, $_POST['content']);

                $target = "images/".basename($image_name);
                $sql = "INSERT INTO seniors(title, image, image_id)";
                try {
                    $result = $con -> query($sql);
                    if($result){
                            if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
                                print(json_encode(array("message"=>"Success")));
                            }else{
                                print(json_encode(array("message"=>"Saved but unable to move")));
                            }
                    }
                    else{
                        print(json_encode(array("message"=>"Unsuccessful")));
                    }
                    $con -> close();
                }catch (Exception $e)
                {
                    print(json_encode(array("message" => "Error phph exception".$e->getMessage())));
                }
            }
            else{

            }
        }

        public function select(){
            $response = array();
    
            $sql_query = "select title,content from news";
            $result = mysqli_query($con,$sql_query);
            if($con != null){
                $sql = "Select * from news";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    $news = array();
                    while($row = $result -> fetch_array()){
                        array_push($news,array())
                    }
                }
                else{

                }
                $con->close()
            }
            else{
                print(json_encode(array("PHP EXCEPTION")));
            }
        }
    }
   

?>