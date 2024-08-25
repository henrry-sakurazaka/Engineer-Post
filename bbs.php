
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bbs.css">
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
        
        <div class="inner-container">
            <nav class="js-on-off">   
                  <noscript>
                    <div id="js-disabled">JavaScriptを有効にしてにしてください。</div>
                  </noscript>   
            </nav>

            <div class="sub-title">
                <h4>Menu</h4>
            </div>

         <div class="sticky">  
            <div class="home-title"> 
                <div class="color"></div>
                <div class="change"></div>
                <div class="tit"><h5>Home</h5></div>
            </div>
            <div class="inner-title"> 
                <div class="color"></div>
                <div class="change"><div class="open-close"></div></div>
                <div class="tit"><h5>Search</h5></div>
            </div>
            <div class="parent">
                <div class="space" id="space1">
                    <p>検索したいキーワードを入力し、「Search」ボタンをクリックしてください。</p>
    
                    <form action="" method="get">
                      <p><input type="text" id="search" name="keyword"><span>をメッセージに含む投稿</p></span>
                        <button id="button3" type="submit">Search</button>
                    </form>
                </div>
            </div>

            
            <div class="inner-title">
                <div class="color"></div>
                <div class="change"><div class="open-close"></div></div>
                <div class="tit"><h5>Post</h5></div>
            </div>

            <div class="parent">
                <div class="space" id="space2">
                    <p>お名前を入力後、カテゴリーを選択して、メッセージを入力、「Post」ボタンをクリックしてください。</p>
    
                    <form action="./bbs_insert.php" method="post">
                        <div class="fm">
                            <dl>
                                <dt class="dt1">
                                    <label><p>Name</p></label>
                                </dt>
                                <dd class="dd1">
                                    <input type="text" class="name" id="name" name="name" required >
                                </dd>
                            </dl>
                                
                            <dl>
                                <dt class="dt2">
                                    <label><p>Categoley</p></label>
                                </dt>
                                <dd class="dd2">
                                    <select id="fstCategory" name="category">
                                        <option value="aa">フロントエンド</option>
                                        <option value="bb">デザイン</option>
                                        <option value="cc">バックエンド</option>

                                    </select>
                                </dd>
                            </dl>
    
                            <dl>
                                <dt class="dt3">
                                    <label><p>Sub-Categoley</p></label>
                                </dt>
                                <dd class="dd3">
                                    <select id="sec-category" name="subCategory">
                                        <option value="one">HTML,CSS</option>
                                        <option value="thre">JavaScript</option>
                                        <option value="two">TypeScript</option>
                                        <option value="four">React</option>
                                        <option value="five">Vue.js</option>
                                        <option value="six">Next.js</option>
                                    </select>
                                </dd>
                            </dl>
                        
        
                            <dl>
                                <dt class="dt4">
                                    <label><p>Message</p></label>
                                </dt>
                                <dd class="dd4">
                                    <input class="posting-message" type="text" id="message" name="message" required>
                                </dd>
    
                            </dl> 
                        </div>
                        <button id="button" class="btn2" type="submit">Post</button>   
                    </form>
                </div>
            </div>
           
            <div class="inner-title">
                <div class="color"></div>
                <div class="change"><div class="open-close"></div></div>
                <div class="tit"><h5>Delete</h5></div>
            </div>

            <div class="parent">
                <div class="space" id="space3">
                    <p>ID、Passwordを入力し、「Delete」ボタンをクリックしてください。</p>
    
                    <form action="./bbs_delete.php" method="post">
                        <dl>
                            <dt class="dt5">
                                <label><p>ID</p></label>
                            </dt> 
                            <dd class="dd5">
                                <input type="text" class="id" id="id" name="id" required pattern="^[0-9]+$" title="半角数字で入力してください。">
                            </dd>
                        </dl>
                         <dl>
                            <dt class="dt6">
                                <label><p>Password</p></label>
                            </dt> 
                            <dd class="dd6">
                                <input type="password" id="password" name="password" required pattern="^[a-zA-Z0-9]{4,8}$" title="半角英数字（4文字以上8文字以下）で入力してください。">
    
                            </dd>
                            
                         </dl>
                         <dl>
                             <dt class="dt7"></dt>
    
                             <dd class="dd7">
                                <label class="on-off">
                                   <input id="check" type="checkbox">
                                   <p>See Password</p>
                                </label> 
                            </dd>
                         </dl> 
                                
                        <button id="button4" type="submit">Delete</button>
                    </form>
                </div>
            </div>
            </div>    
       
            <h4 class="timeline">Timeline</h4>
            <div id="display">
                <p class="searchWord">Search Word：
                    <?php
                    
                    if($display != '') {
                    print("<p class='searchD'>メッセージに<span class='underline'>{$display}</span>を含む投稿</p>");
                    }
                    else if(empty($display)) {
                        print("<span>なし</span>");
                    } 
                    ?>
                </p>
            </div>
               <span class="red"> <?php 

                 if(empty($records) && $display != '' ) {
                 print('<h4 class="varid">検索条件に一致する投稿はありません。</h4>');
                 }
                 
                 ?> </span>                                 
            

        <div class="sticky2">   
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
            <?php 
                
            ?>
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
    <script src="./bbs.js"></script>
    

</body>
</html>