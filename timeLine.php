
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./timeLine.css">
<body>
<?php      
                   class BbsSearch {
                            private $pdo;
                        
                            public function __construct(PDO $pdo) {
                                $this->pdo = $pdo;
                            }
                        
                            public function searchByName($keyword) {
                                $query = "SELECT * FROM bbs6 WHERE `message` like :keyword";
                                $stmt = $this->pdo->prepare($query);
                                $escapedKeyword = str_replace('%', '\\%', $keyword);
                                $stmt->bindValue(':keyword', '%'. $escapedKeyword  .'%' , PDO::PARAM_STR);
                                $stmt->execute();
                                $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                                
                                return $records;    
                            }
                    }


                            $id = '';
                            $date = '';
                            $name = '';
                            $category = '';
                            $subCategory = '';
                            $message = '';
                      

                        try {
                            require_once('./DBInfo.php');
                            $pdo = new PDO(DBInfo::DSN, DBInfo::USER, DBInfo::PASSWORD);
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sql = "SELECT * FROM bbs6 ORDER BY id DESC";
                            $statement = $pdo->query($sql);
                            // $reset = function() {};
                            // $tableQuery = "SHOW TABLES";
                            //         $tablesStatement = $pdo->query($tableQuery);
                            //         $tables = $tablesStatement->fetchAll(PDO::FETCH_COLUMN);

                            //         // テーブル一覧を表示
                            //         echo "テーブル一覧：<br>";
                            //         foreach ($tables as $table) {
                            //             echo $table . "<br>";
                            //         } 
                        
                                    
                            if($records = $statement->fetchAll(PDO::FETCH_ASSOC)) {

                                foreach ($records as $row) {

                                    $id = $row['id'];
                                    $date = $row['date'];
                                    $name = $row['name'];
                                    $category = $row['category'];
                                    $subCategory = $row['subCategory'];
                                    $message = $row['message'];
                                    $message = htmlspecialchars($message, ENT_QUOTES, 'utf-8');   
                                }     
                            }

                            $bbsSearch = new BbsSearch($pdo);
                           
                            $text = "This is a sample text containing some keywords.";
                            $searchWord = 'sample';
                            $pattern = '/\b' . preg_quote($searchWord, '/') . '\b/i';
                            $display = '';
                            

                            if (isset($_GET['keyword']) == true && $_GET['keyword']!= ''
                                &&  preg_match($pattern, $text)) {

                                $keyword = $_GET['keyword'];
                                $records = $bbsSearch->searchByName($keyword);
                                $keyword2 = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');
                                $display = $keyword2;   
                             }    
                        } 
                            catch (PDOException $e) {
                                $code = $e->getCode();
                                $message = $e->getMessage();
                                print("{$code}/{$message}<br>");    
                        }
                      
                        $pdo = null;   
            ?>  
    <div class="container">
            <header>
                <div class="title">
                    <h3>ENGINEER POST</h3>
                </div>
            </header>
        <div class="flex-container2">
            <div class="sub-title To-Menu">
                <h4>To Menu</h4>
            </div>
            <div class="inner-title2">
                   <div class="id">
                         <div class="discription3"><h5>ID</h5></div>
                   </div>
                    <div class="date">
                          <div class="discription3"><h5>Date</h5></div>
                    </div>
                    <div class="name">
                          <div class="discription3"><h5>Name</h5></div>
                    </div>
                    <div class="category">
                          <div class="discription3"><h5>Category</h5></div>
                    </div>
                    <div class="sub-category">
                          <div class="discription3"><h5>SubCategory</h5></div>
                    </div>
                    <div class="message">
                          <div class="discription3"><h5>Message</h5></div>
                    </div>
            </div>
        </div>
            <div class="space"></div>


    <?php 
            for ($i = 0; $i < count($records); $i++) {
                echo '<div class="flex-container">';

                     echo '<div id="id" class="add">';                 
                        echo '<div class="caption center">';
                                        
                            if (isset($records[$i]["id"])) {
                                $id = $records[$i]["id"];
                                echo "<div class=\"deteal\">{$id}<br></div>";
                            }   
                                                
                            if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                $keyword = $_GET["keyword"];    
                                $records = $bbsSearch->searchByName($keyword);
                            }   

                        echo '</div>';
                    echo '</div>';

                echo '<div id="date" class="add">'; 
                    echo '<div class="caption center">';
                                    
                            if (isset($records[$i]["date"])) {
                                $date = $records[$i]["date"];
                                echo "<div class=\"deteal\">{$date}<br></div>";
                            }

                            if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                $keyword = $_GET["keyword"];
                                $records = $bbsSearch->searchByName($keyword);       
                            }    

                    echo '</div>';
                echo '</div>';

                echo '<div id="name" class="add">';
                    echo '<div class="caption center">';
                                    
                            if (isset($records[$i]["name"])) {
                                $name = $records[$i]["name"];
                                echo "<div class=\"deteal\">{$name}<br></div>";
                            }

                            if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                $keyword = $_GET["keyword"];   
                                $records = $bbsSearch->searchByName($keyword);  
                            }             

                    echo '</div>';
                echo '</div>';

                echo '<div id="category" class="add">';
                     echo '<div class="caption center">';
                                    
                            if (isset($records[$i]["category"])) {
                                $category = $records[$i]["category"];
                                echo "<div class=\"deteal\">{$category}<br></div>";
                            }

                            if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                $keyword = $_GET["keyword"];
                                $records = $bbsSearch->searchByName($keyword);
                            }  

                    echo '</div>';
                echo '</div>';

                echo '<div id="subCategory" class="add">';
                    echo '<div class="caption center">';
                                    
                            if (isset($records[$i]["subCategory"])) {
                                $subCategory = $records[$i]["subCategory"];
                                echo "<div class=\"deteal\">{$subCategory}<br></div>";
                            }

                            if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                $keyword = $_GET["keyword"];
                                $records = $bbsSearch->searchByName($keyword);      
                            }        

                    echo '</div>';
                echo '</div>';

                echo '<div id="message" class="add">';
                    echo '<div class="caption">';
                                
                            if (isset($records[$i]["message"])) {
                                $message = $records[$i]["message"];
                                $message = htmlspecialchars($message, ENT_QUOTES, "utf-8");
                                echo "<div class=\"deteal\">{$message}<br></div>";
                            }

                            if (isset($_GET["keyword"]) === true && $_GET["keyword"] != "") {
                                $keyword = $_GET["keyword"];
                                $records = $bbsSearch->searchByName($keyword);         
                            } 

                    echo '</div>'; 
                echo '</div>';   

                echo '</div>';                  
                
            }
        ?>　

</div>
    <footer>
       
               <div class="copy"><h6 class="six">&COPY; Off-Set All Rights Reserved</h6></div>
           
           
    </footer>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./timeLine.js"></script>
    

</body>
</html>